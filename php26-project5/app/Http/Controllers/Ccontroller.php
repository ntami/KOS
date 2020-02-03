<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Members;
use App\Products;
use App\Artists;
use App\Shipment;
use App\Payment;
use App\Orders;
use App\Orderdetail;
use App\Types;
use App\Comments;
class Ccontroller extends Controller
{
    function postLogin(Request $request){
    	$username=$request->input('username');
    	$password=md5($request->input('password'));
    	$result=Members::where('username',$username)->where('password',$password)->first();
    	if($result==null){
    		$alert='Wrong username or password!';
    		return redirect()->back()->with('alert',$alert);
    	}else{
    		session(['user'=>$username]);
    		return redirect('home');
    	}
    }
    function logout(){
		session()->forget('user');
		return redirect('home');
	}
	function postRegister(Request $request){
		$username=$request->input('username');
		$result=Members::where('username',$username)->first();
		if($result!=null){
			$alert='This username has existed!';
		return redirect()->back()->with('alert',$alert);
		}else{
			$password=md5($request->input('password'));
			$fullName=$request->input('fullName');
			$mobile=$request->input('mobile');
			$email=$request->input('email');
			$address=$request->input('address');
			Members::insert([
				'username'=>$username,
				'password'=>$password,
				'fullName'=>$fullName,
				'mobile'=>$mobile,
				'email'=>$email,
				'address'=>$address
			]);
			return redirect('login');
		};
	}
	function search($type1=null,$artistId=null,$type2=null, $typeId=null, Request $request){
		if($type1=='artist'){
			if($type2=='type'){
				$product=Products::where('artistId',$artistId)->where('typeId',$typeId)->orderBy('productDate','desc')->get();
			}else{
				$product=Products::where('artistId',$artistId)->orderBy('productDate','desc')->get();
			}
		}elseif($type1=='keyword'){
			$product=Products::where('productName','like','%'.$request->keyword.'%')->orderBy('productDate','desc')->get();
		}
		return view('showproduct',compact('product'));
	}
	function cart($action=null, $productId=null, Request $request){
		switch ($action) {
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
				if(session('user')):
					return redirect('order');
				else:
					return redirect('login');
				endif;
				break;
			default:
				return view('cart');
				break;
		}
	}
	function order(){
		$member=Members::where('username',session('user'))->first();
		$shipment=Shipment::where('status',1)->get();
		$payment=Payment::where('status',1)->get();
		return view('order',compact('member','shipment','payment'));
	}
	function updateinfo(Request $request){
		Members::where('username',session('user'))->update(['fullName'=>$request->input('fullName'),
			'mobile'=>$request->input('mobile'),
			'email'=>$request->input('email'),
			'address'=>$request->input('address')
	]);
	return redirect()->back();
	}
	function postOrder(Request $request){
		$member=Members::where('username',session('user'))->first();
		$memberId=$member->memberId;
		$shipmentId=$request->input('shipmentId');
		$paymentId=$request->input('paymentId');
		Orders::insert([
			'memberId'=>$memberId,
			'shipmentId'=>$shipmentId,
			'paymentId'=>$paymentId,
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
		$artist=DB::table('artists')->join('products', 'artists.artistId', '=', 'products.artistId')->where('productId',$productId)->get();
		$type=DB::table('types')->join('products','types.typeId','=','products.typeId')->where('productId',$productId)->get();
		$sales=Orderdetail::where('productId',$productId)->sum('quantity');
		$cmts=Comments::where('productId',$productId)->where('status',1)->count('commentId');
		$members=Members::where('username',session('user'))->first();
		$comments=DB::table('comments')->join('members', 'comments.memberId', '=', 'members.memberId')->where('productId',$productId)->where('comments.status',1)->get();
		return view('detail',compact('product','artist','type','sales','cmts','members','comments'));
	}
	function like($productId){
		if(session('user')):
			$product=Products::where('productId',$productId)->first();
			Products::where('productId',$productId)->update(['productLike'=>$product->productLike+1]);
			return redirect()->back();
		else:
			return redirect('login');
		endif;
	}
	function postComment($productId=null, Request $request, $comment=null){
		$member=Members::where('username',session('user'))->first();
		$memberId=$member->memberId;
		$comment=$request->input('textarea');
		$product=Products::where('productId',$productId)->first();
		Comments::insert([
			'productId'=>$productId,
			'memberId'=>$member->memberId,
			'comment'=>$comment,
			'commentTime'=>date('Y-m-d H:m:s')
		]);
		return redirect()->back();
	}
	function likedislike($type=null,$commentId=null){
		if(session('user')){
			$comments=Comments::where('commentId',$commentId)->first();
			if($type=='like'):
				Comments::where('commentId',$commentId)->update(['commentLike'=>$comments->commentLike+1]);
			else:
				Comments::where('commentId',$commentId)->update(['commentDislike'=>$comments->commentDislike+1]);
			endif;
			return redirect()->back();
		}else{
			return redirect('login');
		}
	}
	function account($username=null,$status=null){
		$members=Members::where('username',session('user'))->get();
		$member=Members::where('username',session('user'))->first();
		$orders=DB::table('products')->join('orderdetail', 'products.productId', '=', 'orderdetail.productId')->join('orders','orders.orderId','=','orderdetail.orderId')->where('memberId',$member->memberId)->orderBy('orderDate','desc')->get();
		return view('account',compact('members','orders'));
	}
	function home(){
		$newproduct=Products::where('status',1)->orderBy('productDate','desc')->take(8)->get();
		$saleOff=Products::where('status',1)->OrderBy('productSaleOff','desc')->take(8)->get();
		$bestGoods=DB::table('products')->join('orderdetail','products.productId','=','orderdetail.productId')->where('status',1)->orderBy('productDate','desc')->take(8)->get();
		return view('home',compact('newproduct','saleOff','bestGoods'));
	}
		function postAccount(Request $request){
		Members::where('username',session('user'))->update([
			'avatar'=>$request->input('avatar'),
			'fullName'=>$request->input('fullName'),
			'mobile'=>$request->input('mobile'),
			'email'=>$request->input('email'),
			'address'=>$request->input('address')
		]);
	return redirect()->back();
	}
	function changePassword(Request $request){
		$oldPass=md5($request->input('password'));
		$newPass=md5($request->input('newPassword'));
		$members=Members::where('username',session('user'))->first();
		if($oldPass==$members->password):
			Members::where('username',session('user'))->update(['password'=>$newPass]);
			return redirect('account');
		else:
			$alert='Wrong password!';
			return redirect()->back()->with('alert',$alert);
		endif;
	}
}