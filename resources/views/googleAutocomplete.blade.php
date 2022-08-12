<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api-Reloj</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <style type="text/css">
        #map {
            height: 700px;
            border-radius: 15px;
        }

        h2 {
            color: Black;
            font-family: arial;
            text-align: center;
        }

        body {
            background: #BDBDBD;
        }

        .boton {
            border-radius: 15px;
            margin-left: 41%;
            font-size: 20px;
            text-align: center;
            font-family: arial;
            font-weight: bold;
            color: white;
            background: green;
            border: 0px;
            width: 300px;
            height: 50px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Ubicaciones del Reloj </h2>
        <form action="{{ route('reload')}}" method="GET">
            @csrf
            <input type="submit" value="Actualizar el Mapa" class="boton">
            <form>
                <p>
                <div id="map"></div>

    </div>


    <script type="text/javascript">
        var latitud = 0
        var longitud = 0

        function initMap() {


        var datos = '{{!! json_encode($results) !!}}'

        datos = datos.slice(1,-1).trim()
        // datos = datos.slice(1,)
        datos = JSON.parse(datos)

        console.log(datos)
        const myLatLng = datos;

        var lat = parseFloat(myLatLng[0].lat)
        var lng = parseFloat(myLatLng[0].lng)
        console.log(myLatLng)

        const centerLatlng = { lat: myLatLng[0].lat, lng: myLatLng[0].lng };
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 6,
          center: {
            lat: lat,
            lng: lng
            }
        });

        for(var i = 0; i < myLatLng.length; i++){
            let lat = parseFloat(myLatLng[i].lat)
            let lng = parseFloat(myLatLng[i].lng)
            const markerLatlng = { lat: myLatLng[i].lat, lng: myLatLng[i].lng };
            console.log("datos: ",myLatLng[i])
            new google.maps.Marker({
              position: {
                lat: lat,
                lng: lng
            },
              map,
              title: "First Position",
            });
        }




        //  new google.maps.Marker({
         //   position: TewoPosition,
          //  map,
           // title: "Second position",
          //});
        }

        window.initMap = initMap;
    </script>

    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap">
    </script>

</body>

</html>