@extends('layouts.admin_layout')

@section('title', 'Игроки')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование новости</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="post" action="{{ route('post.update', $post['id'])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @csrf
            <div class="row mb-3">
                <div class="col-12">
                    <a href="{{ route('post.index')}}" class="btn btn-secondary">Назад</a>
                    <input type="submit" value="Добавить новость" class="btn btn-success float-right">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Обязательные параметры</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Заголовок</label>
                                <input value="{{ $post['title'] }}" name="title" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Краткое описание</label>
                                <input value="{{ $post['description'] }}" name="description" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="content" id="summernote">{{ $post['content'] }}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection