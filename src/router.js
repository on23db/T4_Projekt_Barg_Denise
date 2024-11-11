// src/router.js
import { createRouter, createWebHistory } from 'vue-router';
import Home from './views/Home.vue';
import Placeholder from './views/Placeholder.vue';
import Dashboard from './views/Dashboard.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard,
  },
  {
    path: '/placeholder',
    name: 'Placeholder',
    component: Placeholder,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
