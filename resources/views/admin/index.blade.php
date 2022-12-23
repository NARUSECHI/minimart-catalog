@extends('layouts.app')

@section('title','Admin')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-10">
        <h3>Active Users</h3> 
        <table class="table my-5 table-sm text-center align-middle bg-white">
            <thead class="table-warning">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>IMAGE</th>
                    <th>HOW LONG</th>
                    <th>ROLE</th>
                    <th>Deactivate</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($active_users as $user)
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
                            <button class="btn btn-outline-warning border-0 fs-3" type="button" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{$user->id}}"><i class="fa-solid fa-user-check"></i></button>
                            @include('admin.modal.deactivate')
                        </td>
                        <td>
                            <button class="btn btn-outline-danger border-0 fs-3" type="button" data-bs-toggle="modal" data-bs-target="#delete-user-{{$user->id}}"><i class="fa-solid fa-trash-can"></i></button>
                            @include('admin.modal.destroy')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>   
        <h3>Inactive Users</h3> 
        <table class="table my-5 table-sm text-center align-middle bg-white">
            <thead class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>IMAGE</th>
                    <th>HOW LONG</th>
                    <th>ROLE</th>
                    <th>STATUS</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deactive_users as $user)
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
                            <button class="btn btn-outline-secondary border-0 fs-3" type="button" data-bs-toggle="modal" data-bs-target="#activate-user-{{$user->id}}"><i class="fa-solid fa-user-xmark"></i></button>
                            @include('admin.modal.activate')
                        </td>
                        <td>
                            <button class="btn btn-outline-danger border-0 fs-3" type="button" data-bs-toggle="modal" data-bs-target="#delete-user-{{$user->id}}"><i class="fa-solid fa-trash-can"></i></button>
                            @include('admin.modal.destroy')
                        </td>
                    </tr>
                        
                @endforeach
            </tbody>
        </table>   
    </div>  
</div>  
</div>
</div>
@endsection