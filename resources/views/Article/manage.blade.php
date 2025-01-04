<x-layout>
    <x-admin-dashboard>
            @if (count($articles)) 
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-category text-center">
                      {{ __('messages.articles') }}</h3>
                    <h4 class="card-title"> 
                      <a href="/articles/create" class="btn btn-success">{{__('messages.create')}}  +</a>
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table text-center">
                        <thead class=" text-primary">
                          <th class="text-end">{{ __('messages.title') }}</th>
                          <th>{{ __('messages.show') }}</th>
                          <th>{{ __('messages.edit') }}</th>
                          <th> {{ __('messages.delete') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr  >
                              <td class="text-end">{{ $article['title_'. app()->getLocale()] }}</td>
                                <td><a href="/articles/{{$article['id']}}" class="nav-link text-success">{{ __('messages.show') }}</a> </td>
                                <td><a  href="/articles/{{$article->id}}/edit" class="nav-link text-success">{{ __('messages.edit') }}</a> </td>
                                <td><form method="POST" action="/articles/{{$article->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-danger">{{ __('messages.delete') }}</button>
                                 </form></td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="pagination justify-content-around d-flex flex-column">
                    <li class="page-item"> {{$articles->links()}} </li>
                 </div>
                 @else
                     <p class="my-5 text-center h1">No articles Found</p>
                    <a href="/articles/create" class="nav-link text-success">{{__('messages.create')}} +</a>
                 @endif
    </x-admin-dashboard>
</x-layout>