var categories = [];
var barSeries = [];
var pieSeries = [];
var loadBarChart = function() {
    $.get(
        'statistics/bencana',
        {'type' : 'korban'},
        function (data) {
            categories = data.categories;
            barSeries = data.series;
            drawBarChart();
        }
    );
}

var loadPieChart = function() {
    $.get(
        'statistics/bencana',
        {'type' : 'kerugian'},
        function (data) {
            categories = data.categories;
            pieSeries = data.series;
            drawPieChart();
        }
    );
}

var loadChart = function() {
    loadBarChart();
    loadPieChart();
}

var drawBarChart = function() {
    $('#barchart').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Korban Bencana'
        },
        xAxis: {
            categories: categories
        },
        yAxis: {
            title: {
                text: 'Korban'
            }
        },
        series: barSeries
    });
};

var drawPieChart = function() {
    $('#piechart').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Total Kerugian Bencana'
        },
        xAxis: {
            categories: categories
        },
        yAxis: {
            title: {
                text: 'Kerugian (Rp)'
            }
        },
        series: pieSeries
    });
};

loadChart();