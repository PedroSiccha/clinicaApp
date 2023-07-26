<select class='form-control center' id='inst' name='instruccions_id'>
        <option value="">Seleccione Grado de Instrucción..</option>
        @foreach ($instruccion as $ins)
        <option value="{{ $ins->id }}">{{ $ins->nombre }}</option>
        @endforeach
</select>