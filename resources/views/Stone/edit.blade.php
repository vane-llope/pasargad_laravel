<x-layout>
    <x-admin-dashboard>
      <div class="container">
        <div class="card">
            <div class="card-body bg-light">
        <form method="POST" action="/stones/{{ $stone->id }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
  
          <div class="d-flex justify-content-center mt-2" style="direction: rtl;">
            <a href="#stoneCarousel" class="nav-link text-dark fw-bold" role="button" data-bs-slide-to="0" onclick="setDirectionTemperary('rtl')">فارسی</a>
            <a href="#stoneCarousel" class="nav-link text-dark fw-bold" role="button" data-bs-slide-to="1" onclick="setDirectionTemperary('ltr')">English</a>
          </div>
  
          <div id="stoneCarousel" class="carousel slide bg-transparent" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner">
              <!-- Farsi Page -->
              <div class="carousel-item active bg-transparent" id="farsi-page">
                <div class="container bg-transparent">
                  <div class="form-floating mb-3">
                    <input type="text" name="name_fa" value="{{ $stone->name_fa }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">نام</label>
                    @error('name_fa')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="tensile_strength_fa" value="{{ $stone->tensile_strength_fa }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">استحکام کششی</label>
                    @error('tensile_strength_fa')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="water_absorption_rate_fa" value="{{ $stone->water_absorption_rate_fa }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">نرخ جذب آب</label>
                    @error('water_absorption_rate_fa')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="compressive_strength_fa" value="{{ $stone->compressive_strength_fa }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">استحکام فشاری</label>
                    @error('compressive_strength_fa')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="abrasion_resistance_fa" value="{{ $stone->abrasion_resistance_fa }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">مقاومت در برابر سایش</label>
                    @error('abrasion_resistance_fa')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="specific_weight_fa" value="{{ $stone->specific_weight_fa }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">وزن مخصوص</label>
                    @error('specific_weight_fa')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="failure_mode_fa" value="{{ $stone->failure_mode_fa }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">حالت شکست</label>
                    @error('failure_mode_fa')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="porosity_fa" value="{{ $stone->porosity_fa }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">تخلخل</label>
                    @error('porosity_fa')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
  
              <!-- English Page -->
              <div class="carousel-item bg-transparent" id="english-page">
                <div class="container bg-transparent">
                  <div class="form-floating mb-3">
                    <input type="text" name="name_en" value="{{ $stone->name_en }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">Name</label>
                    @error('name_en')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="tensile_strength_en" value="{{ $stone->tensile_strength_en }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">Tensile Strength</label>
                    @error('tensile_strength_en')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="water_absorption_rate_en" value="{{ $stone->water_absorption_rate_en }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">Water Absorption Rate</label>
                    @error('water_absorption_rate_en')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="compressive_strength_en" value="{{ $stone->compressive_strength_en }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">Compressive Strength</label>
                    @error('compressive_strength_en')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="abrasion_resistance_en" value="{{ $stone->abrasion_resistance_en }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">Abrasion Resistance</label>
                    @error('abrasion_resistance_en')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="specific_weight_en" value="{{ $stone->specific_weight_en }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">Specific Weight</label>
                    @error('specific_weight_en')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="failure_mode_en" value="{{ $stone->failure_mode_en }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">Failure Mode</label>
                    @error('failure_mode_en')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
  
                  <div class="form-floating mb-3">
                    <input type="text" name="porosity_en" value="{{ $stone->porosity_en }}" class="form-control" id="floatingInput">
                    <label for="floatingInput">Porosity</label>
                    @error('porosity_en')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
  
          <select name="stone_type_id" class="form-select my-3" aria-label="Default select example">
            @foreach ($stoneTypes as $stoneType)
              <option value="{{ $stoneType->id }}" {{ $stoneType->id == $stone->stone_type_id ? 'selected' : '' }}>
                {{ $stoneType['name_'. app()->getLocale()] }}
              </option>
            @endforeach
          </select>
  
          <div class="form-floating mb-3">
            <input type="text" name="code" value="{{ $stone->code }}" class="form-control" id="floatingInput">
            <label for="floatingInput">code</label>
            @error('code')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          
          <div class="form-check form-switch my-4 h4">
            <input type="hidden" name="bestselling" value="0" />
            <input 
              class="form-check-input" 
              name="bestselling" 
              value="1" 
              type="checkbox" 
              role="switch" 
              id="switchCheckDefault"
              {{ $stone->bestselling ? 'checked' : 0 }} 
            />
            <label class="form-check-label" for="switchCheckDefault">{{ __('messages.bestselling') }}</label>
          </div>
          
          
          
          <x-image-uploader :image="$stone->image" />
  
          <button type="submit" class="btn main-btn-color text-light mt-3 w-100">{{ __('messages.submit') }}</button>
        </form>
      </div>
        </div>
      </div>
    </x-admin-dashboard>
  </x-layout>
  