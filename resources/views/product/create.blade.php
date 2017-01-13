@extends('layouts.master')
@section('custom_styles')
@endsection
@section('content')

    <div class="container-fluid">
        <br>
        <div class="col-sm-6 col-sm-offset-3">
            {!! Form::open(['route'=>'rStoreProduct','method'=>'POST','id'=>'frmCreate','class'=>'form-horizontal','files'=>'true']) !!}
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><strong>Create Product</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="form-group-sm">
                        <label for="" class="control-label">name</label>
                        <input name="name" type="text" class="form-control input-sm" value="{{ old('name') }}">
                    </div>
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for="" class="control-label">quantity</label>
                            <input name="quantity" type="text" class="form-control input-sm"
                                   value="{{ old('quantity') }}">
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for="" class="control-label">price</label>
                            <input name="price" type="text" class="form-control input-sm" value="{{ old('price') }}">
                        </div>
                    </div>
                    <div class="form-group-sm">
                        <label class="control-label">load image</label>
                        <div class="col-sm-12">
                            <div class="row">
                                <label for="idImage" class="btn btn-sm btn-default btn-block">
                                    <input id="idImage" name="image" type="file" class="input-sm"
                                           value="{{ old('image') }}">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-sm">
                        <label for="" class="control-label">description</label>
                        <textarea name="description" type="text"
                                  class="form-control input-sm">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="panel-body row">
                    <div class="col-sm-6 text-left">
                        <a href="{{ route('rIndexProduct') }}" class="btn btn-sm btn-default myBtnHoverSuccess"><span
                                    class="glyphicon glyphicon-menu-hamburger"></span>&nbsp;&nbsp;list</a>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button type="submit" class="btn btn-sm btn-default"><span
                                    class="glyphicon glyphicon-floppy-save"></span>&nbsp;&nbsp;save
                        </button>
                        <button type="reset" class="btn btn-sm btn-default myBtnHoverDanger"><span
                                    class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;cancel
                        </button>
                    </div>
                    @include('layouts.firma')
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@section('custom_scripts')

@endsection
@endsection