@include('layout/head')
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
                @include('tableMenu',['titleMenu' => 'principal'])
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
                    @include('tableMenu', ['titleMenu' => 'detalle'])
                </div>
                <div id="detallePlatos" class="detallePlatos">
                    @include('tablePlatos')
                </div>
                <div id="detallePostres" class="detallePlatos">
                    @include('tablePlatos')
                </div>
                <span class="material-icons-round"></span>
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
@include('layout/script')