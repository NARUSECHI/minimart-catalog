@extends('layouts.app')

@section('title','Products')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="row mt-3">
            <div class="col-auto">
                <h1>Products</h1>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('create') }}" class="btn btn-success text-white form-control">
                    <i class="fa-solid fa-plus"></i> New Product
                </a>
            </div>
        </div>

        <table class="table table-success align-text-center mt-3">
            <thead>
                <td>ID</td>
                <td>NAME</td>
                <td>DESCRIPTION</td>
                <td>PRICE</td>
                <td>SECTION</td>
                <td></td>
                <td></td>
            </thead>
            <tbody>
                @foreach ($all_products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <th>{{$product->name}}</th>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->section->name}}</td>
                        <td>
                            <a href="{{ route('edit',$product->id) }}" class="btn btn-secondary"><i class="fa-solid fa-pen"></i></a>
                        </td>
                        <td><button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-product-{{$product->id}}"><i class="fa-solid fa-trash-can"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
@endsection