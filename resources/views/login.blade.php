@include('layout/head', ['titlePage' => 'Login - SWOA'])
<link href="{{ asset('css/admin/login.css') }}" rel="stylesheet">

</head>

<body>

    <div id="mapaLogin">
        <img src="{{ asset('src/fondoMapaDifuminado.png') }}" alt="fondoLogin">
        <img src="{{ asset('src/markerDefaultBig.png') }}" alt="marker" id="marker">
    </div>

    <div id="divRight">
        <img src="{{ asset('src/fondoLoginLogo.png') }}" alt="fondoLogin">
    </div>

    <div class="login-box">
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

</body>
@include('layout/script')
</html>
