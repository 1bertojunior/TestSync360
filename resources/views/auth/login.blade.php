@extends('layouts.auth')
@section('content')

<div class="card-body p-3 p-md-4 p-xl-5">
  <div class="row">
      <div class="col-12">
      <div class="mb-4">
          <h3>Login</h3>                            
      </div>
  </div>
  <form method="POST" action="{{ route('login') }}">
    @csrf
      <div class="row gy-3 overflow-hidden">
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="email@provedor.com" required autocomplete="email" autofocus>
            <label for="email" class="form-label">E-mail</label>
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Senha" required autocomplete="current-password">
            <label for="password" class="form-label">Senha</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label text-secondary" for="remember">
              Manter sessão
            </label>
          </div>
        </div>
        <div class="col-12">
          <div class="d-grid">
            <button class="btn btn-primary btn-lg" type="submit">Entrar</button>
          </div>
        </div>
      </div>
  </form>
  <div class="row">
      <div class="col-12">
          <div class="d-flex flex-column flex-md-row justify-content-md-between mt-3">
              <a href="#!" class="mb-3 mb-md-0">Esqueci minha senha</a>
              <p>Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se!</a></p>
          </div>
      </div>
  </div>                        
</div>

@endsection


