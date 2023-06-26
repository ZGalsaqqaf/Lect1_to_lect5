@extends('shared.layout')

@section('content')

<a href="{{route('products.index')}}" class="btn btn-primary mx-4 float-right">Product List</a>

<h1 class="mx-4">Edit Product</h1>

<form class="mx-5" method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Enter Name">
        @error('name')
        <div class="alert alert-danger"> {{$message}} </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
         placeholder="Enter Description">{{old('description')}}</textarea>
    </div>

    <div class="group-form ">
        <label for="brand_id">Brand</label>
        <select class="form-control select2" name="brand_id" id="brand_id">
            <option value="">Select Brand</option>
            @foreach ($brands as $brand)
                <option value="{{$brand->id}}"
                @if (old('brand_id') == $brand->id)
                    selected
                @endif>
                {{$brand->name}}</option>
            @endforeach
            
        </select>
        @error('brand_id')
        <div class="alert alert-danger"> {{$message}} </div>
        @enderror
    </div>

    <div class="group-form">
        <label for="brand_id">categories</label>
        <select class="form-control select2" multiple name="categories[]" id="categories">
            @foreach ($categories as $category)
                <option value="{{$category->id}}"
                {{-- @if (old('categories') == $category->id)
                        selected
                    @endif --}}
                >{{$category->name}}</option>
            @endforeach
            
        </select>
        @error('brand_id')
        <div class="alert alert-danger"> {{$message}} </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">price</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" 
        name="price" id="price" value="{{old('price')}}" placeholder="Enter price">
        @error('price')
        <div class="alert alert-danger"> {{$message}} </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">Image</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" 
        id="image" value="{{old('image')}}" placeholder="Enter image"
        accept="image/*" > 
       
        @error('image')
        <div class="alert alert-danger"> {{$message}} </div>
        @enderror
    </div>

    <div class="form-group form-check">
        <label class="form-check-label">
            <input name="status" type="checkbox" 
            @checked(old('status'))
            class="form-check-input">Status
        </label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection