@extends('Backend/layout/main',['selected' => 'news'])
@section('title')
    Tin mới
@endsection
@section('css')
    <!-- summernote -->
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
                        <h1>Tin tức mới</h1>
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
                            <h3 class="card-title">Tin tức mới</h3>
                            <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modal-xl-add">
                                Tạo tin mới
                            </button>
                            <form  action="{{url("admin/news")}}" name="pageorder" method="GET">
                                <input type="hidden" name="pageorder">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-responsive-md table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">Nội dung</th>
                                    <th style="width: 200px;text-align: center">Ngày tạo</th>
                                    <th style="width: 100px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td class="border">{{$item->id}}</td>
                                        <td class="border"><div class="content1">{!! $item->content !!}</div></td>
                                        <td class="border" style="text-align: center">{{$item->created_at}}</td>
                                        <td style="text-align: center"><button type="button" class="btn btn-sm btn-primary btn-edit" data-data="{{\App\Models\News::find($item->id)}}" data-toggle="modal"  data-target="#modal-xl-edit">
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
                        <div class="text-center">
                            {{$data->withQueryString()->render("pagination::bootstrap-4")}}
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
    <div class="modal fade" id="modal-xl-add">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" name="add-post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Tạo tin mới</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="textarea" name="content" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
    <div class="modal fade" id="modal-xl-edit">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" name="edit-post" method="PUT">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa tin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="textareaedit" name="content" name="content" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
        $(function () {

            // Summernote
            $('.textarea').summernote()
            $('div.note-editable').height(500);
        })
        /// form add submit
        $('form[name=add-post]').submit(function(e){
            e.preventDefault();
            $data = $('form[name=add-post]').serialize();
            $.ajax({
                url: '{{url("/admin/news")}}',
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
        $('.btn-edit').click(function(){
            $databtn = $(this).data("data");
            $("#modal-xl-edit input ").each( function(){
                $(this).val($databtn[$(this).attr("name")]);
            });
            $(".textareaedit").summernote('code', $databtn['content']);
            $("input[name=id]").val($databtn['id']);
            $('div.note-editable').height(500);
        });
        // $(".content1").each(function(){
        //     $(this).summernote('code', $(this).text());
        //     $(this).summernote('destroy');
        // })
        /// form edit submit
        $('form[name=edit-post]').submit(function(e){
            e.preventDefault();
            $data = $('form[name=edit-post]').serialize();
            $id = $('input[name=id]').val();
            $.ajax({
                url: '{{url("admin/news/")}}'+'/'+$id,
                type: 'PUT',
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
            $("select[name=example1_length]").each(function () {
                $(this).removeClass(["custom-select","form-control"]);
            })
            $("select[name=example1_length] option").each(function () {
                if ($(this).val() == $.urlParam('pageorder')){
                    $(this).attr("selected",true);
                }
            })
            $(document).on("change","[name=example1_length]",function(){
                $("input[name=pageorder]").val($(this).val());
                $("form[name=pageorder]").submit();
            });
        });
        ////click delete
        $('.btn-Delete').click(function(){
            $btn = $(this).parent().parent();
            let id = ($(this).data("data"));
            swal({
                title: "Xóa tin tức?",
                text: "Đồng ý xóa không thể khôi phục!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: '{{url("/admin/news/")}}'+'/'+id,
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
