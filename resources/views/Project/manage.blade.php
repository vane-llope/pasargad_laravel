<x-layout>
    <x-admin-dashboard>
            @if (count($projects)) 
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-category text-center">
                      {{__('messages.projects')}}</h3>
                    <h4 class="card-title"> 
                      <a href="/projects/create" class="btn btn-success">{{__('messages.create')}} +</a>
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table text-center">
                        <thead class=" text-primary ">
                          <th class="text-end">{{__('messages.title')}}</th>
                          <th>{{__('messages.show')}}</th>
                          <th>{{__('messages.edit')}}</th>
                          <th> {{__('messages.delete')}}</th>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr  >
                                <td class="text-end">{{$project['title_'.app()->getLocale()]}}</td>
                                <td><a href="/projects/{{$project['id']}}" class="nav-link text-success">{{__('messages.show')}}</a> </td>
                                <td><a  href="/projects/{{$project->id}}/edit" class="nav-link text-success">{{__('messages.edit')}}</a> </td>
                                <td><form method="POST" action="/projects/{{$project->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-danger">{{__('messages.delete')}}</button>
                                 </form></td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="pagination justify-content-around d-flex flex-column">
                    <li class="page-item"> {{$projects->links()}} </li>
                 </div>
                 @else
                     <p class="my-5 text-center h1">{{__('messages.notFound')}}
                    <a href="/projects/create" class="nav-link text-success">{{__('messages.create')}} +</a>
                  </p>
                 @endif
    </x-admin-dashboard>
</x-layout>