<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Item;
use App\Order;
use App\Order_item;

class HomeController extends Controller
{
    //
    
    public function index() {
        $categories= Category::get();
        $brands=Brand::get();
        $items= Item::get();
        return view('welcome', compact('categories','brands','items'));
    }
    
    
    public function categoryItems($id) {
        $items= Category::find($id)->items;
        return view('items', compact('items'));
    }
    
    public function BrandItems($id) {
        $items= Brand::find($id)->items;
        return view('items', compact('items'));
    }
    
    public function searchItems($value) {
        if(!empty(trim($value))){
            $items= Item::where("name","LIKE",'%'.$value.'%')->get();
        }else {
            $items= Item::get();  
           
        }
        return view('items', compact('items'));
    }
    
    
    public function searchItemsByPrices($priceFrom,$priceTo) {
        $items=Item::whereBetween('price',[$priceFrom,$priceTo])->get();
        return view('items', compact('items'));
       
    }
    
    
    public function addOrder(Request $request) {
        $data=$request->input("data"); 
        $total= $request->input("total");
        if(isset($data)&&count($data)>0){
            $order=new Order();
            $order->total=$total;
            $order->save();
            foreach ($data as $item){
                $order_item=new  Order_item();
                $order_item->order_id=$order->id;
                $order_item->item_id=$item['id'];
                $order_item->quantity=$item['quantity'];
                $order_item->price=$item['price'];
                $order_item->save();
            }
            return true;
        }else{
            return false;
        }
    }
}
