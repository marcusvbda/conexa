window.navbarAndMenu = createApp("#navbar-and-menu", {
    data() {
        return {
            menu: {
                showing: false,
                showing_mobile_item_content: [],
                current_page : ''
            }
        }
    },
    created() {
       this.current_page = document?.querySelector("body")?.getAttribute("id") || "home"
    },
    methods: {
        navbarItemClass(item) {
            const isCurrent = this.current_page == item;
            return isCurrent && 'active';
        },
        toggleMenu() {
            this.menu.showing = !this.menu.showing;
        },
        toggleMobileItemContent(index) {
            if (!this.menu.showing_mobile_item_content.includes(index)) {
                return this.menu.showing_mobile_item_content.push(index);
            } else {
                return this.menu.showing_mobile_item_content = this.menu.showing_mobile_item_content.filter(item => item != index);
            }
        },
    }
})