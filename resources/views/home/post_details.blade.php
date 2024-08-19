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
         <div style="text-align:center;margin:0 auto" class="col-md-8">
                     <div><img src="/postimage/{{$post->image}}" style="padding:20px; height:400px;" class="services_img"></div>
                     <h3><b>{{$post->title}}</b></h3>
                      <h4>{{$post->description}}</h4>   
                     <p>Post by <b>{{$post->usertype}}</b></p>
                  </div>
      <!-- footer section start -->
     @include('home.footer')
    </body>
</html>