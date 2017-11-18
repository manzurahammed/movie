<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use Illuminate\Support\Facades\URL;
use Validator;
class FrontendController extends Controller
{
    public function index(){
        $data = Film::select('name','realease_date','slug','photo')->paginate(1);
        $res = array();
		$value = array();
		$res = array('status'=>false,'message'=>'No data Found');
		if(!empty($data)){
			$res = array('status'=>true,'message'=>'data Found');
			$i=0;
			foreach($data as $key => $item){
                $data[$key]['slug'] = url('api/films/').'/'.$item->slug;
				$data[$key]['photo'] = url('/').'/upload/'.$item->photo;
				$i++;
			}
            $res['result'] = $data;
		}
		return $res;
    }
	public function film(Request $request){
        $res = array('status'=>'failed','message'=>'Slug Wrong');
		if($request->slug!=''){
			$data = Film::select('name','description','realease_date','rating','ticket_price','genre','country','photo')->where('slug',$request->slug)->first();
            if(!empty($data)){
				$data['photo'] = url('/').'/upload/'.$data->photo;
			    $res['status'] = 'success';
                $res['message'] = 'Data Found';
                $res['result'] = $data;
            }else{
                $res['status'] = 'failed';
                $res['message'] = 'No Data Found';
            }	
	   }
       return $res;
    }

    public function store(Request $request){
        $res = array('status'=>'failed','message'=>'validation Error');
        $rule = [
            'name' => 'bail|required',
            'realease_date' => 'required|date',
            'description' => 'required',
            'country' => 'required',
            'photo' => 'required|image',
            'rating' => 'required|integer',
            'ticket_price' => 'required',
            'genre' => 'required',     
        ];

        $validator = Validator::make($request->all(),$rule);
        if ($validator->fails()) {
            $errors =$validator->errors();
            $res['errors'] = $errors->all();
            return $res;
        }

        $film = new Film();
        $film->name = $request->name;
        $slug = str_replace(array('-',' '),"_",$request->name);
        $film->realease_date = $request->realease_date;
        $film->description = $request->description;
        $film->rating = $request->rating;
        $film->country = $request->country;
        $film->slug = $slug;        
        $film->ticket_price = $request->ticket_price;
        if(!empty($request->genre)){
            $film->genre = implode(',', $request->genre);
        }
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'image_'.rand().'.' . $file->getClientOriginalExtension();
            $destinationPath = 'upload/';
            $file->move($destinationPath,$filename);
            $film->photo = $filename;
        }
        if($film->save()){
            $res =  array('status'=>'success','message'=>'New Films Add');
        }else{
            $res =  array('status'=>'failed','message'=>'Failed To Add New Moview');
        }
        return $res;
    }

    public function create(){
        $rating = array(1=>1,2=>2,3=>3,4=>4,5=>5);
        $genre = array(1=>'Action',2=>'Fantasy',3=>'Adventure');
        return view('frontend.create')->with(compact('rating','genre'));
    }
}
