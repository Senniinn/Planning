<?php

namespace App\Http\Controllers;

use App\Planning;
use App\Task;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanningController extends Controller
{
    public function index()
    {
        $plannings = DB::table('plannings')
            ->join('types', 'types.id', '=', 'plannings.type_id')
            ->get();


        return view ('planning.index', ['plannings' => $plannings]);
    }

    public function create($type_id)
    {
        return view ('planning.create', ['type_id' => $type_id]);
    }

    public function show($plan)
    {
        $planning = DB::table('plannings')->where('plan_id', $plan)->first();
        $tasks = DB::table('tasks')->join('plannings', 'plannings.plan_id', '=', 'tasks.planning_id')->where('planning_id', $plan)->get();

        return view ('planning.show', ['tasks' => $tasks, 'planning' => $planning]);
    }


    public function edit($id)
    {
        $planning = DB::table('plannings')->where('plan_id', $id)->first();
        $tasks = DB::table('tasks')->join('plannings', 'plannings.plan_id', '=', 'tasks.planning_id')->where('planning_id', $id)->get();
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
        $plannings = DB::table('plannings')->join('types', 'types.id', '=', 'plannings.type_id')->get();



        if ($id != 0){
            $plan = DB::table('plannings')->where('plan_id', $id)->first();
            $plan_id = $plan->plan_id;
            DB::table('plannings')->where('plan_id', $id)->update([
                'name' => $request->planning_name,
                'date' => $request->planning_date,
            ]);

            $tasks = DB::table('tasks')->join('plannings', 'plannings.plan_id', '=', 'tasks.planning_id')->where('planning_id', $id)->delete();


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
            $date_start = new DateTime("@$s_date_start");
            $s_date_end = strtotime($request->$end_task_date);
            $date_end = new DateTime("@$s_date_end");
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
        $planning = DB::table('plannings')->where('plan_id', $id_plan)->first();
        $tasks = DB::table('tasks')->join('plannings', 'plannings.plan_id', '=', 'tasks.planning_id')->where('planning_id', $id_plan)->get();
        $count_task = $tasks->count();
        $count_task_next = $count_task + 1;

        DB::table('tasks')->where('task_id', '=', $id_task)->delete();

        return redirect('/edit/'. $planning->plan_id);

    }

    public function task_done($id_plan, $id_task)
    {
        $planning = DB::table('plannings')->where('plan_id', $id_plan)->first();

        DB::table('tasks')->where('id', $id_task)->update([
            'done' => true,
        ]);

        return redirect('/show/'. $planning->plan_id);

    }

    public function delete($id)
    {
        DB::table('tasks')
            ->join('plannings', 'plannings.plan_id', '=', 'tasks.planning_id')
            ->where('planning_id', $id)
            ->delete();

        DB::table('plannings')
            ->where('plan_id', $id)
            ->delete();

        $plannings = DB::table('plannings')->join('types', 'types.id', '=', 'plannings.type_id')->get();

        return redirect ('/');

    }

}
