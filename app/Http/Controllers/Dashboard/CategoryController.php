<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('dashboard')) {
                return redirect()->route('home');
            }

            return $next($request);
        });
        
        $this->middleware('can:categories.view')->only('index');

    }

    // public function __construct()
    // {



    //     $this->middleware('can:categories.view')->only('index');

    // }


    public function index(Request $request)
    {
        // SELECT categories.* parent.name  as parent_name from categories left join  categories as parent
        // on categories.parent_id '=' parent.id


        $search = $request->query('search'); // ?search=apple
        $categories = Category::leftjoin('categories as parent','categories.parent_id','=','parent.id')
                ->orderBy('name')
                ->search($search)
                ->get([
                        'categories.*',
                        'parent.name as parent_name'
                    ]);
        return view('dashboard.categories.index',compact('categories'));
    }

    public function create()
    {

        if (!Gate::allows('categories.create')) {
            abort(403); // Foribden
        }

        $parents  = Category::all();
        $category = new Category;
        return view('dashboard.categories.create',compact('parents','category'));
    }


    public function store(Request $request)
    {
        // another way to validate

        // $request->validate([
        //     'name' => 'required|string|min:2|max:255',
        //     'parent_id' => 'nullable|int|exists:categories,id',
        //     'description' => 'nullable|string|min:5',
        //     'image' => 'nullable|mimes:png,jpg|'

        // ]);

        if (!Gate::allows('categories.create')) {
            abort(403); // Foribden
        }

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = $this->upload($file);
        }
        $data['slug'] = Str::slug($request->post('name'));
        $rules = $this->rules();
        $request->validate($rules);
        $category = Category::create($data);
        $category->save();

        // PRG: Post Redirect Get
        return redirect()
            ->route('dashboard.categories.index')
            ->with('success', "Category ($category->name) created");
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        Gate::authorize('categories.update');

        $category = Category::findOrFail($id);
        // find or faile like belw code is null and abort
        // if($category == null){
        //     abort(404);
        //     return redirect()
        //         ->route('dashboard.categories.index')
        //         ->with('error', "Category not found");
        // }
        $parents  = Category::where('id','<>',$id)->get();
        return view('dashboard.categories.edit',compact('category','parents'));

    }


    public function update(CategoryRequest $request, $id)
    {
        // validate in custom CategoryRequest
        Gate::authorize('categories.update');

        $category = Category::findOrFail($id);
        $data = $request->except('image');
        $data['slug'] = Str::slug($request->post('name'));
        $old_image = $category->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = $this->upload($file);
        }

        $category->update($data);
        if($old_image && $old_image != $category->image)
        {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()
        ->route('dashboard.categories.index')
        ->with('success', "Category ($category->name) updated");
}


    public function destroy($id)
    {
        if (!Gate::check('categories.delete')) {
            abort(403, __('You are not allowed to process action.'));
        }
        $category = Category::withTrashed()->findOrFail($id);
        if($category->trashed()){
            $category->forceDelete();
            if($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            return redirect()
            ->route('dashboard.categories.trash')
            ->with('success', "Category ($category->name) deleted");
        } else{
            $category->delete();
        }
        return redirect()
        ->route('dashboard.categories.index')
        ->with('success', "Category ($category->name) deleted");
    }
    protected function rules($id = 0){

        return [
            'name' => 'required|string|min:2|max:255|unique:categories,name,'.$id,
            'parent_id' => 'nullable|int|exists:categories,id',
            'description' => 'nullable|string|min:5',
            'image' => 'nullable'
        ];
    }

    protected function upload(UploadedFile $file)
    {
        if ($file->isValid()) {
            return $file->store('images', [
                'disk' => 'public',
            ]);
        } else {
            throw ValidationException::withMessages([
                'image' => 'File corrupted!',
            ]);
        }
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->latest('deleted_at')->get();
        return view('dashboard.categories.trash', compact('categories'));
    }

    public function restore(Request $request, $id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();

        // PRG
        return redirect()
            ->route('dashboard.categories.index')
            ->with('success', "Category ($category->name) restored");
    }
}
