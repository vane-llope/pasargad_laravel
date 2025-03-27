<x-layout>

  @section('title',  __('messages.pasargad') )
  @section('description', __('messages.naturalStoneProducer') )

  @include('partials._navbar')
      <div class="space"></div>
     <div class="container">
  @include('partials._search')
         @if(count($articles)==0) 
         <p>{{__('messages.notFound')}}</p>
       @else
        @foreach ($articles as $article)
        <div class="row my-5" >
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
          <x-image-carousel :images="$article->images" :carouselId="$article->id"/> 
        </div>
        <div class="col-md-6 p-4 pt-0" data-aos="fade-up" data-aos-delay="150">
          <a class="h3 nav-link text-dark" href="/articles/{{$article->id}}">{{ $article['title_'. app()->getLocale()] }}</a>
          <p>{{ $article['summary_'. app()->getLocale()] }} <a  href="/articles/{{$article->id}}" class="main-text-color text-decoration-none"> {{__('messages.more')}}</a></p>
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