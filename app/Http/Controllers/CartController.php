<?php
namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function index(){ 
        $user = auth('api')->user();
        $cart = Cart::with('item')->where('user_id',$user->id)->get();
        return response()->json($cart);
    }
    public function add(Request $req){
        $user = auth('api')->user();
        $item = Item::findOrFail($req->item_id);
        $cart = Cart::where('user_id',$user->id)->where('item_id',$item->id)->first();
        if($cart){
            $cart->quantity += max(1,intval($req->quantity ?? 1));
            $cart->save();
        }else{
            $cart = Cart::create(['user_id'=>$user->id,'item_id'=>$item->id,'quantity'=>intval($req->quantity ?? 1)]);
        }
        return response()->json($cart,201);
    }
    public function remove($id){
        $user = auth('api')->user();
        $cart = Cart::where('user_id',$user->id)->where('id',$id)->firstOrFail();
        $cart->delete();
        return response()->json(['deleted'=>true]);
    }
}
