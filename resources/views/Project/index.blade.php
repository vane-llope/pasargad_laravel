<x-layout>
  @include('partials._navbar')
  <div class="space"></div>
     <div class="container">
  @include('partials._search')
         @if(count($projects)==0) 
         <p>No project</p>
       @else
       <section>
        <div class="my-4">
            <div class="container mb-5">
                <div class="row g-5 ">
                  @foreach ($projects as $project)
                  <a  href="/projects/{{$project->id}}" class="container col-md-6 text-decoration-none" data-aos="fade-up"
                      data-aos-delay="100">
                      <div class=" service-item d-flex justify-content-around p-5 flex-column position-relative align-items-center"
                          style="height:50vh; background-image: url({{asset('storage/'.$project->image)}});">
                          <h2 class="text-white position-absolute bottom-0 start-50 translate-middle-x">{{$project->title}}
                          </h2>
                      </div>
                  </a>
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
    </x-layout>