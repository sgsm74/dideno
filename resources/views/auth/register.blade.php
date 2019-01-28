@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:100px;margin-bottom: 100px">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="card ">
                <div class="card-header bg-info text-white">فرم عضویت</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="firstName" class="col-md-2 col-form-label text-md-right">نام </label>

                            <div class="col-md-4">
                                <input id="firstName" type="text" class="form-control" name="firstName" value="{{ old('firstName') }}" required autofocus>
                            </div>
                            <label for="lastName" class="col-md-2 col-form-label text-md-right">نام خانوادگی </label>

                            <div class="col-md-4">
                                <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">پست الکترونیکی</label>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                            <label for="phoneNumber" class="col-md-2 col-form-label text-md-right">شماره تلفن </label>

                            <div class="col-md-4">
                                <input id="phoneNumber" type="text" class="form-control" name="phoneNumber" value="{{ old('phoneNumber') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="SN" class="col-md-2 col-form-label text-md-right">شماره ملی</label>

                            <div class="col-md-4">
                                <input id="SN" type="text" class="form-control" name="SN" value="{{ old('SN') }}" required>
                            </div>
                            <label for="grade" class="col-md-2 col-form-label text-md-right">مقطع تحصیلی</label>

                            <div class="col-md-4">
                                <select name="grade" id="grade" class="form-control">
                                    <option value="none">دیپلم به پایین</option>
                                    <option value="diploma">دیپلم</option>
                                    <option value="associate">کاردانی</option>
                                    <option value="bachelor">کارشناسی</option>
                                    <option value="master">کارشناسی ارشد</option>
                                    <option value="doctoral">دکترا</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="major" class="col-md-2 col-form-label text-md-right">رشته</label>

                            <div class="col-md-4">
                                <input id="major" type="text" class="form-control" name="major" value="{{ old('major') }}" required>
                            </div>
                            <label for="university" class="col-md-2 col-form-label text-md-right">دانشگاه</label>

                            <div class="col-md-4">
                                <input id="university" type="text" class="form-control" name="university" value="{{ old('university') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">گذرواژه</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">تکرار گذرواژه</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    عضویت
                                </button>
                            </div>
                        </div>
                        @include('layouts.error')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
