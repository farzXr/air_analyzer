import './bootstrap';
import { createApp } from 'vue';

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

