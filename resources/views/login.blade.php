@include('layout/head', ['titlePage' => 'Login - SWOA'])
<link href="{{ asset('css/admin/login.css') }}" rel="stylesheet">

</head>

<body>
    @include('layout/loader')
    <div id="map"></div>
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
            <form name="loginAdmin" id="loginAdmin" action="{{ route('login') }}" method="post">
                @csrf
                <label for="username">Username</label>
                <input type="text" id="usuario" class="user" name="username" required>

                <label for="password">Password</label>
                <input type="password" id="passw" class="pwd" name="pwd" required>

                <button id="login" class="btnGreen">Ingresar</button>

            </form>
        </div>
    </div>

</body>
@include('layout/script')
<script src="{{ asset('js/admin/login.js') }}"></script>
</html>
