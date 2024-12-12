<x-layout>
  <x-admin-dashboard>
  <div class="container my-5">
    <form method="POST" action="/articles" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <div class="col-md-6">
        <x-image-uploader :image="null"/>
          </div>
          <div class="col-md-6 my-4">
            <div class="form-floating mb-3">
              <input type="text" name="title" value="{{old('title')}}" class="form-control" id="floatingInput" >
              <label for="floatingInput">Title</label>
              @error('title')
              <p class="text-danger">{{$message}}</p>
          @enderror
            </div>
      
            
            <div class="form-floating mb-3">
              <input type="text" name="summary" value="{{old('summary')}}" class="form-control" id="floatingInput" >
              <label for="floatingInput">summary</label>
              @error('summary')
              <p class="text-danger">{{$message}}</p>
          @enderror
            </div>
      
            <div class="form-floating mb-3">
              <input type="text" name="content" value="{{old('content')}}" class="form-control" id="floatingInput" >
              <label for="floatingInput">content</label>
              @error('content')
              <p class="text-danger">{{$message}}</p>
          @enderror
            </div>
      
      
      
            <div class="form-floating mb-3">
              <input type="text" name="tags" value="{{old('tags')}}" class="form-control" id="floatingInput" >
              <label for="floatingInput">Tags(sharp Seperated)</label>
              @error('tags')
              <p class="text-danger">{{$message}}</p>
          @enderror
            </div>
      
            <button type="submit" class="btn main-btn-color text-light mt-3 w-100">Submit The Form</button>
          </div>
        </div>
     
     
    </form>
  </div>
  </x-admin-dashboard>
</x-layout>