@extends('Backend/layout/main',['selected' => 'service'])
@section('title')
    Dịch vụ
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.css")}}">
    <style>
        .table thead th {
            vertical-align: baseline;
            border-bottom: 2px solid #dee2e6;
        }
        .note-toolbar{
            display: none !important;
        }
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
                        <h1>Dịch vụ</h1>
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
                            <h3 class="card-title">Danh sách các dịch vụ</h3>
                            <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modal-xl-add">
                                Thêm mới
                            </button>
                            <form  action="{{url("admin/service")}}" name="pageorder" method="GET">
                                <input type="hidden" name="pageorder">
                                <input type="hidden" name="category" value="@php if(isset($_GET['category'])){ echo $_GET['category'];}@endphp">
                                <input type="hidden" name="service" value="@php if(isset($_GET['service'])){ echo $_GET['service'];}@endphp">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="filter row border-bottom mb-3">
                                <div class="col-md-7 m-auto">
                                    <div class="form-group">
                                        <div class="dropdown float-left mr-2">
                                            <button class="btn bg-white border dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tìm theo danh mục
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @foreach($cates as $item)
                                                <a class="dropdown-item" href="?category={{$item->id}}">{{$item->name}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <input type="text" placeholder="Nhập tên dịch vụ" maxlength="255" name="service" style="width: 200px !important; float: left;border-top-right-radius: 0;border-bottom-right-radius: 0" class="form-control" value="@if(isset($_GET['nameuser'])){{$_GET['nameuser']}}@endif">
                                        <button type="submit" class="btn btn-md btn-primary m-auto" style="border-top-left-radius: 0;border-bottom-left-radius: 0">Tìm kiếm</button>
                                        <a class="btn btn-md btn-primary" href="{{url("admin/service")}}">Refresh</a>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center mb-3">
                                    <div>

                                    </div>
                                </div>
                            </form>
                            <table id="example1" class="table table-responsive-md table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Danh mục</th>
                                    <th class="text-center">Dịch vụ</th>
                                    <th class="text-center">Giá ($/1000 đơn vị)</th>
                                    <th class="text-center">Số lượng tối thiểu</th>
                                    <th class="text-center">Số lượng tối đa</th>
                                    <th style="width: 100px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach($data as $item)

                                    <tr>
                                        <td class="border text-center">{{$stt++}}</td>
                                        <td class="border">{{\App\Models\Service::find($item->id)->categorys->name}}</td>
                                        <td class="border">{{$item->name}}</td>
                                        <td class="border">{{$item->price_service}}</td>
                                        <td class="border">{{$item->min}}</td>
                                        <td class="border">{{$item->max}}</td>
                                        <td style="text-align: center"><button type="button" class="btn btn-sm btn-primary btn-edit" data-data="{{\App\Models\Service::find($item->id)}}" data-toggle="modal"  data-target="#modal-xl-edit">
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
                                {{$data->withQueryString()->render("pagination::bootstrap-4")}}
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
        <div class="modal-dialog modal-lg">
            <input name="id" type="hidden" value="" />
            <form class="modal-content" name="edit-service">

                <div class="modal-header">
                    <h4 class="modal-title">Sửa dịch vụ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Tên dịch vụ</label> <small class="text-danger">*</small>
                                    <input type="text" class="form-control" required id="name" name="name" maxlength="255" placeholder="Tên danh mục " />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price_service">Giá ($/1000 đơn vị)</label> <small class="text-danger">*</small>
                                    <input type="number" step="0.001" min="0.1" max="2000000000" class="form-control" required id="price_service" name="price_service"  placeholder="Giá trên 1000" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="min">Tối thiểu đặt hàng</label> <small class="text-danger">*</small>
                                    <input type="number" class="form-control" required id="min" name="min" min="1" max="900000000000" placeholder="Min" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="max">Tối đa đặt hàng</label> <small class="text-danger">*</small>
                                    <input type="number" class="form-control" required id="max" name="max" min="1" max="900000000000" placeholder="Max" />
                                    {{--                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="speed_date">Tốc độ mỗi ngày</label> <small class="text-danger">*</small>
                                    <input type="text" class="form-control" maxlength="255" required id="speed_date" name="speed_date"  placeholder="Tốc độ mỗi ngày" />
                                    {{--                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="guarantee">Bảo hành</label> <small class="text-danger">*</small>
                                    <input type="text" class="form-control" maxlength="255" required id="guarantee" name="guarantee"  placeholder="Bảo hành" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="time_start">Thời gian thực hiện</label> <small class="text-danger">*</small>
                                    <input type="text" class="form-control" maxlength="255" required id="time_start" name="time_start"  placeholder="Thời gian thực hiện" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="quality">Chất lượng</label> <small class="text-danger">*</small>
                                    <input type="number" class="form-control" required id="quality" name="quality" min="1" max="5"  placeholder="Chất lượng" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="note">Mô tả</label> <small class="text-danger">*</small>
                                    <textarea class="textareaedit" name="note" placeholder="Place some text here"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
        <div class="modal-dialog modal-lg">
            <form class="modal-content" name="add-service">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Thêm dịch vụ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Tên danh mục</label> <small class="text-danger">*</small>
                                <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                    @foreach($cates as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Tên dịch vụ</label> <small class="text-danger">*</small>
                                <input type="text" class="form-control" maxlength="255" id="name" name="name"  placeholder="Tên dịch vụ cung cấp" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price_service">Giá ($/1000 đơn vị)</label> <small class="text-danger">*</small>
                                <input type="number" step="0.001" min="0.1" max="2000000000" class="form-control" id="price_service" name="price_service"  placeholder="Giá trên 1000" required/>
                                {{--                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="min">Tối thiểu đặt hàng</label> <small class="text-danger">*</small>
                                <input type="number" class="form-control" id="min1" name="min" min="1" max="900000000000" placeholder="Min" required/>
                                {{--                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="max">Tối đa đặt hàng</label> <small class="text-danger">*</small>
                                <input type="number" class="form-control" id="max1" name="max" min="1" max="900000000000"  placeholder="Max" required />
                                {{--                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="speed_date">Tốc độ mỗi ngày</label> <small class="text-danger">*</small>
                                <input type="text" class="form-control" maxlength="255" id="speed_date" name="speed_date"  placeholder="Tốc độ mỗi ngày" required />
                                {{--                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="guarantee">Bảo hành</label> <small class="text-danger">*</small>
                                <input type="text" class="form-control" maxlength="255" id="guarantee" name="guarantee"  placeholder="Bảo hành" required />
                                {{--                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="time_start">Thời gian thực hiện</label> <small class="text-danger">*</small>
                                <input type="text" class="form-control" maxlength="255" id="time_start" name="time_start"  placeholder="Thời gian thực hiện" required/>
                                {{--                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="quality">Chất lượng</label> <small class="text-danger">*</small>
                                <input type="number" class="form-control" id="quality" name="quality" min="1" max="5"  placeholder="Chất lượng" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="note">Mô tả</label> <small class="text-danger">*</small>
                                <textarea class="textareaadd" name="note" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
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
        let check1 = 1 , check = 1;
        /// form add submit
        $('form[name=add-service]').submit(function(e){
            e.preventDefault();
            $data = $('form[name=add-service]').serialize();
            if (check1==1){
                $.ajax({
                    url: '{{url("admin/service")}}',
                    type: 'POST',
                    data: $data,
                    success: function($data){
                        let value = JSON.parse(JSON.stringify($data));
                        toastr[value.type](value.content);
                        if (value.type=="success"){
                            $('#modal-xl-add').modal('hide');
                            swal("Thêm thành công", {
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
            }else{
                toastr["error"]("Nhập lai số lượng tối thiểu, tối đa");
            }

        })
        $("#max1").change(function(){
            console.log("vao");
            if (parseInt($(this).val()) < parseInt($("#min1").val())){
                $(this).addClass("is-invalid");
                $("#min1").addClass("is-invalid");
                check1=0;
                toastr["error"]("Số lượng tối thiểu phải nhỏ hơn hoặc bằng số lượng tối đa");
            }else if($(this).val() >= $("#min1").val()){
                check1=1;
                $(this).removeClass("is-invalid");
                $("#min1").removeClass("is-invalid");
            }
        });
        $("#min1").change(function(){
            if (parseInt($(this).val()) > parseInt($("#max1").val())){
                $(this).addClass("is-invalid");
                $("#max1").addClass("is-invalid");
                check1=0;
                toastr["error"]("Số lượng tối thiểu phải nhỏ hơn hoặc bằng số lượng tối đa");
            }else if($(this).val() <= $("#max1").val()){
                check1=1;
                $(this).removeClass("is-invalid");
                $("#max1").removeClass("is-invalid");
            }
        });
        $("#max").change(function(){
            if(parseInt($(this).val()) < parseInt($("#min").val())) {
                $(this).addClass("is-invalid");
                $("#min").addClass("is-invalid");
                check=0;
                toastr["error"]("Số lượng tối thiểu phải nhỏ hơn hoặc bằng số lượng tối đa");
            }else if($(this).val() >= $("#min").val()){
                check=1;
                $(this).removeClass("is-invalid");
                $("#min").removeClass("is-invalid");
            }
        });
        $("#min").change(function(){
            $min = $(this).val();
            $max = $("#max").val();
            if (parseInt($min) > parseInt($max)){
                $(this).addClass("is-invalid");
                $("#max").addClass("is-invalid");
                check=0;

            }else{
                check=1;
                $(this).removeClass("is-invalid");
                $("#max").removeClass("is-invalid");
            }
        });

        $('form[name=edit-service]').submit(function(e){
            e.preventDefault();
            $id = $('input[name=id]').val();
            $data = $('form[name=edit-service]').serialize();
            if (check==1){
                $.ajax({
                    url: '{{url("admin/service/")}}'+'/'+$id,
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
            }else{
                toastr["error"]("Kiểm tra lại số lượng");
            }
        })
        ///summernote
        $(function () {
            // Summernote
            $('.textareaadd').summernote();
            $('.textareaedit').summernote();
            $('div.note-editable').height(250);
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
                    "sEmptyTable": "Không tìm thấy dữ liệu",
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
            $("select[name=example1_length]").each(function () {
                $(this).removeClass(["custom-select","form-control"]);
            })
            $(document).on("change","[name=example1_length]",function(){
                $("input[name=pageorder]").val($(this).val());
                $("form[name=pageorder]").submit();
            });
            $("select[name=example1_length] option").each(function () {
                if ($(this).val() == $.urlParam('pageorder')){
                    $(this).attr("selected",true);
                }
            })
            ///click edit
            $('.btn-edit').click(function(){
                $databtn = $(this).data("data");
                $("#modal-xl-edit input ").each( function(){
                    $(this).val($databtn[$(this).attr("name")]);
                });
                $("input[name=id]").val($databtn['id']);
                $(".textareaedit").summernote('code', $databtn['note']);
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
                                url: '{{url("admin/service/")}}'+'/'+id,
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
