@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('verifylogin') }}">
        {!! csrf_field() !!}
        <div class="bg">
            <div class="d-flex justify-content-center content">
                <div class="p-5 div_login_color rounded border">
                    <h1 class="text-center text-white">Login</h1>
                    <hr class="mb-5">
                    <div class="form-group mt-2">
                        <label for="email" class="col-8 control-label text-white">Email</label>
                        <div class="col-12">
                            <input type='email' value="damien.genevee@hotmail.fr" class="form-control" name="email" required/>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password" class="col-8 control-label text-white">Password</label>
                        <div class="col-12">
                            <input type='password' class="form-control" name="password" required/>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button type="submit" class="btn btn-primary center p-2">
                            Connexion
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
