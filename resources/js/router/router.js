import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from './../components/HomeComponent.vue'
import Login from './../components/LoginRegisterComponent.vue'

Vue.use(VueRouter)


const routes = [
    {
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
]

const router = new VueRouter({
    mode: "history",
    routes
})

function loggedIn(){
    return localStorage.getItem("token");
}

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      if (!loggedIn()) {
        router.push({ path: '/test'});
      } else {
        next()
      }
    } else if ( to.matched.some(record => record.meta.guest) ){
        if (loggedIn()) {
            router.push({ path: '/testhome'});
        } else {
            next()
        }
    } else{
        next() // make sure to always call next()!
    }
  })

export default router;
