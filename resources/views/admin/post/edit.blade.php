@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Редактировать пост</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Добавить пост</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group pl-3 pt-3 mb-0">
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Название</label>
                            <input type="text" name="title" class="form-control" placeholder="Введите название"
                                value="{{ $post->title }}">
                        </div>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputFile">Контент</label>
                            <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                        </div>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Добавить превью</label>
                            <div class="w-25">
                                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image"
                                    class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="exampleInputFile" class="custom-file-input"
                                        name="preview_image">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                </div>
                            </div>
                        </div>
                        @error('preview_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Добавить изображение</label>
                            <div class="w-25">
                                <img src="{{ asset('storage/' . $post->main_image) }}" alt="main_image" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="exampleInputFile" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                </div>
                            </div>
                        </div>
                        @error('main_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <!-- select -->
                        <div class="form-group w-25">
                            <label>Тэги</label>
                            <select class="select2" name="tag_ids[]" multiple data-placeholder="Выберите теги"
                                style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $tag->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tag_ids')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group w-25">
                            <label>Категория</label>
                            <select class="form-control" name="category_id">
                                <option disabled selected>Выберите категорию</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </div>
                </form>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
