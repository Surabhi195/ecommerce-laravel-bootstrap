<?php
namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
class ItemController extends Controller
{
    public function index(Request $req){
        $q = Item::query();
        if($req->has('category')) $q->where('category',$req->category);
        if($req->has('min_price')) $q->where('price','>=',$req->min_price);
        if($req->has('max_price')) $q->where('price','<=',$req->max_price);
        return response()->json($q->get());
    }
    public function store(Request $req){
        $item = Item::create($req->only(['name','price','category','description']));
        return response()->json($item,201);
    }
    public function show($id){ return response()->json(Item::findOrFail($id));}
    public function update(Request $req,$id){
        $item = Item::findOrFail($id);
        $item->update($req->only(['name','price','category','description']));
        return response()->json($item);
    }
    public function destroy($id){ Item::findOrFail($id)->delete(); return response()->json(['deleted'=>true]);}
}
