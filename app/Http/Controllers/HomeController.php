<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
        public function index()
        {
            $newProduct = Product::latest()->limit(6)->get();
            $topSale = Product::inRandomOrder()->limit(6)->get();
            return view('store.home',compact('newProduct','topSale'));
        }
}
