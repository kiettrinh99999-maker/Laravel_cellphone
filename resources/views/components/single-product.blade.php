@php
    // Nếu là chuỗi JSON thì decode thử
    $imgArray = is_string($image) ? json_decode($image, true) : $image;

    // Nếu là mảng và có phần tử đầu tiên → lấy nó
    // Nếu không → dùng $image gốc (chuỗi) hoặc ảnh mặc định
    $firstImg = is_array($imgArray) && count($imgArray) > 0
        ? $imgArray[0]
        : (is_string($image) ? $image : 'noimg.jpg');
@endphp
<div class="single-product">
    <div class="product-f-image">
        <img src="{{ asset('img/' . $firstImg) }}" alt="{{ $name }}">
        <div class="product-hover">
            <a href="#" class="add-to-cart-link">
                <i class="fa fa-shopping-cart"></i> Add to cart
            </a>
            <a href="single-product.html" class="view-details-link">
                <i class="fa fa-link"></i> See details
            </a>
        </div>
    </div>
    <h2>
        <a href="single-product.html">{{ $name }}</a>
    </h2>
    
    <div class="product-carousel-price">
            <ins>${{$price}}</ins>
            <del>${{$sale}}</del>
    </div>
</div>
