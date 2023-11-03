window.content = createApp("#content", {
  data() {
    return {
      leadDialogVisible: false,
      contractUrl: window.contract_url,
      lead: {
        email: "",
        whatsapp: "",
        social_name: "",
      },
    };
  },
  mounted() {
    this.initTyped();
    this.initSwiperCorporate();
  },
  methods: {
    submitLead() {
      fetch("/wp-json/api/register_leads", {
        method: "POST",
        headers: {
          accept: "application/json",
          "content-type": "application/json",
        },
        body: JSON.stringify(this.lead),
      })
        .then((response) => response.json())
        .then((data) => {
          window.location.href = `${this.contractUrl}?email=${data.email}`;
        });
    },
    makeMask(index, mask) {
      const content = eval(`this.${index}`);
      const val = this.formatValueWithMask(content, mask);
      eval(`this.${index} = '${val}'`);
    },
    formatValueWithMask(value, mask) {
      value = value.replace(/\D/g, "");
      let formattedValue = "";
      value = String(value);
      let valueIndex = 0;
      for (let i = 0; i < mask.length; i++) {
        if (mask.charAt(i) === "#") {
          if (valueIndex < value.length) {
            formattedValue += value.charAt(valueIndex);
            valueIndex++;
          } else {
            break;
          }
        } else {
          formattedValue += mask.charAt(i);
        }
      }
      return formattedValue;
    },
    goTo(page) {
      window.location.href = page;
    },
    initTyped() {
      const items = (
        document.querySelector("#typed-banner-1").getAttribute("content") || ""
      ).split(",");
      new Typed("#typed-banner-1", {
        strings: items,
        typeSpeed: 50,
        loop: true,
      });
    },
    getCorporateSwipperConfig(mobile = 3, desktop = 5) {
      const randongTime = Math.floor(Math.random() * (4000 - 2000 + 1)) + 2000;
      const config = {
        slidesPerView: mobile,
        direction: "horizontal",
        loop: true,
        autoplay: {
          delay: randongTime,
          disableOnInteraction: false,
        },
        breakpoints: {
          950: {
            slidesPerView: desktop,
          },
        },
      };
      return config;
    },
    initSwiperCorporate() {
      new Swiper(
        ".swiper-corporate .swiper-1",
        this.getCorporateSwipperConfig()
      );
      new Swiper(
        ".swiper-corporate .swiper-2",
        this.getCorporateSwipperConfig()
      );
      new Swiper(".swiper-testimonails .swiper-3", {
        autoplay: {
          delay: 5000,
        },
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
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
    },
  },
});
