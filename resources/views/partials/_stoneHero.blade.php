
<div class="swiper-box pt-5" style="direction: ltr">

    <h1 class="my-5 text-light">پرفروش ترین ها</h1>

    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{asset('images/stone/1.jpeg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('images/stone/2.jpeg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('images/stone/3.jpeg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('images/stone/4.jpeg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('images/stone/5.jpeg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('images/stone/6.jpeg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('images/stone/7.jpeg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('images/stone/8.jpeg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('images/stone/9.jpeg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('images/stone/5.jpeg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('images/stone/4.jpeg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('images/stone/6.jpeg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('images/stone/3.jpeg')}}" alt="">
            </div>

            <!-- 15 div -->

        </div>
    </div>
</div>


<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        initialSlide: 3,
        coverflowEffect: {
            rotate: 15,
            stretch: 0,
            depth: 300,
            modifier: 1,
            slideShadows: true,
        }
    });
</script>

<style>
    .swiper-box {
        height: 100vh;
        background-color: #01000c;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }



    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 250px;
    }

    .swiper-slide img {
        display: block;
        height: 80%;
        -webkit-box-reflect: below 1px linear-gradient(transparent, transparent, #0002, #0004);
    }

    @media only screen and (max-width: 768px) {
        .swiper-box {
            height: 80vh;
        }

        .swiper {
            width: 80%;
            height: 100%;
        }

        .swiper-slide img {
            height: 50%;
        }

        .swiper-slide {
            width: 100px;
        }

    }
</style>