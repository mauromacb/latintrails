<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class=""><a href="{{ url('dashboard') }}"><i class='fa fa-link'></i> <span>Gestión de usuarios</span></a></li>
            <li class=""><a href="{{ url('pagina') }}"><i class='fa fa-link'></i> <span>Gestión de la web</span></a></li>
            <li class=""><a href="{{ url('commentcard') }}"><i class='fa fa-link'></i> <span>Comment Card</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Sistema Turístico</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('paquetesTuristicos') }}"><i class='fa fa-link'></i> <span>Paquetes Turísticos</span></a></li>
                    <li class=""><a href="{{ url('categorias') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.categorias') }}</span></a></li>
                    <li class=""><a href="{{ url('zonasturisticas') }}"><i class='fa fa-link'></i> <span>Zonas Turísticas</span></a></li>
                    <li><a href="{{ url('paquetesTuristicos') }}"><i class='fa fa-link'></i> <span>Mapas Turísticos</span></a></li>
                    <li><a href="{{ url('hoteles') }}"><i class='fa fa-link'></i> <span>Hoteles</span></a></li>
                </ul>
            </li>
            <li><a href="{{ url('comonosencontro') }}"><span>{{ trans('adminlte_lang::message.comonosencontro') }}</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
