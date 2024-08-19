<div class="services_section layout_padding" 
         <div class="container">
            <h1 class="services_taital">Blog Posts</h1>
            <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
            <div class="services_section_2">
               <div class="row">
               @foreach($post as $post)   
               <div class="col-md-4" style="padding:20px">
                     <div><img src="/postimage/{{$post->image}}" style="margin-bottom:20px;height:200px" width="350px" class="services_img"></div>
                     <h4>{{$post->title}}</h4>
                     <p>Posted by  {{$post->usertype}}</p>
                     <a href="{{url('post_details',$post->id)}}"><button class="btn btn-primary">Read More</button></a>
                  </div>
                  @endforeach
               </div>
            </div>
    
            
         </div>
      </div>