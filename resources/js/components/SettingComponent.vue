<template>
    <div>
        <div class="card">
            <div class="card-header">Setting</div>

            <div class="card-body">
                I'm an setting component.
            </div>
            <div class="collection">
                <router-link class="collection-item"  to="/history">History</router-link>
                <router-link class="collection-item"  to="/">Home</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
