@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Цаг бүртгэл</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Нүүр хуудас</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Цаг бүртгэл
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="text-center">Цаг бүртгэлийн огноо</h5>
                    </div>
                    <form action="{{ route('admin.employees.attendance') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="input-group mx-auto" style="width:70%">
                            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            <input type="text" name="date" id="date" class="form-control text-center" >
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-flat btn-primary" type="submit">Хайх</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @include('messages.alerts')
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title text-center">
                            @if ($date)
                            Ажилчдын ирц {{ $date }}
                            @else
                            Өнөөдрийн ажилчдын ирц
                            @endif
                        </div>

                    </div>
                    <div class="card-body">
                        @if ($employees->count())
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Name</th>
                                    <th>Бүртгүүлсэн</th>
                                    <th class="none">Бүртгүүлсэн:</th>
                                    <th>Гарсан</th>
                                    <th class="none">Гарсан:</th>
                                    <th>Салбар</th>
                                    <th>Мэргэжил</th>
                                    <th class="none">Засварлах</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $index => $employee)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $employee->last_name.' '.$employee->first_name }}</td>
                                    @if($employee->attendanceToday)
                                        <td><h6 class="text-center"><span class="badge badge-pill badge-success">бүртгэгдсэн</span></h6></td>
                                        <td>
                                            Цаг:{{ $employee->attendanceToday->created_at->format('H:i:s') }}, Хаанаас:{{ $employee->attendanceToday->entry_location}}, IP хаяг: {{ $employee->attendanceToday->entry_ip}}
                                        </td>
                                        @if ($employee->attendanceToday->exit_ip)
                                            <td><h6 class="text-center"><span class="badge badge-pill badge-success">бүртгэгдсэн</span></h6></td>
                                            <td>
                                                Цаг:{{ $employee->attendanceToday->updated_at->format('H:i:s') }}, Хаанаас:{{ $employee->attendanceToday->exit_location}}, IP хаяг:  {{ $employee->attendanceToday->exit_ip}}
                                            </td>
                                        @else
                                            <td><h6 class="text-center"><span class="badge badge-pill badge-danger">бүртгэгдээгүй</span></h6></td>
                                            <td><h6 class="text-center"><span class="badge badge-pill badge-danger">бүртгэгдээгүй</span></h6></td>
                                        @endif
                                    @else
                                        <td><h6 class="text-center"><span class="badge badge-pill badge-danger">бүртгэгдээгүй</span></h6></td>
                                        <td><h6 class="text-center"><span class="badge badge-pill badge-danger">бүртгэгдээгүй</span></h6></td>
                                        <td><h6 class="text-center"><span class="badge badge-pill badge-danger">бүртгэгдээгүй</span></h6></td>
                                        <td><h6 class="text-center"><span class="badge badge-pill badge-danger">бүртгэгдээгүй</span></h6></td>
                                    @endif
                                    <td>{{ $employee->department }}</td>
                                    <td>{{ $employee->desg }}</td>
                                    <td>
                                        @if($employee->attendanceToday)
                                        <button
                                        class="btn btn-flat btn-danger"
                                        data-toggle="modal"
                                        data-target="#deleteModalCenter{{ $employee->attendanceToday->id }}"
                                        >Устгах</button>
                                        @else
                                        Бичвэр байхгүй байна
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @for ($i = 1; $i < $employees->count()+1; $i++)
                                <!-- Modal -->
                                @if($employees->get($i-1)->attendanceToday)
                                <div class="modal fade" id="deleteModalCenter{{ $employees->get($i-1)->attendanceToday->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle1{{ $employees->get($i-1)->attendanceToday->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="card card-danger">
                                                <div class="card-header">
                                                    <h5 style="text-align: center !important">Устгахыг зөвшөөрч байна уу?</h5>
                                                </div>
                                                <div class="card-body text-center d-flex" style="justify-content: center">

                                                    <button type="button" class="btn flat btn-secondary" data-dismiss="modal">Үгүй</button>

                                                    <form
                                                    action="{{ route('admin.employees.attendance.delete', $employees->get($i-1)->attendanceToday->id) }}"
                                                    method="POST"
                                                    >
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn flat btn-danger ml-1">Тийм</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
                                @endif
                            @endfor
                        @else
                        <div class="alert alert-info text-center" style="width:50%; margin: 0 auto">
                            <h4>Бичвэр байхгүй байна</h4>
                        </div>
                        @endif

                    </div>
                </div>
                <!-- general form elements -->

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
    <!-- /.content -->

@endsection
@section('extra-js')

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive:true,
            autoWidth: false,
        });
        $('#date').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "locale": {
                "format": "DD-MM-YYYY"
            }
        });
    });
</script>
@endsection
