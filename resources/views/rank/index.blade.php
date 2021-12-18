@extends('layouts.admin_layout')

@section('title', 'Разряды')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Разряды</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('rank.create')}}" class="btn btn-success float-right">Добавить разряд</a>
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
                        Название
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ranks as $rank)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $rank->title }}
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('rank.edit', $rank['id']) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <form action="{{ route('rank.destroy', $rank['id']) }}" method="POST"
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
  </section>
  <!-- /.content -->
@endsection