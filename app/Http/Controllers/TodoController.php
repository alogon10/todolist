<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Test;
use App\Models\Task;

class TodoController extends Controller
{
    public function index()
    {

        $items = Task::all();
        return view('index',['items' => $items]);
    }
// create method
    public function create(Request $request)
    {   
        $validate_rule = [
            'content' =>'required|max:20',
        ];
        $item = [
            'content' => $request->content,
        ];
        $this->validate($request,$validate_rule);
        Task::create($item);
        return redirect('/');
    }
// update method
    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $item = [
            'content' => $request->updatetext,
        ];
        $items =Task::all();
        Task::where('id',$request->id)->update($item);
        return redirect('/');
    }
// remove method
    public function remove(Request $request)
    {

        Task::find($request->id)->delete();
        return redirect('/');
    }
}