<x-app-layout>
  <x-slot name="header">
      <h2>
          {{ __('Statusverwaltung') }}
      </h2>
  </x-slot>

  <div class="py-3">
      {{-- Button Modal addState --}}

      <!-- Button trigger modal -->
      <x-modalButton data-bs-target="#addState" class="d-block mx-auto">
        <i class="fas fa-plus"></i>
      </x-modalButton>

      <!-- Modal -->
      <div class="modal fade" id="addState" tabindex="-1" aria-labelledby="modalAddState" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalAddState">Status hinzufügen</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('state.store') }}" method="POST">
              @csrf
              <div class="modal-body">
                <div class="my-4">
                  <x-label for="stateTitle" :value="__('Titel')" />
                  <x-input id="stateTitle" name="stateTitle" type="text" required />
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
          </form>
          </div>
        </div>
      </div>


      {{-- Ausgabe aller Statuseinträge in Tabelle --}}

      <div class="table-responsive my-4">
        <table class="table table-striped">
          <tbody>
            @foreach($states as $state)
              <tr>
                <td>{{ $state->state }}</td>
                <td class="text-end">
                    @if(count($state->projects) == 0)
                        <x-buttonDelete onclick="deleteState({{ $state->id }})"></x-buttonDelete>
                    @endif
                    <x-buttonEdit onclick="editState({{ $state->id }})"></x-buttonEdit>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>

    <script>

    function editState(id) {
      $.ajax({
        method: "GET",
        url: 'state/' + id,
        success: function (data) {
          $('#modalContainer').html(data);
          $('#editModal').modal('show');
        },
        error: function (data) {
          console.log(data);
        }
      });
    }

    function deleteState(id) {
        // ToDo
    }

  </script>
</x-app-layout>
