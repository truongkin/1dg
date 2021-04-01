@extends('frontend.layouts.source')
@section('body')
<body class="kt-page--loading-enabled kt-page--loading kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-subheader--enabled kt-subheader--transparent kt-page--loading">
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__brand">
            <a class="kt-header-mobile__logo" href="/">
                <img alt="Logo" src="https://1dg.me/assets/media/logos/logo-5.png?1" width="40px" />
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <a href="funds" class="btn btn-outline-info kt-font-boldest funds mr-2" style="zoom: 1.2;">...</a>
            <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span>
            </button>
            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i>
            </button>
        </div>
    </div>

    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper " id="kt_wrapper">
                @include('frontend.layouts.header')
                @yield('content')
            </div>
        </div>
    </div>
    
</body>

@endsection
