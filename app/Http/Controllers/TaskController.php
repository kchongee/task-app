<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = Task::where('is_completed','=',0)->paginate(10);
        return view('tasks.index',compact('tasks'));
    }

    /**
     * Display a listing of the resource.
     */
    public function history(): View
    {
        $tasks = Task::paginate(10);
        return view('tasks.history',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        
        return view('tasks.create');
    }    

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        return view('');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit',["task"=>$task]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request -> validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->is_completed = 0;

        $task->save();

        return redirect()->route('tasks.index')->with("sucess","New task added");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {        
        if(isset($request->isCompleteButton)){            
            Task::where('id',$id)->update(['is_completed'=>1]);
            return redirect()->route('tasks.index');
        }
        if(isset($request->isIncompleteButton)){
            Task::where('id',$id)->update(['is_completed'=>-1]);
            return redirect()->route('tasks.index');
        }

        Task::where('id',$id)->update([            
            "title"=>$request->title,            
            "description"=>$request->description            
        ]);        

        return redirect()->route("tasks.edit",$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Task::where('id',$id)->delete();        
        return redirect('/tasks');
    }
}
