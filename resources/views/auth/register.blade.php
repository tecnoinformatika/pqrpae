@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
@endsection
@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  
@endsection


@section('content')
  <div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
      <!-- Register Basic -->
      <div class="card mb-0">
        <div class="card-body">
       
          
            <a href="#" class="brand-logo">
              <img src="/storage/sec.jpg" alt="" style="width: 300px;">
              
            </a>
            
         

          <h4 class="card-title mb-1">P.Q.R y solicitudes PAE Cúcuta 🚀</h4>
          <p class="card-text mb-2">Porfavor identiquese para poder continuar y dejar tus solicitudes!</p>


          <form class="auth-register-form mt-2" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-1">
              <label for="register-username" class="form-label">Nombre completo</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="register-username"
                name="name" placeholder="johndoe" aria-describedby="register-username" tabindex="1" autofocus
                value="{{ old('name') }}" />
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-1">
              <label for="register-email" class="form-label">Correo electrónico</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="register-email"
                name="email" placeholder="john@example.com" aria-describedby="register-email" tabindex="2"
                value="{{ old('email') }}" />
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-1">
              <label class="form-label" for="default-select-multi">Colegio</label>
              <div class="mb-1">
                <select class="select2 form-select" id="listadoColegios" name="colegio_id" required>
                  
                </select>
              </div>
            </div>

            <div class="mb-1">
              <label for="register-password" class="form-label">Contraseña</label>

              <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
                <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror"
                  id="register-password" name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="register-password" tabindex="3" />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-1">
              <label for="register-password-confirm" class="form-label">Confirmar contraseña</label>

              <div class="input-group input-group-merge form-password-toggle">
                <input type="password" class="form-control form-control-merge" id="register-password-confirm"
                  name="password_confirmation"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="register-password" tabindex="3" />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
              <div class="mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="terms" name="terms" tabindex="4" />
                  <label class="form-check-label" for="terms">
                    I agree to the <a href="{{ route('terms.show') }}" target="_blank">terms_of_service</a> and
                    <a href="{{ route('policy.show') }}" target="_blank">privacy_policy</a>
                  </label>
                </div>
              </div>
            @endif
            <button type="submit" class="btn btn-primary w-100" tabindex="5">Registrarse</button>
          </form>

          <p class="text-center mt-2">
            <span>Ya se ha registrado?</span>
            @if (Route::has('login'))
              <a href="{{ route('login') }}">
                <span>Inicie sesión</span>
              </a>
            @endif
          </p>

        </div>
      </div>
      <!-- /Register basic -->
    </div>
  </div>
@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
  <script>
        $.ajax({
          url: 'https://pae.novatics.co/api/colegios',
          type: 'get',
          dataType: 'json',
          success:function(response){
          
          var len = response.length;
          
          $("#listadoColegios").empty();
          for( var i = 0; i<len; i++){
            var id = response[i]['id'];
            var name = response[i]['nombre'];
            
            $("#listadoColegios").append("<option value='"+id+"'>"+name+"</option>");
            
            }
          }
        });
  </script>
@endsection