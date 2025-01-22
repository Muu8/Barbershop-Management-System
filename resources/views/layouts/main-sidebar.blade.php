<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @auth




    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{ asset('assets/img/logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

      <span class="brand-text font-weight-light">Barbershop MS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class=" mt-3 pb-3 mb-3 d-flex">
        <div class="info">
        </div>
      </div>


      <!-- Sidebar Menu -->
      @if (Auth::user()->is_user)
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (Auth::user()->is_admin)
            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    <p>
                        لوحة التحكم
                    </p>
                </a>
            </li>
            @endif

            <li class="nav-item">
                <a href="{{route('sales.create')}}" class="nav-link">
                    <i class="fa-solid fa-cart-plus"></i>
                    <p>
                         اضافة المبيعات
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('sales.index')}}" class="nav-link">
                    <i class="fa-solid fa-shop"></i>
                    <p>
                         المبيعات
                    </p>
                </a>
            </li>
            @endif

            @if (Auth::user()->is_admin)
            <li class="nav-item">
                <a href="{{route('expenses.index')}}" class="nav-link">
                    <i class="fa-solid fa-money-bill"></i>
                                        <p>
                          المصاريف
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('auth.index')}}" class="nav-link">
                    <i class="fa-solid fa-users"></i>
                    <p>
                          المستخدمين
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('sellers.index')}}" class="nav-link">
                    <i class="fa-solid fa-scissors"></i>
                    <p>
                          الحلاقين
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('services.index')}}" class="nav-link">
                    <i class="fa-brands fa-servicestack"></i>
                    <p>
                         الخدمات
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('payments.index')}}" class="nav-link">
                    <i class="fa-solid fa-credit-card"></i>
                    <p>
                         الدفع
                    </p>
                </a>
            </li>

        @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      @endauth
    </div>
    <!-- /.sidebar -->
  </aside>

