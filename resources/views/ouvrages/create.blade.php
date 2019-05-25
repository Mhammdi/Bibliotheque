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
                    <form method="POST" action="{{ url('ouvrages')}}" enctype="multipart/form-data">
                        @csrf

                        @include('ouvrages.fields')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
