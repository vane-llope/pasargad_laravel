<x-layout> 
  <x-admin-dashboard>
 <div class="container my-5">
  @include('partials._setLanguage')
    <form method="POST" action="/projectTypes/{{$projectType->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-floating mb-3">
          <input type="text" name="name" value="{{$projectType->name}}"  class="form-control" id="floatingInput" >
          <label for="floatingInput">name</label>
          @error('name')
              <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
      <button type="submit" class="btn main-btn-color text-light mt-3 w-100">Update</button>
    </form>
 </div>
  </x-admin-dashboard>
</x-layout>