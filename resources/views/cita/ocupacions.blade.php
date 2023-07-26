<select class='form-control center' id='ocu' name='ocupacions_id'>
        <option value="">Seleccione Ocupación..</option>
        @foreach ($ocupacion as $ocu)
        <option value="{{ $ocu->id }}">{{ $ocu->nombre }}</option>
        @endforeach
    </select>