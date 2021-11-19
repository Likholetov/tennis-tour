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
            <div class="players__block">
               <form action="#" class="players__form">
                  <input type="text" class="players__input players__input-search" placeholder="ФИО">
                  <select id="level">
                     <option value="hide">Уровень игрока</option>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                  </select>
               </form>
               <ul class="players__list">
                  @foreach ($players as $player)
                  <a href="{{ route('player', $player->id) }}" class="players__item">
                     <div class="players__elem">
                        <img src="{{ $player->img_url ?? "images/dist/avatar.png"}}" alt="" class="avatar">
                        <div class="desc">
                           <p class="name">
                              {{ $player->surname }} {{ $player->name }}
                           </p>
                           <p class="birthday">
                              @if (isset($player->birth))
                              {{ Date::parse($player->birth)->format('j F Y г.') }} ({{ $player->age() }} лет)
                              @else
                              Не указано
                              @endif
                           </p>
                           @if (isset($player->level))
                           <div class="fourth-place-elem place-elem">
                              <span class="place">
                                 <b>{{ $player->level }}</b>
                                 <svg class="medal__icon" style="enable-background:new 0 0 512 512;"
                                    xml:space="preserve" xmlns="http://www.w3.org/2000/svg" width="28" height="35"
                                    viewBox="0 0 512 512">
                                    <g>
                                       <g>
                                          <path d="M256,107c-51.7,0-93.8,42.2-93.8,94c0,51.9,42.1,94,93.8,94c51.7,0,93.8-42.2,93.8-94C349.8,149.2,307.7,107,256,107
                                             L256,107z M272,253.3c0,8.3-6.7,15-15,15c-8.3,0-15-6.7-15-15v-78.8h-5c-8.3,0-15-6.7-15-15c0-8.3,6.7-15,15-15h20
                                             c8.3,0,15,6.7,15,15V253.3z" />
                                          <path d="M444.4,241.1c9.6-10.9,20.5-23.3,20.5-39.7c0-16.3-10.7-28.7-20.3-39.6c-5.4-6.2-11-12.6-12.6-17.8
                                             c-1.5-4.7-0.7-12.9,0-20.8c1.4-14.7,3-31.4-6.8-45c-9.9-13.7-26.2-17.3-40.6-20.5c-7.7-1.7-15.7-3.5-19.7-6.4
                                             c-4.4-3.2-8.7-10.5-12.9-17.6c-7.4-12.5-15.8-26.6-31.3-31.6C305.2-3,290,3.5,276.7,9.2c-7.5,3.2-15.2,6.5-20.4,6.5c0,0,0,0,0,0
                                             c-5.1,0-12.7-3.3-20.1-6.6c-13.4-5.9-28.7-12.5-44.5-7.4c-15.3,4.9-23.6,18.9-31,31.3c-4.3,7.2-8.7,14.6-13.3,17.9
                                             c-4.5,3.3-12.9,5.2-21.1,7c-14,3.2-29.9,6.8-39.3,19.8c-9.7,13.4-8.2,30-6.8,44.6c0.8,8,1.5,16.4,0,21.2
                                             c-1.6,5-7.2,11.3-12.6,17.5C58,172,47.1,184.4,47.1,200.8c0,16.3,10.7,28.7,20.3,39.6c5.4,6.2,11,12.6,12.6,17.8
                                             c1.5,4.7,0.7,12.9,0,20.8c-1.4,14.7-3,31.4,6.8,45c9.9,13.7,26.2,17.3,40.6,20.5c7.7,1.7,15.7,3.5,19.7,6.4
                                             c4.4,3.2,8.7,10.5,12.9,17.6c7.4,12.5,15.8,26.6,31.3,31.6c15.6,5.1,30.8-1.4,44.1-7.2c7.5-3.2,15.2-6.5,20.4-6.5h0
                                             c5.1,0,12.7,3.3,20.1,6.6c10.1,4.4,21.1,9.2,32.7,9.2c3.9,0,7.8-0.5,11.8-1.8c15.3-4.9,23.6-18.9,31-31.3
                                             c4.3-7.2,8.7-14.6,13.2-17.9c4.5-3.3,12.9-5.2,21.1-7c14-3.2,29.9-6.8,39.3-19.8c9.7-13.4,8.2-30,6.8-44.6c-0.8-8-1.5-16.4,0-21.2
                                             C433.4,253.5,439,247.2,444.4,241.1L444.4,241.1z M256,325.1c-68.3,0-123.8-55.6-123.8-124.1S187.7,77,256,77
                                             s123.8,55.6,123.8,124.1S324.3,325.1,256,325.1z" />
                                       </g>
                                       <g>
                                          <path d="M241,423.1c-10.7,4.4-23.4,8.8-38.1,8.8c-7.2,0-14.3-1.1-21-3.3c-21.3-6.9-33.8-22.6-42.4-36.1V497c0,4.7,2.2,9.2,6,12
                                             c3.8,2.8,8.7,3.7,13.2,2.4L241,487L241,423.1z" />
                                          <path d="M329.6,428.9c-6.7,2.2-13.8,3.3-21,3.3c0,0,0,0,0,0c-14.5,0-27-4.3-37.6-8.7V487l82.2,24.4c1.4,0.4,2.8,0.6,4.3,0.6
                                             c3.2,0,6.4-1,9-3c3.8-2.8,6-7.3,6-12V392C363.9,405.5,351.3,421.8,329.6,428.9z" />
                                       </g>
                                    </g>
                                 </svg>
                              </span>
                              <div class="place-txt">
                                 уровень
                              </div>
                           </div>
                           @endif
                        </div>
                     </div>
                     <div class="players__date">
                        @if (isset($player->start_playing_year))
                        <p>
                           <b>
                              с {{ $player->start_playing_year }} г.
                           </b>
                           играет в теннис
                        </p> 
                        @endif
                        @if (isset($player->start_tournament_year))
                        <p>
                           <b>
                              с {{ $player->start_tournament_year }} г.
                           </b>
                           учавствутет в турнире
                        </p>
                        @endif
                     </div>
                  </a>
                  @endforeach
               </ul>
            </div>
            <div class="players__block-birthday">
               <div class="tennis__title">
                  Дни рождения
               </div>
               <p class="birthday__prg">
                  Поздравляем с Днём Рождения участников турнира, родившихся
                  <span>
                     20 апреля
                  </span>
               </p>
               <ul class="birthday__list">
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
               </ul>
               <p class="birthday__prg">
                  Скоро Дни Рождения
                  <span>
                     (21-30 апреля)
                  </span>
               </p>
               <ul class="birthday__list">
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
                  <li class="birthday__item">
                     <img src="images/dist/avatar1.png" alt="" class="avatar-birthday">
                     <p>
                        Ерофеев Д.
                     </p>
                  </li>
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