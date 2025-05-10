<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
// use Illuminate\Pagination\paginate;

class PostController extends Controller
{
    
    public function index(){

        $extraTitle = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $extraTitle = ' in ' . $category->name;
        }

        if(request('author')){
            $user = User::firstWhere('name', request('author'));
            $extraTitle = ' by ' . $user->name;
        }

        return view('posts', [
            'title' => 'All Posts' . $extraTitle,
            'active' => 'posts',
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(4)->withQueryString()
            // 'posts' => Post::latest()->paginate(3)
        ]);
    }

    public function show(Post $post){
        return view('post', [
            "title" => "Single Post",
            'active' => 'posts',
            "post" => $post
        ]);
    }
}
