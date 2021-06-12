<div class="tm-bg-transparent tm-contact-box-pad shadowRight">
    <div class="flex">
        {{-- COLUMNA 1 --}}
        <div class="divColumn">
            <? 
            $idForms = array(
                'Salas de Comida' => 'SalaComida',
                'Menús' => 'Menu', 
                'Platos' => 'Plato', 
                'Usuarios' => 'User'
            );
            $actionForms = array(
                'Salas de Comida' => array('rest.update','rest.update'), 
                'Menús' => array('rest.update','rest.update'), 
                'Platos' => array('rest.update','plato.add'), 
                'Usuarios' => array('rest.update','rest.update')
            );
            ?>
            <form action="{{ route($actionForms[$titleSection][0]) }}" id="edit{{ $idForms[$titleSection] }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('headerSection', ['title' => $titleSection])
                @switch($titleSection)
                    @case('Salas de Comida')
                        <table>
                            <tr>
                                <td>
                                    <b>Dirección:</b>
                                </td>
                                <td>
                                    <input type="text" name="direccion" id="direccion" class="dirRest" value="{{ $rests[0]['direccion'] }}" readonly/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Telefono:</b>
                                </td>
                                <td>
                                    <input type="text" name="telefono" id="fono" class="fonoRest" value="{{ $rests[0]['telefono'] }}" readonly/>
                                </td>
                            </tr>
                            <tr>
                                <td id="permisos" colspan="2">
                                    <b>Permisos municipales y salubridad vigentes:</b> 
                                    <input type="checkbox" name="permisos" {{ $rests[0]['permisos'] ? 'checked' : '' }} hidden>
                                    <span class="material-icons-round"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Descripción:</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <textarea class="descRest" name="descripcion" readonly>{{ $rests[0]['descripcion'] }}</textarea>
                                </td>
                            </tr>
                        </table>
                    @break
                    @case('Menús')
                        @include('tables/tableMenu', ['titleMenu' => 'detalleAdmin'])
                    @break
                    @case('Platos')
                    <tr>
                        <p><b>Tipo plato:</b>
                            <select name="tipoPlato">
                                @foreach ($tiposPlato as $tp)
                                    @if ($tp->id != '2')
                                        <option value="{{ $tp->id }}">{{ $tp->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </p>
                    <tr>
                        @include('tables/tablePlatos')
                    @break
                    @case('Usuarios')
                        <div id="container-Usuarios">
                            <table id="tbusuarios">
                                <thead id="cabeceraUsu">
                                    <th>
                                        <h3>ID</h3>
                                    </th>
                                    <th>
                                        <h3>NOMBRE</h3>
                                    </th>
                                    <th>
                                        <h3>CARGO</h3>
                                    </th>
                                    <th>
                                        <h3>USUARIO</h3>    
                                    </th>
                                    <th>
                                        <h3>CONTRASEÑA</h3>    
                                    </th>
                                </thead>
                            </table>
                            <div class="rows">
                                <table>
                                    @foreach ($users as $u)
                                        <tr>
                                            <td>{{ $u['id'] }}</td>
                                            <td>{{ $u['nombre'] }}</td>
                                            <td>{{ $u['cargo'] }}</td>
                                            <td>{{ $u['username'] }}</td>
                                            <td><input type="password" name="" value="{{ $u['pwd'] }}"></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @break
                @endswitch
                <div class="btnGreen flex"><span class="material-icons-round">edit</span>Editar</div>
            </form>
        </div>
        <div class="division"></div>
        {{-- COLUMNA 2 --}}
        <div class="divColumn divForm">
            @switch($titleSection)
                @case('Salas de Comida')
                    <div id="divImg">
                            <img src="{{ asset('img/'.$rests[0]['foto']) }}" class="srcImgRest" alt="imgRest">                            
                            <label for="changeImg">
                                <div class="btnGreen flex"><span class="material-icons-round">image</span>Cambiar imagen</div>
                                <input type="file" name="changeImg" id="changeImg">
                            </label>
                        </div>
                @break
                @case('Menús')
                    @include('headerSection', ['title' => 'Nuevo Menú'])
                    <table>
                        <tr>
                            <td><b>Entrada:</b></td>
                            <td>
                                <input type="text">
                                <div class="btnAdd flex">
                                    <span class="material-icons-round">
                                        add_circle
                                    </span>
                                </div>
                                <span class="msg">Entrada agregada<span>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Segundo:</b></td>
                            <td>
                                <input type="text">
                                <div class="btnAdd flex">
                                    <span class="material-icons-round">
                                        add_circle
                                    </span>
                                </div>
                                <span class="msg">Segundo agregado<span>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Tipo menú:</b></td>
                            <td>
                                <select name="tipoMenu">
                                    {{-- CAMBIAR POR CONSULTA BD --}}
                                    <option value="1">Ejecutivo</option>
                                    <option value="2">Marino</option>
                                    <option value="3">Vegano</option>
                                </select>
                            </td>
                        <tr>
                        <tr>
                            <td><b>Precio (S/.) :</b></td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td><b>Precio reducido:</b></td>
                            <td><input type="text" placeholder="opcional"></td>
                        </tr>
                    </table>
                @break
                @case('Platos')
                    @include('headerSection', ['title' => 'Nuevo Plato'])
                    <table>
                        <tr>
                            <td><b>Nombre:</b></td>
                            <td>
                                <input type="text" name="nombre">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Tipo plato:</b></td>
                            <td>
                                <select name="tipoPlato">
                                    @foreach ($tiposPlato as $tp)
                                        @if ($tp->id != '2')
                                            <option value="{{ $tp->id }}">{{ $tp->nombre }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                        <tr>
                        <tr>
                            <td><b>Precio (S/.):</b></td>
                            <td><input type="text" name="precio"></td>
                        </tr>
                    </table>
                    <input type="text" id="idRestPlato" name="idRest" hidden>
                @break
                @case('Usuarios')
                    @include('headerSection', ['title' => 'Nuevo Usuario'])
                    <table>
                        <tr>
                            <td>
                                <b for="txtNom">Nombre:</b>
                            </td>
                            <td>
                                <input type="text" name="txtNom" required>
                            </td>
                            <td>
                                <b for="listCargo">Cargo:</b>
                            </td>
                            <td>
                                <select name="listCargo">
                                    <option value="1">Admin</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b for="txtUser">Usuario:</b>
                            </td>
                            <td>
                                <input type="text" name="txtUser" required>
                            </td>
                            <td>
                                <b for="txtPwd">Contraseña:</b>
                            </td>
                            <td>
                                <input type="password" name="txtPwd" required>
                            </td>        
                        </tr>
                    </table>
                    {{-- <input id="buttonUsu" type="button" value="Registrar"  > --}}
                @break
            @endswitch
            @if ($titleSection == 'Salas de Comida')
        </div>
        <div class="btnAdd flex">
            <span class="material-icons-round">
                add_circle
            </span>
        </div>
        @else
            <div class="btnGreen flex btnSave"><span class="material-icons-round">save</span>Guardar</div>
            </form>
        </div>
            @endif
    </div>
</div>  
