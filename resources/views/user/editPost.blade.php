<x-pagelayout>
    <div class="container">
    <h2 class="mt-4 mb-4">Edit Post</h2>
    
        <form class=" border border-light p-5" action="{{route('updatePost',$update_post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
            <label for="">Title</label>
            <input type="text" id="defaultLoginFormPassword" class="form-control mb-4"  name="title" 
            value="{{$update_post->title}}">
            @error("title")
                <p class="text-danger">{{$message}}</p>
            @enderror

            <label for="">Photo</label>
            <input type="file" id="defaultLoginFormPassword" class="form-control mb-4" name="image">
            <img src="{{asset('images/posts/'.$update_post->image)}}" width="300px" height="300px"><br>
             @error("image")
               <p class="text-danger">{{$message}}</p>
            @enderror

            <label for="">Content</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control mb-4">{{$update_post->content}}</textarea>
             @error("content")
              <p class="text-danger">{{$message}}</p>
            @enderror

            <!-- add post -->
            <button class="btn indigo btn-block my-4" type="submit">Update Post</button>
        </form>
<!-- Default form login -->
   </div>
</x-pagelayout>