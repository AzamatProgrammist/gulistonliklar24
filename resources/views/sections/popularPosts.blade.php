<div class="popular-news">
            <div class="popular-news-wrapper">
              <h4 class="popular-news__title">Cамые популярные новости</h4>
              <ul class="popular-news__list">
              @foreach($popularPosts as $popularPost)
              <li class="popular-news__item">
                  <a href="{{ route('postDetail', $popularPost->slug) }}">
                    <p class="popular-news__description">{{ \Str::limit($popularPost['title_'.\App::getLocale()], 70) }}</p>
                    <span class="popular-news__date">{{ $popularPost->created_at->format('H:s / d.m.Y') }}</span>
                  </a>
                </li>
              @endforeach  

              </ul>
            </div>
            <a href="{{ $ad->ulr2 }}" class="ads-placeholder" style="background-image: url(/site/images/posts/{{ $ad->image2 }})">
              <h4>{{ $ad->title2 }}</h4>
            </a>
          </div>