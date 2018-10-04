import Films from './views/Film/Films'
import ShowFilm from './views/Film/ShowFilm'
import AddFilm from './views/Film/AddFilm'
import Home from './views/Home'
import Login from './views/Login'
import Register from './views/Register'

export default [
    {
        path: '/login',
        name: 'login',
        component: Login,
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
    },
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/films',
        name: 'films',
        component: Films,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/films/create',
        name: 'addFilm',
        component: AddFilm,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/films/:slug',
        name: 'showFilm',
        component: ShowFilm,
        meta: {
            requiresAuth: false
        }
    },
]