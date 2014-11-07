// create dataset
var timelineData = [];
var eventList = [];
var loadTimelineChart = function() {
    $.get(
        'statistics/timeline',
        { },
        function (data) {
            timelineData = data;
            drawTimeline();
        }
    );
}

function createEvents () {
    for (var i = 0; i < timelineData.length; i++) {
        var index = -1;
        // get element index
        for (var j = 0; j < eventList.length; j++) {
            if (timelineData[i].Kejadian == eventList[j].name) {
                index = j;
                break;
            }
        };
        // not found
        if (index == -1) {
            var event = {
                name: timelineData[i].Kejadian,
                info: []
            };
            event.info.push({ size: timelineData[i].Meninggal/1000, dates: new Date(timelineData[i].Tanggal) });
            eventList.push(event);
        } else {
            eventList[index].info.push({ size: timelineData[i].Meninggal/1000, dates: new Date(timelineData[i].Tanggal) });
        }

    }
}

// function createEvent (name, maxNbEvents) {
//     maxNbEvents = maxNbEvents | 100;
//     var event = {
//         name: name,
//         info: []
//     };
//     // add up to 200 events
//     var max =  Math.floor(Math.random() * maxNbEvents);
//     for (var j = 0; j < max; j++) {
//         var time = (Math.random() * (endTime - startTime)) + startTime;
//         event.info.push({ size: Math.random() * 25, dates: new Date(time) });
//     }
//     return event;
// }

var drawTimeline = function() {
    createEvents();
    // create chart function (hardcode)
    var eventDropsChart = d3.chart.eventDrops()
        .start(new Date('1815/4/10'))
        .end(new Date(Date.now()));

    // bind data with DOM
    var body = document.getElementById('timeline');
    var element = d3.select(body).append('div').datum(eventList);

    // draw the chart
    eventDropsChart(element);
}

loadTimelineChart();