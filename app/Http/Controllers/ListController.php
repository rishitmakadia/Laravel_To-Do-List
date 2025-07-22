<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use App\Models\TaskItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function viewList(){
        $attr = ListItem::all();
        $attr2 = TaskItem::all();
        return view("todo.list", ["allListName" => $attr, "allTaskName" => $attr2]);
    }

    public function listCreate(Request $request, ListItem $user)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $new_user = ListItem::create($data);
        return redirect()->route("list");
    }
    public function listDelete(Request $request, ListItem $listItem){
        $listItem->delete();
        return redirect()->route("list");
    }

    public function listUpdate(Request $request)
    {
        $data = $request->validate([
            "id" => "required|exists:list,id",
            "name" => "required",
        ]);
        $listItem = ListItem::findOrFail($data['id']);
        $listItem->update(['name' => $data['name']]);
        return redirect()->route("list");
    }

}
