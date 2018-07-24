<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    protected $limit = 3;
    public function index()
    {   

        // \DB::enableQueryLog();
        // $posts = [];
        // foreach ($categories as $category) {
        //     foreach ($category->posts as $post) {
        //         $post->author;
        //         array_push($posts, $post);
        //     }
        // }
        // dd($posts);  
        //to check the queries run causing n+1 problem
        // $posts = Post::with('author')::all();

        
        $posts = Post::with('author')
                ->latestFirst()
                ->Published()
                ->simplePaginate($this->limit);
        
        // view("blog.index", compact('posts'))->render();
        // dd($posts);
        // dd(\DB::getQueryLog());

        
        return view("blog.index", compact('posts'));

    }


    public function category(Category $category)
    {   
        $categoryName = $category->title;

        $posts = $category->posts()
                          ->with('author')
                          ->latestFirst()
                          ->Published()
                          ->simplePaginate($this->limit);
        
        return view("blog.index", compact('posts','categoryName'));

    }


    public function show(Post $post)
    {   
        
        return view("blog.show", compact('post'));
    }
}
