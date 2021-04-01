<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{config('custom.app_name')}} | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset("plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css")}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset("plugins/toastr/toastr.min.css")}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("img/logo.png")}}"/>
    <style>
        #example1_filter{
            float: right;
        }
        .user-panel {
            overflow: initial;
        }
        .user-panel a:hover {
            color: black !important;
        }
    </style>
    @yield('css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->

        <!-- SEARCH FORM -->


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" data-slide="true" href="#" role="button" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Đăng xuất <i class="fas fa-sign-out-alt"></i></a>
            </li>
            <form id="logout-form" action="{{route('logoutadmin')}}" method="POST" class="d-none">@csrf</form>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
{{--        <a href="index3.html" class="brand-link">--}}
{{--            <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--                 style="opacity: .8">--}}
{{--            <span class="brand-text font-weight-light">AdminLTE 3</span>--}}
{{--        </a>--}}
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{config('custom.noavatar')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block" >{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}</a>
                </div>
{{--                <div class="d-flex align-items-center" style="font-size: 13px;margin-left: 25px">--}}
{{--                    <a href="" class="d-block mr-1" data-toggle="modal"  data-target="#modal-sm-pass">Đổi mật khẩu </a> <i class="fas fa-key text-white"></i>--}}
{{--                </div>--}}
                <div class="">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle text-white" style="background:none;color: black;border: none" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="" class="d-block mr-1 dropdown-item" data-toggle="modal"  data-target="#modal-sm-pass">Đổi mật khẩu </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">Các chức năng</li>
                    <li class="nav-item active">
                        <a href="{{route('home.index')}}" class="nav-link @if($selected =='home')active @endif">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Thống kê
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('category.index')}}" class="nav-link @if($selected =='category')active @endif">
                            <i class="nav-icon fas fa-align-justify"></i>
                            <p>
                                Danh mục
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('service.index')}}" class="nav-link @if($selected =='service')active @endif">
                            <i class="nav-icon fab fa-servicestack"></i>
                            <p>
                                Dịch vụ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('level.index')}}" class="nav-link @if($selected =='level')active @endif">
                            <i class="nav-icon fas fa-hand-holding-usd"></i>
                            <p>
                                Chế độ ưu đãi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('news.index')}}" class="nav-link @if($selected =='news')active @endif">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Tin tức mới
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('recharge.index')}}" class="nav-link @if($selected =='recharge')active @endif">
                            <i class="nav-icon fas fa-history"></i>
                            <p>
                                Lịch sử nạp tiền
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.index')}}" class="nav-link @if($selected =='user')active @endif">
                            <i class="nav-icon fa fa-fw fa-user"></i>
                            <p>
                                Người dùng
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('bank.index')}}" class="nav-link @if($selected =='banks')active @endif">
                            <i class="nav-icon fas fa-piggy-bank"></i>
                            <p>
                                Tài khoản ngân hàng
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->

        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="modal fade" id="modal-sm-pass">
        <div class="modal-dialog">
            <form class="modal-content" name="changer-pass">
                <div class="modal-header">
                    <h4 class="modal-title">Đổi mật khẩu</h4>
                    <input type="hidden" name="id" value="{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->id}}">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" name="edit-password">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="oldpassword" class="col-sm-5 col-form-label">Mật khẩu cũ</label>

                                <div class="col-sm-7">
                                    <input type="password" required name="oldpassword" class="form-control" id="oldpassword" placeholder="Nhập mật khẩu cũ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="newpassword" class="col-sm-5 col-form-label">Mật khẩu mới</label>
                                <div class="col-sm-7">
                                    <input type="password" required name="newpassword" class="form-control" id="newpassword" placeholder="Mật khẩu mới">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="confirmnewpassword" class="col-sm-5 col-form-label">Xác nhận mật khẩu mới</label>
                                <div class="col-sm-7">
                                    <input type="password" required name="confirmnewpassword" class="form-control" id="confirmnewpassword" placeholder="Nhập lại mật khẩu mới">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" id="save-pass">Lưu</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade profile-admin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                ...
            </div>
        </div>
    </div>
    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- /.modal -->
    <footer class="main-footer" style="font-size: 14px">
        Sản phẩm bởi
        <img width="30px" src="{{asset("img/minhhoang.jpg")}}" alt="">
        <strong>MinhHoangJSC</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- Toastr -->
<!-- SweetAlert2 -->
<script src="{{asset("plugins/sweetalert2/sweetalert2.min.js")}}"></script>
<!-- Toastr -->
<script src="{{asset("plugins/toastr/toastr.min.js")}}"></script>

<script>
    // var pathname = window.location.pathname; // Returns path only (/path/example.html)

    // console.log(pathname);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000
    });
    $('.dropdown-toggle').dropdown()
    $("form[name=changer-pass]").submit(function(e){
        e.preventDefault();
    })
    $("input[name=oldpassword]").change(function(){
        $id = ($("input[name=id]").val());
        $.ajax({
            url     :"{{url("admin/check-password")}}",
            type    :'POST',
            data    : {
                id  :   $id,
                pass: $(this).val()
            },
            success : function(data){
                if (data == "true"){
                    $("input[name=oldpassword]").addClass("is-valid");
                    $("input[name=oldpassword]").removeClass("is-invalid");
                    toastr["success"]("Mật khẩu cũ đúng");
                }
                else {
                    $("input[name=oldpassword]").addClass("is-invalid");
                    toastr["error"]("Mật khẩu cũ sai");
                }
            }
        })
    });

    /////cick luu thay mat khau
    $('#save-pass').click(function() {
        let checkold = 0,checknew = 0,checkconfirm = 0;
        if ($('input[name=oldpassword]').val() == ''){
            checkold=0;
        }else {
            checkold = 1;
        }

        if ($('input[name=newpassword]').val() == ''){
            $('input[name=newpassword]').addClass('is-invalid');
            checknew = 0;
        }else {
            $('input[name=newpassword]').removeClass('is-invalid');
            $('input[name=newpassword]').addClass('is-valid');
            checknew = 1;
        }

        if ($('input[name=confirmnewpassword]').val() == ''){
            $('input[name=confirmnewpassword]').addClass('is-invalid');
            checkconfirm = 0;
        }else if($('input[name=confirmnewpassword]').val() != $('input[name=newpassword]').val()){
            $('input[name=confirmnewpassword]').addClass('is-invalid');
            toastr["error"]("Nhập lại mật khẩu không khớp");
            checkconfirm = 0;
        }else if ($('input[name=confirmnewpassword]').val() == $('input[name=newpassword]').val()) {
            $('input[name=confirmnewpassword]').removeClass('is-invalid');
            $('input[name=confirmnewpassword]').addClass('is-valid');
            checkconfirm = 1;
        }
        if (checkconfirm == 1 && checknew == 1 && checkold == 1){

            let data = $('form[name=changer-pass]').serialize(),
                id      =   $('input[name=id]').val();
            $.ajax({
                url     :"{{url("admin/changerpass")}}"+"/"+id,
                type    :'put',
                data    : data,
                success : function(data){
                    let value = JSON.parse(JSON.stringify(data));
                    if (value.type=="success"){
                        toastr[value.type](value.content);
                        $('#modal-sm-pass').modal('hide');
                        $(".modal-backdrop").remove();
                        $("#logout-form").submit();
                    }else{
                        toastr[value.type](value.content);
                    }
                }
            })
        }
    });
</script>
@yield('js')

</body>
</html>
