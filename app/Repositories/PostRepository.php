<?php 


namespace App\Repositories;

use App\Repositories\Interfaces\PostRepositoryInterface;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface{


	public function getAll()
	{
		return Post::all();
		
	}

	public function specialPosts()
	{
		return Post::where('is_special', 1)->limit(6)->latest()->get();
	}

	public function latestPosts()
	{
		return Post::limit(6)->latest()->get();
	}
}

