<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
      
      if(Auth::id()){
        $post = Post::where('post_status','=','active')->get();
        $usertype=Auth()->user()->usertype;
        if($usertype=='user')
        {
          
          return view('home.homepage',compact('post'));
        }else if($usertype== 'admin')
        {
          return view('admin.adminhome');
        }
        else
        {
          return redirect()->back();
        }
      }
    }
    public function homepage()
    {
      $post = Post::where('post_status','=','active')->get();
      
      return view('home.homepage',compact('post'));
    }
    public function post_details($id)
    {
      $post = Post::find($id);

      return view('home.post_details',compact('post'));
    }
    public function create_post(){
      return view('home.create_post');
    }
    public function user_post(Request $request){
      $user =Auth()->user();
      $userid=$user->id;
      $username=$user->name;
      $usertype=$user->usertype;


      $post = new Post;
      $post->title=$request->title;
      $post->description=$request->description;
      $post->user_id = $userid;
      $post->name = $username;
      $post->usertype = $usertype;
      $post->post_status = 'pending';
      $image=$request->image;
      if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('postimage', $imagename);
        $post->image = $imagename;
      }
      $post->save();
      return redirect()->back()
      ->with('message', 'Post Added Successfully');
      
      
    }
    public function my_post(){
      $user= Auth::user();
      $userid=$user->id;
      $data = Post::where('user_id','=',$userid)->get();
      return view('home.my_post',compact('data'));
    }
   public function my_post_del($id)
   {
    $data = Post::find($id);
    $data->delete();
    return redirect()->back()
    ->with('message', 'Post deleted successfully');
   }
   public function my_post_up($id)
   {
    $post = Post::find($id);
    return view('home.my_post_up',compact('post'));
}
public function update_post_data(Request $request,$id){
  $post = Post::find($id);
  $post->title= $request->title;
  $post->description= $request->description;
  $image=$request->image;
  if($image){
      $imagename = time().'.'.$image->getClientOriginalExtension();
  $request->image->move('postimage', $imagename);
  $post->image = $imagename;
  }
  $post->save();
  return redirect()->back()
  ->with('message', 'Image Updated Successfully');
}
}
