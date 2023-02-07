<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoriesController extends Controller
{



    public function index()
    {
        $categories = Category::paginate(2);
        return $categories;
    }

    public function store(Request $request)
    {
        //$user = $request->user();
        $user = Auth::guard('sanctum')->user();
        if (!$user->tokenCan('categories.create')) {
            abort(403, 'You don not access to this resource!');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'parent_id' => ['nullable', 'int', 'exists:categories,id'],
        ]);

        $category = Category::create($request->all());

        return response($category, 201, [
            'content-type' => 'application/json',
            'x-server-message' => __('Category created')
        ]);
    }


    public function show(Category $category)
    {
        // $category = Category::with('products')->findOrFail($id);

        return $category->load('products');
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'parent_id' => ['sometimes', 'required', 'int', 'exists:categories,id']
        ]);

        $category->update($request->all());

        return $category;
    }

    
    public function destroy(Category $category)
    {
        $category->delete();
        return [
            'message' => __('Category deleted'),
        ];
    }
}
