<x-layout>
    <x-admin-dashboard>
  <div class="container my-5">
      <form method="POST" action="/stones/{{ $stone->id }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="row">
              <div class="col-md-6">
                  <x-image-uploader :image="$stone->image"/>
              </div>
              <div class="col-md-6 mt-5">
                  <div class="form-floating mb-3">
                      <input type="text" name="code" value="{{ old('code', $stone->code) }}" class="form-control" id="floatingInput">
                      <label for="floatingInput">Code</label>
                      @error('code')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-floating mb-3">
                      <input type="text" name="name" value="{{ old('name', $stone->name) }}" class="form-control" id="floatingInput">
                      <label for="floatingInput">Name</label>
                      @error('name')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-floating mb-3">
                      <input type="text" name="Tensile_Strength" value="{{ old('Tensile_Strength', $stone->Tensile_Strength) }}" class="form-control" id="floatingInput">
                      <label for="floatingInput">Tensile Strength</label>
                      @error('Tensile_Strength')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-floating mb-3">
                      <input type="text" name="Water_Absorption_Rate" value="{{ old('Water_Absorption_Rate', $stone->Water_Absorption_Rate) }}" class="form-control" id="floatingInput">
                      <label for="floatingInput">Water Absorption Rate</label>
                      @error('Water_Absorption_Rate')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-floating mb-3">
                      <input type="text" name="Compressive_Strength" value="{{ old('Compressive_Strength', $stone->Compressive_Strength) }}" class="form-control" id="floatingInput">
                      <label for="floatingInput">Compressive Strength</label>
                      @error('Compressive_Strength')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-floating mb-3">
                      <input type="text" name="Abrasion_Resistance" value="{{ old('Abrasion_Resistance', $stone->Abrasion_Resistance) }}" class="form-control" id="floatingInput">
                      <label for="floatingInput">Abrasion Resistance</label>
                      @error('Abrasion_Resistance')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-floating mb-3">
                      <input type="text" name="Specific_Weight" value="{{ old('Specific_Weight', $stone->Specific_Weight) }}" class="form-control" id="floatingInput">
                      <label for="floatingInput">Specific Weight</label>
                      @error('Specific_Weight')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-floating mb-3">
                      <input type="text" name="Failure_Mode" value="{{ old('Failure_Mode', $stone->Failure_Mode) }}" class="form-control" id="floatingInput">
                      <label for="floatingInput">Failure Mode</label>
                      @error('Failure_Mode')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-floating mb-3">
                      <input type="text" name="Porosity" value="{{ old('Porosity', $stone->Porosity) }}" class="form-control" id="floatingInput">
                      <label for="floatingInput">Porosity</label>
                      @error('Porosity')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <select name="stone_type_id" class="form-select my-3" aria-label="Default select example">
                      <option selected value="{{ $stone->stoneType->id }}">{{ $stone->stoneType->name }}</option>
                      @foreach ($stoneTypes as $stoneType)
                          <option value="{{ $stoneType->id }}">{{ $stoneType->name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>

          <button type="submit" class="btn main-btn-color text-light mt-3 w-100">Update</button>
      </form>
  </div>
    </x-admin-dashboard>
</x-layout>
