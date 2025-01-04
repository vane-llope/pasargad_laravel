<x-layout>
  <x-admin-dashboard>
  <div class="container">
    <div class="card">
      <div class="card-body bg-light">
    <form method="POST" action="/projectTypes">
        @csrf
   
      <div class="form-floating mb-3">
        <input type="text" name="name_fa" value="{{old('name_fa')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">نام - فارسی</label>
        @error('name_fa')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="name_en" value="{{old('name_en')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">name _ English</label>
        @error('name_en')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>


      <button type="submit" class="btn main-btn-color text-light mt-3 w-100">{{__('messages.submit')}} </button>
    </form>
  </div>
    </div>
  </div>
  </x-admin-dashboard>
</x-layout>