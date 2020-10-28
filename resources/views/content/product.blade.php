@foreach ($products as $product)
		<div style="margin-left: 50%; transform: translate(-50%); border: 2px solid black; width: 500px;">
			<h3 style="text-align: center;">{{ $product['title'] }}</h3>
			<p>{{ $product['description'] }}</p>
			<img style="margin-left: 50%; transform: translate(-50%);" src="{{ $product['image'] }}" width="450px">

			<div class="container" style="width: 400px;">
			<a href="{{ route('showproduct',["id"=>$product->id ]) }}" class="btn btn-success">
				დათვალიერება
			</a>
			@auth
				@if($product['user_id'] == Auth::user()->id)
		
					<form action="{{ route('editproduct') }}" method="POST">
						@csrf
						<input type="hidden" name="id" value="{{ $product->id }}">
						<button class="btn btn-warning">
						  განახლება
						</button>
					</form>

					<form action="{{ route('destroyproduct') }}" method="POST">
						@csrf
						<input type="hidden" name="destroy" value="{{ $product->id }}">
						<button class="btn btn-danger">
						  წაშლა
						</button>
					</form>
				
				@endif
			@endauth
			</div>
		<p>{{ $product->created_at->diffForHumans() }}</p>
		</div>
@endforeach