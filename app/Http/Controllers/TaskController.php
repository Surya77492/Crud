<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        // get all the sharks
        $tasks = TaskModel::all();
        // dd($tasks);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        // load the create form (app/views/sharks/create.blade.php)
        // return View::make('sharks.create');
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'status' => 'required',
        // ]);

        $rules = array(
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        $title = $request->input('title');
        $description = $request->input('description');
        $status = $request->input('status');

        // store
        if ($validator->fails()) {
            Session::flash('message', 'Failed!');
            return Redirect::to('/');
        } else {
            $task = new TaskModel;
            $task->title  = $title;
            $task->description      = $description;
            $task->completed = $status;
            $task->save();

            // redirect
            Session::flash('message', 'Successfully created task!');
            return Redirect::to('/');
        }
    }

    public function edit($id)
    {
        // get the shark
        $tasks = TaskModel::find($id);
        return view('tasks.edit', compact('tasks'));
    }

    public function update(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'status' => 'required',
        // ]);

        $rules = array(
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        $title = $request->input('title');
        $description = $request->input('description');
        $status = $request->input('status');
        $id = $request->input('id');

        // store
        if ($validator->fails()) {
            Session::flash('message', 'Failed!');
            return Redirect::to('/');
        } else {
            $task = TaskModel::find($id);
            $task->title  = $title;
            $task->description      = $description;
            $task->completed = $status;
            $task->save();

            // redirect
            Session::flash('message', 'Successfully Updated Task!');
            return Redirect::to('/');
        }
    }

    public function destroy($id)
    {
        // delete
        $shark = TaskModel::find($id);
        $shark->delete();

        // redirect
        Session::flash('message', 'Successfully Deleted!');
        return Redirect::to('/');
    }
}
