<template>
    <div id="app">
        <nav>
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">Logo</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li> <router-link :to="{name: 'Home'}">Home</router-link></li>
                    <li><router-link :to="{ name: 'History'}">History</router-link></li>
                    <li><router-link  to="/setting">Setting parser</router-link></li>
                    <li><router-link  :to="{ name: 'Example' }">Example</router-link></li>
                </ul>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        mounted ()
        {
            console.dir(this.history)
        },
    }
</script>