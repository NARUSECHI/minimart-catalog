@extends('layouts.app')

@section('title','Admin')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-10">
        <h3>All Users</h3> 
        <table class="table my-5 table-sm text-center align-middle bg-white">
            <thead class="table-warning">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>IMAGE</th>
                    <th>HOW LONG</th>
                    <th>ROLE</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            @if ($user->image)
                                <img src="{{ asset('storage/user/'.$user->image)}}" alt="{{$user->image}}" class="img-sm"></td>
                            @else
                                <img src="{{ asset('storage/'.'no_picture.jpg')}}" alt="no-picture" class="img-sm">
                            @endif
                        <td>{{$user->how_long}}</td>
                        <td>
                            @if ($user->role_id === 1)
                                Admin                                
                            @else
                                General
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-outline-danger border-0" type="button" data-bs-toggle="modal" data-bs-target="#delete-user-{{$user->id}}"><i class="fa-solid fa-trash-can"></i></button>
                            @include('admin.modal.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>   
    </div>  
</div>  
@endsection