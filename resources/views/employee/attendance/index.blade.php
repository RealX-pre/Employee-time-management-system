@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Цаг бүртгэлийн жагсаалт</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('employee.index') }}">Нүүр хуудас</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Цаг бүртгэлийн жагсаалт
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
                <div class="col-md-3 mx-auto">
                    <div class="card">
                        <div class="card-header">
                                <h5 class="text-center text-primary" style="text-align: center !important">Огнооны хязгаарыг ашиглан ирцийг хайх</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 mx-auto text-center">
                                    <form action="{{ route('employee.attendance.index') }}" method="POST">
                                        @csrf
                                        <fieldset>
                                            <div class="form-group">
                                                <label for="">Огнооны хязгаар</label>
                                                <input type="text" name="date_range" placeholder="Огноо:" class="form-control text-center"
                                                id="date_range"
                                                >
                                                @error('date_range')
                                                <div class="ml-2 text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </fieldset>

                                            <input type="submit" name="" class="btn btn-primary" value="Хайх">
                                        </div>

                                    </form>
                                </div>
                            </div>
                            {{-- <div class="container">
                                <form action="{{ route('employee.attendance.index') }}" class="row" method="POST">
                                    @csrf
                                    <div class="col-sm-9 mb-2">

                                        <div class="input-group">
                                            <input type="text" name="date_range" placeholder="Эхлэх огноо" class="form-control"
                                            id="date_range"
                                            >
                                        </div>
                                        @error('date_range')
                                        <div class="ml-2 text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 mb-2">
                                        <div class="input-group">
                                            <input type="submit" name="" class="btn btn-primary" value="Хайх">
                                        </div>
                                    </div>

                                </form>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg mx-auto">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title text-center">
                                Цаг бүртгэлийн жагсаалт

                            </div>

                        </div>
                        <div class="card-body">
                            @if ($attendances->count())
                            <table class="table table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Огноо</th>
                                        <th>Статус</th>
                                        <th>Бүртгүүлсэн цаг</th>
                                        <th>Бүртгүүлсэн байршил</th>
                                        <th>Гарсан цаг</th>
                                        <th>Гарсан байршил</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($attendances as $index => $attendance)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        @if ($attendance->registered == 'yes')
                                        <td>{{ $attendance->created_at->format('d-m-Y') }}</td>
                                        <td><h5 class="text-center"><span class="badge badge-pill badge-success">Бүтэн цаг</span> </h5></td>
                                        <td>{{ $attendance->created_at->format('H:i:s') }}</td>
                                        <td>{{ $attendance->entry_location }}</td>
                                        <td>{{ $attendance->updated_at->format('H:i:s') }}</td>
                                        <td>{{ $attendance->exit_location }}</td>
                                        @elseif($attendance->registered == 'no')
                                        <td>{{ $attendance->created_at->format('d-m-Y') }}</td>
                                        <td><h5 class="text-center"><span class="badge badge-pill badge-danger">Байхгүй</span> </h5></td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        @elseif($attendance->registered == 'sun')
                                        <td>{{ $attendance->created_at->format('d-m-Y') }}</td>
                                        <td><h5 class="text-center"><span class="badge badge-pill badge-info">Бүтэнсайн өдөр</span> </h5></td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        @elseif($attendance->registered == 'leave')
                                        <td>{{ $attendance->created_at->format('d-m-Y') }}</td>
                                        <td><h5 class="text-center"><span class="badge badge-pill badge-info">Чөлөөний хүсэлт</span> </h5></td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        @elseif($attendance->registered == 'holiday')
                                        <td>{{ $attendance->created_at->format('d-m-Y') }}</td>
                                        <td><h5 class="text-center"><span class="badge badge-pill badge-success">Амралтын өдөр</span> </h5></td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        <td class="text-center">Бичвэр байхгүй</td>
                                        @else
                                        <td>{{ $attendance->created_at->format('d-m-Y') }}</td>
                                        <td><h5 class="text-center"><span class="badge badge-pill badge-warning">Хагас цаг</span> </h5></td>
                                        <td>{{ $attendance->created_at->format('H:i:s') }}</td>
                                        <td>{{ $attendance->entry_location }}</td>
                                        <td>Бүртгүүлсэн цаг байхгүй</td>
                                        <td>Бүртгүүлсэн байршил байхгүй</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="alert alert-info text-center" style="width:50%; margin: 0 auto">
                                <h4>Бичвэр байхгүй байна.</h4>
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
        $('#date_range').daterangepicker({
            "maxDate": new Date(),
            "locale": {
                "format": "DD-MM-YYYY",
            }
        })
    });
</script>
@endsection
