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
          text-align:center;
        }
        body{
          background:#BDBDBD;
        }
        .boton{
          border-radius: 15px;
        margin-left: 41%;
        font-size:20px; 
        text-align:center;
        font-family:arial;
        font-weight:bold;
        color:white;
        background:green;
        border:0px;
        width:300px;
        height:50px;
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
             
            
        function initMap() {
              
          $.get("http://127.0.0.1:8000/GoogleController/obtenerCoordenadas", function(latitud, longitud){
              alert("Data: " + latitud + "\nStatus: " + longitud);
        });
               
          const myLatLng = { lat: 25.526157, lng: -103.426629 };
          //const TewoPosition = { lat: 25.712049, lng: -100.342073 };
          

          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 6,
            center: myLatLng,
          });
  
          new google.maps.Marker({
            position: myLatLng,
            map,
            title: "First Position",
          });

        //  new google.maps.Marker({
         //   position: TewoPosition,
          //  map,
           // title: "Second position",
          //});
        }
  
        window.initMap = initMap;
    </script>
  
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" >
      </script>
  
</body>
</html>