<x-layout>
     @include('partials._navbar')
     <div class="space"></div>
       <div class="container" >
          @include('partials._search')
          <div class="row my-5">
               <div class="col-8">
                    <img class="w-100" src="{{asset('storage/'.$mine->image)}}" alt="" srcset="">
                    <h2>{{$mine->stoneType->name}}</h2>
               <h1 >{{$mine['name']}}</h1>
               <h4 >{{$mine['address']}}</h4>
               </div>
               <div class="col-md-4">
                    @if(count($relatedMines)!=0) 
                   @foreach ($relatedMines as $relatedMine)
                     <img class="w-100" src="{{asset('storage/'.$relatedMine->image)}}" alt="" srcset="">
                     <a class="h5 nav-link fw-bold text-dark" href="/articles/{{$relatedMine->id}}">{{$relatedMine->name}}</a>
                     <p>{{$relatedMine->address}}</p>
                   <hr>
                   @endforeach
                  @endif 
               </div>
          </div>
            
          </div>
    </x-layout>