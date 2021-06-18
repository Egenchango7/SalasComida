<div class="listDiv shadowRight">
<? $precio = $o['precioReducido'] != 0 ? 'precioReducido' : 'precio'; ?>
    <table>
        <tr>
            <td colspan="2">Oferta menú <b>{{ $o['tipoMenu'] }}</b>: <br />
                <h3>S/ {{ number_format($o[$precio],2) }}</h3>
            </td>
        </tr>
        <tr>
            <td><b>Restaurante:</b> <br />{{ $o['nomRest'] }}</td>
            <td></td>
        </tr>
        <tr>
            <td><button class="btnGreen" value="{{ $o['idRest'] }}-{{ $o['idTipoMenu'] }}">Ver más</button></td>
        </tr>
    </table>
</div>