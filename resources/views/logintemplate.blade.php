@extends('layouts.app')

@section('content')
    <div class="bg">
        <div class="d-flex justify-content-center content">
            <div class="p-5 div_login_color rounded border">
                <h1 class="text-center text-white">Login</h1>
                <hr class="mb-5">
                <div class="form-group mt-2">
                    <label for="username" class="col-8 control-label text-white">Username</label>
                    <div class="col-12">
                        <input type='text' class="form-control" name="username" required/>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="password" class="col-8 control-label text-white">Password</label>
                    <div class="col-12">
                        <input type='text' class="form-control" name="password" required/>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <a href="{{route('planning')}}" class="btn btn-primary center p-2" style="font-family: 'Roboto', sans-serif; font-size: 20px;">Connexion</a>
                </div>
            </div>
        </div>
    </div>
@endsection