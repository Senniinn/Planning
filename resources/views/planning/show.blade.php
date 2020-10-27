@extends('layouts.app')

@section('content')
<div class="row justify-content-between col-12">
    <div class="col-4 text-white p-4">
        <h1>{{$planning->name}}</h1>
    </div>
    <div class="col-3 text-right p-4 hover_zoom">
        <a href="{{route('planning')}}">
            <i class="fas fa-3x fa-undo-alt"></i>
        </a>
    </div>
</div>

    <div class="container">
        @foreach($tasks as $task)
            <div class="zoom">
                <div class="text-white mt-3 rounded border" onclick="myFunction({{$task->id}})">
                    <div class="row justify-content-around col-12">
                        <div class="col-4 p-3">
                            <h3>{{date('d / m / Y', strtotime($task->date_task))}}</h3>
                        </div>
                        <div class="col-4 p-3 text-center">
                            <h2>{{$task->task_name}}</h2>
                        </div>
                        <div class="col-4 p-3 text-right">
                            @if($task->done != true)
                            <a href="/task/update_done/{{$planning->id}}/{{$task->id}}">
                                <div class="d-flex justify-content-end">
                                    <div class="row rounded border p-2 highlight pl-1 pr-1">
                                        <h3 class="pr-3">Done</h3>
                                        <i class="far fa-2x fa-check-circle"></i>
                                    </div>
                                </div>
                            </a>
                            @else
                            <a href="/task/update_done/{{$planning->id}}/{{$task->id}}">
                                <div class="d-flex justify-content-end">
                                    <div class="row rounded border p-2 highlight pl-1 pr-1" style="background-color: #67b168;">
                                        <h3 class="pr-3">Done</h3>
                                        <i class="far fa-2x fa-check-circle"></i>
                                    </div>
                                </div>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-center col-12 text-center p-4">
                        <div class="col-2">
                            <h4>{{$task->start}}</h4>
                        </div>
                        <div class="col-1">
                            <i class="fas fa-2x fa-long-arrow-alt-right"></i>
                        </div>
                        <div class="col-2">
                            <h4>{{$task->long}}</h4>
                        </div>
                        <div class="col-1">
                            <i class="fas fa-2x fa-long-arrow-alt-right"></i>
                        </div>
                        <div class="col-2">
                            <h4>{{$task->end}}</h4>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div id="divToggle{{$task->id}}" class="text-center col-9" style="display: none">
                            <hr>
                            <p class="mt-4 mb-4">{{$task->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

<script>
    function myFunction(id) {
            var x = document.getElementById("divToggle"+id);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
        }
    }
</script>
@endsection
