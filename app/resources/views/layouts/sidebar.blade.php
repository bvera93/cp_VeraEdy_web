<!--**********************************
    Sidebar start
***********************************-->
<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="{{URL::to('/admin/home')}}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/admin/category')}}" aria-expanded="false">
                    <i class="icon-menu menu-icon"></i><span class="nav-text">Categoria</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/admin/item')}}" aria-expanded="false">
                    <i class="fa fa-plus"></i><span class="nav-text">Productos</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/admin/addons')}}" aria-expanded="false">
                    <i class="fa fa-plus"></i><span class="nav-text">Complementos</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/admin/users')}}" aria-expanded="false">
                    <i class="fa fa-users"></i><span class="nav-text">Clientes</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/admin/orders')}}" aria-expanded="false">
                    <i class="fa fa-shopping-cart"></i><span class="nav-text">Pedidos</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/admin/reviews')}}" aria-expanded="false">
                    <i class="fa fa-star"></i><span class="nav-text">Reseñas</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/admin/pincode')}}" aria-expanded="false">
                    <i class="fa fa-map-pin" aria-hidden="true"></i><span class="nav-text">Ubicación</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/admin/promocode')}}" aria-expanded="false">
                    <i class="fa fa-tag"></i><span class="nav-text">Código promocional</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/admin/banner')}}" aria-expanded="false">
                    <i class="fa fa-bullhorn"></i><span class="nav-text">Banner promocional</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/admin/time')}}" aria-expanded="false">
                    <i class="fa fa-clock-o"></i><span class="nav-text">Horario de atención</span>
                </a>
            </li>
            <li>
                <a href="{{URL::to('/admin/driver')}}" aria-expanded="false">
                    <i class="fa fa-car"></i><span class="nav-text">Repartidores</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-note menu-icon"></i><span class="nav-text">Páginas CMS</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{URL::to('/admin/privacypolicy')}}">Política de privacidad</a></li>
                    <li><a href="{{URL::to('/admin/termscondition')}}">Términos & Condiciones</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->