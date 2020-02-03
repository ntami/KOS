<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\Products;
use App\Artists;
use App\Orderdetail;
use App\Comments;
use App\Types;
use App\Orders;
class Acontroller extends Controller
{
	
	function product(){
		$product=DB::table('artists as a')->join('products as b','a.artistId','b.artistId')->select('name','b.*')->get();
		$orderDetails=Orderdetail::select('productId')->get();
		return view('admin.product.product',compact('product','orderDetails'));

	}
	function logout(){
		session()->forget('userAdmin');
		return redirect('admin');
	}
	function postLoginAdmin(Request $request){
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
    function productEdit($productId){
		$artists=Artists::where('status',1)->get();
		$types=Types::where('status',1)->get();
		$product=Products::where('productId',$productId)->get();
		return view('admin.product.productedit',compact('artists','product','types'));
	}
	function postProductEdit(Request $request,$productId=null){
		$artistId=$request->input('artistId');
		$typeId=$request->input('typeId');
		$productName=$request->input('productName');
		$productDate=$request->input('productDate');
		$productPrice=$request->input('productPrice');
		$productSaleOff=$request->input('productSaleOff');
		$productDescription=$request->input('productDescription');
		$status=$request->input('status');
		Products::where('productId',$productId)->update([
			'artistId'=>$artistId,
			'typeId'=>$typeId,
			'productName'=>$productName,
			'productDate'=>$productDate,
			'productPrice'=>$productPrice,
			'productSaleOff'=>$productSaleOff,
			'productDescription'=>$productDescription,
			'status'=>$status
		]);
		$product=Products::get();
		return view('admin.product.product',compact('product'));
	}
	function search($type1=null,$typeId=null,$type2=null,$artistId=null){
		if($type1=='type'){
			if($type2=='artist'){
				$product=Products::where('typeId',$typeId)->where('artistId',$artistId)->get();
			}else{
				$product=Products::where('typeId',$typeId)->get();
			}
		}
		return view('admin.product.product',compact('product'));
	}
	function order(){
		$order=DB::table('orders')->join('members','orders.memberId','=','members.memberId')->get();
		return view('admin.order',compact('order'));
	}
	function comment(){
		$product=DB::table('products')->join('comments','products.productId','=','comments.productId')->get();
		return view('admin.comment',compact('product'));
	}
	function orderdetail($orderId=null){
		$product=DB::table('orderdetail')->join('products','orderdetail.productId','=','products.productId')->where('orderId',$orderId)->get();
		$order=Orders::where('orderId',$orderId)->get();
		return view('admin.orderdetail',compact('product','order'));
	}
	function postStatus(Request $request,$orderId=null){
		$status=$request->input('orderStatus');
		Orders::where('orderId',$orderId)->update(['status'=>$status]);
		$order=DB::table('orders')->join('members','orders.memberId','=','members.memberId')->get();
		return view('admin.order',compact('order'));
	}
	function onoff($commentId=null){
		$comment=Comments::where('commentId',$commentId)->first();
		if($comment->status==0){
			Comments::where('commentId',$commentId)->update(['status'=>1]);
		}else{
			Comments::where('commentId',$commentId)->update(['status'=>0]);
		}
		return redirect()->back();
	}

	function addType(Request $request){
		$newType=$request->input('type');
		Types::insert(['typeName'=>$newType,'status'=>1]);
		return redirect()->back();
	}
	function typeEdit($typeId=null){
		$type=Types::where('typeId',$typeId)->get();
		return view('admin.typeedit',compact('type'));
	}
	function postType(Request $request,$typeId=null){
		$typeName=$request->input('typeName');
		$status=$request->input('status');
		Types::where('typeId',$typeId)->update(['typeName'=>$typeName,'status'=>$status]);
		return view('admin.type');
	}

	function addArtist(Request $request){
		$newArtist=$request->input('artist');
		Artists::insert(['name'=>$newArtist,'status'=>1]);
		return redirect()->back();
	}
	function artistEdit($artistId=null){
		$artist=Artists::where('artistId',$artistId)->get();
		return view('admin.artistedit',compact('artist'));
	}
	function postArtist(Request $request,$artistId=null){
		$artistName=$request->input('artistName');
		$status=$request->input('status');
		Artists::where('artistId',$artistId)->update(['name'=>$artistName,'status'=>$status]);
		return view('admin.artist');
	}
	function password(Request $request){
		$oldPass=md5($request->input('password'));
		$newPass=md5($request->input('newPassword'));
		$admin=Admin::where('username',session('userAdmin'))->first();
		if($oldPass==$admin->password):
			Admin::where('username',session('userAdmin'))->update(['password'=>$newPass]);
			$alert='Your password has been changed!';
			return redirect()->back()->with('alert',$alert);
		else:
			$alert='Wrong password!';
			return redirect()->back()->with('alert',$alert);
		endif;
	}
	function postAddProduct(Request $request){
		$artistId=$request->input('artistId');
		$typeId=$request->input('typeId');
		$productName=$request->input('productName');
		$productImage=$request->input('productImage');
		$productDate=$request->input('productDate');
		$productPrice=$request->input('productPrice');
		$productSaleOff=$request->input('productSaleOff');
		$productDescription=$request->input('productDescription');
		$status=$request->input('status');
		Products::insert([
			'artistId'=>$artistId,
			'typeId'=>$typeId,
			'productName'=>$productName,
			'productImage'=>$productImage,
			'productDate'=>$productDate,
			'productPrice'=>$productPrice,
			'productSaleOff'=>$productSaleOff,
			'productDescription'=>$productDescription,
			'productLike'=>0,
			'productComment'=>0,
			'status'=>$status
		]);
		return redirect()->back()->with('alert','success');
	}
}
