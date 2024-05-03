<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{ route('admin.index') }}">
                    <i class="fas fa-dashboard"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.products.index')) active @endif" href="{{ route('admin.products.index') }}">
                    <i class="fas fa-tags"></i>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.categories.index')) active @endif" href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-bars"></i>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.subcategories.index')) active @endif" href="{{ route('admin.subcategories.index') }}">
                    <i class="fas fa-list"></i>
                    Subcategories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.users.index')) active @endif" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users"></i>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.orders.index')) active @endif" href="{{ route('admin.orders.index') }}">
                    <i class="fas fa-cart-shopping"></i>
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.coupons.index')) active @endif" href="{{ route('admin.coupons.index') }}">
                    <i class="fas fa-ticket"></i>
                    Coupons
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.reviews.index')) active @endif" href="{{ route('admin.reviews.index') }}">
                    <i class="fa-regular fa-star"></i>
                    Reviews
                </a>
            </li>
        </ul>
    </div>
</nav>
