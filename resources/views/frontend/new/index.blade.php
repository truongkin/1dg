@extends('frontend.layouts.index')
@section('title', trans('message.Đặt hàng'))
@section('style')

@endsection
@section('content')
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch">
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-container kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet">
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="row row-no-padding row-col-separator-lg">
                        <div class="col-md-4 col-sm-12">
                            <div class="kt-widget24">
                                <div class="kt-widget24__details">
                                    <div class="kt-widget24__info">
                                        <i class="fa fa-shopping-cart" style="font-size: 30px;"></i>
                                        <h4 class="kt-widget24__title pt-2">{{trans('message.Tổng số đơn hàng')}} </h4>
                                    </div>
                                <span class="kt-widget24__stats kt-font-success total_orders">{{Auth::user()->total_orders }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="kt-widget24">
                                <div class="kt-widget24__details">
                                    <div class="kt-widget24__info">
                                        <i class="fa fa-dollar-sign" style="font-size: 30px;"></i>
                                        <h4 class="kt-widget24__title pt-2">{{trans('message.Số tiền đã thanh toán')}} </h4>
                                    </div>
                                <span class="kt-widget24__stats kt-font-success total_amount_paid">$ {{Auth::user()->total_amount_paid }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="kt-widget24">
                                <div class="kt-widget24__details">
                                    <div class="kt-widget24__info">
                                        <i class="fa fa-user" style="font-size: 30px;"></i>
                                        <h4 class="kt-widget24__title pt-2">{{trans('message.Hạng thành viên')}} &nbsp<a href="javascript:;" class="kt-font-dark" data-toggle="modal" data-target="#modal-member-level"><i class="fa fa-question-circle"></i></a></h4>
                                    </div>
                                    <span class="kt-badge kt-badge--success kt-badge--inline kt-font-bolder name_level" style="zoom: 1.4;"></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="kt-portlet kt-portlet--tabs">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-toolbar">
                                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x nav-tabs-line-right nav-tabs-bold" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#single-order" role="tab" aria-selected="false">
                                            <i class="fa fa-cube"></i>{{trans('message.Đặt hàng lẻ')}}   </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#mass-order" role="tab" aria-selected="false">
                                            <i class="fa fa-cubes"></i>{{trans('message.Đặt hàng nhiều')}}   </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="single-order">
                                    <form class="kt-form">
                                        <div class="form-group mb-3">
                                            <label>{{trans('message.Danh mục')}} </label>
                                            <select class="form-control sl-category" onchange="order.onChangeSelectCategory(event.target);">
                                                @foreach($list_category as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>{{trans('message.Dịch vụ')}} </label>
                                            <select class="form-control sl-service" onchange="order.onChangeSelectService(event.target);">

                                                @foreach($list_service as $service)
                                                    <option data-price_service="{{$service->price_service}}" value="{{$service->id}}">{{$service->name}} - ${{$service->price_service}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-4 col-lg-4">
                                                <div class="kt-portlet kt-portlet--border-bottom-primary">
                                                    <div class="kt-portlet__head kt-portlet__head--right kt-portlet__head--noborder kt-ribbon kt-ribbon--clip kt-ribbon--shadow kt-ribbon--left kt-ribbon--border-dash-hor kt-ribbon--brand">
                                                        <div class="kt-ribbon__target" style="top: 12px;">
                                                            <span class="kt-ribbon__inner"></span>{{trans('message.Giá trên mỗi 1000')}}  </div>
                                                    </div>
                                                    <div class="kt-portlet__body p-1">
                                                        <h5 class="text-center feature-price kt-font-bolder">{{$first_service->price_service}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-4">
                                                <div class="kt-portlet kt-portlet--border-bottom-primary">
                                                    <div class="kt-portlet__head kt-portlet__head--right kt-portlet__head--noborder kt-ribbon kt-ribbon--clip kt-ribbon--shadow kt-ribbon--left kt-ribbon--border-dash-hor kt-ribbon--brand">
                                                        <div class="kt-ribbon__target" style="top: 12px;">
                                                            <span class="kt-ribbon__inner"></span>{{trans('message.Tốc độ mỗi ngày')}}  </div>
                                                    </div>
                                                    <div class="kt-portlet__body p-1">
                                                        <h5 class="text-center feature-speed kt-font-bolder">{{$first_service->speed_date}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-4">
                                                <div class="kt-portlet kt-portlet--border-bottom-primary">
                                                    <div class="kt-portlet__head kt-portlet__head--right kt-portlet__head--noborder kt-ribbon kt-ribbon--clip kt-ribbon--shadow kt-ribbon--left kt-ribbon--border-dash-hor kt-ribbon--brand">
                                                        <div class="kt-ribbon__target" style="top: 12px;">
                                                            <span class="kt-ribbon__inner"></span>{{trans('message.Bảo hành')}}  </div>
                                                    </div>
                                                    <div class="kt-portlet__body p-1">
                                                        <h5 class="text-center feature-refill kt-font-bolder">{{$first_service->guarantee}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-4">
                                                <div class="kt-portlet kt-portlet--border-bottom-primary">
                                                    <div class="kt-portlet__head kt-portlet__head--right kt-portlet__head--noborder kt-ribbon kt-ribbon--clip kt-ribbon--shadow kt-ribbon--left kt-ribbon--border-dash-hor kt-ribbon--brand">
                                                        <div class="kt-ribbon__target" style="top: 12px;">
                                                            <span class="kt-ribbon__inner"></span>{{trans('message.Tối thiểu/Tối đa')}}  </div>
                                                    </div>
                                                    <div class="kt-portlet__body p-1">
                                                        <h5 class="text-center feature-minmax kt-font-bolder">{{$first_service->min}}/{{$first_service->max}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-4">
                                                <div class="kt-portlet kt-portlet--border-bottom-primary">
                                                    <div class="kt-portlet__head kt-portlet__head--right kt-portlet__head--noborder kt-ribbon kt-ribbon--clip kt-ribbon--shadow kt-ribbon--left kt-ribbon--border-dash-hor kt-ribbon--brand">
                                                        <div class="kt-ribbon__target" style="top: 12px;">
                                                            <span class="kt-ribbon__inner"></span>{{trans('message.Thời gian bắt đầu')}} </div>
                                                    </div>
                                                    <div class="kt-portlet__body p-1">
                                                        <h5 class="text-center feature-start kt-font-bolder">{{$first_service->time_start}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-4">
                                                <div class="kt-portlet kt-portlet--border-bottom-primary">
                                                    <div class="kt-portlet__head kt-portlet__head--right kt-portlet__head--noborder kt-ribbon kt-ribbon--clip kt-ribbon--shadow kt-ribbon--left kt-ribbon--border-dash-hor kt-ribbon--brand">
                                                        <div class="kt-ribbon__target" style="top: 12px;">
                                                            <span class="kt-ribbon__inner"></span>{{trans('message.Chất lượng')}}  </div>
                                                    </div>
                                                    <div class="kt-portlet__body p-1">
                                                        <h5 class="text-center feature-quality kt-font-bolder">{{$first_service->quality}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="div-description"><?php echo $first_service->note; ?></div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Link</label>
                                            <input type="text" class="form-control ipt-link" />
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>{{trans('message.Số lượng đặt hàng')}} </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control ipt-quantity" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text charge kt-font-boldest">$ 0</span>
                                                </div>
                                            </div>
                                        <span class="form-text text-muted min-max">{{trans('message.Tối thiểu')}} : <span class="min">{{$first_service->min}}</span> - {{trans('message.Tối đa')}} : <span class="max">{{$first_service->max}}</span></span>
                                        </div>

                                        <div class="form-group mb-3">
                                            <button type="button" class="btn btn-brand btn-order">{{trans('message.Đặt hàng btn')}}</button>
                                        </div>
                                        <div class="alert alert-danger alert-error" role="alert" style="display: none;"></div>
                                        <div class="alert alert-success alert-success" role="alert" style="display: none;"></div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="mass-order">
                                    <form class="kt-form">
                                        <div class="form-group mb-3">
                                            <label>Mỗi đơn hàng một dòng</label>
                                            <textarea class="form-control txa-mass-order" rows="10" placeholder="service_id | link | quantity
service_id | link | quantity
service_id | link | quantity
service_id | link | quantity"></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <button type="button" class="btn btn-brand btn-mass-order">{{trans('message.Đặt hàng btn')}}</button>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-striped- table-bordered table-hover table-checkable table-log" style="display: none;">
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    {{-- <div class="kt-portlet kt-portlet--tab">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Tình trạng views 4000H <i class="fa fa-bell text-success icon-status" style="display: none;"></i></h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <span class="kt-badge kt-badge--outline kt-badge--dark" id="status-countdown" style="zoom: 1.1;"></span>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="kt-section text-center mb-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- <h3>Server 1</h3> -->
                                        <h1 style="color: red;">BẢO TRÌ HỆ THỐNG</h1>
                                        <!-- <span class="kt-badge kt-badge--success kt-badge--xl status-sv">...</span> -->
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12 text-center">
                                        Last updated: <i><span class="status-last-updated">...</span></i>
                                    </div>
                                    <div class="col-md-12 text-center div-noti">
                                        <button type="button" class="btn btn-success btn-sm" onclick="order.requestPermission()"><i class="fa fa-bell"></i> Nhận thông báo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="kt-portlet kt-portlet--tabs">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-toolbar">
                                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x nav-tabs-line-right nav-tabs-bold" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#news" role="tab" aria-selected="false">
                                            <i class="fa fa-newspaper"></i> News
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#anoun" role="tab" aria-selected="false">
                                            <i class="fa fa-globe"></i> {{trans('message.Dịch vụ')}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="kt-portlet__body" >
                            <div class="tab-content" style="overflow:auto !important">
                                <div class="tab-pane" id="anoun">
                                    <div class="kt-scroll" data-scroll="true" style="height:500px">

                                        <div >
                                            <table class="table table-striped table-bordered table-hover table-checkable table-services dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_disabled text-center" rowspan="1" colspan="1" >ID</th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="text-align:center" >{{trans('message.Tên dịch vụ')}}</th>
                                                        <th class="sorting_disabled text-center" rowspan="1" colspan="1">{{trans('message.Giá cho 1000')}}</th>
                                                        <th class="sorting_disabled text-center" rowspan="1" colspan="1">{{trans('message.Số lượng tối thiểu')}}</th>
                                                        <th class="sorting_disabled text-center" rowspan="1" colspan="1">{{trans('message.Số lượng tối đa')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-services">
                                                    <tr>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="news">
                                    <div class="kt-scroll" data-scroll="true" style="height: 500px">
                                        <div class="kt-timeline-v1 kt-timeline-v1--justified">
                                            <div class="kt-timeline-v1__items">
                                                <div class="kt-timeline-v1__marker">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-member-level" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Member Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr class="kt-font-light kt-bg-brand">
                            <td></td>
                            <th class="text-center">Total deposits</th>
                            <th class="text-center">% Bonus Deposit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($levels as $row_lv)
                        <tr>
                            <th class="kt-font-light kt-bg-brand">{{$row_lv->name}}</th>
                            <td class="text-center">>= ${{$row_lv->total_deposits}}</td>
                            <td class="text-center">{{$row_lv->bonous_percen}}%</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <br> </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script src="frontend/assets/js/main/new.js?v=<?php echo rand(); ?>"></script>


@endsection
