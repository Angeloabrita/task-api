<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class Task extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'text',
        'user_id'
    ];

     /**
     * get all task order by older.
     *
     * 
     * @return \Illuminate\Http\ResponseJson
     */
    public static function indexTask() 
    {   
        if(self::all()->isEmpty())
        {
            return response()->json([
                'errors' => 'nothing here :('
            ], 404);
        }
        return self::all();
    }

    /**
     * show with detalis the task.
     *
     * @param  \Illuminate\Http\Request  $id
     * @return \Illuminate\Http\Response
     */
    
    public static function show($id)
    {
        return self::find($id);
    }
    


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public static function store($request)
    {
        return self::create(['title' => $request['title'],
                                    'text' => $request['text'],
                                    'user_id' => Auth::user()->id
                    ]);


      
    }
    
     
    public static function updateData($request, $id)
    {  
        
        $post = self::findOrFail($id);

        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }

        //tryCatch for validation the update method
        try{
            $post->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Task atualizada com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error ao deletar a tarsk: ' . $e->getMessage()
            ], 500);
        }
        
    }
    
     /**
     * Delete task.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public static function remove($id, $user)
    {
        $post = self::findOrFail($id);

        if ($user->cannot('delete', $post)) {
            abort(403);
        }
        try {
        self::destroy($id);
        return response()->json([
            'status' => 'success',
            'message' => 'Task deletada com sucesso'
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Error ao deletar a task: ' . $e->getMessage()
        ], 500);
    }
    }

    

   


   

}
