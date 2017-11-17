<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
class FrontendController extends Controller
{
    public function index(){
        $data = Film::all();
		$res = array();
		$value = array();
		$res = array('status'=>false);
		if(!empty($data)){
			$res = array('status'=>true);
			$i=0;
			foreach($data as $item){
				$value[$i]['name'] = $item->name;
				$value[$i]['realease_date'] = $item->realease_date;
				$value[$i]['photo'] = 'upload/'.$item->photo;
				$i++;
			}
		}
		$res['data'] = $value;
		return $res;
    }
	public function film(Request $request){
		if($request->slug!=''){
			$data = Film::select('name','description','realease_date','rating','ticket_price','genre','country','photo')->where('slug',$request->slug)->first();
			if(empty($data)){
				return array('status'=>'failed','message'=>'No Data Found');
			}
			return $data;
		}else{
			return array('status'=>'failed','message'=>'Slug Wrong');
		}
	}
}
