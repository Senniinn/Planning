@extends('layouts.app')

@section('content')
<div class="row body">
    <div class="col-9 div_left">
        <div class="container">
            @foreach($plannings as $planning)
                <div class="zoom">
                    <div class="text-white mt-3 rounded border">
                        <div class="d-flex justify-content-between" onclick="location.href='{{route('show', ['plan' => $planning->id])}}';">
                            <div class="pt-5 pl-5 pr-5 pb-3 col-4">
                                <h2>
                                    {{$planning->name}}
                                </h2>
                            </div>
                            <div class="pt-5 pl-5 pr-5 pb-3 col-2">
                                @if($planning->type_id == 1)
                                    <i class="fas fa-calendar-day fa-3x" title="1 Jour"></i>
                                @elseif($planning->type_id == 2)
                                    <i class="fas fa-calendar-week fa-3x" title="1 Weekend"></i>
                                @else
                                    <i class="fas fa-calendar-alt fa-3x" title="1 Semaine"></i>
                                @endif
                            </div>
                            <div class="pt-5 pl-5 pr-5 pb-3 col-3">
                                <h3>
                                    {{date('d / m / Y', strtotime($planning->date))}}
                                </h3>
                            </div>
                            <div class="pt-5 pl-5 pr-5 pb-3 col-3">
                                <div class="row btn_index">
                                    <div class="ml-5">
                                        <a class="btn btn-info mr-2" href="{{route('edit', ['plan' => $planning->id])}}">
                                            <i class="fa fa-2x fa-pencil-alt" ></i>
                                        </a>
                                        <a class="btn btn-danger ml-2" href="{{route('delete', ['plan' => $planning->id])}}">
                                            <i class="fa fa-2x fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 col-9 ml-4">
                            <div class="progress">
                                <div class="progress-bar"
                                     role="progressbar"
                                     style="width: {{$planning->tasks->where('done', true)->count()/$planning->getTasksCount()*100}}%;
                                             @if($planning->tasks->where('done', true)->count()/$planning->getTasksCount()*100 < 34)
                                             background: #F3AB6A;
                                             @elseif($planning->tasks->where('done', true)->count()/$planning->getTasksCount()*100 < 67)
                                             background: #F6E15B;
                                             @else
                                             background: #6FCB92;
                                             @endif"
                                     aria-valuenow="45"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                    <strong>{{$planning->tasks->where('done', true)->count()}} / {{$planning->getTasksCount()}}</strong>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-3 div_right">
        <a href="#exampleModal" data-toggle="modal">
            <div class="add_plan_div text-center">
                <i class="far fa-calendar-plus fa-10x icon" style="margin-top: 55%"></i>
                <h1 class="mt-3">
                    AJOUTER
                </h1>
            </div>
        </a>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title" id="exampleModalLabel">Planning de combien de jour ?</h5>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <div class="col p-3">
                        <a href="{{route('create', 1)}}" class="btn btn-info ml-4" role="button">1 Jour</a>
                    </div>
                    <div class="col p-3">
                        <a href="{{route('create', 2)}}" class="btn btn-info" role="button">1 Weekend</a>
                    </div>
                    <div class="col p-3">
                        <a href="{{route('create', 3)}}" class="btn btn-info" role="button">1 Semaine</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-right: 43%">Retour</button>
            </div>
        </div>
    </div>
</div>
@endsection

