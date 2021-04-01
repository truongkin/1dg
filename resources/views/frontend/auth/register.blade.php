
 <!DOCTYPE html>
 <html lang="en">
     <head>
         <meta charset="utf-8" />
         <title>Signup | 1DG SMM Panel - Youtube Services</title>
         <meta name="description" content="Homepage | 1DG Panel">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <base href="{{asset('')}}">
         <meta name="csrf-token" content="{{ csrf_token() }}">
         <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
         <link href="frontend/assets/css/login-6.css" rel="stylesheet" type="text/css" />
         <link href="frontend/assets/css/niam/style.bundle.css" rel="stylesheet" type="text/css" />
         <link rel="shortcut icon" href="https://1dg.me/assets/media/logos/favicon.ico" />
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
                                             <img src="frontend/assets/media/logos/logo-2.png">
                                         </a>
                                     </div>
 
                                     <div class="kt-login__signup" style="display: initial !important;">
                                         <div class="kt-login__head">
                                             <h3 class="kt-login__title">Sign Up</h3>
                                             <div class="kt-login__desc">Enter your details to create your account</div>
                                         </div>
                                         <div class="kt-login__form">
                                             <form class="kt-form" method="post" action="{{ route('register') }}">
                                                @if (isset($errors) && count($errors) > 0)
                                                    <div class="alert alert-solid-danger kt-font-bold alert-error">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                @csrf
                                                 <div class="alert alert-solid-danger alert-error-signup" role="alert" style="display: none;"></div>
                                                 <div class="alert alert-solid-success alert-success-signup" role="alert" style="display: none;"></div>
                                                 <div class="form-group">
                                                     <input class="form-control signup-username" type="text" name="name" value="{{ old('name') }}" placeholder="Username">
                                                 </div>
                                                 <div class="form-group">
                                                     <input class="form-control signup-email" type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                                 </div>
                                                 <div class="form-group">
                                                     <input class="form-control signup-password" type="password" name="password" placeholder="Password">
                                                 </div>
                                                 <div class="form-group">
                                                     <input class="form-control signup-confpass" type="password" name="password_confirmation"  placeholder="Confirm Password">
                                                 </div>
                                                 <div class="kt-login__actions">
                                                     <button type="submit" id="kt_login_signup_submit" class="btn btn-brand btn-pill btn-elevate">Sign Up</button>
                                                 </div>
                                             </form>
                                         </div>
                                         <div class="kt-login__account">
                                             <span class="kt-login__account-msg">
                                                 Have an account?
                                             </span>&nbsp;
                                             <a href="{{route('login')}}" class="kt_login_singin kt-login__account-link kt-font-bolder kt-font-info">Sign In!</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             
                         </div>
                     </div>
                     <div class="kt-grid__item kt-grid__item--fluid kt-grid__item--center kt-grid kt-grid--ver kt-login__content" style="background-image: url(https://1dg.me/assets/media//bg/bg-4.jpg);">
                         <div class="kt-login__section">
                             <div class="kt-login__block">
                                 <h3 class="kt-login__title">Welcome 1DG SMM Panel</h3>
                                 <div class="kt-login__desc">
                                     
                                 </div>
                             </div>
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
         <!--begin:: Vendor Plugins -->
         <!-- <script src="https://1dg.me/assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
         <script src="https://1dg.me/assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
         <script src="https://1dg.me/assets/plugins/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
         <script src="https://1dg.me/assets/plugins/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
 
         <script src="https://1dg.me/assets/js/main/scripts.bundle.js" type="text/javascript"></script>
         <script src="https://1dg.me/assets/js/common.js?v=1599703681" type="text/javascript"></script>
         <script src="https://1dg.me/assets/js/signup.js?v=1599703681" type="text/javascript"></script> -->
     </body>
 </html>
 