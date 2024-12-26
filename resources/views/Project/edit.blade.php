<x-layout>
    <x-admin-dashboard>
  <div class="container my-5">
      <form method="POST" action="/projects/{{$project->id}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

       
             
                
  
                  <div class="form-floating mb-3">
                      <input type="text" name="title" value="{{ old('title', $project->title) }}" class="form-control" id="floatingInput">
                      <label for="floatingInput">Title</label>
                      @error('title')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-floating mb-3">
                      <input type="text" name="summary" value="{{ old('summary', $project->summary) }}" class="form-control" id="floatingInput">
                      <label for="floatingInput">Summary</label>
                      @error('summary')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>

                

                  <div class="form-floating mb-3">
                      <input type="text" name="tags" value="{{ old('tags', $project->tags) }}" class="form-control" id="floatingInput">
                      <label for="floatingInput">Tags</label>
                      @error('tags')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>

                  <select name="project_type_id" class="form-select my-3" aria-label="Default select example">
                      <option selected value="{{ $project->projectType->id }}">{{ $project->projectType->name }}</option>
                      @foreach ($projectTypes as $projectType)
                          <option value="{{ $projectType->id }}">{{ $projectType->name }}</option>
                      @endforeach
                  </select>
            
                  <x-text-editor :description="$project->description"/>
          
                  <x-multiple-image-uploader :images="$project->images"/>
          <button type="submit" class="btn main-btn-color text-light mt-3 w-100">Update</button>
      </form>
  </div>
    </x-admin-dashboard>
</x-layout>
