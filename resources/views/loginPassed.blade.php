
@extends('layouts.appmaster')
@section('title', 'Login Passed')

@section('content')
<br/>
<h2>Login Passed</h2>


    @if($model->getUserName() == 'hollandaucoin')
    	<h4>Welcome Back Holland</h4>
    @else
    	<h4>Welcome New User</h4>
    @endif

<input type="submit" formaction="login" class="btn btn-primary" value="Try Again">
@endsection