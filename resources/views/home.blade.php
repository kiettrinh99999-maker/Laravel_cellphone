@extends('layouts.layout')
@section('active_home')
active
@endsection
@section('title')
    Home
@endsection
@section('content')
    <!-- <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f5f5f5;
        }

        .slider-area {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 15px;
            /* box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1); */
        }

        .slider-container {
            position: relative;
            width: 100%;
            height: 500px;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(100%);
        }

        .slide.active {
            opacity: 1;
            transform: translateX(0);
        }

        .slide.prev {
            transform: translateX(-100%);
        }

        .slide-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
        }

        .caption-group {
            position: absolute;
            top: 50%;
            right: 50px;
            transform: translateY(-50%);
            color: white;
            z-index: 10;
            max-width: 500px;
        }

        .caption.title {
            font-size: 3rem;
            font-weight: 300;
            margin-bottom: 15px;
            line-height: 1.2;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease forwards 0.3s;
        }

        .caption.title .primary {
            color: #ff6b35;
            font-weight: 700;
        }

        .caption.title strong {
            color: #4ecdc4;
            font-weight: 700;
        }

        .caption.subtitle {
            font-size: 1.3rem;
            font-weight: 300;
            margin-bottom: 30px;
            color: #e0e0e0;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease forwards 0.6s;
        }

        .caption.button-radius {
            display: inline-flex;
            align-items: center;
            padding: 15px 30px;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease forwards 0.9s;
        }

        .caption.button-radius:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255, 107, 53, 0.4);
            background: linear-gradient(135deg, #f7931e, #ff6b35);
        }

        .caption.button-radius .icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"><path d="M7 4V2C7 1.45 7.45 1 8 1H16C16.55 1 17 1.45 17 2V4H20V6H19V19C19 20.1 18.1 21 17 21H7C5.9 21 5 20.1 5 19V6H4V4H7ZM9 3V4H15V3H9ZM7 6V19H17V6H7Z"/><path d="M9 8V17H11V8H9ZM13 8V17H15V8H13Z"/></svg>') center/contain no-repeat;
        }

        /* Navigation */
        .slider-nav {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 15px;
            z-index: 20;
        }

        .nav-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .nav-dot.active {
            background: #ff6b35;
            transform: scale(1.2);
            border-color: white;
        }

        /* Arrow Navigation */
        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 20;
            backdrop-filter: blur(10px);
        }

        .slider-arrow:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-50%) scale(1.1);
        }

        .slider-arrow.prev {
            left: 20px;
            color: #000;
        }

        .slider-arrow.next {
            right: 20px;
        }

        .slider-arrow::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 12px;
            height: 12px;
            border-top: 2px solid white;
            border-right: 2px solid white;
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .slider-arrow.prev::after {
            transform: translate(-50%, -50%) rotate(-135deg);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .caption-group {
                left: 20px;
                right: 20px;
                max-width: none;
            }

            .caption.title {
                font-size: 2rem;
            }

            .caption.subtitle {
                font-size: 1rem;
            }

            .slider-arrow {
                width: 40px;
                height: 40px;
            }

            .slider-arrow.prev {
                left: 10px;
            }

            .slider-arrow.next {
                right: 10px;
            }
        }

        /* Remove slide specific backgrounds since we're using images */
    </style> -->

    <section>

        <div class="slider-area">
            <div class="slider-container">
                <!-- Slide 1 -->
                <div class="slide slide-1 active">
                    <img src="img/h4-slide.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            iPhone <span class="primary">6 <strong>Plus</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Dual SIM Technology</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Mua ngay</a>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="slide slide-2">
                    <img src="img/h4-slide2.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Mua một, được một <span class="primary">50% <strong>giảm</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Đồ dùng học tập & ba lô</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Khám phá</a>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="slide slide-3">
                    <img src="img/h4-slide3.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Apple <span class="primary">Store <strong>iPod</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Sản phẩm được lựa chọn</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Xem thêm</a>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="slide slide-4">
                    <img src="img/h4-slide4.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Apple <span class="primary">Store <strong>iPhone</strong></span>
                        </h2>
                        <h4 class="caption subtitle">& Điện thoại thông minh</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Mua sắm</a>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="slider-nav">
                <div class="nav-dot active" data-slide="0"></div>
                <div class="nav-dot" data-slide="1"></div>
                <div class="nav-dot" data-slide="2"></div>
                <div class="nav-dot" data-slide="3"></div>
            </div>

            <!-- Arrows -->
            <div class="slider-arrow prev"></div>
            <div class="slider-arrow next"></div>
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
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-1.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to
                                                cart</a>
                                            <a href="single-product.html" class="view-details-link"><i
                                                    class="fa fa-link"></i>
                                                See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="single-product.html">Samsung Galaxy s5- 2015</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$700.00</ins> <del>$100.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-2.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to
                                                cart</a>
                                            <a href="single-product.html" class="view-details-link"><i
                                                    class="fa fa-link"></i>
                                                See details</a>
                                        </div>
                                    </div>

                                    <h2>Nokia Lumia 1320</h2>
                                    <div class="product-carousel-price">
                                        <ins>$899.00</ins> <del>$999.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-3.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to
                                                cart</a>
                                            <a href="single-product.html" class="view-details-link"><i
                                                    class="fa fa-link"></i>
                                                See details</a>
                                        </div>
                                    </div>

                                    <h2>LG Leon 2015</h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins> <del>$425.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-4.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to
                                                cart</a>
                                            <a href="single-product.html" class="view-details-link"><i
                                                    class="fa fa-link"></i>
                                                See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="single-product.html">Sony microsoft</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$200.00</ins> <del>$225.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-5.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to
                                                cart</a>
                                            <a href="single-product.html" class="view-details-link"><i
                                                    class="fa fa-link"></i>
                                                See details</a>
                                        </div>
                                    </div>

                                    <h2>iPhone 6</h2>

                                    <div class="product-carousel-price">
                                        <ins>$1200.00</ins> <del>$1355.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-6.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to
                                                cart</a>
                                            <a href="single-product.html" class="view-details-link"><i
                                                    class="fa fa-link"></i>
                                                See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins>
                                    </div>
                                </div>
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
                            <div class="single-wid-product">
                                <a href="single-product.html"><img src="img/product-thumb-1.jpg" alt=""
                                        class="product-thumb"></a>
                                <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                            <div class="single-wid-product">
                                <a href="single-product.html"><img src="img/product-thumb-2.jpg" alt=""
                                        class="product-thumb"></a>
                                <h2><a href="single-product.html">Apple new mac book 2015</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                            <div class="single-wid-product">
                                <a href="single-product.html"><img src="img/product-thumb-3.jpg" alt=""
                                        class="product-thumb"></a>
                                <h2><a href="single-product.html">Apple new i phone 6</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-product-widget">
                            <h2 class="product-wid-title">Recently Viewed</h2>
                            <a href="#" class="wid-view-more">View All</a>
                            <div class="single-wid-product">
                                <a href="single-product.html"><img src="img/product-thumb-4.jpg" alt=""
                                        class="product-thumb"></a>
                                <h2><a href="single-product.html">Sony playstation microsoft</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                            <div class="single-wid-product">
                                <a href="single-product.html"><img src="img/product-thumb-1.jpg" alt=""
                                        class="product-thumb"></a>
                                <h2><a href="single-product.html">Sony Smart Air Condtion</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                            <div class="single-wid-product">
                                <a href="single-product.html"><img src="img/product-thumb-2.jpg" alt=""
                                        class="product-thumb"></a>
                                <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-product-widget">
                            <h2 class="product-wid-title">Top New</h2>
                            <a href="#" class="wid-view-more">View All</a>
                            <div class="single-wid-product">
                                <a href="single-product.html"><img src="img/product-thumb-3.jpg" alt=""
                                        class="product-thumb"></a>
                                <h2><a href="single-product.html">Apple new i phone 6</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                            <div class="single-wid-product">
                                <a href="single-product.html"><img src="img/product-thumb-4.jpg" alt=""
                                        class="product-thumb"></a>
                                <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                            <div class="single-wid-product">
                                <a href="single-product.html"><img src="img/product-thumb-1.jpg" alt=""
                                        class="product-thumb"></a>
                                <h2><a href="single-product.html">Sony playstation microsoft</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End product widget area -->
    </section>

@endsection

<script>
    class ModernSlider {
        constructor() {
            this.slides = document.querySelectorAll('.slide');
            this.dots = document.querySelectorAll('.nav-dot');
            this.prevBtn = document.querySelector('.slider-arrow.prev');
            this.nextBtn = document.querySelector('.slider-arrow.next');
            this.currentSlide = 0;
            this.totalSlides = this.slides.length;
            this.isAnimating = false;
            this.autoPlayInterval = null;

            this.init();
        }

        init() {
            this.bindEvents();
            this.startAutoPlay();
        }

        bindEvents() {
            // Dot navigation
            this.dots.forEach((dot, index) => {
                dot.addEventListener('click', () => this.goToSlide(index));
            });

            // Arrow navigation
            this.prevBtn.addEventListener('click', () => this.prevSlide());
            this.nextBtn.addEventListener('click', () => this.nextSlide());

            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') this.prevSlide();
                if (e.key === 'ArrowRight') this.nextSlide();
            });

            // Pause on hover
            const sliderArea = document.querySelector('.slider-area');
            sliderArea.addEventListener('mouseenter', () => this.stopAutoPlay());
            sliderArea.addEventListener('mouseleave', () => this.startAutoPlay());
        }

        goToSlide(slideIndex) {
            if (this.isAnimating || slideIndex === this.currentSlide) return;

            this.isAnimating = true;

            // Update slides
            this.slides[this.currentSlide].classList.remove('active');
            this.slides[this.currentSlide].classList.add('prev');

            setTimeout(() => {
                this.slides[this.currentSlide].classList.remove('prev');
                this.slides[slideIndex].classList.add('active');

                // Update dots
                this.dots[this.currentSlide].classList.remove('active');
                this.dots[slideIndex].classList.add('active');

                this.currentSlide = slideIndex;
                this.isAnimating = false;
            }, 100);
        }

        nextSlide() {
            const nextIndex = (this.currentSlide + 1) % this.totalSlides;
            this.goToSlide(nextIndex);
        }

        prevSlide() {
            const prevIndex = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
            this.goToSlide(prevIndex);
        }

        startAutoPlay() {
            this.stopAutoPlay();
            this.autoPlayInterval = setInterval(() => {
                this.nextSlide();
            }, 4000);
        }

        stopAutoPlay() {
            if (this.autoPlayInterval) {
                clearInterval(this.autoPlayInterval);
                this.autoPlayInterval = null;
            }
        }
    }

    // Initialize slider when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        new ModernSlider();
    });
</script>