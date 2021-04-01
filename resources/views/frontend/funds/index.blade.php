@extends('frontend.layouts.index')
@section('title', trans('message.Nạp tiền'))
@section('content')
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <div class="kt-container kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="kt-portlet">
                        <div class="kt-portlet__body">
                            <form class="kt-form">
                                <div class="form-group">
                                    <label>{{trans('message.Ngân hàng')}}</label>
                                    <select class="form-control sl-pm-method">
                                        <option value="0"> ---  </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('message.Chi tiết btn')}}</label>
                                    <div class="div-details">
                                        <div>{{trans('message.Chuyển khoản vào số tài khoản bên dưới. Ghi nội dung chuyển là id đăng nhập của bạn.')}}</div>
                                        <div>
                                            <br>
                                        </div>
                                        <div>{{trans('message.STK')}} :&nbsp;<span class="stk"></span></div>
                                        <div>
                                            <br>
                                        </div>
                                        <div>{{trans('message.CTK')}} : <span class="ctk"></span></div>
                                        <div><span style="font-family: &quot;Times New Roman&quot;; font-size: 14px;">{{trans('message.Tỉ giá')}} : 1$ = 23.000 VND</span>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="kt-portlet">
                        <form class="kt-form kt-form--label-right">
                            <div class="kt-portlet__body text-center">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span>{{trans('message.Deposit')}}</span>
                                        <h5 class="info-fund info-fund-deposit">$ {{$Deposit}}</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <span>{{trans('message.Bonus')}}</span>
                                        <h5 class="info-fund info-fund-bonus">$ {{$Bonus}}</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <span>{{trans('message.Spent')}}</span>
                                        <h5 class="info-fund info-fund-spend">$ {{$Spent}}</h5>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="kt-portlet" style="display: none;">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Info Fund</h3>
                            </div>
                        </div>
                        <form class="kt-form kt-form--label-right">
                            <div class="kt-portlet__body text-center">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span>Current</span>
                                        <h5 class="info-fund info-fund-current kt-font-success"></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <span>Deposit</span>
                                    <h5 class="info-fund info-fund-deposit">$ {{$Deposit}}</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <span>Bonus
											<h5 class="info-fund info-fund-bonus">$ {{$Bonus}}</h5>
										</span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <span>Spent</span>
                                        <h5 class="info-fund info-fund-spend">$ {{$Spent}}</h5>ưe
                                    </div>
                                    <div class="col-md-4">
                                        <span>+/-
											<h5 class="info-fund info-fund-dif"></h5>
										</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title"> {{trans('message.Lịch sử nạp tiền ( 20 giao dịch gần nhất )')}} 
                                </h3>
                            
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped- table-bordered table-hover table-checkable table-history-fund no-footer dataTable dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 709px;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc sorting_disabled text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 5%">STT</th>
                                                    <th class="sorting_disabled text-center kt-font-bold" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Số tiền nạp: activate to sort column ascending" style="width: 25%">{{trans('message.Số tiền nạp')}} </th>
                                                    <th class="sorting_disabled text-center kt-font-bold" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Số tiền nạp: activate to sort column ascending" style="width: 25%">{{trans('message.Số tiền thưởng')}} </th>
                                                    <th class="sorting_disabled text-center kt-font-bold" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Số tiền nạp: activate to sort column ascending" style="width:25%">{{trans('message.Tổng nhận')}}</th>
                                                    
                                                    <th class="sorting_disabled text-center" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Thời gian nạp: activate to sort column ascending" style="width: 20%;">{{trans('message.Thời gian nạp')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($funds as $key => $item)
                                                    <tr role="row" class="odd">
                                                    <td class=" text-center" tabindex="0">{{$key+1}}</td>
                                                        <td class=" text-center kt-font-bold">{{$item->total_input}}</td>
                                                        <td class=" text-center kt-font-bold">{{$item->bonus}}</td>
                                                        <td class=" text-center kt-font-bold">{{$item->total}}</td>
                                                        <td class=" text-center">{{$item->created_at}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5"></div>
                                    <div class="col-sm-12 col-md-7"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
    
@endsection
@section('script')
    <script src="frontend/assets/js/main/funds.js?v=<?php echo rand(); ?>"></script>
@endsection
