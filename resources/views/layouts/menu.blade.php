<!-- need to remove -->
<li class="nav-item menu-open">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-list"></i>
      <p>
        Admin Pages
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      
      <li class="nav-item">
        <a href="{{route('register1')}} " class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Register</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('users.index')}} " class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Customers</p>
        </a>
      </li>
      
      <li class="nav-item">
        <a href="/admin/appointment/index" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Appointments</p>
        </a>
      </li>
    </ul>
  </li>
