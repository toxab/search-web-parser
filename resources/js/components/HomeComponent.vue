<template>
    <div>
        <div class="card">
            <div class="card-header">Home</div>

            <div class="card-body">
                <div class="row">
                    <form class="col s12" @submit.prevent="onSubmit">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="domain_name" type="text" name="domain_name" v-model="domain_name" class="validate">
                                <label for="domain_name">Domain Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="key_world" type="text" name="key_world" v-model="key_world" class="validate">
                                <label for="key_world">Key world</label>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name:'Home',

        data() {
            return {
                domain_name:'',
                key_world:''
            }
        },
        methods: {
            onSubmit: function () {
                axios.post('/api/search-data', {
                    domain_name:this.domain_name,
                    key_world: this.key_world
                }).then((res) => {
                  console.dir(res.data.position)
                }).catch(() => {
                    console.dir('Error!!!')
                })
            }
        }
    }
</script>
