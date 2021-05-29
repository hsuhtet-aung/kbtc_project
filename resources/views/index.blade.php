<x-pagelayout>

<!-- //background -->
    <header></header>
    <!-- posts -->
    <div class="container">
    <h1 class="mt-3">All posts</h1>
       <div class="row">
       @foreach($posts as $post)
            <div class="col-md-4 mt-4">
            <!-- Card -->
                <div class="card">

                <!-- Card image -->
                <div class="view overlay">
                <img class="card-img-top" src="{{asset('images/posts/'.$post->image)}}"
                    alt="Card image cap" height="180px" width="120px">
                <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                </a>
                </div>
            
                <!-- Card content -->
                <div class="card-body">
            
                <!-- Title -->
                <h4 class="card-title">{{$post->title}}</h4><p>posted by ( {{$post->user->name}})</p>
                <!-- Button -->
                <a href="{{url('/posts/'.$post->id)}}" class="btn btn-primary">See more</a>
            
                </div>
            
            </div>
    <!-- Card -->
        </div>


        @endforeach
        {{$posts->links()}}
       </div>
    </div>

</x-pagelayout>

