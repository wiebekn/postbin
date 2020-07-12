<template>
    <div class="card">
        <div class="card-header">Bins</div>
        <div class="card-body">
            <ul>
                <li v-for="bin in data.bins">
                    <a href="#">{{bin.uuid}}</a>
                </li>
            </ul>

            <button @click="addBin" class="btn btn-primary">Create</button>
        </div>
    </div>
</template>

<script>
    export default {
        // created() {
        //     Echo.channel('binlist').listen('.bin.added', function(data) {
        //        console.log(data);
        //     });
        // },
        mounted() {
            console.log('Component mounted.');
            this.token = document.head.querySelector("[name=csrf-token]").content;
            this.id = document.getElementById("appId").value;
            // Echo.channel('binlist')
            //     .listen('binlist', (e) => {
            //         //this.bins = e.bins;
            //         console.log('up');
            //     })
            this.getDB();
        },
        data: function () {
            return {
                data: {
                    bins: [],
                },
            }
        },
        methods: {
            addBin() {
                console.log('add button');
            },
            getDB () {
                let data = {};
                data.url = '/api/get-bin-list/' + this.id;
                data.json = {};
                data.token = this.token;
                this.xData('POST', data.url, data.json);

            },
            xData (method, url, data) {
                axios.defaults.headers.common['X-CSRF-TOKEN'] = this.token;
                axios({
                    method: method,
                    url: url,
                    data: data
                })
                    .then(response =>{
                        this.data = response.data;
                        console.log("data");
                        //this.render();
                    })
                    .catch(error =>{
                        console.log(error);
                    })
                    .finally(function () {
                        // always executed
                    });
            },
        }
    }
</script>
