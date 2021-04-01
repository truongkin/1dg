@extends('frontend.layouts.index')
@section('title', trans('message.Lịch sử'))
@section('style')
    <link href="https://shipx.vn/public/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <style type="text/css">
        /* .daterangepicker ul li{
            font-family: Open Sans,sans-serif !important;
        } */
        .daterangepicker .ranges li{
            font-family: Open Sans,sans-serif !important;
        }
        .daterangepicker{
            font-family: Open Sans,sans-serif !important;
        }
        .pagination li{
            padding:10px
        }
        .pagination li.active {
            z-index: 3;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
@endsection
@section('content')
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch page-orders">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <div class="kt-container  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="alert alert-warning">Xem lịch sử đơn hàng cũ vui lòng truy cập &nbsp<a target="_blank" href="http://1dg.me/new/">http://1dg.me/new</a></div> -->
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__body">
                            <form action="" method="get">
                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-2">
                                        
                                        <h6>{{trans('message.Mã đơn hàng')}}</h6>
                                        <input class="form-control" type="text" value="<?php if(isset($dataQuery['seach_order_id']))  echo $dataQuery['seach_order_id']; ?>" class="form-control ipt-keyword" name="seach_order_id" placeholder="{{trans('message.Tìm kiếm đơn hàng (Bỏ trống nếu muốn tìm kiếm theo ngày)')}}">
                                            {{-- <div class="input-group-append">
                                            <button class="btn btn-brand btn-search" type="submit">{{trans('message.Tìm kiếm')}}</button>
                                            </div> --}}
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <h6>{{trans('message.Từ ngày')}}</h6>
                                        <input class="form-control" placeholder="yyyy/mm/dd" autocomplete="off" value="<?php if(isset($dataQuery['time_start']))  echo $dataQuery['time_start'] ; ?>" id="datepickerInput" name="time_start"/>
            
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                            <h6>{{trans('message.Đến ngày')}}</h6>
                                        <input class="form-control" placeholder="yyyy/mm/dd" autocomplete="off" value="<?php if(isset($dataQuery['time_end']))  echo $dataQuery['time_end'] ; ?>" id="datepickerInput2" name="time_end"/>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <h6 style="color:white"> Đến ngày</h6>
                                        <button class="btn btn-brand btn-search" type="submit">{{trans('message.Tìm kiếm')}}</button>
        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="status" value="0" class="btn btn-dark">{{trans('message.Tất cả btn')}}</button>
                                    <button type="submit" name="status" value="1" class="btn btn-primary" >{{trans('message.Đang chờ xử lý btn')}}</button>
                                    <button type="submit" name="status" value="2" class="btn btn-primary" >{{trans('message.Đang chạy btn')}}</button>
                                    <button type="submit" name="status" value="3" class="btn btn-info" >{{trans('message.Đang xử lý btn')}}</button>
                                    <button type="submit" name="status" value="4" class="btn btn-success" >{{trans('message.Hoàn thành btn')}}</button>
                                    <button type="submit" name="status" value="5" class="btn btn-danger" >{{trans('message.Hoàn tiền một phần btn')}}</button>
                                    <button type="submit" name="status" value="6" class="btn btn-warning" >{{trans('message.Hủy đơn hàng btn')}}</button>
                                </div>
                                {{-- <div class="form-group mb-3 col-md-1"> --}}
                                    <select class="form-control sl-order col-md-1" name="limit">
                                        @foreach([10,50,100] as $limit)
                                            <option <?php if(isset($dataQuery['limit']) &&$dataQuery['limit']==$limit)  echo"selected='selected'" ; ?> value="{{$limit}}">{{$limit}}</option>
                                        @endforeach
                                    </select>
                                {{-- </div> --}}
                            </form>
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table  table-bordered mt-3" >
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 5%;">ID</th>
                                                    <th style="width: 15%;text-align: center">{{trans('message.Ngày')}}</th>
                                                    <th style="width: 35% !important;text-align: center">{{trans('message.Link')}}</th>
                                                    <th style="width: 5%;">{{trans('message.Số tiền')}}</th>
                                                    <th style="width: 10%;">{{trans('message.Số lượng ban đầu')}}</th>
                                                    <th style="width: 10%;">{{trans('message.Số lượng đặt hàng')}}</th>
                                                    <th style="width: 10%;">{{trans('message.Còn lại')}}</th>
                                                    <th style="width: 10%;">{{trans('message.Trạng thái')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($detail_order as $item)
                                                    <tr>
                                                        <td class="text-center" style="width: 5%;">{{$item->id}}</td>
                                                        <td class="text-center"  style="width: 15%;">{{$item->date_created_at_new}}</td>
                                                        <td style="width: 35% !important;">
                                                            {{$item->link}}
                                                            <br>
                                                            {{$item->services_name}}
                                                        </td>
                                                        <td class="text-center" style="width: 5%;">{{($item->amount * $item->price_service)/1000}}</td>
                                                        <td class="text-center" style="width: 10%;">{{$item->amount_start}}</td>
                                                        <td class="text-center" style="width: 10%;">{{$item->amount}}</td>
                                                        <td class="text-center" style="width: 10%;">{{ $item->amount - $item->amount_com }}</td>
                                                        <td class="text-center"style="width: 10%;"><span class="kt-badge kt-badge--{{$GLOBALS['status'][$item->status]['color2']}} kt-badge--inline">{{trans('message.'.$GLOBALS['status'][$item->status]['name'])}}</span></td>
                                                    </tr>
                                                @endforeach
                                                {{-- <tr class="odd">
                                                    <td valign="top" colspan="8" class="dataTables_empty">No data available in table</td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                 {{-- {!! $detail_order->links() !!} --}}
                                 
                            </div>
                            {{ $detail_order->links('frontend.order.custom_pagination', ['dataQuery' => $dataQuery]) }}
                            {{-- @include('frontend.order.custom_pagination', ['paginator' => $detail_order]) --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script src="frontend/assets/js/main/orders.js?v=<?php echo rand(); ?>"></script>
    <script src="https://shipx.vn/public/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
@endsection
