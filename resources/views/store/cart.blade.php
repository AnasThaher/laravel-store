<x-store-layout title="Cart">
    <div class="page-heading bg-light">
        <div class="container">
          <div class="row align-items-end text-center">
            <div class="col-lg-7 mx-auto">
              <h1>Cart</h1>
              <p class="mb-4"><a href="{{ route('home') }}">Home</a> / <strong>Cart</strong></p>
            </div>
          </div>
        </div>
      </div>

    @if (count($cart->all())>0)



      <div class="untree_co-section">
        <div class="container">
          <div class="row mb-5">
            {{-- <form class="col-md-12" method="post"> --}}
              <div class="site-blocks-table">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="product-thumbnail">Image</th>
                      <th class="product-name">Product</th>
                      <th class="product-price">Price</th>
                      <th class="product-quantity">Quantity</th>
                      <th class="product-total">Total</th>
                      <th class="product-remove">Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- <tr>
                      <td class="product-thumbnail">
                        <img src="images/products/jacket-1-min.jpg" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-black">Top Up T-Shirt</h2>
                      </td>
                      <td>$49.00</td>
                      <td>
                        <div class="input-group mb-3" style="max-width: 120px;">
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-black js-btn-minus" type="button">&minus;</button>
                          </div>
                          <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                          <div class="input-group-append">
                            <button class="btn btn-outline-black js-btn-plus" type="button">&plus;</button>
                          </div>
                        </div>

                      </td>
                      <td>$49.00</td>
                      <td><a href="#" class="btn btn-black btn-sm">X</a></td>
                    </tr> --}}
                    @foreach($cart->all() as $item)

                    <tr>
                      <td class="product-thumbnail">
                        <img src="{{$item->product->image_url}}" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <a href="{{ $item->product->url }}">
                        <h2 class="h5 text-black">{{$item->product->name}}</h2>
                        </a>
                      </td>
                      <td>{{ Money::format($item->product->price) }}</td>
                      <td>
                        <div class="input-group mb-3 row" >
                          {{-- <div class="input-group-prepend"> --}}
                            {{-- <button class="btn btn-outline-black js-btn-minus" type="button">&minus;</button> --}}
                            <form action="{{ route('cart.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="action" value="remove">
                                <div class="input-group-append h-100">
                                <button type="submit" class="btn btn-outline-black">-</button>
                                </div>
                            </form>
                        {{-- </div> --}}

                          <input type="text" min="1" class="form-control text-center" value="{{ $item->quantity }}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                          {{-- <div class="input-group-append"> --}}
                            {{-- <button class="btn btn-outline-black js-btn-plus" type="button">&plus;</button> --}}
                            <form action="{{ route('cart.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="action" value="add">
                                <div class="input-group-append h-100">
                                <button type="submit" class="btn btn-outline-black ">+</button>
                                </div>
                            </form>
                        {{-- </div> --}}
                        </div>

                      </td>
                      <td>{{ Money::format($item->quantity * $item->product->price) }}</td>
                      <td>

                        {{-- <a href="#" class="btn btn-black btn-sm">X</a> --}}
                        <form action="{{ route('cart.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-black btn-sm">X</button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            {{-- </form> --}}
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">
                {{-- <div class="col-md-6 mb-3 mb-md-0">
                  <a href="{{route('cart.update')}}" class="btn btn-black btn-sm btn-block">Update Cart</a>

                </div> --}}
                <div class="col-md-6">
                  <a href="{{ route('home') }}" class="btn btn-outline-black btn-sm btn-block">Continue Shopping</a>

                </div>
              </div>
              {{-- <div class="row">
                <div class="col-md-12">
                  <label class="text-black h4" for="coupon">Coupon</label>
                  <p>Enter your coupon code if you have one.</p>
                </div>
                <div class="col-md-8 mb-3 mb-md-0">
                  <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                </div>
                <div class="col-md-4">
                  <button class="btn btn-black">Apply Coupon</button>
                </div>
              </div> --}}
            </div>
            <div class="col-md-6 pl-5">
              <div class="row justify-content-end">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                      <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                    </div>
                  </div>
                  {{-- <div class="row mb-3"> --}}
                    {{-- <div class="col-md-6">
                      <span class="text-black">Subtotal</span>
                    </div>
                    <div class="col-md-6 text-right">
                      <strong class="text-black">$230.00</strong>
                    </div> --}}
                  {{-- </div> --}}
                  <div class="row mb-5">
                    <div class="col-md-6">
                      <span class="text-black">Total</span>
                    </div>
                    <div class="col-md-6 text-right">
                      <strong class="text-black">{{ Money::format($cart->total()) }}</strong>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 mr-5">
                      <a class="btn btn-black btn-lg  btn-block" href="{{route('checkout')}}">Proceed To Checkout</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @else

      <div class="untree_co-section">
        <div class="container">


          <div class="row">
            <div class="col-md-12">
              <div class="row mb-12">

                <div class="col-md-12">
                    <h4 class="text-center m-5"> Your cart is empty</h4>
                  <a href="{{ route('home') }}" class="btn btn-black btn-sm btn-block">Continue Shopping</a>

                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
        @endif
</x-store-layout>
