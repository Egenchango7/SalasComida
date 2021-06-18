@include('layout/head', ['titlePage' => 'Gestion de Salas de comida - SWOA'])
@include('layout/headAdmin')
</head>
@include('layout/loader')

<body>
    <div id="logo">
        <img src="{{ asset('src/SWOA_White.png') }}" class="logo" alt="logo Image">
    </div>
    <!-- Page Content -->
    <div class="container-fluid tm-main">
        <div class="row tm-main-row">
            <!-- Sidebar -->
            <div id="tmSideBar" class="sidebar shadowRight flex">
                <button id="tmMainNavToggle" class="menu-icon">&#9776;</button>
                <div>
                    <nav id="tmMainNav" class="tm-main-nav">
                        <a href="" data-page="#tm-section-1">
                            <div class="listDiv">
                                <h2>Salas de Comida</h2>
                            </div>
                        </a>
                        <a href="" data-page="#tm-section-2">
                            <div class="listDiv">
                                <h2>Menús</h2>
                            </div>
                        </a>
                        <a href="" data-page="#tm-section-3">
                            <div class="listDiv">
                                <h2>Platos</h2>
                            </div>
                        </a>
                        <a href="" data-page="#tm-section-4">
                            <div class="listDiv">
                                <h2>Usuarios</h2>
                            </div>
                        </a>
                    </nav>
                </div>
                <button id="btnSalir" class="flex">
                    <span class="material-icons-round">arrow_back_ios</span>
                    <h3>Salir</h3>
                </button>
            </div>
            <div class="tm-content">
                <!-- section 1 -->
                <section id="tm-section-1" class="tm-section">
                    @include('sectionAdmin', ['titleSection' => 'Salas de Comida'])
                </section>
                <!-- section 2 -->
                <section id="tm-section-2" class="tm-section">
                    @include('sectionAdmin', ['titleSection' => 'Menús'])
                </section>
                <!-- section 3 -->
                <section id="tm-section-3" class="tm-section">
                    @include('sectionAdmin', ['titleSection' => 'Platos'])
                </section>
                <!-- section 4 -->
                <section id="tm-section-4" class="tm-section">
                    @include('sectionAdmin', ['titleSection' => 'Usuarios'])
                </section>
            </div>
        </div>
    </div>
    <div class="fondoModal">
        <div id="detalleOptionRest">
            <div id="btnHideDetalle" class="flex btnHide">
                <span class="material-icons-round">close</span>
            </div>
            <h1>Nueva Sala de Comida</h1>
            <form action="{{ route('rest.new') }}" id="formNewSalaComida" method="post" class="flex" enctype="multipart/form-data">
                @csrf
                <div class="divColumn">
                    <table>
                        <tr>
                            <td><b>Nombre:</b></td>
                            <td><input type="text" name="nombre"></td>
                        </tr>
                        <tr>
                            <td>
                                <b>Dirección:</b>
                            </td>
                            <td>
                                <input type="text" name="direccion"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Telefono:</b>
                            </td>
                            <td>
                                <input type="text" name="telefono"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Permisos municipales y salubridad vigentes:</b> 
                                <input type="checkbox" name="permisos">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Foto:</b></td>
                            <td>
                                <label for="fotoRest">
                                    <div class="btnGreen flex"><span class="material-icons-round">image</span><span>Seleccionar</span></div>
                                    <input type="file" name="fotoRest" id="fotoRest">
                                </label>
                                <input type="text" id="nameFile" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Descripción:</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <textarea name="descripcion"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="division"></div>
                <div class="divColumn divForm">
                    <div id="map"></div>
                    <div class="btnRed flex"><span>Agregar</span> <img src="{{ asset('src/markerRestWhiteTransparent.png') }}" alt=""></div>
                    <input type="text" id="marker" name="marker" hidden>
                </div>
            </form>
        </div>
    </div>
</body>
    @include('layout/script')
    @include('layout/scriptAdmin')
</html>
