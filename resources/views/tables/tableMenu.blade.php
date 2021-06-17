<div id="" class="divMenu">
    <? $isDetalle = $titleMenu == 'detalle'?>
    @if ($isDetalle)
        <h2>Menú 
            <select name="tipoMenu" class="tipoMenu"></select>
            <input type="text" id="idMenu" name="idMenu" hidden>
        </h2>
    @else
        <h2>Menú del día</h2>
    @endif
    <div id="" class="precioMenu">
        <h2>S/ 00.00</h2>
    </div>
    @if ($isDetalle)
        <div id="" class="precioMenu precioNormal">
            <h2>Normal: S/ 00.00</h2>
        </div>
    @endif
    <div id="" class="scrollBar heightMenu"></div>        
    <div id="" class="tableMenu heightMenu">
        <select class="newPlatoTipo1" onchange="selectIdPlato(this)" hidden></select>
        <select class="newPlatoTipo2" onchange="selectIdPlato(this)" hidden></select>
        <table>
            {{-- ENTRADAS Y SEGUNDOS --}}
        </table>
    </div>
</div>