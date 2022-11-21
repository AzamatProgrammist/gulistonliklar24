<?php


namespace App\Repositories\Interfaces;

interface PostRepositoryInterface{

	public function getAll();

	public function specialPosts();

	public function latestPosts();

}



