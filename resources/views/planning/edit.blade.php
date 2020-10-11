@extends('layouts.app')
<div class="div_left text-white body">
    <form class="form-horizontal" method="POST" action="{{ route('update', $planning->plan_id) }}">
        {{ csrf_field() }}
        <div class="d-flex justify-content-center">
            <div class="col-2 p-4 div_color rounded border mt-2">
                <!-- NOM PLAN -->
                <div class="form-group">
                    <label for="planning_name">Nom du Planning</label>
                    <div>
                        <input type="text" class="form-control" name="planning_name" value="{{$planning->name}}" required>
                    </div>
                </div>
                <!-- DATE PLAN -->
                <div class="form-group">
                    <label for="planning_date">Date du Planning</label>
                    <div class='input-group date' id='datetimepicker3'>
                        <div>
                            <input type='date' class="form-control" name="planning_date" value="{{$planning->date}}" required/>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-primary p-2" onclick="addBloc()">
                        Ajouter une tache
                    </button>
                </div>
            </div>
        </div>

        <input type='hidden' name="type_id" value="{{$planning->type_id}}"/>

        <div class="d-flex justify-content-around mt-3">
            @foreach($tasks as $key => $task)
                <div class="p-4 div_color rounded border col-3">
                    <div class="d-flex justify-content-between">
                        <h3>Task n° {{$key+1}}</h3>
                        <a href="/task/delete/{{$planning->plan_id}}/{{$task->task_id}}">
                            <i class="fa fa-2x fa-trash-alt"></i>
                        </a>
                    </div>
                    <div class="form-group mt-2">
                        <!-- NOM TACHE -->
                        <label for="task_name{{$key+1}}" class="col-8 control-label">Nom de la tache</label>
                        <div class="col-12">
                            <input type='text' class="form-control" name="task_name{{$key+1}}" value="{{$task->task_name}}" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- DATE DEBUT TASK -->
                        <label for="start_task_date{{$key+1}}" class="col-8 control-label">Date Début Tache</label>
                        <div class='input-group date' id='datetimepicker3'>
                            <div class="col-12">
                                <input type='time' class="form-control" name="start_task_date{{$key+1}}" value="{{$task->start}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- DATE FIN TASK -->
                        <label for="end_task_date{{$key+1}}" class="col-8 control-label">Date Fin</label>
                        <div class='input-group date' id='datetimepicker3'>
                            <div class="col-12">
                                <input type='time' class="form-control" name="end_task_date{{$key+1}}" value="{{$task->end}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- DESCRIPTION -->
                        <label name="description{{$key+1}}s" for="description" class="col-8 control-label">Description</label>
                        <div class="col-12">
                            <textarea class="form-control" name="description{{$key+1}}" rows="3">{{$task->description}}</textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id_task" value="{{$task->task_id}}">
                </div>
            @endforeach
                <div id="{{$count_task_next}}" style="display: none" class="p-4 div_color rounded border col-3">
                </div>
        </div>

        <input id="count_task" type="hidden" name="count_task" value="{{$count_task}}"/>

        <div class="d-flex justify-content-center mt-4">
            <a href="{{route('planning')}}" class="btn btn-danger ml-5 mr-5 p-3">Retour</a>
            <button type="submit" class="btn btn-success ml-5 mr-5 p-3">
                Valider
            </button>
        </div>
    </form>
</div>


<script type="text/javascript">
    var i = document.getElementById("count_task").value;
    i = parseInt(i, 10);
    var mesTaches = document.getElementById(i);
    function addBloc() {
        document.getElementById("count_task").value++;
        i++;
        var mesTaches = document.getElementById(i);
        mesTaches.style.display = "block";
        mesTaches.innerHTML +=
            "                        <div class=\"d-flex justify-content-between\">\n" +
            "                            <h3>Task n° "+ i +"</h3>\n" +
            "                            <a onclick=\"deleteBloc(i)\"><i class=\"fa fa-2x fa-trash-alt\"></i></a>" +
            "                        </div>\n" +
            "                            <div class=\"form-group mt-2\">\n" +
            "                                <!-- NOM TACHE -->\n" +
            "                                    <label for=\"task_name\" class=\"col-8 control-label\">Nom de la tache</label>\n" +
            "                                    <div class=\"col-12\">\n" +
            "                                        <input type='text' class=\"form-control\" name=\"task_name"+i+"\" required/>\n" +
            "                                    </div>\n" +
            "                            </div>\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <!-- DATE DEBUT TASK -->\n" +
            "                                <label for=\"start_task_date\" class=\"col-8 control-label\">Date Début Tache</label>\n" +
            "                                <div class='input-group date' id='datetimepicker3'>\n" +
            "                                    <div class=\"col-12\">\n" +
            "                                        <input type='time' class=\"form-control\" name=\"start_task_date"+i+"\" required/>\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <!-- DATE FIN TASK -->\n" +
            "                                <label for=\"end_task_date\" class=\"col-8 control-label\">Date Fin Tache</label>\n" +
            "                                <div class='input-group date' id='datetimepicker3'>\n" +
            "                                    <div class=\"col-12\">\n" +
            "                                        <input type='time' class=\"form-control\" name=\"end_task_date"+i+"\" required/>\n" +
            "                                    </div>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                            <div class=\"form-group\">\n" +
            "                                <!-- DESCRIPTION -->\n" +
            "                                <label for=\"description\" class=\"col-8 control-label\">Description</label>\n" +
            "                                <div class=\"col-12\">\n" +
            "                                    <textarea class=\"form-control\" name=\"description"+i+"\" rows=\"3\"></textarea>\n" +
            "                                </div>";
            var nextDiv = document.createElement('div');
            nextDiv.setAttribute("id", (i+1));
            nextDiv.setAttribute("class", "p-4 div_color rounded border col-3");
            nextDiv.setAttribute("style",  "display: none");
            mesTaches.after(nextDiv);
    }
    function deleteBloc(index) {
        document.getElementById("count_task").value--;
        i = i - 1;
        var bloc = document.getElementById(index);
        bloc.remove()

    }
</script>
