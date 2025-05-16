import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import 'vite/modulepreload-polyfill'; // Optional, helps Vite with module preloading

createApp(App)
  .use(router)
  .mount('#app');

