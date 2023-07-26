<select class='form-control center' id='eci' name='estadocivils_id'>
        <option value="">Seleccione Estado Civil..</option>
        @foreach ($estadocivil as $eci)
        <option value="{{ $eci->id }}">{{ $eci->nombre }}</option>
        @endforeach
</select> 