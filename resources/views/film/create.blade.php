@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Films</div>

                <div class="panel-body">
                    {!!Form::open(array('url' => 'films', 'method' => 'post','files'=>true,'class'=>'form-horizontal'))!!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="4" name="description" >{{ old('name') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('realease_date') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Realease Date</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control datepicker" name="realease_date" value="{{ old('realease_date') }}" required autofocus>
                                @if ($errors->has('realease_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('realease_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Rating</label>

                            <div class="col-md-6">
                                {!!Form::select('rating',$rating,old('rating'),array('class'=>'form-control'))!!}
                                @if ($errors->has('rating'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rating') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ticket_price') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Ticket Price</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control number" name="ticket_price" value="{{ old('ticket_price') }}" required autofocus>
                                @if ($errors->has('ticket_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ticket_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Counrty</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="country" value="{{ old('country') }}" required autofocus>
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('genre') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Genre</label>
                            <?php 
                                $oldgenere = old('genre');
                            ?>
                            <div class="col-md-6">
                                {!!Form::select('genre[]',$genre,old('genre'),array('class'=>'form-control','multiple'))!!}
                                @if ($errors->has('genre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('genre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Photo</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-file" name="photo">
                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
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
