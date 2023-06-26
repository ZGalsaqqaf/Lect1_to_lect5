@extends('shared.layout')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cards</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        

        @foreach ($companies as $item)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                {{$item['name']}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{$item['price']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
{{-- ------------------------------------------------------------- --}}

        @forelse ($companies as $i=> $item)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                {{$i}}
                                {{$item['name']}}
                                {{$loop->iteration}}
                                {{-- {{dd($loop)}} --}}
                                {{-- {{var_dum($loop)}}  <--error!! --}}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{$item['price']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <p>Not Found</p>
        @endforelse
{{-- ------------------------------------------------------------- --}}

        @php($i=0)
        @while ($i<count($companies))
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                {{$companies[$i]['name']}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{$companies[$i]['price']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @php($i++)
        @endwhile

        {{-- ------------------------------------------------------------- --}}
            @forelse ($companies as $i=> $item)
            <div class="col-xl-3 col-md-6 mb-4">
                <div @class([
                    'card border-left-warning shadow h-100 py-2' =>$item['price']>=40,
                    'card border-left-primary shadow h-100 py-2' =>$item['price']<40,

                    // 'card border-left-warning shadow h-100 py-2' =>$loop->odd,
                    // 'card border-left-primary shadow h-100 py-2' =>$loop->even,
                ])

                @style([
                    'background-color:black' =>$item['price']>=40
                ])
                >
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    {{$item['name']}}
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{$item['price']}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <p>Not Found</p>
            @endforelse

    </div>    
    

</div>

@endsection