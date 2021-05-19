<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Round" rel="stylesheet">
    <link href="{{asset('css/loginStyle.css')}}" rel="stylesheet">
    
  
  </head>
  <body>
  
        <div id="divImgRest">
            <img src="{{asset('src/fondoLogin1.jpg')}}" alt="imgRest">  
        </div>  

        <div id="logo">
            <img src="{{asset('src/logo1.png')}}" class="logo" alt="imgRest">          
        </div>  
            
  <div id="map"></div>

    <div class="login-box">      
    <h1>Admin</h1>
    <h1>Salas de Comida</h1>
      <form action="//"> 
          
        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username" required name="usuario">
        
        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" required name="passw">
        
        <input type="submit" value="Log In" >

      </form>
    </div>
   
  </body>
  {{-- <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script> --}}
<script src="{{asset('js/map.js')}}"></script>

<script
       src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqWsbYot3tY_QyJoDlmsPjlTyBXY5yBzM&callback=initMap">
</script>
<script>
    console.log(myMap);
</script>
</html>