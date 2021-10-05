<?php

namespace App\Http\Controllers;

use App\Planning;
use App\Task;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanningController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $plannings = Planning::orderBy('date', 'asc')->get();

        return view ('planning.index', ['plannings' => $plannings]);
    }

    public function create($type_id)
    {
        return view ('planning.create', ['type_id' => $type_id]);
    }

    public function show($plan)
    {
        $planning = DB::table('planning')->where('id', $plan)->first();
        $tasks = Task::all()->where('planning_id', $plan);

        return view ('planning.show', ['tasks' => $tasks, 'planning' => $planning]);
    }


    public function edit($id)
    {
        $planning = Planning::all()->where('id', $id)->first();
        $tasks = DB::table('task')->join('planning', 'planning.id', '=', 'task.planning_id')->where('planning_id', $id)->get();
        $count_task = $tasks->count();
        $count_task_next = $count_task + 1;

        return view ('planning.edit', [
            'tasks' => $tasks,
            'planning' => $planning,
            'count_task' => $count_task,
            'count_task_next' => $count_task_next
        ]);
    }

    public function update(Request $request, $id)
    {
        if ($id != 0){
            $plan = DB::table('planning')->where('id', $id)->first();
            $plan_id = $plan->id;
            DB::table('planning')->where('id', $id)->update([
                'name' => $request->planning_name,
                'date' => $request->planning_date,
            ]);

            DB::table('task')->join('planning', 'planning.id', '=', 'task.planning_id')->where('planning_id', $id)->delete();
        }
        else {
            $plan = new Planning([
                'name' => $request->planning_name,
                'date' => $request->planning_date,
                'type_id' => $request->type_id
            ]);
            $plan->save();
            $plan_id = $plan->id;
        }

        $count = 1;
        if ($request->count_task != null){
            $count = $request->count_task;
        }


        for ($i = 1; $i<= $count; $i++){
            $task_name = "task_name".$i;
            $task_date = "task_date".$i;
            $start_task_date = "start_task_date".$i;
            $end_task_date = "end_task_date".$i;
            $description = "description".$i;

            $s_date_start = strtotime($request->$start_task_date);
            $date_start = new DateTime();
            $date_start->setTimestamp($s_date_start);
            $s_date_end = strtotime($request->$end_task_date);
            $date_end = new DateTime();
            $date_end->setTimestamp($s_date_end);
            $interval = $date_start->diff($date_end);
            $string = $interval->h ."h : ". $interval->i . "min";

            $task = new Task([
                'task_name' => $request->$task_name,
                'date_task' => $request->$task_date,
                'start' => $request->$start_task_date,
                'end' => $request->$end_task_date,
                'description' => $request->$description,
                'long' => $string,
                'done' => false,
                'planning_id' => $plan_id
            ]);
            $task->save();

        }

        return redirect  ('/');
    }

    public function delete_task($id_plan, $id_task)
    {
        $planning = Planning::all()->where('id', $id_plan)->first();

        DB::table('task')->where('id', '=', $id_task)->delete();

        return redirect('/edit/'. $planning->id);
    }

    public function task_done($id_plan, $id_task)
    {
        $planning = DB::table('planning')->where('id', $id_plan)->first();
        $task = Task::all()->where('id', $id_task)->first();

        if ($task->done == false){
            DB::table('task')->where('id', $id_task)->update([
                'done' => true,
            ]);
        }
        else {
            DB::table('task')->where('id', $id_task)->update([
                'done' => false,
            ]);
        }


        return redirect('/show/'. $planning->id);
    }

    public function delete($id)
    {
        DB::table('task')
            ->join('planning', 'planning.id', '=', 'task.planning_id')
            ->where('planning_id', $id)
            ->delete();

        DB::table('planning')
            ->where('id', $id)
            ->delete();

        return redirect ('/');
    }

}
