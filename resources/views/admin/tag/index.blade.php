@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Тэги</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Тэги</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="row p-3">
            <div class="content">
                <div class="container-fluid">
                    <a href="{{ route('admin.tag.create') }}" type="button" class="btn btn-primary">Добавить</a>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- /.content -->

        <div class="row p-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Список тэгов</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th colspan="2">Название</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td colspan="2">{{ $tag->title }}</td>
                                        <td>
                                            <a href="{{ route('admin.tag.show', $tag->id) }}"> <i class="fa fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.tag.edit', $tag->id) }}"> <i
                                                    class="fa fa-pencil"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.tag.delete', $tag->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent"><i
                                                        class="fa fa-trash text-danger"></i></a></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
