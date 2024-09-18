@extends('\layouts.root')
@push('head')
<title>Add Product</title>
@endpush

@section('main-section')
<div class="d-flex justify-content-between align-items-center my-5">
	<h2 class="text-white">Add Product</h2>
	<a href="{{route("products.index")}}" class="btn btn-primary btn-lg">Back</a>
</div>
<div class="card bg-dark">
	<div class="card-body">
		<form action="{{route("products.create")}}" method="post">
			@csrf
			
			<label for="" class="form-label mt-4 text-white">Product Name</label>
			<input type="text" name="name" class="form-control" id="">
			<div class="text-danger">
				@error('name')
				{{ $message }}
				@enderror
			</div>
			
			<label for="" class="form-label mt-4 text-white">Product Detail</label>
			<input type="text" name="details" class="form-control" id="">
			<div class="text-danger">
				@error('details')
				{{ $message }}
				@enderror
			</div>
			
			<label for="" class="form-label mt-4 text-white">Price</label>
			<input type="number" name="price" class="form-control" id="" step="0.01">
			<div class="text-danger">
				@error('price')
				{{ $message }}
				@enderror
			</div>
			
			<label for="" class="form-label mt-4 text-white">Publish</label>
			<select name="publish" class="form-control" id="publish" required>
				<option selected>Please select</option>
				<option value="1">Yes</option>
				<option value="0">No</option>
			</select>
			<div class="text-danger">
				@error('publish')
				{{ "This publish field is required." }}
				@enderror
			</div>
			
			<div>
				<!-- create a search box for search function -->
				
				<button class="btn btn-primary btn-lg mt-4 ml-auto">Add</button>
			</div>
		</form>
	</div>
</div>

@endsection