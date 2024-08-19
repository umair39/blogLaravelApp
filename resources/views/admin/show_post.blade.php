<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .title_des{
            font-size:30px;
            font-weight:bold;
            text-align:center;
            color:white;
            padding:30px;
        }
        .table_des{
            border:1px solid white;
            margin: 0 auto;
            text-align:center;
            width:80%;

        }
        .tr_des{
            background-color:skyblue;
        }
        .img_des{
            height:80px;
            width:140px;
            padding:10px;
        }
        td{
            border-bottom:1px solid white;
        }
    </style>
    </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
     <div class="page-content">
      @if(session()->has('message'))
         <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert"
            area-hidden="true">X</button>
            {{session()->get('message')}}
         </div>
      @endif

        <h1 class="title_des">All Post</h1>

        <table class="table_des">
            <tr class="tr_des">
                <th>Post Title</th>
                <th>Description</th>
                <th>Posted by</th>
                <th>Post Status</th>
                <th>User</th>
                <th>Image</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Status Accept</th>
                <th>Status Reject</th>


            </tr>
            @foreach ($post as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->post_status}}</td>
                <td>{{$post->usertype}}</td>
                <td>
                    <img src="postimage/{{$post->image}}" class="img_des" alt="post_img">
                </td>
                <td>
                    <a href="{{url('delete_post',$post->id)}}" onclick="return confirmation(event)" class="btn-sm btn-danger">Delete</a>
                </td>
                <td>
                  <a href="{{url('edit_post',$post->id)}}" class="btn-sm btn-success">Edit</a>
                </td>
                <td><a href="{{url('accept_post',$post->id)}}"><button class="btn-sm btn-success">Accept</button></a></td>
                <td><a href="{{url('reject_post'.$post->id)}}"><button class="btn-sm btn-danger">Reject</button></a></td>

            </tr>
            @endforeach
        </table>
     </div>
     @include('admin.footer')

     <script type="text/javascript">
        fuction confirmation(ev)
        {
            ev.preventDefault();
            var urlToredirect = ev.currentTarget.getAttribute('href');
            swal({
                title:"Are you sure?",
                text:"You won't be able to recover post data",
                icon:'warning',
                buttons:true,
                dangerMode:true,
            }).then((willCancel)=>{
                if(willCancel){
                   window.location.href = "urlToRedirect";
                }
            })
        }
     </script>
  </body>
</html>