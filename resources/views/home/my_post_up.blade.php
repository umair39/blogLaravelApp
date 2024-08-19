<!DOCTYPE html>
<html lang="en">
   <head>
   <base href="/public">
      @include('home.homecss')
    </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
         <!-- banner section start -->

      </div>
      <!-- header section end -->
   
      <div class="col-md-12" style="margin-left:400px; padding-top:200px">
         <h3 style="font-size:30px; font-weight:bold">update Post</h3>
       <form  action="{{url('update_post_data',$post->id)}}" method="post" enctype="multipart/form-data">
         @csrf
         <div style="margin:0 auto">
             <label>Title</label><br>
             <input type="text" value="{{$post->title}}" name="title">
         </div>
         <div style="margin:0 auto">
             <label>Description</label><br>
             <textarea name="description">{{$post->description}}</textarea>
         </div>
         <div style="margin:0 auto">
             <label>Old Image</label><br>
             <img src="/postimage/{{$post->image}}" height="250px">
         </div>
         <div style="margin:0 auto">
             <label>Upload Image</label><br>
             <input type="file" name="image">
         </div>
         @if(session()->has('message'))
     <div class="alert alert-success" style="margin:0 auto">
      <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
      {{session()->get('message')}}
     </div>
     @endif
             <button type="submit" class="mt-3 btn btn-success" value="Update Post">Add Post</button>
         
       </form>

      </div>
     
      <!-- choose section end -->
      <!-- footer section start -->
     @include('home.footer')
    </body>
</html>