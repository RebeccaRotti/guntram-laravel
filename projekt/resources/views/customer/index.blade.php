<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Kundenverwaltung') }}
        </h2>
    </x-slot>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="company-tab" data-bs-toggle="tab" data-bs-target="#company" type="button" role="tab" aria-controls="company" aria-selected="true">Company</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="customer-tab" data-bs-toggle="tab" data-bs-target="#customer" type="button" role="tab" aria-controls="costumer" aria-selected="false">Customer</button>
        </li>
        
      </ul>
      
      
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="company" role="tabpanel" aria-labelledby="company-tab">
            
            <form method="POST" action="{{ route('addCompany') }}">
                    {{-- ich hatte mir die zwei dinge aufgeschrieben mit csrf und dem route für die methode post, 
                        sonst wäre ich verloren gewesen :) --}}
                @csrf
                
                <div class="row mb-2 pt-2">
                    <label for="inputCompanyname" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputCompanyname" id="inputCompanyname"/>
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputAddress" id="inputAddress">
                    </div>
                </div>
                
                <div class="form-floating">
                    <textarea class="form-control"id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Note</label>
                </div>
                
                <div class="d-grid d-md-flex justify-content-md-end pt-2">
                    <button class="btn btn-dark" type="submit">Save</button>
                </div>

            </form>
            
        </div>
        
        <div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="profile-tab">
            
            <form method="POST" action="{{ route('addCustomer') }}">
                    
                @csrf
                
                <div class="row mb-2 pt-2">
                    <label for="inputForename" class="col-sm-2 col-form-label">First name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputForename" id="inputForename"/>
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="inputLastname" class="col-sm-2 col-form-label">Last name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputLastname" id="inputLastname">
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Mail address</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="inputEmail" id="inputEmail">
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="inputFunction" class="col-sm-2 col-form-label">Position</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputFunction" id="inputFunction">
                    </div>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Note</label>
                </div>

                <div class="form-floating mt-2">
                    <select class="form-select" id="floatingSelect" name="inputCompany" aria-label="Floating label select example">
                        @foreach($companies as $company)
                        
                        <option value="{{ $company->id }}" > {{ $company->companyname }}</option>
                        
                        @endforeach
                    </select>
                    <label for="floatingSelect">Company</label>
                </div>

                <div class="d-grid d-md-flex justify-content-md-end pt-3">
                    <button class="btn btn-dark" type="submit">Save</button>
                </div>
            </form>
            <div class="row row-cols-1 row-cols-md-3 g-4">
       
                @foreach ($companies as $company)
                  
                    <div class="card p-0">
                    <h3 class="card-title bg-secondary text-white p-2">{{ $company->companyname }}</h3>
                    <div class="card-body p-2">
                      
                        <p>{{$company->address}}<br>
                           {{$company->note}}</p>
                      
                      @foreach($company->customers as $customer)
                            {{-- p tag is filled with modal button --}}
                       
                            <p class="bg-dark text-white p-2">{{ $customer->forename }} {{$customer->lastname}}
                                
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
                        
                        </p>                   
                        
                        <p>
                          {{$customer->email}}<br>
                          {{$customer->function}}<br>
                          {{$customer->note}}<br>
                        </p>
                      
                        @endforeach
                    
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">{{ $company->created_at }} / {{ $company->updated_at }}</small>
                    </div>  
                </div>
                
                @endforeach
        </div>
        </div>
        
      </div>
        
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('editCustomer') }}">
                    
                    @csrf
                <div class="row mb-2 pt-2">
                    <label for="inputForename" class="col-sm-2 col-form-label">First name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputForename" id="inputForename"/>
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="inputLastname" class="col-sm-2 col-form-label">Last name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputLastname" id="inputLastname">
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Mail address</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="inputEmail" id="inputEmail">
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="inputFunction" class="col-sm-2 col-form-label">Position</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputFunction" id="inputFunction">
                    </div>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Note</label>
                </div>

                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark text-white">Save changes</button>
                  </div>
                </form>
            </div>
            
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</x-app-layout>
