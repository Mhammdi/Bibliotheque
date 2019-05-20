









<li class="{{ Request::is('etudiants*') ? 'active' : '' }}">
    <a href="{!! route('etudiants.index') !!}"><i class="fa fa-edit"></i><span>Etudiants</span></a>
</li>

<li class="{{ Request::is('employes*') ? 'active' : '' }}">
    <a href="{!! route('employes.index') !!}"><i class="fa fa-edit"></i><span>Employes</span></a>
</li>


<li class="{{ Request::is('auteurs*') ? 'active' : '' }}">
    <a href="{!! route('auteurs.index') !!}"><i class="fa fa-edit"></i><span>Auteurs</span></a>
</li>




<li class="{{ Request::is('ouvrages*') ? 'active' : '' }}">
    <a href="{!! route('ouvrages.index') !!}"><i class="fa fa-edit"></i><span>Ouvrages</span></a>
</li>

