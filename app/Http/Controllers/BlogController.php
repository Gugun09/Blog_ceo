<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Posts $posts)
    {
    	$category_widget = Category::all();

    	$data = $posts->latest()->take(5)->get();

    	return view('blog', compact('data', 'category_widget'));
    }

    public function isi_blog($slug)
    {
        $category_widget = Category::all();

    	$data = Posts::where('slug', $slug)->get();

    	return view('blog.isi_post', compact('data', 'category_widget'));
    }

    public function list_blog()
    {
        $category_widget = Category::all();

    	$data = Posts::latest()->paginate(6);
    	return view('blog.list_post', compact('data', 'category_widget'));
    }

    public function list_category(Category $category)
    {
        $category_widget = Category::all();
        
        $data = $category->posts()->paginate(6);
        return view('blog.list_post', compact('data', 'category_widget'));
    }

    public function search(Request $Request)
    {
        $category_widget = Category::all();
        
        $data = Posts::where('judul', $Request->search)->orWhere('judul','like','%'.$Request->search.'%')->paginate(6);
        return view('blog.list_post', compact('data', 'category_widget'));
    }
}
