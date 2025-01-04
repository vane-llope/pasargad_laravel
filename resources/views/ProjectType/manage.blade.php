<x-layout>
    <x-admin-dashboard>
        @if (count($projectTypes))
        <div class="card">
            <div class="card-header">
                <h3 class="card-category text-center">
                    Project Type List</h3>
                <h4 class="card-title">
                    <a href="/projectTypes/create" class="btn btn-success">create +</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class=" text-primary ">
                            <th class="text-end">Name</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th> Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($projectTypes as $projectType)
                            <tr>
                                <td class="text-end">{{$projectType['name']}}</td>
                                <td><a href="/projectTypes/{{$projectType['id']}}" class="nav-link text-success">show</a> </td>
                                <td><a href="/projectTypes/{{$projectType->id}}/edit" class="nav-link text-success">Edit</a> </td>
                                <td>
                                    <form method="POST" action="/projectTypes/{{$projectType->id}}">
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
            <li class="page-item"> {{$projectTypes->links()}} </li>
        </div>
        @else
        <p class="my-5 text-center h1">No projectTypes Found</p>
        <a href="/projectTypes/create" class="nav-link text-success">create one +</a>
        @endif
    </x-admin-dashboard>
</x-layout>