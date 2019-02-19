<template>
  <div class="container">
    <button class="btn btn-primary btn-xs text mt-1 mh-10" @click="getHandler">Обновить</button>

    <div class="row">
      <div class="col-sm-6">
      <h2>TEST</h2>
        <line-chart
          :chart-data="chart_data"
          :height="333"
          :options="{responsive: false, maintainAspectRation: true}"
        />
      </div> 
    </div>
    
    <div class="row">
      
      <div class="col-sm-6">
      <input type="checkbox" v-model="realtime">  realtime
      <input type="text" v-model="label">
      <input type="text" v-model="sale">
    </div>


      <div class="col-sm-6">
    <button class="btn btn-primary btn-xs text mt-1 mh-100" @click="sendData">SendData</button>
    </div>


    </div>
  </div>
</template>
<script>
import { line, pie } from "./LineChart.js";

export default {
  components: { "line-chart": line, "pie-chart": pie },
  data: function() {
    return {
      chart_data: [],
      realtime: false,
      label:'',
      sale: 500
    };
  },
  mounted() {
    var socket = io('http://localhost:3000');
    let that = this;
    socket.on('news-action:App\\Events\\NewEvent', function(data){
      console.log('** * * socket!!')
      that.chart_data = data.result;
    });
    console.log("Component mounted.");
  },
  methods: {
    sendData(){
      axios({
        method:'get',
        url: '/start/socket-chart',
        params: { label:this.label, sale: this.sale, realtime: this.realtime }
      }).then ( e => this.chart_data = e.data );
    },
    getHandler() {
      axios.get("/start/socket-chart").then(res => {
        let e = res.data;
        e.datasets[0].data = e.datasets[0].data.map(
          e => (e = (Math.random() * 100).toFixed(0))
        );
        this.chart_data = e;
      }); 
    }
  }
};
</script>
