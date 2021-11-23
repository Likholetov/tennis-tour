@extends('layouts.main_layout')

@section('title', 'Игроки')

@section('main')
<main class="main">
   <section id="players-first" class="first-section">
      <div class="circle">
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
      </div>
      <div class="container">
         <div class="first-section__navigation">
            <span class="main">
               Главная
            </span>
            <span class="current">
               Игроки TennisTour
            </span>
         </div>
         <h2 class="first-section__title">
            Игроки TennisTour
         </h2>
      </div>
   </section>
   <section id="players">
      <div class="circle circle-blue">
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
      </div>
      <div class="circle circle-blue">
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
      </div>
      <div class="container">
         <div class="players__row">
            <players-component></players-component>
            <div class="players__block-birthday">
               <div class="tennis__title">
                  Дни рождения
               </div>
               <p class="birthday__prg">
                  Поздравляем с Днём Рождения участников турнира, родившихся
                  <span>
                     {{Date::parse(\Carbon\Carbon::now()->addHours(3))->format('j F')}}
                  </span>
               </p>
               <ul class="birthday__list">
                  @foreach ($today as $player)
                  <li class="birthday__item">
                     <img src="{{$player->img_url ?? 'images/dist/avatar1.png'}}" alt="" class="avatar-birthday">
                     <p>
                        {{ $player->surname }} {{ $player->name[0] }}.
                     </p>
                  </li>
                  @endforeach
               </ul>
               <p class="birthday__prg">
                  Скоро Дни Рождения
                  <span>
                     ({{Date::parse(\Carbon\Carbon::now()->addHours(3)->addDay())->format('j F')}} - {{Date::parse(\Carbon\Carbon::now()->addHours(3)->addDay(8))->format('j F')}})
                  </span>
               </p>
               <ul class="birthday__list">
                  @foreach ($week as $player)
                  <li class="birthday__item">
                     <img src="{{$player->img_url ?? 'images/dist/avatar1.png'}}" alt="" class="avatar-birthday">
                     <p>
                        {{ $player->surname }} {{ $player->name[0] }}.
                     </p>
                  </li>
                  @endforeach
               </ul>
            </div>
            
         </div>
      </div>
   </section>
   <section id="players-gallery">
      <div class="circle">
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
         <span></span>
      </div>
      <div class="container">
         <h3 class="players-gallery__title">
            Галерея славы игроков
         </h3>
         <ul class="players-gallery__list">
            <li class="players-gallery__item">
               <img src="images/dist/players1.png" alt="" class="players-gallery">
            </li>
            <li class="players-gallery__item">
               <img src="images/dist/players2.png" alt="" class="players-gallery">
            </li>
         </ul>
         <button type="button" class="button yellow-btn">
            Подробнее
         </button>
      </div>
   </section>
</main>
@endsection