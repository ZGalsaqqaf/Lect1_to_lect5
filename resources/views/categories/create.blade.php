@extends('shared.layout')

@section('content')

<a href="{{route('categories.index')}}" class="btn btn-primary mx-4 float-right">Category List</a>

<h1 class="mx-4">Create Category</h1>

<form class="mx-5" method="post" action="{{route('categories.store')}}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Enter Name">
    </div>
    @error('name')
        <div class="alert alert-danger"> {{$message}} </div>
    @enderror

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
         placeholder="Enter Description">{{old('description')}}</textarea>
    </div>

    <div class="">
        <input type="radio" class="" name="type" 
        @checked(old('type')=='New' || old('type')==null) value="New" id="customRadio" > 
        <label class="mr-5" for="customRadio">New</label>

        <input type="radio" class="mx-5" name="type"
        @checked(old('type')=='Old') value="Old" id="customRadio2"> 
        <label class="" for="customRadio2">Old</label>
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