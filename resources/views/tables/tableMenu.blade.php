<div id="" class="divMenu">
    <? $isDetalle = $titleMenu == 'detalle' || $titleMenu == 'detalleAdmin'; ?>
    @if ($isDetalle)
        <h2>Menú 
            <select name="tipoMenu" class="tipoMenu"></select>
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
        @if ($titleMenu != 'detalleAdmin')
        @endif
        <table>
            {{-- ENTRADAS Y SEGUNDOS --}}
        </table>
    </div>
</div>