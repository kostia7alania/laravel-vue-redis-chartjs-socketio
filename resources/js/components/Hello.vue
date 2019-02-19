<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">ТАБЛИЦА</div>

                    <div class="card-body">
                  
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>URL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="e in urldata" :key="e.url">
                                    <td>{{ e.title }}</td>
                                    <td>{{e.url}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div> 
    </div>
</template>

<script>  
    export default {  
        props: {
            urldata:{
                type: Array,
                default: ()=>[1,2,3]
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.m(this.urldata)
        },
        methods: {
            m (d) {
                console.log('=>',d);
                console.log('=>',d);
                console.log('=>',d);
                console.log('=>',d);
            }
        }
    }
</script>
