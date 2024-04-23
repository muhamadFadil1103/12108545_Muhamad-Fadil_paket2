<div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ url('/beranda') }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('pelanggan') }}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Pelanggan</span></a>
              </li>
              
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('penjualan') }}" aria-expanded="false"><i class="mdi mdi-sale"></i><span class="hide-menu">Penjualan</span></a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('pembelian') }}" aria-expanded="false"><i class="mdi mdi-shopping"></i><span class="hide-menu">Pembelian</span></a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('produk') }}" aria-expanded="false"><i class="mdi mdi-playlist-check"></i><span class="hide-menu">Produk</span></a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('supplier') }}" aria-expanded="false"><i class="mdi mdi-account-star"></i><span class="hide-menu">Supplier</span></a>
              </li>

              @if (session('level') == 'administrator')
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('user') }}" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">User</span></a>
              </li>
                
              @endif

              
              

              
              
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>