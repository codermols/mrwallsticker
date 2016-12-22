<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/libs.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script>
      (function(d) {
        var config = {
          kitId: 'ukh4ajd',
          scriptTimeout: 3000,
          async: true
        },
        h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
      })(document);
    </script>
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand navbar-brand-centered" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse js-navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="dropdown mega-dropdown">
                  <a href="#" class="dropdown-toggle nav-bars" data-toggle="dropdown">
                    <img class="img-responsive" height="22" width="22" src="/images/icons/menu-icon.svg" class="nav-bars">MENU
                  </a>
                  <ul class="dropdown-menu mega-dropdown-menu row">
                    <li class="col-sm-3">
                      <ul>
                        <li class="dropdown-header">New in Stores</li>
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            <div class="item active">
                              <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                              <h4><small>Summer dress floral prints</small></h4>
                              <button class="btn btn-primary" type="button">49,99 €</button>
                              <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                            </div>
                            <!-- End Item -->
                            <div class="item">
                              <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                              <h4><small>Gold sandals with shiny touch</small></h4>
                              <button class="btn btn-primary" type="button">9,99 €</button>
                              <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                            </div>
                            <!-- End Item -->
                            <div class="item">
                              <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                              <h4><small>Denin jacket stamped</small></h4>
                              <button class="btn btn-primary" type="button">49,99 €</button>
                              <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                            </div>
                            <!-- End Item -->
                          </div>
                          <!-- End Carousel Inner -->
                        </div>
                        <!-- /.carousel -->
                        <li class="divider"></li>
                        <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                      </ul>
                    </li>
                    <li class="col-sm-3">
                      <ul>
                        <li class="dropdown-header">Dresses</li>
                        <li><a href="#">Unique Features</a></li>
                        <li><a href="#">Image Responsive</a></li>
                        <li><a href="#">Auto Carousel</a></li>
                        <li><a href="#">Newsletter Form</a></li>
                        <li><a href="#">Four columns</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Tops</li>
                        <li><a href="#">Good Typography</a></li>
                      </ul>
                    </li>
                    <li class="col-sm-3">
                      <ul>
                        <li class="dropdown-header">Jackets</li>
                        <li><a href="#">Easy to customize</a></li>
                        <li><a href="#">Glyphicons</a></li>
                        <li><a href="#">Pull Right Elements</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Pants</li>
                        <li><a href="#">Coloured Headers</a></li>
                        <li><a href="#">Primary Buttons & Default</a></li>
                        <li><a href="#">Calls to action</a></li>
                      </ul>
                    </li>
                    <li class="col-sm-3">
                      <ul>
                        <li class="dropdown-header">Accessories</li>
                        <li><a href="#">Default Navbar</a></li>
                        <li><a href="#">Lovely Fonts</a></li>
                        <li><a href="#">Responsive Dropdown </a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Newsletter</li>
                        <form class="form" role="form">
                          <div class="form-group">
                            <label class="sr-only" for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                          </div>
                          <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </form>
                      </ul>
                    </li>
                  </ul>

                </li>
              </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Log ind</a></li>
                        <li><a href="{{ url('/opret') }}">Opret bruger</a></li>
                    @else
                      <li class="dropdown">

                        <a href="/cart"><img class="img-responsive" src="/images/icons/shoppingbag-icon.svg" />
                          @if (Auth::user()->cart->count() !== 0)
                            <i>{{Auth::user()->cart->count()}}</i>
                          @endif
                        </a>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          <img class="img-responsive" src="/images/icons/profile-icon.svg" />
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/admin') }}">Dashboard</a>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>  
                        </ul>
                      </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main content --}}
    <div class="container">
        @yield('content')
    </div>
    {{-- Footer content --}}
    <footer class="container" role="contentinfo">
      <div class="rabat-kupon col-md-12">
        <h4>Få rabatkupon på 20%!</h4>
        <p class="col-md-4">Tilmeld vores nyhedsbrev og få opdateringer omkring nyeste produkter og tilbud og meget mere.</p>

        <form action="#" method="post">
          <div class="form-group">
            <input type="text" class="form-control col-md-7" placeholder="Skriv din email adresse her">
            <button type="submit" class="btn btn-primary btn-lg">Tilmeld nu</button>
          </div>
        </form>

      </div>
    </footer> 


    <div class="container">
      <div class="row betalingskort">
        <img src="/images/icons/kreditkort/paypal.png" alt="">
        <img src="/images/icons/kreditkort/visa.png" alt="">
        <img src="/images/icons/kreditkort/visa electron.png" alt="">
        <img src="/images/icons/kreditkort/mastercard.png" alt="">
        <img src="/images/icons/kreditkort/maestro.png" alt="">
      </div>
    </div>
    
    <div class="container">
      <div class="footer-nav">
        <ul class="col-md-8">
          <li>
            <a href="/">
              FAQ - Ofte stillede spørgsmål
            </a>
          </li>
          <li>
            <a href="/">
              Handelsbetingelser
            </a>
          </li>
          <li>
            <a href="/">
              Cookies
            </a>
          </li>
          <li>
            <a href="/">
              Kontakt os
            </a>
          </li>
        </ul>
        <div class="footer-nav__logo col-md-4">
          <span>
            Mr<br>  
            Wallsticker
          </span>
          <p>©2016 Mr. Wallsticker CVR: 1808054</p>
        </div>
      </div>
    </div>

  </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/libs.js"></script>

    @yield('scripts.footer')
    
    @include('flash')
</body>
</html>
