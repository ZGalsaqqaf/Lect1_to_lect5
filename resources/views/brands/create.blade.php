@extends('shared.layout')

@section('content')

<a href="{{route('brands.index')}}" class="btn btn-primary mx-4 float-right">Brand List</a>

<h1 class="mx-4">Create Brand</h1>

<form class="mx-5" method="post" action="{{route('brands.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" 
        value="{{old('name')}}" placeholder="Enter Name">
       
        @error('name')
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

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection