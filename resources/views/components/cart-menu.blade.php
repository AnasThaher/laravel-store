{{-- <div class="ps-cart"><a class="ps-cart__toggle" href="#"><span><i>{{ $cart->count() }}</i></span><i class="ps-icon-shopping-cart"></i></a>
    <div class="ps-cart__listing">
        <div class="ps-cart__content">
            @foreach ($cart as $item)
            <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>
                <div class="ps-cart-item__thumbnail"><a href="{{ $item->product->url }}"></a><img src="{{ $item->product->image_url }}" alt=""></div>
            <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="{{ $item->product->url }}">{{ $item->product->name }}</a>
                    <p>
                        <span>Quantity: <i>{{ $item->quantity }}</i></span>
                        <span>Total: <i>{{ Money::format($item->quantity * $item->product->price) }}</i></span>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="ps-cart__total">
            <p>Number of items: <span>{{ $cart->count() }}</span></p>
            <p>Item Total: <span>{{ Money::format($total) }}</span></p>
        </div>
        <div class="ps-cart__footer"><a class="ps-btn" href="{{ route('cart') }}">Check out<i class="ps-icon-arrow-left"></i></a></div>
    </div>
</div> --}}


<a href="{{ route('cart') }}"  class="cart">
    <div class="user-icon">
<span class="item-in-cart">{{ $cart->count() }}</span>
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg>

</div>
</a>
