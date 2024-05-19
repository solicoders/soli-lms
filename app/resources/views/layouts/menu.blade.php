<!-- TODO : Organisation de menu package -->
<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Accueil
        </p>
    </a>
</li>
<!-- Gestion RH -->
<li class="nav-item has-treeview">
    <a href="#"
        class="nav-link {{ Request::is('GestionRH*') ? 'active' : '' }}">
        <i class="fa-solid fa-people-group"></i>
        <p>
        Gestion RH
        <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('formateurs.index') }}"
                class="nav-link {{ Request::is('formateurs*') ? 'active' : '' }}">
                <i class="fa-solid fa-chalkboard-user"></i>
                <p>Gestion Formateurs</p>
            </a>
        </li>
        <li class="nav-item">
        <a href="{{ route('apprenants.index') }}"
            class="nav-link {{ Request::is('apprenants*') ? 'active' : '' }}">
            <i class="fa-solid fa-users"></i>
            <p>Gestion Apprenants</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{ route('villes.index') }}"
            class="nav-link {{ Request::is('villes*') ? 'active' : '' }}">
            <i class="fa-solid fa-city"></i>
            <p>Gestion Villes</p>
        </a>
        </li>
    </ul>
</li>
{{-- @endcan --}}
