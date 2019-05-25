@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Ouvrage
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
               
                {!! Form::model($ouvrage, ['route' => ['ouvrages.update', $ouvrage->id], 'method' => 'patch','files' => true]) !!}

                @include('ouvrages.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection