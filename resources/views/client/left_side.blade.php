<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div>
        ĐT <b class="font-black">Táo</b>
      </div>
    </div>
    <div class="menu is-menu-main">
      <ul class="menu-list">
      </ul>
      <p class="menu-label">QUẢN LÝ</p>
      <ul class="menu-list">
        <li class="{{ request()->routeIs('index') ? 'active' : '' }}">
          <a href="{{ route('index') }}">
            <span class="icon"><i class="mdi mdi-home"></i></span>
            <span class="menu-item-label">Trang Chủ</span>
          </a>
        </li>
        
        <li class="{{ request()->routeIs('client.index') ? 'active' : '' }}">
          <a href="{{route('client.index')}}">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            <span class="menu-item-label">Thông Tin</span>
          </a>
        </li>
        <li class="{{ request()->routeIs('edit_info') ? 'active' : '' }}">
          <a href="{{route('edit_info')}}">
            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
            <span class="menu-item-label">Chỉnh Sửa Thông Tin</span>
          </a>
        </li>
        
        </li>
        <li class="{{ request()->routeIs('order') ? 'active' : '' }}">
          <a href="{{route('order')}}">
            <span class="icon"><i class="mdi mdi-view-list"></i></span>
            <span class="menu-item-label">Đơn hàng</span>
          </a>
        </li>
        <li class="{{ request()->routeIs('client_contract') ? 'active' : '' }}">
          <a href="{{ route('client_contract') }}">
            <span class="icon"><i class="mdi mdi-message-text-outline"></i></span>
            <span class="menu-item-label">Gửi Phản Hồi</span>
          </a>
        </li>
        <li class="class="{{ request()->routeIs('logout') ? 'active' : '' }}>
          <a href="{{route('logout')}}">
              <span class="icon"><i class="mdi mdi-logout"></i></span>
              <span class="menu-item-label">Đăng Xuất</span>
          </a>
      </li>
      

      </li>
      </ul>
    </div>
  </aside>