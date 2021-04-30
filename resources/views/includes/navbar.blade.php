<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
                ><i class="fas fa-bars"></i
            ></a>
        </li>

    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="/img/user.png" class="user-image img-circle elevation-2" alt="User Image2">
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                <img src="/img/user.png" class="user-image img-circle elevation-2" alt="User Image1">

                <p>
                    {{ Auth::user()->name }}
                      @if ( Auth::user()->employee )
                    - {{ Auth::user()->employee->desg }}, {{ Auth::user()->employee->department->name }}
                    @endif
                </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body text-center">
                    @if ( Auth::user()->employee )
                    <small>Бүртгүүлсэн огноо: {{ Auth::user()->employee->join_date->format('d M, Y') }}</small>
                    @endif
                <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                <div class="pull-left">
                    @if ( Auth::user()->employee )
                    <a href="{{ route('employee.profile') }}" class="btn btn-default btn-flat">Хувийн мэдээлэл</a>
                    @else
                    <a href="{{ route('admin.reset-password') }}" class="btn btn-default btn-flat">Нууц үг солих</a>
                    @endif
                </div>
                <div class="pull-right">
                    <a href="{{ route('logout') }}"
                    class="btn btn-default btn-flat"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    >Гарах</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                </li>
            </ul>
        </li>
        <!--
         <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        -->
    </ul>
</nav>
