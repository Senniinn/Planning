@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pas register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('update', $planning->plan_id) }}">
                    {{ csrf_field() }}
                    <!-- NOM PLAN -->
                        <div class="form-group">
                            <label for="planning_name" class="col-md-4 control-label">Nom du Planning</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="planning_name" value="{{$planning->name}}" required>
                            </div>
                        </div>
                        <!-- DATE PLAN -->
                        <div class="form-group">
                            <label for="planning_date" class="col-md-4 control-label">Date du Planning</label>
                            <div class='input-group date' id='datetimepicker3'>
                                <div class="col-md-12">
                                    <input type='date' class="form-control" name="planning_date" value="{{$planning->date}}" required/>
                                </div>
                            </div>
                        </div>

                        <input type='hidden' name="type_id" value="{{$planning->type_id}}"/>

                        @foreach($tasks as $key => $task)
                            <div id="taskBloc">
                                <h3>Task n° {{$key+1}}</h3>
                                <a href="/task/delete/{{$planning->plan_id}}/{{$task->task_id}}">
                                    Supprimer
                                </a>
                                <div class="form-group">
                                    <!-- NOM TACHE -->
                                    <label for="task_name{{$key+1}}" class="col-md-4 control-label">Nom de la tache</label>
                                    <div class="col-md-6">
                                        <input type='text' class="form-control" name="task_name{{$key+1}}" value="{{$task->task_name}}" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- DATE DEBUT TASK -->
                                    <label for="start_task_date{{$key+1}}" class="col-md-4 control-label">Date Début Tache</label>
                                    <div class='input-group date' id='datetimepicker3'>
                                        <div class="col-md-12">
                                            <input type='time' class="form-control" name="start_task_date{{$key+1}}" value="{{$task->start}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- DATE FIN TASK -->
                                    <label for="end_task_date{{$key+1}}" class="col-md-4 control-label">Date Fin Tache</label>
                                    <div class='input-group date' id='datetimepicker3'>
                                        <div class="col-md-12">
                                            <input type='time' class="form-control" name="end_task_date{{$key+1}}" value="{{$task->end}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- DESCRIPTION -->
                                    <label name="description{{$key+1}}s" for="description" class="col-md-4 control-label">Description</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="description{{$key+1}}" rows="3">{{$task->description}}</textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="id_task" value="{{$task->task_id}}">
                        @endforeach

                            <div id="{{$count_task_next}}"></div>
                            <span id="button">
                                <button type="button" onclick="addBloc()">Add</button>
                            </span>
                            <input id="count_task" type="hidden" name="count_task" value="{{$count_task}}"/>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="{{route('planning')}}" class="btn btn-danger">Retour</a>
                                    <button type="submit" class="btn btn-primary">
                                        Modifier
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    var i = document.getElementById("count_task").value;
    i = parseInt(i, 10);
    function addBloc() {
        document.getElementById("count_task").value++;
        i++;
        var mesTaches = document.getElementById(i);
        mesTaches.innerHTML += "<div id=\"taskBloc\">\n" +
            "                            <h3>Task n° "+ i +"</h3>\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <!-- NOM TACHE -->\n" +
            "                                    <label for=\"task_name\" class=\"col-md-4 control-label\">Nom de la tache</label>\n" +
            "                                    <div class=\"col-md-6\">\n" +
            "                                        <input type='text' class=\"form-control\" name=\"task_name"+i+"\" required/>\n" +
            "                                    </div>\n" +
            "                            </div>\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <!-- DATE DEBUT TASK -->\n" +
            "                                <label for=\"start_task_date\" class=\"col-md-4 control-label\">Date Début Tache</label>\n" +
            "                                <div class='input-group date' id='datetimepicker3'>\n" +
            "                                    <div class=\"col-md-12\">\n" +
            "                                        <input type='time' class=\"form-control\" name=\"start_task_date"+i+"\" required/>\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <!-- DATE FIN TASK -->\n" +
            "                                <label for=\"end_task_date\" class=\"col-md-4 control-label\">Date Fin Tache</label>\n" +
            "                                <div class='input-group date' id='datetimepicker3'>\n" +
            "                                    <div class=\"col-md-12\">\n" +
            "                                        <input type='time' class=\"form-control\" name=\"end_task_date"+i+"\" required/>\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <!-- DESCRIPTION -->\n" +
            "                                <label name=\"description\" for=\"description\" class=\"col-md-4 control-label\">Description</label>\n" +
            "                                <div class=\"col-md-6\">\n" +
            "                                    <textarea class=\"form-control\" name=\"description"+i+"\" rows=\"3\"></textarea>\n" +
            "                                </div>\n" +
            "                            </div>" +
            "<button type=\"button\" onclick=\"deleteBloc(i)\">Delete</button>" +
            "<div id=\""+(i+1)+"\"></div>";
    }
    function deleteBloc(index) {
        document.getElementById("count_task").value--;
        i = i - 1;
        var bloc = document.getElementById(index);
        while (bloc.firstChild) {
            bloc.removeChild(bloc.firstChild);
        }

    }
</script>
