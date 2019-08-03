<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="layout_1/LTR/default/full/index.html" class="d-inline-block">
            <img src="{{asset('dashboard-ui/global_assets/images/logo_light.png')}}" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link">
                    ទំព័រដើម
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-bell2"></i>
                    <span class="d-md-none ml-2">ជូនដំណឹង</span>
                    <span class="badge badge-mark border-white ml-auto ml-md-0"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> ប្រូហ្វាលរបស់ខ្ញុំ</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-cog5"></i> កំណត់គណនី</a>
                    <a href="#" class="dropdown-item"><i class="icon-switch2"></i> ចាកចេញ</a>
                </div>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('dashboard-ui/global_assets/images/image.png')}}" class="rounded-circle mr-2" height="34" alt="">
                    <span>គុណ រតនា</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> ប្រូហ្វាលរបស់ខ្ញុំ</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-cog5"></i> កំណត់គណនី</a>
                    <a href="#" class="dropdown-item"><i class="icon-switch2"></i> ចាកចេញ</a>
                </div>
            </li>
        </ul>
    </div>
</div>
