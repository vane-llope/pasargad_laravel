<x-layout>
    <x-admin-dashboard>
        @if (count($stones))
        <div class="card">
            <div class="card-header">
                <h3 class="card-category text-center">
                    Stone List</h3>
                <h4 class="card-title">
                    <a href="/stones/create" class="btn btn-success">create +</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class=" text-primary ">
                            <th class="text-end">Name</th>
                            <th>Code</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th> Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($stones as $stone)
                            <tr>
                                <td class="text-end">{{$stone['name']}}</td>
                                <td>{{$stone['code']}}</td>
                                <td><a href="/stones/{{$stone['id']}}" class="nav-link text-success">show</a> </td>
                                <td><a href="/stones/{{$stone->id}}/edit" class="nav-link text-success">Edit</a> </td>
                                <td>
                                    <form method="POST" action="/stones/{{$stone->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger">Delete</button>
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
        <p class="my-5 text-center h1">No stones Found</p>
        
        <a href="/stoneTypes/create" class="nav-link text-success">create one +</a>
        @endif
    </x-admin-dashboard>
</x-layout>