@extends('layouts.appmaster')

@section('title', 'Add Customer')

@section('content')
<div align="center">
<br/>
<h3>Add Customer</h3>

<form method="POST" action= "addcustomer" class="was-validated">
<input type="hidden" name ="_token" value="<?php echo csrf_token()?>"/>
	<table>
	<tr>
		<td>   
			<div class="form-group">
				<label for="firstName">First Name: </label>
				<input type="text" name="firstName" class="form-control" placeholder="Enter First Name" required="required"/>
				<div class="invalid-feedback">Incorrect Information</div>
			</div>
    	</td>
	</tr>
	
	<tr>
		<td>
			<div class="form-group">
				<label for="lastName">Last Name: </label>
				<input type="text" name="lastName" class="form-control" placeholder="Enter Last Name" required="required"/>
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