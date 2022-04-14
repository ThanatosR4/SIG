
<!DOCTYPE html>
<html>
  <h1></h1>
<head>
  <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
  <script src="https://cdn.maptiler.com/mapbox-gl-js/v1.13.2/mapbox-gl.js"></script>
  <link href="https://cdn.maptiler.com/mapbox-gl-js/v1.13.2/mapbox-gl.css" rel="stylesheet" />
  <style>
    #map {position: absolute; top: 0; right: 0; bottom: 0; left: 0;}
  </style>
</head>
<body>
  <div id="map"></div>
  <script>
    var map = new mapboxgl.Map({
      container: 'map',
      style: 'https://api.maptiler.com/maps/streets/style.json?key=ERkOykhUXkkCO5DYTQ14',
      center: [109.34832, -0.05645],
      zoom: 13.29
    });

    map.on('load', function() {
      map.addSource('geojson-overlay', {
        'type': 'geojson',
        'data': 'https://api.maptiler.com/data/e51d0777-34e3-4148-8f2c-f678a9526291/features.json?key=ERkOykhUXkkCO5DYTQ14'
      });
      map.addLayer({
        'id': 'geojson-overlay-fill',
        'type': 'fill',
        'source': 'geojson-overlay',
        'filter': ['==', '$type', 'Polygon'],
        'layout': {},
        'paint': {
          'fill-color': '#fff',
          'fill-opacity': 0.4
        }
      });
      map.addLayer({
        'id': 'geojson-overlay-line',
        'type': 'line',
        'source': 'geojson-overlay',
        'layout': {},
        'paint': {
          'line-color': 'rgb(68, 138, 255)',
          'line-width': 3
        }
      });
      map.addLayer({
        'id': 'geojson-overlay-point',
        'type': 'circle',
        'source': 'geojson-overlay',
        'filter': ['==', '$type', 'Point'],
        'layout': {},
        'paint': {
          'circle-color': 'rgb(68, 138, 255)',
          'circle-stroke-color': '#fff',
          'circle-stroke-width': 6,
          'circle-radius': 7
        }
      });
    });
  </script>
</body>
</html>
