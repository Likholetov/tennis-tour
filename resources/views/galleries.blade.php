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
             <a href="/" class="main">
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
            @if ($galleries->count() > 0)
             <a href="{{ route('gallery', $galleries[0]->id) }}" class="gallery__item big">
                <img style="object-fit: cover" src="{{ $galleries[0]->images[0]->img_url }}" alt="" class="gallery-img">
                <p>
                   {{ $galleries[0]->title }}
                </p>
             </a>
             @endif
             @if ($galleries->count() > 1)
             <a href="{{ route('gallery', $galleries[1]->id) }}" class="gallery__item big">
               <img style="object-fit: cover" src="{{ $galleries[1]->images[0]->img_url }}" alt="" class="gallery-img">
               <p>
                 {{ $galleries[1]->title }}
               </p>
            </a>
             @endif
             @foreach ($galleries as $gallery)
             @if ($loop->index != 0 && $loop->index != 1)
             <a href="{{ route('gallery', $gallery->id) }}" class="gallery__item">
               <img style="object-fit: cover" src="{{ $gallery->images[0]->img_url }}" alt="" class="gallery-img">
               <p>
                  {{ $gallery->title }}
               </p>
            </a>
            @endif
            @endforeach
         </div>
      </div>
    </section>
 </main>
@endsection