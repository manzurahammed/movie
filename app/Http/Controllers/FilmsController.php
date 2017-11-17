<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
Use Auth;
use App\Film;
class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('film.filmslist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rating = array(1=>1,2=>2,3=>3,4=>4,5=>5);
        $genre = array(1=>'Action',2=>'Fantasy',3=>'Adventure');
        return view('film.create')->with(compact('rating','genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        Validator::make($request->all(), [
            'name' => 'bail|required',
            'realease_date' => 'required|date',
            'description' => 'required',
            'country' => 'required',
            'photo' => 'required|image',
            'rating' => 'required|integer',
            'ticket_price' => 'required',
            'genre' => 'required',
        ])->validate();

        $film = new Film();
        $film->name = $request->name;
        $film->realease_date = $request->realease_date;
        $film->description = $request->description;
        $film->rating = $request->rating;
        $film->country = $request->country;
        $film->ticket_price = $request->ticket_price;
        if(!empty($request->genre)){
            $film->genre = implode(',', $request->genre);
        }
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $request['photo'];
            $destinationPath = 'upload/';
            $file->move($destinationPath,$filename);
            $film->photo = 'image_'.rand().'.' . $file->getClientOriginalExtension();
        }
        if($film->save()){
            $res =  array('message'=>'New Films Add','alert'=>'alert-success');
        }else{
            $res =  array('message'=>'Empty Films Add Failed','alert'=>'alert-danger');
        }        
        return redirect('films')->with('status',$res);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
