@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                        <div class="text-success">{{Session::get("message") }}</div>   

                    {!!Form::open(["url"=>"message/send", "method"=>"post"])!!}
                         <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">Subject</label>
                            <div class="col-md-6">
                                <input type="text" name="subject" class="form-control" placeholder=" Enter your subjec..." /> 
                                <div class="text-danger"><span>{{ $errors->has('subject')? $errors->first('subject'):"" }}</span></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right"> Write your Message</label>
                            <div class="col-md-6">
                                <textarea name="message"  class="form-control"></textarea>    
                                <div class="text-danger"><span>{{ $errors->has('message')? $errors->first('message'):"" }}</span></div>
                            </div>
                        </div>
                        
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <th></th>
                                    <td><input type="checkbox" class="checkbox"  name="email[]" value="{{$user->email}}" /></td>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                 
                                @endforeach
                                 <div class="text-danger"><span>{{ $errors->has('email')? $errors->first('email'):"" }}</span></div>
                            </tbody>
                        </table>
                        <div class="form-group row">
                         
                            <div class="col-md-6">
                                 {!!  Form::submit("Send Message", ["class"=>"btn btn-primary"]); !!}                    
                            </div>
                        </div>
                       
                        
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
