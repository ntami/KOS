<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\Products;
use App\Hang;
use App\Orderdetail;

class Acontroller extends Controller
{

	function products(){
		$products=DB::table('hang as a')->join('products as b','a.hangid','b.hangid')->select('tenHang','b.*')->get();
		$orderDetails=Orderdetail::select('productId')->get();
		return view('admin.product.product',compact('products','orderDetails'));
	}
	function logout(){
		session()->forget('userAdmin');
		return redirect('admin');
	}
	function productEdit($id){
		$product=Products::find($id);
		$hangs=Hang::all();
		return view('admin.product.productedit',compact('hangs','product'));
	}
	function postProductEdit($id, Request $request){
		$product=Products::find($id);
		$hangId=$request->input('hangId');
		$productName=$request->input('productName');
		$productPrice=$request->input('productPrice');
		$productDescription=$request->input('productDescription');
		$status=$request->input('status');
	

		Products::where('id',$id)->update([
			'hangid'=>$hangId,
			'productName'=>$productName,
			'productPrice'=>$productPrice,
			'productDescription'=>$productDescription,
			'status'=>$status
		]);
		return redirect('admin/products');
	}

	function postLoginAdmin( Request $request){
		$username=$request->input('username');
		$password=md5($request->input('password'));
		$admin=Admin::where('username',$username)->where('password',$password)->get();
		if(count($admin)==0){
			return redirect()->back()->with('alert','Wrong username or password');
		}else{
			session(['userAdmin'=>$username]);
			return redirect('admin');
		}
	}
    function index(){
    	if(!session('userAdmin')){
    		return view('admin.login');
    	}else{
    		return view('admin.admincontrolpanel');
    	}
    }
}
