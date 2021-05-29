<x-adminlayout>
    <h1>Check Messages</h1>
    <div class="container">
        <table class="table table-hover">
            <thead class="indigo white-text">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">email</th>
                <th scope="col">Messages</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            @foreach($messages as $message)
               <tr>
                <th scope="row">{{$message->id}}</th>
                <td>{{$message->username}}</td>
                <td>{{$message->email}}</td>
                <td>{{$message->messages}}</td>
                <td><a  href="{{route('updateMessage',$message->id)}}" class="btn green white-text btn-sm">Update</a></td>
                <td><a href="{{route('deleteMessage',$message->id)}}" class="btn red white-text btn-sm">Delete</a></td>
              </tr>
            @endforeach             
            </tbody>
          </table>
          {{$messages->links()}}
    </div>
</x-adminlayout>