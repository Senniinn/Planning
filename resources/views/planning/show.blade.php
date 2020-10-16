@extends('layouts.app')

<div class="row justify-content-between col-12">
    <div class="col-4 text-white p-4">
        <h1>{{$planning->name}}</h1>
    </div>
    <div class="col-3 text-right p-4 hover_zoom">
        <a href="{{route('planning')}}">
            <i class="fas fa-4x fa-undo-alt"></i>
        </a>
    </div>
</div>

    <div class="container">
        <div class="zoom">
            @foreach($tasks as $task)
                <div class="text-white mt-3 rounded border" onclick="myFunction({{$task->id}})">
                    <div class="row justify-content-around col-12">
                        <div class="col-4 p-3">
                            <h3>{{date('d / m / Y', strtotime($task->date_task))}}</h3>
                        </div>
                        <div class="col-4 p-3 text-center">
                            <h2>{{$task->task_name}}</h2>
                        </div>
                        <div class="col-4 p-3 text-right">
                            <a href="#">
                                <i class="far fa-2x fa-check-circle"></i>
                            </a>
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
                    <div id="divToggle{{$task->id}}" style="display: none">
                        <p>{{$task->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
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
