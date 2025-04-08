import './bootstrap';
import { createApp, h} from 'vue';
import {createInertiaApp} from "@inertiajs/vue3";
import {resolvePageComponent} from "laravel-vite-plugin/inertia-helpers";
import {ZiggyVue} from "../../vendor/tightenco/ziggy/dist/index.js";
import {Ziggy} from "./ziggy.js";


const app = createApp({});
import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);
app.mount('#app');

//CO
const sectionIndication = createApp({});
import StatisticComponent from "./components/co/StatisticComponent.vue";
import TableComponent from "./components/co/TableComponent.vue";
sectionIndication.component('stat-comp', StatisticComponent);
sectionIndication.component('table-comp', TableComponent);
sectionIndication.mount('#section-indication')

//testWs
import MessageComponent from "./components/testWs/MessageComponent.vue";
const testWs = createApp({}).component('test-ws', MessageComponent).mount('#testWs')
import SendMessageComponent from "./components/testWs/SendMessageComponent.vue";
const testWs2 = createApp({}).component('test-ws2', SendMessageComponent).mount('#testWs2');

createInertiaApp({
    resolve: (name) => {
        const path = `./Pages/${name}.vue`;
        console.log(`Trying to resolve: ${path}`);
        console.log(`Current module URL: ${import.meta.url}`);
        return resolvePageComponent(path, import.meta.glob('./Pages/**/*.vue'));
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});
