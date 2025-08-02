import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.min.css';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue'
import LiveRequestComponent from './../views/components/LiveRequestComponent.vue'

const app = createApp({})
app.component('live-request', LiveRequestComponent)
app.mount('#live-request-app')
