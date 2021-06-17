 <header>
    <h1>{{ $title }}</h1>
</header>
<form action="{{ route($actionForms[$titleSection][1]) }}" id="formNew{{ $idForms[$titleSection] }}" method="post" enctype="multipart/form-data">
    
@if (!Str::contains($title, 'Nuevo') && !Str::contains($title, 'Usuario'))
    @if (!Str::contains($title, 'Plato'))
        <div class="btnDelete flex" onclick="deleteRow(this)">
            <span class="material-icons-round">delete</span>
        </div> 
    @endif
        <h2>Restaurante:
            <select name="listRest">
                @foreach ($rests as $r)
                    <option value="{{ $r['id'] }}">{{ $r['nombre'] }}</option>
                @endforeach
            </select>
        </h2>
@else
    
@endif
