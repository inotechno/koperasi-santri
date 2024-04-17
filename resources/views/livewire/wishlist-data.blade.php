<div class="row">

    @foreach ($wishlist as $item)
        <div class="col-md-4 col-lg-4 col-xl-3">
            <div class="card h-100">
                <a class="" href="{{ route('product.detail', $item->product->slug) }}">
                    <img class="img-fluid card-img-top"
                        src="{{ asset('thumbnail/product_images/' . $item->product->image1) }}"
                        alt="{{ $item->product->slug }}">
                </a>
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title mb-2">
                        <a class=""
                            href="{{ route('product.detail', $item->product->slug) }}">{{ $item->product->title }}</a>
                    </h4>
                    <h6 class="card-subtitle font-14 text-muted mb-0">{{ $item->product->product_sub_category->name }}
                    </h6>

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
                            <small class="text-warning">
                                {{ $item->product->total_rate }} Ulasan
                            </small>
                        </div>
                        <div class="ms-auto mt-auto">
                            <h5 class="card-title mb-1">Rp {{ number_format($item->product->price) }}</h5>
                            {{-- <p class="text-muted mb-0">Design</p> --}}
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-outline-primary btn-icon waves-effect waves-light">
                                <i class="ri-shopping-cart-2-line ri-lg"></i>
                            </button>
                        </form>
                        <form action="{{ route('wishlist.delete', $item->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-outline-danger btn-icon waves-effect waves-light">
                                <i class="ri-delete-bin-line ri-lg"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if (count($wishlist) == 0)
        <div class="col-md-12 text-center">
            <button class="btn btn-rounded btn-warning" id="load-more">Tidak ada produk</button>
        </div>
    @endif
</div>
