@extends('layouts.cmsLayout')

@section('content')
    <div class="cms-settings">
        <div class="header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Update Password</h5>
        </div>
        <hr />
        <form method="POST" action="{{route('cms.updatePassword')}}" class="w-50 mb-4">
            @csrf
            <div class="mb-3">
                <label for="admin-email" class="form-label">Admin Email</label>
                <input type="email" class="form-control" id="admin-email" value="{{$adminEmail}}" readonly disabled>
            </div>
            <div class="mb-3">
                <label for="current-password" class="form-label">Current Password</label>
                <input type="password" name="current_password" class="form-control" id="current-password">
                <small id="verifyCurrentPwd" class="pt-1" style="color: red">
                    @if(Session::has('error_message'))
                       {{Session::get('error_message')}}
                    @endif
                </small>
            </div>
            <div class="mb-3">
                <label for="new-password" class="form-label">New Password</label>
                <input type="password" name="new_password" class="form-control" id="new-password">
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirm-password">
                <small id="confirmNewPwd" class="pt-1"></small>
            </div>
            <button type="submit" class="btn btn-primary" id="submitPwdUpdate" disabled>Submit</button>
        </form>
        <div class="header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Information</h5>
        </div>
        <hr />
        <form action="">
            <div class="mb-3 info-group">
                <div>Address:</div>
                <p>Augusta Place</p>
                <input type="text" class="form-control" >
                <button class="btn btn-warning">Edit</button>
            </div>
        </form>
    </div>

    <script>

        @if(session('success'))
            toastr.options = {
            'closeButton': true,
            'timeOut': 1500,
            'positionClass': 'toast-bottom-right'
        }
        toastr.success("{{Session::get('success')}}");
        @endif

        $('#new-password, #confirm-password').keyup(function(){
            if(($('#confirm-password').val() === '' || $('#new-password').val() === '') || ($('#confirm-password').val() !== $('#new-password').val())){
                $('#confirmNewPwd').css('color', 'red');
                $('#confirmNewPwd').html("Passwords don't match")
                $('#submitPwdUpdate').prop('disabled', true);
            }else{
                $('#confirmNewPwd').css('color', 'green');
                $('#confirmNewPwd').html("Passwords match")
                $('#submitPwdUpdate').prop('disabled', false);
            }
        })
    </script>
@endsection

