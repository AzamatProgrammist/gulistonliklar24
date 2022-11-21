<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ads;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::first();
        return view('admin.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title1'=>'required',
            'image1'=>'required',
            'ulr1'=>'required',
            'title2'=>'required',
            'image2'=>'required',
            'ulr2'=>'required',
        ]);

        $requestData = $request->all();

        $file1 = $request->file('image1');
        $image_name1 = time().'.'.$file1->getClientOriginalExtension();
        $file1->move('site/images/posts/', $image_name1);
        $requestData['image1'] = $image_name1;

        $file2 = $request->file('image2');
        $image_name2 = time().'.'.$file2->getClientOriginalExtension();
        $file2->move('site/images/posts/', $image_name2);
        $requestData['image2'] = $image_name2;

        $ads = Ads::create($requestData);

        return redirect()->route('admin.ads.index')->with('success', 'Ads creates successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ads::find($id);
        return view('admin.ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ads::find($id);
        return view('admin.ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ad)
    {
        $request->validate([
            'title1'=>'required',
            'ulr1'=>'required',
            'title2'=>'required',
            'ulr2'=>'required',
        ]);

        $requestData = $request->all();
        if ($request->hasFile('image1')) {
            $file1 = $request->file('image1');
            $image_name1 = time().'.'.$file1->getClientOriginalExtension();
            $file1->move('site/images/posts/', $image_name1);
            $requestData['image1'] = $image_name1;
        }
        
        if ($request->hasFile('image2')) {
            $file2 = $request->file('image2');
            $image_name2 = time().'.'.$file2->getClientOriginalExtension();
            $file2->move('site/images/posts/', $image_name2);
            $requestData['image2'] = $image_name2;
        }
        

        $ad->update($requestData);

        return redirect()->route('admin.ads.index')->with('success', 'Ads updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ads::destroy($id);
        return redirect()->route('admin.ads.index')->with('success', 'Ads deleted successfully');
    }
}
