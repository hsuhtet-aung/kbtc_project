<x-authlayout>
    <!-- Material form login -->
    <div class="container mt-5 ">
        <div class="col-md-4 offset-4">
            <!-- Material form register -->
<div class="card">

    <h5 class="card-header pink  white-text text-center py-4">
        <strong>Register</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="{{route('post_register')}}" method="post"
        enctype="multipart/form-data">
        @csrf

            <div class="form-row">
                <div class="col">
                    <!-- username -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormFirstName" class="form-control" name="username" value="{{old('username')}}">
                            @error("username")
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        <label for="materialRegisterFormFirstName">Username</label>
                    </div>
                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form mt-0">
                <input type="email" id="materialRegisterFormEmail" class="form-control" name="email" value="{{old('email')}}">
                    @error("email")
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                <label for="materialRegisterFormEmail">E-mail</label>
            </div>

            <!-- Password -->
            <div class="md-form">
                <input type="password" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="password">
                @error("password")
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <label for="materialRegisterFormPassword">Password</label>
            </div>

            <!-- Comfirm Password -->
            <div class="md-form">
                <input type="password" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="password_confirmation">
                @error("password_confirmation")
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <label for="materialRegisterFormPassword">Confirm Password</label>
            </div>

            <!-- Upload Profile Image -->
            <label for="">Select Your Profile Picture</label>
            <div class="md-form">
                <input type="file" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="image">
                 @error("image")
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <!-- Register button -->
            <button class="btn btn-outline-pink btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Register</button>
            <p>
                <a href="{{route('login')}}">Already registered?</a>
            </p>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->
        </div>
    </div>

<!-- Material form login -->
    
</x-authlayout>