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
         <a href="/" class="main">
            Главная                
         </a>
         <a href="/galleries" class="main">
            Фотогалерея                
         </a>
           <span class="current">
              {{ $gallery->title }}
           </span>
       </div>
       <h2 class="first-section__title">
         {{ $gallery->title }} 
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
          @foreach ($gallery->images as $image)
          <li class="gallery__item">
            <a class="grouped_elements" data-fancybox="gallery" href="{{ $image->img_url }}"><img style="object-fit: cover" src="{{ $image->img_url }}" alt=""/></a>
         </li>
          @endforeach
       </ul>
    </div>
  </section>
</main>


@endsection