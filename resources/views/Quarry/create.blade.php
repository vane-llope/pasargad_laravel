<x-layout>
  <x-admin-dashboard>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-center mt-2" style="direction: rtl;">
            <a href="#myCarousel" class="nav-link text-dark fw-bold" role="button" data-bs-slide-to="0" onclick="setDirectionTemperary('rtl')">فارسی</a>
            <a href="#myCarousel" class="nav-link text-dark fw-bold" role="button" data-bs-slide-to="1" onclick="setDirectionTemperary('ltr')">English</a>
          </div>
          
          <div id="myCarousel" class="carousel slide bg-transparent" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner">
              <div class="carousel-item active bg-transparent" id="farsi-page">
                <div class="container bg-transparent">
                  <!-- Page 1 content here (Farsi Input) -->
                  <form method="POST" action="/quarries" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-floating mb-3">
                      <input type="text" name="name_fa" value="{{old('name_fa')}}" class="form-control" id="floatingInput" >
                      <label for="floatingInput">نام</label>
                      @error('name_fa')
                      <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>

                    <div class="form-floating mb-3">
                      <input type="text" name="address_fa" value="{{old('address_fa')}}" class="form-control" id="floatingInput" >
                      <label for="floatingInput">آدرس</label>
                      @error('address_fa')
                      <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                 
                </div>
              </div>
              <div class="carousel-item bg-transparent" id="english-page">
                <div class="container bg-transparent">
                  <!-- Page 2 content here (English Input) -->
                    @csrf
                    
                    <div class="form-floating mb-3">
                      <input type="text" name="name_en" value="{{old('name_en')}}" class="form-control" id="floatingInput" >
                      <label for="floatingInput">name</label>
                      @error('name_en')
                      <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>

                    <div class="form-floating mb-3">
                      <input type="text" name="address_en" value="{{old('address_en')}}" class="form-control" id="floatingInput" >
                      <label for="floatingInput">address</label>
                      @error('address_en')
                      <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                 
                </div>
              </div>
            </div>
          </div>
          
          <div class="container">
            <select name="stone_type_id" class="form-select mb-3" aria-label="Default select example">
              @foreach ($stoneTypes as $stoneType)
              <option value="{{ $stoneType->id }}">{{ $stoneType['name_'. app()->getLocale()] }}</option>
              @endforeach
            </select>
            @error('stone_type_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            
            <x-multiple-image-uploader :images="null" />
          </div>
          
          <button type="submit" class="btn main-btn-color text-light mt-3 w-100">{{__('messages.submit')}}</button>
        </form>
        </div>
      </div>
    </div>
  </x-admin-dashboard>
</x-layout>
