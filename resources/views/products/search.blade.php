@extends('layouts.app')

@section('title','Products')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="row mt-3">
            <div class="col-auto">
                <h1 class="text-secondary">Results for: "{{$search}}"</h1>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-auto px-5">
                <a href="{{ route('create') }}" class="btn btn-success text-white form-control">
                    <i class="fa-solid fa-plus"></i> New Product
                </a>
            </div>
            <div class="col-5 ms-auto">
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <div class="row gx-2">
                        <div class="col"><input type="search" name="search" id="search" class="form-control" autofocus></div>
                        <div class="col-auto"><button type="submit" class="btn btn-outline-success form-control">Search</button></div>
                    </div>      
                </form>
            </div>  
        </div>

        <div class="d-flex justify-content-center">
            <table class="table table-sm text-center align-middle mt-3">
                <thead class="table-success table-bordered border-dark">
                    <td>ID</td>
                    <td>NAME</td>
                    <td>IMAGE</td>
                    <td>DESCRIPTION</td>
                    <td>PRICE</td>
                    <td>SECTION</td>
                    <td></td>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <th>{{$product->name}}</th>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('storage/images/'.$product->image) }}" alt="{{$product->image}}" class="img-sm">
                                @else
                                    <img src="{{ asset('storage/'.'no_picture.jpg')}}" alt="no-picture" class="img-sm">
                                @endif
                            </td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->section->name}}</td>
                            <td>
                                <a href="{{ route('edit',$product->id) }}" class="btn btn-outline-secondary border-0"><i class="fa-solid fa-pen"></i></a>
                                <button class="btn btn-outline-danger border-0" data-bs-toggle="modal" data-bs-target="#delete-product-{{$product->id}}"><i class="fa-solid fa-trash-can"></i></button>
                                @include('products.modal.delete')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>   
        </div>     
@endsection