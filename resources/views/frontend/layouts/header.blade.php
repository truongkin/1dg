<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
    <div class="kt-header__top">
        <div class="kt-container ">
            <div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
                <div class="kt-header__brand-logo">
                    <a href="{{route('new')}}">
                        <img alt="Logo" src="https://1dg.me/assets/media/logos/logo-5.png?1" width="66px" />
                    </a>
                </div>
            </div>
            <div class="kt-header__topbar">
                <div class="kt-header__topbar-item kt-header__topbar-item--langs">
                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px">
                        <span class="kt-header__topbar-icon kt-header__topbar-icon--brand">
                            @if (Config::get('app.locale') =='vi')
                                <img class="" src="https://1dg.me/assets/media/flags/vi.svg?1" alt="" />
                            @else
                                <img class="" src="https://1dg.me/assets/media/flags/en.svg?1" alt="" />
                            @endif
                        </span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
                        <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                            <li class="kt-nav__item <?php if(Config::get('app.locale') =='en') echo 'kt-nav__item--active' ?>">
                                <a href="{!! route('home.change-language', ['en']) !!}" class="kt-nav__link" onclick="c.onClickChangeLanguage('en');">
                                    <span class="kt-nav__link-icon"><img src="https://1dg.me/assets/media/flags/en.svg?1" alt="" /></span>
                                    <span class="kt-nav__link-text">English</span>
                                </a>
                            </li>
                            <li class="kt-nav__item <?php if(Config::get('app.locale') =='vi') echo 'kt-nav__item--active' ?>">
                                <a href="{!! route('home.change-language', ['vi']) !!}" class="kt-nav__link" onclick="c.onClickChangeLanguage('vi');">
                                    <span class="kt-nav__link-icon"><img src="https://1dg.me/assets/media/flags/vi.svg" alt="" /></span>
                                    <span class="kt-nav__link-text">Tiếng Việt</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="kt-header__topbar-item kt-header__topbar-item--user">
                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px">
                        <span class="kt-hidden kt-header__topbar-welcome">Hi,</span>
                        <span class="kt-hidden kt-header__topbar-username">user</span>
                        <img class="kt-hidden-" alt="Pic" src="https://1dg.me/assets/media/users/300_21.jpg" />
                        <span class="kt-header__topbar-icon kt-header__topbar-icon--brand kt-hidden"><b>1</b></span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                        <div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
                            <div class="kt-user-card__avatar">
                                <img class="kt-hidden-" alt="Pic" src="https://1dg.me/assets/media/users/300_25.jpg" />
                                <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
                            </div>
                            <div class="kt-user-card__name c-username">
                                {{Auth::user()->name }} </div>
                        </div>
                        <div class="kt-notification">
                            <a href="account" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <i class="far fa-address-book kt-font-success"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title kt-font-bold">My Profile</div>
                                </div>
                            </a>
                            
                            <div class="kt-notification__custom kt-space-between">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" 
                                class="btn btn-label btn-label-brand btn-sm btn-bold btn-signout">Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-header__bottom">
        <div class="kt-container ">
            <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i>
            </button>
            <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile">
                    <ul class="kt-menu__nav">
                        <li class="kt-menu__item {{ (Route::currentRouteName()== 'new') ? 'kt-menu__item--active' : '' }}" >
                            <a href="new" class="kt-menu__link"><span class="kt-menu__link-text"><i class="fa fa-plus-circle"></i>&nbsp {{trans('message.Đặt hàng')}} </span></a>
                        </li>
                        <li class="kt-menu__item {{ (Route::currentRouteName()== 'service') ? 'kt-menu__item--active' : '' }}">
                            <a href="services" class="kt-menu__link"><span class="kt-menu__link-text"><i class="fa fa-list"></i>&nbsp {{trans('message.Dịch vụ')}}</span></a>
                        </li>
                        <li class="kt-menu__item {{ (Route::currentRouteName()== 'order') ? 'kt-menu__item--active' : '' }}">
                            <a href="orders" class="kt-menu__link"><span class="kt-menu__link-text"><i class="fa fa-history">&nbsp</i> {{trans('message.Lịch sử')}}</span></a>
                        </li>
                        <li class="kt-menu__item {{ (Route::currentRouteName()== 'funds') ? 'kt-menu__item--active' : '' }}">
                            <a href="funds" class="kt-menu__link"><span class="kt-menu__link-text"><i class="fa fa-dollar-sign"></i>&nbsp {{trans('message.Nạp tiền')}}</span></a>
                        </li>
                        {{-- <li class="kt-menu__item">
                            <a href="affiliates" class="kt-menu__link"><span class="kt-menu__link-text"><i class="fa fa-percentage"></i>&nbsp {{trans('message.Kiếm tiền')}}</span></a>
                        </li> --}}
                        {{-- <li class="kt-menu__item">
                            <a href="apidoc" class="kt-menu__link"><span class="kt-menu__link-text"><i class="fa fa-book">&nbsp</i> {{trans('message.API')}}</span></a>
                        </li> --}}
                        {{-- <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text"><i class="fa fa-comment">&nbsp</i>{{trans('message.Liên hệ')}}</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item"><a target="_blank" href="https://www.facebook.com/motdanga" class="kt-menu__link "><span class="kt-menu__link-text">Facebook</span></a>
                                    </li>
                                    <li class="kt-menu__item"><a href="javascript:;" class="kt-menu__link "><span></span></i><span class="kt-menu__link-text">099.73.66666</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
                <div class="kt-header-toolbar">
                    <div class="kt-quick-search kt-quick-search--inline kt-quick-search--result-compact text-right">
                        <a href="funds" class="btn btn-outline-info kt-font-boldest funds mr-2" style="zoom: 1.2;">$ <?php echo Auth::user()->total;?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>