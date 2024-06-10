<li class="nav-item has-treeview">
    <a class="nav-link nav-link {{ Request::is('competences*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Gestion des Competences
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @can('index-CategorieTechnologieController')
            <li class="nav-item ">
                <a href="{{ route('CategorieTechnologie.index') }}"
                class="nav-link nav-link {{ Request::is('CategorieTechnologie*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-table"></i>
                    <p>Categorie technologie</p>
                </a>
            </li>
        @endcan
        <li class="nav-item ">
            <a href="{{ route('competence.index') }}"
                class="nav-link nav-link {{ Request::is('competence*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Gestion Competences</p>
            <a href="{{ route('technologies.index') }}"
                class="nav-link nav-link {{ Request::is('technologies*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Technologies</p>
            </a>
            <a href="{{ route('Appreciation.index') }}"
                class="nav-link nav-link {{ Request::is('Appreciation*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Appreciation</p>
            </a>
            <a href="{{ route('CategorieTechnologie.index') }}"
                class="nav-link nav-link {{ Request::is('CategorieTechnologie*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Categorie Technologie</p>
            </a>
            <a href="{{ route('NiveauCompetence.index') }}"
                class="nav-link nav-link {{ Request::is('NiveauCompetence*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Niveau Competence</p>
            </a><a href="{{ route('Filiere.index') }}"
                class="nav-link nav-link {{ Request::is('Filiere*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Filiere</p>
            </a>
            <a href="{{ route('Module.index') }}"
                class="nav-link nav-link {{ Request::is('Module*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Module</p>
            </a>
        </li>
    </ul>
</li>
