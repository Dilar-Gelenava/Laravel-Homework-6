<!DOCTYPE html>
<html>
<head>
	<title> {{ $product['title'] }} </title>
</head>
<body>

	<div class="container">
		<form action="{{ route('updateproduct') }}" method="POST">
			@csrf
			<input type="hidden" name="id" value="{{ $product->id }}">
			<input type="text" class="form-control" name="title" placeholder="title" value="{{ $product['title'] }}">
			<textarea name="description" class="form-control" placeholder="description">{{ $product['description'] }}</textarea>
			<input type="text" class="form-control" name="image" placeholder="image" value="{{ $product['image'] }}">
			<button class="btn btn-primary">save</button>
		</form>
	</div>

</body>
</html>