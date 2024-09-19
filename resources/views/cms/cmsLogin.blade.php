<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <title>Hart & Co</title>
</head>
<body>
<div class="mx-auto mt-5" style="width: 400px">
    <form  method="POST" action="{{ route('cms.login') }}">
        @csrf
        <div class="mb-3 cms-login">
            <label for="admin-email" class="form-label">Email</label>
            <input type="email" class="form-control" id="admin-email" name="email">
        </div>
        <div class="mb-3">
            <label for="admin-password" class="form-label">Password</label>
            <input type="password" class="form-control" id="admin-password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    @if($errors->any())
        <ul class="alert alert-danger mt-3" style="list-style: none">
            @foreach($errors->all() as $error)
                <li class="fw-bold">{{$error}}</li>
            @endforeach
        </ul>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    @if(Session::has('error_message'))
        toastr.options = {
        'closeButton': true,
        'timeOut': 1500,
        'positionClass': 'toast-bottom-right'
        }
        toastr.error("{{Session::get('error_message')}}");
    @endif
</script>
</body>
</html>


