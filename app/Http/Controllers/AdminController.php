<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Post;
// use App\Category;
// use Illuminate\Support\Facades\Storage;
// use Session;
// use App\Tag;
// use Purifier;
// use Image;

class PostController extends Controller
{

   public function __construct()
   {
       $this->middleware('auth');
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin');

    }
//
//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         $categories = Category::all();
//         $tags = Tag::all();
//         return view('posts.create')->withCategories($categories)->withTags($tags);
//     }
//
//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //validate the data
//         $this->validate($request, array (
//             'title' => 'required|max:255',
//             'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
//             'category_id' => 'required|integer',
//             'body'  => 'required',
//             'featured_image' => 'sometime|image'
//         ));
//
//         // store in database
//         $post = new Post;
//
//         $post->title    = $request->title;
//         $post->slug     = $request->slug;
//         $post->category_id =$request->category_id;
//         $post->body     = Purifier::clean($request->body);
//
//         Session::flash('success', 'the blog post was successfully save!');
//
//         if($request->hasFile('featured_image')){
//             $image = $request->file('featured_image');
//             $filename = time(). '.' . $image->getClientOriginalExtension();
//             $location = public_path('images/'. $filename);
//             Image::make($image)->resize(800, 400)->save($location);
//
//             $post->image = $filename;
//         }
//
//         $post->save();
//
//         $post->tags()->sync($request->tags, false);
//
//         return redirect()->route('posts.show',$post->id);
//
//         // redirect to another page
//     }
//
//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         $post = Post::find($id);
//         return view('posts.show')->withPost($post);
//     }
//
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         // find the post in the db and save it
//         $post = Post::find($id);
//         $categories = Category::all();
//         $tags = Tag::all();
//         $cats = array();
//         $tags2 = array();
//         foreach($categories as $category){
//             $cats [$category->id] = $category->name;
//         }
//         foreach($tags as $tag){
//             $tags2 [$tag->id] = $tag->name;
//         }
//         //return the view and pass it
//         return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
//     }
//
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         // validate the data
//         $post =Post::find($id);
//
//             $this->validate($request, array (
//                 'title'         => 'required|max:255',
//                 'slug'          => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
//                 'category_id'   => 'required|integer',
//                 'body'          => 'required',
//                 'featured_image'=> 'image'
//             ));
//
//
//         // save the data to db
//         $post = Post::find($id);
//
//         $post->title  = $request->title;
//         $post->slug   = $request->slug;
//         $post->category_id = $request->category_id;
//         $post->body   = Purifier::clean($request->body);
//
//         if($request->hasFile('featured_image')){
//             // add the new photo
//             $image = $request->file('featured_image');
//             $filename = time(). '.' . $image->getClientOriginalExtension();
//             $location = public_path('images/'. $filename);
//             Image::make($image)->resize(800, 400)->save($location);
//             $oldfilename = $post->image;
//             // update the db
//             $post->image = $filename;
//             // delete the old file
//             Storage::delete($oldfilename);
//         }
//
//         $post->save();
//         $post->tags()->sync($request->tags);
//
//         // set flash data with success message
//         Session::flash('success', 'This Post Was successfully save!');
//         //redirect with flash data to posts.show
//         return redirect()->route('posts.show',$post->id);
//     }
//
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         $post = Post::find($id);
//         $post->tags()->detach();
//         Storage::delete($post->image);
//
//         $post->delete();
//
//         Session::flash('success','This Post Was successfully delete');
//         return redirect()->route('posts.index');
//     }
// }
