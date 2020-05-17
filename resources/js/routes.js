import Dashboard from './components/DashboardComponent';
import Settings from './components/SettingsComponent';

export const routes = [
    {
        path: '/',
        redirect: '/dashboard',
    },
    {
        path: '/dashboard',
        component: Dashboard,
    },
    {
        path: '/settings',
        component: Settings,
    }
];
