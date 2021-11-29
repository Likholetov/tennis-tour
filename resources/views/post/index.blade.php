@extends('layouts.admin_layout')

@section('title', 'Новости')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Новости</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('post.create')}}" class="btn btn-success float-right">Добавить новость</a>
        </div>
      </div>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
        @endif
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Изображение
                    </th>
                    <th>
                        Название
                    </th>
                    <th>
                        Тэги
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        @if($post['img_url'])
                            <img style="height: 50px; width: 50px; object-fit: cover" src="{{$post['img_url']}}"
                                    alt="Post image">
                        @else
                        Не загружено
                        @endif
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        {{ $post->tags }}
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('post.edit', $post['id']) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <form action="{{ route('post.destroy', $post['id']) }}" method="POST"
                            style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                <i class="fas fa-trash">
                                </i>
                            </button>
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
    <div class="w100 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
  </section>
  <!-- /.content -->
@endsection