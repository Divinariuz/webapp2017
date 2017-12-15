<style>
    .dropdown-content{
        width: 300px !important
    }
</style>

@if(Auth::check())
    @if(Auth::user()->admin_flag == True)
        <!-- Dropdown Structure -->
        <ul id="dd_admin" class="dropdown-content">
            <li>
                <a href="{{ route('admin.users') }}">User Management</a>
            </li>
            <li>
                <a href="{{ route('admin.products') }}">Product Management</a>
            </li>
        </ul>
    @endif
    <!-- Dropdown Structure -->
    <ul id="dd_user" class="dropdown-content">
        <li>
            <a href="{{ route('user.profile') }}">User Profile</a>
        </li>
        <li>
            <a href="{{ route('user.logout') }}">Logout</a>
        </li>
    </ul>
@else
    <!-- Dropdown Structure -->
    <ul id="dd_guest" class="dropdown-content">
        <li>
            <a href="{{ route('user.signup') }}">Signup</a>
        </li>
        <li>
            <a href="{{ route('user.signin') }}">Signin</a>
        </li>
    </ul>
@endif

<nav class="blue darken-4">
    <div class="nav-wrapper container">
        <a href="{{ route('shop.index') }}" class="brand-logo">SFP STORE</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li>
                    <a href="{{ route('shop.cart') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                        <span class="new badge" data-badge-caption="">{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</span>
                    </a>
                </li>
                @if(Auth::check())
                    @if(Auth::user()->admin_flag == True)
                        <!-- Dropdown Trigger -->
                        <li>
                            <a class="dropdown-button" href="#admin" data-activates="dd_admin" data-beloworigin="true">Admin Menu
                                <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                    @endif
                    <!-- Dropdown Trigger -->
                    <li>
                        <a class="dropdown-button" href="#user" data-activates="dd_user" data-beloworigin="true">User Menu
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                @else
                    <!-- Dropdown Trigger -->
                    <li>
                        <a class="dropdown-button" href="#guest" data-activates="dd_guest" data-beloworigin="true">User Menu
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
</nav>