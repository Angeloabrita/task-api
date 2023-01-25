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
     * get 10 latest  task order by older.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
        $post = self::find($id);
        $post->update($request->all());
        return $post;
    }
    
     /**
     * Delete task.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public static function remove($id)
    {
        return self::destroy($id);
    }

    

   


   

}
