@extends('layouts.app')

@section('title','Products')

@section('content')
<div class="row justify-content-center">
    <div class="col-5">
        <h1 class="mt-5">Sections</h1>
        <div class="row">
            <form action="{{ route('section.create')}}" method="post">
                @csrf
                <input type="text" name="section" class="form-control" placeholder="Add new section here...">
                <button type="submit" class="btn btn-primary text-dark"><i class="fa-solid fa-plus"></i> Add</button>
            </form>
        </div>

        <table class="table table-primary align-text-center mt-3">
            <thead>
                <th>ID</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>SECTION</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($all_products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#delete-{{$section->id}}">
                                <i class="fa-solid fa-trash-can text-danger"></i>
                            </button>

                            @include('sections.modal.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
@endsection