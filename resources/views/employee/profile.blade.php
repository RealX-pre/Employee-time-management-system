@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Хувийн мэдээлэл</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('employee.index') }}">Нүүр хуудас</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Хувийн мэдээлэл
                    </li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="text-center mt-2">Миний хувийн мэдээлэл</h5>
                    </div>
                    <div class="card-body">
                        @include('messages.alerts')
                        <div class="row mb-3">
                            <div class="col text-center mx-auto">
                                  <img
                                                    src="/img/user.png"
                                                    class="img-circle elevation-2"
                                                    alt="User Image3"
                                                    style="width:50px;height:50px"
                                                />

                            </div>
                        </div>
                        <table class="table profile-table table-hover">
                            <tr>
                                <td>Нэр</td>
                                <td>{{ $employee->first_name }}</td>
                            </tr>
                            <tr>
                                <td>Овог</td>
                                <td>{{ $employee->last_name }}</td>
                            </tr>
                            <tr>
                                <td>Төрсөн огноо</td>
                                <td>{{ $employee->dob->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td>Хүйс</td>
                                <td>{{ $employee->sex }}</td>
                            </tr>

                            <tr>
                                <td>Бүртгүүлсэн огноо</td>
                                <td>{{ $employee->join_date->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td>Мэргэжил</td>
                                <td>{{ $employee->desg }}</td>
                            </tr>
                            <tr>
                                <td>Салбар</td>
                                <td>{{ $employee->department->name }}</td>
                            </tr>
                            <tr>
                                <td>Цалин</td>
                                <td>{{ $employee->salary }}₮</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('employee.profile-edit', $employee->id) }}" class="btn btn-flat btn-primary">Мэдээллээ засварлах</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection
