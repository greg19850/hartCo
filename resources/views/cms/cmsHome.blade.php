@extends('cmsLayout')

@section('content')

<div class="cms-home">
    <form class="welcome-motto-form">
        <div class="mb-3">
            <label for="welcome-motto" class="form-label">Change Welcome Motto</label>
            <input type="text" class="form-control" id="welcome-motto" aria-describedby="welcome-motto">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="current-motto mt-5">
        <h5 class="mb-3">Current Motto:</h5>
        <h3>Your Local Girl Gang</h3>
    </div>
</div>
@endsection
