@extends('Backend/layout/main',['selected' => 'banks'])
@section("title")
    Ngân hàng
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
                        <h1>Tài khoản ngân hàng</h1>
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
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-responsive-md table-bordered table-striped">
                                <thead>
                                <tr>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Chủ tài khoản</th>
                                    <th class="text-center">Tên ngân hàng</th>
                                    <th class="text-center">Số tài khoản</th>
                                    <th style="width: 100px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cates as $item)
                                    <tr>
                                        <td class="border">{{$item->id}}</td>
                                        <td class="border">{{$item->name}}</td>
                                        <td class="border">{{$item->namebank}}</td>
                                        <td class="border">{{$item->numberbank}}</td>
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
            <form class="modal-content" id="bank-form" name="edit-bank">
                <input name="id" id="idbank" type="hidden" value="" />
                <div class="modal-header">
                    <h4 class="modal-title">Sửa dịch vụ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Tên chủ tài khoản</label> <small class="text-danger">*</small>
                                    <input type="text" class="form-control" required id="nameedit" name="name"  placeholder="Tên chủ tài khoản" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Tên ngân hàng</label> <small class="text-danger">*</small>
                                    <input type="text" class="form-control"  required id="bankedit" name="namebank"  placeholder="Tên ngân hàng" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Số tài khoản ngân hàng</label> <small class="text-danger">*</small>
                                    <input type="text" class="form-control" required id="numberedit" name="numberbank"  placeholder="Số tài khoản ngân hàng" />
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
    <!-- /.modal -->
    <div class="modal fade" id="modal-xl-add">
        <div class="modal-dialog modal-md">
            <form class="modal-content" name="add-bank">
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
                                <label for="name">Tên chủ tài khoản</label> <small class="text-danger">*</small>
                                <input type="text" class="form-control" required id="nameedit" name="name"  placeholder="Tên chủ tài khoản" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Tên ngân hàng</label> <small class="text-danger">*</small>
                                <input type="text" class="form-control" required id="bankedit" name="namebank"  placeholder="Tên ngân hàng" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Số tài khoản ngân hàng</label> <small class="text-danger">*</small>
                                <input type="text" class="form-control" required id="numberedit" name="numberbank"  placeholder="Số tài khoản ngân hàng" />
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
        $('form[name=add-bank]').submit(function(e){
            e.preventDefault();
            $data = $('form[name=add-bank]').serialize();
            console.log($data);
            $.ajax({
                url:  "{{url("admin/bank")}}",
                type: 'POST',
                data: $data,
                success: function($data){
                    let value = JSON.parse(JSON.stringify($data));
                    toastr[value.type](value.content);
                    if (value.type=="success"){
                        $('#modal-xl-add').modal('hide');
                        location.reload();
                    }else{
                        e.preventDefault();
                    }
                }
            });
        })
        // btn edit click
        $('form[name=edit-bank]').submit(function(e){
            e.preventDefault();
            $id = $('#idbank').val();
            // $data = $('#bank-form').serialize();
            $name = $('#nameedit').val();
            $bankedit = $('#bankedit').val();
            $numberedit = $('#numberedit').val();
            $.ajax({
                url: "{{url("admin/bank")}}"+"/"+$id,
                type: 'PUT',
                data: {
                    id: $id,
                    name: $name,
                    bank: $bankedit,
                    number: $numberedit
                },
                success: function($data){
                    let value = JSON.parse(JSON.stringify($data));
                    if (value.type=="success"){
                        toastr[value.type](value.content);
                        $('#modal-xl-edit').modal('hide');
                        location.reload();
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
                $(".textareaedit").summernote('code', $databtn['note']);
            });
            ////click delete
            $('.btn-Delete').click(function(){
                $btn = $(this).parent().parent();
                let id = ($(this).data("data"));
                swal({
                    title: "Xóa ngân hàng?",
                    text: "Đồng ý xóa không thể khôi phục!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{url("admin/bank")}}"+"/"+id,
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
