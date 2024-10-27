<aside class="main-sidebar sidebar-dark-primary elevation-4">
   
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/')}}backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> 
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item menu-open">
              <a href="{{url('user/dashboard')}}" class="nav-link {{request()->is('user/dashboard') ? 'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          {{--user--}}
          @if(auth()->user()->can('view user'))
          <li class="nav-item">
            <a href="{{route('admin.user.index')}}" class="nav-link {{request()->is('admin/user*') ? 'active':''}}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                User
              </p>
            </a>
          </li>
          @endif
        {{--user--}}

         {{--permission--}}
         @if(auth()->user()->can('view permission'))
          <li class="nav-item">
            <a href="{{route('admin.permission.index')}}" class="nav-link {{request()->is('admin/permission*') ? 'active':''}}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Permission
              </p>
            </a>
          </li>
          @endif
        {{--permission--}}

         {{--role--}}
         @if(auth()->user()->can('view role'))
          <li class="nav-item">
            <a href="{{route('admin.role.index')}}" class="nav-link {{request()->is('admin/role*') ? 'active':''}}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Role
              </p>
            </a>
          </li>
          @endif
        {{--role--}}

          {{--setting--}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{route('user.logout')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
          {{--setting--}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>