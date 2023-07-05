<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-flat nav-collapse-hide-child" data-widget="treeview"
    role="menu" data-accordion="false">
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
        <a href="{{ url('/user/profile') }}"
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
