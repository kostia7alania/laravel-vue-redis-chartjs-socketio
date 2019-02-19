<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default">
          <div class="card-header title">ТАБЛИЦА</div>

          <div class="card-body">
              <button class="btn btn-primary"  @click="getHandler" v-if="!is_refresh">Обновить - {{id}}...</button>
              <span class="badge badge-primary mb-1" v-if="is_refresh">Обновление...</span>
            <table v-if="urldata.length" class="table">
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
        data:  function(){
            return { 
                urldata: [],
                is_refresh: false,
                id: 0
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{ 
            getHandler(){
                this.is_refresh = true
                this.urldata = []
                axios.get('/start/get-json')
                .then( e => {
                    this.urldata = e.data
                    this.is_refresh = false
                    this.id++
                })
            },
        }
    }
</script>
