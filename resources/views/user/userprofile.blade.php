<x-pagelayout>
   <div class="container">
    <h2 class="mt-4 mb-4">User Profile</h2>
    
        <form class=" border border-light p-5" action="{{route("post_userProfile")}}" method="post"
        enctype="multipart/form-data">
        @csrf
            @if(Session('message'))
            <div class="alert alert-success">
                {{Session('message')}}
            </div>
            @endif
            @if(Session('error'))
            <div class="alert alert-danger">
                {{Session('error')}}
            </div>
            @endif
            <label for="">Username</label>
            <input type="text"  name="name"  id="defaultLoginFormEmail" class="form-control mb-4" value="{{auth()->user()->name}}">

            <label for="">Email</label>
            <input type="email"  name="email"  id="defaultLoginFormEmail" class="form-control mb-4" value="{{auth()->user()->email}}">
            
            <label for="">Photo</label>
            <input type="file" id="defaultLoginFormPassword" class="form-control mb-4"  name="image">
            <img src="{{asset('images/profiles/'.auth()->user()->image)}}" width="300px" height="300px"><br>

            <label for="">Old Password</label>
            <input type="password" name="old_password" id="defaultLoginFormPassword" class="form-control mb-4" >

            <label for="">New Password</label>
            <input type="password"  name="new_password" id="defaultLoginFormPassword" class="form-control mb-4" >

            <!-- add post -->
            <button class="btn indigo btn-block my-4" type="submit">Update Profile</button>
        </form>
<!-- Default form login -->
   </div>

</x-pagelayout>