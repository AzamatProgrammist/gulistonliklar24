<?php 


namespace App\Services;

use App\Models\Post;

class PostService {

	public function store($request)
	{
		

        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time().'.'.$file->getClientOriginalExtension();
            $file->move('site/images/posts/', $image_name);
            $requestData['image']=$image_name;
        }
        //$requestData['slug']=Str::slug($request->title_uz);
        $post = Post::create($requestData);
        $post->tags()->attach($request->tags);
	}

    public function update($request, $post)
    {
        $requestData = $request->all();
        
        $requestData['is_special'] = $request->is_special ?? 0;
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time().'.'.$file->getClientOriginalExtension();
            $file->move('site/images/posts/', $image_name);
            $requestData['image']=$image_name;
        }
       // $requestData['slug']=Str::slug($request->title_uz);
        $post->update($requestData);
        $post->tags()->sync($request->tags);
    }

     public function upload($request)
    {
        if($request->hasFile('upload')) {
            $fileName = time().'-'.$request->file('upload')->getClientOriginalName();
            //$fileName = pathinfo($originName, PATHINFO_FILENAME);
            //$extension = $request->file('upload')->getClientOriginalExtension();
            //$fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move('site/images/posts/', $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('site/images/posts/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

}


