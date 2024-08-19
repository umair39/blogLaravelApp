<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }
    public function add_post(Request $request)
    {
        $user = Auth()->user();
         $userid = $user->id;
         $name = $user->name;
         $usertype = $user->usertype;


        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $userid;
        $post->name = $name;
        $post->usertype = $usertype;

        $image = $request->image;
        if ($image)
        {

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }
        $post->save();
        return redirect()->back()
        ->with('message', 'Post Added Successfully');
    }
    public function Show_Post(){
        $post= Post::all();

        return view('admin.show_post', compact('post'));
    }
    public function delete_Post($id)
    {
     $post = Post::find($id);
     $post->delete();
     return redirect()->back()
     ->with('message', 'Post Delete Successfully'); 
    }
    public function edit_post($id){
        $post = Post::find($id);

        return view('admin.edit_post',compact('post'));
        }
        public function update_post(Request $request,$id){
            $data = Post::find($id);
            $data->title= $request->title;
            $data->description= $request->description;
            $image=$request->image;
            if($image){
                $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $data->image = $imagename;
            }
            $data->save();
            return redirect()->back()
            ->with('message', 'Image Updated Successfully');
        }
        public function accept_post($id)
        {
          $data = Post::find($id);
          $data->post_status = 'active';
          $data->save();
          return redirect()->back()
          ->with('message', 'Post statuus changed to active');
        }
        public function reject_post($id)
        {
          $data = Post::find($id);
          $data->post_status = 'rejected';
          $data->save();
          return redirect()->back()
          ->with('message', 'Post statuus changed to rejected');
        }
}
