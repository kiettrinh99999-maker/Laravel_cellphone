{{-- <pre>{{ print_r($products, true) }}</pre> --}}

@extends('layouts.layout')
@section('active_home')
active
@endsection
@section('title')
    Home
@endsection
@section('content')
    <section>
       <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="img/h4-slide.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								iPhone <span class="primary">6 <strong>Plus</strong></span>
							</h2>
							<h4 class="caption subtitle">Dual SIM</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li>
                        <img src="img/h4-slide2.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								by one, get one <span class="primary">50% <strong>off</strong></span>
							</h2>
							<h4 class="caption subtitle">school supplies & backpacks.*</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="img/h4-slide3.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Apple <span class="primary">Store <strong>Ipod</strong></span>
							</h2>
							<h4 class="caption subtitle">Select Item</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="img/h4-slide4.png" alt="Slide">
						<div class="caption-group">
						  <h2 class="caption title">
								Apple <span class="primary">Store <strong>Ipod</strong></span>
							</h2>
							<h4 class="caption subtitle">& Phone</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->

        <div class="slider-area">
            <div class="block-slider block-slider4">
                <ul id="bxslider-home4">
                    {{-- @foreach ($products as $product)
                        <li>
                           <img src="{{ asset('img/' .$product['Image'] ) }}" alt="">
                            <div class="caption-group">
                                <h2 class="caption title">
                                    Apple <span class="primary">Store <strong>Ipod</strong></span>
                                </h2>
                                <h4 class="caption subtitle">& Phone</h4>
                                <a class="caption button-radius" href="#">
                                    <span class="icon"></span>Shop now
                                </a>
                            </div>
                        </li>
                    @endforeach --}}
                </ul>
            </div>
        </div>


        <div class="slider-area">
            <div class="block-slider block-slider4">
                <ul id="bxslider-home4">
                    {{-- @foreach ($products as $product)
                        <li>
                           <img src="{{ asset('img/' .$product['Image'] ) }}" alt="">
                            <div class="caption-group">
                                <h2 class="caption title">
                                    Apple <span class="primary">Store <strong>Ipod</strong></span>
                                </h2>
                                <h4 class="caption subtitle">& Phone</h4>
                                <a class="caption button-radius" href="#">
                                    <span class="icon"></span>Shop now
                                </a>
                            </div>
                        </li>
                    @endforeach --}}
                </ul>
            </div>
        </div>




        <div class="promo-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="single-promo promo1">
                            <i class="fa fa-refresh"></i>
                            <p>30 Days return</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-promo promo2">
                            <i class="fa fa-truck"></i>
                            <p>Free shipping</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-promo promo3">
                            <i class="fa fa-lock"></i>
                            <p>Secure payments</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-promo promo4">
                            <i class="fa fa-gift"></i>
                            <p>New products</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="maincontent-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-product">
                            <h2 class="section-title">Latest Products</h2>
                            <div class="product-carousel">
                            @foreach ($products_Lastest as $product)
                                <x-sigle-product :name="$product['name']" :price="$product['price']" :image="$product['image']" :sale="$product['sale']" />
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End main content area -->

        <div class="brands-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="brand-wrapper">
                            <div class="brand-list">
                                <img src="img/brand1.png" alt="">
                                <img src="img/brand2.png" alt="">
                                <img src="img/brand3.png" alt="">
                                <img src="img/brand4.png" alt="">
                                <img src="img/brand5.png" alt="">
                                <img src="img/brand6.png" alt="">
                                <img src="img/brand1.png" alt="">
                                <img src="img/brand2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End brands area -->

        <div class="product-widget-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-product-widget">
                            <h2 class="product-wid-title">Top Sellers</h2>
                            <a href="" class="wid-view-more">View All</a>
                            {{-- product thumnail --}}
                            @foreach ($products_Sale as $product )
                                <x-product-thumnail  :name="$product['name']" 
                                :price="$product['price']" 
                                :sale="$product['sale']" 
                                :image="$product['image'].'.jpg'" />
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-product-widget">
                            <h2 class="product-wid-title">Sale</h2>
                            <a href="#" class="wid-view-more">View All</a>
                            {{-- product thumnail --}}
                            @foreach ($products_BestSale as $product )
                                <x-product-thumnail  :name="$product['name']" 
                                :price="$product['price']" 
                                :sale="$product['sale']" 
                                :image="$product['image'].'.jpg'" />
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-product-widget">
                            <h2 class="product-wid-title">Top New</h2>
                            <a href="#" class="wid-view-more">View All</a>
                            {{-- product thumnail --}}


                            @foreach ($products_Lastest as $product)
                                    @if ($loop->index >= 3)
                                        @break
                                    @endif   
                            <x-product-thumnail  
                                    :name="$product['name']" 
                                    :price="$product['price']" 
                                    :sale="$product['sale']" 
                                    :image="$product['image'].'.jpg'" 
                                />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End product widget area -->
    </section>
@endsection