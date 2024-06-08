<!-- Gestion RH -->
<<<<<<< HEAD
@can('index-PersonneController')   
=======
>>>>>>> 2f111a44 (up)
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
<<<<<<< HEAD
        <a href="{{route('Villes.index')}}" class="nav-link {{ Request::is('Villes*') ? 'active' : '' }} ">
=======
        <a href="{{route('Apprenant.index')}}" class="nav-link {{ Request::is('Ville*') ? 'active' : '' }} ">
>>>>>>> 2f111a44 (up)
            <i class="fa-solid fa-city"></i>
            <p>Gestion Villes</p>
        </a>
        </li>
        <li class="nav-item">
<<<<<<< HEAD
        <a href="{{route('Groupes.index')}}" class="nav-link {{ Request::is('Groupes*') ? 'active' : '' }}" >
=======
        <a href="{{route('Apprenant.index')}}" class="nav-link {{ Request::is('Ville*') ? 'active' : '' }}" >
>>>>>>> 2f111a44 (up)
        <i class="fa-solid fa-table"></i>
            <p>Gestion Groupes</p>
        </a>
        </li>
        <li class="nav-item">
<<<<<<< HEAD
        <a href="{{route('NiveauxScolaire.index')}}"
            class="nav-link {{ Request::is('NiveauxScolaire*') ? 'active' : '' }}''; ?>">
=======
        <a href="{{route('Apprenant.index')}}"
            class="nav-link {{ Request::is('Ville*') ? 'active' : '' }}''; ?>">
>>>>>>> 2f111a44 (up)
            <i class="fa-solid fa-book"></i>
            <p>Gestion Niveaux Scolaire</p>
        </a>
        </li>
        <li class="nav-item">
<<<<<<< HEAD
        <a href="{{route('Specialite.index')}}"
            class="nav-link {{ Request::is('Specialites*') ? 'active' : '' }}>">
=======
        <a href="{{route('Apprenant.index')}}"
            class="nav-link {{ Request::is('Ville*') ? 'active' : '' }}>">
>>>>>>> 2f111a44 (up)
            <i class="fa-brands fa-google-scholar"></i>
            <p>Gestion Spécialité</p>
        </a>
        </li>
    </ul>
</li>
<<<<<<< HEAD
@endcan
=======
>>>>>>> 2f111a44 (up)
