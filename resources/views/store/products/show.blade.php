<x-store-layout :title="$product->name">


    <style>

        .stars{
            z-index: 999;
        }

         .mt-200{
             margin-top:200px;
         }

        input.star2 {
            display: none;


        }



        label.star2 {

          float: right;

          padding: 6px;
          font-size: 27px;

          color: #bbbbbb;

          transition: all .2s;

        }



        input.star2:checked ~ label.star2:before {

          content: '\f005';

          color: #FD4;

          transition: all .25s;

        }


        input.star-five:checked ~ label.star2:before {

          color: #FE7;

          text-shadow: 0 0 20px #952;

        }



        input.star-one:checked ~ label.star2:before { color: #F62; }



        label.star2:hover { transform: rotate(-15deg) scale(1.3); }



        label.star2:before {

          content: '\f006';

          font-family: FontAwesome;

        }
          </style>




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"five --}}



    <div class="test hedin">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
            </div>
        </div>
    </div>
    <div class="ps-product--detail pt-60 mt-5 hedin">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-10 col-md-12 col-lg-offset-1">
                    <div class="ps-product__thumbnail">
                        <div class="ps-product__preview">
                            <div class="ps-product__variants overflow-hidden">
                                <div class="item"><img src="{{ $product->image_url }}" alt=""></div>
                                {{-- @foreach ($product->getMedia('gallery') as $media)
                                <div class="item"><img src="{{ $media->getUrl() }}" alt=""></div>
                                @endforeach --}}
                            </div>
                            {{-- <a class="popup-youtube ps-product__video" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><img src="{{ $product->image_url }}" alt=""><i class="fa fa-play"></i></a> --}}
                        </div>
                        <div class="ps-product__image">
                            <div class="item"><img class="zoom" src="{{ $product->image_url }}" alt="" data-zoom-image="{{ $product->image_url }}"></div>
                            {{-- @foreach ($product->getMedia('gallery') as $media)
                            <div class="item"><img class="zoom" src="{{ $media->getUrl() }}" data-zoom-image="{{ $media->getUrl() }}" alt=""></div>
                            @endforeach --}}
                        </div>
                    </div>
                    <div class="ps-product__thumbnail--mobile">
                        <div class="ps-product__main-img"><img src="{{ $product->image_url }}" alt=""></div>
                        <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on"><img src="images/shoe-detail/1.jpg" alt=""><img src="images/shoe-detail/2.jpg" alt=""><img src="images/shoe-detail/3.jpg" alt=""></div>
                    </div>
                    <div class="ps-product__info">
                        <div class="ps-product__rating">
                            <x-rating-stars :rating="$product->rating" />
                            {{-- <a href="#">(Read all {{ $product->total_reviews }} reviews)</a> --}}
                        </div>
                        <h1>{{ $product->name }}</h1>
                        <p class="ps-product__category">
                            <a href="#">{{ $category->name }}</a>
                        </p>
                        <h3 class="ps-product__price">{{ Money::format($product->price) }}
                            @if ($product->compare_price)
                            <del>{{ App\Helpers\Money::format($product->compare_price) }}</del>
                            @endif
                        </h3>
                        <div class="ps-product__block ps-product__quickview mb-5">
                            <h4>QUICK REVIEW</h4>
                            <p>{{ Str::words($product->description, 60) }}</p>
                        </div>
                        {{-- <div class="ps-product__block ps-product__style">
                            <h4>CHOOSE YOUR STYLE</h4>
                            <ul>
                                <li><a href="product-detail.html"><img src="images/shoe/sidebar/1.jpg" alt=""></a></li>
                                <li><a href="product-detail.html"><img src="images/shoe/sidebar/2.jpg" alt=""></a></li>
                                <li><a href="product-detail.html"><img src="images/shoe/sidebar/3.jpg" alt=""></a></li>
                                <li><a href="product-detail.html"><img src="images/shoe/sidebar/2.jpg" alt=""></a></li>
                            </ul>
                        </div> --}}
                        <form action="{{route('cart')}}" method="post" class="mt-5">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="ps-product__block ps-product__size quantity-details d-flex  ">
                            <div class="form-group quantity-details w-50 ">
                                <input class="form-control" type="number" min="1" name="quantity" value="1">
                            </div>
                            <div class="ps-product__shopping w-50">
                                <button type="submit" class="add-cart-btn btn btn-black">Add to cart<i class="ps-icon-next"></i></button>
                            </div>

                        </div>

                        </form>
                    </div>


                   <div class="clearfix"></div>

                    <div class="ps-product__content mt-50">
                        <ul class="tab-list" role="tablist">
                            <li class="nav-item">
                                {{-- <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                  aria-selected="true">Home</a> --}}
                              </li>
                              <li class="nav-item">
                                {{-- <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                  aria-selected="false">Profile</a> --}}
                              </li>
                              <li class="nav-item">
                                {{-- <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                  aria-selected="false">Contact</a> --}}
                              </li>
                        </ul>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                aria-selected="false">Review</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                aria-selected="false">PRODUCT TAG</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="addetinal-tab" data-toggle="tab" href="#addetinal" role="tab" aria-controls="contact"
                                aria-selected="false">ADDITIONAL</a>
                            </li>
                          </ul>
                          <div class="tab-content m-2" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="tab-pane active" role="tabpanel" id="tab_01">
                                    <p>{{ $product->description }}</p>

                                    <div>
                                        <p class="mb-20">{{ $product->reviews()->count() }} review for <strong>{{ $product->name }}</strong></p>
                                        @foreach($product->reviews()->with('user')->latest()->get() as $review)
                                        <div class="ps-review">
                                            <div class="ps-review__thumbnail"><img src="images/user/1.jpg" alt=""></div>
                                            <div class="ps-review__content">
                                                <header>
                                                    <x-rating-stars :rating="$review->rating" />
                                                    <p>By<a href=""> {{ $review->user->name }}</a> - {{ $review->created_at->format('F d, Y') }}</p>
                                                </header>
                                                <p>{{ $review->review }}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade m-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="tab-pane" role="tabpanel" id="tab_02">





                                    <form class="ps-product__review" action="{{ route('products.reviews.store', $product->id) }}" method="post">
                                        @csrf
                                            <div class="stars">

                                                <div class="div-stars">

                                                  <input class="star2 star-five" id="star-five" type="radio" value="5" name="rating"/>

                                                  <label class="star2 star-five" for="star-five"></label>

                                                  <input class="star2 star-fo" id="star-fo" type="radio" value="4" name="rating"/>

                                                  <label class="star2 star-fo" for="star-fo"></label>

                                                  <input class="star2 star-three" id="star-three" type="radio" value="3" name="rating"/>

                                                  <label class="star2 star-three" for="star-three"></label>

                                                  <input class="star2 star-tow" id="star-tow" type="radio" value="2" name="rating"/>

                                                  <label class="star2 star-tow" for="star-tow"></label>

                                                  <input class="star2 star-one" id="star-one" type="radio" value="1" name="rating"/>

                                                  <label class="star2 star-one" for="star-one"></label>

                                                </div>


                                        </div>
                                        <div class="form-group">
                                        <h4>ADD YOUR REVIEW</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6  ">
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                                                <div class="form-group">
                                                    <label>Your Review:</label>
                                                    <textarea name="review" class="form-control" rows="6"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-black">Submit<i class="ps-icon-next"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade m-2" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="tab-pane" role="tabpanel" id="tab_03">
                                    <p>Add your tag <span> *</span></p>
                                    <form class="ps-product__tags" action="_action" method="post">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="">
                                            <button class="ps-btn ps-btn--sm">Add Tags</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade m-2" id="addetinal" role="tabpanel" aria-labelledby="addetinal-tab">
                                <div class="tab-pane" role="tabpanel" id="tab_04">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="6" placeholder="Enter your addition here..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="ps-btn" type="button">Submit</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>




{{--
                     <div class="clearfix"></div>
                    <div class="ps-product__content mt-50">
                        <ul class="tab-list" role="tablist">
                            <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Overview</a></li>
                            <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Review</a></li>
                            <li><a href="#tab_03" aria-controls="tab_03" role="tab" data-toggle="tab">PRODUCT TAG</a></li>
                            <li><a href="#tab_04" aria-controls="tab_04" role="tab" data-toggle="tab">ADDITIONAL</a></li>
                        </ul>
                    </div>
                    <div class="tab-content mb-60">
                        <div class="tab-pane active" role="tabpanel" id="tab_01">
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="tab_02">






                            <style>

                                .stars{
                                    z-index: 999;
                                }

                                 .mt-200{
                                     margin-top:200px;
                                 }

                                input.star2 {
                                    display: none;


                                }



                                label.star2 {

                                  float: right;

                                  padding: 6px;
                                  font-size: 27px;

                                  color: #bbbbbb;

                                  transition: all .2s;

                                }



                                input.star2:checked ~ label.star2:before {

                                  content: '\f005';

                                  color: #FD4;

                                  transition: all .25s;

                                }


                                input.star-five:checked ~ label.star2:before {

                                  color: #FE7;

                                  text-shadow: 0 0 20px #952;

                                }



                                input.star-one:checked ~ label.star2:before { color: #F62; }



                                label.star2:hover { transform: rotate(-15deg) scale(1.3); }



                                label.star2:before {

                                  content: '\f006';

                                  font-family: FontAwesome;

                                }
                                  </s>

                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"five




                            <form class="ps-product__review" action="{{ route('products.reviews.store', $product->id) }}" method="post">
                                @csrf

                                    <div class="stars">

                                        <div class="div-stars">

                                          <input class="star2 star-five" id="star-five" type="radio" value="5" name="rating"/>

                                          <label class="star2 star-five" for="star-five"></label>

                                          <input class="star2 star-fo" id="star-fo" type="radio" value="4" name="rating"/>

                                          <label class="star2 star-fo" for="star-fo"></label>

                                          <input class="star2 star-three" id="star-three" type="radio" value="3" name="rating"/>

                                          <label class="star2 star-three" for="star-three"></label>

                                          <input class="star2 star-tow" id="star-tow" type="radio" value="2" name="rating"/>

                                          <label class="star2 star-tow" for="star-tow"></label>

                                          <input class="star2 star-one" id="star-one" type="radio" value="1" name="rating"/>

                                          <label class="star2 star-one" for="star-one"></label>

                                        </div>


                                </div>
                                <div class="form-group">
                                <h4>ADD YOUR REVIEW</h4>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6  ">
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                                        <div class="form-group">
                                            <label>Your Review:</label>
                                            <textarea name="review" class="form-control" rows="6"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-black">Submit<i class="ps-icon-next"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="tab_03">
                            <p>Add your tag <span> *</span></p>
                            <form class="ps-product__tags" action="_action" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="">
                                    <button class="ps-btn ps-btn--sm">Add Tags</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="tab_04">
                            <div class="form-group">
                                <textarea class="form-control" rows="6" placeholder="Enter your addition here..."></textarea>
                            </div>
                            <div class="form-group">
                                <button class="ps-btn" type="button">Submit</button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                        <h3 class="ps-section__title" data-mask="Related item">- YOU MIGHT ALSO LIKE</h3>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="ps-section__content">
                <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/1.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> ?? 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div>
                                <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/2.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price">
                                        <del>??220</del> ?? 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/3.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> ?? 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/4.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> ?? 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/5.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> ?? 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/6.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                                    <select class="ps-rating ps-shoe__rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> ?? 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</x-store-layout>
