
    /* globals Chart:false, feather:false */

(function () {
'use strict'

feather.replace()

// Graphs
var ctx = document.getElementById('weight')
// eslint-disable-next-line no-unused-vars
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
    labels: window.dates,
    datasets: [{
        data: window.weights,
        lineTension: 0.3,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
    }]
    },
    options: {
    scales: {
        yAxes: [{
        ticks: {
            beginAtZero: true
        }
        }]
    },
    legend: {
        display: false
    }
    }
})
}())