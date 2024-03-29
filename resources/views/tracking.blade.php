<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add live realtime data</title>
		<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
        <link href="{{ asset('dist/img/logo/pepega.png') }}" rel="shortcut icon" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
		<script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>
		<style>
			body { margin: 0; padding: 0; }
			#map { position: absolute; top: 5%; bottom: 0; width: 100%; }
		</style>
	</head>
	<body>
        <nav class="navbar navbar-dark bg-dark justify-content-between position-static">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Back</a>
                @if (Route::has('login'))
                    @auth
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><a href="{{ url('/admin/dashboard') }}" class="nav-link">Dashboard</a></button>
                    @else
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><a href="{{ route('login') }}" class="nav-link">Log in</a></button>
                    @endauth
                @endif
            </div>
        </nav>
	    <div id="map"></div>
	</body>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script>
        mapboxgl.accessToken = '{{ env('MAPBOX_ACCESS_TOKEN') }}';
        // if on laravel  use this instead (env('MAPBOX_ACCESS_TOKEN'))
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            zoom: 5
        });

        map.on('load', async () => {
            // Get the initial location of the International Space Station (ISS).
            const geojson = await getLocation();
            // Add the ISS location as a source.
            map.addSource('iss', {
                type: 'geojson',
                data: geojson
            });
            // Add the rocket symbol layer to the map.
            map.addLayer({
                'id': 'iss',
                'type': 'symbol',
                'source': 'iss',
                'layout': {
                // This icon is a part of the Mapbox Streets style.
                // To view all images available in a Mapbox style, open
                // the style in Mapbox Studio and click the "Images" tab.
                // To add a new image to the style at runtime see
                // https://docs.mapbox.com/mapbox-gl-js/example/add-image/
                'icon-image': 'rocket-15'
                }
            });

            // Update the source from the API every 2 seconds.
            const updateSource = setInterval(async () => {
                const geojson = await getLocation(updateSource);
                map.getSource('iss').setData(geojson);
            }, 2000);

            async function getLocation(updateSource) {
            // Make a GET request to the API and return the location of the ISS.
                try {
                    const response = await fetch(
                        'http://localhost:8000/api/{{$id}}',
                        { method: 'GET' }
                    );

                    const { latitude, longitude } = await response.json();
                    // Fly the map to the location.
                    map.flyTo({
                        center: [longitude, latitude],
                        speed: 1
                    });
                    // Return the location of the ISS as GeoJSON.
                    return {
                        'type': 'FeatureCollection',
                        'features': [
                            {
                                'type': 'Feature',
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [longitude, latitude]
                                }
                            }
                        ]
                    };
                } catch (err) {
                // If the updateSource interval is defined, clear the interval to stop updating the source.
                if (updateSource) clearInterval(updateSource);
                throw new Error(err);
                }
            }
        });
    </script>
</html>
