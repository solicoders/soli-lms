<!-- Gestion RH -->
<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('suivi*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-signal"></i>
        <p>
            Suivi d'avancement
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('suivi.projets') }}" class="nav-link {{ Request::is('suivi/projets*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>Suivi des projets</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link {{ Request::is('suiviCompetences*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-star"></i>
                <p>Suivi des compétences</p>
            </a>
        </li>
    </ul>
</li>
