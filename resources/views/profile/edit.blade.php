@extends('layouts.app')

@section('title','Profile')

@section('content')
<div class="d-flex justify-content-center  bg-white border border-1 p-3">
    <div class="col-6 mt-5">
        <h3>Edit Profile</h3>
        <form action="{{ route('profile.update',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-2 mt-4">
                <label for="name"><strong>NAME</strong></label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name',$user->name)}}">
            </div>
            @error('name')
                <p class="text-danger text-sm">{{$message}}</p>
            @enderror
            <div class="my-2">
                <label for="how_long"><strong>WORKING DURATION</strong></label>
                <input type="number" name="how_long" id="how_long" class="form-control" value="{{old('how_long',$user->how_long)}}">
            </div>
            @error('how_long')
                <p class="text-danger text-sm">{{$message}}</p>
            @enderror
            <div class="my-2">
                <label for="image"><strong>IMAGE</strong></label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            @error('image')
                <p class="text-danger text-sm">{{$message}}</p>
            @enderror
            <div class="mt-2">
                <strong>ROLE: 
                @if ($user->roke_id===1)
                    Admin
                @else
                    General
                @endif
                </strong>
            </div> 
            <div class="my-5">
                <div class="row">
                    <div class="col-auto">
                        <a href="{{route('profile.index',$user->id)}}" class="btn btn-outline-secondary fom-control">Cancel</a>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success form-control">Edit</button>
                    </div>
                </div>    
            </div> 
        </form>
    </div>
</div>    
@endsection