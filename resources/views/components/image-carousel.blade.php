@props(['images', 'carouselId'])

@php
$imagesArray = json_decode($images, true); 
@endphp
<div id="carousel-{{ $carouselId }}" class="carousel slide mb-2" data-bs-ride="carousel" data-bs-interval="false">
    <div class="carousel-inner">
        @foreach($imagesArray as $index => $image)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img class="w-100" src="{{ asset('storage/'.$image) }}" alt="">
            </div>
        @endforeach
    </div>
    
    <div class="carousel-thumbnails">
        @foreach($imagesArray as $index => $image)
            <img src="{{ asset('storage/'.$image) }}" data-bs-target="#carousel-{{ $carouselId }}" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}">
        @endforeach
    </div>
</div>
