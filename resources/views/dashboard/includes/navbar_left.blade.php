<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{asset('img/logo.png')}}" alt=" App Logo" class="brand-image elevation-3"
             style="opacity: .8; width:20%;">
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                Ana Kushoska
            </div>
            {{-- <div class="info">

            <a href="{{route('managers.edit.data', $currentUser->id)}}" class="d-block">{{$currentUser->name}}</a>
                 @else
                 <a href="#" class="d-block">{{$currentUser->name}}</a>

            </div> --}}
        {{-- </div>  --}}
{{--
        Sidebar Menu --}}
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                            <li class="nav-item">
                            <a href="{{route('notifications.create')}}" class="nav-link">
                                    {{-- <i class="nav-icon {{array_key_exists('icon', $menuItem) && $menuItem['icon']?$menuItem['icon']:'fa fa-circle-o'}}"></i> --}}
                                    <p>Add/Edit Notification</p>
                                </a>
                            </li>

                            <li class="nav-item has">
                                <a href="{{route('notifications.index')}}" class="nav-link">
                                    {{-- <i class="nav-icon {{array_key_exists('icon', $menuItem) && $menuItem['icon']?$menuItem['icon']:'fa fa-circle-o'}}"></i> --}}
                                    <p>Notifications</p>
                                </a>
                            </li>
                        </ul>
            </nav>
    </div>
</aside>

