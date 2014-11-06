<!DOCTYPE html>
<html>
  <head>
    <title>SI Tanggap Bencana</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNxaY9Ne4K6v9R7TDO3fZ4ol-p6dAW05A">
    </script>
    <script>
        var map;
        function initialize() {
          var mapOptions = {
            zoom: 5,
            center: new google.maps.LatLng(-3.1750, 115.8283)
          };
          map = new google.maps.Map(document.getElementById('map-canvas'),
              mapOptions);
            // Sender ID, Description, Picture File Name, Latitude, Longitude
            var locations = [
                @foreach($disasters as $disaster)
                    ["{{$disaster->name}}",'{{DisasterCategory::find($disaster->disaster_category_id)->name}}','{{$disaster->start}}',{{$disaster->latitude}},{{$disaster->longitude}},{{$disaster->id}},"{{$disaster->status}}"],
                @endforeach
            ];
          
            for (var i = 0; i < locations.length; i++) {
              
                  var infowindow = new google.maps.InfoWindow({
                      maxWidth: 320 
                  });

                  var marker = new google.maps.Marker({
                      position: new google.maps.LatLng(locations[i][3],locations[i][4]),
                      map: map,
                      title: "By "+locations[i][0]
                  });
                  var updateStatus = "updatestatus/"+locations[i][5];
                  google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                      infowindow.setContent('<div id="content">'+
                  '<div id="siteNotice">'+
                  '</div>'+
                    '<h1 id="firstHeading" class="firstHeading">By '+locations[i][0]+'</h1>'+
                    '<div id="bodyContent">'+
                        '<img src="'+locations[i][2]+'"/>'+
                        '<form method="POST" action="{{url("updatestatus")}}/'+locations[i][5]+'">'+
                            '<label>Oleh:'+locations[i][0]+'</label><br>'+
                            '<label>'+locations[i][1]+'</label><br>'+
                            '<label>Current Status : '+locations[i][6]+'</label><br>'+
                            '{{Form::label("Update Status Report :")}}'+
                            '{{Form::select("newstatus",array(0=>"Belum direspon",1=>"Ditunda",2=>"Sedang Dikerjakan", 3=>"Selesai", 4=>"Tidak Layak",5=>"SPAM"),["class"=>"form_control"])}}<br>'+
                            '{{Form::submit("Update", array("class"=>"btn btn-info"))}}'+
                        '{{Form::close()}}'+
                    '</div>'+
                  '</div>');
                      infowindow.open(map, marker);
                    }
                  })(marker, i));
            }
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>