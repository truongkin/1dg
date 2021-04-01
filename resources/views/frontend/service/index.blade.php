@extends('frontend.layouts.index')
@section('title',trans('message.Dịch vụ'))
@section('content')
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <div class="kt-container  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__body">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                            <label>{{trans('message.Tìm kiếm')}}
                                                <input type="search" class="form-control form-control-sm seach_service" placeholder="" aria-controls="DataTables_Table_0">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered table-hover table-checkable table-services dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1268px;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_disabled text-center" rowspan="1" colspan="1" style="width: 37.5px;">ID</th>
                                                <th class="sorting_disabled text-center" rowspan="1" colspan="1" style="width: 613.5px;">{{trans('message.Tên dịch vụ')}}</th>
                                                    <th class="sorting_disabled text-center" rowspan="1" colspan="1" style="width: 113.5px;">{{trans('message.Giá cho 1000')}}</th>
                                                    <th class="sorting_disabled text-center" rowspan="1" colspan="1" style="width: 149.5px;">{{trans('message.Số lượng tối thiểu')}}</th>
                                                    <th class="sorting_disabled text-center" rowspan="1" colspan="1" style="width: 131.5px;">{{trans('message.Số lượng tối đa')}}</th>
                                                    <th class="sorting_disabled text-center" rowspan="1" colspan="1" style="width: 100.5px;">{{trans('message.Chi tiết')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data-services">
                                                {{-- @foreach($category as $row)
                                                    <tr class="dtrg-group dtrg-start dtrg-level-0">
                                                        <td colspan="6">{{$row->name}}</td>
                                                    </tr>
                                                    @foreach($row->services as $row_sercond)
                                                        <tr role="row" class="odd">
                                                            <td class=" text-center" tabindex="0">{{$row_sercond->id}}</td>
                                                            <td>{{$row_sercond->name}}</td>
                                                            <td class=" text-center">{{$row_sercond->price_service}}</td>
                                                            <td class=" text-center">{{$row_sercond->min}}</td>
                                                            <td class=" text-center">{{$row_sercond->max}}</td>
                                                            <td class=" text-center">
                                                                <div class="d-none">
                                                                    <?php echo $row_sercond->note ?>
                                                                </div>
                                                                <button type="button" class="btn btn-bold btn-label-brand btn-sm btn-details" data-id="{{$row_sercond->id}}">{{trans('message.Chi tiết btn')}}</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">{{trans('message.Tất cả')}} <span class="total-service">{{$total_service}}</span> @if($total_service > 0) {{trans('message.Dịch vụ nhiều')}} @else @endif</div>
                                    </div>
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
<div class="modal fade" id="modal-description" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-scroll" data-scroll="true" data-height="400"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')

@endsection
@section('script')
<script src="frontend/assets/js/main/services.js?v=<?php echo rand(); ?>"></script>

<script>
    
</script>
@endsection
