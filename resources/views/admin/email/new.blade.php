@extends('admin.layouts.master')

@section('head-tag')
    <title>ساخت ایمیل جدید</title>
@endsection

@section('content')
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ساخت ایمیل جدید
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('dashboard.email.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>

                    <form action="{{ route('dashboard.email.store') }}" method="POST">
                        @csrf

                        <section class="col-12">
                            <div class="form-check">
                                <label for="email">ایمیل</label>
                                <input type="text" name="email" id="email" class="form-control form-control-sm" value="{{ old('email') }}" />
                            </div>
                            <div class="mt-2">
                                @error('email')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </div>
                        </section>

                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                </section>
                </form>
            </section>

        </section>
    </section>
    </section>
@endsection
