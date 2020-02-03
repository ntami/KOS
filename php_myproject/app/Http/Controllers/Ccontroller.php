<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illiminate\Http\Response;
use App\Logininfo;
use App\Customers;
use App\Products;
use App\Submenu;
use App\Brands;
use App\Filter;
use App\Shipment;
use App\Orders;
use App\Orderdetail;

class Ccontroller extends Controller
{	
	
	public function postEdit(Request $request){
		$this->validate($request,
			["username"=>"required"],
			["username.required"=> "Please enter username!"]);
	}
	function postRegister(Request $request){
		$username=$request->input('username');
		$result=Logininfo::where('username',$username)->first();
		if($result!=null){
			$alert='This username has existed!';
		return redirect()->back()->with('alert',$alert);
		}else{
			$password=md5($request->input('password'));
			$fullName=$request->input('fullName');
			$mobile=$request->input('mobile');
			$email=$request->input('email');
			$address=$request->input('address');
			Customers::insert([
				'fullName'=>$fullName,
				'mobile'=>$mobile,
				'email'=>$email,
				'address'=>$address
			]);
			$customer=Customers::orderBy('customerId','desc')->first();
			Logininfo::insert([
				'username'=>$username,
				'password'=>$password,
				'customerId'=>$customer->customerId,
				'role'=>1
			]);
			return redirect('login');
		};
	}
	function postLogin(Request $request){
		$username=$request->input('username');
		$password=md5($request->input('password'));
		$result=Logininfo::where('username',$username)->where('password',$password)->first();
    	if($result==null){
    		$alert='Wrong username or password!';
    		return redirect()->back()->with('alert',$alert);
    	}else{
    		session(['user'=>$username]);
    		return redirect('/');
    	}
	}
	function logout(){
		session()->forget('user');
		return redirect('/');
	}
	function search($type1=null,$menuId=null,$type2=null,$submenuId=null,Request $request){
		if($type1==null){
			$product=Products::get();
		}elseif($type1=='keyword'){
			$product=Products::where('productName','like','%'.$request->keyword.'%')->orderBy('productDate','desc')->get();
		}
		else{
			if($type1=='menu'){
				if($type2=='submenu'){
					$product=Products::where('menuId',$menuId)->where('submenuId',$submenuId)->orderBy('productDate','desc')->get();
				}else{
					$product=Products::where('menuId',$menuId)->get();
				}
			}elseif($type1=='keyword'){
				$product=Products::where('productName','like','%'.$request->keyword.'%')->orderBy('productDate','desc')->get();
			}
		}
		$brands=Brands::where('status',1)->get();
		return view('showproduct',compact('product','brands'));
	}
	function keyword(Request $request){
		$keyword=$request->input('keyword');
		$product=Products::where('productName','like','%'.$request->keyword.'%')->orderBy('productDate','desc')->get();
		$brands=Brands::where('status',1)->get();
		return view('showproduct',compact('product','brands'));
	}
	function cart($action=null, $productId=null, Request $request){
		switch ($action){
			case 'add':
				if(session("cart.$productId")){
					session(["cart.$productId"=>session("cart.$productId")+1]);
				}else{
					session(["cart.$productId"=>1]);
				}
				return redirect('cart');
				break;
			case 'change':
				if(session("cart.$productId")){
					session(["cart.$productId"=>session("cart.$productId")+$request->number_order]);
				}else{
					session(["cart.$productId"=>$request->number_order]);
				}
				return redirect('cart');
				break;
			case 'delete':
				session()->forget("cart.$productId");
				return redirect('cart');
				break;
			case 'update':
				foreach (array_keys(session('cart')) as $key) {
					session(["cart.$key"=>$request->input($key)]);
				}
				return redirect('cart');
				break;
			case 'order':
				return redirect('order');
				break;
			default:
				return view('cart');
				break;
		}
	}
	function order(){
		$shipment=Shipment::where('status',1)->get();
		return view('order',compact('shipment'));
	}
	function postOrder(Request $request){
		$fullName=$request->input('fullName');
		$mobile=$request->input('mobile');
		$email=$request->input('email');
		$address=$request->input('address');
		$shipmentId=$request->input('shipmentId');
		Customers::insert([
			'fullName'=>$fullName,
			'mobile'=>$mobile,
			'email'=>$email,
			'address'=>$address,
		]);
		$customer=Customers::orderBy('customerId','desc')->first();
		Orders::insert([
			'customerId'=>$customer->customerId,
			'shipmentId'=>$shipmentId,
			'orderDate'=>now()
		]);
		$order=Orders::orderBy('orderId','desc')->first();
		$orderId=$order->orderId;
		foreach(array_keys(session('cart')) as $productId):
			$quantity=session("cart.$productId");
			$product=Products::where('productId',$productId)->first();
			$price=$product->productPrice*(100-$product->productSaleOff)/100*$quantity;
			Orderdetail::insert([
				'orderId'=>$orderId,
				'productId'=>$productId,
				'quantity'=>$quantity,
				'price'=>$price
			]);
		endforeach;
		session()->forget('cart');
		return redirect()->back()->with('alert','success');
	}
	function detail($productId=null){
		$product=Products::where('productId',$productId)->get();
		return view('detail',compact('product'));
	}
	function home(){
		$newproduct=Products::where('status',1)->orderBy('productDate','desc')->take(6)->get();
		$saleOff=Products::where('status',1)->OrderBy('productSaleOff','desc')->take(6)->get();
		return view('home',compact('newproduct','saleOff'));
	}
	public function setCookie(){ 
	$response = new Response; 
	$response->withCookie( 'menuId', '1', 30);
	return $response;
	 }
	public function getCookie(Request $request) {
		return $request->cookie('hoten'); }
	}



