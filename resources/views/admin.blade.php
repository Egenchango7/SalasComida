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

            <div class="tm-bg-transparent tm-contact-box-pad ">
                    <div class="row mb-4">
                        <div class="col-sm-12">

                            <header>
                                <h2 class="tm-text-shadow">Salas de Comida</h2>
                            </header>
                        </div>
                        <div id="detalle1" class="divColumn">
                        <br>
                            <fieldset>                          
                            <div>
                                <h3>Restaurante:
                                    <select name="" id="">
                                        <option value="">Rest1</option>
                                        <option value="">Rest2</option>
                                        <option value="">Rest3</option>
                                        <input type="button" value="Editar">  
                                    </select>
                                </h3>                                  
                                    <p>                                  
                                        <h3>Direcion:</h3>
                                        <input type="text" name="direccion" id="direccion"/>
                                    <br>
                                    <br>
                                    </p>
                                    <h3>Telefono:</h3>
                                        <input type="text" name="telefono" id="fono" />
                                    </p>
                                    <br>    
                                    <h3><input type="checkbox" id="cbox1" value="checkbox">Permisos municipales y salubridad Vigente</h3><br>
                                    <br> 
                                    <h3>Descripción:</h3>
                                    <textarea id="descripcion"></textarea>                                   
                            </fieldset>
                            
                        </div>
                        <div id="detalle2" class="divColumn">
                            <div id="divImg" alt="imgRest" >
                                <img src="{{asset('src/Res1.jpg')}}" alt="imgRest">
                                <input type="button" value="Cambiar Imagen"> 
                            </div>
                            <div class="btnAdd flex">
                            <span class="material-icons-round">
                                add_circle
                            </span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section 2 -->
            <section id="tm-section-2" class="tm-section">

                <div class="tm-bg-transparent tm-contact-box-pad shadowRight">
                    <div class="row mb-4">
                        <div class="col-sm-12 flex">
                            <div class="divColumn">
                                <header>
                                    <h1>Menús</h1>
                                </header>
                                <div>
                                    <h2>Restaurante:
                                        <select name="" id="">
                                            <option value="">Rest1</option>
                                            <option value="">Rest2</option>
                                            <option value="">Rest3</option>
                                        </select>
                                    </h2>
                                </div>
                                @include('tables/tableMenu', ['titleMenu' => 'detalleAdmin'])
                            </div>
                            <div class="division"></div>
                            <div class="divColumn divForm">
                                <h1>Nuevo Menú</h1>
                                <form action="" id="formNewMenu">
                                    <h2>Restaurante:
                                        <select name="" id="">
                                            <option value="">Rest1</option>
                                            <option value="">Rest2</option>
                                            <option value="">Rest3</option>
                                        </select>
                                    </h2>
                                    <table>
                                        <tr>
                                            <td>Entrada:</td>
                                            <td><input type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>Segundo:</td>
                                            <td><input type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>Tipo menú:</td>
                                            <td>
                                                <select name="tipoMenu" id="" class="">
                                                    {{-- CAMBIAR POR CONSULTA BD --}}
                                                    <option value="1">Ejecutivo</option>
                                                    <option value="2">Marino</option>
                                                    <option value="3">Vegano</option>
                                                </select>
                                            </td>
                                        <tr>
                                        <tr>
                                            <td>Precio:</td>
                                            <td><input type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>Precio reducido:</td>
                                            <td><input type="text" placeholder="opcional"></td>
                                        </tr>
                                    </table>
                                    <input type="button" value="Guardar">
                                </form>
                            </div>
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
            <section id="tm-section-4" class="tm-section">

                <div class="tm-bg-transparent tm-contact-box-pad">
                    <div class="row mb-4">
                        <div class="col-sm-12 login-box">

                            <header>
                                <h2 class="tm-text-shadow">Usuario</h2>
                            </header>
                                    <div>
                                        <h3>Sitio Web de Ofertas de Alimentos</h3>
                                        <form action="">

                                            <label for="username">Username</label>
                                            <input type="text" name="usuario" class="txt" required>

                                            <label for="password">Password</label>
                                            <input type="password" name="passw" class="txt" required>

                                            <input type="button" value="Ingresar">

                                        </form>
                                    </div>
                        </div>                
                    </div>                                                      
                </div>
            </section>

        </div>
    </div>
    </div>
    <div class="fondoModal">
        <div id="detalleOptionRest">
            <div id="btnHideDetalle" class="flex btnHide"> 
                <span class="material-icons-round">close</span>
            </div>
            <h1>Nuevo Menú</h1>
            <form action="" id="formNewMenu">
                <h2>Restaurante:
                    <select name="" id="">
                        <option value="">Rest1</option>
                        <option value="">Rest2</option>
                        <option value="">Rest3</option>
                    </select>
                </h2>
                <div>
                    <p>Entrada:
                        <input type="text">
                    </p>
                    <p>Segundo:
                        <input type="text">
                    </p>
                    <select name="tipoMenu" id="" class="tipoMenu">
                        {{-- CAMBIAR POR CONSULTA BD --}}
                        <option value="1">Ejecutivo</option>
                        <option value="2">Marino</option>
                        <option value="3">Vegano</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
@include('layout/script')
@include('layout/scriptAdmin')
</html>
