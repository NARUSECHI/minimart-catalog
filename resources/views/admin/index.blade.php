@extends('layouts.app')

@section('title','Admin')

@section('content')
    <div class="col-10">
        <h3>All Users</h3> 
        <table class="table my-5 table-sm text-center align-middle">
            <theader class="bg-warning">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>IMAGE</th>
                    <th>HOW LONG</th>
                    <th>ROLE</th>
                </tr>
            </theader>
            <tbody>
                @foreach ($all_users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            @if ()
                                <img src="#" alt="{{$user->image}}"></td>
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
                    </tr>
                @endforeach
                
                
            </tbody>
        </table>   
    </div>    
@endsection