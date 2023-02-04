<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;;
class HomeController extends Controller
{
        public function index()
        {
            $newProduct = Product::latest()->limit(6)->get();
            $topSale = Product::inRandomOrder()->limit(6)->get();
            $categories = Category::leftjoin('categories as parent','categories.parent_id','=','parent.id')
            ->orderBy('name')
            ->get([
                    'categories.*',
                    'parent.name as parent_name'
                ]);
                 return view('store.home',compact('newProduct','topSale','categories'));
        }
}
