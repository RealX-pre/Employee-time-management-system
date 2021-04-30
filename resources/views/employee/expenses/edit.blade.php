@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Хүсэлтийг засварлах</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('employee.index') }}">Нүүр хуудас</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Хүсэлтийг засварлах
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
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Хүсэлтийг засварлах
                            </h3>
                        </div>
                        @include('messages.alerts')
                        <form
                        action="{{ route('employee.expenses.update', $expense->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                        >
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Шалтгаан</label>
                                    <input type="text" name="reason" value="{{ $expense->reason }}" class="form-control">
                                    @error('reason')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Тайлбар</label>
                                    <textarea name="description" class="form-control">{{ $expense->description }}</textarea>
                                    @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Нийт хэмжээ (төг)</label>
                                    <input type="text" name="amount" value="{{ $expense->amount }}" class="form-control">
                                    @error('amount')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Хуулгын зургийг дахин байршуулна уу</label>
                                    <select name="new_image" class="form-control" id="" onchange="showInput()">
                                        <option value="no" selected>Үгүй</option>
                                        <option value="yes">Тийм</option>
                                    </select>
                                </div>
                                <div class="form-group hide-input" id="file">
                                    <label for="">Зураг оруулах</label>
                                    <input type="file" name="receipt" class="form-control-file">
                                    @error('receipt')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Хадгалах</button>
                            </div>
                        </form>
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
    function showInput() {
        $('#file').toggleClass('hide-input')
    }
</script>
@endsection
