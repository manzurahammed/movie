@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Films</div>

                <div class="panel-body">
                    {!!Form::open(array('url' => 'api/films', 'method' => 'post','files'=>true,'class'=>'form-horizontal','id'=>'addFilms'))!!}

                        <div class="form-group ">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="4" name="description" ></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Realease Date</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control datepicker" name="realease_date" value="" required autofocus>
                                
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="name" class="col-md-4 control-label">Rating</label>

                            <div class="col-md-6">
                                {!!Form::select('rating',$rating,'',array('class'=>'form-control'))!!}
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Ticket Price</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control number" name="ticket_price" value="" required autofocus>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Counrty</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="country" value="" required autofocus>
                                
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="name" class="col-md-4 control-label">Genre</label>
                            <div class="col-md-6">
                                {!!Form::select('genre[]',$genre,'',array('class'=>'form-control','multiple'))!!}
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="name" class="col-md-4 control-label">Photo</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-file" name="photo">
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
