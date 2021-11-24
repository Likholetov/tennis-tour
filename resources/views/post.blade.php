@extends('layouts.main_layout')

@section('title', 'Новости')

@section('main')
<main class="main">
   <section id="one-new-first" class="first-section">
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
            <span class="main">
               А вы знаете что?
            </span>
            <span class="current">
               Теннис пог
            </span>
         </div>
         <h2 class="first-section__title">
            {{ $post->title }}
         </h2>
      </div>
   </section>
   <section id="one-new">
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
      </div>
      <div class="container">
         <div class="one-new__container">
            <div class="one-new__column">
               <p class="tennis__prg-small">
                  {{ $post->content }}
               </p>
               @if (isset($post->img_url))
               <h5 class="tennis__subtitle">
                  <img style="max-width:334px; object-fit: cover" src="{{ $post->img_url }}" alt="" class="one-new-img">
               </h5>
               @endif
               
            </div>
            <div class="one-new__column">
               <ul class="calendar__list-small">
                  @foreach ($posts as $item)
                  <li class="calendar__item-small">
                     <div class="date-yellow  button yellow-btn">
                        <span class="date">
                           {{ Date::parse($item->created_at)->format('j.m.Y') }}
                        </span>
                     </div>
                     <p class="tennis__prg-small">
                        {{ $item->title }}
                     </p>
                     <a href="result.html" class="further__link">
                        Подробнее
                        <span class="arrow-right__link"></span>
                     </a>
                  </li>
                  @endforeach
               </ul>
            </div>
         </div>
      </div>
   </section>
   <section id="one-new__slider">
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
         <div class="swiper-container one-new__slider">
            <div class="swiper-wrapper">
               <div class="swiper-slide one-new__slide">
                  <img src="/images/dist/calendar1.png" alt="" class="one-new__img">
                  <p class="tour__subtitle">
                     Теннис погубил трех французских королей
                  </p>
               </div>
               <div class="swiper-slide one-new__slide">
                  <img src="/images/dist/calendar2.png" alt="" class="one-new__img">
                  <p class="tour__subtitle">
                     Теннис погубил трех французских королей
                  </p>
               </div>
               <div class="swiper-slide one-new__slide">
                  <img src="/images/dist/calendar3.png" alt="" class="one-new__img">
                  <p class="tour__subtitle">
                     Теннис погубил трех французских королей
                  </p>
               </div>
               <div class="swiper-slide one-new__slide">
                  <img src="/images/dist/calendar4.png" alt="" class="one-new__img">
                  <p class="tour__subtitle">
                     Теннис погубил трех французских королей
                  </p>
               </div>
               <div class="swiper-slide one-new__slide">
                  <img src="/images/dist/calendar1.png" alt="" class="one-new__img">
                  <p class="tour__subtitle">
                     Теннис погубил трех французских королей
                  </p>
               </div>
               <div class="swiper-slide one-new__slide">
                  <img src="/images/dist/calendar2.png" alt="" class="one-new__img">
                  <p class="tour__subtitle">
                     Теннис погубил трех французских королей
                  </p>
               </div>
               <div class="swiper-slide one-new__slide">
                  <img src="/images/dist/calendar3.png" alt="" class="one-new__img">
                  <p class="tour__subtitle">
                     Теннис погубил трех французских королей
                  </p>
               </div>
               <div class="swiper-slide one-new__slide">
                  <img src="/images/dist/calendar4.png" alt="" class="one-new__img">
                  <p class="tour__subtitle">
                     Теннис погубил трех французских королей
                  </p>
               </div>
            </div>
            <div class="calendar__navigation one-new__navigation">
               <div class="swiper-button-prev"></div>
               <div class="swiper-button-next"></div>
               <div class="swiper-pagination"></div>
            </div>
         </div>
      </div>
   </section>
</main>
@endsection