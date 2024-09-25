@extends('layouts.cmsLayout')

@section('content')
<div class="cms-home">
    <div class="motto mb-5">
        <form class="welcome-motto-form" method="POST" action="{{route('cms.updateMotto')}}">
            @csrf
            <div class="mb-3">
                <label for="motto" class="form-label">Update Welcome Motto</label>
                <input type="text" class="form-control" id="motto" name="motto" aria-describedby="motto" @error('motto') is-invalid @enderror>
                @error('motto')
                <small class="pt-1" style="color: red; float: right">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="current-motto mt-5">
            <h5 class="mb-3">Current Motto:</h5>
            <h5>{{$motto ? $motto->motto : "Your Local Girl Gang"}}</h5>
        </div>
    </div>
    <hr class="mb-5" />
    <div class="cms-meet-fam">
        <form class="meet-fam-form" method="POST" action="{{route('cms.updateDescription')}}">
            @csrf
            <div class="mb-3">
                <label for="family_description" class="form-label">Update "Meet Family" Description</label>
                <textarea class="form-control" id="family_description" name="family_description" aria-describedby="family_description" rows="5" @error('family_description') is-invalid @enderror></textarea>
                @error('family_description')
                <small class="pt-1" style="color: red; float: right">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="current-motto mt-5">
            <h5 class="mb-3">Current Description:</h5>
            <p>{{$description ? $description->description : "Add description"}}</p>
        </div>
    </div>
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
</script>
@endsection
