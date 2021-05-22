<div id="" class="divMenu">
    @if ($titleMenu == 'detalle')
        <h2>Menú 
            <select name="tipoMenu" id="tipoMenu">
                {{-- CAMBIAR POR CONSULTA BD --}}
                <option value="1">Ejecutivo</option>
                <option value="2">Marino</option>
                <option value="3">Vegano</option>
            </select>
        </h2>
    @else
        <h2>Menú del día</h2>
    @endif
    <div id="" class="precioMenu">
        <h2>S/ 00.00</h2>
    </div>
    @if ($titleMenu == 'detalle')
        <div id="precioReducido" class="precioMenu">
            <h2>Normal: S/ 00.00</h2>
        </div>
    @endif
    <div id="" class="tableMenu heightMenu">
        <div id="" class="scrollBar heightMenu"></div>
        <table>
            <tr>
                <td>
                    <h3>Entrada:</h3>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="itemMenu">[Entrada1]</td>
            </tr>
            <tr>
                <td></td>
                <td class="itemMenu">[Entrada2]</td>
            </tr>
            <tr>
                <td></td>
                <td class="itemMenu">[Entrada3]</td>
            </tr>
            <tr>
                <td></td>
                <td class="itemMenu">[Entrada4]</td>
            </tr>
            <tr>
                <td>
                    <h3>Segundo:</h3>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="itemMenu">[Segundo1]</td>
            </tr>
            <tr>
                <td></td>
                <td class="itemMenu">[Segundo2]</td>
            </tr>
            <tr>
                <td></td>
                <td class="itemMenu">[Segundo3]</td>
            </tr>
            <tr>
                <td></td>
                <td class="itemMenu">[Segundo4]</td>
            </tr>
            <tr>
                <td></td>
                <td class="itemMenu">[Segundo5]</td>
            </tr>
            <tr>
                <td></td>
                <td class="itemMenu">[Segundo6]</td>
            </tr>
            <tr>
                <td></td>
                <td class="itemMenu">[Segundo7]</td>
            </tr>
            <tr>
                <td></td>
                <td class="itemMenu">[Segundo8]</td>
            </tr>
        </table>
    </div>
</div>