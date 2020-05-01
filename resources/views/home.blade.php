@extends('layouts.home')

@section('form')
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-10 ">
                <form action="{{route('shout.save')}}" method="POST" class="mt-5 mb-5">
                    @csrf
                    <div class="form-group">
                        <textarea name="status" id="" rows="6" class=" shadow-sm form-control"></textarea>
                        <button type="submit" class="shadow-sm btn btn-primary mt-2 float-right pl-5 pr-5"> Post
                        </button>
                    </div>
                </form>
                <br>
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('status')
    @if(count($status) > 0)
    @foreach ($status  as $st)
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-10 ">
                    <div class="status shadow-sm">
                        <div class="row p-3 pb-2">
                            <div class="col-md-2">
                                <img style="width:50px;" src="{{$avatar}}"
                                     class="mt-3 img-thumbnail mx-auto d-block" alt="">
                            </div>
                            <div class="col-md-10 p-3 pr-5">
                                <p class="author">
                                    <strong>{{$st->user->name}}</strong> Said
                                    <span class="date"> {{date('H:i A, dS M Y', strtotime($st->created_at))}} </span>
                                </p>
                                <p class="content">
                                    {{$st->status}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
   @else
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-10 ">
                    <div class="status shadow-sm">
                        <div class="row p-3 pb-2">
                                <h4>There no Status please update one.</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
