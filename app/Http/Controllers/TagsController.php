<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tag ;

use App\Post ;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::latest('created_at')->get() ;
        
        return view('tags.index',compact('tags')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,['name' => 'required|min:3']) ;

        $id = Tag::create($request->all())->id ;

        flash()->success('Your tag has been successfully Added') ;

        return redirect('tags/'.$id) ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tags)
    {
        $posts = $tags->posts()->published()->get() ;
        
        return view('tags.show',compact('tags','posts')) ;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tags)
    {
        return view('tags.edit',compact('tags')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tag $tags)
    {
        $this->validate($request,['name' => 'required|min:3']) ;

        $tags->update($request->all()) ;

        flash()->success('Your tag has been successfully updated') ;

        return redirect('tags/') ;
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tags)
    {
        $id = $tags->posts->lists('id')->all() ;

        $tags->posts()->detach($id) ;

        $tags->delete() ;
        
        flash()->success('Your tag has been successfully deleted') ;
        
        return redirect('tags/');
    }
}
