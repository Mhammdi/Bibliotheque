<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Adresse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse', 'Adresse:') !!}
    {!! Form::text('adresse', null, ['class' => 'form-control']) !!}
</div>

<!-- Universite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('universite', 'Universite:') !!}
    <?php
    if (Auth::user()->niveau == 1) {
        echo Form::select('universite', ['FSTG' => 'FSTG'], null, ['class' => 'form-control']);
    } else if (Auth::user()->niveau == 2) {
        echo Form::select('universite', ['FSSM' => 'FSSM'], null, ['class' => 'form-control']);
    } else {
        echo Form::select('universite', ['FSTG' => 'FSTG', 'FSSM' => 'FSSM'], null, ['class' => 'form-control']);
    }

    ?>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('cne', 'CNE:') !!}
    {!! Form::text('cne', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::text('password', null, ['class' => 'form-control']) !!}
</div>

<!-- Cursus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cursus', 'Cursus:') !!}
    {!! Form::text('cursus', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Emprunts Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_emprunts', 'Nombre Emprunts:') !!}
    {!! Form::number('nombre_emprunts', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('etudiants.index') !!}" class="btn btn-default">Cancel</a>
</div>