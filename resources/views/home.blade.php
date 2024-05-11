@extends('layouts.app')

@section('content')
<div class="container">

    <div id="alertPage" class="alert alertPage" style="display: block;">
      <i class=""></i>   
    </div>

    <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{ $user->profile_image  }}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $user->full_name }}</h5>
              
              @if($user->date_of_birth)
                  <p class="text-muted mb-2"><i class="fas fa-calendar-alt"></i> {{ $user->birthdate->format('d/m/Y') }}</p>
              @else
                 Data de nascimento não cadastrada*</p>
              @endif

              <button type="button" class="btn btn-secondary btn-lg btn-block">Editar <i class="fas fa-edit"></i></button>              
            </div>
          </div>

        </div>

        <div class="col-lg-8">
  
          <div class="card mb-4">

            <div class="card-body">

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0"><i class="fas fa-user mr-1"></i> Nome completo</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->full_name  }}</p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0"><i class="fas fa-envelope mr-1"></i> E-mail</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0"><i class="fas fa-phone mr-1"></i> Telefone</p>
                </div>
                <div class="col-sm-9">
                  @if($user->phone)
                      <p class="text-muted mb-0">{{ $user->phone }}</p>
                  @else
                      <p class="text-muted mb-2">Telefone não cadastrado*</p>
                  @endif
                </div>                
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0"><i class="fas fa-map-marker-alt mr-1"></i> Endereço</p>
                </div>
                <div class="col-sm-9" id="address">
                  @if($addresses->isNotEmpty())
                      <p class="text-muted mb-0">
                        {{ $addresses->last()->address }} 
                        <i class="fas fa-edit" style="cursor: pointer;" onclick="openEditModal()"></i>
                      </p>
                      
                  @else
                      <a href="#" data-toggle="modal" data-target="#addressModal" class="text-primary text-decoration-none">
                          <p class="text-muted mb-0">Cadastrar endereço <i class="fas fa-plus"></i></p>
                      </a>
                  @endif                  
                </div>
              
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0"><i class="fas fa-user mr-1"></i> Biografia</p>
                </div>
                <div class="col-sm-9">
                  @if($user->bio)
                      <p class="text-muted mb-0">{{ $user->bio }}</p>
                  @else
                      <p class="text-muted mb-2">Biografia não cadastrada*</p>
                  @endif
                </div>
              </div>

            </div>

          </div> 

        </div>
      </div>
    </div>
</div>

@endsection


<!-- Modal -->
{{-- <div class="modal fade modal-dialog modal-lg" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="addressModalLabel">Cadastrar Endereço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form method="POST" action="{{ route('addresses.store') }}">
          @csrf
          <!-- Search input-->
          <div class="form-group row">
            <label class="col-md-2 control-label" for="CEP">CEP <h11><span class="text-danger">*</span></h11></label>
            <div class="col-md-4">
              <input id="postal_code" name="postal_code" placeholder="Apenas números" class="form-control" required="" value="" type="search" maxlength="9" pattern="[0-9]{5}-[0-9]{3}" onkeyup="formatPostalCode(this)">

            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2 col-form-label" for="prependedtext">Rua<h11><span class="text-danger">*</span></h11></label>
            <div class="col-md-6">
              <input id="street" name="street" class="form-control" placeholder="Rua Av fulanno de tal" required="" type="text">
            </div>

            <label class="col-md-1 col-form-label" for="prependedtext">N°</label>
            <div class="col-md-2">
              <input id="number" name="number" class="form-control" placeholder="" type="number">
            </div>

          </div>

          <div class="form-group row">
            <label class="col-md-2 col-form-label" for="prependedtext">Bairro<h11><span class="text-danger">*</span></h11></label>
            <div class="col-md-2">
              <input id="neighborhood" name="neighborhood" class="form-control" placeholder="Centro" required="" type="text">
            </div>

            <label class="col-md-1 col-form-label" for="prependedtext">Cidade<h11><span class="text-danger">*</span></h11></label>
            <div class="col-md-3">
              <input id="city" name="city" class="form-control" placeholder="Belém do Piauí" required="" type="text"  readonly="readonly">
            </div>

            <label class="col-md-1 col-form-label" for="prependedtext">Estado<h11><span class="text-danger">*</span></h11></label>
            <div class="col-md-2">
              <input id="state" name="state" class="form-control" placeholder="PI" required="" type="text"  readonly="readonly">
            </div>

          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnCadastrar">
                <i class="fas fa-save"></i> Cadastrar
            </button>
          </div>

        </form>        

      </div>
    </div>
  </div>
</div> --}}

@include('components.address_modal', [
  'modal' => [
    'id' => 'address',
    'title' => "Cadastrar endereço"
  ]
])

<script src="{{ asset('js/address.js') }}"></script>
