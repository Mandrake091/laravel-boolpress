import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent.vue';
import AboutComponent from "./pages/AboutComponent.vue";
import PostsComponent from "./pages/PostsComponent.vue";
import SinglePostComponent from "./pages/SinglePostComponent.vue";
import ContactComponent from "./pages/ContactComponent.vue";

const router = new VueRouter({
    mode:'history',
    routes: [
        {
            path: "/",
            name: "home",
            meta: {nome:'Paolo'},
            component: HomeComponent,
        },
        {
            path: "/about",
            name: "about",
            component: AboutComponent,
        },
        {
            path: "/posts",
            name: "posts",
            component: PostsComponent,
        },
        {
            path: "/posts/:slug",
            name: "single-post",
            component: SinglePostComponent,
        },
        {
            path: "/contact",
            name: "contact",
            component: ContactComponent,
        },
    ],
});

export default router;
