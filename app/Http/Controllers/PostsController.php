<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post ;
use App\Tag;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    /**
     * Show all posts .
     *
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['show','index']]) ;
    }

    private function syncPost(Post $posts , Request $request){

        $posts->update($request->all()) ;

        return $posts->tags()->sync($request->input('tag_list')) ;
    }

    private function createPost(Request $request)
    {

        $post = Auth::user()->posts()->create($request->all()) ;

        $this->syncPost($post,$request) ;

        return $post ;

    }


    public function index(){

        $posts = Post::latest('published_at')->published()->get();

        if(request()->isJson()){

            return response($posts->get()) ;

        }else{

            return view('articles.index',compact('posts')) ;

        }


    }


    /**
     * Show particular post  .
     *
     * @param Post $posts
     * @return Response
     * @internal param $id
     */
    public function show(Post $posts){

        return view('articles.show',compact('posts','tags')) ;
    }

    /**
     * Create a new post .
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

        $tags = Tag::lists('name','id') ;

        return view('articles.create',compact('tags')) ;
    }


    /**
     * Store an post
     *
     * @param PostRequest $request
     * @return Response
     */
    public function store(PostRequest $request){

        $post = $this->createPost($request) ;

        $id = $post->id ;

        flash()->success('Your post has been posted')->important() ;

        return redirect('/articles/'.$id) ;

    }

    /**
     * @param Post $posts
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param $id
     */
    public function edit(Post $posts){

        $tags = Tag::lists('name','id') ;

        return view('articles.edit',compact('posts','tags')) ;

    }

    public function update(Post $posts, PostRequest $request){

        $this->syncPost($posts,$request) ;

        return redirect('articles') ;

    }

    public function destroy(Post $posts){

        $id = $posts->tags->lists('id')->all() ;
        
        $posts->tags()->detach($id) ;

        $posts->delete() ;

        flash()->overlay('Your post has been deleted','Warning') ;
        
        return redirect('articles/') ;
    }




}
