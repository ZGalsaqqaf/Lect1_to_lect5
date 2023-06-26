<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    
    public function index()
    {
        return view('posts.index');
    }

    public function cards()
    {
        $companies=[
            ["name" => "apple", "price"=>50],
            ["name" => "Samsung", "price"=>40],
            ["name" => "Hawawi", "price"=>30],
            ["name" => "sony", "price"=>35]
        ];
            
        return view('cards.index')->with('companies', $companies);

        // return view('cards.index', ['b' => $companies]);
    }

}

