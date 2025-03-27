<x-layout>
  
@section('title',  __('messages.pasargad') )
@section('description', __('messages.naturalStoneProducer') )
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
                  <div class="container col-md-6 p-4 py-0 text-decoration-none" data-aos="fade-up"
                    data-aos-delay="150">
                      <h2 class=" text-dark h3 mb-3">{{$project['title_'.app()->getLocale()]}} </h2>
                      <p >{{$project['summary_'.app()->getLocale()]}}  </p>
                         <a class="text-decoration-none main-text-color"  href="/projects/{{$project->id}}" >
                        {{__('messages.more')}} 
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