<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ListItem;
class TodoListController extends Controller
{
    public function index() 
    {
        return view('welcome', ['listItems' => ListItem::all()->where('is_complete', 0)]);   
    }
    
    public function completed()
    {
        $listItems = ListItem::all()->where('is_complete', 1);
        return view('welcome', ['listItems' => $listItems]);
    }

    public function saveItem(Request $request) 
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $item = new ListItem;
        $item->name = $validatedData['name'];
        $item->is_complete = 0;
        $item->save();
        return redirect('/');
    }
    public function markItem($id) 
    {
        $item = ListItem::find($id);
        $item->is_complete = !$item->is_complete;
        $item->save();
        return redirect('/');
    }
    public function deleteItem($id)
    {
        $item = ListItem::find($id);
        $item->delete();
        return redirect('/');
    }
}