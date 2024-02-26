@extends('layouts.app')
@section('content')
<div class="container">
    @component('components.alert')                
    @endcomponent
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
       
            <div class="card-header">{{ __('Job seeker Registeration') }}</div>

       @if(Session::has('message'))
                 <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

            <div class="card-body">
          
            <form method="POST" action="{{ route('deal.register')}}"class="p-5 bg-white">
                        @csrf

                        <input type="hidden" value="employer" name="user_type">
                        <div class="form-group row">
                    
                            <div class="col-md-4 col-form-label text-md-right">Dealership Name</div>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Dealership Name" class="form-control{{ $errors->has('dname') ? ' is-invalid' : '' }}" name="dname" value="{{ old('dname') }}" required autofocus>

                                @if ($errors->has('dname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                    
                            <div class="col-md-4 col-form-label text-md-right">Email</div>

                            <div class="col-md-6">
                                <input id="email" type="text" placeholder="Dealer Branch Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                    
                            <div class="col-md-4 col-form-label text-md-right">Password</div>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right">Confirm password</div>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
          </div>


     </div>
   </div>
@endsection
