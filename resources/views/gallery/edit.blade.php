@extends('layouts.admin_layout')

@section('title', 'Галереи')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование галереи</h1>
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
        <form method="post" action="{{ route('gallery.update', $gallery['id'])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-12">
                    <a href="{{ route('gallery.index')}}" class="btn btn-secondary">Назад</a>
                    <input type="submit" value="Сохранить галерею" class="btn btn-success float-right">
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
                                <input value="{{ $gallery['title'] }}" name="title" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Изображения</label>
                                <input multiple style="height: 46px;"  name="images[]" type="file"
                                       class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-12">
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
                                      Порядок
                                  </th>
                                  <th>
                                        Комментарий
                                    </th>
                                  <th>
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($gallery->images as $image)
                              <tr>
                                  <td>
                                      {{ $loop->iteration }}
                                  </td>
                                  <td>
                                    <img style="height: 50px; width: 50px; object-fit: cover" src="{{$image['img_url']}}"
                                        alt="Image">
                                  </td>
                                  <td>
                                    {{ $image->order }}
                                </td>
                                  <td>
                                      {{ $image->title }}
                                  </td>
                                  <td class="project-actions text-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-{{ $loop->iteration }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </button>
                                      <form action="{{ route('image.destroy', $image['id']) }}" method="POST"
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
            </div>
        </div>

        @foreach ($gallery->images as $image)
        <div class="modal fade" id="modal-{{ $loop->iteration }}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Изображение</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form method="post" action="{{ route('image.update', $image['id'])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label>Заголовок</label>
                            <input value="{{ $image['title'] }}" name="title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Порядок</label>
                            <input value="{{ $image['order'] }}" name="order" type="text" class="form-control">
                        </div>
                        <input hidden value="{{ $image['img_url'] }}" name="img_url" type="text" class="form-control">
                    
                </div>
                <div class="modal-footer justify-content-center">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                  <button class="btn btn-primary">Сохранить</button>
                </div>
            </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        @endforeach
    </section>
    <!-- /.content -->
@endsection