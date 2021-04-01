@extends('Backend/layout/main',['selected' => 'category'])
@section("title")
    Danh mục
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
        .table thead th {
            vertical-align: inherit;
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
                        <h1>Danh mục</h1>
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
                            <h3 class="card-title">Danh sách các danh mục</h3>
                            <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modal-xl-add">
                                Thêm mới
                            </button>
                            <form  action="{{url("admin/category")}}" name="pageorder" method="GET">
                                <input type="hidden" name="pageorder">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="filter row border-bottom mb-3">

                                <div class="col-md-4 m-auto">
                                    <div class="form-group">
                                        <input type="text" placeholder="Nhập tên danh mục" maxlength="255" name="category" style="width: 200px !important; float: left;border-top-right-radius: 0;border-bottom-right-radius: 0" class="form-control" value="@if(isset($_GET['nameuser'])){{$_GET['nameuser']}}@endif">
                                        <button type="submit" class="btn btn-md btn-primary m-auto" style="border-top-left-radius: 0;border-bottom-left-radius: 0">Tìm kiếm</button>
                                        <a class="btn btn-md btn-primary" href="{{url("admin/category")}}">Refresh</a>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center mb-3">
                                    <div>

                                    </div>
                                </div>
                            </form>
                            <table id="example1" class="table table-responsive-md table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Danh mục</th>
                                    <th style="width: 100px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt=0 @endphp
                                @foreach($cates as $item)
                                    <tr>
                                        <td class="border">{{++$stt}}</td>
                                        <td class="border">{{$item->name}}</td>

                                        <td style="text-align: center"><button type="button" class="btn btn-sm btn-primary btn-edit" data-data="{{\App\Models\Category::find($item->id)}}" data-toggle="modal"  data-target="#modal-xl-edit">
                                                <i class="fas fa-edit" alt="Sửa"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger btn-Delete" data-data="{{$item->id}}" >
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{$cates->withQueryString()->render("pagination::bootstrap-4")}}
                            </div>
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

            <form class="modal-content" name="edit-category">
                <input  type="hidden" name="id" value="0" />
                <div class="modal-header">
                    <h4 class="modal-title">Sửa danh mục</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Tên danh mục</label> <small class="text-danger">*</small>
                                    <input type="text" class="form-control" maxlength="255" required id="name" name="name"  placeholder="Tên danh mục " />
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
                    <h4 class="modal-title">Thêm danh mục</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Tên danh mục</label> <small class="text-danger">*</small>
                                <input type="text" class="form-control" id="name" maxlength="255" name="name"  placeholder="Tên danh mục" required />
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
            e.preventDefault();
            $data = $('form[name=add-category]').serialize();
            $.ajax({
                url: "{{url("admin/category")}}",
                type: 'POST',
                data: $data,
                success: function($data){
                    let value = JSON.parse(JSON.stringify($data));
                    toastr[value.type](value.content);
                    if (value.type=="success"){
                        $('#modal-xl-add').modal('hide');
                        $('#modal-xl-edit').modal('hide');
                        swal(value.content, {
                            icon: "success",
                            buttons: {
                                catch: {
                                    text: "Ok",
                                    value: "ok",
                                },
                            },
                        })
                            .then((value) => {
                                switch (value) {
                                    case "ok": location.reload();
                                }
                            });

                    }else{

                    }
                }
            });
        })
        // btn edit click
        $('form[name=edit-category]').submit(function(e){
            e.preventDefault();
            $id = $('input[name=id]').val();
            // console.log($id);return;
            $data = $('form[name=edit-category]').serialize();
            $.ajax({
                url: "{{url("admin/category")}}"+"/"+$id,
                type: 'PUT',
                data: $data,
                success: function($data){
                    let value = JSON.parse(JSON.stringify($data));
                    if (value.type=="success"){
                        toastr[value.type](value.content);
                        $('#modal-xl-edit').modal('hide');
                        swal(value.content, {
                            icon: "success",
                            buttons: {
                                catch: {
                                    text: "Ok",
                                    value: "ok",
                                },
                            },
                        })
                            .then((value) => {
                                switch (value) {
                                    case "ok": location.reload();
                                }
                            });
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
                    "sEmptyTable": "Không tìm thấy dữ liệu",
                    "paginate": {
                        "first":      "Đầu tiên",
                        "last":       "Cuối",
                        "next":       "Tiếp",
                        "previous":   "Trước"
                    },
                }

            });
            $("select[name=example1_length] option").each(function () {
                if ($(this).val() == $.urlParam('pageorder')){
                    $(this).attr("selected",true);
                }
            })
            $(document).on("change","[name=example1_length]",function(){
                $("input[name=pageorder]").val($(this).val());
                $("form[name=pageorder]").submit();
            });
            $("select[name=example1_length]").each(function () {
                $(this).removeClass(["custom-select","form-control"]);
            })
        });
        //check param url
        $.urlParam = function(name){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results != null) return results[1]
            else return 0;
        }

        ///click edit
        $('.btn-edit').click(function(){
            $databtn = $(this).data("data");
            $("#modal-xl-edit input").each( function(){
                $(this).val($databtn[$(this).attr("name")]);
            });
            $("input[name=id]").val($databtn['id']);
            $(".textareaedit").summernote('code', $databtn['note']);
        });
        ////click delete
        $('.btn-Delete').click(function(e){
            e.preventDefault();
            $btn = $(this).parent().parent();
            let id = ($(this).data("data"));
            swal({
                title: "Xóa danh mục?",
                text: "Đồng ý xóa không thể khôi phục!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{url("admin/category")}}"+"/"+id,
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
    </script>
@endsection

