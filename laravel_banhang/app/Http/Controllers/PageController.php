<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Cart;
use Illuminate\Support\Facades\View;
use Session;

class PageController extends Controller
{
    function __construct(){
        $loai_sp = ProductType::all();
        View::share('loai_sp',$loai_sp);
    }

    public function getIndex(){
        $slide = Slide::all();
        $new_product = Product::where('new','1')->paginate(4,['*'],'new');
        $sale_product = Product::where('unit_price','>','promotion_price')->paginate(8,['*'],'sale');
        return view('pages.trangchu',compact('slide','new_product','sale_product'));
    }

    public function getLoaiSp($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sanpham = Product::where('id_type','<>',$type)->paginate(3);
        $tenloaisp = ProductType::where('id',$type)->first();
        return view('pages.loai_sanpham',compact('sp_theoloai','sanpham','tenloaisp'));
    }

    public function getChiTietSp($id){
        $sanpham = Product::where('id',$id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
        return view('pages.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }

    public function getLienHe(){
        return view('pages.lienhe');
    }

    public function about(){
        return view('pages.about');
    }

    public function getAddToCart(Request $r,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $r->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        
        return redirect()->back();
    }

    public function getCheckOut(){
        if(Session('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('pages.dathang',['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        }
    }

}
