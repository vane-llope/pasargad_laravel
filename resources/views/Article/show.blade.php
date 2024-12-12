<x-layout>
     @include('partials._navbar')
     <div class="space"></div>
       <div class="container" >
          @include('partials._search')
          <div class="row my-5">
               <div class="col-md-8">
                    <img class="w-100" src="{{asset('storage/'.$article->image)}}" alt="" srcset="">
                    <h1>{{$article['title']}}</h1>
                    <p>{{$article['summary']}}</p>
                    <p>{{$article['content']}}</p>
                    <x-tags :tagsCsv="$article['tags']" />
               </div>
               <div class="col-md-4">
                    <h2>recent news</h2>
                    @if(count($latestArticles)!=0) 
                   @foreach ($latestArticles as $latestArticle)
                     <img class="w-100" src="{{asset('storage/'.$latestArticle->image)}}" alt="" srcset="">
                     <a class="h5 nav-link fw-bold text-dark" href="/articles/{{$latestArticle->id}}">{{$latestArticle->title}}</a>
                     <p>{{$latestArticle->summary}}</p>
                   <hr>
                   @endforeach
                  @endif 
               </div>
          </div>
           
          </div>
    </x-layout>