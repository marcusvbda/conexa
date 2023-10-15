window.corporateAPP = createApp("#operator", {
    data() {
        return {
            topbar : {
                mobile_box_visible : 'company',
            },
            slider_journey : {
                total : 0,
                pos:0
            },
            slider_mental : {
                total : 0,
                pos:0
            }, 
            slider_news : {
                total : 0,
                pos:0
            }
        }
    },
    mounted() {
        this.initJourney()
        this.initSwiperCustomers()
        this.initSwiperMental()
        this.initSwiperNews()
    },
    methods : {
        getCustomerSwipperConfig(mobile=3, desktop=5) {
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
        initSwiperNews(){
            this.slider_news.total = (document.querySelectorAll("#slider-news .slider-content")?.length || 0);
        },
        initSwiperMental(){
            this.slider_mental.total = (document.querySelectorAll("#slider-mental .slider-content")?.length || 0);
        },
        initSwiperCustomers(){
            new Swiper('.swiper-customer .swiper-1', this.getCustomerSwipperConfig());
            new Swiper('.swiper-customer .swiper-2', this.getCustomerSwipperConfig(3,3));
        },
        initJourney(){
            this.slider_journey.total = (document.querySelectorAll("#slider-journey .slider-content")?.length || 0);
        },
        getMenuTobarBoxVisible(value) {
            return this.topbar.mobile_box_visible == value ? 'visible' : 'hidden';
        },
        selectTopBarnnerTab(value) {
            this.topbar.mobile_box_visible = value;
        },
        setMentalliderPos(value) {
            this.slider_mental.pos = value;
        },
        setNewsSliderPos(value) {
            this.slider_news.pos = value;
        },
        setJourneySliderPos(value) {
            this.slider_journey.pos = value;
        },
        setJourneySliderNext() {
            if(this.slider_journey.pos < this.slider_journey.total -1) {
                this.slider_journey.pos++;
            }
        },
        setJourneySliderPrev() {
            if(this.slider_journey.pos > 0) {
                this.slider_journey.pos--;
            }
        },
        setNewsSliderPrev() {
            if(this.slider_news.pos > 0) {
                this.slider_news.pos--;
            }
        },
        setMentalSliderPrev() {
            if(this.slider_mental.pos > 0) {
                this.slider_mental.pos--;
            }
        },
        setMentalSliderNext() {
            if(this.slider_mental.pos < this.slider_mental.total -1) {
                this.slider_mental.pos++;
            }
        },
        setNewsSliderNext() {
            if(this.slider_news.pos < this.slider_news.total -1) {
                this.slider_news.pos++;
            }
        }
    }
})