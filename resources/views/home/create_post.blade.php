<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.homecss')
      <style type='text/css'>
        .title-des{
            font-weight: bold;
            font-size:30px;
            padding:30px;
            text-align:center;
            
        }
        .des{
            margin-top:'100px';
            
        }
      </style>
    </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
         <!-- banner section start -->
    


      </div>
   
      <div class="col-md-12" style="margin-left:400px; padding-top:200px">
         <h3 style="font-size:30px; font-weight:bold">Add Post</h3>
       <form  action="{{url('user_post')}}" method="post" enctype="multipart/form-data">
         @csrf
         <div style="margin:0 auto">
             <label>Title</label><br>
             <input type="text" name="title">
         </div>
         <div style="margin:0 auto">
             <label>Description</label><br>
             <textarea name="description"></textarea>
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
             <button type="submit" class="mt-3 btn btn-success" value="Add Post">Add Post</button>
         
       </form>

      </div>
      
      
      
     
    
      <!-- footer section start -->
     @include('home.footer')
    </body>
</html>