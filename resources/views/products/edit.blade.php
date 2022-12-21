@extends('layouts.app')

@section('title','Edit Product')

@section('content')
<div class="container-lg mt-3">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 border border-1 p-0">
            <h3 class="text-white bg-dark p-2">Edit Product</h3>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <form action="{{ route('update',$product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="title my-1">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$product->name) }}" >
                        </div>
                        <div class="my-1">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>                                
                            @enderror
                        </div>
                        <div class="my-1">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        
                        <div class="my-1">
                            @error('image')
                                <p class="text-danger">{{$message}}</p>                                
                            @enderror
                        </div>

                        <div class="description my-1">
                            <label for="description">Desciption</label>
                            <textarea name="description" id="description" rows="10" class="form-control" >{{ old('description',$product->description)}}</textarea>
                        </div>
                        <div class="my-1">
                            @error('description')
                                <p class="text-danger">{{$message}}</p>                                
                            @enderror
                        </div>

                        <div class="price  my-1 ">
                            <label for="price">Price</label>
                            <div class="row ms-1">
                                <div class="col-1 bg-secondary  pe-0 border border-1 border-end-0 rounded-start">
                                    <p class="mx-1 my-1">$</p>
                                </div>
                                <div class="col ps-0">
                                    <input type="number" name="price" id="price"
                                        class="form-control rounded-0 rounded-end" value="{{ old('price',$product->price)}}" step="0.01">
                                </div>
                            </div>
                            <div class="my-1">
                                @error('price')
                                    <p class="text-danger">{{$message}}</p>                                
                                @enderror
                            </div>
                        </div>
                        
                        <div class="section mt-1">
                            <label for="section">Section</label>
                            <select name="section_id" id="section" class="form-select">
                                <option value="" hidden>Select Section</option>
                                @foreach ($all_sections as $section)
                                    <option value="{{ $section->id }}" @if( $section->id=== $product->section_id) selected @endif>{{ $section->name }}</option>
                                @endforeach
                                </select>
                                @if ($all_sections->isEmpty())
                                    <a href="{{ route('section.index') }}" class="text-decoration-none">Add a new section</a>
                                @endif                            
                        </div>
                        <div class="my-1">
                            @error('section')
                                <p class="text-danger">{{$message}}</p>                                
                            @enderror
                        </div>

                        <div class="mt-4 mb-5">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="{{ route('index') }}" class="btn btn-outline-dark">
                                        Cancel
                                    </a>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-dark text-white" style="width:150px;">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection