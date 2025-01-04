<x-layout>
  <x-admin-dashboard>
  <div class="container my-5">
    @include('partials._setLanguage')
    <form method="POST" action="/projects" enctype="multipart/form-data">
        @csrf
      <div class="form-floating mb-3">
        <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="floatingInput">
        <label for="floatingInput">title</label>
        @error('title')
        <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="form-floating mb-3">
        <input type="text" name="summary" value="{{ old('summary') }}" class="form-control" id="floatingInput">
        <label for="floatingInput">summary</label>
        @error('summary')
        <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="form-floating mb-3">
        <input type="text" name="tags" value="{{ old('tags') }}" class="form-control" id="floatingInput">
        <label for="floatingInput">tags</label>
        @error('tags')
        <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <select name="project_type_id" class="form-select my-3" aria-label="Default select example"> 
        <option value="" disabled selected>Open this select menu</option> <!-- Placeholder option --> 
        @foreach ($projectTypes as $projectType) 
        <option value="{{ $projectType->id }}" {{ old('project_type_id') == $projectType->id ? 'selected' : '' }}>
          {{ $projectType->name }}</option> 
          @endforeach
         </select> 
         @error('project_type_id')
          <p class="text-danger">{{ $message }}</p>
           @enderror
      
      <x-text-editor :description="null" />
      <x-multiple-image-uploader :images="null" />
      <button type="submit" class="btn main-btn-color text-light mt-3 w-100">Submit The Form</button>
    </form>
  </div>
  </x-admin-dashboard>
</x-layout>






