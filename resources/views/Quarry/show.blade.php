<x-layout>
     @include('partials._navbar')
     <div class="space"></div>
       <div class="container"data-aos="fade-up" data-aos-delay="100" >
          @include('partials._search')
          <div class="row my-5">
               <div class="col-8">
                    <x-image-carousel :images="$quarry->images" :carouselId="$quarry->id"/> 
                    <h2>{{$quarry->stoneType->name}}</h2>
               <h1 >{{ $quarry['name_'. app()->getLocale()] }}</h1>
               <h4 >{{ $quarry['address_'. app()->getLocale()] }}</h4>
               </div>
               <div class="col-md-4" data-aos="fade-down" data-aos-delay="100">
                    @if(count($relatedQuarries)!=0) 
                   @foreach ($relatedQuarries as $relatedQuarry)
                   <x-image-carousel :images="$relatedQuarry->images" :carouselId="$relatedQuarry->id"/> 
                     <a class="h5 nav-link fw-bold text-dark" href="/articles/{{$relatedQuarry->id}}">{{ $relatedQuarry['name_'. app()->getLocale()] }}</a>
                     <p>{{$relatedQuarry->address}}</p>
                   <hr>
                   @endforeach
                  @endif 
               </div>
          </div>
            
          </div>
          @include('partials._footer')
    </x-layout>