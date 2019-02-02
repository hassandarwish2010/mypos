<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

     @include('layouts.dashbord.menue')
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('design/adminlte') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->first_name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>{{ trans('site.dashboard') }}</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ url('admin/') }}"><i class="fa fa-users"></i> {{ trans('site.dashboard') }}</a></li>
              <li><a href="{{ url('admin/settings') }}"><i class="fa fa-users"></i> {{ trans('site.setting') }}</a></li>
            </ul>
        </li>
        @if(auth()->user()->hasPermission('read-users'))
        <li><a href="{{ route('dashbord.users.index') }}"><i class="fa fa-users"></i> {{ trans('site.users') }}</a></li>
        @endif


        @if(auth()->user()->hasPermission('read-categories'))
        <li><a href="{{ route('dashbord.categories.index') }}"><i class="fa fa-users"></i> {{ trans('site.categories') }}</a></li>
        @endif

  {{--      <li class=" treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>{{trans('admin.admin_account')  }}</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        
    
         
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/admin') }}"><i class="fa fa-users"></i> {{ trans('admin.admin_account') }}</a></li>
            </ul>
         </li>

         <li class=" treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>{{ trans('admin.users_account') }}</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
      
  
       
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/user') }}"><i class="fa fa-users"></i>{{ trans('admin.users_account') }}</a></li>

            <li><a href="{{ url('admin/user') }}?level=user"><i class="fa fa-users"></i>{{trans('admin.user')  }}  </a></li>
            <li><a href="{{ url('admin/user') }}?level=vendor"><i class="fa fa-users"></i>{{ trans('admin.vendor') }} </a></li>
            <li><a href="{{ url('admin/user') }}?level=campany"><i class="fa fa-users"></i>{{ trans('admin.campany') }}</a></li>

          </ul>

       </li>

       <li class=" treeview">
        <a href="#">
          <i class="fa fa-flag"></i> <span>{{ trans('admin.countries') }}</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
    

     
        <ul class="treeview-menu">
          <li><a href="{{ url('admin/country') }}"><i class="fa fa-users"></i>{{ trans('admin.countries') }}</a></li>

      

        </ul>
     </li>

    <li class=" treeview">
        <a href="#">
          <i class="fa fa-flag"></i> <span>{{ trans('admin.cities') }}</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
    

     
        <ul class="treeview-menu">
          <li><a href="{{ url('admin/city') }}"><i class="fa fa-users"></i>{{ trans('admin.cities') }}</a></li>

      

        </ul>
     </li>


     <li class=" treeview">
        <a href="#">
          <i class="fa fa-flag"></i> <span>{{ trans('admin.state') }}</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
    

     
        <ul class="treeview-menu">
          <li><a href="{{ url('admin/state') }}"><i class="fa fa-users"></i>{{ trans('admin.state') }}</a></li>

      

        </ul>
     </li>

     <li class=" treeview">
      <a href="#">
        <i class="fa fa-list"></i> <span>{{ trans('admin.departments') }}</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
  

   
      <ul class="treeview-menu">
        <li><a href="{{ url('admin/department') }}"><i class="fa fa-list"></i>{{ trans('admin.departments') }}</a></li>
        <li><a href="{{ url('admin/department/create') }}"><i class="fa fa-list"></i>{{ trans('admin.add') }}</a></li>
      </ul>


   </li>
   <li class=" treeview">
    <a href="#">
      <i class="fa fa-cube"></i> <span>{{ trans('admin.trade') }}</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>


 
    <ul class="treeview-menu">
      <li><a href="{{ url('admin/trademark') }}"><i class="fa fa-cube"></i>{{ trans('admin.trade') }}</a></li>

  

    </ul>
    </li>
    <li class=" treeview">
    <a href="#">
      <i class="fa fa-cube"></i> <span>{{ trans('admin.manfact') }}</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>


 
    <ul class="treeview-menu">
      <li><a href="{{ url('admin/manfact') }}"><i class="fa fa-cube"></i>{{ trans('admin.manfact') }}</a></li>

  

    </ul>
    </li>

    <li class=" treeview">
    <a href="#">
      <i class="fa fa-truck"></i> <span>{{ trans('admin.shipping') }}</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>


 
    <ul class="treeview-menu">
      <li><a href="{{ url('admin/shipping') }}"><i class="fa fa-truck"></i>{{ trans('admin.shipping') }}</a></li>

  

    </ul>
    </li>

   <li class=" treeview">
    <a href="#">
      <i class="fa fa-building"></i> <span>{{ trans('admin.mall') }}</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>


 
    <ul class="treeview-menu">
      <li><a href="{{ url('admin/mall') }}"><i class="fa fa-building"></i>{{ trans('admin.mall') }}</a></li>

  

    </ul>
    </li>

    <li class=" treeview">
    <a href="#">
      <i class="fa fa-brush"></i> <span>{{ trans('admin.colors') }}</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>


 
    <ul class="treeview-menu">
      <li><a href="{{ url('admin/color') }}"><i class="fa fa-brush"></i>{{ trans('admin.colors') }}</a></li>

  

    </ul>
    </li>

    <li class=" treeview">
    <a href="#">
      <i class="fa fa-info-circel"></i> <span>{{ trans('admin.sizes') }}</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>


 
    <ul class="treeview-menu">
      <li><a href="{{ url('admin/size') }}"><i class="fa fa-info-circel"></i>{{ trans('admin.sizes') }}</a></li>

  

    </ul>
    </li>
    <li class=" treeview">
    <a href="#">
      <i class="fa fa-info-circel"></i> <span>{{ trans('admin.weights') }}</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>


 
    <ul class="treeview-menu">
      <li><a href="{{ url('admin/weight') }}"><i class="fa fa-info-circel"></i>{{ trans('admin.weights') }}</a></li>

  

    </ul>
    </li>

    </li>
    <li class=" treeview">
    <a href="#">
      <i class="fa fa-tag"></i> <span>{{ trans('admin.product') }}</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>


 
    <ul class="treeview-menu">
      <li><a href="{{ url('admin/product/add') }}"><i class="fa fa-tag"></i>{{ trans('admin.product') }}</a></li>

  

    </ul>
    </li> --}}
        </ul> 

        

        
    </section>
    <!-- /.sidebar -->
  </aside>