<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <router-link to="/">Home</router-link>

                    <div class="card-body">
                        I'm an example component.1221
                        {{history}}
                        {{example}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['history', 'example'],
        mounted() {
            console.dir(this.history)
            console.dir(this.example)
        }
    }
</script>
