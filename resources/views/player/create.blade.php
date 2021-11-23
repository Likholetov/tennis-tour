@extends('layouts.admin_layout')

@section('title', 'Игроки')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавление игрока</h1>
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
                                <input value="{{ old('name') }}" name="name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Фамилия</label>
                                <input value="{{ old('surname') }}" name="surname" type="text" class="form-control">
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
                                <input style="height: 46px;" value="{{ old('image') }}" name="image" type="file"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Отчество</label>
                                <input value="{{ old('patronymic') }}" name="patronymic" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Пол</label>
                                <select name="gender" id="inputStatus" class="form-control custom-select">
                                    <option selected>не указан</option>
                                    <option>мужской</option>
                                    <option>женский</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Дата рождения</label>
                                <input value="{{ old('birth') }}" name="birth" type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Уровень</label>
                                <input value="{{ old('level') }}" name="level" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Город</label>
                                <input value="{{ old('city') }}" name="city" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Регион</label>
                                <input value="{{ old('region') }}" name="region" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Год, с которого играет в теннис</label>
                                <input value="{{ old('start_playing_year') }}" name="start_playing_year" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Год, с которого участвует в турнирах</label>
                                <input value="{{ old('start_tournament_year') }}" name="start_tournament_year" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Месяц, с которого участвует в турнирах</label>
                                <select name="start_tournament_month" class="form-control custom-select">
                                    <option selected>Январь</option>
                                    <option>Февраль</option>
                                    <option>Март</option>
                                    <option>Апрель</option>
                                    <option>Май</option>
                                    <option>Июнь</option>
                                    <option>Июль</option>
                                    <option>Август</option>
                                    <option>Сентябрь</option>
                                    <option>Октябрь</option>
                                    <option>Ноябрь</option>
                                    <option>Декабрь</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Марка ракетки</label>
                                <input value="{{ old('racket_firm') }}" name="racket_firm" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Модель ракетки</label>
                                <input value="{{ old('racket_model') }}" name="racket_model" type="text" class="form-control">
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
