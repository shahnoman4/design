@php
     $usr = Auth::guard('admin')->user();
 @endphp
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
      <li><a><i class="fa fa-users"></i> Manage Users <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'style="display: block;"' : '' }}>
          @if ($usr->can('admin.create'))
          <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'current-page' : '' }}"><a href="{{ route('admin.admins.index') }}">Users</a></li>
          @endif  
          @if ($usr->can('role.view'))  
          <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'current-page' : '' }}"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
          @endif
          
        </ul>
      </li>
      @endif


      <li><a><i class="fa fa-laptop"></i> Manage Transaction <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li class=""><a href="{{ route('admin.transaction.estimate') }}">Estimate</a></li>

          <li class=""><a href="{{ route('admin.customer.index') }}">Customers</a></li>          
          <li class=""><a href="{{ route('admin.supplier.index') }}">Supliers</a></li>          
          <li class=""><a href="{{ route('admin.account.index') }}">Accounts</a></li>          
        </ul>
      </li>

      
    </ul>
  </div>
  
</div>

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('admin.logout.submit') }}"
        onclick="event.preventDefault();
                      document.getElementById('admin-logout-form').submit();">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<form id="admin-logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
    @csrf
</form>
<!-- /menu footer buttons -->