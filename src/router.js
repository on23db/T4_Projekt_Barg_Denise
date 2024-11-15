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
    meta: { requiresAuth: true }, // Meta-Information für Authentifizierung
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

// Prüfung ob Nutzer eingeloggt ist, bevor er auf geschützte Routen zugreifen kann (Dashboard)
router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth) {
    // Prüft, ob der Nutzer eingeloggt ist
    const isAuthenticated = !!document.cookie.includes('PHPSESSID');

    if (!isAuthenticated) {
      // Wenn nicht eingeloggt, leitet es zur Startseite  weiter
      next({ name: 'Home' });
    } else {
      // Ansonten weiterleiten
      next();
    }
  } else {
    // Für Routen ohne `requiresAuth` einfach weiterleiten
    next();
  }
});

export default router;
