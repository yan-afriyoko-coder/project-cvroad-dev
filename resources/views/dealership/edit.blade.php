@extends('layouts.user_type.auth')
@section('content')
<main>
<!-- Cover Photo Modal -->
<div class="modal fade" id="updateCoverPhotoModal" tabindex="-1" aria-labelledby="updateCoverPhotoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateCoverPhotoModalLabel">Update Cover Photo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
          @csrf
          <div class="form-group">
            <label for="cover_photo">Cover Photo</label>
            <input type="file" class="form-control" name="cover_photo">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-main">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Logo Modal -->
<div class="modal fade" id="updateLogoModal" tabindex="-1" aria-labelledby="updateLogoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateLogoModalLabel">Update Logo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('dealership.logo')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-body">        
          @csrf
          <div class="form-group">
            <label for="cover_photo">Logo</label>
            <input type="file" class="form-control" name="logo">
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-main">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

    <div class="main">
      @component('components.header', ['dealership' => $dealership])        
      @endcomponent
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="underscore mb-5">My  <span class="green">Dealer</span></h2>
                  <div class="line"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center mb-2">
                        <h6>{{$dealership->dname}}</h6>
                    </div>
                    <div class="card-body text-center">
                        <p>Cover Photo</p>
                        <img class="mx-auto" src="{{asset('uploads/coverphoto/'.$dealership->cover_photo)}}" style="max-width: 100%" alt="">
                        <button type="button" class="btn main-btn mt-2" data-bs-toggle="modal" data-bs-target="#updateCoverPhotoModal">
                          <i class="fas fa-edit"></i> Update Cover Photo
                        </button>
                        <div class="mb-5"></div>

                        <p>logo</p>
                        <img class="mx-auto" src="{{asset('uploads/logo/'.$dealership->logo)}}" style="max-width: 50%" alt="">
                        <br>
                        
                        <button type="submit" class="btn main-btn mt-2" data-bs-toggle="modal" data-bs-target="#updateLogoModal">
                          <i class="fas fa-edit"></i> Update Logo
                        </button>
                    </div>
                </div>               
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6>Dealership Information</h6>                        
                    </div>
                    <div class="card-body">
                      <form action="{{route('dealership.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                          <label for="dname">Dealership name</label>
                          <input type="text" name="dname" class="form-control" value="{{$dealership->dname}}">
                        </div>
                        <div class="form-group mt-3">
                          <label for="dname">Province</label>
                          <select name="province" class="form-control">
                            @foreach ($provinces as $province)
                              <option value="{{$province->name}}" {{$dealership->province === $province->name ? 'selected' : '' }}>{{$province->name}}</option>                              
                            @endforeach
                          </select>                        
                        </div>
                        <div class="form-group mt-3">
                          <label for="address">Address</label>
                          <input type="text" name="address" class="form-control" value="{{$dealership->address}}">
                        </div>
                        <div class="form-group mt-3">
                          <label for="phone">Phone</label>
                          <input type="text" name="phone" class="form-control" value="{{$dealership->phone}}">
                        </div>
                        <div class="form-group mt-3">
                          <label for="website">Website</label>
                          <input type="text" name="website" class="form-control" value="{{$dealership->website}}">
                        </div>
                        <div class="form-group mt-3">
                          <label for="slogan">Slogan</label>
                          <input type="text" name="slogan" class="form-control" value="{{$dealership->slogan}}">
                        </div>
                        <div class="form-group mt-3">
                          <label for="description">Description</label>                        
                          <textarea name="description" cols="30" rows="3" class="form-control">
                            {{$dealership->description}}
                          </textarea> 
                        </div>

                        <button type="submit" class="btn main-btn mt-3"> <i class="fas fa-save"></i> Update Dealer</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>    

            
            
        
      </div>
    </div>
</main>        


@endsection