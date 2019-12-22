<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
	<div class="container">
		<h1>Custom Validation Messages</h1>
		@if(Session::has('success'))
	    <div class="alert alert-success">
	        {{ Session::get('success') }}
	        @php
	        Session::forget('success');
	        @endphp
	    </div>
	    @endif

		<form method="POST" action="{{ url('user/create') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Name:</label>
				<input type="text" name="name" class="form-control" placeholder="Name">
				@if ($errors->has('name'))
                	<span class="text-danger">{{ $errors->first('name') }}</span>
            	@endif
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="password" name="password" class="form-control" placeholder="Password">
				@if ($errors->has('password'))
                	<span class="text-danger">{{ $errors->first('password') }}</span>
            	@endif
			</div>
			<div class="form-group">
				<strong>Email:</strong>
				<input type="text" name="email" class="form-control" placeholder="Email">
				@if ($errors->has('email'))
                	<span class="text-danger">{{ $errors->first('email') }}</span>
            	@endif
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-submit">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>
