<template>
    <div>
        <div class="card">
            <div class="card-header">History</div>
            <div class="card-body">

                <table class="responsive-table">
                    <thead>
                    <tr>
                        <th>Domain Name</th>
                        <th>Key world</th>
                        <th>Position</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, i) in getHistory" :key="i">
                        <td>{{ item.domain_name}}</td>
                        <td>{{ item.key_world}}</td>
                        <td>{{ item.position}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="collection">
                <button class="waves-effect waves-light btn"
                        :disabled="pageNumber === 0"
                        @click="prevPage">
                    Previous
                </button>
                <button class="waves-effect waves-light btn"
                        :disabled="pageNumber >= pageCount -1"
                        @click="nextPage">
                    Next
                </button>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: 'History',
        data: function() {
            return {
                history: [],
	            pageNumber: 0
            }
        },
        computed: {
            pageCount(){
                let l = this.history.length,
                s = 10;
                return Math.ceil(l/s);
            },
            getHistory(){
                const start = this.pageNumber * 10,
                end = start + 10;
                return this.history.slice(start, end);
            }
        },
        methods: {
        fetchData() {
            let vm = this;
                axios
                    .get('/api/history')
                    .then(response => {
                    vm.history = response.data.history;
                    });
            },
            nextPage(){
                this.pageNumber++;
            },
            prevPage(){
                this.pageNumber--;
            }
        },
        created ()
        {
            this.fetchData();
        },
        mounted()
        {
            console.dir(this.history)
        },
    }
</script>
