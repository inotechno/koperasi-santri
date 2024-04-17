<div class="row" id="products">

    @foreach ($product as $item)
        <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
            <div class="card h-100">
                <a class="" href="{{ route('product.detail', $item->slug) }}">
                    <img class="img-fluid card-img-top" src="{{ asset('thumbnail/product_images/' . $item->image1) }}"
                        alt="{{ $item->slug }}">
                </a>
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title mb-1">
                        <a class="" href="{{ route('product.detail', $item->slug) }}">{{ $item->title }}</a>
                    </h4>
                    <h6 class="card-subtitle font-14 text-muted mb-0">{{ $item->product_sub_category->name }}</h6>

                    <div class="d-flex align-items-center mt-auto">
                        <div class="">
                            <div class="text-muted fs-10">
                                @php
                                    $rating = $item->avg_rate;
                                @endphp

                                @foreach (range(1, 5) as $i)
                                    @php
                                        $rate = '<span class="mdi mdi-star"></span>';
                                    @endphp

                                    @if ($rating > 0)
                                        @if ($rating > 0.5)
                                            @php
                                                $rate = '<span class="mdi mdi-star text-warning"></span>';
                                            @endphp
                                        @else
                                            @php
                                                $rate = '<span class="mdi mdi-star-half-full text-warning"></span>';
                                            @endphp
                                        @endif
                                    @endif

                                    @php
                                        echo $rate;
                                        $rating--;
                                    @endphp
                                @endforeach

                            </div>
                            {{-- <div class="d-block text-warning rater-product" data-rate-value="{{ $item->avg_rate }}">
                            </div> --}}
                            <small class="text-warning">
                                {{ $item->total_rate }} Ulasan
                            </small>
                        </div>
                        <div class="ms-auto mt-auto">
                            @if ($item->discount !== null)
                                <small class="text-danger"><s>Rp {{ number_format($item->price) }}</s></small>
                                <h5 class="card-title mb-1">Rp {{ number_format($item->discount) }}</h5>
                            @else
                                <h5 class="card-title mb-1">Rp {{ number_format($item->price) }}</h5>
                            @endif
                            {{-- <p class="text-muted mb-0">Design</p> --}}
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-outline-primary btn-icon waves-effect waves-light">
                                <i class="ri-shopping-cart-2-line ri-lg"></i>
                            </button>
                        </form>
                        <form action="{{ route('wishlist.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-outline-warning btn-icon waves-effect waves-light">
                                <i class="ri-heart-line ri-lg"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- <div class="col-md-12 text-center mt-3">
        <button class="btn btn-rounded btn-primary" id="load-more">Load More</button>
    </div> --}}
</div>
