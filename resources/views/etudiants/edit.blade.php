@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Etudiant
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($etudiant, ['route' => ['etudiants.update', $etudiant->id], 'method' => 'patch']) !!}

                        @include('etudiants.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection