@extends('\layouts.root')
@push('head')
<title>Product Management</title>
@endpush

@section('main-section')

<div class="d-flex justify-content-between">
	<h1 class="my-4 text-white">Product List</h1>
	<div class="row align-items-center">
		<div class="col-auto">
			@include('components.search-box')
		</div>
		<div class="col-auto">
			<a href="{{ route('products.create') }}" class="btn btn-success btn-lg">Add Product</a>
		</div>
	</div>
</div>
<table class="table table-striped table-dark">
	<thead>
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Price (RM)</th>
			<th>Details</th>
			<th>Publish</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody id="product-table-body">
		@foreach($products as $product)
		<tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ $product->name }}</td>
			<td>{{ $product->price }}</td>
			<td>{{ $product->details }}</td>
			<td>{{ $product->publish ? 'Yes' : 'No' }}</td>
			<td>
				<a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Show</a>
				<a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
				<form action="{{ route('products.delete', $product->id) }}" method="post" style="display:inline;">
					@csrf
					@method('DELETE')
					<button class="btn btn-danger btn-sm">Delete</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@include('components.pop-up')

@endsection