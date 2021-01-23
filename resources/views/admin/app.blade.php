

@include('head');

</head>
<!-- end::Head -->
<!-- begin::Body -->
<body  class="m-page--fluid m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >	
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
<!-- begin::Header -->
<header id="m_header" class="m-grid__item m-header "  m-minimize="minimize" m-minimize-mobile="minimize" m-minimize-offset="10" m-minimize-mobile-offset="10" >
<div class="m-header__top">
<div class="m-container m-container--fluid m-container--full-height m-page__container">
<div class="m-stack m-stack--ver m-stack--desktop">
<!-- begin::Brand -->
<div class="m-stack__item m-brand m-stack__item--left">
<div class="m-stack m-stack--ver m-stack--general m-stack--inline">
<div class="m-stack__item m-stack__item--middle m-brand__logo"> <a href="" class="m-brand__logo-wrapper"> <img alt="" 
	src="{{asset('demo/demo10/media/img/logo/logo.png')}}" class="m-brand__logo-desktop"/> <img alt=""
	 src="{{asset('demo/demo10/media/img/logo/logo_mini.png')}}" class="m-brand__logo-mobile"/> </a> </div>
<div class="m-stack__item m-stack__item--middle m-brand__tools">
<!-- begin::Quick Actions-->

<!-- end::Quick Actions-->
<!-- begin::Responsive Header Menu Toggler-->
<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block"> <span></span> </a>
<!-- end::Responsive Header Menu Toggler-->
<!-- begin::Topbar Toggler-->
<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block"> <i class="flaticon-more"></i> </a>
<!--end::Topbar Toggler-->
</div>
</div>
</div>
<!-- end::Brand -->
<!-- begin::Topbar -->
@include('admin/toolbar')
<!-- end::Topbar -->
</div>
</div>
</div>
<div class="m-header__bottom">
<div class="m-container m-container--fluid m-container--full-height m-page__container">
<div class="m-stack m-stack--ver m-stack--desktop">


<!-- begin::Horizontal Menu -->


<div class="m-stack__item m-stack__item--fluid m-header-menu-wrapper">
<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light "  >
<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
<li class="m-menu__item @yield('dashboard') m-menu__item--submenu m-menu__item--tabs"  m-menu-submenu-toggle="tab" aria-haspopup="true"><a  href="" class="m-menu__link " title="Non functional dummy link"><span class="m-menu__link-text">Dashboard</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--tabs"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
<ul class="m-menu__subnav">
<li class="m-menu__item @yield('dashboard_camp') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="" class="m-menu__link "><i class="m-menu__link-icon flaticon-dashboard"></i><span class="m-menu__link-text">Campaigns Dashboard</span></a></li>

<li class="m-menu__item @yield('dashboard_lead')"  aria-haspopup="true"><a  href="" class="m-menu__link "><i class="m-menu__link-icon flaticon-profile-1"></i><span class="m-menu__link-text">Leads Dashboard</span></a></li>
</ul>
</div>
</li>




<li class="m-menu__item  @yield('category') m-menu__item--submenu m-menu__item--tabs" m-menu-submenu-toggle="tab" aria-haspopup="true"><a  href="{{route('admin.all.cat')}}" class="m-menu__link " title="Non functional dummy link"><span class="m-menu__link-text">الانواع</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--tabs"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
<ul class="m-menu__subnav">
<li class="m-menu__item @yield('category_all') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('admin.all.cat')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-signs"></i><span class="m-menu__link-text">كل الانواع</span></a></li>


</ul>
</div>
</li>




<li class="m-menu__item   @yield('product') m-menu__item--submenu m-menu__item--tabs"  m-menu-submenu-toggle="tab" aria-haspopup="true"><a  href="{{route('admin.all.product')}}" class="m-menu__link " title="Non functional dummy link"><span class="m-menu__link-text">المنتجات </span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--tabs"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
<ul class="m-menu__subnav">
<li class="m-menu__item  @yield('product_all') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('admin.all.product')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-profile"></i><span class="m-menu__link-text">كل المنتجات
</span></a></li>
<li class="m-menu__item @yield('product_add') "  aria-haspopup="true">
	<a href="{{route('admin.add.product')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-piggy-bank"></i><span class="m-menu__link-text">اضف منتج</span></a></li>

	<li class="m-menu__item @yield('product_deleted') "  aria-haspopup="true">
	<a href="{{route('admin.deleted.pro')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-piggy-bank"></i><span class="m-menu__link-text">المنتجات المحذوفه</span></a></li>


</ul>
</div>
</li>


<!-- sold -->

<li class="m-menu__item  @yield('sold') m-menu__item--submenu m-menu__item--tabs"  m-menu-submenu-toggle="tab" aria-haspopup="true"><a  href="{{route('admin.sold')}}" class="m-menu__link " title="Non functional dummy link"><span class="m-menu__link-text">المبيعات</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--tabs"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
<ul class="m-menu__subnav">
<li class="m-menu__item  @yield('sub_sold') "  m-menu-link-redirect="1" aria-haspopup="true"><a  href="{{route('admin.sold')}}" class="m-menu__link "><i class="flaticon-paper-plane"></i><span class="m-menu__link-text">كل المبيعات </span></a></li>

<li class="m-menu__item @yield('process_sold') "  m-menu-link-redirect="1" aria-haspopup="true">
	<a  href="{{route('admin.sold.process')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-signs"></i><span class="m-menu__link-text">عمليه بيع</span></a></li>
</ul>
</div>
</li>





<!-- admin end -->





</ul>
</div>
</div>
<!-- end::Horizontal Menu -->




</div>
</div>
</div>
</header>
<!-- end::Header -->
<!-- begin::Body -->


@section('inner')
@show





<!-- end::Body -->
<!-- begin::Footer -->


@include('footer')

