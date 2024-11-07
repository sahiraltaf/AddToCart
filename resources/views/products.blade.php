@extends('layout')
   
@section('content') 

<div class="row mt-4">
    @foreach($products as $product)
        <div class="col-md-3">
            <div class="card text-center">
                <img src="{{ $product->image }}" alt="" class="card-img-top">
                <div class="caption card-body">
                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>
                    <p><strong>Price: </strong> $ {{ $product->price }}</p>
                    <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a>

                    <!-- <a href="javascript:void(0);" class="btn btn-warning btn-block text-center add-to-cart" role="button"  data-product-id="{{ $product->id }}">Add to cart</a> -->
                
                </div>
            </div>
        </div>
    @endforeach
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('.add-to-cart').on('click', function() {
            var productId = $(this).data('product-id');
            // alert(productId);
            // Send AJAX request
            $.ajax({
                url: "{{ route('add.to.cart', '') }}/" + productId,
                type: 'GET',
                // data: {
                //     _token: "{{ csrf_token() }}", // CSRF token for protection
                // },
                success: function(response) {
                    // Show a success message
                    console.log(response.message);
                    alert(response.message);
                    debugger;
                    // Optionally update the cart count on the page
                    // $('#cart-count-number').text(response.cartCount);
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + xhr.responseJSON.message);
                }
            });
        });
    });
</script>
@endsection

@endsection
