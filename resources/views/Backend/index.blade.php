@extends('Backend/layout/main',['selected' => 'home'])
@section("title")
    Home
@endsection
@section("css")
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
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thống kê</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$countnew}}</h3>
                                <p>Đang chờ xử lý</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            {{--                            <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$ratedone}}<sup style="font-size: 20px">%</sup></h3>

                                <p>Tỉ lệ đơn hoàn thành</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            {{--                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$countnewuser}}</h3>
                                <p>Người dùng mới</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            {{--                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$ratecancel}}<sup style="font-size: 20px">%</sup></h3>
                                <p>Tỉ lệ đơn hủy</p>
                            </div>

                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            {{--                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title float-left">Danh sách các đơn hàng</h3>
                                <form  action="{{url("admin/home")}}" name="pageorder" method="GET">
                                    <input type="hidden" name="pageorder">
                                    <input type="hidden" name="from" value="@php if(isset($_GET['from'])){ echo $_GET['from'];}@endphp">
                                    <input type="hidden" name="to" value="@php if(isset($_GET['to'])){ echo $_GET['to'];}@endphp">
                                    <input type="hidden" name="status" value="@php if(isset($_GET['status'])){ echo $_GET['status'];}@endphp">
                                </form>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="filter row border-bottom mb-3">
                                    <div class="col-md-2 ml-auto">
                                        <div class="form-group">
                                            <label for="status">Trạng thái đơn</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="0">Tất cả</option>
                                                <option value="1">Đang chờ xử lý</option>
                                                <option value="2">Đang chạy</option>
                                                <option value="3">Đang xử lý</option>
                                                <option value="4">Hoàn thành</option>
                                                <option value="5">Hoàn tiền một phần</option>
                                                <option value="6">Hủy đơn hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Id khách</label>
                                            <input type="number" min="1" name="iduser" class="form-control" value="@if(isset($_GET['iduser'])){{$_GET['iduser']}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Tên khách</label>
                                            <input type="text" maxlength="255" name="nameuser" class="form-control" value="@if(isset($_GET['nameuser'])){{$_GET['nameuser']}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Id hóa đơn</label>
                                            <input type="number" min="1" name="idorder" value="@if(isset($_GET['idorder'])){{$_GET['idorder']}}@endif" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Từ ngày</label>
                                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                <input type="text" name="from" placeholder="Ngày-Tháng-Năm" class="form-control datetimepicker-input" data-target="#reservationdate1"/>
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
                                                <input type="text" name="to" placeholder="Ngày-Tháng-Năm" class="form-control datetimepicker-input" data-target="#reservationdate"/>
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
                                        <a class="btn btn-sm btn-primary" href="{{url("admin/home")}}">Refresh</a>
                                        </div>
                                    </div>
                                </form>

                                <table id="example1" class="table table-responsive-md table-bordered">
                                    <thead>
                                    <tr style="text-align: center">
                                        <th rowspan="2" style="width: 100px">ID</th>
                                        <th rowspan="2" style="width: 150px">ID khách</th>
                                        <th rowspan="2">Tên khách</th>
                                        <th rowspan="2">Ngày lên đơn</th>
                                        <th rowspan="1" colspan="6">Trạng thái đơn</th>
                                        <th rowspan="2" style="width: 90px">Chi tiết hóa đơn</th>
                                    </tr>
                                    <tr style="text-align: center">
                                        <th class="badge-danger">Đang chờ xử lý</th>
                                        <th class="badge-primary">Đang chạy</th>
                                        <th class="badge-warning">Đang xử lý</th>
                                        <th class="badge-success">Hoàn thành </th>
                                        <th class="badge-info">Hoàn tiền 1 phần </th>
                                        <th class="badge-secondary">Hủy đơn hàng</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($test as $item)
                                        <tr>
                                            <td class="border" style="text-align: center">{{($item->id)}}</td>
                                            <td class="border" style="text-align: center">{{$item->users_id}}</td>
                                            <td class="border">{{\App\Models\User::find($item->users_id)->name}}</td>
                                            <td class="border" style="text-align: center">{{$item->created_at}}</td>

                                            @if(count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',1]])->get()) > 0)
                                                <td class="badge-danger text-center">
                                                    <span class="badge ">{{count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',1]])->get())}}</span>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <span>{{count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',1]])->get())}}</span>
                                                </td>
                                            @endif
                                            @if(count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',2]])->get()) > 0)
                                                <td class="text-center badge-primary"><span>{{count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',2]])->get())}}</span>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <span>{{count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',2]])->get())}}</span>
                                                </td>
                                            @endif
                                            @if(count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',3]])->get()) > 0)
                                                <td class="text-center badge-warning">
                                                    <span>{{count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',3]])->get())}}</span>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <span>{{count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',3]])->get())}}</span>
                                                </td>
                                            @endif
                                            @if(count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',4]])->get()) > 0)
                                                <td class="text-center badge-success">
                                                    <span>{{count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',4]])->get())}}</span>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <span>{{count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',4]])->get())}}</span>
                                                </td>
                                            @endif
                                            @if(count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',5]])->get()) > 0)
                                                <td class="text-center badge-info">
                                                    <span>{{count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',5]])->get())}}</span>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <span>{{count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',5]])->get())}}</span>
                                                </td>
                                            @endif
                                            @if(count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',6]])->get()) > 0 )
                                                <td class="text-center badge-secondary">
                                                    <span>{{count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',6]])->get())}}</span>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <span>{{count(\App\Models\Detail_Order::where([['orders_id','=',$item->id],['status',6]])->get())}}</span>
                                                </td>
                                            @endif

                                            <td style="text-align: center"><button type="button" class="btn btn-sm btn-primary btn-order" data-total="{{$item->total}}" data-toggle="modal" data-data="{{\App\Models\Order::find($item->id)->detailorder}}" data-target="#modal-xl-order">
                                                    <i class="far fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                <div class="text-center">
                                        {{$test->withQueryString()->render("pagination::bootstrap-4")}}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <div class="modal fade" id="modal-xl-order">
            <div class="modal-dialog modal-xl" style="max-width: 1850px !important;">
                <form class="modal-content" name="add-category">
                    <div class="modal-header">
                        <h4 class="modal-title">Hóa đơn chi tiết</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <table id="example2" class="table table-bordered" style="font-size: 14px">
                                <thead>
                                <tr style="text-align: center">
                                    <th>Dịch vụ</th>
                                    <th>Link khách yêu cầu</th>
                                    <th>Giá dịch vụ</th>
                                    <th>Số lượng ban đầu</th>
                                    <th>Tổng số lượng</th>
                                    <th>Số lượng đã hoàn thành</th>
                                    <th class="border"> Số tiền hoàn trả(nếu có)</th>
                                    <th>Trạng thái cũ</th>
                                    <th style="width: 175px">Cập nhật trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <div class="col-md-12 text-right">
                                <p class="font-weight-bold">Tổng tiền: <span class="total"></span>$</p>
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
    </div>
@endsection
@section('js')
    <!-- jQuery -->
    <script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
    <!-- date-range-picker -->
    <script src="{{asset("plugins/daterangepicker/daterangepicker.js")}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset("plugins/jquery-ui/jquery-ui.min.js")}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset("dist/js/adminlte.min.js")}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset("dist/js/demo.js")}}"></script>
    <!-- DataTables -->
    <script src="{{asset("plugins/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
    <!-- InputMask -->
    <script src="{{asset("plugins/moment/moment.min.js")}}"></script>
    <script src="{{asset("plugins/inputmask/min/jquery.inputmask.bundle.min.js")}}"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //check param url
        $.urlParam = function(name){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results != null) return results[1]
            else return 0;
        }
        //Date range picker
        $('#reservationdate').datetimepicker({
            // format: 'L',
            format:'DD-MM-YYYY',
        });
        $('#reservationdate1').datetimepicker({
            format:'DD-MM-YYYY',
        });
        //add result
        function addresult(){
            //load status
            $("select[name=status] option").each(function(){
               if ($(this).val()== $.urlParam("status")){
                   $(this).attr("selected",true);
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
        }
        $(function () {
            addresult();
            $("#example1").DataTable({
                "autoWidth": false,
                "bSort": false,
                "searching": false,
                "pageLength": 50,
                "info": false,

                // "bPaginate": false,
                "language": {
                    "sEmptyTable": "Không tìm thấy dữ liệu",
                    "lengthMenu": "Hiển thị _MENU_ bản ghi",
                    "paginate": {
                        "first": "Đầu tiên",
                        "last": "Cuối",
                        "next": "Tiếp",
                        "previous": "Trước"
                    },
                }
            });
            $("select[name=example1_length] option").each(function () {
                if ($(this).val() == $.urlParam('pageorder')){
                    $(this).attr("selected",true);
                }
            })
            $("select[name=example1_length]").each(function () {
                    $(this).removeClass(["custom-select","form-control"]);
            })
        });

        $(document).on("change","[name=example1_length]",function(){
            $("input[name=pageorder]").val($(this).val());
            $("form[name=pageorder]").submit();
        });

        $('.btn-order').click(function(){
                $data = ($(this).data('data'));
                $('.total').text($(this).data('total'));
                $htm ="";
                $('#example2 tbody tr').remove();
                $.each($data,function (key,value){
                    $select = "";
                    $status="";
                    if (value['status']==1)      {$status = "<span class=\"badge badge-danger\">Đang chờ xử lý</span>";
                        $select = "      <option selected value='1'>Đang chờ xử lý</option>" +
                            "      <option value='2'>Đang chạy</option>\n" +
                            "      <option value='3'>Đang xử lý</option>\n" +
                            "      <option value='4'>Hoàn thành</option>\n" +
                            "      <option value='5'>Hoàn tiền 1 phần</option>\n" +
                            "      <option value='6'>Hủy đơn hàng</option>\n" }
                    else if(value['status']==2) {
                        $status = "<span class=\"badge badge-primary\">Đang chạy</span>";
                        $select = "      <option value='1'>Đang chờ xử lý </option>" +
                            "      <option selected value='2'>Đang chạy</option>\n" +
                            "      <option value='3'>Đang xử lý</option>\n" +
                            "      <option value='4'>Hoàn thành</option>\n" +
                            "      <option value='5'>Hoàn tiền 1 phần</option>\n" +
                            "      <option value='6'>Hủy đơn hàng</option>\n"
                    }
                    else if(value['status']==3) {
                        $status = "<span class=\"badge badge-warning\">Đang xử lý</span>";
                        $select = "      <option value='1'>Đang chờ xử lý </option>" +
                            "      <option value='2'>Đang chạy</option>\n" +
                            "      <option selected value='3'>Đang xử lý</option>\n" +
                            "      <option value='4'>Hoàn thành</option>\n" +
                            "      <option value='5'>Hoàn tiền 1 phần</option>\n" +
                            "      <option value='6'>Hủy đơn hàng</option>\n"
                    }
                    else if(value['status']==4) {
                        $status = "<span class=\"badge badge-success\">Hoàn thành</span>";
                        $select = "      <option value='1'>Đang chờ xử lý </option>" +
                            "      <option value='2'>Đang chạy</option>\n" +
                            "      <option value='3'>Đang xử lý</option>\n" +
                            "      <option selected value='4'>Hoàn thành</option>\n" +
                            "      <option value='5'>Hoàn tiền 1 phần</option>\n" +
                            "      <option value='6'>Hủy đơn hàng</option>\n"
                    }
                    else if(value['status']==5) {
                        $status = "<span class=\"badge badge-info\">Hoàn tiền 1 phần</span>";
                        $select = "      <option value='1'>Đang chờ xử lý </option>" +
                            "      <option value='2'>Đang chạy</option>\n" +
                            "      <option value='3'>Đang xử lý</option>\n" +
                            "      <option value='4'>Hoàn thành</option>\n" +
                            "      <option selected value='5'>Hoàn tiền 1 phần</option>\n" +
                            "      <option value='6'>Hủy đơn hàng</option>\n"
                    }
                    else if(value['status']==6) {
                        $status = "<span class=\"badge badge-secondary\">Hủy đơn hàng</span>";
                        $select = "      <option value='1'>Đang chờ xử lý </option>" +
                            "      <option value='2'>Đang chạy</option>\n" +
                            "      <option value='3'>Đang xử lý</option>\n" +
                            "      <option value='4'>Hoàn thành</option>\n" +
                            "      <option value='5'>Hoàn tiền 1 phần</option>\n" +
                            "      <option selected value='6'>Hủy đơn hàng</option>\n";

                    }
                    $disabled="";
                    if (value['status'] != 5) $disabled = "disabled";
                    else{
                        $disabled = "";
                    }
                    $htm +=  "<tr>" +
                        "<td class=\"border\" style=\"text-align: center\">" +
                        value['services_name']+
                        "</td>" +
                        "<td class=\"border\">" +
                        value['link']+
                        "</td>" +
                        "<td class=\"border\" style=\"text-align: center\">" +
                        value['price_service']+
                        "</td>\n" +
                        "<td class=\"border text-center\"><form class='' name='amount_start'><input data-data='"+value['id']+"' class='amount_start' name='amount_start' style='width: 80px' value='" +value['amount_start']+"'/>" +
                        "<input type='hidden' name='id' value='"+value['id']+"'/>"+
                        "</form></td>" +
                        "<td class=\"border \" style=\"text-align: center\">" +
                        value['amount']+
                        "</td>" +
                        "<td class=\"border text-center\"><form class='' name='amount_com'><input data-data='"+value['id']+"' class='amount_com' name='amount_com' style='width: 80px' value='" +value['amount_com']+"'/>" +
                        "<input type='hidden' name='id' value='"+value['id']+"'/>"+
                        "</form></td>"+
                        "<td class=\"border text-center\"><form name='refundform'><input "+$disabled+" class='refund' name='refund' style='width: 80px' value='" +
                        value['refund']+
                        "'/>" +
                        "<input type='hidden' name='id' value='" +
                        value['id']+
                        "'/>"+
                        "</form></td>"+
                        "<td class=\"border text-center\">"+$status+"</td>"+
                        "<td class=\"border\" ><form name=\"statusform\"><select data-data='"+value['id']+"' name='status' style='font-size: 14px' class=\"form-control status\">\n" +$select
                        +
                        "<input type='hidden' name='id' value='" + value['id'] +"'/></select></td>"+
                        "</tr>"
                });
                $('#example2 tbody').append($htm);
            });

        $(document).on('change',".refund",function(e){
            $data = $(this).parent('form[name=refundform]').serialize();
            if ($(this).val() < 0){
                toastr["error"]("Số lượng phải lớn hơn hoặc bằng 0");
            }else{
                $.ajax({
                    url: "{{url('admin/updaterefund')}}",
                    type: 'POST',
                    data: $data,
                    success: function($data){
                        let value = JSON.parse(JSON.stringify($data));
                        if (value.type=="success"){
                            toastr[value.type](value.content);
                        }else{
                            e.preventDefault();
                        }
                    }
                });
            }
        });
        $(document).on('change',".amount_start",function(){
            // $data = $(this).parent('form[name=amountstart]').serialize();
            $id     = $(this).data('data');
            $data   = $(this).val();
            if ($data < 0){
                toastr["error"]("Số lượng phải lớn hơn hoặc bằng 0");
            }else{
                $.ajax({
                    url: "{{route('upamountstart')}}",
                    type: 'POST',
                    data: {
                        id: $id,
                        data: $data
                    },
                    success: function($data){
                        let value = JSON.parse(JSON.stringify($data));
                        if (value.type=="success"){
                            toastr[value.type](value.content);
                        }else{
                            e.preventDefault();
                        }
                    }
                });
            }

        });
        $(document).on('change',".status",function(){
            $amount_total   = $(this).parent().parent().prev().prev().prev().prev().text();
            $amount_com     = $(this).parent().parent().prev().prev().prev().find(".amount_com").val();
            $status_old     = $(this).parent().parent().prev().find("span").text();
            console.log($status_old);
            // console.log($amount_com);
            // console.log($amount_total);
            // console.log($(this).val());
            $check = 1;
            if ($(this).val() == 4 && (parseInt($amount_com) < parseInt($amount_total))) {
                $check = 0;
                toastr['error']("Số lượng đã hoàn thành nhỏ hơn tổng số lượng");
            }else{
                console.log("??");
                $check = 1;
            }
            $disable = $(this).parent().parent().parent().find("input[name=refund]");
            $data = $(this).parent('form[name=statusform]').serialize();
            $status = ($(this).val());
            if ($check ==1){
                $.ajax({
                    url: "{{route('upstatus')}}",
                    type: 'POST',
                    data: $data,
                    success: function($data){
                        let value = JSON.parse(JSON.stringify($data));
                        if (value.type=="success"){
                            toastr[value.type](value.content);
                            if ($status == 5){
                                $disable.attr("disabled",false);
                            }else{
                                $disable.attr("disabled",true);
                            }
                        }else{
                            e.preventDefault();
                        }
                    }
                });
            }

        });
        $(document).on('change',".amount_com",function(){
            $data = $(this).parent('form[name=amount_com]').serialize();
            if ($(this).val() < 0){
                toastr["error"]("Số lượng phải lớn hơn hoặc bằng 0");
            }else{
                $.ajax({
                    url: "{{route('upamountcom')}}",
                    type: 'POST',
                    data: $data,
                    success: function($data){
                        let value = JSON.parse(JSON.stringify($data));
                        if (value.type=="success"){
                            toastr[value.type](value.content);
                        }else{
                            e.preventDefault();
                        }
                    }
                });
            }

        });
    </script>
@endsection
