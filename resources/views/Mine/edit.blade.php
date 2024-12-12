<x-layout> 
  <x-admin-dashboard>
 <div class="container my-5">
    <form method="POST" action="/mines/{{$mine->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
          <div class="col-md-6">
            <x-image-uploader :image="$mine->image"/>
          </div>
          <div class="col-md-6 mt-5">

            <div class="form-floating mb-3">
              <input type="text" name="name" value="{{$mine->name}}"  class="form-control" id="floatingInput" >
              <label for="floatingInput">name</label>
              @error('name')
                  <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
    
    
          <div class="form-floating mb-3">
            <input type="text" name="address" value="{{$mine->address}}" class="form-control" id="floatingInput" >
            <label for="floatingInput">address </label>
            @error('address')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          <select name="stone_type_id" class="form-select my-3" aria-label="Default select example">
            <option selected value="{{$mine->stoneType->id}}">{{$mine->stoneType->name}}</option>
            @foreach ($stoneTypes as $stoneType)
            <option value="{{$stoneType->id}}">{{$stoneType->name}}</option>
            @endforeach
          </select>

          </div>
        </div>

      <button type="submit" class="btn main-btn-color text-light text-light mt-3 w-100">Update</button>
    </form>
 </div>
  </x-admin-dashboard>
</x-layout>