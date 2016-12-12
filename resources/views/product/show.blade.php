@extends('layouts.master')
@section('custom_styles')
@endsection
@section('content')

    <div class="container-fluid" data-form="deleteForm">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <br>
        <div class="col-sm-6 col-sm-offset-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-12 text-center">
                        <h1>{{ strtoupper($Product->name) }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <br>
                <div class="text-center">
                    <img src="{{ asset('/load_images/origin/'.$Product->image) }}" alt="auto" width="250">
                </div>
                <br>
                <br>
                <p class="text-justify text-muted text-uppercase">{{ $Product->description }}</p>
                <br>
                <br>
            </div>
            <div class="panel-body row ">
                <div class="col-sm-6 text-left">
                    <a href="{{ route('rIndexProduct') }}" class="btn btn-sm btn-default myBtnHoverSuccess"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;list</a>
                    <a href="{{ route('rCreateProduct') }}" class="btn btn-sm btn-default myBtnHoverInfo"><span class="glyphicon glyphicon-plus"></span>&nbsp;add</a>
                </div>
                <div class="col-sm-6 text-right" >
                    <a href="{{ route('rEditProduct',$Product->id) }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;edit</a>
                    <a href="{{ route('rDeleteProduct',$Product->id) }}" class="btn btn-sm btn-default myBtnHoverDanger form-delete"  data-method="delete" data-confirm="Está seguro de eliminar el registro?" ><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;delete</a>
                </div>
                @include('layouts.firma')
            </div>
        </div>
    </div>

@include('layouts.form_del_upd')

@section('custom_scripts')
@endsection
@endsection