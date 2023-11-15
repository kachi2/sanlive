@extends('layouts.app')
@section('content')


<div class="ps-page--product ps-page--product1">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="index.html">Shop</a></li>
            <li class="ps-breadcrumb__item"><a href="index.html">Equipment</a></li>
            <li class="ps-breadcrumb__item"><a href="index.html">Machines</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Blood Pressure Monitor</li>
        </ul>
        <div class="ps-page__content">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="ps-product--detail">
                        <div class="row">
                            <div class="col-12 col-xl-7">
                                <div class="ps-product--gallery">
                                    <div class="ps-product__thumbnail">
                                        <div class="slide"><img src="img/products/001.jpg" alt="alt" /></div>
                                        <div class="slide"><img src="img/products/047.jpg" alt="alt" /></div>
                                        <div class="slide"><img src="img/products/047.jpg" alt="alt" /></div>
                                        <div class="slide"><img src="img/products/008.jpg" alt="alt" /></div>
                                        <div class="slide"><img src="img/products/034.jpg" alt="alt" /></div>
                                    </div>
                                    <div class="ps-gallery--image">
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="img/products/001.jpg" alt="alt" /></div>
                                        </div>
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="img/products/047.jpg" alt="alt" /></div>
                                        </div>
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="img/products/047.jpg" alt="alt" /></div>
                                        </div>
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="img/products/008.jpg" alt="alt" /></div>
                                        </div>
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="img/products/034.jpg" alt="alt" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-5">
                                <div class="ps-product__info">
                                    <div class="ps-product__badge"><span class="ps-badge ps-badge--outstock">OUT OF STOCK</span>
                                    </div>
                                    <div class="ps-product__branch"><a href="#">HeartRate</a></div>
                                    <div class="ps-product__title"><a href="#">Blood Pressure Monitor</a></div>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select><span class="ps-product__review">(5 Reviews)</span>
                                    </div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>Study history up to 30 days</li>
                                            <li>Up to 5 users simultaneously</li>
                                            <li>Has HEALTH certificate</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__meta"><span class="ps-product__price">$77.65</span>
                                    </div>
                                    <div class="ps-product__variations"><a class="ps-product__link" href="wishlist.html">Add to wishlist</a><a class="ps-product__link" href="compare.html">Add to Compare</a></div>
                                    <div class="ps-product__type">
                                        <ul class="ps-product__list">
                                            <li> <span class="ps-list__title">Tags: </span><a class="ps-list__text" href="#">Health</a><a class="ps-list__text" href="#">Thermometer</a>
                                            </li>
                                            <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text" href="#">SF-006</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__social">
                                        <ul class="ps-social ps-social--color">
                                            <li><a class="ps-social__link facebook" href="#"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                                            <li><a class="ps-social__link twitter" href="#"><i class="fa fa-twitter"></i><span class="ps-tooltip">Twitter</span></a></li>
                                            <li><a class="ps-social__link pinterest" href="#"><i class="fa fa-pinterest-p"></i><span class="ps-tooltip">Pinterest</span></a></li>
                                            <li class="ps-social__linkedin"><a class="ps-social__link linkedin" href="#"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                                            <li class="ps-social__reddit"><a class="ps-social__link reddit-alien" href="#"><i class="fa fa-reddit-alien"></i><span class="ps-tooltip">Reddit Alien</span></a></li>
                                            <li class="ps-social__email"><a class="ps-social__link envelope" href="#"><i class="fa fa-envelope-o"></i><span class="ps-tooltip">Email</span></a></li>
                                            <li class="ps-social__whatsapp"><a class="ps-social__link whatsapp" href="#"><i class="fa fa-whatsapp"></i><span class="ps-tooltip">WhatsApp</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="ps-bought">
                            <h3 class="ps-bought__title">Frequently bought together</h3>
                            <div class="ps-bought__wapper">
                                <div class="ps-bought__thumbnail">
                                    <ul>
                                        <li><a href="product1.html"><img src="img/products/001.jpg" alt="Blood Pressure Monitor"></a></li>
                                        <li><a href="product1.html"><img src="img/products/033.jpg" alt="3 Layer Disposable Protective Face Masks"></a></li>
                                        <li><a href="product1.html"><img src="img/products/006.jpg" alt="GAnti-Dust Filter, Breathable, 3 Layers of Purifying"></a></li>
                                        <li><a href="product1.html"><img src="img/products/050.jpg" alt="Disposable Face Mask for Unisex"></a></li>
                                    </ul>
                                </div>
                                <div class="ps-bought__content">
                                    <ul class="ps-bought__list">
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="product0" checked="checked">
                                                <label class="form-check-label" for="product0"><span class="ps-bought__name">This Product: Blood Pressure Monitor </span>– <span class="ps-bought__price">$77.65</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="product1" checked="checked">
                                                <label class="form-check-label" for="product1"><span class="ps-bought__name">3 Layer Disposable Protective Face Masks  </span>– <span class="ps-bought__del">$15.52</span><span class="ps-bought__price sale">$14.52</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="product2" checked="checked">
                                                <label class="form-check-label" for="product2"><span class="ps-bought__name">GAnti-Dust Filter, Breathable, 3 Layers of Purifying  </span>– <span class="ps-bought__price">$17.99</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="product3" checked="checked">
                                                <label class="form-check-label" for="product3"><span class="ps-bought__name">Disposable Face Mask for Unisex  </span>– <span class="ps-bought__del">$20.39</span><span class="ps-bought__price sale">$8.15</span>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="ps-bought__submit">
                                        <label>Buy selected for: </label>
                                        <div class="ps-bought__total">$115.31</div><a class="ps-btn ps-btn--warning" href="#">Add all to cart</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="ps-product__content">
                            <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true">Description</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" id="information-tab" data-toggle="tab" href="#information-content" role="tab" aria-controls="information-content" aria-selected="false">Additional information</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification-content" role="tab" aria-controls="specification-content" aria-selected="false">Specification</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content" role="tab" aria-controls="reviews-content" aria-selected="false">Reviews (5)</a></li>
                            </ul>
                            <div class="tab-content" id="productContent">
                                <div class="tab-pane fade show active" id="description-content" role="tabpanel" aria-labelledby="description-tab">
                                    <div class="ps-document">
                                        <div class="row row-reverse">
                                            <div class="col-12 col-md-6"><img class="ps-thumbnail" src="img/products/pressure-tab-content.jpg" alt></div>
                                            <div class="col-12 col-md-6">
                                                <h2 class="ps-title">Digital Thermometer X30-Pro</h2>
                                                <div class="ps-subtitle">Just a few seconds to measure your body temperature. Up to 5 users! The battery lasts up to 2 years.</div>
                                                <p class="ps-desc">There are many variations of passages of Lorem Ipsum available, but the majority have suffered altevration in some form, by injected humour, or randomised words which don’t look even slightly believable.</p>
                                                <ul class="ps-list">
                                                    <li><img src="img/icon/bacterial.svg" alt=""><span>Study history up to 30 days</span></li>
                                                    <li><img src="img/icon/virus.svg" alt=""><span>Up to 5 users simultaneously</span></li>
                                                    <li><img src="img/icon/ribbon.svg" alt=""><span>Has HEALTH certificate</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="ps-item"> <img src="img/tab-content-img1.jpg" alt><a href="https://nouthemes.net/">The possibility of testing when applied to the forehead. Ready to work in 30 seconds.</a></div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="ps-item"> <img src="img/tab-content-img2.jpg" alt><a href="https://nouthemes.net/">Specially adapted tip reducing the meter so it can be used in children.</a></div>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-12 col-md-4 p-0">
                                                <div class="ps-document__review"> <span>+200.000</span>Users all over the world</div>
                                            </div>
                                            <div class="col-12 col-md-4 p-0">
                                                <div class="ps-document__review"> <span>over 20</span>Years on the market</div>
                                            </div>
                                            <div class="col-12 col-md-4 p-0">
                                                <div class="ps-document__review"> <span>5 stars</span>Ratings of our products</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="information-content" role="tabpanel" aria-labelledby="information-tab">
                                    <table class="table ps-table ps-table--oriented">
                                        <tbody>
                                            <tr>
                                                <th class="ps-table__th">Weight</th>
                                                <td>3.56 kg</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Dimensions</th>
                                                <td>40 × 52 × 39 cm</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Color</th>
                                                <td>Black, Blue</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="specification-content" role="tabpanel" aria-labelledby="specification-tab">
                                    <div class="ps-table__name">Performance</div>
                                    <table class="table ps-table ps-table--oriented">
                                        <tbody>
                                            <tr>
                                                <th class="ps-table__th">Higher memory bandwidth</th>
                                                <td>1,544 MHz</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Higher pixel rate</th>
                                                <td>74.1 GPixel/s</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="ps-table__name">Speed</div>
                                    <table class="table ps-table ps-table--oriented">
                                        <tbody>
                                            <tr>
                                                <th class="ps-table__th">More shading units</th>
                                                <td>1,544 MHz</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Better PassMark direct compute score</th>
                                                <td>3,953 GFLOPS</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">More texture mapping units</th>
                                                <td>123.5 GTexel/s</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Higher memory clock speed</th>
                                                <td>1,759 MHz</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Better floating-point performance</th>
                                                <td>5,049</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="ps-table__name">Information</div>
                                    <table class="table ps-table ps-table--oriented">
                                        <tbody>
                                            <tr>
                                                <th class="ps-table__th">Power</th>
                                                <td>5,049</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Windows</th>
                                                <td>64bit Windows 7*, 8 or 10</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Graphic Card</th>
                                                <td>4Gb dedicated Graphics card (such as NVIDIA – Open GL 4.0 or later)</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">HDD</th>
                                                <td>500Gb HDD (this is more driven by the amount of data you want to keep on your computer, rather than LSS itself)</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-table__th">Screen</th>
                                                <td>Single HD Screen (1920x1080 with 100% desktop scaling) or 1366x768 with second monitor 1920x1080 or higher</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab">
                                    <div class="ps-product__tabreview">
                                        <div class="ps-review--product">
                                            <div class="ps-review__row">
                                                <div class="ps-review__avatar"><img src="img/avatar/avatar-review.html" alt="alt" /></div>
                                                <div class="ps-review__info">
                                                    <div class="ps-review__name">Mark J.</div>
                                                    <div class="ps-review__date">Oct 30, 2021</div>
                                                </div>
                                                <div class="ps-review__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="ps-review__desc">
                                                    <p>Everything is perfect. I would recommend!</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-review--product">
                                            <div class="ps-review__row">
                                                <div class="ps-review__avatar"><img src="img/avatar/avatar-review2.html" alt="alt" /></div>
                                                <div class="ps-review__info">
                                                    <div class="ps-review__name">Ann R.</div>
                                                    <div class="ps-review__date">Oct 30, 2021</div>
                                                </div>
                                                <div class="ps-review__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="ps-review__desc">
                                                    <p>There was a small mistake in the order. In return, I got the correct order and I could keep the wrong one for myself.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-review--product">
                                            <div class="ps-review__row">
                                                <div class="ps-review__avatar"><img src="img/avatar/avatar-review3.html" alt="alt" /></div>
                                                <div class="ps-review__info">
                                                    <div class="ps-review__name">Jenna S.</div>
                                                    <div class="ps-review__date">Oct 30, 2021</div>
                                                </div>
                                                <div class="ps-review__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="ps-review__desc">
                                                    <p>I ordered on Friday evening and on Monday at 12:30 the package was with me. I have never encountered such a fast order processing.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-review--product">
                                            <div class="ps-review__row">
                                                <div class="ps-review__avatar"><img src="img/avatar/avatar-review4.html" alt="alt" /></div>
                                                <div class="ps-review__info">
                                                    <div class="ps-review__name">John M.</div>
                                                    <div class="ps-review__date">Oct 30, 2021</div>
                                                </div>
                                                <div class="ps-review__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="ps-review__desc">
                                                    <p>Everything is perfect. I would recommend!</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-review--product">
                                            <div class="ps-review__row">
                                                <div class="ps-review__avatar"><img src="img/avatar/avatar-review.html" alt="alt" /></div>
                                                <div class="ps-review__info">
                                                    <div class="ps-review__name">Mark J.</div>
                                                    <div class="ps-review__date">Oct 30, 2021</div>
                                                </div>
                                                <div class="ps-review__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="ps-review__desc">
                                                    <p>There was a small mistake in the order. In return I got the correct order and I could keep the wrong one for myself.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-form--review">
                                        <div class="ps-form__title">Write a review</div>
                                        <div class="ps-form__desc">Your email address will not be published. Required fields are marked *</div>
                                        <form action="https://nouthemes.net/html/mymedi/do_action" method="post">
                                            <div class="row">
                                                <div class="col-12 col-lg-4">
                                                    <label class="ps-form__label">Your rating *</label>
                                                    <select class="ps-rating--form" data-value="0">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <label class="ps-form__label">Name *</label>
                                                    <input class="form-control ps-form__input">
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <label class="ps-form__label">Email *</label>
                                                    <input class="form-control ps-form__input">
                                                </div>
                                                <div class="col-12">
                                                    <div class="ps-form__block">
                                                        <label class="ps-form__label">Your review *</label>
                                                        <textarea class="form-control ps-form__textarea"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <button class="btn ps-btn ps-btn--warning">Add Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="ps-product--extension">
                        <div class="ps-product__delivery">
                            <div class="ps-delivery__item"><i class="icon-wallet"></i>100% <br>Money back</div>
                            <div class="ps-delivery__item"><i class="icon-bag2"></i>Non-contact <br>shipping</div>
                            <div class="ps-delivery__item"><i class="icon-truck"></i>Free delivery for <br>order over $200</div>
                        </div>
                        <div class="ps-product__payment"> <img src="img/payment-product.png" alt></div>
                        <div class="ps-product__gif">
                            <div class="ps-gif__text"><i class="icon-shield-check"></i><strong>100% Secure delivery </strong>without contacting the courier</div><img class="ps-gif__thumbnail" src="img/blue-white-ribbon-on-pink-box.jpg" alt>
                        </div>
                    </div>
                    <div class="ps-widget--related-product">
                        <div class="ps-widget__title">Related Products</div>
                        <div class="ps-widget__product">
                            <div class="ps-product ps-product--standard">
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                        <figure><img src="img/products/008.jpg" alt="alt" />
                                        </figure>
                                    </a>
                                    <div class="ps-product__actions">
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                                    </div>
                                    <div class="ps-product__badge">
                                    </div>
                                </div>
                                <div class="ps-product__content">
                                    <h5 class="ps-product__title"><a href="product1.html">Home Blood Pressure Monitors</a></h5>
                                    <div class="ps-product__meta"><span class="ps-product__price sale">$90.65</span><span class="ps-product__del">$60.65</span>
                                    </div>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5" selected="selected">5</option>
                                        </select><span class="ps-product__review">( Reviews)</span>
                                    </div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>Study history up to 30 days</li>
                                            <li>Up to 5 users simultaneously</li>
                                            <li>Has HEALTH certificate</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__actions ps-product__group-mobile">
                                        <div class="ps-product__quantity">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                        <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--standard">
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                        <figure><img src="img/products/011.jpg" alt="alt" />
                                        </figure>
                                    </a>
                                    <div class="ps-product__actions">
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                                    </div>
                                    <div class="ps-product__badge">
                                    </div>
                                </div>
                                <div class="ps-product__content">
                                    <h5 class="ps-product__title"><a href="product1.html">Hill-Rom Affinity III Progressa iBed</a></h5>
                                    <div class="ps-product__meta"><span class="ps-product__price">$488.23</span>
                                    </div>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5" selected="selected">5</option>
                                        </select><span class="ps-product__review">( Reviews)</span>
                                    </div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>Study history up to 30 days</li>
                                            <li>Up to 5 users simultaneously</li>
                                            <li>Has HEALTH certificate</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__actions ps-product__group-mobile">
                                        <div class="ps-product__quantity">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                        <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-widget--promo"><img src="img/banner-sidebar1.jpg" alt></div>
                </div>
            </div>
        </div>
    </div>
    <section class="ps-section--also" data-background="img/related-bg.jpg">
        <div class="container">
            <h3 class="ps-section__title">Customer also bought</h3>
            <div class="ps-section__carousel">
                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                    <div class="ps-product ps-product--standard">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                <figure><img src="img/products/049.jpg" alt="alt" /><img src="img/products/048.jpg" alt="alt" />
                                </figure>
                            </a>
                            <div class="ps-product__actions">
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                            </div>
                            <div class="ps-product__badge">
                                <div class="ps-badge ps-badge--sale">Sale</div>
                            </div>
                        </div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a href="product1.html">Technical Classicpod Micro Stethoscope Case</a></h5>
                            <div class="ps-product__meta"><span class="ps-product__price">$38.24 - $60.39</span>
                            </div>
                            <div class="ps-product__rating">
                                <select class="ps-rating" data-read-only="true">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4" selected="selected">4</option>
                                    <option value="5">5</option>
                                </select><span class="ps-product__review">( Reviews)</span>
                            </div>
                            <div class="ps-product__desc">
                                <ul class="ps-product__list">
                                    <li>Study history up to 30 days</li>
                                    <li>Up to 5 users simultaneously</li>
                                    <li>Has HEALTH certificate</li>
                                </ul>
                            </div>
                            <div class="ps-product__actions ps-product__group-mobile">
                                <div class="ps-product__quantity">
                                    <div class="def-number-input number-input safari_only">
                                        <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                        <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                        <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                    </div>
                                </div>
                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--standard">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                <figure><img src="img/products/028.jpg" alt="alt" /><img src="img/products/045.jpg" alt="alt" />
                                </figure>
                            </a>
                            <div class="ps-product__actions">
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                            </div>
                            <div class="ps-product__badge">
                                <div class="ps-badge ps-badge--sold">Sold Out</div>
                            </div>
                        </div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a href="product1.html">Digital Thermometer X30-Pro</a></h5>
                            <div class="ps-product__meta"><span class="ps-product__price sale">$88.39</span><span class="ps-product__del">$60.23</span>
                            </div>
                            <div class="ps-product__rating">
                                <select class="ps-rating" data-read-only="true">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5" selected="selected">5</option>
                                </select><span class="ps-product__review">( Reviews)</span>
                            </div>
                            <div class="ps-product__desc">
                                <ul class="ps-product__list">
                                    <li>Study history up to 30 days</li>
                                    <li>Up to 5 users simultaneously</li>
                                    <li>Has HEALTH certificate</li>
                                </ul>
                            </div>
                            <div class="ps-product__actions ps-product__group-mobile">
                                <div class="ps-product__quantity">
                                    <div class="def-number-input number-input safari_only">
                                        <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                        <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                        <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                    </div>
                                </div>
                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--standard">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                <figure><img src="img/products/003.jpg" alt="alt" /><img src="img/products/008.jpg" alt="alt" />
                                </figure>
                            </a>
                            <div class="ps-product__actions">
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                            </div>
                            <div class="ps-product__badge">
                                <div class="ps-badge ps-badge--sale">Sale</div>
                                <div class="ps-badge ps-badge--hot">Hot</div>
                            </div>
                        </div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a href="product1.html">Automatic blood pressure monitor</a></h5>
                            <div class="ps-product__meta"><span class="ps-product__price sale">$90.65</span><span class="ps-product__del">$60.65</span>
                            </div>
                            <div class="ps-product__rating">
                                <select class="ps-rating" data-read-only="true">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5" selected="selected">5</option>
                                </select><span class="ps-product__review">( Reviews)</span>
                            </div>
                            <div class="ps-product__desc">
                                <ul class="ps-product__list">
                                    <li>Study history up to 30 days</li>
                                    <li>Up to 5 users simultaneously</li>
                                    <li>Has HEALTH certificate</li>
                                </ul>
                            </div>
                            <div class="ps-product__actions ps-product__group-mobile">
                                <div class="ps-product__quantity">
                                    <div class="def-number-input number-input safari_only">
                                        <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                        <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                        <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                    </div>
                                </div>
                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--standard">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                <figure><img src="img/products/008.jpg" alt="alt" /><img src="img/products/003.jpg" alt="alt" />
                                </figure>
                            </a>
                            <div class="ps-product__actions">
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                            </div>
                            <div class="ps-product__badge">
                            </div>
                        </div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a href="product1.html">Home Blood Pressure Monitors</a></h5>
                            <div class="ps-product__meta"><span class="ps-product__price sale">$90.65</span><span class="ps-product__del">$60.65</span>
                            </div>
                            <div class="ps-product__rating">
                                <select class="ps-rating" data-read-only="true">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5" selected="selected">5</option>
                                </select><span class="ps-product__review">( Reviews)</span>
                            </div>
                            <div class="ps-product__desc">
                                <ul class="ps-product__list">
                                    <li>Study history up to 30 days</li>
                                    <li>Up to 5 users simultaneously</li>
                                    <li>Has HEALTH certificate</li>
                                </ul>
                            </div>
                            <div class="ps-product__actions ps-product__group-mobile">
                                <div class="ps-product__quantity">
                                    <div class="def-number-input number-input safari_only">
                                        <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                        <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                        <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                    </div>
                                </div>
                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--standard">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                <figure><img src="img/products/048.jpg" alt="alt" /><img src="img/products/049.jpg" alt="alt" />
                                </figure>
                            </a>
                            <div class="ps-product__actions">
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                            </div>
                            <div class="ps-product__badge">
                                <div class="ps-badge ps-badge--sale">Sale</div>
                            </div>
                        </div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a href="product1.html">Manual Blood Pressure Apparatus</a></h5>
                            <div class="ps-product__meta"><span class="ps-product__price sale">$90.65</span><span class="ps-product__del">$60.39</span>
                            </div>
                            <div class="ps-product__rating">
                                <select class="ps-rating" data-read-only="true">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4" selected="selected">4</option>
                                    <option value="5">5</option>
                                </select><span class="ps-product__review">( Reviews)</span>
                            </div>
                            <div class="ps-product__desc">
                                <ul class="ps-product__list">
                                    <li>Study history up to 30 days</li>
                                    <li>Up to 5 users simultaneously</li>
                                    <li>Has HEALTH certificate</li>
                                </ul>
                            </div>
                            <div class="ps-product__actions ps-product__group-mobile">
                                <div class="ps-product__quantity">
                                    <div class="def-number-input number-input safari_only">
                                        <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                        <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                        <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                    </div>
                                </div>
                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product ps-product--standard">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                <figure><img src="img/products/020.jpg" alt="alt" /><img src="img/products/008.jpg" alt="alt" />
                                </figure>
                            </a>
                            <div class="ps-product__actions">
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                            </div>
                            <div class="ps-product__badge">
                                <div class="ps-badge ps-badge--sale">Sale</div>
                                <div class="ps-badge ps-badge--hot">Hot</div>
                            </div>
                        </div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a href="product1.html">Bronze Blood Pressure Monitor</a></h5>
                            <div class="ps-product__meta"><span class="ps-product__price">$56.65 - $97.65</span>
                            </div>
                            <div class="ps-product__rating">
                                <select class="ps-rating" data-read-only="true">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5" selected="selected">5</option>
                                </select><span class="ps-product__review">( Reviews)</span>
                            </div>
                            <div class="ps-product__desc">
                                <ul class="ps-product__list">
                                    <li>Study history up to 30 days</li>
                                    <li>Up to 5 users simultaneously</li>
                                    <li>Has HEALTH certificate</li>
                                </ul>
                            </div>
                            <div class="ps-product__actions ps-product__group-mobile">
                                <div class="ps-product__quantity">
                                    <div class="def-number-input number-input safari_only">
                                        <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                        <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                        <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                    </div>
                                </div>
                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection