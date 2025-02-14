@extends('admin.layouts.master')

@section('head-tag')
    <title>اطلاع رسانی ها</title>
@endsection

@section('content')
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        اطلاع رسانی ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <section>
                        <a href="{{ route('dashboard.notification.new') }}" class="btn btn-info btn-sm">ساخت ایمیل جدید</a>
                    </section>


                    <div class="max-width-16-rem d-flex">
                        <form action="{{ route('dashboard.notification.index') }}" method="GET">
                            <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو" name="search" value="{{ request('search') }}">
                        </form>

                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th>وضعیت</th>
                            <th>تاریخ ارسال</th>
                            <th class="max-width-16-rem text-left"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($notifications as $notification)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $notification->title }}</td>
                                <td>
                                    @switch($notification->status)
                                        @case(0)
                                        ارسال نشده
                                        @break
                                        @case(1)
                                            درحال ارسال
                                        @break
                                        @case(2)
                                        ارسال شده
                                        @break
                                    @endswitch
                                </td>
                                <td>{{ pDate($notification->published_at) }}</td>
                                <td>
                                    <form action="{{ route('dashboard.notification.delete',$notification->id) }}" id="deleteForm" method="POST" style="text-align: left">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('dashboard.notification.edit',$notification->id) }}" class="btn btn-sm btn-primary"><span><i class="fa fa-edit"></i></span></a>
                                        <button class="btn btn-sm btn-danger delete"><span><i class="fa fa-trash-alt"></i></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>


                <section style="overflow: auto">
{{--                    {{ $permissions->links('pagination::bootstrap-4') }}--}}
                </section>




            </section>
        </section>
    </section>

@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
