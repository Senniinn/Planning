@extends('layouts.app')

<div class="row body">
    <div class="col-9">
        <table class="table text-white" style="text-align: center;">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col" style="text-align: center;">Nom</th>
                <th scope="col" style="text-align: center;">Type</th>
                <th scope="col" style="text-align: center;">Date</th>
                <th scope="col" style="text-align: center;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($plannings as $planning)
            <tr>
                <th scope="row">{{$planning->plan_id}}</th>
                <td><a href="{{route('show', ['plan' => $planning->plan_id])}}">{{$planning->name}}</a></td>
                <td>{{$planning->type_name}}</td>
                <td>{{$planning->date}}</td>
                <td>
                    <a href="{{route('edit', ['plan' => $planning->plan_id])}}">
                        <img style="padding: 5px" src="{{asset('/images/modif.png')}}">
                    </a>
                    <a href="{{route('delete', ['plan' => $planning->plan_id])}}">
                        <img style="padding: 5px" src="{{asset('/images/supp.png')}}">
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <div class="container">
            @foreach($plannings as $planning)
                <div>
                    <div class="d-flex justify-content-between bg-dark text-white mt-3 rounded border border-info">
                        <div class="p-4">
                            <h2>
                                {{$planning->name}}
                            </h2>
                        </div>
                        <div class="p-4">
                            <h2>
                                {{$planning->type_name}}
                            </h2>
                        </div>
                        <div class="p-4">
                            <h2>
                                {{$planning->date}}
                            </h2>
                        </div>
                        <div class="p-4">
                            <div class="row">
                                <a href="{{route('edit', ['plan' => $planning->plan_id])}}">
                                    <img style="padding: 5px" src="{{asset('/images/modif.png')}}">
                                </a>
                                <a href="{{route('delete', ['plan' => $planning->plan_id])}}">
                                    <img style="padding: 5px" src="{{asset('/images/supp.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-3" id="img_right" style="background-image: url({{'/images/nav.png'}})">
        <a href="#exampleModal" data-toggle="modal">
        </a>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choisir un type</h5>
            </div>
            <div class="modal-body">
                <a href="{{route('create', 1)}}" class="btn btn-success" role="button" style="margin-left: 17%">1 Jour</a>
                <a href="{{route('create', 2)}}" class="btn btn-success" role="button" style="margin-left: 10%">1 Weekend</a>
                <a href="{{route('create', 3)}}" class="btn btn-success" role="button" style="margin-left: 10%">1 Semaine</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 43%">Retour</button>
            </div>
        </div>
    </div>
</div>

