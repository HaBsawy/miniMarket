<!-- Start SideBar -->

<aside>
    <h2 class="heading">HaBsawy</h2>

    <!-- Group List -->

    <div class="group-list">
        <h5>الأساسية</h5>
        <ul>

            <!-- Single Link -->

            <li class="{{ ($active == 'home') ? 'active' : '' }}"">
                <a href="{{ route('home') }}">
                    <i class="fas fa-home fa-fw"></i>
                    الرئيسية
                </a>
            </li>

            <li class="{{ ($active == 'item') ? 'active' : '' }}">
                <a href="{{ route('items.index') }}">
                    <i class="fas fa-cubes fa-fw"></i>
                    الاصناف
                </a>
            </li>

            <li class="{{ ($active == 'purchase') ? 'active' : '' }}">
                <a href="{{ route('purchases.index') }}">
                    <i class="fas fa-shopping-cart fa-fw"></i>
                    المشتريات
                </a>
            </li>

            <li class="{{ ($active == 'sale') ? 'active' : '' }}">
                <a href="{{ route('sales.index') }}">
                    <i class="fas fa-cart-arrow-down fa-fw"></i>
                    المبيعات
                </a>
            </li>

            <!-- Multi Links -->

            <li class="drop-down {{ ($active == 'report') ? 'active' : '' }}">
                <a href="#">
                    <i class="fab fa-app-store fa-fw"></i>
                    التقارير
                    <i class="drop fas fa-chevron-left"></i>
                </a>
                <ul class="sub-list">
                    <li class="{{ ($subActive == 'day') ? 'active' : '' }}">
                        <a href="{{ route('sales.day') }}">مبيعات اليوم {{ date('Y-m-d') }}</a>
                    </li>
                    <li class="{{ ($subActive == 'month') ? 'active' : '' }}">
                        <a href="{{ route('sales.month') }}">مبيعات الشهر {{ date('Y-m') }}</a>
                    </li>
                    <li class="{{ ($subActive == 'year') ? 'active' : '' }}">
                        <a href="{{ route('sales.year') }}">مبيعات السنة {{ date('Y') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<!-- End SideBar -->
