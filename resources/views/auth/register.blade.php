@extends('layouts.auth')

@section('content')

<div class="card-body p-3 p-md-4 p-xl-5">

    <div class="row">
        <div class="col-12">
        <div class="mb-4">
            <h3>Cadastro</h3>                            
        </div>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="row gy-3 overflow-hidden">
            <div class="col-6">
              <div class="form-floating mb-3">
                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                <label for="first_name" class="form-label">Nome</label>
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-6">
                <div class="form-floating mb-3">
                  <input type="last_name" class="form-control" name="last_name" id="last_name" placeholder="Sobrenome" required>
                  <label for="last_name" class="form-label">Sobrenome</label>
                  @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
              </div>
        </div> 

        <div class="row gy-3 overflow-hidden">
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" id="email" placeholder="email@provedor.com" required>
              <label for="email" class="form-label">E-mail</label>
            </div>
          </div>
        </div> 

         <div class="row gy-3 overflow-hidden">
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <label for="password" class="form-label">Senha</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <label for="profile_image" class="form-label">Confirmar senha</label>
                </div>
            </div>
            
        </div> 
        
        {{-- <div class="row gy-3 overflow-hidden">
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
                    <label for="date_of_birth" class="form-label">Data de Nascimento</label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" name="profile_image" id="profile_image" required>
                    <label for="profile_image" class="form-label">Imagem de Perfil</label>
                </div>
            </div>
        </div>  --}}
        {{-- <div class="row gy-3 overflow-hidden">
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="street" id="street" placeholder="Rua" required>
                    <label for="street" class="form-label">Rua</label>
                </div>
            </div>
        </div>
        <div class="row gy-3 overflow-hidden">
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="neighborhood" id="neighborhood" placeholder="Bairro" required>
                    <label for="neighborhood" class="form-label">Bairro</label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="state" id="state" placeholder="Estado" required>
                    <label for="state" class="form-label">Estado</label>
                </div>
            </div>
        </div> --}}
        {{-- <div class="row gy-3 overflow-hidden">
            <div class="col-12">
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="biography" id="biography" placeholder="Biografia" required></textarea>
                    <label for="biography" class="form-label">Biografia</label>
                </div>
            </div>
        </div> --}}

        <div class="col-12">
            <div class="d-grid">
              <button class="btn btn-primary btn-lg" type="submit">Cadastrar</button>
            </div>
          </div>

    </form>

</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row">
                <div class="col-12">
                <div class="mb-4">
                    <h3 class="center">Cadastro</h3>                            
                </div>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="row gy-3 overflow-hidden">
                    <div class="col-6">
                      <div class="form-floating mb-3">
                        <input type="first_name" class="form-control" name="first_name" id="first_name" placeholder="Nome" required>
                        <label for="first_name" class="form-label">Nome</label>
                      </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                          <input type="last_name" class="form-control" name="last_name" id="last_name" placeholder="Sobrenome" required>
                          <label for="last_name" class="form-label">Sobrenome</label>
                        </div>
                      </div>
                </div> 

                <div class="row gy-3 overflow-hidden">
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" name="email" id="email" placeholder="email@provedor.com" required>
                      <label for="email" class="form-label">E-mail</label>
                    </div>
                  </div>
                </div> 
                
                <div class="row gy-3 overflow-hidden">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
                            <label for="date_of_birth" class="form-label">Data de Nascimento</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" name="profile_image" id="profile_image" required>
                            <label for="profile_image" class="form-label">Imagem de Perfil</label>
                        </div>
                    </div>
                </div> 
                <div class="row gy-3 overflow-hidden">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="street" id="street" placeholder="Rua" required>
                            <label for="street" class="form-label">Rua</label>
                        </div>
                    </div>
                </div>
                <div class="row gy-3 overflow-hidden">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="neighborhood" id="neighborhood" placeholder="Bairro" required>
                            <label for="neighborhood" class="form-label">Bairro</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="state" id="state" placeholder="Estado" required>
                            <label for="state" class="form-label">Estado</label>
                        </div>
                    </div>
                </div>
                <div class="row gy-3 overflow-hidden">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="biography" id="biography" placeholder="Biografia" required></textarea>
                            <label for="biography" class="form-label">Biografia</label>
                        </div>
                    </div>
                </div>
                

            </form>

              
        </div>
    </div>
</div> --}}
@endsection
  {{-- <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div> --}}