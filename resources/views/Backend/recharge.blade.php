@extends('Backend/layout/main',['selected' => 'recharge'])
@section('title')
    Nạp tiền
    @endsection
@section("css")
    <style>
        #example1_paginate{
            display: none ;
        }
        .pagination {
            justify-content: center;
        }
        @media (min-width: 576px){
            .modal-dialog {
                max-width: 650px;
                margin: 1.75rem auto;
            }
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
                        <h1>Nạp tiền cho người dùng</h1>
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
                            <h3 class="card-title">Lịch sử tiền đã nạp</h3>
                            <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modal-xl-add">
                                Nạp tiền cho khách

                            </button>
                            <form  action="{{url("admin/recharge")}}" name="pageorder" method="GET">
                                <input type="hidden" name="pageorder">
                                <input type="hidden" name="from" value="@php if(isset($_GET['from'])){ echo $_GET['from'];}@endphp">
                                <input type="hidden" name="to" value="@php if(isset($_GET['to'])){ echo $_GET['to'];}@endphp">
                                <input type="hidden" name="iduser" value="@php if(isset($_GET['status'])){ echo $_GET['status'];}@endphp">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="filter row border-bottom mb-3">
                                <div class="col-md-2 ml-auto">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Id khách</label>
                                        <input type="number" min="1" name="iduser" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Tên khách</label>
                                        <input type="text" name="nameuser" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Từ ngày</label>
                                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                            <input type="text" name="from" placeholder="dd/mm/yyyy" class="form-control datetimepicker-input" data-target="#reservationdate1"/>
                                            <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 mr-auto">
                                    <div class="form-group">
                                        <label>Đến ngày</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="to" placeholder="dd/mm/yyyy" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center mb-3">
                                    <div>
                                        <input type="hidden" name="pageorder" value="50">
                                        <button type="submit" class="btn btn-sm btn-primary m-auto">Tìm kiếm</button>
                                        <a href="{{url("admin/recharge")}}" type="button" class="btn btn-sm btn-primary m-auto">Refresh</a>
                                    </div>
                                </div>
                            </form>
                            <table id="example1" class="table table-responsive-md table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">STT</th>
                                        <th style="text-align: center">(ID)Người nhận</th>
                                        <th style="text-align: center">Số tiền nạp</th>
                                        <th style="text-align: center">Số tiền được thưởng</th>
                                        <th style="text-align: center">Số tiền tổng nhận</th>
                                        <th style="width: 200px;text-align: center">Ngày nạp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $stt = 0; @endphp
                                @foreach($data as $item)
                                        <tr>
                                            <td class="border">{{++$stt}}</td>
                                            <td class="border">({{$item->users_id}}) {{\App\Models\User::find($item->users_id)->name}} </td>
                                            <td class="border">{{$item->total_input}}</td>
                                            <td class="border">{{$item->bonus}}</td>
                                            <td class="border">{{$item->total}}</td>
                                            <td class="border" style="text-align: center">{{$item->created_at}}</td>

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
    <div class="modal fade" id="modal-xl-add">
        <div class="modal-dialog modal-md">
            <form class="modal-content" name="add-recharge">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Nạp tiền</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">ID người nhận</label> <small class="text-danger">*</small>
                                <div class="position-relative user_id">
                                    <input type="number" class="form-control" id="users_id" name="users_id"  placeholder="Nhập id người nhận" required />
{{--                                    <img class="position-absolute" style="top: 0; right: 0; bottom: 0;margin: auto;width: 30px" src="/img/loading.gif">--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">1$=<span id="rate">?</span>VND</label> <small class="text-danger">*</small>
                                <div class="position-relative">

                                    <input type="text" maxlength="9" pattern="\d*" max="999999999" disabled class="form-control" name="rate"  placeholder="" required />
                                    {{--                                    <img class="position-absolute" style="top: 0; right: 0; bottom: 0;margin: auto;width: 30px" src="/img/loading.gif">--}}
{{--                                    <input type="text" pattern="\d*" maxlength="4">--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total">Số tiền muốn nạp (VNĐ)</label> <small class="text-danger">*</small>
                                <input type="text" maxlength="9" pattern="\d*" max="999999999" disabled class="form-control" id="total_input" name="total_input1" placeholder="Nhập số tiền muốn nạp" required/>
                                <input type="hidden" name="total_input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="level">Level Vip</label>
                                <input type="text" class="form-control" disabled id="level" name="level" placeholder=""  required/>
                                <input type="hidden" name="bonus1">
                                <input type="hidden" name="bonus">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total">Tổng tiền nhận được ($)</label>
                                <input type="number" step="0.0001" class="form-control" disabled id="total" name="total" placeholder="" required/>
                                <input type="hidden" name="total" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Họ tên người nhận</label>
                                <input type="text"  class="form-control" id="name" name="name"  placeholder="Tên người nhận sau khi nhập id" disabled/>
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
    <!-- InputMask -->
    <script src="{{asset("plugins/moment/moment.min.js")}}"></script>
    <script src="{{asset("plugins/inputmask/min/jquery.inputmask.bundle.min.js")}}"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>
    <!-- page script -->
    <script>
        // $checkrate = 0;
        $("input[name=rate]").change(function(){
           if ($.isNumeric($(this).val())){
               // $checkrate = 1;
               $(this).removeClass("is-invalid");
           }else{
               toastr['error']("Tỉ lệ quy đổi phải là số");
                // $checkrate = 0;
               $(this).addClass("is-invalid");
           }
        });
        $("input[name=total_input1]").change(function(){
            if ($.isNumeric($(this).val())){
                // $checkrate = 1;
                $(this).removeClass("is-invalid");
            }else{
                toastr['error']("Tỉ lệ quy đổi phải là số");
                // $checkrate = 0;
                $(this).addClass("is-invalid");
            }
        });
        //Date range picker
        $('#reservationdate').datetimepicker({
            // format: 'L',
            format:'DD-MM-YYYY',
        });
        $('#reservationdate1').datetimepicker({
            format:'DD-MM-YYYY',
        });
        /// form add submit
        $('form[name=add-recharge]').submit(function(e){
            e.preventDefault();
            $data = $('form[name=add-recharge]').serialize();
            $.ajax({
                url: '{{asset("/admin/recharge")}}',
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
        //check param url
        $.urlParam = function(name){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results != null) return results[1]
            else return 0;
        }
        ///datatabke
        $(function () {
            $("#example1").DataTable({
                "autoWidth": false,
                "bSort" : false,
                "pageLength": 50,
                "info": false,
                "searching" : false,
                // "bPaginate": false,
                "language": {
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ bản",
                    "lengthMenu":     "Hiển thị _MENU_ bản ghi",
                    "paginate": {
                        "first":      "Đầu tiên",
                        "sEmptyTable": "Không tìm thấy dữ liệu",
                        "last":       "Cuối",
                        "next":       "Tiếp",
                        "previous":   "Trước"
                    },
                }
            });
            //load page
            if ($.urlParam("from")!=""){
                $("input[name=from]").val($.urlParam("from"));
            }
            if ($.urlParam("to")!=""){
                $("input[name=to]").val($.urlParam("to"));
            }
            if ($.urlParam("pageorder")!=""){
                $("input[name=pageorder]").val($.urlParam("pageorder"));
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
        });
        ////Nhập id
        var _changeInterval = null;
        $("input[name=users_id]").keyup(function() {
            $('.loading').remove();
            clearInterval(_changeInterval)
            _changeInterval = setInterval(function() {
                $('.user_id').append('<img class="position-absolute loading" style="top: 0; right: 0; bottom: 0;margin: auto;width: 30px" src="{{asset("/img/loading.gif")}}">');
                // console.log("User finished typing, clear interval again. We don;t want to repeat our task for indefinitely")
                // Typing finished, now you can Do whatever after 2 sec
                $("input[name=users_id]").attr("disabled","true");
                clearInterval(_changeInterval)

                $.ajax({
                    url: '{{asset("/admin/recharge/")}}'+'/'+$("input[name=users_id]").val(),
                    type: 'GET',

                    success: function($data){
                        let value = JSON.parse(JSON.stringify($data));
                        console.log(value);
                        if (value.type=="success" && value.data != null){
                            $('.loading').remove();
                            $("input[name=users_id]").prop("disabled", false);
                            toastr[value.type](value.content);
                            $('#users_id').removeClass('is-invalid');
                            $("input[name=rate]").attr("disabled",false);
                            $("input[name=total_input1]").attr("disabled",false);
                            $("input[name=rate]").focus();
                            $("input[name=name]").val(value.data['name'] +' - '+ value.data['email']);
                            $("input[name=level]").val(value.level['name'] + ' - '+ value.level['bonous_percen']+' %');
                            $("input[name=bonus1]").val(value.level['bonous_percen']);
                        }else{
                            toastr["error"]("ID không tồn tại");
                            $('#users_id').addClass('is-invalid');
                            $('.loading').remove();
                            $("input[name=users_id]").prop("disabled", false);
                            $("input[name=users_id]").focus();
                            $("input[name=name]").val("");
                            $("input[name=level]").val("");
                            $("input[name=bonus1]").val("");
                        }
                    }
                });
            }, 500);

        });
        // function tongtien(){
        //     if ($("input[name=rate]") != "" && $("input[name=total_input]") != ""){
        //
        //     }
        // }
        /// Nhập số tiền nhạp
        $("input[name=total_input1]").keyup(function(){
            $rate = $("input[name=rate]").val();
            $input = parseFloat($("input[name=total_input1]").val());
            $m      = $input/parseFloat($rate);
            $bonus = parseFloat($("input[name=bonus1]").val());
            $moneybonus = $m/100*$bonus;
            $total = $m + $moneybonus;
            $("input[name=total_input]").val($m);
            // console.log($input+'/'+$moneybonus);
            $("input[name=total]").val($total);
            $("input[name=bonus]").val($moneybonus);
        });
        $("input[name=rate]").keyup(function(){
            $("#rate").text($(this).val());
        });
    </script>
@endsection
