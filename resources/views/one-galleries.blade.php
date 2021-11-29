@extends('layouts.main_layout')

@section('title', 'Галерея')

@section('main')

<main class="main">
  
  <section id="one-gallery-first" class="first-section">
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
              Фотогалерея
           </span>
           <span class="current">
              Одна страница галереи
           </span>
       </div>
       <h2 class="first-section__title">
        Фотогалерея 
       </h2>
    </div>
  </section>
  
  <section id="one-gallery">
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
       <ul class="gallery__list">
           <li class="gallery__item">
              <a class="grouped_elements" data-fancybox="gallery" href="images/dist/gall1.png"><img src="images/dist/gall1.png" alt=""/></a>
           </li>
           <li class="gallery__item">
              <a class="grouped_elements" data-fancybox="gallery" href="images/dist/gall2.png"><img src="images/dist/gall2.png" alt=""/></a> 
           </li>
           <li class="gallery__item">
              <a class="grouped_elements" data-fancybox="gallery" href="images/dist/gall3.png"><img src="images/dist/gall3.png" alt=""/></a> 
           </li>
           <li class="gallery__item">
              <a class="grouped_elements" data-fancybox="gallery" href="images/dist/gall4.png"><img src="images/dist/gall4.png" alt=""/></a> 
           </li>
       </ul>
    </div>
  </section>
</main>


@endsection