@extends('layouts.main_layout')

@section('title', 'Галерея')

@section('main')
<main class="main">
    <section id="gallery-first" class="first-section">
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
             <a href="#" class="main">
                Главная                
             </a>
             <span class="current">
                Фотогалерея
             </span>
         </div>
         <h2 class="first-section__title">
          Фотогалерея 
         </h2>
      </div>
    </section>
    <section id="gallery">
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
         <div class="gallery__list">
             <a href="one-gallery.html" class="gallery__item">
                <img src="{{ $galleries[0]->images[0]->img_url }}" alt="" class="gallery-img">
                <p>
                   {{ $galleries[0]->title }}
                </p>
             </a>
             <a href="one-gallery.html" class="gallery__item">
                <img src="{{ $galleries[1]->images[0]->img_url }}" alt="" class="gallery-img">
                <p>
                  {{ $galleries[1]->title }}
                </p>
             </a>
             <a href="one-gallery.html" class="gallery__item">
                <img src="images/dist/gall3.png" alt="" class="gallery-img">
                <p>
                   Осенний турнир 2020
                </p>
             </a>
             <a href="one-gallery.html" class="gallery__item">
                <img src="images/dist/gall4.png" alt="" class="gallery-img">
                <p>
                   Летний турнир 2020
                </p>
             </a>
             <a href="one-gallery.html" class="gallery__item">
                <img src="images/dist/gall.png" alt="" class="gallery-img">
                <p>
                   Весенний турнир 2020
                </p>
             </a>
             <a href="one-gallery.html" class="gallery__item">
                <img src="images/dist/gall6.png" alt="" class="gallery-img">
                <p>
                   Осенний турнир 2020
                </p>
             </a>
             <a href="one-gallery.html" class="gallery__item">
                <img src="images/dist/gall7.png" alt="" class="gallery-img">
                <p>
                   Летний турнир 2020
                </p>
             </a>
             <a href="one-gallery.html" class="gallery__item">
                <img src="images/dist/gall8.png" alt="" class="gallery-img">
                <p>
                   Весенний турнир 2020
                </p>
             </a>
         </div>
      </div>
    </section>
 </main>
@endsection