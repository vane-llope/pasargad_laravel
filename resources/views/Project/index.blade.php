<x-layout>
  @include('partials._navbar')
  <div class="space"></div>
     <div class="container">
  @include('partials._search')
         @if(count($projects)==0) 
         <p>{{__('messages.notFound')}}</p>
       @else
       <section>
        <div class="my-4">
            <div class="container mb-5">
                <div class="row g-5 ">
                  @foreach ($projects as $project)
                  <a  href="/projects/{{$project->id}}" class="container  col-md-6 text-decoration-none" data-aos="fade-up"
                      data-aos-delay="100">
                      <x-image-carousel :images="$project->images" :carouselId="$project->id"/> 
                  </a>
                  <div class="container col-md-6  text-decoration-none" data-aos="fade-up"
                    data-aos-delay="100">
                      <h2 class="text-center mb-3">title : {{$project['title_'.app()->getLocale()]}} </h2>
                      <p >summary : {{$project['summary_'.app()->getLocale()]}}  </p>
                         <a class="text-decoration-none text-dark "  href="/projects/{{$project->id}}" class="text-decoration-none">
                        {{__('messages.more')}} ...
                      </a>
                        <x-tags :tagsCsv="$project['tags']" />

                  </div>
                  @endforeach
                </div>
            </div>
        </div>
      </section>

      <div class="pagination justify-content-around d-flex flex-column">
        <li class="page-item"> {{$projects->links()}} </li>
     </div>
       @endif 
      </div>
      @include('partials._footer')
    </x-layout>