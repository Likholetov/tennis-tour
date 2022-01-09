@extends('layouts.admin_layout')

@section('title', 'Результаты')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Результаты турнира {{ $tournament->title }} {{ $tournament->rank->title ?? "" }} {{ $tournament->category->title ?? "" }} категории</h1>
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
        <results-component
            :tournament="{{ $tournament }}"
            :groups="{{ $tournament->groups()->with('players')->get() }}"
            :players="{{ $tournament->players()->get() }}"
            :existingmatches="{{ $tournament->rounds()->with('tennis_matches')->get() }}"
        ></results-component>
    </section>
    <!-- /.content -->
@endsection