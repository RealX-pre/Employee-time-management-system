@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Зарлагын хүсэлт</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">Нүүр хуудас</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Зарлагын хүсэлт
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
                <div class="col-lg-8 col-md-10 mx-auto">
                    <!-- general form elements -->
                    @include('messages.alerts')
                    @error('status')
                        <div class="alert alert-danger">
                            Хүчинтэй статусын сонголтыг сонгоно уу
                        </div>
                    @enderror
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Нийт зарлагын хүсэлт</h3>
                        </div>
                        <div class="card-body">
                            @if ($expenses->count())
                            <table class="table table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Огноо</th>
                                        <th>Овог нэр</th>
                                        <th>Салбар</th>
                                        <th>Мэргэжил</th>
                                        <th>Шалтгаан</th>
                                        <th>Статус</th>
                                        <th class="none">Шалтгаан</th>
                                        <td class="none">Засварлах</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expenses as $index => $expense)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $expense->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $expense->employee->last_name.' '.$expense->employee->first_name }}</td>
                                        <td>{{ $expense->employee->department }}</td>
                                        <td>{{ $expense->employee->desg }}</td>
                                        <td>{{ $expense->reason }}</td>
                                        <td>
                                            <h5>
                                                <span
                                                @if ($expense->status == 'pending')
                                                    class="badge badge-pill badge-warning"
                                                @elseif($expense->status == 'declined')
                                                    class="badge badge-pill badge-danger"
                                                @elseif($expense->status == 'approved')
                                                    class="badge badge-pill badge-success"
                                                @endif
                                                >
                                                    {{ ucfirst($expense->status) }}
                                                </span>
                                            </h5>
                                        </td>
                                        <td>{{ $expense->description }}</td>
                                        <td>
                                            <button
                                            class="btn btn-flat btn-info"
                                            data-toggle="modal"
                                            data-target="#deleteModalCenter{{ $index + 1 }}"
                                            >
                                            Статус өөрчлөх
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @for ($i = 1; $i < $expenses->count()+1; $i++)
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModalCenter{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle1{{ $i }}" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="card card-info">
                                                <div class="card-header">
                                                    <h5 style="text-align: center !important">Статус өөрчлөх</h5>
                                                </div>
                                                <form
                                                    action="{{ route('admin.expenses.update', $expenses->get($i-1)->id) }}"
                                                    method="POST"
                                                >
                                                <div class="card-body">
                                                    @csrf
                                                    @method('PUT')
                                                        <div class="form-group text-center">
                                                            <label for="">Статусыг сонгоно уу</label>
                                                            <select name="status" class="form-control text-center mx-auto" style="width:50%">
                                                                <сонголтыг далд идэвхгүй болгосон> ---- </option>
                                                                <option value="pending">Хүлээгдэж буй</option>
                                                                <option value="approved">Зөвшөөрсөн</option>
                                                                <option value="declined">Цуцалсан</option>
                                                            </select>
                                                        </div>

                                                </div>
                                                <div class="card-footer text-center">
                                                    <button type="submit" class="btn flat btn-info">Хадгалах</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
                            @endfor
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
    $('[data-toggle="popover"]').popover();
    $('.popover-dismiss').popover({
        trigger: 'focus'
    });
    $('#dataTable').DataTable({
        responsive:true,
        autoWidth: false,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 },
            { responsivePriority: 200000000000, targets: -1 }
        ]
    });
    $('[data-toggle="tooltip"]').tooltip({
        trigger: 'hover'
    });
});
</script>
@endsection
