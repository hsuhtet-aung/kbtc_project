<x-adminlayout>
    <h1>Manage Premium Users</h1>
    <div class="container">
        <table class="table table-hover">
            <thead class="indigo white-text">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">email</th>
                <th scope="col">isAdmin</th>
                <th scope="col">isPremium</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
              <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><b>{{$user->isAdmin=='0'? "FALSE":"TRUE"}}</b></td>
                <td><b>{{$user->isPremium =='0'? "FALSE":"TRUE"}}</b></td>
                <td><a href="{{route('updateUser',$user->id)}}" class="btn green white-text btn-sm">Update</a></td>
                <td><a href="{{route('deleteUser',$user->id)}}" class="btn red white-text btn-sm">Delete</a></td>
              </tr>
            @endforeach
              
            </tbody>
            
          </table>
       {{$users->links()}}
    </div>
  </x-adminlayout>