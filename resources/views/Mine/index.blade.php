<x-layout>
  @include('partials._navbar')
  <div class="space"></div>
     <div class="container">
  @include('partials._search')
         @if(count($mines)==0) 
         <p>No mine</p>
       @else

       <section>
        <div class="mb-5">
            <div class="container section-title" data-aos="fade-up">
                <!--news-->
                <div class="position-relative container">
                    <hr>
                    <div class="position-absolute top-0 start-50 translate-middle p-1 bg-white">
                        <p class=" text-dark h5 text-center">
                            <span class="me-2">
                                معادن {{$mines[0]->stoneType->name}}</span>
                            <i class="bi bi-chevron bg-website-color text-light  rounded-circle "></i>
                        </p>
                    </div>
                </div>
                <div class="container my-5">
                  <div class="row g-5 ">
                    @foreach ($mines as $mine)
                      <a href="/mines/{{$mine->id}}" class="container col-md-6 text-decoration-none " data-aos="fade-up" data-aos-delay="150">
                        <x-image-carousel :images="$mine->images" :carouselId="$mine->id"/> 
                          <h1 class="text-dark">  {{$mine->name}} _ {{$mine->stoneType->name}}</h1>
                          <p class="text-dark">{{$mine->address}}</p>
                      </a>
                      @endforeach
            </div>
          </div>
        </section>

       <div class="pagination justify-content-around d-flex flex-column">
        <li class="page-item"> {{$mines->links()}} </li>
     </div>
       @endif 

      </div>
      @include('partials._footer')
    </x-layout>