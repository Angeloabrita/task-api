<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Task::indexTask();
     */
    public function index()
    {
        
        return Task::indexTask();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  
     * @return Task::store($request);
     */
    public function store(Request $request)
    {
        
        if(!auth()){
            return  response()->json([
                'status' => false,
                'errors' => 'unautorized'
            ], 401);
        }
        return Task::store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Task::show($id)
     */
    public function show($id)
    {
        //
        return Task::show($id);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Task::updateData($request, $id);
     */
    public function update(Request $request, $id)
    {   
        
        return Task::updateData($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return  Task::destroy($id)
     */
    public function destroy($id)
    {
        return Task::destroy($id)->response()->json([
            "status" => "deleted",
        ], 200);
    }
}
