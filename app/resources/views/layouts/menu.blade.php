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
<li class="nav-item">
    <a href="{{ route('projets.index') }}"
        class="nav-link {{ Request::is('projets*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Projets
        </p>
    </a>
</li>
          <li class="nav-item has-treeview">
            <a href="#"
              class="nav-link ">
              <i class="nav-icon fas fa-project-diagram"></i>
              <p>
                Gestion des briefs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/view/GestionBriefProjet/Formateur/GestionBriefs/index.php"
                  class="nav-link  ">
                  <i class="far fa-file-alt nav-icon"></i>
                  <p>Briefs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/view/GestionBriefProjet/Formateur/Realisations/index.php"
                  class="nav-link  ">
                  <i class="far fa-chart-bar nav-icon"></i>
                  <p>Réalisations</p>
                </a>
              </li>
            </ul>
          </li>
{{-- @endcan --}}
