
@extends('layouts/contentLayoutMaster')

@section('title', 'Crea tu PQR')

@section('vendor-style')
  <link rel="stylesheet" href="{{asset(mix('vendors/css/forms/select/select2.min.css'))}}">
  <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/katex.min.css'))}}">
  <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/monokai-sublime.min.css'))}}">
  <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/quill.snow.css'))}}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/plugins/forms/form-quill-editor.css'))}}">
<link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/pages/page-blog.css'))}}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">
@endsection

@section('content')
<!-- Blog Edit -->
<div class="blog-edit-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start">
            <div class="avatar me-75">
              <img src="{{asset('images/portrait/small/avatar-s-9.jpg')}}" width="38" height="38" alt="Avatar" />
            </div>
            <div class="author-info">
              <h6 class="mb-25">{{Auth::user()->name}}</h6>
              <p class="card-text">{{$fecha}}</p>
            </div>
          </div>
          <!-- Form -->
          <form id="form1" class="add-new-user modal-content pt-0" method="POST" action="{{ route('crearPqr') }}" role="form" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label" for="blog-edit-title">Asunto</label>
                  <input
                    type="text"
                    id="asunto"
                    class="form-control validar"
                    name="asunto"
                    
                    value=""
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label" for="blog-edit-category">Colegio</label>
                  <select id="listadoColegios" name="colegio_id" class="select2 form-select form-control" >
                    
                    
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label" for="blog-edit-slug">Componente</label>
                  <input
                    type="text"
                    id="componente"
                    name="componente"
                    
                    class="form-control validar"
                    value="{{$componente}}"
                  />
                </div>
              </div>
           
              <div class="col-12">
                <div class="mb-2">
                  <label class="form-label">Mensaje</label>
                    <textarea
                        class="form-control validar"
                        id="exampleFormControlTextarea1"
                        rows="3"
                        name="mensaje"                        >
                    </textarea>
                </div>
              </div>
              <div class="mb-1">
                <label for="customFile1" class="form-label">Adjunto</label>
                <input class="form-control validar" type="file" id="adjunto"  name="adjunto">
              </div>
              <div class="col-12 mt-50">
                <button type="submit" class="btn btn-primary me-1">Guardar</button>
              </div>
            </div>
          </form>
          <!--/ Form -->
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Blog Edit -->
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/select/select2.full.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/editors/quill/katex.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/editors/quill/highlight.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/editors/quill/quill.min.js'))}}"></script>

<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/page-blog-edit.js'))}}"></script>
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
    
    var jqForm = $('#form1');
    if (jqForm.length) {
    jqForm.validate({
      rules: {
        'exampleFormControlTextarea1': {
         required : true
        },
        'asunto': {
          required: true
        },
        'componente': {
          required: true
        },
        'listadoColegios': {
          required: true
        },
      }
    });
  }
</script>
@endsection
