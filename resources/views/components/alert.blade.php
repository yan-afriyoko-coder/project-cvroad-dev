<div class="row">
    <div class="col-md-12">
      
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Error!</strong> {{$errors->first()}}
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{session('success')}}
        </div>
        @endif
    </div>
  </div>

{{-- <div class="row">
    <div class="col-md-12">
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            {{$errors->first()}}
        </div>            
        @endif
        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                {{session('success')}}
          </div>
        @endif
    </div>        
</div>  --}}
