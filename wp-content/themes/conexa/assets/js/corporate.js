window.corporateAPP = createApp("#corporate", {
    data() {
        return {
            topbar : {
                mobile_box_visible : 'company'
            }
        }
    },
    methods : {
        getMenuTobarBoxVisible(value) {
            return this.topbar.mobile_box_visible == value ? 'visible' : 'hidden';
        },
        selectTopBarnnerTab(value) {
            this.topbar.mobile_box_visible = value;
        }
    }
})