<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\user\category;
use App\Models\Model\user\post;
use App\Models\Model\user\tag;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\Http\Controllers\Controller;
// use App\Models\user\category;
// use Illuminate\Http\Request;
// use App\Models\user\post;
// use App\Models\user\tag;

use PhpParser\Node\Expr\PostDec;

use function PHPUnit\Framework\returnSelf;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('admin.post.show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = tag::all();
        $categories = category::all();
        return view('admin.post.editor',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);
        if ($request->hasFile('image')){
            
            $imageName = $request->image->store('public');

         }
        $post = new post;
        $post->image = $imageName;
        $post -> title = $request -> title;
        $post -> subtitle = $request -> subtitle;
        $post -> slug = $request -> slug;
        $post -> body = $request -> body;
        $post -> status = $request -> status;

        $post -> save(); 
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('post.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::where('id',$id)->first();

        $tags = tag::all();
        $categories = category::all();
        return view('admin.post.edit',compact('tags','categories','post'));
        
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
      
        $this -> validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);
        if ($request->hasFile('image')){
            
           $imageName = $request->image->store('public');


        }
        $post = post::find($id);
        $post->image = $imageName;
        $post -> title = $request -> title;
        $post -> subtitle = $request -> subtitle;
        $post -> slug = $request -> slug;
        $post -> body = $request -> body;
        $post -> status = $request -> status;
        $post ->tags()->sync($request->tags);
        $post ->categories()->sync($request->categories);
        $post -> save(); 
        return redirect(route('post.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        return redirect()->back()->with('message','Your Post is successfully Deleted');
    }
}
