 <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="img/logo.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.html">Cart - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="{{$Active==="Home" ? 'active':""}}"><a href="{{route('home')}}">Home</a></li>
                        <li class="{{$Active==="Shop" ? 'active':""}}"><a href="{{route('shop')}}">Shop page</a></li>
                        <li class="{{$Active==="Single" ? 'active':""}}"><a href="{{route('single')}}">Single product</a></li>
                        <li class="{{$Active==="Cart" ? 'active':""}}"><a href="{{route('cart')}}">Cart</a></li>
                        <li class="{{$Active==="Checkout" ? 'active':""}}"><a href="{{route('checkout')}}">Checkout</a></li>
                        <li class="{{$Active==="Category" ? 'active':""}}"><a href="#">Category</a></li>
                        <li class="{{$Active==="Others" ? 'active':""}}"><a href="#">Others</a></li>
                        <li class="{{$Active==="Contact" ? 'active':""}}"><a href="#">Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->