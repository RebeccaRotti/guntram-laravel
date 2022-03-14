<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Status editieren
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ url('/state', ['id' => $state->id]) }}">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row m-4">
            <x-label for="inputState">Status Titel</x-label>
            <x-input id="inputState" name="inputState" type="text" required value="{{ $state->state }}"></x-input>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <x-button>Änderungen speichern</x-button>
        </div>
      </form>
    </div>
  </div>
</div>