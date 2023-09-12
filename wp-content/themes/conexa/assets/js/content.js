window.content = createApp("#content", {
    mounted() {
        this.initTyped()
        this.initSwiperCorporate()
    },
    methods:{
        goTo(page) {
            window.location.href = page;
        },
        initTyped(){
            const items =  (document.querySelector("#typed-banner-1").getAttribute('content') || '').split(',');
            new Typed("#typed-banner-1", {
                strings: items,
                typeSpeed: 50,
                loop: true,
            });
        },
        getCorporateSwipperConfig(mobile=3, desktop=5) {
            const randongTime = Math.floor(Math.random() * (4000 - 2000 + 1)) + 2000;
            const config = {
                slidesPerView: mobile,
                direction: 'horizontal',
                loop: true,
                autoplay: {
                    delay: randongTime,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    950: {
                      slidesPerView: desktop,
                    },
                }
            }
            return config;
        },
        initSwiperCorporate(){
            new Swiper('.swiper-corporate .swiper-1', this.getCorporateSwipperConfig());
            new Swiper('.swiper-corporate .swiper-2', this.getCorporateSwipperConfig());
            new Swiper('.swiper-testimonails .swiper-3', {
                autoplay: {
                    delay: 5000,
                },
                effect: 'coverflow',
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 'auto',
                coverflowEffect: {
                    rotate: 0,
                    stretch: 80,
                    depth: 200,
                    modifier: 1,
                    slideShadows: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                  navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        }
    }
})