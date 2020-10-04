@extends('layouts.app')

    <div class="container">
        <section style="margin-top: 8%">
            @foreach($tasks as $task)
                <div class="row" onclick="myFunction({{$task->task_id}})" style="background-color: beige; margin-top: 2%">
                    <div class="col-md-12" style="text-align: center">
                        <div>
                            <h3>{{$task->task_name}}</h3>
                            <h4>{{$task->start}}</h4>
                            <h4>{{$task->end}}</h4>
                        </div>
                        <div id="divToggle{{$task->task_id}}" style="display: none">
                            <p>{{$task->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
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
