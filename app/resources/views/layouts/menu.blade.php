<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Accueil
        </p>
    </a>
</li>
@include('layouts.pkg_notifications.menu')

@include('layouts.pkg_authentification.menu')
@include('layouts.pkg_autorisations.menu')
@include('layouts.pkg_rh.menu')

@include('layouts.pkg_creation_projets.menu')
@include('layouts.pkg_creation_tache.menu')
@include('layouts.pkg_realisation_projets.menu')
@include('layouts.pkg_realisation_tache.menu')

@include('layouts.pkg_competences.menu')
@include('layouts.pkg_formations.menu')

@include('layouts.pkg_posts.menu')

@include('layouts.pkg_validations.menu')

{{-- @endcan --}}
