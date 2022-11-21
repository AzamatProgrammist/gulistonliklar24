<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Mail;
use App\Mail\Message;
use App\Repositories\Interfaces\PostRepositoryInterface;

class MainController extends Controller
{

    public $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $specialPosts = $this->postRepository->specialPosts();
        $latestPosts = $this->postRepository->latestPosts();
      
        return view('index', compact('specialPosts', 'latestPosts'));
    }

    public function categoryPosts($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts=$category->posts()->paginate(10);
        return view('categoryPosts', compact('category', 'posts'));
    }

    public function postDetail($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->increment('view');
        $post->save();

        $otherPosts = Post::where('category_id', $post->category_id)
        ->where('id', '!=', $post->id)
        ->limit(3)
        ->latest()
        ->get();
        return view('postDetail', compact('post', 'otherPosts'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendMail(Request $request)
    {
        $data = $request->all();

        Mail::to('azamatprogrammist@gmail.com')->send(new Message($data));

        return "ok";

    }

    public function search(Request $request)
    {
        $key = $request->key;
        $posts = Post::where('title_uz', 'like', '%'.$key.'%')
        ->orWhere('title_ru', 'like', '%'.$key.'%')
        ->orWhere('body_uz', 'like', '%'.$key.'%')
        ->orWhere('body_ru', 'like', '%'.$key.'%')
        ->paginate(10);
        return view('search', compact('posts', 'key'));
    }
}
