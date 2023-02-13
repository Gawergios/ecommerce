<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('assets/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <ul>
                    <li>
                    </li>
                </ul>




                {{-- languages --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            {{__('messages.language')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="nav-item">
                            <a rel="alternate" class="nav-link" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <i class="far fa-circle nav-icon"></i>
                                {{ $properties['native'] }}
                                </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                {{-- end languages --}}







                {{-- categories --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            {{__('messages.categories')}}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{App\Models\Categories::count()}}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{url('admin/categories/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('messages.view all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/categories/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('messages.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- end categories --}}


                {{-- products --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            {{__('messages.products')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.products.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('messages.view all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.products.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('messages.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- end products --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
