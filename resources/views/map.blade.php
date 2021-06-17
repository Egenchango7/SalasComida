@include('layout/head', ['titlePage' => 'SWOA'])
@include('layout/headClient')
</head>
<body>
    {{-- 
    <div class="loader loader--style2" title="1">
        <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
           width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
            <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                <animateTransform attributeType="xml"
                    attributeName="transform"
                    type="rotate"
                    from="0 25 25"
                    to="360 25 25"
                    dur="0.6s"
                    repeatCount="indefinite"/>
            </path>
        </svg>
    </div>
    --}}
    <div id="map"></div>
    <div id="buscador" class="flotante shadowRight flex">
        <span class="material-icons-round">search</span>
        <input type="text" name="txtBuscador" id="txtBuscador"/>
    </div>
    <div class="divRest flotante shadowLeft">
        <h1>Restaurantes</h1>
        <div id="contentRest" class="contentList">
            @foreach ($rests as $r)
                <div class="listDiv shadowRight">
                    <h2>{{ $r['nombre'] }}</h2>
                    <span>{{ $r['id'] }}</span>
                    <p><b>Dirección:</b> {{ $r['direccion'] }}</p>
                    <p><b>Teléfono:</b> {{ $r['telefono'] }}</p>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
                    <a href="https://api.whatsapp.com/send?phone=51{{ $r['telefono'] }}&text=Quisiera realizar un pedido." class="float" target="_blank">
                        <i class="fa fa-whatsapp my-float"></i>
                    </a>
                </div>
                {{-- @include('tables/tableRest', ['rest' => $r]) --}}
            @endforeach
        </div>
    </div>
    <div id="divRest" class="divRest flotante shadowRight">
        <div id="btnHideRest" class="flex btnHide btnRed"> 
            <span class="material-icons-round">close</span>
        </div>
        <div id="divImgRest">
            <img class="srcImgRest" alt="imgRest">
        </div>
        <div id="infoRest">
            <h1>{{-- [Restaurante] --}}</h1>
            <p><span class="descRest"></span></p>
            @include('tables/tableMenu',['titleMenu' => 'principal'])          
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
            <h1>{{-- [OptionRestTitle] --}}</h1>
            <div id="detalleLeft" class="divColumn">
                <p><b>Descripción del restaurante:</b> <span class="descRest"></span></p>
                <p><b>Dirección:</b> <span class="dirRest"></span></p>
                <p><b>Teléfono:</b> <span class="fonoRest"></span></p>
                <span id="permisos"><b>Permisos municipales y de salubridad vigentes:</b> 
                    <span class="material-icons-round"></span>
                </span>
            </div>
            <div class="division"></div>
            <div id="detalleRight" class="divColumn">
                <div id="detalleMenu">
                    @include('tables/tableMenu', ['titleMenu' => 'detalle'])
                </div>
                <div id="detallePlatos">
                    @include('tables/tablePlatos')
                </div>
                <div id="detallePostres">
                    @include('tables/tablePlatos')
                </div>
                <span class="material-icons-round"></span>
            </div>
        </div>
    </div>
    <div id="logoSWOA" class="flotante shadowLeft">
        <img src="{{asset('src/logoWhite.png')}}" alt="imgRest">
    </div>
    <div id="divOfertas" class="flotante shadowLeft">
        <h2>Ofertas destacadas</h2>
        <div id="contentOfertas" class="contentList">
            <?=
            '<script>
                const ofertas = '.json_encode($ofertas).';
            </script>';
            ?>
            @foreach ($ofertas as $o)
                @include('tables/tableOferta', ['oferta' => $o])
            @endforeach
        </div>
    </div>
@include('layout/script')
@include('layout/scriptClient')
</html>