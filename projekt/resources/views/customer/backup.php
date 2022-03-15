<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Kundenverwaltung') }}
        </h2>
    </x-slot>
    <div class="py-3 my-4">
        {{-- https://getbootstrap.com/docs/5.1/components/accordion/ --}}
        {{-- oder --}}
        {{-- https://getbootstrap.com/docs/5.1/components/navs-tabs/#javascript-behavior --}}

    </div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-customer" type="button"
                role="tab" aria-controls="customers" aria-selected="false">Add Customer</button>
            <button class="nav-link active" id="nav-company-tab" data-bs-toggle="tab" data-bs-target="#nav-company"
                type="button" role="tab" aria-controls="companies" aria-selected="true">Add Company</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        {{-- customers --}}
        <div class="tab-pane fade p-3" id="nav-customer" role="tabpanel" aria-labelledby="nav-home-tab">
            <form method="POST" action="{{ route('addCustomer') }}">
                @csrf
                <div class="row mb-3">
                    <label for="inputForename" class="col-sm-2 col-form-label">Vorname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputForename" id="inputForename" placeholder="Max" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputLastname" class="col-sm-2 col-form-label">Familienname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputLastname" id="inputLastname" placeholder="Mustermann">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">E-Mail Adresse</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="maxmustermann@mustermail.at">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputFunction" class="col-sm-2 col-form-label">Funktion</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputFunction" id="inputFunction" placeholder="Musterfunktion">
                    </div>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Notiz</label>
                </div>

                <div class="form-floating mt-3">
                    <select class="form-select" id="floatingSelect" name="inputCompany" aria-label="Floating label select example">
                        @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->companyname }}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Firma</label>
                </div>

                <div class="d-grid d-md-flex justify-content-md-end pt-3">
                    <button class="btn btn-dark" type="submit">Speichern</button>

                </div>
            </form>
        </div>

        {{-- companies --}}
        <div class="tab-pane fade show active" id="nav-company" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="tab-pane fade show active p-3" id="nav-company" role="tabpanel" aria-labelledby="nav-home-tab">
                <form method="POST" action="{{ route('addCompany') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputCompanyname" class="col-sm-2 col-form-label">Company Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="inputCompanyname" id="inputCompanyname" placeholder="Musterfirma" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputAddress" class="col-sm-2 col-form-label">Adresse</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="inputAddress" id="inputAddress" placeholder="Musterstraße 25 1010 Wien">
                        </div>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here"
                            id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Notiz</label>
                    </div>
                    <div class="d-grid d-md-flex justify-content-md-end pt-3">
                        <button class="btn btn-dark" type="submit">Speichern</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($companies as $company)
              <div class="card p-0">
                <h2 class="card-title bg-secondary text-white p-2">{{ $company->companyname }}</h2>
                <div class="card-body p-2">
                  <p>{{$company->address}}</p>
                  <p>{{$company->note}}</p>
                  @foreach($company->customers as $customer)
                    <p class="bg-dark text-white p-2">{{ $customer->forename }} {{$customer->lastname}} <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    </button></p>
                       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>

                    <p>
                      {{$customer->email}}<br>
                      {{$customer->function}}<br>
                      {{$customer->note}}<br>
                      placeholder for time (づ￣ ³￣)づ
                    </p>
                  @endforeach
                </div>
                <div class="card-footer">
                  <small class="text-muted">{{ $company->created_at }} / {{ $company->updated_at }}</small>
                </div>
              </div>
            @endforeach

           
           
      </div>

        <script>
          $('#exampleModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
          })
        </script>


</x-app-layout>
