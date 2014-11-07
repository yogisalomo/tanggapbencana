// create dataset
var data = [];
var names = ["Lorem", "Ipsum", "Dolor", "Sit", "Amet", "Consectetur", "Adipisicing", "elit", "Eiusmod tempor", "Incididunt"];
var endTime = Date.now();
var month = 30 * 24 * 60 * 60 * 1000;
var startTime = endTime - 6 * month;
function createEvent (name, maxNbEvents) {
    maxNbEvents = maxNbEvents | 100;
    var event = {
        name: name,
        info: []
    };
    // add up to 200 events
    var max =  Math.floor(Math.random() * maxNbEvents);
    for (var j = 0; j < max; j++) {
        var time = (Math.random() * (endTime - startTime)) + startTime;
        event.info.push({ size: Math.random() * 25, dates: new Date(time) });
    }
    return event;
}
for (var i = 0; i < 10; i++) {
    data.push(createEvent(names[i]));
}

// create chart function
var eventDropsChart = d3.chart.eventDrops()
    .start(new Date(startTime))
    .end(new Date(endTime));

// bind data with DOM
var body = document.getElementsByTagName('body')[0];
var element = d3.select(body).append('div').datum(data);

// draw the chart
eventDropsChart(element);