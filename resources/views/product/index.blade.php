@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="col-sm-12">
                    <h1><strong>List Products</strong></h1>
                    <a href="{{ route('rCreateProduct') }}" class="btn btn-sm btn-default myBtnHoverInfo"><span
                                class="glyphicon glyphicon-plus"></span>&nbsp;Add Product</a>
                </div>
            </div>
            <div class="col-sm-6">
                @include('layouts.firma')
            </div>
        </div>
        <div class="col-sm-12">
            <br>
            @foreach($Products->chunk(3) as $values){{--chunk : modifica el bootstrap en una division de 3 --}}
            <div class="row">
                @foreach($values as $product)
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <div class="text-center">
                                <h4>{{ strtoupper($product->name) }}</h4>
                            </div>
                            <img src="{{ asset('/load_images/origin/'.$product->image) }}" alt="auto" width="250">
                            <br>
                            <div class="text-center">
                                <a href="{{ route('rEditProduct',$product->id) }}" class="btn btn-sm btn-default "><span
                                            class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit</a>
                                <a href="{{ route('rShowProduct',$product->id) }}" class="btn btn-sm btn-default "><span
                                            class="glyphicon glyphicon-oil"></span>&nbsp;&nbsp;See</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
        </div>

    </div>
@endsection