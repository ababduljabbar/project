<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){
        return view('admin.pages.product.list');
    }
    public function create(){
        return view('admin.pages.product.add');
    }  
}
