@php
    $dir = LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr';
@endphp

<!doctype html>
<html  >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,700;1,700&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="{{asset('assets/store/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/store/css/animate.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/store/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/store/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/store/css/jquery.fancybox.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/store/fonts/icomoon/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/store/fonts/flaticon/font/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('assets/store/css/aos.css')}}">
  <link rel="stylesheet" href="{{asset('assets/store/css/style.css')}}">
  <title>{{ $title? ($title . ' | ') : '' }}{{ config('app.name') }}</title>
  <style>
    .image img{
        width: 5rem;
        height: 5rem;
        border-radius: 50%;
        background-color: none !important;

    }
    .user-icon a{
        font-size: 20px;
        color: #000000;
        margin: 0px;
        padding: 0px;
        /* margin-right: 20px; */
    }
    .user-icon .dropdown-menu{
        border: none;
        border-radius: 0px;
        background-color: #eee;
    }
    .logout-btn{
        font-size: 1rem;
        font-weight: 100;
        border-top: 1px solid black;
        padding-top: 1rem;
        margin-top: 1rem;
    }
    .login-btn1{
        font-size: 1rem;
        font-weight: 100;
        border-bottom: 1px solid black;
        padding-top: 1.1rem;
        margin-top: 1rem;
        margin-bottom: 1rem;
        padding-bottom: 1rem;

    }
    .login-btn{
        font-size: 1rem;
        font-weight: 100;
        padding-top: 1.1rem;
        margin-top: 1rem;

    }
    .items{

    }
    .dropdown-item:hover{
        background-color:#eee;
    }
    @media (max-width: 991.98px) {
        .user-icon a{
            margin-right: 3rem
        }
        .menu-icons {
            display: flex;
            justify-content: center;
            align-items: center;
        }
     }
    .user-icon .dropdown-menu{
        text-align: center;
    }
    .user-profile .dropdown-menu img{
        width: 5rem;
        height: 5rem;
        border-radius: 50%;

}

.user-icon-btn{
    font-size: 2rem;
    /* background-color: red; */
    padding-right: 2px;
}

</style>
</head>

<body>

  <div class="search-form" id="search-form">
    <form action="">
      <input type="search" class="form-control" placeholder="Enter keyword to search...">
      <button class="button">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
          <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
        </svg>
      </button>
      <button class="button">
        <div class="close-search">
          <span class="icofont-close js-close-search"></span>
        </div>
      </button>

    </form>
  </div>

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>



  <nav class="site-nav mb-5" lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ $dir }}">
    <div class="sticky-nav js-sticky-header">

      <div class="container position-relative">
        <div class="site-navigation text-center dark">
          <a href="index.html" class="logo menu-absolute m-0">Suii<span class="text-primary">.</span></a>

          <ul class="js-clone-nav pl-0 d-none d-lg-inline-block site-menu">
            <li class="active"><a href="{{route('home')}}">{{__('Home')}}</a></li>
            <li>
              <a href="{{route('products')}}">{{__('Shop')}}</a>
              {{-- <ul class="dropdown">

                <li><a href="#">Underware</a></li>
                <li><a href="#">Clothing</a></li>
                <li><a href="#">Watches</a></li>
                <li><a href="#">Shoes</a></li>
              </ul> --}}
            </li>
            <li class="has-children ">
                <a href="#">{{__('Categories')}}</a>
                <ul class="dropdown">
                @foreach($categories as $category)

                  <li class="@if($category['children']->count() > 0) has-children @endif">
                    <a href="{{route('products',$category['slug'])}}">{{ $category['name'] }}</a>
                    @if($category['children']->count() > 0)
                    <ul class="dropdown">
                        @foreach($category['children'] as $child)
                      <li><a href="{{route('products',$child['slug'])}}">{{$child['name']}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                  </li>
                  @endforeach
                </ul>
              </li>


            <li><a href="shop.html">{{__('About')}}</a></li>
            <li><a href="shop.html">{{__('Contact')}}</a></li>

          </ul>




          <div class="menu-icons mr-5">
              @auth
              <ul class="js-clone-nav pl-0 d-none d-lg-inline-block site-menu ">
                <li class="has-children user-icon">
                    <a href="{{route('profile.index')}}"class=" show user-icon-btn">
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        </svg>
                    </a>
                    <ul class="dropdown">
                      <li><a class="dropdown-item " href="{{route('profile.index')}}">
                        <img src="{{asset('dist/img/avatar5.png')}}" alt=""></a></li>
                      <li>
                        <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit()"><h5 class="logout-btn">{{__('Logout')}}</h5></a>
                                    <form id="logout" method="POST" action="{{ route('logout') }}" style="display: none;">
                                        @csrf
                                    </form>

                      <li class="has-children">
                        <a href="#">{{__('Language')}}</a>
                        <ul class="dropdown">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item">
                                    {{ $properties['native'] }}
                                </a>

                            </li>
                            @endforeach


                        </ul>
                      </li>
                    </ul>
                  </li>

                </ul>
            @else

            <ul class="js-clone-nav pl-0 d-none d-lg-inline-block site-menu">
            <li class="has-children user-icon">
                <a href="#" class=" show user-icon-btn">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    </svg>
                </a>
                <ul class="dropdown">
                  <li><a href="{{route('login')}}">{{__('Log in')}}</a> </li>
                  <li><a href="{{route('register')}}">{{__('Register')}}</a></li>

                  <li class="has-children">
                    <a href="#">{{__('Language')}}</a>
                    <ul class="dropdown">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item">
                                {{ $properties['native'] }}
                            </a>

                        </li>
                        @endforeach


                    </ul>
                  </li>
                </ul>
              </li>

            </ul>
            @endauth

            <a href="#" class="btn-custom-search" id="btn-search">
                <div class="user-icon">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg>
                </div>
                </a>

                <x-cart-menu />


                    </div>

                    <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>

        </div>
      </div>
    </div>
  </nav>



  {{-- <div class="untree_co-section">
    <div class="container">
        {{ $slot }}
    </div>
  </div> --}}
  <div>
      {{ $slot }}
  </div>


  <div class="site-footer">


    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5">
          <div class="widget mb-4">
            <h3 class="mb-2">About UntreeStore</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate modi cumque rem recusandae quaerat at asperiores beatae saepe repudiandae quam rerum aspernatur dolores et ipsa obcaecati voluptates libero</p>
          </div>
          <div class="widget">
            <h3>Join our mailing list and receive exclusives</h3>
            <form action="#" class="subscribe">
              <div class="d-flex">
                <input type="email" class="form-control" placeholder="Email address">
                <input type="submit" class="btn btn-black" value="Subscribe">
              </div>
            </form>


          </div>
        </div>
        <div class="col-lg-2">
          <div class="widget">
            <h3>Help</h3>
            <ul class="list-unstyled">
              <li><a href="#">Contact us</a></li>
              <li><a href="#">Account</a></li>
              <li><a href="#">Shipping</a></li>
              <li><a href="#">Returns</a></li>
              <li><a href="#">FAQ</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="widget">
            <h3>About</h3>
            <ul class="list-unstyled">
              <li><a href="#">About us</a></li>
              <li><a href="#">Press</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Team</a></li>
              <li><a href="#">FAQ</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="widget">
            <h3>Shop</h3>
            <ul class="list-unstyled">
              <li><a href="#">Store</a></li>
              <li><a href="#">Gift Cards</a></li>
              <li><a href="#">Student Discount</a></li>
            </ul>
          </div>
        </div>

      </div>


      <div class="row mt-5">
        <div class="col-12 text-center">
          <ul class="list-unstyled social">
            <li><a href="#"><span class="icon-facebook"></span></a></li>
            <li><a href="#"><span class="icon-instagram"></span></a></li>
            <li><a href="#"><span class="icon-linkedin"></span></a></li>
            <li><a href="#"><span class="icon-twitter"></span></a></li>
          </ul>
        </div>
        <div class="col-12 text-center copyright">
          <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> <!-- License information: https://untree.co/license/ -->
          </p>

        </div>
      </div>
    </div> <!-- /.container -->
  </div> <!-- /.site-footer -->

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <script src="{{asset('assets/store/js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('assets/store/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/store/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/store/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/store/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('assets/store/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('assets/store/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('assets/store/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('assets/store/js/aos.js')}}"></script>
  <script src="{{asset('assets/store/js/custom.js')}}"></script>

</body>

</html>
