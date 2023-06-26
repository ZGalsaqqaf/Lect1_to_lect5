@extends('shared.layout')

@section('content')

<div class="container-fluid">
    <h1>Brands:</h1>

    <a href="{{route('brands.create')}}" class="btn btn-primary mb-5 float-right">Create</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
            <tr>
                <td> {{$brand->name}} </td>

                <td>
                    <img width="100" src="{{url('storage/',$brand->image)}}" alt="{{$brand->name}}">
                </td>

                <td style="width: 180px;">
                        <a href="{{route('brands.edit',$brand)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> تحكم
							</span>
                        </a>

                        <form method="POST" action="{{route('brands.destroy',$brand)}}"
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

    {!! $brands->render() !!}

</div>
@endsection