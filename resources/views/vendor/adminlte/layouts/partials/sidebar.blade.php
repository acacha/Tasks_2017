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
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="header">Tasques</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="/tasks_php"><i class='fa fa-link'></i> <span>Tasques PHP</span></a></li>
            <li><a href="/tasks1"><i class='fa fa-link'></i> <span>Tasques 1st version</span></a></li>
            <li><a href="/tasks_old"><i class='fa fa-link'></i> <span>Tasques Vue Old</span></a></li>
            <li><a href="/tasks"><i class='fa fa-link'></i> <span>Tasques Vue</span></a></li>
            <li><a href="/tasks2"><i class='fa fa-link'></i> <span>Tasques Vue 2</span></a></li>
            <li><a href="/email"><i class='fa fa-link'></i> <span>Email</span></a></li>
            <li class="header">Settings</li>
            <li><a href="/tokens"><i class='fa fa-link'></i> <span>Tokens</span></a></li>
            <li class="header">Alumnes</li>
            <li><a href="/students"><i class='fa fa-link'></i> <span>Projectes</span></a></li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
