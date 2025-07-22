<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use App\Models\TaskItem;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function taskCreate(Request $request, TaskItem $user)
    {
        $data = $request->validate([
            'listItem_id' => 'required|exists:list,id',
            'taskName' => 'required',
            'description' => 'nullable|string',
            'imgLink' => 'nullable|string',
            'property' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);
        $new_task = TaskItem::create($data);
        return redirect()->route("list");
    }

    public function taskDelete(Request $request, TaskItem $taskItem)
    {
        $taskItem->delete();
        return redirect()->route("list");
    }

    public function taskUpdate(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:tasks,id', //exists in task table
            'taskName' => 'required',
            'description' => 'nullable',
            'imgLink' => 'nullable',
            'property' => 'nullable|string',
            'deadline' => 'nullable|date',
            'listItem_id' => 'required|exists:list,id', //exists in list table
        ]);
        $task = TaskItem::findOrFail($data['id']);
        $task->update($data);
        return redirect()->route('list');
    }

    public function taskDeleteAll(Request $request, int $listItemId) {
        DB::table('tasks')->where('listItem_id', $listItemId)->delete();
        return redirect()->route("list");
    }

}
