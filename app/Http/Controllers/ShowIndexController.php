<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class ShowIndexController extends Controller
{
    public function showblog(){
        $dataforblog = Blog::
            orderBy('id','desc')->get();
           

                return view('main',['dataforblog'=>$dataforblog]);
    } 
}
