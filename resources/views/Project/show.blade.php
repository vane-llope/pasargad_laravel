<x-layout>
     @include('partials._navbar')
     <div class="space"></div>
       <div class="container" >
          @include('partials._search')
          <div class="row my-5">
               <div class="col-md-8">
                    <img class="w-100" src="{{asset('storage/'.$project->image)}}" alt="" srcset="">
                    <x-tags :tagsCsv="$project['tags']" />
               <h1 >{{$project['title']}}</h1>
               <h4 >{{$project['summary']}}</h4>
               <p >{{$project['description']}}</p>
               </div>
               <div class="col-md-4">
                    @if(count($relatedProjects)!=0) 
                   @foreach ($relatedProjects as $relatedProject)
                     <img class="w-100" src="{{asset('storage/'.$relatedProject->image)}}" alt="" srcset="">
                     <a class="h5 nav-link fw-bold text-dark" href="/articles/{{$relatedProject->id}}">{{$relatedProject->title}}</a>
                     <p>{{$relatedProject->summary}}</p>
                   <hr>
                   @endforeach
                  @endif 
               </div>
          </div>
           
          </div>
    </x-layout>