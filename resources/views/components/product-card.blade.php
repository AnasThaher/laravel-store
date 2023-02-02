@props([
    'product', 'new' => false
])
 <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
    <div class="product-item">
        <a href="{{route('products.show',[$product->category->slug,$product->slug])}}" class="product-img">
            {{-- @if ($new)
            <div class="label new top-right ml-5">
                <div class='content'><span>New</span></div>
            </div>
            @endif --}}
            @if ($new)
            <div class="ps-badge"><span>New</span></div>
            @endif
            @if ($product->compare_price)
{{--
            <div class="label sale top-right ">
                <div class='content'>-{{ $product->discount_percent }}%</div>
            </div> --}}

            <div class="ps-badge ps-badge--sale @if($new) ps-badge--2nd @endif"><span>-{{ $product->discount_percent }}%</span></div>
            @endif

            {{-- <img src="{{asset('assets/store/images/products/bottoms-1-min.jpg" alt="Image')}}" class="img-fluid"> --}}
            <img src="{{ $product->image_url }}"class="img-fluid" >

        </a>
        <h3 class="title"><a href="{{route('products.show',[$product->category->slug,$product->slug])}}">{{$product->name}}</a></h3>
        <p class="title"><a href="{{route('products',$product->category->slug)}}">{{$product->category->name}}</a></ح>

        <div class="price">
            @if ($product->compare_price)
            <del>${{$product->compare_price}}</del> &mdash;
            @endif

            <span>${{$product->price}}</span>
        </div>
    </div>
</div>
