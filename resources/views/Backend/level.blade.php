@extends('Backend/layout/main',['selected' => 'level'])
@section("title")
    Ưu đãi
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.css")}}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chế độ ưu đãi</h1>
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
                            <h3 class="card-title">Danh sách VIP</h3>
                            <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modal-xl-add">
                                Thêm mới
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-responsive-md table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 50px;text-align: center">ID</th>
                                    <th class="text-center">Tên ưu đãi</th>
                                    <th class="text-center">Tổng tiền cần đạt</th>
                                    <th class="text-center">Chiết khấu</th>
                                    <th style="width: 100px"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($level as $item)

                                        <tr>
                                            <td class="border" style="text-align: center">{{$item->id}}</td>
                                            <td class="border">{{$item->name}}</td>
                                            <td class="border">{{$item->total_deposits}}</td>
                                            <td class="border">{{$item->bonous_percen}} %</td>
                                            <td style="text-align: center"><button type="button" class="btn btn-sm btn-primary btn-edit" data-data="{{$item}}" data-toggle="modal"  data-target="#modal-xl-edit">
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
            <form class="modal-content" name="edit-level">
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
                                    <label for="name">Tên gói ưu đãi</label>  <small class="text-danger">*</small>
                                    <input type="text" class="form-control" maxlength="255" required id="name" name="name"  placeholder="Tên VIP" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="total_deposits">Mức tiền cần đạt</label> <small class="text-danger">*</small>
                                    <input type="number" min="0" class="form-control" max="2200000" required id="total_deposits" name="total_deposits" placeholder="$$$$$" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bonous_percen">% chiết khấu</label> <small class="text-danger">*</small>
                                    <input type="number" step="0.0001" min="0" max="2200000" class="form-control position-relative" required id="bonous_percen" name="bonous_percen"  placeholder="Chỉ cần nhập số" />
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
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
            <input name="id" type="hidden" value="" />
            <form class="modal-content" name="add-level">
                <div class="modal-header">
                    <h4 class="modal-title">Chế độ ưu đãi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Tên gói ưu đãi</label> <small class="text-danger">*</small>
                                    <input type="text" class="form-control" maxlength="255" required id="name" name="name"  placeholder="Tên VIP" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="total_deposits">Mức tiền cần đạt</label> <small class="text-danger">*</small>
                                    <input type="number" class="form-control" min="0" max="2200000"  required id="total_deposits" name="total_deposits" placeholder="$$$$$" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bonous_percen">% chiết khấu</label> <small class="text-danger">*</small>
                                    <input type="number" step="0.001" min="0" max="2200000" class="form-control position-relative" required id="bonous_percen" name="bonous_percen"  placeholder="Chỉ cần nhập số" />
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
        $('form[name=add-level]').submit(function(e){
            e.preventDefault();
            $data = $('form[name=add-level]').serialize();
            $.ajax({
                url: '{{url("admin/level")}}',
                type: 'POST',
                data: $data,
                success: function($data){
                    let value = JSON.parse(JSON.stringify($data));
                    toastr[value.type](value.content);
                    if (value.type=="success"){
                        $('#modal-xl-add').modal('hide');
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
        // btn edit click
        $('form[name=edit-level]').submit(function(e){
            e.preventDefault();
            $id = $('input[name=id]').val();
            $data = $('form[name=edit-level]').serialize();
            $.ajax({
                url: '{{url("admin/level")}}'+'/'+$id,
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
            $("select[name=example1_length]").each(function () {
                $(this).removeClass(["custom-select","form-control"]);
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
                    title: "Xóa ưu đãi?",
                    text: "Đồng ý xóa không thể khôi phục!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: '{{url("/admin/level")}}'+'/'+id,
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
