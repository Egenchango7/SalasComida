@include('layout/head', ['titlePage' => 'Gestion de Salas de comida - SWOA'])
@include('layout/headAdmin')
</head>

<body>
    <img src="{{ asset('src/fondoDifuminado.png') }}" alt="fondoAdmin" id="fondoAdmin">
    <div id="logo">
        <img src="{{ asset('src/logo2.png') }}" class="logo" alt="logo Image">
    </div>
    <!-- Page Content -->
    <div class="container-fluid tm-main">
        <div class="row tm-main-row">

            <!-- Sidebar -->
            <div id="tmSideBar" class="shadowRight col-xl-3 col-lg-4 col-md-12 col-sm-12 sidebar flex">

                <button id="tmMainNavToggle" class="menu-icon">&#9776;</button>

                <div>
                    <nav id="tmMainNav" class="tm-main-nav">
                        <a href="" id="tmNavLink1" data-page="#tm-section-1">
                            <div class="listDiv"><h2>Salas de Comida</h2></div>
                         </a>
                        <a href="" id="tmNavLink1" data-page="#tm-section-2">
                            <div class="listDiv"><h2>Menús</h2></div>
                        </a>
                        <a href="" id="tmNavLink1" data-page="#tm-section-3">
                            <div class="listDiv"><h2>Platos</h2></div>
                        </a>
                        <a href="" id="tmNavLink1" data-page="#tm-section-4">
                            <div class="listDiv"><h2>Usuarios</h2></div>
                        </a>
                    </nav>
                </div>
            </div>
            <button id="btnSalir" class="btnRed flex">
                <span class="material-icons-round">arrow_back_ios</span> <h3>Salir</h3>
            </button>
        <div class="tm-content">
            <!-- section 1 -->
            <section id="tm-section-1" class="tm-section">

                <div class="tm-bg-transparent tm-contact-box-pad">
                    <div class="row mb-4">
                        <div class="col-sm-12">

                            <header>
                                <h2 class="tm-text-shadow">Salas de Comida</h2>
                            </header>
                        </div>
                        <div>
                            <fieldset>
                                <legend>Restaurante</legend>
                                <p>
                                    <label>Restaurante</label>
                                    <select name="" id="">
                                        <option value="">Rest1</option>
                                        <option value="">Rest2</option>
                                        <option value="">Rest3</option>
                                    </select>
                                    </p>
                                        <label>Direcion</label>
                                        <input type="text" name="direccion" id="direccion"/>
                                    <p>
                                    <label>Telefono</label>
                                        <input type="text" name="telefono" id="fono" />
                                    </p>    
                                    <label><input type="checkbox" id="cbox1" value="first_checkbox">Permisos municipales y salubridad Vigente</label><br> 
                                    <label>Descripción</label>
                                    <p>
                                    <textarea id="descripcion"></textarea>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section 2 -->
            <section id="tm-section-2" class="tm-section">

                <div class="tm-bg-transparent tm-contact-box-pad">
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <header>
                                <h1>Menús</h1>
                            </header>
                            <div>
                                <h3>Restaurante:
                                    <select name="" id="">
                                        <option value="">Rest1</option>
                                        <option value="">Rest2</option>
                                        <option value="">Rest3</option>
                                    </select>
                                </h3>
                            </div>
                            @include('tables/tableMenu', ['titleMenu' => 'detalle'])
                        </div>
                        <div class="btnAdd flex">
                            <span class="material-icons-round">
                                add_circle
                            </span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section 3 -->
            <section id="tm-section-2" class="tm-section">

                <div class="tm-bg-transparent tm-contact-box-pad">
                    <div class="row mb-4">
                        <div class="col-sm-12">

                            <header>
                                <h2 class="tm-text-shadow">Platos</h2>
                            </header>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section 4 -->
            <section id="tm-section-2" class="tm-section">

                <div class="tm-bg-transparent tm-contact-box-pad">
                    <div class="row mb-4">
                        <div class="col-sm-12">

                            <header>
                                <h2 class="tm-text-shadow">Usuario</h2>
                            </header>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
    </div>
@include('layout/script')
@include('layout/scriptAdmin')
</html>
