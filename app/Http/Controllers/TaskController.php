<?php

namespace App\Http\Controllers;

use App\Task;


use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class TaskController extends Controller
{
    public function index(){
        //$tasks =DB::table('tasks')->get();
        $tasks =Task::orderBy('created_at')->get();
   
     return view('tasks.welcome',compact('tasks'));


    }

    public function show($id){
        //$task =DB::table('tasks')->find($id);

        $task=Task::where('id',$id) ->get();
        return view('tasks.show',compact('task'));

    }

    public function store(Request $request){
        
        $request->validate([
            'name'=>'required|min:10|max:255',

        ]);

        $task=new Task();
        $task->name=$request->name;
        $task->save();

            return redirect()->back();
            
    }


    public function destroy($id){
        //DB::table('tasks')->where('id','=',$id)->delete();
        $task=Task::find($id);
        
        $task->delete();
       return redirect()->back();
       }
       public function edit($id){
           
        $task =DB::table('tasks')->where ('id','=',$id)->first();
   
           $tasks =DB::table('tasks')->get();
   
           return view('tasks.edit',compact('tasks','task'));}



       public function update(Request $request,$id){
        $task = Task::find($id);
        $task->update(['name' => $request->get('name')]);
        return redirect('tasks.welcome'. $id);
   
           
       }
   
       

                    
    



}