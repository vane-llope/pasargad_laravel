<x-layout>
     @include('partials._navbar')
     <div class="space"></div>
       <div class="container">
          @include('partials._search')
          <div class="row my-5">
               <div class="col-md-8">
                    <x-image-carousel :images="$project->images" :carouselId="$project->id"/> 
                  
                    <h1 class="my-4">{{ $project['title'] }}</h1>
                    <h4>{{ $project['summary_'.app()->getLocale()] }}</h4>
                    <p>{!! $project['description_'.app()->getLocale()] !!}</p>
                    <x-tags :tagsCsv="$project['tags']" />
               </div>
               <div class="col-md-4">
                    @if(count($relatedProjects) != 0) 
                        @foreach ($relatedProjects as $relatedProject)
                            <x-image-carousel :images="$relatedProject->images" :carouselId="$relatedProject->id"/> 
                            <a class="h5 nav-link fw-bold text-dark" href="/articles/{{ $relatedProject->id }}">{{ $relatedProject['title_'.app()->getLocale()]}}</a>
                            <p>{{ $relatedProject['sammary_'.app()->getLocale()] }}</p>
                            <hr>
                        @endforeach
                    @endif 
               </div>
          </div>
    </div>
    @include('partials._footer')
</x-layout>
