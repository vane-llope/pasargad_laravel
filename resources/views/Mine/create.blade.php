<x-layout>
  <x-admin-dashboard>
  <div class="container my-5">
    <form method="POST" action="/mines" enctype="multipart/form-data">
        @csrf
            
      <div class="form-floating mb-3">
        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">name</label>
        @error('name')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      
      <div class="form-floating mb-3">
        <input type="text" name="address" value="{{old('address')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">address</label>
        @error('address')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <select name="stone_type_id" class="form-select mb-3" aria-label="Default select example">
        <option selected>Open this select menu</option>
        @foreach ($stoneTypes as $stoneType)
        <option value="{{$stoneType->id}}">{{$stoneType->name}}</option>
        @endforeach
      </select>
      @error('stone_type_id')
      <p class="text-danger">{{ $message }}</p>
       @enderror
      
      <x-multiple-image-uploader :images="null" />

      <button type="submit" class="btn main-btn-color text-light mt-3 w-100">Submit The Form</button>
         
     
    </form>
  </div>
  </x-admin-dashboard>
</x-layout>