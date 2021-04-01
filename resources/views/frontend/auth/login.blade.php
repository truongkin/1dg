
 <!DOCTYPE html>
 <html lang="en">
     <head>
         <meta charset="utf-8" />
         <title>Signin</title>
        <base href="{{asset('')}}">
         <meta name="description" content="Homepage | 1DG Panel">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <meta name="csrf-token" content="{{ csrf_token() }}">
         <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
         <link href="frontend/assets/css/login-6.css" rel="stylesheet" type="text/css" />
         <link href="frontend/assets/css/niam/style.bundle.css" rel="stylesheet" type="text/css" />
         <link rel="shortcut icon" href="https://1dg.me/assets/media/logos/favicon.ico" />
         <style type="text/css">
             .href-services { font-weight: 500; font-size: 30px; color: white; border-bottom: 1px solid; }
         </style>
     </head>
     <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
         <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
             <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v6 kt-login--signin" id="kt_login">
                 <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
                     <div class="kt-grid__item  kt-grid__item--order-tablet-and-mobile-2  kt-grid kt-grid--hor kt-login__aside">
                         <div class="kt-login__wrapper">
                             <div class="kt-login__container">
                                 <div class="kt-login__body">
                                     <div class="kt-login__logo">
                                         <a href="#">
                                             <img src="frontend/assets/media/logos/logo-5.png?v=1">
                                         </a>
                                     </div>
                                     <div class="kt-login__signin">
                                        <div class="kt-login__head">
                                            <h3 class="kt-login__title">Sign In</h3>
                                        </div>
                                        
                    
                                        <div class="kt-login__form">
                                            <form  class="kt-form"method="POST" action="{{ route('login') }}">
                                                @csrf
                                                @error('email')
                                                    <div class="alert alert-danger" role="alert">
                                                        Tài khoản hoặc mật khẩu không chính xác
                                                    </div>
                                                @enderror
                                                <div class="alert alert-solid-danger alert-error-signin" role="alert" style="display: none;"></div>
                                                <div class="alert alert-solid-success alert-success-signin" role="alert" style="display: none;"></div>
                                                <div class="form-group">
                                                   
                                                    <input class="form-control signin-username" name="email"  value="{{ old('email') }}" type="text" placeholder="Email">
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control signin-password" name="password" placeholder="Password" type="password">
                                                </div>
                                                <!-- <div class="kt-login__extra">
                                                    <label class="kt-checkbox">
                                                        <input type="checkbox" name="remember"> Remember me
                                                        <span></span>
                                                    </label>
                                                    <a href="javascript:;" class="kt_login_forgot">Forgot Password?</a>
                                                </div> -->
                                                <div class="kt-login__actions">
                                                    <button type="submit" id="kt_login_signin_submit" class="btn btn-brand btn-pill btn-elevate">Sign In</button>
                                                </div>
                                             </form>
                                         </div>
                                         <div class="kt-login__account">
                                             <span class="kt-login__account-msg">
                                                 Don't have an account yet?
                                             </span>&nbsp;
                                             <a href="{{route('register')}}" class="kt_login_signup kt-login__account-link kt-font-bolder kt-font-info">Sign Up!</a>
                                         </div>
                                     </div>
 
                                     <div class="kt-login__forgot">
                                         <div class="kt-login__head">
                                             <h3 class="kt-login__title">Forgotten Password ?</h3>
                                             <div class="kt-login__desc">Enter your email to reset your password:</div>
                                         </div>
                                         <div class="kt-login__form">
                                             <form class="kt-form" action="">
                                                 <div class="form-group">
                                                     <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
                                                 </div>
                                                 <div class="kt-login__actions">
                                                     <button id="kt_login_forgot_submit" class="btn btn-brand btn-pill btn-elevate">Request</button>
                                                 </div>
                                             </form>
                                         </div>
                                         <div class="kt-login__account">
                                             <span class="kt-login__account-msg">
                                                 Have an account?
                                             </span>&nbsp;
                                             <a href="javascript:;" class="kt_login_singin kt-login__account-link kt-font-bolder kt-font-info">Sign In!</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             
                         </div>
                     </div>
                     <div class="kt-grid__item kt-grid__item--fluid kt-grid__item--center kt-grid kt-grid--ver kt-login__content" style="background-image: url(https://1dg.me/assets/media//bg/bg-4.jpg);">
                         <div class="kt-login__section">
                             {{-- <div class="kt-login__block">
                                 <h3 class="kt-login__title">Welcome 1DG SMM Panel</h3>
                                 <div class="kt-login__desc text-center">
                                     <a href="services" class="href-services">List Service</a>
                                     <hr />
                                     <p class="mt-3" style="display: none;">
                                         <h3 class="">Video hướng dẫn order views 4000H</h3>
                                         <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fmotdanga%2Fvideos%2F1336546346734990%2F&show_text=0&width=560" width="560" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
                                     </p>
                                 </div>
                             </div> --}}
                         </div>
                     </div>
                 </div>
             </div>
         </div>
 
         <script>
             var KTAppOptions = {
                 "colors": {
                     "state": {
                         "brand": "#2c77f4",
                         "light": "#ffffff",
                         "dark": "#282a3c",
                         "primary": "#5867dd",
                         "success": "#34bfa3",
                         "info": "#36a3f7",
                         "warning": "#ffb822",
                         "danger": "#fd3995"
                     },
                     "base": {
                         "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                         "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                     }
                 }
             };
         </script>
         <!-- Global site tag (gtag.js) - Google Analytics -->
         <script async src="https://www.googletagmanager.com/gtag/js?id=UA-66114250-2"></script>
         <script>
           window.dataLayer = window.dataLayer || [];
           function gtag(){dataLayer.push(arguments);}
           gtag('js', new Date());
 
           gtag('config', 'UA-66114250-2');
         </script>
 
         <!--begin:: Vendor Plugins -->
         <!-- <script src="https://1dg.me/assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script> -->
         <!-- <script src="https://1dg.me/assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script> -->
         <!-- <script src="https://1dg.me/assets/plugins/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script> -->
         <!-- <script src="https://1dg.me/assets/plugins/general/block-ui/jquery.blockUI.js" type="text/javascript"></script> -->
 
         <!-- <script src="https://1dg.me/assets/js/niam/scripts.bundle.js" type="text/javascript"></script> -->
         <!-- <script src="https://1dg.me/assets/js/common.js?v=1599703341" type="text/javascript"></script> -->
         <!-- <script src="https://1dg.me/assets/js/index.js?v=1599703341" type="text/javascript"></script> -->
     </body>
 </html>
 