@props([
    'product', 'new' => false
])
 <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
    <div class="product-item">
        <a href="shop-single.html" class="product-img">
            @if ($new)
            <div class="label new top-right ml-5">
                <div class='content'><span>New</span></div>
            </div>
            @endif
            @if ($product->compare_price)

            <div class="label sale top-right ">
                <div class='content'>-{{ $product->discount_percent }}%</div>
            </div>
            @endif

            {{-- <img src="{{asset('assets/store/images/products/bottoms-1-min.jpg" alt="Image')}}" class="img-fluid"> --}}
            <img src="{{ $product->image_url }}"class="img-fluid" >

        </a>
        <h3 class="title"><a href="#">{{$product->name}}</a></h3>
        <div class="price">
            @if ($product->compare_price)
            <del>${{$product->compare_price}}</del> &mdash;
            @endif

            <span>${{$product->price}}</span>
        </div>
    </div>
</div>
