import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginVue from '../components/LoginVue.vue'
import RegisterVue from '../components/RegisterVue.vue'
import AddStudent from '../components/AddStudent.vue'
import UpdateStudent from '../components/UpdateStudent.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/login',
    name: 'LoginVue',
    component: LoginVue
  },
  {
    path: '/register',
    name: 'RegisterVue',
    component: RegisterVue
  },
  {
    path: '/addstudent',
    name: 'AddStudent',
    component: AddStudent
  },
  {
    path: '/updatestudent',
    name: 'UpdateStudent',
    component: UpdateStudent
  }

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router