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

      <div class="col-sm-6">
        <h2>CHART</h2>
        <pie-chart
          :chart-data="chart_data"
          :height="333"
          :options="{responsive: false, maintainAspectRation: true}"
        />
      </div>

      <div class="col-sm-6">
        <h1>GraphQL</h1>
        <line-chart
          :chart-data="random_chart"
          :height="333"
          :options="{responsive: false, maintainAspectRation: true}"
        />
      </div>

      <div class="col-sm-6">
        <h1>DANIL</h1>
        <pie-chart
          :chart-data="random_chart"
          :height="333"
          :options="{responsive: false, maintainAspectRation: true}"
        />
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
      random_chart: []
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    getHandler() {
      axios.get("/start/data-chart").then(res => {
        let e = res.data;
        e.datasets[0].data = e.datasets[0].data.map(
          e => (e = (Math.random() * 100).toFixed(0))
        );
        this.chart_data = e;
      });

      axios.get("/start/random-chart").then(res => {
        let e = res.data;
        e.datasets[0].data = e.datasets[0].data.map(
          e => (e = (Math.random() * 100).toFixed(0))
        );
        e.datasets[1].data = e.datasets[0].data.map(
          e => (e = (Math.random() * 100).toFixed(0))
        );
        this.random_chart = e;
      });
    }
  }
};
</script>
