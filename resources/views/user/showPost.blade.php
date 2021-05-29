<x-pagelayout>
<div class="container ml-8 mt-3">
    <h2>Show Post for {{$post->title}}</h2>
</div>
 {{-- <h1>Show Post for {{$post->title}}</h1> --}}
 <div class="container mt-5">
     <img src="{{asset('images/posts/'.$post->image)}}" alt="" height="500px" width="500px" class="mr-3">
     <p class="mt-3">{{$post->content}}</p>
     <div class="text-center">

        @can("premiumAdminPostowner",$post->id)
            <a href="{{url('/posts/edit/'.$post->id)}}" class="btn btn-success">Edit Post</a>
            <a href="{{url('/posts/delete/'.$post->id)}}" class="btn btn-danger ml-3">Delete Post</a>
        @endcan
        
    </div>
 </div>
</x-pagelayout>