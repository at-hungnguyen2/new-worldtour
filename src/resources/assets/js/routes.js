import Vue from 'vue'
import VueRouter from './vue-router';
import Example from './components/Example.vue';

Vue.use(VueRouter);

let routes = [
	{ path: '/example', component: Example},
];

export default new router({
	routes,
	linkActiveClass: 'active'
})