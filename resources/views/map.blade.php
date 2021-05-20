<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Round" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/font.css')}}" rel="stylesheet">
    <link href="{{asset('css/map.css')}}" rel="stylesheet">
    <link href="{{asset('css/oferta.css')}}" rel="stylesheet">
    <link href="{{asset('css/rest.css')}}" rel="stylesheet">
    <link href="{{asset('css/menu.css')}}" rel="stylesheet">
    <link href="{{asset('css/modal.css')}}" rel="stylesheet">
    <link href="{{asset('css/detalle.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
    <script src="{{asset('js/jquery-3.6.0.js')}}"></script>
</head>
<body>
    <div id="map"></div>
    <div id="buscador" class="flotante shadowRight flex">
        <span class="material-icons-round">search</span>
        <input type="text" name="txtBuscador" id="txtBuscador"/>
    </div>
    <div id="divRest" class="flotante shadowRight">
        <div id="contentRest">
            <div id="btnHideRest" class="flex btnHide btnRed"> 
                <span class="material-icons-round">close</span>
            </div>
            <div id="divImgRest">
                <img src="{{asset('src/fondoLogin.jpg')}}" alt="imgRest">
            </div>
            <div id="infoRest">
                <h1>[Restaurante]</h1>
                <p>[Descripcion]Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima aut suscipit possimus ut ab! Sed facilis eum eius harum debitis, recusandae neque ex quasi expedita, illum perferendis delectus commodi mollitia!</p>
                @include('tableMenu', ['titleMenu' => '<h2>Menú del día</h2>'])
            </div>
        </div>
        <div id="optionsRest" class="flex">
            <button value="1" class="btnRed">Ver detalle</button>
            <button value="2" class="btnRed">Platos a la carta</button>
            <button value="3" class="btnRed">Postres</button>
        </div>
    </div>
    <div class="fondoModal">
        <div id="detalleOptionRest">
            <div id="btnHideDetalle" class="flex btnHide"> 
                <span class="material-icons-round">close</span>
            </div>
            <h1>[OptionRestTitle]</h1>
            <div id="detalleLeft" class="divColumn">
                <p><b>Descripción del restaurante:</b> [Descripcion] Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima aut suscipit possimus ut ab! Sed facilis eum eius harum debitis, recusandae neque ex quasi expedita, illum perferendis delectus commodi mollitia!</p>
                <p><b>Teléfono:</b> [Telefono]</p>
                <span id="permisos"><b>Permisos municipales y de salubridad vigentes:</b> 
                    <span class="material-icons-round" style="color: #7cb342">verified</span>
                    {{-- <span class="material-icons-round" style="color: #ea4335">dangerous</span> --}}
                </span>
            </div>
            <div id="division"></div>
            <div id="detalleRight" class="divColumn">
                <div id="detalleMenu">
                    <? $titleMenu = 
                            '<h2>Menú 
                                <select name="tipoMenu" id="tipoMenu">
                                    <option value="1">Ejecutivo</option>
                                    <option value="2">Marino</option>
                                    <option value="3">Vegano</option>
                                </select>
                            </h2>';
                    ?>
                    @include('tableMenu', ['titleMenu' => $titleMenu])
                </div>
                <div id="detallePlatos">
                    <div id="fondoPrecios"></div>
                    <table>
                        <tr>
                            <td class="itemMenu">[Plato1]</td>
                            <td></td>
                            <td class="itemMenu">S/ 00.00</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="itemMenu">[Plato2]</td>
                            <td></td>
                            <td class="itemMenu">S/ 00.00</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="itemMenu">[Plato3]</td>
                            <td></td>
                            <td class="itemMenu">S/ 00.00</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="itemMenu">[Plato4]</td>
                            <td></td>
                            <td class="itemMenu">S/ 00.00</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="itemMenu">[Plato5]</td>
                            <td></td>
                            <td class="itemMenu">S/ 00.00</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div id="detallePostres">

                </div>
            </div>
        </div>
    </div>
    <div id="btnOfertas" class="flotante shadowLeft flex">
        <div>
            <p id="symbolSoles">S/.</p>
            Ofertas<br/>destacadas
        </div>
    </div>
    <div id="divOfertas" class="flotante shadowLeft">
        
    </div>
</body>
{{-- <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script> --}}
<script src="{{asset("js/classMap.js")}}"></script>
<script src="{{asset("js/const.js")}}"></script>
<script src="{{asset('js/map.js')}}"></script>
<script src="{{asset('js/oferta.js')}}"></script>
<script src="{{asset('js/rest.js')}}"></script>
<script src="{{asset('js/menu.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqWsbYot3tY_QyJoDlmsPjlTyBXY5yBzM&callback=initMap"></script>
<script>
    console.log(myMap);
</script>
</html>