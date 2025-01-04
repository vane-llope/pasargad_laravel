<x-layout>
  @include('partials._navbar')
      <div class="space"></div>
     <div class="container">
  @include('partials._search')
         @if(count($articles)==0) 
         <p>No Article</p>
       @else
        @foreach ($articles as $article)
        <div class="row my-5">
        <div class="col-md-6">
          <x-image-carousel :images="$article->images" :carouselId="$article->id"/> 
        </div>
        <div class="col-md-6 p-4 pt-0">
          <a class="h1 nav-link" href="/articles/{{$article->id}}">{{ $article['title_'. app()->getLocale()] }}</a>
          <p>{{ $article['summary_'. app()->getLocale()] }} <a  href="/articles/{{$article->id}}" class="text-primary text-decoration-none"> {{__('messages.more')}}</a></p>
          <x-tags :tagsCsv="$article['tags']" />
        </div>
        </div>
        @endforeach
       
       <div class="pagination justify-content-around d-flex flex-column">
        <li class="page-item"> {{$articles->links()}} </li>
     </div>
       @endif 
      </div>
      @include('partials._footer')
    </x-layout>