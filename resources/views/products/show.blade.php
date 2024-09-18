@extends('\layouts.root')
@push('head')
<title>Edit Product</title>
@endpush

@section('main-section')

<!-- display information only, cannot edit or modify -->
<div class="d-flex justify-content-between align-items-center my-5">
	<h2 class="text-white">Product Details</h2>
	<a href="{{route("products.index")}}" class="btn btn-primary btn-lg">Back</a>
</div>
<div class="card bg-dark">
	<div class="card-body text-white">
		<div>
			<input type="hidden" name="id" value="{{$product->id}}">

			<label for="" class="form-label mt-4">Product Name</label>
			<input type="text" name="name" class="form-control" value="{{$product->name}}" readonly>

			<label for="" class="form-label mt-4">Product Detail</label>
			<input type="text" name="details" class="form-control" value="{{$product->details}}" readonly>

			<label for="" class="form-label mt-4">Price</label>
			<input type="number" name="price" class="form-control" value="{{$product->price}}" readonly>

			<label for="" class="form-label mt-4">Publish</label>
			<select name="publish" class="form-control" disabled>
				<option value="1" {{$product->publish ? 'selected' : ''}}>Yes</option>
				<option value="0" {{$product->publish ? '' : 'selected'}}>No</option>
			</select>
		</div>
	</div>
</div>

@endsection