
<!doctype html>
<html lang="en">

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



</style>
  <title>{{config('app.name')}}</title>
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



  <nav class="site-nav mb-5">
    <div class="sticky-nav js-sticky-header">

      <div class="container position-relative">
        <div class="site-navigation text-center dark">
          <a href="index.html" class="logo menu-absolute m-0">UntreeStore<span class="text-primary">.</span></a>

          <ul class="js-clone-nav pl-0 d-none d-lg-inline-block site-menu">
            <li class="active"><a href="shop.html">Home</a></li>
            <li class="has-children">
              <a href="shop.html">Shop</a>
              <ul class="dropdown">
                <li><a href="#">T-Shirt</a></li>
                <li><a href="#">Underware</a></li>
                <li><a href="#">Clothing</a></li>
                <li><a href="#">Watches</a></li>
                <li><a href="#">Shoes</a></li>
              </ul>
            </li>
            <li class="has-children ">
              <a href="#">Pages</a>
              <ul class="dropdown">
                <li><a href="elements.html">Elements</a></li>
                <li><a href="about.html">About</a></li>
                <li class="active"><a href="contact.html">Contact</a></li>
                <li><a href="cart.html">Cart</a></li>
                <li><a href="checkout.html">Checkout</a></li>

                <li class="has-children">
                  <a href="#">Menu Two</a>
                  <ul class="dropdown">
                    <li><a href="#">T-Shirt</a></li>
                    <li><a href="#">Underware</a></li>
                    <li><a href="#">Clothing</a></li>
                    <li><a href="#">Watches</a></li>
                    <li><a href="#">Shoes</a></li>

                  </ul>
                </li>
                <li><a href="#">Menu Three</a></li>
              </ul>
            </li>

            <li><a href="shop.html">Men</a></li>
            <li><a href="shop.html">Women</a></li>

          </ul>




          <div class="menu-icons">

                <a href="#" class="btn-custom-search" id="btn-search">
                    <div class="user-icon">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg>
                </div>
                </a>

                <a href="cart.html" class="cart">
                    <div class="user-icon">
                <span class="item-in-cart">2</span>
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
                </div>
                </a>

                <a href="#" class="user-profile ">
                    @auth

                    <div class="dropdown show user-icon ">
                        <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{-- {{ Auth::user()->name ?? '' }} --}}
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            </svg>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <div class="items">
                        <a class="dropdown-item image" href="{{route('profile.index')}}">
                            <img src="{{asset('dist/img/avatar5.png')}}" alt=""></a>
                            <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit()"><h5 class="logout-btn">Logout</h5></a>
                                    <form id="logout" method="POST" action="{{ route('logout') }}" style="display: none;">
                                        @csrf
                                    </form>
                        </div>
                        </div>
                    </div>
                    @else
                    <div class="dropdown show user-icon ">
                        <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{-- {{ Auth::user()->name ?? '' }} --}}
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            </svg>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <div class="items">
                        <a class="dropdown-item " href="{{route('login')}}"><h5 class="login-btn1">Login</h5> </a>
                        <a class="dropdown-item " href="{{route('register')}}"><h5 class="login-btn">register</h5> </a>

                        </div>
                        </div>
                    </div>
                    @endauth

                    </a>

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
