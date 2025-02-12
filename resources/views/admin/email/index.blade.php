@extends('admin.layouts.master')

@section('head-tag')
    <title>ایمیل ها</title>
@endsection

@section('content')
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایمیل ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <section>
                        <a href="{{ route('dashboard.email.new') }}" class="btn btn-info btn-sm">ساخت ایمیل جدید</a>
                    </section>


                    <div class="max-width-16-rem d-flex">
                        <form action="{{ route('dashboard.email.index') }}" method="GET">
                            <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو" name="search" value="{{ request('search') }}">
                        </form>

                    </div>

                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ایمیل</th>
                            <th class="max-width-16-rem text-left"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($emails as $email)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $email->email }}</td>
                                <td>
                                    <form action="{{ route('dashboard.email.delete',$email->id) }}" id="deleteForm" method="POST" style="text-align: left">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('dashboard.email.edit',$email->id) }}" class="btn btn-sm btn-primary"><span><i class="fa fa-edit"></i></span></a>
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
