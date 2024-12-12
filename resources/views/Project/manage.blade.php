<x-layout>
    <x-admin-dashboard>
            @if (count($projects)) 
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-category text-center">
                      project List</h3>
                    <h4 class="card-title"> 
                      <a href="/projects/create" class="btn btn-success">create +</a>
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table text-center">
                        <thead class=" text-primary ">
                          <th class="text-end">Title</th>
                          <th>Show</th>
                          <th>Edit</th>
                          <th> Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr  >
                                <td class="text-end">{{$project['title']}}</td>
                                <td><a href="/projects/{{$project['id']}}" class="nav-link text-success">show</a> </td>
                                <td><a  href="/projects/{{$project->id}}/edit" class="nav-link text-success">Edit</a> </td>
                                <td><form method="POST" action="/projects/{{$project->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-danger">Delete</button>
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
                     <p class="my-5 text-center h1">No projects Found</p>
                 @endif
    </x-admin-dashboard>
</x-layout>