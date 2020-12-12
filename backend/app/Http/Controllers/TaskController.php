<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
	public function index(){
		return auth()->user()->tasks;
	}
	public function store(Request $request){
		$task = new Task;
		$task->title = $request->title;
		$task->description = $request->description;
		$task->due_date = $request->due_date;
		$task->completed = $request->completed;
		$task->user_id = auth()->user()->id;
		$task->save();
		return $task;
	}

	public function remove($id){
		$success = Task::destroy($id);
		return ['success' => $success];
	}

	public function update(Request $request, $id){
		$task = Task::find($id);
		$task->title = $request->title;
		$task->description = $request->description;
		$task->due_date = $request->due_date;
		$task->completed = $request->completed;
		$task->save();
		return $task;
	}
}
