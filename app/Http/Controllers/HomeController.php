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
    /*
     * load items , categories and brands from models 
     * return home view to display solution
     */
    public function index() {
        $categories= Category::get();
        $brands=Brand::get();
        $items= Item::get();
        return view('welcome', compact('categories','brands','items'));
    }
    
    /*
     * get specific category 's items from model  by category id
     * and return view to display them
     */
    public function categoryItems($id) {
        $items= Category::find($id)->items;
        return view('items', compact('items'));
    }
    
     /*
     * get specific Brand 's items from model  by Brand id
     * and return view to display them
     */
    
    public function BrandItems($id) {
        $items= Brand::find($id)->items;
        return view('items', compact('items'));
    }
    
    
     /*
     * get  items from model  that name match search value 
     * and return view to display them
     */
    
    public function searchItems($value) {
        if(!empty(trim($value))){
            $items= Item::where("name","LIKE",'%'.$value.'%')->get();
        }else {
            $items= Item::get();  
           
        }
        return view('items', compact('items'));
    }
    
    
     /*
     * get  items from model  that name match given price range 
     * and return view to display them
     */
    
    
    
    public function searchItemsByPrices($priceFrom,$priceTo) {
        $items=Item::whereBetween('price',[$priceFrom,$priceTo])->get();
        return view('items', compact('items'));
       
    }
    
    
     /*
     * add given shopping Cart items as order by models 
     * and return boolean to ensure sucess or failure of function
     */
    
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
