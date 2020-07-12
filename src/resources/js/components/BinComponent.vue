<template>
    <div>
        <div v-for="item in data.binItems.reverse()" class="card my-2">
            <div class="card-header d-flex">
                {{item.method}} {{ item.url }}
                <div class="ml-auto">{{ item.date | formatDate }}</div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-sm">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col">key</th>
                                <th scope="col">value</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(Arrvalue, key) in item.header">
                                <th scope="row">{{key}}</th>
                                <th v-for="value in Arrvalue">
                                    {{ value.substring(0, 25) }}
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm">
                        {{ item.content }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                data: {
                    binItems: [],
                },
            }
        },
        mounted() {
            self = this;
            console.log('Component mounted.');
            this.token = document.head.querySelector("[name=csrf-token]").content;
            this.id = document.getElementById("uuid").value;
            this.getDB();

            console.log('Setup listener.');
            Echo.channel('binitem').listen('.binitem.added', function(cdata) {
                console.log(cdata);
                self.data.binItems.push(cdata.binItem);
            });
        },
        methods: {
            getDB () {
                let data = {};
                data.url = '/api/get-bin-items/' + this.id;
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
