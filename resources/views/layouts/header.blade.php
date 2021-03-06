            @section('header')
            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                        <img src="images/logo.jpg" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li class="active">
                                <a href="{{ route('product') }}">
                                    <i class="fas fa-list-ul"></i>Produk</a>
                            </li>
                            <li>
                                <a href="{{ route('purchase') }}">
                                    <i class="fas fa-plus"></i>Barang Masuk</a>
                            </li>
                            <li>
                                <a href="{{ route('order') }}">
                                    <i class="fas fa-minus"></i>Barang Keluar</a>
                            </li>
                            <li>
                                <a href="{{ route('categorie') }}">
                                    <i class="fas fa-book"></i>Categories</a>
                            </li>
                            <li>
                                <a href="{{ route('supplier') }}">
                                    <i class="fas fa-table"></i>Suppliers</a>
                            </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END MENU SIDEBAR-->

            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>{{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            @endsection