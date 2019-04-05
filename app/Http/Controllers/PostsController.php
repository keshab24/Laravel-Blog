<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\Tag;
use Session;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/posts/index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        if($categories->count()==0 || $tags->count()==0)
        {
              Session::flash('info','You must have some categories or tags before attempting to create a post');
              return redirect()->back();
       
        }
        return view('admin.posts.create')->with('categories',$categories)
                                         ->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'featured'=>'required',
            'content'=>'required',
            'category_id'=>'required'
        ]);
        $post=new Post;
      $featured=$request->file('featured');
      $featured_new_name=time().$featured->getClientOriginalName();
      $destination='uploads/posts';
      $featured->move($destination,$featured_new_name);
      
      $post->title=$request->title;
      $post->content=$request->content;
      $post->featured='uploads/posts/'.$featured_new_name;
      $post->category_id=$request->category_id;
      $post->slug=str_slug($request->title);
      $post->save();
      Session::flash('success','Post Created Successfully.');
     return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        
        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required'
        ]);
     $post=Post::find($id);
     if($request->hasFile('featured'))
     {
      $featured=$request->file('featured');
      $featured_new_name=time().$featured->getClientOriginalName();
      $destination='uploads/posts';
      $featured->move($destination,$featured_new_name);
      $post->featured='/uploads/posts/'.$featured_new_name;
     }
      $post->title=$request->title;
      $post->content=$request->content;
      
      $post->category_id=$request->category_id;
      $post->slug=str_slug($request->title);
      $post->save();
      Session::flash('success','Post Updated Successfully.');
     return redirect()->route('posts');
    }   
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        Session::flash('success','You successfully trashed the post');
        return redirect()->route('posts');
    }
    public function trashed()
    {
        $posts=Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts',$posts);
    }
    public function kill($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post deleted permanently');
        return redirect()->back();
    }
    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post Restored successfully');
        return redirect()->back();
    }
}
