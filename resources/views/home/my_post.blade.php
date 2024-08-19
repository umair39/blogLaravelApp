<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.homecss')
      <style type="text/css">
        .post_des{
           padding:30px;
           text-align:center;
           
        }
        .title-des{
            font-size:30px;
            font-weight:bold;
            color:white;
        }
        .des{
            padding:15px;
        }
      </style>
    </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
         <!-- banner section start -->
         @if(session()->has('message'))
      <div class=" alert alert-success">
        <button type="button" class="close" area-hidden="true" data-dismiss="alert">
           X
      </button></div>
      @endif
     
     
         @foreach($data as $post)
         <div class="post_des">
        <img src="/postimage/{{$post->image}}" style="height:200px; margin:0 auto" alt="post_image">
            <h4 class="title_des" style=" font-size:30px;
            font-weight:bold;padding:15px;color:white">{{$post->title}}</h4>
            <p class="des" style="padding:15px;">{{$post->description}}</p>
            <button  class="btn btn-danger"><a href="{{url('my_post_del',$post->id)}}" >Delete</a></button>
            <button  class="btn btn-primary"><a href="{{url('my_post_up',$post->id)}}" >Update</a></button>
      </div>
      @endforeach
      </div>
     
      <!-- footer section start -->
     @include('home.footer')
    </body>
</html>