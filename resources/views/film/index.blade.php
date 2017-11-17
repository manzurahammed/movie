@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Film List</div>

                <div class="panel-body">
                    <table class="table table-striped table-dark">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Rating</th>
                              <th scope="col">Release Date</th>
                              <th scope="col">Ticket Price</th>
                              <th scope="col">Country</th>
                              <th scope="col">Photo</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if ($films->isNotEmpty())
                                @foreach ($films as $key=> $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->rating}}</td>
                                        <td>{{$item->realease_date}}</td>
                                        <td>{{$item->ticket_price}}</td>
                                        <td>{{$item->country}}</td>
                                        <td>{{Html::image('upload/'.$item->photo,'nice',array('hight'=>100,'width'=>100))}}</td>
                                    <tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">No Data Found</td>
                                </tr>
                            @endif
                          </tbody>
                        </table>
                        @if ($films->isNotEmpty())
                            {{$films->links() }}
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
