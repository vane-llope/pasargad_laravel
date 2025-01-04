<x-layout>
     @include('partials._navbar')
     <div class="space"></div>
       <div class="container" >
          @include('partials._search')
          <div class="row my-5">
               <div class="col-md-8">
                    <x-image-carousel :images="$article->images" :carouselId="$article->id"/> 
                  
                    <h1 class="my-4">{{ $article['title_'. app()->getLocale()] }}</h1>
                    <p>{{ $article['summary_'. app()->getLocale()] }}</p>
                    
                    
                    <p>{!! $article['description_'. app()->getLocale()] !!} </p>
                    <x-tags :tagsCsv="$article['tags']" />
               </div>
               <div class="col-md-4">
                    <h2>{{__('messages.recentNews')}}</h2>
                    @if(count($latestArticles)!=0) 
                   @foreach ($latestArticles as $latestArticle)
                   <x-image-carousel :images="$latestArticle->images" :carouselId="$latestArticle->id"/> 
                     <a class="h5 nav-link fw-bold text-dark" href="/articles/{{$latestArticle->id}}">{{ $latestArticle['title_'. app()->getLocale()] }}</a>
                     <p>{{ $latestArticle['summary_'. app()->getLocale()] }}</p>
                   <hr>
                   @endforeach
                  @endif 
               </div>
          </div>
          </div>
          @include('partials._footer')
    </x-layout>