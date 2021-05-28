<div id="" class="divMenu">
    <? $isDetalle = $titleMenu == 'detalle' || $titleMenu == 'detalleAdmin'; ?>
    @if ($isDetalle)
        <h2>Menú 
            <select name="tipoMenu" id="" class="tipoMenu">
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
    @if ($isDetalle)
        <div id="" class="precioMenu precioReducido">
            <h2>Normal: S/ 00.00</h2>
        </div>
    @endif
    <div id="" class="tableMenu heightMenu">
        @if ($titleMenu != 'detalleAdmin')
            <div id="" class="scrollBar heightMenu"></div>        
        @endif
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