<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        // SELECT categories.* parent.name  as parent_name from categories left join  categories as parent
        // on categories.parent_id '=' parent.id

        $categories = Category::leftjoin('categories as parent','categories.parent_id','=','parent.id')
                ->orderBy('name')
                ->get([
                        'categories.*',
                        'parent.name as parent_name'
                    ]);
        return view('dashboard.categories.index',compact('categories'));
    }

    public function create()
    {
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

        $rules = $this->rules();
        $request->validate($rules);
        $category = new Category([
            'name' => $request->post('name'),
            'slug' => Str::slug($request->post('name')),
            'parent_id' => $request->post('parent_id'),
            'description' => $request->post('description'),
        ]);
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

        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()
        ->route('dashboard.categories.index')
        ->with('success', "Category ($category->name) updated");
}


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()
        ->route('dashboard.categories.index')
        ->with('success', "Category ($category->name) deleted");
    }
    protected function rules($id = 0){

        return [
            'name' => 'required|string|min:2|max:255|unique:categories,name,'.$id,
            'parent_id' => 'nullable|int|exists:categories,id',
            'description' => 'nullable|string|min:5',
            'image' => 'nullable|mimes:png,jpg|'
        ];
    }
}
