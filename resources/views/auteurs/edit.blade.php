@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Auteur
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($auteur, ['route' => ['auteurs.update', $auteur->id], 'method' => 'patch']) !!}

                        @include('auteurs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection