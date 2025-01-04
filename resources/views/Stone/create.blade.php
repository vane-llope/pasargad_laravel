<x-layout>
  <x-admin-dashboard>
  <div class="container my-5">
    @include('partials._setLanguage')
    <form method="POST" action="/stones" enctype="multipart/form-data">
        @csrf
   
        <div class="row">
          <div class="col-md-6">
            <x-image-uploader :image="null"/></div>
          <div class="col-md-6 my-5">

      <div class="form-floating mb-3">
        <input type="text" name="code" value="{{old('code')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">code</label>
        @error('code')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">name</label>
        @error('name')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="Tensile_Strength" value="{{old('Tensile_Strength')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Tensile_Strength</label>
        @error('Tensile_Strength')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="Water_Absorption_Rate" value="{{old('Water_Absorption_Rate')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Water_Absorption_Rate</label>
        @error('Water_Absorption_Rate')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="Compressive_Strength" value="{{old('Compressive_Strength')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Compressive_Strength</label>
        @error('Compressive_Strength')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="Abrasion_Resistance" value="{{old('Abrasion_Resistance')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Abrasion_Resistance</label>
        @error('Abrasion_Resistance')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="Specific_Weight" value="{{old('Specific_Weight')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Specific_Weight</label>
        @error('Specific_Weight')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="Specific_Weight" value="{{old('Specific_Weight')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Specific_Weight</label>
        @error('Specific_Weight')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="Failure_Mode" value="{{old('Failure_Mode')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Failure_Mode</label>
        @error('Failure_Mode')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="Porosity" value="{{old('Porosity')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Porosity</label>
        @error('Porosity')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <select name="stone_type_id" class="form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        @foreach ($stoneTypes as $stoneType)
        <option value="{{$stoneType->id}}">{{$stoneType->name}}</option>
        @endforeach
      </select>

      <button type="submit" class="btn main-btn-color text-light mt-3 w-100">Submit The Form</button>
          </div>
        </div>
     
    </form>
  </div>
  </x-admin-dashboard>
</x-layout>