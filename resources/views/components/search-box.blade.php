<div>
    <input type="text" id="search" class="form-control" placeholder="Search products...">
</div>

<!-- Include jQuery and Bootstrap JS if not already included -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- debounce search -->
<script>
    function debounce(func, wait) {
        let timeout;
        return function(...args) {
            const context = this;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
        };
    }

    $(document).ready(function() {
        $('#search').on('input', debounce(function() {
            const query = $(this).val();
            $.ajax({
                url: '{{ route("products.search") }}',
                method: 'GET',
                data: { query: query },
                success: function(data) {
                    $('#product-table-body').html(data);
                }
            });
        }, 300));
    });
</script>