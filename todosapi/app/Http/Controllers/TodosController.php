<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        return response()->json([
            "todos" => $todos
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = Todo::create([
            "content" => $request->content,
            "completed"=> false

        ]);

        return response()->json([
            "todo" => $todo
        ],200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $todo = Todo::whereId($request->id)->first();

        if (!is_null($todo)) {
           $todo->delete();
        }
        return response(200);
    }

    public function complete(request $request)
    {
        $todo = Todo::whereId($request->id)->first();

        if (!is_null($todo)) {
           $todo->completed = !$todo->completed;
           $todo->save();
        }
        return response(200);
    }
}
