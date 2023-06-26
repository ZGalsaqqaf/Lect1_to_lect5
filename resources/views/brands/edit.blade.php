@extends('shared.layout')

@section('content')

<a href="{{route('brands.index')}}" class="btn btn-primary mx-4 float-right">Brand List</a>

<h1 class="mx-4">Edit Brand</h1>


<form class="mx-5" method="post" action="{{route('brands.update', $brand)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" 
        value="{{old('name', $brand)}}" placeholder="Enter Name">
       
        @error('name')
        <div class="alert alert-danger"> {{$message}} </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">Image</label>
        
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" 
        id="image" value="{{old('image', $brand)}}" placeholder="Enter image"
        accept="image/*" > 
        
        <img width="100" class="p-2 " src="{{url('storage/',$brand->image)}}" alt="{{$brand->name}}">
        
        @error('image')
        <div class="alert alert-danger"> {{$message}} </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection