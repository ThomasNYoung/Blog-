<!DOCTYPE html>
<html lang="en">
<head>
    <title>My First View</title>
</head>
<body>
    <h1>Hello,  {{{$name}}} !</h1>

    <div class="container">
    	
    	@if($errors->has())

    		<div>
    			<ul>
    				@foreach($errors->all)
    			</ul>
    		</div>
    </div>
</body>
</html>