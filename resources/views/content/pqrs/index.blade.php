@extends('layouts/contentLayoutMaster')

@section('title', 'PQRs PAE')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-knowledge-base.css')) }}">
@endsection

@section('content')
<!-- Knowledge base Jumbotron -->
<section id="knowledge-base-search">
  <div class="row">
    <div class="col-12">
      <div
        class="card knowledge-base-bg text-center"
        style="background-image: url('{{asset('images/banner/banner.png')}}')"
      >
        <div class="card-body">
          <h2 class="text-primary">Solicitudes por ejes y o componentes PAE</h2>
          
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Knowledge base Jumbotron -->

<!-- Knowledge base -->
<section id="knowledge-base-content">
  <div class="row kb-search-content-info match-height">
    <!-- sales card -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{url('pqrs/pqr/Técnico - alimentos')}}">
          <img
            src="{{asset('images/illustration/sales.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />

          <div class="card-body text-center">
            <h4>Técnico - alimentos</h4>
            
          </div>
        </a>
      </div>
    </div>

    <!-- marketing -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{url('pqrs/pqr/Nutricional')}}">
          <img
            src="{{asset('images/illustration/marketing.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Nutricional</h4>
            
          </div>
        </a>
      </div>
    </div>

    <!-- api -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{url('pqrs/pqr/Jurídico')}}">
          <img src="{{asset('images/illustration/api.svg')}}" class="card-img-top" alt="knowledge-base-image" />
          <div class="card-body text-center">
            <h4>Jurídico</h4>
            
          </div>
        </a>
      </div>
    </div>

    <!-- personalization -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{url('pqrs/pqr/Financiero')}}">
          <img
            src="{{asset('images/illustration/personalization.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Financiero</h4>
            
          </div>
        </a>
      </div>
    </div>

    <!-- email -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{url('pqrs/pqr/Supervisión')}}">
          <img
            src="{{asset('images/illustration/email.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Supervisión</h4>
          </div>
        </a>
      </div>
    </div>

    <!-- demand -->



  </div>
</section>
<!-- Knowledge base ends -->
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/page-knowledge-base.js')) }}"></script>
@endsection
