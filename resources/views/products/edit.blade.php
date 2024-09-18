@extends('\layouts.root')
@push('head')
<title>Edit Product</title>
@endpush

@section('main-section')

<div class="d-flex justify-content-between align-items-center my-5">
	<h2 class="text-white">Edit Product</h2>
	<a href="{{route("products.index")}}" class="btn btn-primary btn-lg">Back</a>
</div>
<div class="card bg-dark">
	<div class="card-body text-white">
		<form action="{{ route('products.update', $product->id) }}" method="post">
			@csrf
			@method('PUT')

			<input type="hidden" name="id" value="{{$product->id}}">

			<label for="" class="form-label mt-4">Product Name</label>
			<input type="text" name="name" class="form-control" value="{{$product->name}}">
			<div class="text-danger">
				@error('name')
				{{$message}}
				@enderror
			</div>

			<label for="" class="form-label mt-4">Product Detail</label>
			<input type="text" name="details" class="form-control" value="{{$product->details}}">
			<div class="text-danger">
				@error('details')
				{{$message}}
				@enderror
			</div>

			<label for="" class="form-label mt-4">Price</label>
			<input type="number" name="price" class="form-control" value="{{$product->price}}" step="0.01">
			<div class="text-danger">
				@error('price')
				{{$message}}
				@enderror
			</div>

			<label for="" class="form-label mt-4">Publish</label>
			<select name="publish" class="form-control" id="publish" required>
				<option value="1" {{$product->publish ? 'selected' : ''}}>Yes</option>
				<option value="0" {{$product->publish ? '' : 'selected'}}>No</option>
			</select>
			<div class="text-danger">
				@error('publish')
				{{$message}}
				@enderror
			</div>

			<button class="btn btn-primary btn-lg mt-4">Update Product</button>
		</form>
	</div>
</div>

@endsection