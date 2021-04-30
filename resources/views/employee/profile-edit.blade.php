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
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="text-center mt-2">Миний хувийн мэдээлэл</h5>
                    </div>
                    <form action="{{ route('employee.profile-update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="card-body">

                            <fieldset>
                                <div class="form-group">
                                    <label for="">Нэр</label>
                                    <input type="text" name="first_name" value="{{ $employee->first_name }}" class="form-control">
                                    @error('first_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Овог</label>
                                    <input type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control">
                                    @error('last_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dob">Төрсөн огноо</label>
                                    <input type="text" name="dob" id="dob" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Хүйс</label>
                                    <select name="gender" class="form-control">
                                        @if ($employee->sex == 'Male')
                                            <option value="Male" selected>Эрэгтэй</option>
                                            <option value="Female">Эмэгтэй</option>
                                        @else
                                            <option value="Male">Эрэгтэй</option>
                                            <option value="Female" selected>Эмэгтэй</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="join_date">Бүртгүүлсэн огноо</label>
                                    <input type="text" name="join_date" id="join_date" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Мэргэжил</label>
                                        <select name="desg" class="form-control">
                                            @foreach ($desgs as $desg)
                                                <option value="{{ $desg }}"
                                                @if ($desg == $employee->desg)
                                                    selected
                                                @endif
                                                >
                                                    {{ $desg }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Салбар</label>
                                        <select name="department_id" class="form-control">
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                @if ($department->id == $employee->department_id)
                                                    selected
                                                @endif
                                                >
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </fieldset>


                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-flat btn-primary" style="width: 40%; font-size:1.3rem">Хадгалах</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection

@section('extra-js')
<script>
    $().ready(function() {
        dob = new Date('{{ $employee->dob }}');
        joinDate = new Date('{{ $employee->join_date }}');
        $('#dob').daterangepicker({
            "singleDatePicker": true,
            "startDate": dob,
            "locale": {
                "format": "DD-MM-YYYY"
            }
        });
        $('#join_date').daterangepicker({
            "singleDatePicker": true,
            "startDate": joinDate,
            "locale": {
                "format": "DD-MM-YYYY"
            }
        });
    });
</script>
@endsection
