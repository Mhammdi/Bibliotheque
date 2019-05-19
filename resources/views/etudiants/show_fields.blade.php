<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $etudiant->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $etudiant->name !!}</p>
</div>

<!-- Adresse Field -->
<div class="form-group">
    {!! Form::label('adresse', 'Adresse:') !!}
    <p>{!! $etudiant->adresse !!}</p>
</div>

<!-- Universite Field -->
<div class="form-group">
    {!! Form::label('universite', 'Universite:') !!}
    <p>{!! $etudiant->universite !!}</p>
</div>

<!-- Cursus Field -->
<div class="form-group">
    {!! Form::label('cursus', 'Cursus:') !!}
    <p>{!! $etudiant->cursus !!}</p>
</div>

<!-- Nombre Emprunts Field -->
<div class="form-group">
    {!! Form::label('nombre_emprunts', 'Nombre Emprunts:') !!}
    <p>{!! $etudiant->nombre_emprunts !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $etudiant->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $etudiant->updated_at !!}</p>
</div>

