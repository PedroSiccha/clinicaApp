    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
          <thead>
            <tr class="headings">
              <th>
                <input type="checkbox" id="check-all" class="flat">
              </th>
              <th class="column-title">Código </th>
              <th class="column-title">Alérgia </th>
              <th class="bulk-actions" colspan="7">
                <a class="antoo" style="color:#fff; font-weight:500;">Alérgias Seleccionadas ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
              </th>
            </tr>
          </thead>

          <tbody>
            @foreach ($ale as $al)
              <tr class="even pointer">
                <td class="a-center ">
                  <input type="checkbox" class="flat" name="idAlergia[]" value="{{ $al->id }}" id="idAlergia">
                </td>
                <td class=" ">{{ $al->id }}</td>
                <td class=" ">{{ $al->nombre }}</td>
              </tr>    
            @endforeach
          </tbody>
        </table>
      </div>