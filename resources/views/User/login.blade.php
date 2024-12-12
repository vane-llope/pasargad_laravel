<x-layout>
  @include('partials._navbar')
  <div class="space"></div>
<div class="container">
  <div class="row">
    <div class="col-md-6 order-lg-2">
      <img class="w-100" src="{{asset('images/logo.jpg')}}" alt="" srcset="">
    </div>
    <div class="col-md-6 order-lg-1">
      <div class="space d-none d-lg-block"></div>
      <p class="text-center h1 mb-5">PASARGAD</p>
        <form method="POST" action="/user/authenticate">
            @csrf
            <div class="form-floating mb-3">
              <input type="email" name="email" value="{{old('email')}}" class="form-control" id="floatingInput" >
              <label for="floatingInput">ایمیل</label>
              @error('email')
              <p class="text-danger">{{$message}}</p>
          @enderror
            </div>
      
          <div class="form-floating mb-3">
            <input type="password" name="password" value="{{old('password')}}" class="form-control" id="floatingInput" >
            <label for="floatingInput">پسورد</label>
            @error('password')
            <p class="text-danger">{{$message}}</p>
        @enderror
          </div>
          <button type="submit" class="btn main-btn-color text-light mt-3 w-100">Submit The Form</button>
        </form>
        <a class="nav-link text-dark mt-3" href="/projectTypes/manage"><p>رمز عبور خود را فراموش کردید؟<span class="text-danger">کلیک کنید</span></p></a>
    </div>
  </div>
</div>
</x-layout>