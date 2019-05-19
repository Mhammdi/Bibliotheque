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

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', 'Statut:') !!}
    {!! Form::select('statut', ['agent' => 'agent', 'maganisier' => 'maganisier', 'accueil' => 'accueil'], null, ['class' => 'form-control']) !!}
</div>

<!-- Affectation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('affectation', 'Affectation:') !!}
    {!! Form::select('affectation', ['FSTG' => 'FSTG', 'FSSM' => 'FSSM'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('employes.index') !!}" class="btn btn-default">Cancel</a>
</div>
