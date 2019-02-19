 // MonthlyIncome.js
import { Line, mixins, Pie } from 'vue-chartjs'
 
export const pie =  {
  extends: Pie,//Line,
  mixins: [mixins.reactiveProp],
  props: ['chartData', 'options'],
  mounted () {
    this.renderChart(this.chartData, this.options)
  }
}
 
 
export const line =  {
  extends: Line,
  mixins: [mixins.reactiveProp],
  props: ['chartData', 'options'],
  mounted () {
    this.renderChart(this.chartData, this.options)
  }
}
 
