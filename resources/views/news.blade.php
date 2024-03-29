@extends('layouts.main_layout')

@section('title', 'Новости')

@section('main')
<main class="main">
    <section id="news-first" class="first-section">
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
                Новости TennisTour
             </span>
          </div>
          <h2 class="first-section__title">
             Новости TennisTour
          </h2>
       </div>
    </section>
    <section id="news-white">
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
          <ul class="news__list">
             @if ($posts->count() > 0)
             <li class="news__item">
               <img style="height: 245px; object-fit: cover; width: 100%;" src="{{ $posts[0]->img_url }}" alt="" class="new-img">
               <div class="news__block">
                  <div class="news__date button yellow-btn">
                     <span class="date">
                       {{ Date::parse($posts[0]->created_at)->format('j.m.Y (H:i)') }}
                     </span>
                  </div>
                  <p class="news__subtitle">
                     {{ $posts[0]->title }}
                  </p>
                  <p class="tennis__prg-small">
                    {{ $posts[0]->description }}
                  </p>
                  <a href="{{ route('post', $posts[0]->id) }}" class="more-btn button blue-btn">
                     Подробнее
                  </a>
               </div>
            </li>   
             @endif
             @foreach ($posts as  $post)
             @if ($loop->index != 0)
             <li class="news__item">
               <div class="news__block">
                  <div class="news__date button yellow-btn">
                     <span class="date">
                        {{ Date::parse($post->created_at)->format('j.m.Y (H:i)') }}
                     </span>
                  </div>
                  <p class="news__subtitle">
                     {{ $post->title }}
                  </p>
                  <p class="tennis__prg-small">
                     {{ $post->description }}
                  </p>
                  <a href="#" class="more-btn button blue-btn">
                     Подробнее
                  </a>
               </div>
            </li>  
             @endif
             @endforeach
          </ul>
       </div>
    </section>
    <section id="news-blue">
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
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
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
       <div class="container" id="app">
          <div class="news__form">
             <h3 class="news__title">
                Архив новостей
             </h3>
             <news-form></news-form>
          </div>
          <ul class="news__list">
             <li class="news__item">
                <img src="images/dist/new1.png" alt="" class="new-img">
                <div class="news__block">
                   <div class="news__date button yellow-btn">
                      <span class="date">
                         17.03.2021 (15:35)
                      </span>
                   </div>
                   <p class="news__subtitle">
                      Результаты весеннего марафона
                   </p>
                   <p class="tennis__prg-small">
                      В Весеннем Марафоне учтены результаты мужских
                      и женских одиночных турниров 2-й категории, 3-й категории
                      и 4-й категории, прошедших 28 марта 2021 года
                   </p>
                   <a href="#" class="more-btn button blue-btn">
                      Подробнее
                   </a>
                </div>
             </li>
             <li class="news__item">
                <div class="news__block">
                   <div class="news__date button yellow-btn">
                      <span class="date">
                         17.03.2021 (15:35)
                      </span>
                   </div>
                   <p class="news__subtitle">
                      Результаты весеннего марафона
                   </p>
                   <p class="tennis__prg-small">
                      В Весеннем Марафоне учтены результаты мужских
                      и женских одиночных турниров 2-й категории, 3-й категории
                      и 4-й категории, прошедших 28 марта 2021 года
                   </p>
                   <a href="#" class="more-btn button blue-btn">
                      Подробнее
                   </a>
                </div>
             </li>
             <li class="news__item">
                <div class="news__block">
                   <div class="news__date button yellow-btn">
                      <span class="date">
                         17.03.2021 (15:35)
                      </span>
                   </div>
                   <p class="news__subtitle">
                      Результаты весеннего марафона
                   </p>
                   <p class="tennis__prg-small">
                      В Весеннем Марафоне учтены результаты мужских
                      и женских одиночных турниров 2-й категории, 3-й категории
                      и 4-й категории, прошедших 28 марта 2021 года
                   </p>
                   <a href="#" class="more-btn button blue-btn">
                      Подробнее
                   </a>
                </div>
             </li>
             <li class="news__item">
                <div class="news__block">
                   <div class="news__date button yellow-btn">
                      <span class="date">
                         17.03.2021 (15:35)
                      </span>
                   </div>
                   <p class="news__subtitle">
                      Результаты весеннего марафона
                   </p>
                   <p class="tennis__prg-small">
                      В Весеннем Марафоне учтены результаты мужских
                      и женских одиночных турниров 2-й категории, 3-й категории
                      и 4-й категории, прошедших 28 марта 2021 года
                   </p>
                   <a href="#" class="more-btn button blue-btn">
                      Подробнее
                   </a>
                </div>
             </li>
             <li class="news__item">
                <div class="news__block">
                   <div class="news__date button yellow-btn">
                      <span class="date">
                         17.03.2021 (15:35)
                      </span>
                   </div>
                   <p class="news__subtitle">
                      Результаты весеннего марафона
                   </p>
                   <p class="tennis__prg-small">
                      В Весеннем Марафоне учтены результаты мужских
                      и женских одиночных турниров 2-й категории, 3-й категории
                      и 4-й категории, прошедших 28 марта 2021 года
                   </p>
                   <a href="#" class="more-btn button blue-btn">
                      Подробнее
                   </a>
                </div>
             </li>
          </ul>
       </div>
    </section>
 </main>
@endsection