<x-layout>
    <x-admin-dashboard>
            @if (count($articles)) 
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-category text-center">
                      Article List</h3>
                    <h4 class="card-title"> 
                      <a href="/articles/create" class="btn btn-success">create +</a>
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table text-center">
                        <thead class=" text-primary">
                          <th class="text-end">Title</th>
                          <th>Show</th>
                          <th>Edit</th>
                          <th> Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr  >
                                <td class="text-end">{{$article['title']}}</td>
                                <td><a href="/articles/{{$article['id']}}" class="nav-link text-success">show</a> </td>
                                <td><a  href="/articles/{{$article->id}}/edit" class="nav-link text-success">Edit</a> </td>
                                <td><form method="POST" action="/articles/{{$article->id}}">
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
                    <li class="page-item"> {{$articles->links()}} </li>
                 </div>
                 @else
                     <p class="my-5 text-center h1">No articles Found</p>
                 @endif
    </x-admin-dashboard>
</x-layout>