@extends('layouts.app')
@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Баярын амралт</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('employee.index') }}">Нүүр хуудас</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Баярын амралт
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
                <div class="col-md-6 mx-auto">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Нийт баярын амралтууд</h3>
                        </div>
                        <div class="card-body">
                            @if ($holidays->count())
                            <table class="table table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Нэр</th>
                                        <th>Сар</th>
                                        <th>Эхлэх хугацаа</th>
                                        <th>Дуусах хугацаа</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($holidays as $index => $holiday)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $holiday->name }}</td>
                                        <td>{{ $holiday->start_date->format('F') }}</td>
                                        <td>{{ $holiday->start_date->format('d')}}</td>
                                        @if($holiday->end_date)
                                        <td>{{ $holiday->end_date->format('d') }}</td>
                                        @else
                                        <td>1 өдөр</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="alert alert-info text-center" style="width:50%; margin: 0 auto">
                                <h4>Бичвэр байхгүй байна</h4>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@section('extra-js')

<script>
$(document).ready(function(){
    $('#dataTable').DataTable({
        responsive:true,
        autoWidth: false,
    });
});
</script>
@endsection
