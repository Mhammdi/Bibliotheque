<!-- Titre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titre', 'Titre:') !!}
    {!! Form::text('titre', null, ['class' => 'form-control']) !!}
</div>

<!-- Editeur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('editeur', 'Editeur:') !!}
    {!! Form::text('editeur', null, ['class' => 'form-control']) !!}
</div>

<!-- Annee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('annee', 'Annee:') !!}
    {!! Form::number('annee', null, ['class' => 'form-control']) !!}
</div>

<!-- Domaine Field -->
<div class="form-group col-sm-6">
    {!! Form::label('domaine', 'Domaine:') !!}
    {!! Form::select('domaine', ['Documentaire' => 'Documentaire', 'Litterature' => 'Litterature', 'Dictionnaire' => 'Dictionnaire', 'Biographique' => 'Biographique', 'Glossaire' => 'Glossaire', 'Nomenclature' => 'Nomenclature', 'Encyclopedie' => 'Encyclopedie', 'Poesie' => 'Poesie'], null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
</div>

<!-- Site Field -->
<div class="form-group col-sm-6">
    {!! Form::label('site', 'Site:') !!}
    {!! Form::select('site', ['FSTG' => 'FSTG', 'FSSM' => 'FSSM'], null, ['class' => 'form-control']) !!}
</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::file('photo') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ouvrages.index') !!}" class="btn btn-default">Cancel</a>
</div>
