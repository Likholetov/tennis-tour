@extends('layouts.admin_layout')

@section('title', 'Игроки')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование игрока</h1>
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
        <form method="post" action="{{ route('player.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-12">
                    <a href="{{ route('player.index')}}" class="btn btn-secondary">Назад</a>
                    <input type="submit" value="Добавить игрока" class="btn btn-success float-right">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
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
                                <label>Имя</label>
                                <input value="{{ $player['name'] }}" name="name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Фамилия</label>
                                <input value="{{ $player['surname'] }}" name="surname" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Отчество</label>
                                <input value="{{ $player['patronymic'] }}" name="patronymic" type="text" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Опциональные параметры</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Изображение</label>
                                <input style="height: 46px;" value="{{ $player['image'] }}" name="image" type="file"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Пол</label>
                                <select name="gender" id="inputStatus" class="form-control custom-select">
                                    <option @if ($player['gender'] == 'не указан') selected @endif>не указан</option>
                                    <option @if ($player['gender'] == 'мужской') selected @endif>мужской</option>
                                    <option @if ($player['gender'] == 'женский') selected @endif>женский</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Дата рождения</label>
                                <input value="{{ $player['birth'] }}" name="birth" type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Уровень</label>
                                <input value="{{ $player['level'] }}" name="level" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Город</label>
                                <input value="{{ $player['city'] }}" name="city" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Регион</label>
                                <input value="{{ $player['region'] }}" name="region" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Год, с которого играет в теннис</label>
                                <input value="{{ $player['start_playing_year'] }}" name="start_playing_year" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Год, с которого участвует в турнирах</label>
                                <input value="{{ $player['start_tournament_year'] }}" name="start_tournament_year" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Месяц, с которого участвует в турнирах</label>
                                <select name="start_tournament_month" class="form-control custom-select">
                                    <option @if ($player['start_tournament_month'] == 'Январь') selected @endif>Январь</option>
                                    <option @if ($player['start_tournament_month'] == 'Февраль') selected @endif>Февраль</option>
                                    <option @if ($player['start_tournament_month'] == 'Март') selected @endif>Март</option>
                                    <option @if ($player['start_tournament_month'] == 'Апрель') selected @endif>Апрель</option>
                                    <option @if ($player['start_tournament_month'] == 'Май') selected @endif>Май</option>
                                    <option @if ($player['start_tournament_month'] == 'Июнь') selected @endif>Июнь</option>
                                    <option @if ($player['start_tournament_month'] == 'Июль') selected @endif>Июль</option>
                                    <option @if ($player['start_tournament_month'] == 'Август') selected @endif>Август</option>
                                    <option @if ($player['start_tournament_month'] == 'Сентябрь') selected @endif>Сентябрь</option>
                                    <option @if ($player['start_tournament_month'] == 'Октябрь') selected @endif>Октябрь</option>
                                    <option @if ($player['start_tournament_month'] == 'Ноябрь') selected @endif>Ноябрь</option>
                                    <option @if ($player['start_tournament_month'] == 'Декабрь') selected @endif>Декабрь</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Марка ракетки</label>
                                <input value="{{ $player['racket_firm'] }}" name="racket_firm" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Модель ракетки</label>
                                <input value="{{ $player['racket_model'] }}" name="racket_model" type="text" class="form-control">
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
