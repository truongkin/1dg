@extends('Backend/layout/main',['selected' => 'user'])
@section("title")
    Người dùng
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.css")}}">
    <style>
        #example1_paginate{
            display: none ;
        }
        .pagination {
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Người dùng</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách người dùng</h3>
                            <form  action="{{url("admin/user")}}" name="pageorder" method="GET">
                                <input type="hidden" name="pageorder">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="filter row border-bottom mb-3" method="GET">
                                <div class="col-md-2 ml-auto">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Id khách</label>
                                        <input type="number" min="1" name="iduser" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2 mr-auto" >
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Tên khách</label>
                                        <input type="text" name="nameuser" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 text-center mb-3">
                                    <div>
                                        <input type="hidden" name="pageorder" value="50">
                                        <button type="submit" class="btn btn-sm btn-primary m-auto">Tìm kiếm</button>
                                        <a href="{{url("admin/user")}}" type="button" class="btn btn-sm btn-primary m-auto">Refresh</a>
                                    </div>
                                </div>
                            </form>
                            <table id="example1" class="table table-responsive-md table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Tài khoản</th>
                                    <th class="text-center">Số tiền hiện có</th>
                                    <th class="text-center">Số đơn đã đặt</th>
                                    <th class="text-center">Số tiền đã thanh toán</th>
                                    <th style="width: 120px">Đổi mật khẩu</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($user as $item)
                                        <tr>
                                            <td class="border">{{$item->id}}</td>
                                            <td class="border">{{$item->name}}</td>
                                            <td class="border">{{$item->total}}</td>
                                            <td class="border">{{$item->total_orders}}</td>
                                            <td class="border">{{$item->total_amount_paid}}</td>
                                            <td style="text-align: center">
                                                <button type="button" class="btn btn-sm btn-primary btn-change-password" data-data="{{\App\Models\User::find($item->id)}}" data-toggle="modal"  data-target="#modal-xl-edit">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$user->withQueryString()->render("pagination::bootstrap-4")}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <div class="modal fade" id="modal-xl-edit">
        <div class="modal-dialog modal-md">
            <input name="id" type="hidden" value="" />
            <form class="modal-content" name="change-password">

                <div class="modal-header">
                    <h4 class="modal-title">Đổi mật khẩu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Mật khẩu mới</label>
                                    <input type="text" class="form-control" required id="password" name="password"  placeholder="Mật khẩu mới " />
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-xl-add">
        <div class="modal-dialog modal-md">
            <form class="modal-content" name="add-category">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm dịch vụ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input type="text" class="form-control" id="name" name="name"  placeholder="Tên danh mục" required />
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
@section('js')
    <!-- DataTables -->
    <script src="{{asset("plugins/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset("dist/js/adminlte.min.js")}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset("dist/js/demo.js")}}"></script>
    <!-- Summernote -->
    <script src="{{asset("plugins/summernote/summernote-bs4.min.js")}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- page script -->
    <script>
        /// form add submit
        $('form[name=add-category]').submit(function(e){
            $data = $('form[name=add-category]').serialize();
            $.ajax({
                url: '{{asset("/admin/category")}}',
                type: 'POST',
                data: $data,
                success: function($data){
                    let value = JSON.parse(JSON.stringify($data));
                    toastr[value.type](value.content);
                    if (value.type=="success"){
                        $('#modal-xl-add').modal('hide');
                    }else{
                        e.preventDefault();
                    }
                }
            });
        })

        // btn edit click
        $('form[name=change-password]').submit(function(e){
            e.preventDefault();
            $data = $('form[name=change-password]').serialize();
            $id = $('input[name=id]').val();
            $password = $('#password').val();
            $.ajax({
                url:  '{{url("admin/user-change-password")}}',
                type: 'POST',
                data: {
                    id:$id , password:$password
                },
                success: function($data){
                    let value = JSON.parse(JSON.stringify($data));
                    if (value.type=="success"){
                        toastr[value.type](value.content);
                        $('#modal-xl-edit').modal('hide');
                    }else{
                        e.preventDefault();
                    }
                }
            });
        })
        ///summernote
        $(function () {
            // Summernote
            $('.textareaadd').summernote();
            $('.textareaedit').summernote();

        })
        ///datatabke
        $(function () {
            $("#example1").DataTable({
                "autoWidth": false,
                "bSort" : false,
                "pageLength": 50,
                "info": false,
                "searching":false,
                "language": {
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ bản",
                    "lengthMenu":     "Hiển thị _MENU_ bản ghi",
                    "paginate": {
                        "first":      "Đầu tiên",
                        "last":       "Cuối",
                        "next":       "Tiếp",
                        "previous":   "Trước"
                    },
                }

            });
            //check param url
            $.urlParam = function(name){
                var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
                if (results != null) return results[1]
                else return 0;
            }
            if ($.urlParam("pageorder")!=""){
                $("input[name=pageorder]").val($.urlParam("pageorder"));
            }
            $(document).on("change","[name=example1_length]",function(){
                $("input[name=pageorder]").val($(this).val());
                $("form[name=pageorder]").submit();
            });
            $("select[name=example1_length] option").each(function () {
                console.log($(this).val());
                if ($(this).val() == $.urlParam('pageorder')){
                    $(this).attr("selected",true);

                }
            })
            $("select[name=example1_length]").each(function () {
                $(this).removeClass(["custom-select","form-control"]);
            })

            ///click edit
            $('.btn-change-password').click(function(){
                $databtn = $(this).data("data");
                $('input[name=id]').val($databtn.id)
            });
            ////click delete
            $('.btn-Delete').click(function(){
                $btn = $(this).parent().parent();
                let id = ($(this).data("data"));
                swal({
                    title: "Xóa dịch vụ?",
                    text: "Đồng ý xóa không thể khôi phục!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '/admin/category/'+id,
                                type: 'DELETE',
                                data: { "id":id},
                                success: function($data){
                                    let value = JSON.parse(JSON.stringify($data));
                                    if (value.type=="success"){
                                        toastr[value.type](value.content);
                                        swal("Xóa thành công!", {
                                            icon: "success",
                                        });
                                        $btn.remove();
                                    }else{
                                        console.log(value.content);
                                    }
                                }
                            })

                        }
                    });
            });
        });


    </script>
@endsection

