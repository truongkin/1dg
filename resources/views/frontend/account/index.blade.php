@extends('frontend.layouts.index')
@section('title', 'Tài khoản')
@section('content')
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <div class="kt-container kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="kt-portlet">
                        <div class="kt-portlet__body">
                            <form class="kt-form" method="post" action="{{route('account.changePassword')}}">
                                @csrf
                                @if(session('error') ||  session('success'))
                                    <div class="alert {{session('error') ? 'alert-danger' : 'alert-success'}}" role="alert">
                                        {{session('error') ? session('error') : session('success') }}
                                    </div>
                                @endif
                                {{-- @if(session('success') )
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                </div>
                                @endif --}}
                                @if (isset($errors) && count($errors) > 0)
                                    <div class="alert alert-solid-danger kt-font-bold alert-error">
                                        <ul>
                                            @foreach ($errors->all() as $error) 
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <p>ID: <span class="kt-font-bold">{{Auth::user()->id }}</span>
                                    </p>
                                    <p>Username: <span class="kt-font-bold">{{Auth::user()->name }}</span>
                                    </p>
                                    <p>Email: <span class="kt-font-bold">{{Auth::user()->email }}</span>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('message.Mật khẩu cũ')}}</label>
                                    <input type="password" class="form-control ipt-current-pass" value="{{ old('old_password') }}"  name="old_password" required>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('message.Mật khẩu mới')}}</label>
                                    <input type="password" class="form-control ipt-new-pass" value="{{ old('password') }}"  name="password" required>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('message.Xác nhận mật khẩu')}}</label>
                                    <input type="password" class="form-control ipt-cnew-pass" value="{{ old('password_confirmation') }}"  name="password_confirmation" required>
                                </div>
                                <button type="submit" class="btn btn-brand btn-change-pass">{{trans('message.Xác nhận')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="kt-portlet">
                        <div class="kt-portlet__body">
                            <form class="kt-form">
                                <div class="form-group">
                                    <label>Timezone</label>
                                    <select class="form-control sl-timezone">
                                        <option value="-43200">(UTC -12:00) Baker/Howland Island</option>
                                        <option value="-39600">(UTC -11:00) Niue</option>
                                        <option value="-36000">(UTC -10:00) Hawaii-Aleutian Standard Time, Cook Islands, Tahiti</option>
                                        <option value="-34200">(UTC -9:30) Marquesas Islands</option>
                                        <option value="-32400">(UTC -9:00) Alaska Standard Time, Gambier Islands</option>
                                        <option value="-28800">(UTC -8:00) Pacific Standard Time, Clipperton Island</option>
                                        <option value="-25200">(UTC -7:00) Mountain Standard Time</option>
                                        <option value="-21600">(UTC -6:00) Central Standard Time</option>
                                        <option value="-18000">(UTC -5:00) Eastern Standard Time, Western Caribbean Standard Time</option>
                                        <option value="-16200">(UTC -4:30) Venezuelan Standard Time</option>
                                        <option value="-14400">(UTC -4:00) Atlantic Standard Time, Eastern Caribbean Standard Time</option>
                                        <option value="-12600">(UTC -3:30) Newfoundland Standard Time</option>
                                        <option value="-10800">(UTC -3:00) Argentina, Brazil, French Guiana, Uruguay</option>
                                        <option value="-7200">(UTC -2:00) South Georgia/South Sandwich Islands</option>
                                        <option value="-3600">(UTC -1:00) Azores, Cape Verde Islands</option>
                                        <option value="0">(UTC) Greenwich Mean Time, Western European Time</option>
                                        <option value="3600">(UTC +1:00) Central European Time, West Africa Time</option>
                                        <option value="7200">(UTC +2:00) Central Africa Time, Eastern European Time, Kaliningrad Time</option>
                                        <option value="10800">(UTC +3:00) Moscow Time, East Africa Time, Arabia Standard Time</option>
                                        <option value="12600">(UTC +3:30) Iran Standard Time</option>
                                        <option value="14400">(UTC +4:00) Azerbaijan Standard Time, Samara Time</option>
                                        <option value="16200">(UTC +4:30) Afghanistan</option>
                                        <option value="18000">(UTC +5:00) Pakistan Standard Time, Yekaterinburg Time</option>
                                        <option value="19800">(UTC +5:30) Indian Standard Time, Sri Lanka Time</option>
                                        <option value="20700">(UTC +5:45) Nepal Time</option>
                                        <option value="21600">(UTC +6:00) Bangladesh Standard Time, Bhutan Time, Omsk Time</option>
                                        <option value="23400">(UTC +6:30) Cocos Islands, Myanmar</option>
                                        <option value="25200">(UTC +7:00) Krasnoyarsk Time, Cambodia, Laos, Thailand, Vietnam</option>
                                        <option value="28800">(UTC +8:00) Australian Western Standard Time, Beijing Time, Irkutsk Time</option>
                                        <option value="31500">(UTC +8:45) Australian Central Western Standard Time</option>
                                        <option value="32400">(UTC +9:00) Japan Standard Time, Korea Standard Time, Yakutsk Time</option>
                                        <option value="34200">(UTC +9:30) Australian Central Standard Time</option>
                                        <option value="36000">(UTC +10:00) Australian Eastern Standard Time, Vladivostok Time</option>
                                        <option value="37800">(UTC +10:30) Lord Howe Island</option>
                                        <option value="39600">(UTC +11:00) Srednekolymsk Time, Solomon Islands, Vanuatu</option>
                                        <option value="41400">(UTC +11:30) Norfolk Island</option>
                                        <option value="43200">(UTC +12:00) Fiji, Gilbert Islands, Kamchatka Time, New Zealand Standard Time</option>
                                        <option value="45900">(UTC +12:45) Chatham Islands Standard Time</option>
                                        <option value="46800">(UTC +13:00) Samoa Time Zone, Phoenix Islands Time, Tonga</option>
                                        <option value="50400">(UTC +14:00) Line Islands</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-brand btn-change-timezone">Save</button>
                            </form>
                        </div>
                    </div>
                    <div class="kt-portlet">
                        <div class="kt-portlet__body">
                            <form class="kt-form">
                                <div class="form-group">
                                    <label>API Key</label>
                                    <input type="text" class="form-control ipt-key" value="564b23e73d79179ad34292c1f9f10845" disabled="true">
                                </div>
                                <button type="button" class="btn btn-brand btn-change-key">New key</button>
                            </form>
                        </div>
                    </div>
                </div> --}}
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
