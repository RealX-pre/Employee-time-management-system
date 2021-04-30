@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Нүүр хуудас</h1>
            </div>
            <!-- /.col -->

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
      <row class="">
        <div class="col-md-8 mx-auto">
          <div class="jumbotron">
            <h1 class="display-4 text-primary">Ажилчдын цаг бүртгэлийн системд тавтай морилно уу</h1>
            <p class="lead">Энэ бол статистик, дүрслэл, бусад янз бүрийн хүснэгттэй ажиллахад хэрэглэгддэг менежментийн програм юм</p>
            <hr class="my-4">
            <p>Сайн байна уу,

                            @if ($employee->sex == 'Male')
                            Эрхэм . {{ $employee->last_name.' '.$employee->first_name }}
                            @else
                            Эрхэмсэг . {{ $employee->last_name.' '.$employee->first_name }}
                            @endif
            </p>
          </div>
        </div>
      </row>
    </div>
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection


