@extends('layouts.admin_layout')

@section('title', 'Календарь')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $tournament->title }} {{ $tournament->rank->title ?? "" }} {{ $tournament->category->title ?? "" }} категории</h1>
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
        <tournament-component
            :date="'{{ $date }}'"
            :categories="{{ $categories }}"
            :ranks="{{ $ranks }}"
            :players="{{ $players }}"
            :tournament="{{ $tournament }}"
            :participants="{{ $participants }}"
            :tournamentgroups="{{ $tournament->groups()->with('players')->get() }}"
        ></tournament-component>
    </section>
    <!-- /.content -->
@endsection