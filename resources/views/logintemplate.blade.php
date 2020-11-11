@extends('layouts.app')

@section('content')
    <div class="bg">
        <div class="d-flex justify-content-center">
            <div class="p-4 div_color rounded border col-3">
                <div class="form-group mt-2">
                    <label for="username" class="col-8 control-label">Username</label>
                    <div class="col-12">
                        <input type='text' class="form-control" name="username" required/>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="password" class="col-8 control-label">Password</label>
                    <div class="col-12">
                        <input type='text' class="form-control" name="password" required/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection