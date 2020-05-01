@extends('layouts.home')

@section('form')
<div class="container mb-5">
    <div class="row">
        <div class="col-md-10 ">
            <form action="{{route('profile.save')}}" method="POST" class="mt-5 mb-5" enctype="multipart/form-data" >
                @csrf
                <h4 class="mb-5">Update Your Profile</h4>

                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" name="name"  value="{{Auth::user()->name}}" id="name"  class="shadow-sm form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email"  value="{{Auth::user()->email}}" id="email" class="shadow-sm form-control">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nickname">Nickname</label>
                            <input type="text" name="nickname"  value="{{Auth::user()->nickname}}" id="nickname" class="shadow-sm form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Profile Picture</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <button type="submit" class="shadow-sm btn btn-primary mt-2 float-right pl-5 pr-5">   Post   </button>
                </div>
                <br>
            </form>
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



@section('script')

@endsection
