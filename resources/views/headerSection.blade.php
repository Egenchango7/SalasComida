 <header>
    <h1>{{ $title }}</h1>
</header>
@if (Str::contains($title, 'Nuevo'))
    <form action="" id="formNew{{ $idForms[$titleSection] }}">
@endif
@if (!Str::contains($title, 'Usuario'))
    <h2>Restaurante:
        <select name="listRest">
            <option value="">Rest1</option>
            <option value="">Rest2</option>
            <option value="">Rest3</option>
        </select>
    </h2>
@endif
