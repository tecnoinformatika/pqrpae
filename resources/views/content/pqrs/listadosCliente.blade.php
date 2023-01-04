
@extends('layouts/contentLayoutMaster')

@section('title', 'Bootstrap Tables')

@section('content')

<!-- Table without card End -->

<!-- Responsive tables start -->
<div class="row" id="table-responsive">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">listado de PQRs realizados anteriormente</h4>
      </div>
 
      <div class="table-responsive">
        <table class="table mb-0">
          <thead>
            <tr>
              <th scope="col" class="text-nowrap">#</th>
              <th scope="col" class="text-nowrap">Fecha</th>
              <th scope="col" class="text-nowrap">Asunto</th>
              <th scope="col" class="text-nowrap">Componente</th>
              <th scope="col" class="text-nowrap">Colegio</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pqrs as $pqr)
              <tr>
                <td class="text-nowrap">{{$pqr->id}}</td>
                <td class="text-nowrap">{{$pqr->created_at}}</td>
                <td class="text-nowrap">{{$pqr->asunto}}</td>
                <td class="text-nowrap">{{$pqr->componente}}l</td>
                <td class="text-nowrap">{{$pqr->colegio}}</td>
                
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Responsive tables end -->
@endsection
