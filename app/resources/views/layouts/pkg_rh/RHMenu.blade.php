<!-- Gestion RH -->
<li class="nav-item has-treeview">
    <a href="#"
        class="nav-link {{ Request::is('RH*') ? 'active' : '' }}" >    
        <i class="fa-solid fa-people-group"></i>
        <p>
        Gestion RH
        <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{route('Formateur.index')}}"
            class="nav-link {{ Request::is('Formateur*') ? 'active' : '' }}">
            <i class="fa-solid fa-chalkboard-user"></i>
            <p>Gestion Formateurs</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{route('Apprenant.index')}}"
            class="nav-link {{ Request::is('Apprenant*') ? 'active' : '' }}">
            <i class="fa-solid fa-users"></i>
            <p>Gestion Apprenants</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{route('Apprenant.index')}}" class="nav-link {{ Request::is('Ville*') ? 'active' : '' }} ">
            <i class="fa-solid fa-city"></i>
            <p>Gestion Villes</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{route('Apprenant.index')}}" class="nav-link {{ Request::is('Ville*') ? 'active' : '' }}" >
        <i class="fa-solid fa-table"></i>
            <p>Gestion Groupes</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{route('Apprenant.index')}}"
            class="nav-link {{ Request::is('Ville*') ? 'active' : '' }}''; ?>">
            <i class="fa-solid fa-book"></i>
            <p>Gestion Niveaux Scolaire</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{route('Apprenant.index')}}"
            class="nav-link {{ Request::is('Ville*') ? 'active' : '' }}>">
            <i class="nav-icon fas fa-th"></i>
            <p>Gestion Spécialité</p>
        </a>
        </li>
    </ul>
</li>
