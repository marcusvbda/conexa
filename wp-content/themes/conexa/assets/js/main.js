window.createApp = (element,payload) => {
    const app = Vue.createApp(payload);
    app.mount(element);
    window.app = app;
}


window.startWebApp = () => {
    if(window?.webAppStated) {
        return;
    }

    const initDropDowns = () => {
        const closeAll = (e) => {
            if(e.target.closest('.dropdown-content-portal')) {
                return;
            }

            const dropdowns = document.querySelectorAll('.dropdown');
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('opened');
            });

            document.querySelector('.dropdown-content-portal').innerHTML = '';
            document.querySelector('.dropdown-content-portal').classList.remove('showing');
        }

        document.addEventListener("click", (e) => closeAll(e));

        const dropdowns = document.querySelectorAll('.dropdown');

        const openDropdown = (e,dropdown) => {
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('opened');
            });
            e.stopPropagation();
            dropdown.classList.add('opened');
            const content = dropdown.querySelector('.dropdown-content');
            document.querySelector('.dropdown-content-portal').innerHTML = content.innerHTML;
            const portal = document.querySelector('.dropdown-content-portal');
            if(!portal.classList.contains('showing')) {
                const navbar = document.querySelector('.navbar');
                const navbarHeight = navbar.offsetHeight;
                portal.style.top = `${navbarHeight - 6}px`;
                portal.classList.add('showing');
            }
        }
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', (e) => {
                if(e.target.classList.contains('opened')) { 
                    closeAll(e);
                } else {
                    openDropdown(e,dropdown);
                }
            });
        });
    }

    const showHtml = () => {
        const html = document.querySelector('html');
        html.style.visibility = 'visible';
    }

    initDropDowns();
    showHtml();

    window.webAppStated = true;
}

document.addEventListener("DOMContentLoaded", () => startWebApp());