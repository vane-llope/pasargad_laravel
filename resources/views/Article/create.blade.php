<x-layout>
  <x-admin-dashboard>
  <div class="container my-5">
    <form method="POST" action="/articles" enctype="multipart/form-data">
        @csrf

          
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
              <input type="text" name="tags" value="{{old('tags')}}" class="form-control" id="floatingInput" >
              <label for="floatingInput">Tags(sharp Seperated)</label>
              @error('tags')
              <p class="text-danger">{{$message}}</p>
          @enderror
            </div>
      

            <x-text-editor :description="null" />
        <x-multiple-image-uploader :images="null"/>
            <button type="submit" class="btn main-btn-color text-light mt-3 w-100">Submit The Form</button>
        
    
     
     
    </form>
  </div>
  </x-admin-dashboard>
</x-layout>