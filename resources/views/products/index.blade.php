@extends('shared.layout')

@section('content')

<div class="container-fluid">
    <h1>products:</h1>

    <a href="{{route('products.create')}}" class="btn btn-primary mb-5 float-right">Create</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>image</th>
                <th>price</th>
                <th>brand</th>
                <th>catetories</th>
                <th>Description</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td> {{$product->name}} </td>
                <td>
                    <img width="100" src="{{url('storage/',$product->image)}}" alt="{{$product->name}},{{$product->brand->name}}">
                </td>
                <td>{{$product->price}}</td>
                <td>{{$product->brand->name}}</td>
                <td>
                    <div class="d-flex justiry-content-between">
                        @foreach ($product->categories as $category)
                        <span>{{$category->name}}, </span>
                        @endforeach
                    </div>
                </td>
                <td>{{$product->description}}</td>
                <td>{{$product->status}}</td>

                <td style="width: 180px;">
                    <a href="{{route('products.edit',$product)}}">
                        <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                            <span class="fas fa-wrench "></span> تحكم
                        </span>
                    </a>

                    <form method="POST" action="{{route('products.destroy',$product)}}"
                          class="d-inline-block">
                        @csrf
                        @method("DELETE")
                        <button class="btn  btn-outline-danger btn-sm font-1 mx-1"
                                onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');
                     if(result){}else{event.preventDefault()}">
                            <span class="fas fa-trash "></span> حذف
                        </button>
                    </form>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $products->render() !!}

</div>
@endsection