<x-adminlayout>
    <form class="text-center border border-light p-5" action="{{route('post_updateUser',$user->id)}}" method="post">
                    @csrf
                    <p class="h4 mb-4 pink-text">Update User</p>
                     <!-- Username -->
                     <input type="text" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Username" name="name" value={{$user->name}}>
                     @error('username')
                        <p class="text-danger">{{$message}}</p>
                     @enderror
                    <!-- Email -->
                    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="email" value={{$user->email}}>
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                     @enderror
                    <!-- isAdmin -->
                    <label for="">isAdmin</label>
                    <select name="isAdmin" id="" class="form-control mb-4" >
                        <option value="1" {{$user->isAdmin=="1" ? "selected" : ""}}>True</option>
                        <option value="0" {{$user->isAdmin=="0" ? "selected" : ""}}>False</option>
                    </select>
                    <!-- isPremium -->
                    <label for="">isPremium</label>
                    <select name="isPremium" id="" class="form-control mb-4">
                        <option value="1" {{$user->isPremium=="1" ? "selected" : ""}}>True</option>
                        <option value="0" {{$user->isPremium=="0" ? "selected" : ""}}>False</option>
                    </select>
                     
                   
                    <!-- Update button -->
                    <button class="btn indigo  white-text btn-block my-4" type="submit">Update User</button>

    </form>
</x-adminlayout>