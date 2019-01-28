@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:100px;margin-bottom: 100px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">بازنشانی گذرواژه</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">پست الکترونیکی</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    ارسال لینک بازنشانی گذرواژه
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
