<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Web')</title>
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @routes
    <meta name="description" content="Meta description">
    <meta name="keywords" content="Meta keywords">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="https://1dg.me/assets/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <link href="https://1dg.me/assets/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
    {{-- <link href="https://1dg.me/assets/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" /> --}}
    <link href="https://1dg.me/assets/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/owl.carousel/dist/https://1dg.me/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/owl.carousel/dist/https://1dg.me/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />

    <!--end:: Vendor Plugins -->
    <link href="frontend/assets/css/main/style.bundle.css?v=7" rel="stylesheet" type="text/css" />
    
    <!--begin:: Vendor Plugins for custom pages -->
    {{-- <link href="https://1dg.me/assets/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" /> --}}
    <link href="https://1dg.me/assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/@fullcalendar/core/main.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/@fullcalendar/daygrid/main.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/@fullcalendar/list/main.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/@fullcalendar/timegrid/main.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/jqvmap/dist/jqvmap.css" rel="stylesheet" type="text/css" />
    <link href="https://1dg.me/assets/plugins/custom/uppy/dist/uppy.min.css" rel="stylesheet" type="text/css" /> 

    <style type="text/css">
        .kt-content {
            margin-top: 30px;
        }
        
        .div-description,
        .div-details {
            padding: 1rem;
            background-color: #f7f8fa;
            border: 1px solid #e2e5ec;
            border-radius: 4px;
        }
        
        .kt-font-success1 {
            color: #35df35 !important;
        }
        
        .kt-timeline-v1.kt-timeline-v1--justified .kt-timeline-v1__items .kt-timeline-v1__item .kt-timeline-v1__item-time {
            right: 0 !important;
        }
    </style>
    @yield('style')
    <script type="text/javascript">
        var TIME_ZONE = 0;
    </script>
    <script type="text/javascript">
        LANG = {
            "New Order": "\u0110\u1eb7t h\u00e0ng",
            "Services": "D\u1ecbch v\u1ee5",
            "Orders": "L\u1ecbch s\u1eed",
            "Add funds": "N\u1ea1p ti\u1ec1n",
            "Affiliates": "Ki\u1ebfm ti\u1ec1n",
            "Contact": "Li\u00ean H\u1ec7",
            "Total orders": "T\u1ed5ng s\u1ed1 \u0111\u01a1n h\u00e0ng",
            "You Have Spent": "S\u1ed1 ti\u1ec1n \u0111\u00e3 thanh to\u00e1n",
            "Member level": "H\u1ea1ng th\u00e0nh vi\u00ean",
            "Member type": "H\u1ea1ng th\u00e0nh vi\u00ean",
            "Single Order": "\u0110\u1eb7t h\u00e0ng l\u1ebb",
            "Mass Order": "\u0110\u1eb7t h\u00e0ng nhi\u1ec1u",
            "Service": "D\u1ecbch v\u1ee5",
            "Link": "Link",
            "Quantity": "S\u1ed1 l\u01b0\u1ee3ng \u0111\u1eb7t h\u00e0ng",
            "Min": "T\u1ed1i thi\u1ec3u",
            "Max": "T\u1ed1i \u0111a",
            "Submit": "\u0110\u1eb7t h\u00e0ng",
            "One order per line in format": "M\u1ed7i \u0111\u01a1n h\u00e0ng m\u1ed9t d\u00f2ng",
            "Price per 1000": "Gi\u00e1 tr\u00ean m\u1ed7i 1000",
            "Speed per day": "T\u1ed1c \u0111\u1ed9 m\u1ed7i ng\u00e0y",
            "Refill Available": "B\u1ea3o h\u00e0nh",
            "Min\/Max": "T\u1ed1i thi\u1ec3u\/T\u1ed1i \u0111a",
            "Start time": "Th\u1eddi gian b\u1eaft \u0111\u1ea7u",
            "Quality": "Ch\u1ea5t l\u01b0\u1ee3ng",
            "Name": "T\u00ean d\u1ecbch v\u1ee5",
            "Rate\/1000": "Gi\u00e1 cho 1000",
            "Min Order": "S\u1ed1 l\u01b0\u1ee3ng t\u1ed1i thi\u1ec3u",
            "Max Order": "S\u1ed1 l\u01b0\u1ee3ng t\u1ed1i \u0111a",
            "Details": "Chi ti\u1ebft",
            "Description": "Chi ti\u1ebft",
            "Close": "\u0110\u00f3ng",
            "Search orders": "T\u00ecm ki\u1ebfm \u0111\u01a1n h\u00e0ng",
            "Search": "T\u00ecm ki\u1ebfm",
            "All": "T\u1ea5t c\u1ea3",
            "Pending": "\u0110ang ch\u1edd x\u1eed l\u00fd",
            "In progress": "\u0110ang ch\u1ea1y",
            "Processing": "\u0110ang x\u1eed l\u00fd",
            "Completed": "Ho\u00e0n th\u00e0nh",
            "Partial": "Ho\u00e0n ti\u1ec1n m\u1ed9t ph\u1ea7n",
            "Canceled": "Hu\u1ef7 \u0111\u01a1n h\u00e0ng",
            "Date": "Ng\u00e0y",
            "Charge": "S\u1ed1 ti\u1ec1n",
            "Start count": "S\u1ed1 l\u01b0\u1ee3ng ban \u0111\u1ea7u",
            "Remains": "C\u00f2n l\u1ea1i",
            "Status": "Tr\u1ea1ng th\u00e1i",
            "Payment method": "Ng\u00e2n h\u00e0ng",
            "History (20 Latest)": "L\u1ecbch s\u1eed n\u1ea1p ti\u1ec1n ( 20 giao d\u1ecbch g\u1ea7n nh\u1ea5t )",
            "Amount": "S\u1ed1 ti\u1ec1n n\u1ea1p",
            "Created": "Th\u1eddi gian n\u1ea1p",
            "Referral link": "Link gi\u1edbi thi\u1ec7u",
            "Commission": "Hoa h\u1ed3ng gi\u1edbi thi\u1ec7u",
            "Minimum payout": "M\u1ee9c r\u00fat t\u1ed1i thi\u1ec3u",
            "Minimum convert": "Chuy\u1ec3n \u0111\u1ed5i t\u1ed1i thi\u1ebfu",
            "Total Earnings": "T\u1ed5ng ti\u1ec1n \u0111\u00e3 r\u00fat",
            "Unpaid": "\u0110ang ch\u1edd thanh to\u00e1n",
            "Paid": "\u0110\u00e3 thanh to\u00e1n",
            "Request History": "L\u1ecbch s\u1eed",
            "Type": "Type",
            "Refer": "Refer",
            "Earnings": "Earnings"
        };
    </script>
</head>
@yield('body')

<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#366cf3",
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

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-66114250-2');
</script>
<script src="https://kit.fontawesome.com/3e587eb986.js" crossorigin="anonymous"></script>
<!--begin:: Vendor Plugins -->
<script src="https://1dg.me/assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/wnumb/wNumb.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/js/global/integration/plugins/bootstrap-datepicker.init.js" type="text/javascript"></script>
{{-- <script src="https://1dg.me/assets/plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script> --}}
<script src="https://1dg.me/assets/plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/js/global/integration/plugins/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/js/global/integration/plugins/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/js/global/integration/plugins/dropzone.init.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/js/global/integration/plugins/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/js/global/integration/plugins/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/js/global/integration/plugins/jquery-validation.init.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/raphael/raphael.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/morris.js/morris.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/plugins/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/js/global/integration/plugins/sweetalert2.init.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/dompurify/dist/purify.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/general/countdown/countdown.js" type="text/javascript"></script>

<!--end:: Vendor Plugins -->
<script src="frontend/assets/js/main/scripts.bundle.js" type="text/javascript"></script>

<!--begin:: Vendor Plugins for custom pages -->
<script src="https://1dg.me/assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/@fullcalendar/core/main.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/@fullcalendar/daygrid/main.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/@fullcalendar/google-calendar/main.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/@fullcalendar/interaction/main.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/@fullcalendar/list/main.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/@fullcalendar/timegrid/main.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/flot/dist/es5/jquery.flot.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/flot/source/jquery.flot.resize.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/flot/source/jquery.flot.categories.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/flot/source/jquery.flot.pie.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/flot/source/jquery.flot.stack.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/flot/source/jquery.flot.crosshair.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/flot/source/jquery.flot.axislabels.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/js/global/integration/plugins/datatables.init.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-autofill/js/dataTables.autoFill.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/jszip/dist/jszip.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/pdfmake/build/pdfmake.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/pdfmake/build/vfs_fonts.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-buttons/js/buttons.colVis.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-buttons/js/buttons.flash.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-buttons/js/buttons.html5.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-buttons/js/buttons.print.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-colreorder/js/dataTables.colReorder.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-keytable/js/dataTables.keyTable.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-rowgroup/js/dataTables.rowGroup.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-rowreorder/js/dataTables.rowReorder.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-scroller/js/dataTables.scroller.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/datatables.net-select/js/dataTables.select.min.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/jstree/dist/jstree.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/jqvmap/dist/jquery.vmap.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="https://1dg.me/assets/plugins/custom/uppy/dist/uppy.min.js" type="text/javascript"></script>

<script src="frontend/assets/js/common.js?v=<?php echo rand();?>" type="text/javascript"></script>
@yield('script')
<!-- end::Body -->

</html>