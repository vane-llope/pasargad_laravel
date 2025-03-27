<x-layout>
  
@section('title',  __('messages.pasargad') )
@section('description', __('messages.naturalStoneProducer') )
  @include('partials._navbar')
  @include('partials._stoneHero')

     <div class="container">
  @include('partials._search')
         @if(count($stones)==0) 
         <p>{{__('messages.notFound')}}</p>
       @else
       <section>
        <div class="my-5">
            <div class="container section-title" data-aos="fade-up">
                <h2>نمونه سنگ ها</h2>
                <p>ارائه ی برترین سنگ های ساختمانی با تنوعی بی نظیر از برترین سنگ های طبیعی</p>
            </div><!-- End Section Title -->
            <div class="container mb-5">
                <div class="row g-5 ">
                  @foreach ($stones as $stone)
                  <a  href="/stones/{{$stone->id}}" class="container col-md-6 text-decoration-none" data-aos="fade-up"
                      data-aos-delay="100">
                      <div class=" service-item d-flex justify-content-around p-5 flex-column position-relative align-items-center"
                          style="height:50vh; background-image: url({{asset('storage/'.$stone->image)}});">
                          <h2 class="text-white position-absolute bottom-0 start-50 translate-middle-x">{{ $stone['name_' . app()->getLocale()] }}
                          </h2>
                      </div>
                  </a>
                  @endforeach
                </div>
            </div>
        </div>
      </section>

      <div class="pagination justify-content-around d-flex flex-column">
        <li class="page-item"> {{$stones->links()}} </li>
     </div>
       @endif 
      </div>
      @include('partials._footer')
    </x-layout>