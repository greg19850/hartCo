@extends('layouts.cmsLoginLayout')

@section('content')
    <div class="forget-password">
        <div class="header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Reset Password</h5>
        </div>
        <hr />
        <p class="forget-password-text mb-3">We will send a link to your email address. Use that link to reset password.</p>
        <form class="forget-password-form" method="POST" action="{{ route('cms.forgetPasswordPost') }}">
            @csrf
            <div class="mb-3 cms-login">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Send Link</button>
        </form>
        @if($errors->any())
            <ul class="forget-pwd-errors alert alert-danger mt-3">
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

