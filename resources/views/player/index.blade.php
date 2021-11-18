@extends('layouts.admin_layout')

@section('title', 'Игроки')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Игроки</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('player.create')}}" class="btn btn-success float-right">Добавить игрока</a>
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
                        ФОТО
                    </th>
                    <th>
                        Фамилия
                    </th>
                    <th>
                        Имя
                    </th>
                    <th>
                        Отчество
                    </th>
                    <th>
                        Уровень
                    </th>
                    <th>
                        Город
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        @if($player['img_url'])
                            <img style="height: 50px; width: 50px; object-fit: cover" src="{{$player['img_url']}}"
                                    alt="Player image">
                        @else
                        Не загружено
                        @endif
                    </td>
                    <td>
                        {{ $player->surname }}
                    </td>
                    <td>
                        {{ $player->name }}
                    </td>
                    <td>
                        {{ $player->patronymic }}
                    </td>
                    <td>
                        {{ $player->level }}
                    </td>
                    <td>
                        {{ $player->city }}
                    </td>
                    <td class="project-actions text-right">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-{{ $loop->iteration }}">
                            <i class="fas fa-eye">
                            </i>
                        </button>
                        <a class="btn btn-primary btn-sm" href="{{ route('player.edit', $player['id']) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <form action="{{ route('player.destroy', $player['id']) }}" method="POST"
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
                <div class="modal fade" id="modal-{{ $loop->iteration }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">{{ $player->name }}</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p><strong>Имя: </strong>{{ $player->name }}</p>
                          <p><strong>Фамилия: </strong>{{ $player->surname }}</p>
                          <p><strong>Отчество: </strong>{{ $player->patronymic }}</p>
                          <p><strong>Уровень: </strong>{{($player->level) }}</p>
                          <p><strong>Дата рождения: </strong>{{ $player->birth ?? 'не указана' }}</p>
                          <p><strong>Пол: </strong>{{($player->gender) }}</p>
                          <p><strong>Город: </strong>{{($player->city) ?? 'не указан' }}</p>
                          <p><strong>Регион: </strong>{{($player->region) ?? 'не указан' }}</p>
                          <p><strong>Год начала игры: </strong>{{($player->start_playing_year) ?? 'не указан' }}</p>
                          <p><strong>Год начала участия в турнирах: </strong>{{($player->start_tournament_year) ?? 'не указан' }}</p>
                          <p><strong>Месяц начала участия в турнирах: </strong>{{($player->start_tournament_month) ?? 'не указан' }}</p>
                          <p><strong>Марка ракетки: </strong>{{($player->racket_firm) ?? 'не указана' }}</p>
                          <p><strong>Модель ракетки: </strong>{{($player->racket_model) ?? 'не указана' }}</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="w100 d-flex justify-content-center">
        {{ $players->links() }}
    </div>
  </section>
  <!-- /.content -->
@endsection

