window.corporateAPP = createApp("#corporate", {
    data() {
        return {
            topbar : {
                mobile_box_visible : 'company',
            },
            slider_testimonial : {
                total : 0,
                pos:0
            }
        }
    },
    mounted() {
        this.initTestimonialSlider()
    },
    methods : {
        initTestimonialSlider(){
            this.slider_testimonial.total = (document.querySelectorAll("#slider-testimonial .slider-testimonial-content")?.length || 0);
        },
        getMenuTobarBoxVisible(value) {
            return this.topbar.mobile_box_visible == value ? 'visible' : 'hidden';
        },
        selectTopBarnnerTab(value) {
            this.topbar.mobile_box_visible = value;
        },
        setTestimonialSliderPos(value) {
            this.slider_testimonial.pos = value;
        },
        setTestimonialSliderNext() {
            if(this.slider_testimonial.pos < this.slider_testimonial.total -1) {
                this.slider_testimonial.pos++;
            }
        },
        setTestimonialSliderPrev() {
            if(this.slider_testimonial.pos > 0) {
                this.slider_testimonial.pos--;
            }
        }
    }
})