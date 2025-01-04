<x-layout>
  <x-admin-dashboard>
    <div class="container my-5">
      <div class="d-flex justify-content-center mt-2" style="direction: rtl;">
        <a href="#myCarousel" class="nav-link text-dark fw-bold" role="button" data-bs-slide-to="0" onclick="setDirectionTemperary('rtl')">فارسی</a>
        <a href="#myCarousel" class="nav-link text-dark fw-bold" role="button" data-bs-slide-to="1" onclick="setDirectionTemperary('ltr')">English</a>
      </div>

      <div id="myCarousel" class="carousel slide bg-transparent" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-inner">
          <div class="carousel-item active bg-transparent" id="farsi-page">
            <div class="container bg-transparent">
              <!-- Page 1 content here (Farsi Input) -->
              <form method="POST" action="/articles/{{$article->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-floating mb-3">
                  <input type="text" name="title_fa" value="{{$article->title_fa}}" class="form-control" id="floatingInput">
                  <label for="floatingInput">عنوان</label>
                  @error('title_fa')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="form-floating mb-3">
                  <input type="text" name="summary_fa" value="{{$article->summary_fa}}" class="form-control" id="floatingInput">
                  <label for="floatingInput">خلاصه</label>
                  @error('summary_fa')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <x-text-editor :description="$article->description_fa" :inputName="'description_fa'" />
             
            </div>
          </div>
          <div class="carousel-item bg-transparent" id="english-page">
            <div class="container bg-transparent">
              <!-- Page 2 content here (English Input) -->
              <div class="form-floating mb-3">
                <input type="text" name="title_en" value="{{$article->title_en}}" class="form-control" id="floatingInput">
                <label for="floatingInput">Title</label>
                @error('title_en')
                <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <div class="form-floating mb-3">
                <input type="text" name="summary_en" value="{{$article->summary_en}}" class="form-control" id="floatingInput">
                <label for="floatingInput">summary</label>
                @error('summary_en')
                <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <x-text-editor :description="$article->description_en" :inputName="'description_en'" />
            </div>
          </div>
        </div>
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="tags" value="{{$article->tags}}" class="form-control" id="floatingInput">
        <label for="floatingInput">{{__('messages.tags')}}</label>
        @error('tags')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>

      <x-multiple-image-uploader :images="$article->images" />

      <button type="submit" class="btn main-btn-color text-light mt-3 w-100">{{__('messages.submit')}}</button>
    </form>
    </div>
  </x-admin-dashboard>
</x-layout>


