@extends('layouts.cmsLoginLayout')

@section('content')
    <div class="login-container">
        <form class="cms-login-form" method="POST" action="{{ route('cms.login') }}">
            @csrf
            <div class="login-logo my-3">
                <div class="login-img-container me-4">
                    <x-hart-logo />
                </div>
                <div class="login-logo-text">CMS Panel Login</div>
            </div>
            <div class="mb-3 cms-login">
                <label for="admin-email" class="form-label">Email</label>
                <input type="email" class="form-control" id="admin-email" name="email">
            </div>
            <div class="mb-3">
                <label for="admin-password" class="form-label">Password</label>
                <input type="password" class="form-control" id="admin-password" name="password">
            </div>
            <a class="forgot-pwd-link d-block mb-3" href="{{route('cms.forgetPassword')}}">Forgot password?</a>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        @if($errors->any())
            <ul class="login-errors alert alert-danger mt-3">
                @foreach($errors->all() as $error)
                    <li class="fw-bold">{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <script>
        toastr.options = {
            'closeButton': true,
            'timeOut': 1500,
            'positionClass': 'toast-bottom-right'
        }

        @if(session('success'))
        toastr.success("{{Session::get('success')}}");
        @endif

        @if(Session::has('error'))
        toastr.error("{{Session::get('error')}}");
        @endif
    </script>
@endsection


