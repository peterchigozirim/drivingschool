require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

// toast notification
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

// font awsome
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faBars, faCartPlus, faGear, faHouse, faListCheck, faRocket, faSearch, faTimes, faTrash, faUserGear, faUserPlus, faUsers, faWrench } from '@fortawesome/free-solid-svg-icons'
import { faEye, faTrashCan } from '@fortawesome/free-regular-svg-icons';
// import {  } from '@fortawesome/free-brands-svg-icons';



library.add(faSearch, faCartPlus, faBars, faTimes, faEye, faTrashCan, faTrash, faCartPlus, faWrench, faUsers, faRocket, faHouse, faUserPlus, faUserGear, faGear, faListCheck)


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(Toast)
            .component('font-awesome', FontAwesomeIcon)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
