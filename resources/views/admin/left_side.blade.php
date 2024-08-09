<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div>
        ĐT <b class="font-black">Táo  </b>
      </div>
    </div>
    <div class="menu is-menu-main">
      <p class="menu-label">TỔNG QUAN</p>
      <ul class="menu-list">
        <li class="{{ request()->routeIs('admin_index') ? 'active' : '' }}">
          <a href="{{route('admin_index')}}">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Thống Kê</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">QUẢN LÝ</p>
      <ul class="menu-list">
        <li class="{{ request()->routeIs('category') ? 'active' : '' }}">
          <a href="{{route('category')}}">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Danh mục</span>
          </a>
        </li>
        <li class="{{ request()->routeIs('product') ? 'active' : '' }}">
          <a href="{{route('product')}}">
            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
            <span class="menu-item-label">Sản phẩm</span>
          </a>
        </li>
        
        <li class="{{ request()->routeIs('user') ? 'active' : '' }}">
          <a href="{{route('user')}}">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            <span class="menu-item-label">Người dùng</span>
          </a>
        </li>
        <li class="{{ request()->routeIS('admin_order') ? 'active' : '' }}">
          <a href="{{route('admin_order')}}">
            <span class="icon"><i class="mdi mdi-view-list"></i></span>
            <span class="menu-item-label">Đơn hàng</span>
          </a>
        </li>
        <li class="{{ request()->routeIs('voucher') ? 'active' : '' }}">
          <a href="{{ route('voucher') }}">
              <span class="icon"><i class="mdi mdi-ticket"></i></span>
              <span class="menu-item-label">Voucher</span>
          </a>
        </li> 
    
        {{-- <li class="--set-active-profile-html">
          <a href="binhluan.html">
            <span class="icon"><i class="mdi mdi-comment"></i></span>
            <span class="menu-item-label">Bình luận</span>
          </a>
        </li> --}}

        {{-- <li class="--set-active-profile-html">
          <a href="tintuc.html">
            <span class="icon"><i class="mdi mdi-view-list"></i></span>
            <span class="menu-item-label">Tin tức</span>
          </a>
        </li> --}}
      </li>
      </ul>
    </div>
  </aside>