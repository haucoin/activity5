@extends('layouts.appmaster')

@section('title', 'Add Order')

@section('content')
<div align="center">
<br/>
<h3>Add Order</h3>

<form method="POST" action= "addorder" class="was-validated">
<input type="hidden" name ="_token" value="<?php echo csrf_token()?>"/>
	<table>
	<tr>
		<td>   
			<div class="form-group">
				<label for="product">Product: </label>
				<input type="text" name="product" class="form-control" placeholder="Enter Product" required="required"/>
				<div class="invalid-feedback">Incorrect Information</div>
			</div>
    	</td>
	</tr>
	<tr>
		<td>
			<div class="form-group">
				<label for="userId">User ID: </label>
				<input type="text" name="userId" value="{{ Session::get('nextId')}}" class="form-control" placeholder="Enter User ID" required="required"/>
				<div class="invalid-feedback">Incorrect Information</div>
			</div>
		</td>
	</tr>
	
	
	<tr>
		<td>
			<div class="form-group">
				<label for="firstName">First Name: </label>
				<input type="text" name="firstName" value="{{ Session::get('firstName')}}" class="form-control" placeholder="Enter First Name" required="required"/>
				<div class="invalid-feedback">Incorrect Information</div>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="form-group">
				<label for="lastName">Last Name: </label>
				<input type="text" name="lastName" value="{{ Session::get('lastName')}}" class="form-control" placeholder="Enter Last Name" required="required"/>
				<div class="invalid-feedback">Incorrect Information</div>
			</div>
		</td>
	</tr>
		
		
		
	<tr>
		<td colspan= "2" align="center">
		<div align="center">
		<input type= "submit" value= "Add" class="btn btn-primary">
		</div>
		</td>
	</tr>	
	</table>
	<br/>
</form>
</div>
@endsection