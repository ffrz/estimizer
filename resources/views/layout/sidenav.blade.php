<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-flat nav-collapse-hide-child" data-widget="treeview"
    role="menu" data-accordion="false">
    <li class="nav-item">
      <a href="{{ url('/library/ahsp') }}"
        class="nav-link {{ isset($nav_active) && $nav_active == 'library' ? 'active' : '' }}">
        <i class="nav-icon fas fa-layer-group text-info"></i>
        <p>AHSP</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('/library/base-item') }}"
        class="nav-link {{ isset($nav_active) && $nav_active == 'library' ? 'active' : '' }}">
        <i class="nav-icon fas fa-layer-group text-info"></i>
        <p>Harga Dasar</p>
      </a>
    </li>
    @if (isset($project))
      <li class="nav-item">
        <a href="{{ url('/projects') }}"
          class="nav-link {{ isset($nav_active) && $nav_active == 'project_list' ? 'active' : '' }}">
          <i class="nav-icon fas fa-file-contract text-info"></i>
          <p>Proyek</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url("/projects/$project->id/tasks") }}"
          class="nav-link {{ isset($nav_active) && $nav_active == 'manage_tasks' ? 'active' : '' }}">
          <i class="nav-icon fas fa-tasks text-info"></i>
          <p>RAB</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url("/projects/$project->id/task-categories") }}"
          class="nav-link {{ isset($nav_active) && $nav_active == 'manage_task_categories' ? 'active' : '' }}">
          <i class="nav-icon fas fa-boxes text-info"></i>
          <p>Kategori</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url("/projects/$project->id/task-analyses") }}"
          class="nav-link {{ isset($nav_active) && $nav_active == 'manage_task_analyses' ? 'active' : '' }}">
          <i class="nav-icon fas fa-object-group text-info"></i>
          <p>AHS</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url("/projects/$project->id/base-items/type/1") }}"
          class="nav-link {{ isset($nav_active) && $nav_active == 'manage_materials' ? 'active' : '' }}">
          <i class="nav-icon fas fa-warehouse text-info"></i>
          <p>Material</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url("/projects/$project->id/base-items/type/2") }}"
          class="nav-link {{ isset($nav_active) && $nav_active == 'manage_wages' ? 'active' : '' }}">
          <i class="nav-icon fas fa-user-friends text-info"></i>
          <p>Upah Kerja</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url("/projects/$project->id/base-items/type/3") }}"
          class="nav-link {{ isset($nav_active) && $nav_active == 'manage_tools' ? 'active' : '' }}">
          <i class="nav-icon fas fa-tools text-info"></i>
          <p>Alat</p>
        </a>
      </li>
    @else
      <li class="nav-item">
        <a href="{{ url('/projects') }}"
          class="nav-link {{ isset($nav_active) && $nav_active == 'project_list' ? 'active' : '' }}">
          <i class="nav-icon fas fa-file-contract text-info"></i>
          <p>Proyek</p>
        </a>
      </li>
      <li class="nav-item nav-separator">
        <hr>
      </li>
      <li class="nav-item">
        <a href="#"
          class="nav-link {{ isset($nav_active) && $nav_active == 'library' ? 'active' : '' }}">
          <i class="nav-icon fas fa-list-alt"></i>
          <p>AHSP Manager <i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ url('/ahsp-mgr/task-groups') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Grup AHSP</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/ahsp-mgr/task-categories') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Kategori AHSP</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/ahsp-mgr/tasks/') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>AHSP</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/ahsp-mgr/base-items') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Item Dasar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/ahsp-mgr/base-item-categories') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Kategori Item Dasar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/ahsp-mgr/base-item-groups') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Grup Item Dasar</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="{{ url('/user-profile') }}"
          class="nav-link {{ isset($nav_active) && $nav_active == 'user_profile' ? 'active' : '' }}">
          <i class="nav-icon fas fa-user"></i>
          <p>{{ Auth::user()->name }}</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link">
          <i class="nav-icon fas fa-sign-out-alt text-info"></i>
          <p>Logout</p>
        </a>
      </li>
    @endif
  </ul>
</nav>
<!-- /.sidebar-menu -->
