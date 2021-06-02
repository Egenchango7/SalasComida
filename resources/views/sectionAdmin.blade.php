<div class="tm-bg-transparent tm-contact-box-pad shadowRight">
    <div class="flex">
        {{-- COLUMNA 1 --}}
        <div class="divColumn">
            <? $idForms = array('Salas de Comida' => 'SalaComida', 'Menús' => 'Menu', 'Platos' => 'Plato', 'Usuarios' => 'User'); ?>
            <form action="" id="edit{{ $idForms[$titleSection] }}">
                @include('headerSection', ['title' => $titleSection])
                @switch($titleSection)
                    @case('Salas de Comida')
                        <table>
                            <tr>
                                <td>
                                    <b>Dirección:</b>
                                </td>
                                <td>
                                    <input type="text" name="direccion" id="direccion"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Telefono:</b>
                                </td>
                                <td>
                                    <input type="text" name="telefono" id="fono"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <b>Permisos municipales y salubridad vigentes:</b> 
                                    <input type="checkbox" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Descripción:</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <textarea></textarea>
                                </td>
                            </tr>
                        </table>
                    @break
                    @case('Menús')
                        @include('tables/tableMenu', ['titleMenu' => 'detalleAdmin'])
                    @break
                    @case('Platos')
                        @include('tables/tablePlatos', ['view' => 'admin'])
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
                                    <tr>
                                        <td>U001</td>
                                        <td>Navarro Falla, Eliezer</td>
                                        <td>[Cargo]</td>
                                        <td>[Usuario]</td>
                                        <td><input type="password" name="" value="12345"></td>
                                    </tr>
                                    <tr>
                                        <td>U002</td>
                                        <td>Chaname Gomez, Esteban Genaro</td>
                                        <td>[Cargo]</td>
                                        <td>[Usuario]</td>
                                        <td><input type="password" name="" value="12345"></td>
                                    </tr>
                                    <tr>
                                        <td>U003</td>
                                        <td>[nombre]</td>
                                        <td>[Cargo]</td>
                                        <td>[Usuario]</td>
                                        <td><input type="password" name="" value="12345"></td>
                                    </tr>
                                    <tr>
                                        <td>U003</td>
                                        <td>[nombre]</td>
                                        <td>[Cargo]</td>
                                        <td>[Usuario]</td>
                                        <td><input type="password" name="" value="12345"></td>
                                    </tr>
                                    <tr>
                                        <td>U003</td>
                                        <td>[nombre]</td>
                                        <td>[Cargo]</td>
                                        <td>[Usuario]</td>
                                        <td><input type="password" name="" value="12345"></td>
                                    </tr>
                                    <tr>
                                        <td>U003</td>
                                        <td>[nombre]</td>
                                        <td>[Cargo]</td>
                                        <td>[Usuario]</td>
                                        <td><input type="password" name="" value="12345"></td>
                                    </tr>
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
                            <img src="{{ asset('src/FondoLogin.jpg') }}" alt="imgRest">
                            <div class="btnGreen flex"><span class="material-icons-round">image</span>Cambiar imagen</div>
                            {{-- <input type="button" value="Cambiar Imagen"> --}}
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
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Tipo plato:</b></td>
                            <td>
                                <select name="tipoPlato">
                                    {{-- CAMBIAR POR CONSULTA BD --}}
                                    <option value="1">Entrada</option>
                                    <option value="2">A la carta</option>
                                    <option value="3">Postre</option>
                                </select>
                            </td>
                        <tr>
                        <tr>
                            <td><b>Precio (S/.):</b></td>
                            <td><input type="text"></td>
                        </tr>
                        {{-- <tr>
                        <td>Precio reducido:</td>
                        <td><input type="text" placeholder="opcional"></td>
                    </tr> --}}
                    </table>
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
            <div class="btnGreen flex"><span class="material-icons-round">save</span>Guardar</div>
            </form>
        </div>
            @endif
    </div>
</div>  
