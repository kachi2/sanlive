@extends('layouts.app')

@if(isset($schema))
@section('schema')
<script type="application/ld+json">{!! $schema !!}</script>
@endsection
@endif

@section('content')
<div class="ps-page--product ps-page--product1">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="/">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="{{ route('products.search') }}">{{ $data['product']->category->name ?? '' }}</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page"><a href="{{ route('users.products', $data['product']->slug) }}">{{ $data['product']->name }}</a></li>
        </ul>
        <div class="ps-page__content">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="ps-product--detail">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <div>
                                    <div>
                                        <img src="{{ asset('images/products/'.$data['product']->image_path) }}" alt="{{ $data['product']->name }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="ps-product__info">
                                    <div class="ps-product__badge">
                                        @if($data['product']->status == 1)
                                        <span class="ps-badge ps-badge--outstock">OUT OF STOCK</span>
                                        @endif
                                    </div>
                                    <p class="ps-product__branch" style="font-size:13px">Category: <a href="{{ route('products.search') }}">{{ $data['product']->category->name ?? '' }}</a></p>
                                    <h1 style="font-size:20px" class="ps-product__title"><a href="#">{{ $data['product']->name }}</a></h1>
                                    <p>
                                        <span class="ps-product__price sale">{{ moneyFormat($data['product']->sale_price) }}</span>
                                        <span class="ps-product__del">{{ moneyFormat($data['product']->price) }}</span>
                                    </p>
                                    <div class="ps-product__meta">
                                        <p style="font-size:15px; color:deepskyblue; font-weight:600">Description:
                                            <span>{!! preg_replace('/Description:/i', '', $data['product']->tagline) !!}</span>
                                        </p>
                                    </div>
                                    <div class="ps-product__meta">
                                        <p style="font-size:14px; color:deepskyblue; font-weight:600">Manufacturer: <span style="font-size:14px; font-weight:400">{{ $data['product']->brand }}</span></p>
                                    </div>
                                    <form action="{{ route('carts.add', $data['product']->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="ps-product__quantity">
                                            <h6>Quantity:
                                                <button type="button" class="ps-btn--primary decrement-btn" style="width: 30px; border-radius:3px; height:30px" onclick="changeQty(-1)"> - </button>
                                                <input type="text" name="qty" id="qty" value="1" style="border: 1px solid #8c8a8a53; height:30px; width:30px; text-align:center">
                                                <button type="button" class="ps-btn--primary increment-btn" style="width: 30px; border-radius:3px; height:30px" onclick="changeQty(1)"> + </button>
                                            </h6>
                                            @if($data['product']->requires_prescription == 1)
                                            <div>
                                                <label for="precription_upload">
                                                    <div class="pb-1"><img src="/frontend/upload.png"></div>
                                                    <input type="file" id="precription_upload" name="image" style="border: none; visibility:hidden">
                                                </label>
                                            </div>
                                            @endif
                                            <div class="d-md-flex align-items-center">
                                                <div class="def-number-input number-input safari_only"></div>
                                                <br/>
                                                <button type="submit" style="border-radius:5px" class="ps-btn ps-btn--primary w-50" id="add2cart">
                                                    Add to Cart
                                                </button>
                                                <br/><br/>
                                                <span class="p-2"></span>
                                                <a target="_blank" class="btn btn-primary" rel="noopener noreferrer"
                                                   href="https://wa.me/+2348058885913?text={{ urlencode('Please i need '.$data['product']->name.', the price on your website is '.$data['product']->sale_price) }}">
                                                    <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:20px; padding:5px; color:#fff">
                                                        Order on Whatsapp
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="ps-product__social">
                                        <ul class="ps-social ps-social--color">
                                            Share this Product
                                            <li><a class="ps-social__link facebook" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('users.products', $data['product']->slug)) }}"><i class="fa fa-facebook"></i><span class="ps-tooltip">Facebook</span></a></li>
                                            <li><a class="ps-social__link twitter" target="_blank" rel="noopener noreferrer" href="https://twitter.com/share?url={{ urlencode(route('users.products', $data['product']->slug)) }}"><i class="fa fa-twitter"></i><span class="ps-tooltip">Twitter</span></a></li>
                                            <li><a class="ps-social__link whatsapp" target="_blank" rel="noopener noreferrer" href="https://api.whatsapp.com/send?text={{ urlencode(route('users.products', $data['product']->slug)) }}"><i class="fa fa-whatsapp"></i><span class="ps-tooltip">WhatsApp</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ps-product__content mt-5">
                <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true">Description</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content" role="tab" aria-controls="reviews-content" aria-selected="false">Reviews</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="write-reviews-tab" data-toggle="tab" href="#write-reviews" role="tab" aria-controls="write-reviews" aria-selected="false">Write a Review</a></li>
                </ul>
                <div class="tab-content" id="productContent">
                    <div class="tab-pane fade show active" id="description-content" role="tabpanel" aria-labelledby="description-tab">
                        <div class="ps-document">
                            <div class="row row-reverse">
                                <div class="col-12 col-md-12">
                                    <p class="p-4">{!! $data['product']->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab">
                        @forelse($reviews as $review)
                        <div style="border-bottom:1px solid #eee; padding:15px 0">
                            <strong style="font-size:13px">{{ $review->reviewer_name ?? 'Anonymous' }}</strong>
                            <span class="ml-2 text-muted" style="font-size:11px">{{ $review->created_at->diffForHumans() }}</span>
                            <div>
                                @for($i=1;$i<=5;$i++)
                                    <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}" style="color:#f5a623;font-size:12px"></i>
                                @endfor
                            </div>
                            <p style="font-size:13px; color:#555; margin-top:5px">{{ $review->review }}</p>
                        </div>
                        @empty
                        <p style="font-size:13px; padding:15px">No reviews yet.</p>
                        @endforelse
                        @if(method_exists($reviews, 'links'))
                        <div class="p-2">{{ $reviews->links() }}</div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="write-reviews" role="tabpanel" aria-labelledby="write-reviews-tab">
                        @auth
                        <form action="/products/review/{{ $data['product']->id }}" method="POST" class="p-4">
                            @csrf
                            <div class="form-group">
                                <label>Your Rating</label>
                                <div class="star-rating" style="display:flex; flex-direction:row-reverse; justify-content:flex-end; gap:4px; font-size:28px; margin-top:5px">
                                    @for($r=5;$r>=1;$r--)
                                    <input type="radio" name="rating" id="star{{ $r }}" value="{{ $r }}" style="display:none">
                                    <label for="star{{ $r }}" style="cursor:pointer; color:#ddd; margin:0; padding:0 2px" title="{{ $r }} Star{{ $r > 1 ? 's' : '' }}">&#9733;</label>
                                    @endfor
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="review" class="form-control" rows="4" placeholder="Your review..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                        @else
                        <p class="p-4"><a href="{{ route('login') }}">Login</a> to write a review.</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ps-section--latest" style="margin-top:5px">
        <div class="container" style="background: #f4f3f33f; padding:10px; border:5px solid #ede8e836">
            <div class="ps-noti p-2" style="border-radius:5px">
                <p class="ml-2" style="color:#fff; font-weight:bold; text-align:left"> Related Products </p>
            </div>
            <div class="ps-section__carousel">
                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                    @foreach($data['related'] as $rel)
                    <div>
                        <div class="ps-section__product shadow-sm">
                            <div class="ps-product ps-product--standard cart-card border-gray-800" style="background-color:#fff">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-product__image" href="{{ route('users.products', $rel->slug) }}" style="min-height:250px">
                                        <figure>
                                            <img src="{{ asset('images/products/'.$rel->image_path) }}" alt="{{ $rel->name }}" style="max-height:200px">
                                            <img src="{{ asset('images/products/'.$rel->image_path) }}" alt="{{ $rel->name }}">
                                        </figure>
                                    </a>
                                </div>
                                <div class="ps-product__content">
                                    <h5><a href="{{ route('users.products', $rel->slug) }}">{{ $rel->name }}</a></h5>
                                    <div class="ps-product__meta">
                                        <span class="ps-product__price sale">{{ moneyFormat($rel->sale_price) }}</span>
                                        <span class="ps-product__del">{{ moneyFormat($rel->price) }}</span>
                                    </div>
                                    <span class="download-note">
                                        <span>
                                            <a class="btn btn-lg" href="{{ route('users.products', $rel->slug) }}" style="background:#fff; color:#73c2fb; border:1px solid #73c2fb; display: inline;"><i class="fa fa-plus"></i> Add to basket</a>
                                            <a target="_blank" rel="noopener noreferrer" href="https://wa.me/+2348058885913?text={{ urlencode('Please i need to order this product '.$rel->name.' the price is: '.moneyFormat($rel->sale_price)) }}">
                                                <img src="/frontend/whatsapp.png" style="width: 80px; float:right; padding: 0px;">
                                            </a>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
function changeQty(delta) {
    var input = document.getElementById('qty');
    var val = parseInt(input.value) || 1;
    val = val + delta;
    if (val < 1) val = 1;
    input.value = val;
}
</script>
<style>
.nav .active { color: #fff; background: #17a2b8; }

/* Star rating widget */
.star-rating label { color: #ddd; transition: color 0.1s; }
.star-rating input:checked ~ label,
.star-rating label:hover,
.star-rating label:hover ~ label { color: #f5a623; }
</style>
@endsection
