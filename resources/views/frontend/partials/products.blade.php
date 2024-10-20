@foreach($products as $product)
    <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
        <div class="product-wrap mb-25">
            <div class="product-img">
                <a href="#">
                    <img class="default-img" src="{{ asset('uploads/' . $product->image) }}" alt="" style="min-width: 200px; min-height:200px; height: auto;">
                    <img class="hover-img" src="{{ asset('uploads/' . $product->image) }}" alt="" style="min-width: 200px; min-height:200px; height: auto;">
                </a>
                <span class="pink">New Arrivals</span>
                <div class="product-action">
                    <div class="pro-same-action pro-cart">
                        <a title="Add To Cart" href="#"><i class="pe-7s-cart"></i> Add to cart</a>
                    </div>
                    <div class="pro-same-action pro-quickview">
                        <a title="Quick View" href="#" data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $product->id }}"><i class="pe-7s-look"></i></a>
                    </div>
                </div>
            </div>
            <div class="product-content text-center">
                <h3>{{ $product->name }}</h3>

              

                <div class="product-price">
                    <span>${{ $product->price }}</span>
                    <!-- <span class="old">${{ $product->price }}</span> -->
                </div>
            </div>
        </div>
    </div>
@endforeach
