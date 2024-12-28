<x-layout> 
  <x-admin-dashboard>
 <div class="container my-5">
    <form method="POST" action="/articles/{{$article->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    

            <div class="form-floating mb-3">
              <input type="text" name="title" value="{{$article->title}}"  class="form-control" id="floatingInput" >
              <label for="floatingInput">Title</label>
              @error('title')
                  <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
    
    
          <div class="form-floating mb-3">
            <input type="text" name="summary" value="{{$article->summary}}" class="form-control" id="floatingInput" >
            <label for="floatingInput">summary </label>
            @error('summary')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          
      <div class="form-floating mb-3">
        <input type="text" name="tags" value="{{$article->tags}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Tags(sharp Seperated)</label>
        @error('tags')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>
          

      <x-text-editor :description="$article->description" />
      <x-multiple-image-uploader :images="$article->images"/>


      <button type="submit" class="btn main-btn-color text-light mt-3 w-100">Update</button>
    </form>
 </div>
  </x-admin-dashboard>
</x-layout>