  <!-- right side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-right image">
          <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle" alt="User Image"style="height: 45px;width: 45px;">
        </div>
        <div class="pull-right info">
          <p>{{Auth::user()->fullname}}</p>
        </div>
      </div>
  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        @if(Auth::user()->isUser())
          <li class="">
            <a href="{{ route('user.dashboard') }}">
              <i class="fa fa-dashboard"></i> <span>پنل مدیریت</span>
            </a>
          </li>
          <li class="">
            <a href="{{ route('user.events') }}">
              <i class="fa fa-bullhorn"></i> <span>رویدادها</span>
            </a>
          </li>
          <li class="">
            <a href="{{ route('user.financial') }}">
              <i class="fa fa-money"></i> <span>تراکنش های مالی</span>
            </a>
          </li>
          <li class="">
            <a href="{{ route('user.profile') }}">
              <i class="fa fa-user"></i> <span>پروفایل</span>
            </a>
          </li>
        @elseif(Auth::user()->isAdmin())
          <li class="">
            <a href="{{ route('admin.dashboard') }}">
              <i class="fa fa-dashboard"></i> <span>پنل مدیریت</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-bullhorn"></i>
              <span>رویدادها</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="{{ route('admin.events') }}"><i class="fa fa-bullhorn"></i>رویدادها</a></li>
              <li><a href="{{ route('admin.events.create') }}"><i class="fa fa-plus-circle"></i>رویداد جدید</a></li>
              <li><a href="#"><i class="fa fa-calendar"></i>تقویم رویدادها</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-newspaper-o"></i>
              <span>مطالب</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="{{ route('admin.news') }}"><i class="fa fa-newspaper-o"></i>مطالب</a></li>
              <li><a href="{{ route('admin.news.create') }}"><i class="fa fa-plus-circle"></i>مطلب جدید</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>کاربران</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="{{ route('admin.users') }}"><i class="fa fa-users"></i>کاربران</a></li>
              <li><a href="{{ route('admin.admins') }}"><i class="fa fa-users"></i>مدیران</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-bar-chart"></i>
              <span>آمار</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="{{ route('admin.events') }}"><i class="fa fa-bar-chart"></i>آمار بازدید</a></li>
              <li><a href="{{ route('admin.events') }}"><i class="fa fa-bullhorn"></i>آمار رویدادها</a></li>
              <li><a href="{{ route('admin.events') }}"><i class="fa fa-users"></i>آمار کاربران</a></li>
              <li><a href="{{ route('admin.events') }}"><i class="fa fa-newspaper-o"></i>آمار مطالب</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-envelope"></i>
              <span>پیام ها</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="{{ route('admin.receiveMessages') }}"><i class="fa fa-inbox"></i>پیام های دریافتی</a></li>
              <li><a href="{{ route('admin.sendMessages') }}"><i class="fa fa-send (alias)"></i>پیام های ارسالی</a></li>
              <li><a href="{{ route('admin.messages.create') }}"><i class="fa fa-plus-circle"></i>ارسال پیام جدید</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-bell"></i>
              <span>اطلاعیه ها</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="#"><i class="fa fa-bell"></i>اطلاعیه ها</a></li>
              <li><a href="#"><i class="fa fa-plus-circle"></i>اطلاعیه جدید</a></li>
            </ul>
          </li>
          <li class="">
            <a href="{{ route('admin.setting') }}">
              <i class="fa fa-gears"></i> <span>تنظیمات سایت</span>
            </a>
          </li>
          <li class="">
            <a href="{{ route('admin.profile') }}">
              <i class="fa fa-user"></i> <span>پروفایل</span>
            </a>
          </li>

        @endif
        <li class="">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
            <i class="fa fa-sign-out"></i> <span>خروج</span>
          </a>
        </li>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>