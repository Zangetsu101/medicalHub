
    /* globals Chart:false, feather:false */

(function () {
'use strict'

feather.replace()

// Graphs
var ctx = document.getElementById('bp')
// eslint-disable-next-line no-unused-vars
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
    labels: window.dates,
    datasets: [{
        data: window.bp_low,
        label: 'BP_Low',
        lineTension: 0.3,
        backgroundColor: 'transparent',
        borderColor: '#19d435',
        borderWidth: 4,
        pointBackgroundColor: '#19d435'
    },
    {
        data: window.bp_high,
        label: 'BP_High',
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
        display: true
    }
    }
})
}())