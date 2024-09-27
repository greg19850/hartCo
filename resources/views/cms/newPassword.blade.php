@extends('layouts.cmsLoginLayout')

@section('content')
    <div class="reset-password">
        <div class="header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Reset Password</h5>
        </div>
        <hr />
        <form class="reset-password-form" method="POST" action="{{ route('cms.resetPasswordPost') }}">
            @csrf
            <input type="text" name="token" value="{{$token}}" hidden>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" class="form-control" id="new-password" name="new_password">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm New Password</label>
                <input type="password" name="new_password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
        @if($errors->any())
            <ul class="reset-pwd-errors alert alert-danger mt-3">
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
