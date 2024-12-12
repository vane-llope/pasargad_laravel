<x-layout> 
  <x-admin-dashboard>
 <div class="container my-5">
    <form method="POST" action="/articles/{{$article->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
          <div class="col-md-6">
            <x-image-uploader :image="$article->image"/>
          </div>
          <div class="col-md-6 mt-5">

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
          
          </div>
        </div>
           
      <div class="form-floating mb-3">
        <textarea name="content" value="{{$article->content}}" class="form-control" id="floatingInput" style="height: 300px">{{$article->content}} </textarea>
        <label for="floatingInput"> content</label>
        @error('content')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>


      <button type="submit" class="btn main-btn-color text-light mt-3 w-100">Update</button>
    </form>
 </div>
  </x-admin-dashboard>
</x-layout>