import Vue from 'vue'
import VueRouter from 'vue-router'

/* import Home from './../components/HomeComponent.vue'
import Login from './../components/LoginRegisterComponent.vue'
import CreateService from './../components/CreateServiceComponent.vue' */

Vue.use(VueRouter)


const routes = [
    /* {
        path: "/testhome",
        name: "Home",
        component: Home,
        meta: { requiresAuth: true },
    },
    {
        path: "/test",
        name: "Login",
        component: Login,
        meta: { guest: true },
    },
    {
        path: "/testservice",
        name: "CreateService",
        component: CreateService,
        meta: { requiresAuth: true },
    }, */
]

const router = new VueRouter({
   /*  mode: "history",
    routes */
})

/* function loggedIn(){
    return localStorage.getItem("accessoken");
}

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      if (!loggedIn()) {
        location.href = '/test';
      } else {
        next()
      }
    } else if ( to.matched.some(record => record.meta.guest) ){
        if (loggedIn()) {
            location.href = '/testhome';
        } else {
            next()
        }
    } else{
        next() // make sure to always call next()!
    }
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      if (!loggedIn()) {
        location.href = '/test';
      } else {
        next()
      }
    } else if ( to.matched.some(record => record.meta.guest) ){
        if (loggedIn()) {
            location.href = '/testservice#';
        } else {
            next()
        }
    } else{
        next() // make sure to always call next()!
    }
}) */

export default router;
