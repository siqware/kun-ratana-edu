<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        មីនុយ
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="{{asset('dashboard-ui/global_assets/images/image.png')}}" width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">គុណ រតនា</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;ប៉ោយប៉ែត
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">មីនុយ</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link {{request()->is('/')? 'active':''}}">
                        <i class="icon-home4"></i>
                        <span>ទំព័រដើម</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('student.index')}}" class="nav-link {{request()->is('student*')? 'active':''}}">
                        <i class="icon-people"></i>
                        <span>សិស្ស</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('media')}}" class="nav-link {{request()->is('media')? 'active':''}}">
                        <i class="icon-images2"></i>
                        <span>មេឌៀ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link {{request()->is('user*')? 'active':''}}">
                        <i class="icon-users"></i>
                        <span>អ្នកប្រើប្រាស់</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="layout_1/LTR/default/full/changelog.html" class="nav-link">
                        <i class="icon-bell-plus"></i>
                        <span>ជូនដំណឹង</span>
                        <span class="badge bg-pink-400 align-self-center ml-auto">៥</span>
                    </a>
                </li>
                <!-- /main -->

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
