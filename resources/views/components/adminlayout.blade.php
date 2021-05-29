<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    {{-- css file --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Admin Panel</title>

</head>
<body>
    {{-- navigation --}}
    <!--Navbar -->
    <x-navbar></x-navbar>
    {{-- end of navbar--------- --}}
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <ul class="list-group mt-5">
          <li class="list-group-item"><a href="{{route('admin.manage')}}">Manage Premium Users</a></li>
          <li class="list-group-item"><a href="{{route('admin.check')}}">Check Messages</a></li>
        </ul>
      </div>
      <div class="col-md-8">
        {{-- @yield("content") --}}
        {{$slot}}
      </div>
    </div>
  </div>
<!--/.Navbar -->
    
    <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

<script>
  @if(Session("noti"))
  let message = "{{Session("noti")}}";
  toastr.success(message);
  @endif
</script>
</body>
</html>