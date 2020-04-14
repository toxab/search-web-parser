import Vue from 'vue'
import Router from 'vue-router'
import HomeComponent from "./components/HomeComponent";
import HistoryComponent from "./components/HistoryComponent";
import SettingComponent from "./components/SettingComponent";
import ExampleComponent from "./components/ExampleComponent";
Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            component:HomeComponent,
            name: 'Home',
            props: true
        },
        {
            path: '/history',
            component: HistoryComponent,
            props: true,
            name: 'History'
        },
        {
            path: '/setting',
            component: SettingComponent
        },
        {
            path: '/example',
            component: ExampleComponent,
            name: 'Example',
            props: true
        },
    ]
})
