<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
use Illuminate\Support\Collection;

class StoreLayout extends Component
{

    public $title;
    public $categories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = '')
    {
        $this->title = $title;
        $this->categories = $this->getCategories();


                //    dd($this->categories);
    }

    public function getCategories()
        {
            $categories = Category::whereNull('parent_id')->with('children')->get();
            return $this->buildTree($categories);
        }

        public function buildTree(Collection $categories, $parentId = null)
            {
                return $categories->filter(function($category) use ($parentId) {
                    return $category->parent_id == $parentId;
                })->map(function($category) {
                    $children = $this->buildTree($category->children, $category->id);
                    return [
                        'id' => $category->id,
                        'name' => $category->name,
                        'slug' => $category->slug,
                        'children' => $children,
                    ];
                });
            }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.store');
    }
}
