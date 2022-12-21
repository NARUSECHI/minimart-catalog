@extends('layouts.app')

@section('title','Sections')
    
@section('content')
<div class="row justify-content-center">
    <div class="col-5">
        <h1 class="mt-5">Sections</h1>
        
        <form action="{{ route('section.create')}}" method="post">
            @csrf
            <div class="row gx-2">
                <div class="col">
                    <input type="text" name="name" class="form-control" placeholder="Add new section here..." autofocus>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary text-dark text-white"><i class="fa-solid fa-plus"></i> Add</button>
                </div>
            </div>
        </form>
        @error('name')
            <p class="text-danger">{{$message}}</p>                
        @enderror

        <table class="table table-sm bg-white align-middle text-center mt-3">
            <thead class="table-info table-bordered-1 border-dark">
                <th>ID</th>
                <th>NAME</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($all_sections as $section)
                    <tr>
                        <td>{{$section->id}}</td>
                        <td>{{$section->name}}</td>
                        <td>
                            <button type="button" class="btn btn-outline-danger border-0" data-bs-toggle="modal" data-bs-target="#delete-{{$section->id}}">
                                <i class="fa-solid fa-trash-can text-danger"></i>
                            </button>

                            @include('sections.modal.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection