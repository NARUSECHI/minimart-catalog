@extends('layouts.app')

@section('title','Profile')

@section('content')
<div class="d-flex justify-content-center mt-5 bg-white border border-1 p-3 border-rounded rounded-3">
    <div class="col-10">
        <div class="row gx-1">
            <div class="col-5">
                @if ($user->image)
                    <img src="{{asset('storage/user/'.$user->image)}}" alt="{{$user->image}}" class="img-lg rounded-circle border border-success">
                @else
                    <img src="{{ asset('storage/'.'no_picture.jpg')}}" alt="no-picture" class="img-lg rounded-circle img-thumnbail">
                @endif 
            </div>
        
            <div class="col-5 m-auto">
                <div class="my-2">
                    <h3><span class="text-muted">Name:</span> {{$user->name}}</h3>
                </div>
                <div class="my-2">
                    <h3><span class="text-muted">Working Duration: </span> {{$user->how_long}} year</h3>
                </div>
                <div class="my-2">
                    <h3><span class="text-muted">Role: </span> 
                    @if ($user->roke_id===1)
                        Admin</h3>
                    @else
                        General</h3>
                    @endif
                </div>
                <div class="row mt-5 mb-2">
                    @if (Auth::user()->id === $user->id)
                    <div class="col">
                        <a href="{{ route('profile.edit',Auth::user()->id)}}" class="btn btn-success form-control">Edit</a>
                    </div>             
                    @endif
                </div>
            </div>
        </div>
    </div>     
</div>
@endsection