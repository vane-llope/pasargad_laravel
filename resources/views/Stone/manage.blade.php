<x-layout>
    <x-admin-dashboard>
        @if (empty($stones))
        <div class="card">
            <div class="card-header">
                <h3 class="card-category text-center">
                    {{__('messages.stones')}}</h3>
                <h4 class="card-title">
                    <a href="/stones/create" class="btn btn-success">{{__('messages.create')}} +</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class=" text-primary ">
                            <th class="text-end">{{__('messages.name')}}</th>
                            <th>{{__('messages.code')}}</th>
                            <th>{{__('messages.show')}}</th>
                            <th>{{__('messages.edit')}}</th>
                            <th> {{__('messages.delete')}}</th>
                        </thead>
                        <tbody>
                            @foreach ($stones as $stone)
                            <tr>
                                <td class="text-end">{{ $stone['name_'. app()->getLocale()] }}</td>
                                <td>{{$stone['code']}}</td>
                                <td><a href="/stones/{{$stone['id']}}" class="nav-link text-success">{{__('messages.show')}}</a> </td>
                                <td><a href="/stones/{{$stone->id}}/edit" class="nav-link text-success">{{__('messages.edit')}}</a> </td>
                                <td>
                                    <form method="POST" action="/stones/{{$stone->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger">{{__('messages.delete')}}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="pagination justify-content-around d-flex flex-column">
            <li class="page-item"> {{$stones->links()}} </li>
        </div>
        @else
        <p class="my-5 text-center h1">{{__('messages.notFound')}}
        
        <a href="/stones/create" class="nav-link text-success">{{__('messages.create')}} +</a></p>
        @endif
    </x-admin-dashboard>
</x-layout>