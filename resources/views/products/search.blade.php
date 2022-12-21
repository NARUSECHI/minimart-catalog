@extends('layouts.app')

@section('title','Products')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="row mt-3">
            <div class="col-auto">
                <h1>Result:{{$search}}</h1>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('create') }}" class="btn btn-success text-white form-control">
                    <i class="fa-solid fa-plus"></i> New Product
                </a>
            </div>
        </div>

        <div class="my-4">
            <div class="row">
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <div class="col-6"><input type="search" name="search" id="search" class="form-control"></div>
                    <div class="col-2"><button type="submit" class="btn btn-primary form-control">Search</button></div>      
                </form>         
            </div>
        </div>

        <table class="table table-success align-text-center mt-3">
            <thead>
                <td>ID</td>
                <td>NAME</td>
                <td>IMAGE</td>
                <td>DESCRIPTION</td>
                <td>PRICE</td>
                <td>SECTION</td>
                <td></td>
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
                            <a href="{{ route('edit',$product->id) }}" class="btn btn-secondary"><i class="fa-solid fa-pen"></i></a>
                        </td>
                        <td>
                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-product-{{$product->id}}"><i class="fa-solid fa-trash-can"></i></button>
                            @include('products.modal.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
@endsection