@extends('frontend.master_dashboard')
@section('main')

@section('title')
    {{ $blogdetails->post_title }}
@endsection

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('fashion') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> <a href="shop-grid-right.html">
                @foreach ($breadcat as $cat)<!DOCTYPE html>
<html class="no-js" lang="en">

@php
    $seo = App\Models\Seo::find(1);
@endphp

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="title" content="{{ $seo->meta_title }}" />
    <meta name="author" content="{{ $seo->meta_author }}" />
    <meta name="keywords" content="{{ $seo->meta_keyword }}" />
    <meta name="description" content="{{ $seo->meta_description }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/assets/images/favicon.png" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins.css">

    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <script src="https://js.stripe.com/v3/"></script>
</head>



<body class="template-index belle template-index-belle">

    {{-- <div id="pre-loader">
        <img src="{{ asset('frontend') }}/assets/images/loader.gif" alt="Loading..." />
    </div> --}}


    <div class="pageWrapper">

        <!--Search Form Drawer-->
        <div class="search">
            <div class="search__form">
                <form class="search-bar__form" action="{{ route('product.search') }}" method="post">
                    @csrf
                    <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                    <input class="search__input" type="search" aria-label="Search" autocomplete="off" onfocus="search_result_show()" onblur="search_result_hide()" name="search"
                    id="search" placeholder="Search for items...">
                    <div id="searchProducts"></div>
                </form>
                {{-- <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button> --}}
            </div>
        </div>
        <!--End Search Form Drawer-->


        <!--Header & Mobile Menu-->
        @include('frontend.body.header')
        <!--End Header & Mobile Menu-->


        <!--Body Content-->
        <div id="page-content">
            @yield('main')
        </div>
        <!--End Body Content-->


        <!--Footer-->
        @include('frontend.body.footer')
        <!--End Footer-->


        <!--Scoll Top-->
        <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
        <!--End Scoll Top-->


        <!--Quick View popup-->
        @include('frontend.body.quickview')
        <!--End Quick View popup-->


        <!-- Age Verification Popup -->
        @include('frontend.body.age_verification')
        <!-- End Age Verification Popup -->


        <!-- Including Jquery -->
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.cookie.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/wow.min.js"></script>

        <!-- Including Javascript -->
        <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/lazysizes.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/main.js"></script>

        <!--For Newsletter Popup-->
        <script>
            jQuery(document).ready(function() {
                jQuery('.closepopup').on('click', function() {
                    jQuery('#popup-container').fadeOut();
                    jQuery('#modalOverly').fadeOut();
                });

                var visits = jQuery.cookie('visits') || 0;
                visits++;
                jQuery.cookie('visits', visits, {
                    expires: 1,
                    path: '/'
                });
                console.debug(jQuery.cookie('visits'));
                if (jQuery.cookie('visits') > 1) {
                    jQuery('#modalOverly').hide();
                    jQuery('#popup-container').hide();
                } else {
                    var pageHeight = jQuery(document).height();
                    jQuery('<div id="modalOverly"></div>').insertBefore('body');
                    jQuery('#modalOverly').css("height", pageHeight);
                    jQuery('#popup-container').show();
                }
                if (jQuery.cookie('noShowWelcome')) {
                    jQuery('#popup-container').hide();
                    jQuery('#active-popup').hide();
                }
            });

            jQuery(document).mouseup(function(e) {
                var container = jQuery('#popup-container');
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.fadeOut();
                    jQuery('#modalOverly').fadeIn(200);
                    jQuery('#modalOverly').hide();
                }
            });

            /*--------------------------------------
                Promotion / Notification Cookie Bar 
              -------------------------------------- */
            if (Cookies.get('promotion') != 'true') {
                $(".notification-bar").show();
            }
            $(".close-announcement").on('click', function() {
                $(".notification-bar").slideUp();
                Cookies.set('promotion', 'true', {
                    expires: 1
                });
                return false;
            });
        </script>
        <!--End For Newsletter Popup-->

        <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch (type) {
                    case 'info':
                        toastr.info(" {{ Session::get('message') }} ");
                        break;

                    case 'success':
                        toastr.success(" {{ Session::get('message') }} ");
                        break;

                    case 'warning':
                        toastr.warning(" {{ Session::get('message') }} ");
                        break;

                    case 'error':
                        toastr.error(" {{ Session::get('message') }} ");
                        break;
                }
            @endif
        </script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            /// Start product view with Modal 
            function productView(id) {
                // alert(id)
                $.ajax({
                    type: 'GET',
                    url: '/product/view/modal/' + id,
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data)

                        $('#pname').text(data.product.product_name);
                        $('#pprice').text(data.product.selling_price);
                        $('#pcode').text(data.product.product_code);
                        $('#pcategory').text(data.product.category.category_name);
                        $('#pbrand').text(data.product.brand.brand_name);
                        $('#pimage').attr('src', '/' + data.product.product_thambnail);
                        $('#pvendor_id').text(data.product.vendor_id);
                        $('#product_id').val(id);
                        $('#qty').val(1);

                        // Product Price 
                        if (data.product.discount_price == null) {
                            $('#pprice').text('');
                            $('#oldprice').text('');
                            $('#pprice').text(data.product.selling_price);
                        } else {
                            $('#pprice').text(data.product.discount_price);
                            $('#oldprice').text(data.product.selling_price);
                        } // end else


                        /// Start Stock Option
                        if (data.product.product_qty > 0) {
                            $('#aviable').text('');
                            $('#stockout').text('');
                            $('#aviable').text('aviable');
                        } else {
                            $('#aviable').text('');
                            $('#stockout').text('');
                            $('#stockout').text('stockout');
                        }
                        ///End Start Stock Option

                        ///Size 
                        $('select[name="size"]').empty();
                        $.each(data.size, function(key, value) {
                            $('select[name="size"]').append('<option value="' + value + ' ">' + value +
                                '  </option')
                            if (data.size == "") {
                                $('#sizeArea').hide();
                            } else {
                                $('#sizeArea').show();
                            }
                        }) // end size

                        ///Color 
                        $('select[name="color"]').empty();
                        $.each(data.color, function(key, value) {
                            $('select[name="color"]').append('<option value="' + value + ' ">' + value +
                                '  </option')
                            if (data.color == "") {
                                $('#colorArea').hide();
                            } else {
                                $('#colorArea').show();
                            }
                        }) // end size
                    }
                })
            }
            // End Product View With Modal 

            /// Start Add To Cart Prodcut 
            function addToCart() {
                var product_name = $('#pname').text();
                var id = $('#product_id').val();
                var vendor = $('#pvendor_id').text();
                var color = $('#color option:selected').text();
                var size = $('#size option:selected').text();
                var quantity = $('#qty').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        color: color,
                        size: size,
                        quantity: quantity,
                        product_name: product_name,
                        vendor: vendor
                    },
                    url: "/cart/data/store/" + id,
                    success: function(data) {
                        miniCart();
                        $('#closeModal').click();
                        // console.log(data)

                        // Start Message 
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })
                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }
                        // End Message  
                    }
                })
            }
            /// End Add To Cart Product 

            /// Start Details Page Add To Cart Product 
            function addToCartDetails() {

                var product_name = $('#dpname').text();
                var id = $('#dproduct_id').val();
                var vendor = $('#vproduct_id').val();
                var color = $('#dcolor option:selected').text();
                var size = $('#dsize option:selected').text();
                var quantity = $('#dqty').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        color: color,
                        size: size,
                        quantity: quantity,
                        product_name: product_name,
                        vendor: vendor
                    },
                    url: "/dcart/data/store/" + id,
                    success: function(data) {
                        miniCart();

                        // console.log(data)

                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  
                    }
                })

            }

            /// Eend Details Page Add To Cart Product 
        </script>

        <script type="text/javascript">
            function miniCart() {
                $.ajax({
                    type: 'GET',
                    url: '/product/mini/cart',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)

                        $('span[id="cartSubTotal"]').text(response.cartTotal);
                        $('#cartQty').text(response.cartQty);

                        var miniCart = ""

                        $.each(response.carts, function(key, value) {
                            miniCart +=
                                `
                                <ul class="mini-products-list">

                                    <li class="item" style="font-size: 20px;">

                                        <a class="product-image" href="#">
                                            <img src="/${value.options.image}"
                                                alt="" title="" />
                                        </a>

                                        <div class="product-details">
                                            <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="remove">
                                                <i class="anm anm-times-l" aria-hidden="true"></i>
                                            </a>
                                            <a class="pName" href="cart.html" style="font-size: 15px;font-weight: 600;">${value.name}</a>
                                            <div class="priceRow" style="font-size: 15px;">
                                                <div class="product-price">
                                                    <span class="money">${value.qty}</span> x <span class="money">${value.price}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li> 

                                </ul> 
                                <hr><br>
                            `
                        });

                        $('#miniCart').html(miniCart);

                    }

                })
            }
            miniCart();


            /// Mini Cart Remove Start 
            function miniCartRemove(rowId) {
                $.ajax({
                    type: 'GET',
                    url: '/minicart/product/remove/' + rowId,
                    dataType: 'json',
                    success: function(data) {
                        miniCart();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  

                    }



                })
            }



            /// Mini Cart Remove End 
        </script>

        <!--  /// Start Wishlist Add -->
        <script type="text/javascript">
            function addToWishList(product_id) {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/add-to-wishlist/" + product_id,

                    success: function(data) {
                        wishlist();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
        </script>
        <!--  /// End Wishlist Add -->



        <!--  /// Start Load Wishlist Data -->
        <script type="text/javascript">
            function wishlist() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/get-wishlist-product/",

                    success: function(response) {

                        $('#wishQty').text(response.wishQty);

                        var rows = ""
                        $.each(response.wishlist, function(key, value) {

                            rows += `<tr class="pt-30">
                        <td class="custome-checkbox pl-30">
                            
                        </td>
                        <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thambnail}" alt="#" /></td>
                        <td class="product-des product-name">
                            <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.product_name} </a></h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                        </td>
                        <td class="price" data-title="Price">
                        ${value.product.discount_price == null
                        ? `<h3 class="text-brand">$${value.product.selling_price}</h3>`
                        :`<h3 class="text-brand">$${value.product.discount_price}</h3>`

                        }
                            
                        </td>
                        <td class="text-center detail-info" data-title="Stock">
                            ${value.product.product_qty > 0 
                                ? `<span class="stock-status in-stock mb-0"> In Stock </span>`

                                :`<span class="stock-status out-stock mb-0">Stock Out </span>`

                            } 
                           
                        </td>
                       
                        <td class="action text-center" data-title="Remove">
                            <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fi-rs-trash"></i></a>
                        </td>
                    </tr> `

                        });

                        $('#wishlist').html(rows);

                    }
                })
            }

            wishlist();

            // / End Load Wishlist Data -->

            // Wishlist Remove Start 

            function wishlistRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/wishlist-remove/" + id,

                    success: function(data) {
                        wishlist();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }


            // Wishlist Remove End
        </script>




        <!--  /// Start Compare Add -->
        <script type="text/javascript">
            function addToCompare(product_id) {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/add-to-compare/" + product_id,

                    success: function(data) {

                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
        </script>
        <!--  /// End Compare Add -->


        <!--  /// Start Load Compare Data -->
        <script type="text/javascript">
            function compare() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/get-compare-product/",

                    success: function(response) {

                        var rows = ""
                        $.each(response, function(key, value) {

                            rows += ` <tr class="pr_image">
                                    <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
    <td class="row_img"><img src="/${value.product.product_thambnail} " style="width:300px; height:300px;"  alt="compare-img" /></td>
                                    
                                </tr>
                                <tr class="pr_title">
                                    <td class="text-muted font-sm fw-600 font-heading">Name</td>
                                    <td class="product_name">
                                        <h6><a href="shop-product-full.html" class="text-heading">${value.product.product_name} </a></h6>
                                    </td>
                                   
                                </tr>
                                <tr class="pr_price">
                                    <td class="text-muted font-sm fw-600 font-heading">Price</td>
                                    <td class="product_price">
                      ${value.product.discount_price == null
                        ? `<h4 class="price text-brand">$${value.product.selling_price}</h4>`
                        :`<h4 class="price text-brand">$${value.product.discount_price}</h4>`

                        } 
                                    </td>
                                  
                                </tr>
                                
                                <tr class="description">
                                    <td class="text-muted font-sm fw-600 font-heading">Description</td>
                                    <td class="row_text font-xs">
                                        <p class="font-sm text-muted"> ${value.product.short_descp}</p>
                                    </td>
                                    
                                </tr>
                                <tr class="pr_stock">
                                    <td class="text-muted font-sm fw-600 font-heading">Stock status</td>
                                    <td class="row_stock">
                                ${value.product.product_qty > 0 
                                ? `<span class="stock-status in-stock mb-0"> In Stock </span>`

                                :`<span class="stock-status out-stock mb-0">Stock Out </span>`

                               } 

                              </td>
                                   
                                </tr>
                                
            <tr class="pr_remove text-muted">
                <td class="text-muted font-md fw-600"></td>
                <td class="row_remove">
                    <a type="submit" class="text-muted"  id="${value.id}" onclick="compareRemove(this.id)"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                </td>
                
            </tr> `

                        });

                        $('#compare').html(rows);

                    }
                })
            }

            compare();

            // / End Load Compare Data -->

            // Compare Remove Start 

            function compareRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/compare-remove/" + id,

                    success: function(data) {
                        compare();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }


            // Compare Remove End
        </script>

        <!--  // Start Load MY Cart // -->
        <script type="text/javascript">
            function cart() {
                $.ajax({
                    type: 'GET',
                    url: '/get-cart-product',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)


                        var rows = ""

                        $.each(response.carts, function(key, value) {
                            rows +=
                                ` 
                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <td class="cart__image-wrapper cart-flex-item">
                                        <a href="#">
                                            <img class="cart__image" src="/${value.options.image}"
                                                alt="">
                                        </a>
                                    </td>
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a href="#">${value.name}</a>
                                        </div>
                                    </td>
                                    <td class="cart__price-wrapper cart-flex-item">
                                        <span class="money">BDT ${value.price}</span>
                                    </td>
                                    <td class="cart__update-wrapper cart-flex-item text-right">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                <a type="submit" class="qtyBtn minus" id="${value.rowId}" onclick="cartDecrement(this.id)" href="javascript:void(0);">
                                                    <i class="icon icon-minus"></i>
                                                </a>
                                                <input class="cart__qty-input qty" type="text" name="updates[]"
                                                    id="qty" value="${value.qty}" min="1" pattern="[0-9]*">
                                                <a  type="submit" class="qtyBtn plus" id="${value.rowId}" onclick="cartIncrement(this.id)" href="javascript:void(0);">
                                                    <i class="icon icon-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right small--hide cart-price">
                                        <div><span class="money">BDT ${value.subtotal}</span></div>
                                    </td>
                                    <td class="text-center small--hide">
                                        <a type="submit" class="btn btn--secondary cart__remove" title="Remove tem" id="${value.rowId}" onclick="cartRemove(this.id)">
                                            <i class="icon icon anm anm-times-l" style="color: #fff;"></i>
                                        </a>
                                    </td>
                                </tr>
                            `
                        });

                        $('#cartPage').html(rows);

                    }

                })
            }
            cart();

            // Cart Remove Start 
            function cartRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/cart-remove/" + id,

                    success: function(data) {
                        cart();
                        miniCart();
                        couponCalculation();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
            // Cart Remove End 

            // Cart INCREMENT 

            function cartIncrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: "/cart-increment/" + rowId,
                    dataType: 'json',
                    success: function(data) {
                        couponCalculation();
                        cart();
                        miniCart();

                    }
                });
            }


            // Cart INCREMENT End 

            // Cart Decrement Start

            function cartDecrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: "/cart-decrement/" + rowId,
                    dataType: 'json',
                    success: function(data) {
                        couponCalculation();
                        cart();
                        miniCart();

                    }
                });
            }


            // Cart Decrement End 
        </script>
        <!--  // End Load MY Cart // -->

        <!--  ////////////// Start Apply Coupon ////////////// -->
        <script type="text/javascript">
            function applyCoupon() {
                var coupon_name = $('#coupon_name').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        coupon_name: coupon_name
                    },

                    url: "/coupon-apply",

                    success: function(data) {
                        couponCalculation();

                        if (data.validity == true) {
                            $('#couponField').hide();
                        }


                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }

            // Start CouponCalculation Method   
            function couponCalculation() {
                $.ajax({
                    type: 'GET',
                    url: "/coupon-calculation",
                    dataType: 'json',
                    success: function(data) {
                        if (data.total) {
                            $('#couponCalField').html(
                                `
                                    <div class="row" style="margin-top:-30px ;">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                            <p style="color:#fff; font-size:14px;">Order Value</p>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-center" style="padding-left:0px;">
                                            <p style="color:#fff; font-size:14px; margin-left:-20px;">BDT ${data.total}</p>
                                        </div>
                                    </div>
                                `
                            )
                        } else {
                            $('#couponCalField').html(
                                `
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">BDT ${data.subtotal}</span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Coupon</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">${data.coupon_name} <a type="submit" onclick="couponRemove()" class="pointer"><i class="fa-solid fa-trash"></i></a></span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Discount Amoount</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">BDT ${data.discount_amount}</span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">
                                            <strong>Grand Total</strong>
                                        </span>
                                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right">
                                            <span class="money">BDT ${data.total_amount}</span>
                                        </span>
                                    </div>
                                `
                            )
                        }

                    }
                })
            }

            couponCalculation();
            // Start CouponCalculation Method   
        </script>

        <!--  ////////////// End Apply Coupon ////////////// -->

        <script type="text/javascript">
            // Coupon Remove Start 
            function couponRemove() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/coupon-remove",

                    success: function(data) {
                        couponCalculation();
                        $('#couponField').show();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
            // Coupon Remove End 
        </script>

    </div>
</body>

</html>
<!DOCTYPE html>
<html class="no-js" lang="en">

@php
    $seo = App\Models\Seo::find(1);
@endphp

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="title" content="{{ $seo->meta_title }}" />
    <meta name="author" content="{{ $seo->meta_author }}" />
    <meta name="keywords" content="{{ $seo->meta_keyword }}" />
    <meta name="description" content="{{ $seo->meta_description }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/assets/images/favicon.png" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins.css">

    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <script src="https://js.stripe.com/v3/"></script>
</head>



<body class="template-index belle template-index-belle">

    {{-- <div id="pre-loader">
        <img src="{{ asset('frontend') }}/assets/images/loader.gif" alt="Loading..." />
    </div> --}}


    <div class="pageWrapper">

        <!--Search Form Drawer-->
        <div class="search">
            <div class="search__form">
                <form class="search-bar__form" action="{{ route('product.search') }}" method="post">
                    @csrf
                    <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                    <input class="search__input" type="search" aria-label="Search" autocomplete="off" onfocus="search_result_show()" onblur="search_result_hide()" name="search"
                    id="search" placeholder="Search for items...">
                    <div id="searchProducts"></div>
                </form>
                {{-- <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button> --}}
            </div>
        </div>
        <!--End Search Form Drawer-->


        <!--Header & Mobile Menu-->
        @include('frontend.body.header')
        <!--End Header & Mobile Menu-->


        <!--Body Content-->
        <div id="page-content">
            @yield('main')
        </div>
        <!--End Body Content-->


        <!--Footer-->
        @include('frontend.body.footer')
        <!--End Footer-->


        <!--Scoll Top-->
        <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
        <!--End Scoll Top-->


        <!--Quick View popup-->
        @include('frontend.body.quickview')
        <!--End Quick View popup-->


        <!-- Age Verification Popup -->
        @include('frontend.body.age_verification')
        <!-- End Age Verification Popup -->


        <!-- Including Jquery -->
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.cookie.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/wow.min.js"></script>

        <!-- Including Javascript -->
        <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/lazysizes.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/main.js"></script>

        <!--For Newsletter Popup-->
        <script>
            jQuery(document).ready(function() {
                jQuery('.closepopup').on('click', function() {
                    jQuery('#popup-container').fadeOut();
                    jQuery('#modalOverly').fadeOut();
                });

                var visits = jQuery.cookie('visits') || 0;
                visits++;
                jQuery.cookie('visits', visits, {
                    expires: 1,
                    path: '/'
                });
                console.debug(jQuery.cookie('visits'));
                if (jQuery.cookie('visits') > 1) {
                    jQuery('#modalOverly').hide();
                    jQuery('#popup-container').hide();
                } else {
                    var pageHeight = jQuery(document).height();
                    jQuery('<div id="modalOverly"></div>').insertBefore('body');
                    jQuery('#modalOverly').css("height", pageHeight);
                    jQuery('#popup-container').show();
                }
                if (jQuery.cookie('noShowWelcome')) {
                    jQuery('#popup-container').hide();
                    jQuery('#active-popup').hide();
                }
            });

            jQuery(document).mouseup(function(e) {
                var container = jQuery('#popup-container');
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.fadeOut();
                    jQuery('#modalOverly').fadeIn(200);
                    jQuery('#modalOverly').hide();
                }
            });

            /*--------------------------------------
                Promotion / Notification Cookie Bar 
              -------------------------------------- */
            if (Cookies.get('promotion') != 'true') {
                $(".notification-bar").show();
            }
            $(".close-announcement").on('click', function() {
                $(".notification-bar").slideUp();
                Cookies.set('promotion', 'true', {
                    expires: 1
                });
                return false;
            });
        </script>
        <!--End For Newsletter Popup-->

        <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch (type) {
                    case 'info':
                        toastr.info(" {{ Session::get('message') }} ");
                        break;

                    case 'success':
                        toastr.success(" {{ Session::get('message') }} ");
                        break;

                    case 'warning':
                        toastr.warning(" {{ Session::get('message') }} ");
                        break;

                    case 'error':
                        toastr.error(" {{ Session::get('message') }} ");
                        break;
                }
            @endif
        </script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            /// Start product view with Modal 
            function productView(id) {
                // alert(id)
                $.ajax({
                    type: 'GET',
                    url: '/product/view/modal/' + id,
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data)

                        $('#pname').text(data.product.product_name);
                        $('#pprice').text(data.product.selling_price);
                        $('#pcode').text(data.product.product_code);
                        $('#pcategory').text(data.product.category.category_name);
                        $('#pbrand').text(data.product.brand.brand_name);
                        $('#pimage').attr('src', '/' + data.product.product_thambnail);
                        $('#pvendor_id').text(data.product.vendor_id);
                        $('#product_id').val(id);
                        $('#qty').val(1);

                        // Product Price 
                        if (data.product.discount_price == null) {
                            $('#pprice').text('');
                            $('#oldprice').text('');
                            $('#pprice').text(data.product.selling_price);
                        } else {
                            $('#pprice').text(data.product.discount_price);
                            $('#oldprice').text(data.product.selling_price);
                        } // end else


                        /// Start Stock Option
                        if (data.product.product_qty > 0) {
                            $('#aviable').text('');
                            $('#stockout').text('');
                            $('#aviable').text('aviable');
                        } else {
                            $('#aviable').text('');
                            $('#stockout').text('');
                            $('#stockout').text('stockout');
                        }
                        ///End Start Stock Option

                        ///Size 
                        $('select[name="size"]').empty();
                        $.each(data.size, function(key, value) {
                            $('select[name="size"]').append('<option value="' + value + ' ">' + value +
                                '  </option')
                            if (data.size == "") {
                                $('#sizeArea').hide();
                            } else {
                                $('#sizeArea').show();
                            }
                        }) // end size

                        ///Color 
                        $('select[name="color"]').empty();
                        $.each(data.color, function(key, value) {
                            $('select[name="color"]').append('<option value="' + value + ' ">' + value +
                                '  </option')
                            if (data.color == "") {
                                $('#colorArea').hide();
                            } else {
                                $('#colorArea').show();
                            }
                        }) // end size
                    }
                })
            }
            // End Product View With Modal 

            /// Start Add To Cart Prodcut 
            function addToCart() {
                var product_name = $('#pname').text();
                var id = $('#product_id').val();
                var vendor = $('#pvendor_id').text();
                var color = $('#color option:selected').text();
                var size = $('#size option:selected').text();
                var quantity = $('#qty').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        color: color,
                        size: size,
                        quantity: quantity,
                        product_name: product_name,
                        vendor: vendor
                    },
                    url: "/cart/data/store/" + id,
                    success: function(data) {
                        miniCart();
                        $('#closeModal').click();
                        // console.log(data)

                        // Start Message 
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })
                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }
                        // End Message  
                    }
                })
            }
            /// End Add To Cart Product 

            /// Start Details Page Add To Cart Product 
            function addToCartDetails() {

                var product_name = $('#dpname').text();
                var id = $('#dproduct_id').val();
                var vendor = $('#vproduct_id').val();
                var color = $('#dcolor option:selected').text();
                var size = $('#dsize option:selected').text();
                var quantity = $('#dqty').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        color: color,
                        size: size,
                        quantity: quantity,
                        product_name: product_name,
                        vendor: vendor
                    },
                    url: "/dcart/data/store/" + id,
                    success: function(data) {
                        miniCart();

                        // console.log(data)

                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  
                    }
                })

            }

            /// Eend Details Page Add To Cart Product 
        </script>

        <script type="text/javascript">
            function miniCart() {
                $.ajax({
                    type: 'GET',
                    url: '/product/mini/cart',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)

                        $('span[id="cartSubTotal"]').text(response.cartTotal);
                        $('#cartQty').text(response.cartQty);

                        var miniCart = ""

                        $.each(response.carts, function(key, value) {
                            miniCart +=
                                `
                                <ul class="mini-products-list">

                                    <li class="item" style="font-size: 20px;">

                                        <a class="product-image" href="#">
                                            <img src="/${value.options.image}"
                                                alt="" title="" />
                                        </a>

                                        <div class="product-details">
                                            <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="remove">
                                                <i class="anm anm-times-l" aria-hidden="true"></i>
                                            </a>
                                            <a class="pName" href="cart.html" style="font-size: 15px;font-weight: 600;">${value.name}</a>
                                            <div class="priceRow" style="font-size: 15px;">
                                                <div class="product-price">
                                                    <span class="money">${value.qty}</span> x <span class="money">${value.price}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li> 

                                </ul> 
                                <hr><br>
                            `
                        });

                        $('#miniCart').html(miniCart);

                    }

                })
            }
            miniCart();


            /// Mini Cart Remove Start 
            function miniCartRemove(rowId) {
                $.ajax({
                    type: 'GET',
                    url: '/minicart/product/remove/' + rowId,
                    dataType: 'json',
                    success: function(data) {
                        miniCart();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  

                    }



                })
            }



            /// Mini Cart Remove End 
        </script>

        <!--  /// Start Wishlist Add -->
        <script type="text/javascript">
            function addToWishList(product_id) {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/add-to-wishlist/" + product_id,

                    success: function(data) {
                        wishlist();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
        </script>
        <!--  /// End Wishlist Add -->



        <!--  /// Start Load Wishlist Data -->
        <script type="text/javascript">
            function wishlist() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/get-wishlist-product/",

                    success: function(response) {

                        $('#wishQty').text(response.wishQty);

                        var rows = ""
                        $.each(response.wishlist, function(key, value) {

                            rows += `<tr class="pt-30">
                        <td class="custome-checkbox pl-30">
                            
                        </td>
                        <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thambnail}" alt="#" /></td>
                        <td class="product-des product-name">
                            <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.product_name} </a></h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                        </td>
                        <td class="price" data-title="Price">
                        ${value.product.discount_price == null
                        ? `<h3 class="text-brand">$${value.product.selling_price}</h3>`
                        :`<h3 class="text-brand">$${value.product.discount_price}</h3>`

                        }
                            
                        </td>
                        <td class="text-center detail-info" data-title="Stock">
                            ${value.product.product_qty > 0 
                                ? `<span class="stock-status in-stock mb-0"> In Stock </span>`

                                :`<span class="stock-status out-stock mb-0">Stock Out </span>`

                            } 
                           
                        </td>
                       
                        <td class="action text-center" data-title="Remove">
                            <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fi-rs-trash"></i></a>
                        </td>
                    </tr> `

                        });

                        $('#wishlist').html(rows);

                    }
                })
            }

            wishlist();

            // / End Load Wishlist Data -->

            // Wishlist Remove Start 

            function wishlistRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/wishlist-remove/" + id,

                    success: function(data) {
                        wishlist();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }


            // Wishlist Remove End
        </script>




        <!--  /// Start Compare Add -->
        <script type="text/javascript">
            function addToCompare(product_id) {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/add-to-compare/" + product_id,

                    success: function(data) {

                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
        </script>
        <!--  /// End Compare Add -->


        <!--  /// Start Load Compare Data -->
        <script type="text/javascript">
            function compare() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/get-compare-product/",

                    success: function(response) {

                        var rows = ""
                        $.each(response, function(key, value) {

                            rows += ` <tr class="pr_image">
                                    <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
    <td class="row_img"><img src="/${value.product.product_thambnail} " style="width:300px; height:300px;"  alt="compare-img" /></td>
                                    
                                </tr>
                                <tr class="pr_title">
                                    <td class="text-muted font-sm fw-600 font-heading">Name</td>
                                    <td class="product_name">
                                        <h6><a href="shop-product-full.html" class="text-heading">${value.product.product_name} </a></h6>
                                    </td>
                                   
                                </tr>
                                <tr class="pr_price">
                                    <td class="text-muted font-sm fw-600 font-heading">Price</td>
                                    <td class="product_price">
                      ${value.product.discount_price == null
                        ? `<h4 class="price text-brand">$${value.product.selling_price}</h4>`
                        :`<h4 class="price text-brand">$${value.product.discount_price}</h4>`

                        } 
                                    </td>
                                  
                                </tr>
                                
                                <tr class="description">
                                    <td class="text-muted font-sm fw-600 font-heading">Description</td>
                                    <td class="row_text font-xs">
                                        <p class="font-sm text-muted"> ${value.product.short_descp}</p>
                                    </td>
                                    
                                </tr>
                                <tr class="pr_stock">
                                    <td class="text-muted font-sm fw-600 font-heading">Stock status</td>
                                    <td class="row_stock">
                                ${value.product.product_qty > 0 
                                ? `<span class="stock-status in-stock mb-0"> In Stock </span>`

                                :`<span class="stock-status out-stock mb-0">Stock Out </span>`

                               } 

                              </td>
                                   
                                </tr>
                                
            <tr class="pr_remove text-muted">
                <td class="text-muted font-md fw-600"></td>
                <td class="row_remove">
                    <a type="submit" class="text-muted"  id="${value.id}" onclick="compareRemove(this.id)"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                </td>
                
            </tr> `

                        });

                        $('#compare').html(rows);

                    }
                })
            }

            compare();

            // / End Load Compare Data -->

            // Compare Remove Start 

            function compareRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/compare-remove/" + id,

                    success: function(data) {
                        compare();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }


            // Compare Remove End
        </script>

        <!--  // Start Load MY Cart // -->
        <script type="text/javascript">
            function cart() {
                $.ajax({
                    type: 'GET',
                    url: '/get-cart-product',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)


                        var rows = ""

                        $.each(response.carts, function(key, value) {
                            rows +=
                                ` 
                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <td class="cart__image-wrapper cart-flex-item">
                                        <a href="#">
                                            <img class="cart__image" src="/${value.options.image}"
                                                alt="">
                                        </a>
                                    </td>
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a href="#">${value.name}</a>
                                        </div>
                                    </td>
                                    <td class="cart__price-wrapper cart-flex-item">
                                        <span class="money">BDT ${value.price}</span>
                                    </td>
                                    <td class="cart__update-wrapper cart-flex-item text-right">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                <a type="submit" class="qtyBtn minus" id="${value.rowId}" onclick="cartDecrement(this.id)" href="javascript:void(0);">
                                                    <i class="icon icon-minus"></i>
                                                </a>
                                                <input class="cart__qty-input qty" type="text" name="updates[]"
                                                    id="qty" value="${value.qty}" min="1" pattern="[0-9]*">
                                                <a  type="submit" class="qtyBtn plus" id="${value.rowId}" onclick="cartIncrement(this.id)" href="javascript:void(0);">
                                                    <i class="icon icon-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right small--hide cart-price">
                                        <div><span class="money">BDT ${value.subtotal}</span></div>
                                    </td>
                                    <td class="text-center small--hide">
                                        <a type="submit" class="btn btn--secondary cart__remove" title="Remove tem" id="${value.rowId}" onclick="cartRemove(this.id)">
                                            <i class="icon icon anm anm-times-l" style="color: #fff;"></i>
                                        </a>
                                    </td>
                                </tr>
                            `
                        });

                        $('#cartPage').html(rows);

                    }

                })
            }
            cart();

            // Cart Remove Start 
            function cartRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/cart-remove/" + id,

                    success: function(data) {
                        cart();
                        miniCart();
                        couponCalculation();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
            // Cart Remove End 

            // Cart INCREMENT 

            function cartIncrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: "/cart-increment/" + rowId,
                    dataType: 'json',
                    success: function(data) {
                        couponCalculation();
                        cart();
                        miniCart();

                    }
                });
            }


            // Cart INCREMENT End 

            // Cart Decrement Start

            function cartDecrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: "/cart-decrement/" + rowId,
                    dataType: 'json',
                    success: function(data) {
                        couponCalculation();
                        cart();
                        miniCart();

                    }
                });
            }


            // Cart Decrement End 
        </script>
        <!--  // End Load MY Cart // -->

        <!--  ////////////// Start Apply Coupon ////////////// -->
        <script type="text/javascript">
            function applyCoupon() {
                var coupon_name = $('#coupon_name').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        coupon_name: coupon_name
                    },

                    url: "/coupon-apply",

                    success: function(data) {
                        couponCalculation();

                        if (data.validity == true) {
                            $('#couponField').hide();
                        }


                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }

            // Start CouponCalculation Method   
            function couponCalculation() {
                $.ajax({
                    type: 'GET',
                    url: "/coupon-calculation",
                    dataType: 'json',
                    success: function(data) {
                        if (data.total) {
                            $('#couponCalField').html(
                                `
                                    <div class="row" style="margin-top:-30px ;">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                            <p style="color:#fff; font-size:14px;">Order Value</p>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-center" style="padding-left:0px;">
                                            <p style="color:#fff; font-size:14px; margin-left:-20px;">BDT ${data.total}</p>
                                        </div>
                                    </div>
                                `
                            )
                        } else {
                            $('#couponCalField').html(
                                `
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">BDT ${data.subtotal}</span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Coupon</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">${data.coupon_name} <a type="submit" onclick="couponRemove()" class="pointer"><i class="fa-solid fa-trash"></i></a></span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Discount Amoount</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">BDT ${data.discount_amount}</span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">
                                            <strong>Grand Total</strong>
                                        </span>
                                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right">
                                            <span class="money">BDT ${data.total_amount}</span>
                                        </span>
                                    </div>
                                `
                            )
                        }

                    }
                })
            }

            couponCalculation();
            // Start CouponCalculation Method   
        </script>

        <!--  ////////////// End Apply Coupon ////////////// -->

        <script type="text/javascript">
            // Coupon Remove Start 
            function couponRemove() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/coupon-remove",

                    success: function(data) {
                        couponCalculation();
                        $('#couponField').show();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
            // Coupon Remove End 
        </script>

    </div>
</body>

</html>
<!DOCTYPE html>
<html class="no-js" lang="en">

@php
    $seo = App\Models\Seo::find(1);
@endphp

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="title" content="{{ $seo->meta_title }}" />
    <meta name="author" content="{{ $seo->meta_author }}" />
    <meta name="keywords" content="{{ $seo->meta_keyword }}" />
    <meta name="description" content="{{ $seo->meta_description }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/assets/images/favicon.png" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins.css">

    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <script src="https://js.stripe.com/v3/"></script>
</head>



<body class="template-index belle template-index-belle">

    {{-- <div id="pre-loader">
        <img src="{{ asset('frontend') }}/assets/images/loader.gif" alt="Loading..." />
    </div> --}}


    <div class="pageWrapper">

        <!--Search Form Drawer-->
        <div class="search">
            <div class="search__form">
                <form class="search-bar__form" action="{{ route('product.search') }}" method="post">
                    @csrf
                    <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                    <input class="search__input" type="search" aria-label="Search" autocomplete="off" onfocus="search_result_show()" onblur="search_result_hide()" name="search"
                    id="search" placeholder="Search for items...">
                    <div id="searchProducts"></div>
                </form>
                {{-- <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button> --}}
            </div>
        </div>
        <!--End Search Form Drawer-->


        <!--Header & Mobile Menu-->
        @include('frontend.body.header')
        <!--End Header & Mobile Menu-->


        <!--Body Content-->
        <div id="page-content">
            @yield('main')
        </div>
        <!--End Body Content-->


        <!--Footer-->
        @include('frontend.body.footer')
        <!--End Footer-->


        <!--Scoll Top-->
        <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
        <!--End Scoll Top-->


        <!--Quick View popup-->
        @include('frontend.body.quickview')
        <!--End Quick View popup-->


        <!-- Age Verification Popup -->
        @include('frontend.body.age_verification')
        <!-- End Age Verification Popup -->


        <!-- Including Jquery -->
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.cookie.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/wow.min.js"></script>

        <!-- Including Javascript -->
        <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/lazysizes.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/main.js"></script>

        <!--For Newsletter Popup-->
        <script>
            jQuery(document).ready(function() {
                jQuery('.closepopup').on('click', function() {
                    jQuery('#popup-container').fadeOut();
                    jQuery('#modalOverly').fadeOut();
                });

                var visits = jQuery.cookie('visits') || 0;
                visits++;
                jQuery.cookie('visits', visits, {
                    expires: 1,
                    path: '/'
                });
                console.debug(jQuery.cookie('visits'));
                if (jQuery.cookie('visits') > 1) {
                    jQuery('#modalOverly').hide();
                    jQuery('#popup-container').hide();
                } else {
                    var pageHeight = jQuery(document).height();
                    jQuery('<div id="modalOverly"></div>').insertBefore('body');
                    jQuery('#modalOverly').css("height", pageHeight);
                    jQuery('#popup-container').show();
                }
                if (jQuery.cookie('noShowWelcome')) {
                    jQuery('#popup-container').hide();
                    jQuery('#active-popup').hide();
                }
            });

            jQuery(document).mouseup(function(e) {
                var container = jQuery('#popup-container');
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.fadeOut();
                    jQuery('#modalOverly').fadeIn(200);
                    jQuery('#modalOverly').hide();
                }
            });

            /*--------------------------------------
                Promotion / Notification Cookie Bar 
              -------------------------------------- */
            if (Cookies.get('promotion') != 'true') {
                $(".notification-bar").show();
            }
            $(".close-announcement").on('click', function() {
                $(".notification-bar").slideUp();
                Cookies.set('promotion', 'true', {
                    expires: 1
                });
                return false;
            });
        </script>
        <!--End For Newsletter Popup-->

        <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch (type) {
                    case 'info':
                        toastr.info(" {{ Session::get('message') }} ");
                        break;

                    case 'success':
                        toastr.success(" {{ Session::get('message') }} ");
                        break;

                    case 'warning':
                        toastr.warning(" {{ Session::get('message') }} ");
                        break;

                    case 'error':
                        toastr.error(" {{ Session::get('message') }} ");
                        break;
                }
            @endif
        </script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            /// Start product view with Modal 
            function productView(id) {
                // alert(id)
                $.ajax({
                    type: 'GET',
                    url: '/product/view/modal/' + id,
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data)

                        $('#pname').text(data.product.product_name);
                        $('#pprice').text(data.product.selling_price);
                        $('#pcode').text(data.product.product_code);
                        $('#pcategory').text(data.product.category.category_name);
                        $('#pbrand').text(data.product.brand.brand_name);
                        $('#pimage').attr('src', '/' + data.product.product_thambnail);
                        $('#pvendor_id').text(data.product.vendor_id);
                        $('#product_id').val(id);
                        $('#qty').val(1);

                        // Product Price 
                        if (data.product.discount_price == null) {
                            $('#pprice').text('');
                            $('#oldprice').text('');
                            $('#pprice').text(data.product.selling_price);
                        } else {
                            $('#pprice').text(data.product.discount_price);
                            $('#oldprice').text(data.product.selling_price);
                        } // end else


                        /// Start Stock Option
                        if (data.product.product_qty > 0) {
                            $('#aviable').text('');
                            $('#stockout').text('');
                            $('#aviable').text('aviable');
                        } else {
                            $('#aviable').text('');
                            $('#stockout').text('');
                            $('#stockout').text('stockout');
                        }
                        ///End Start Stock Option

                        ///Size 
                        $('select[name="size"]').empty();
                        $.each(data.size, function(key, value) {
                            $('select[name="size"]').append('<option value="' + value + ' ">' + value +
                                '  </option')
                            if (data.size == "") {
                                $('#sizeArea').hide();
                            } else {
                                $('#sizeArea').show();
                            }
                        }) // end size

                        ///Color 
                        $('select[name="color"]').empty();
                        $.each(data.color, function(key, value) {
                            $('select[name="color"]').append('<option value="' + value + ' ">' + value +
                                '  </option')
                            if (data.color == "") {
                                $('#colorArea').hide();
                            } else {
                                $('#colorArea').show();
                            }
                        }) // end size
                    }
                })
            }
            // End Product View With Modal 

            /// Start Add To Cart Prodcut 
            function addToCart() {
                var product_name = $('#pname').text();
                var id = $('#product_id').val();
                var vendor = $('#pvendor_id').text();
                var color = $('#color option:selected').text();
                var size = $('#size option:selected').text();
                var quantity = $('#qty').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        color: color,
                        size: size,
                        quantity: quantity,
                        product_name: product_name,
                        vendor: vendor
                    },
                    url: "/cart/data/store/" + id,
                    success: function(data) {
                        miniCart();
                        $('#closeModal').click();
                        // console.log(data)

                        // Start Message 
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })
                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }
                        // End Message  
                    }
                })
            }
            /// End Add To Cart Product 

            /// Start Details Page Add To Cart Product 
            function addToCartDetails() {

                var product_name = $('#dpname').text();
                var id = $('#dproduct_id').val();
                var vendor = $('#vproduct_id').val();
                var color = $('#dcolor option:selected').text();
                var size = $('#dsize option:selected').text();
                var quantity = $('#dqty').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        color: color,
                        size: size,
                        quantity: quantity,
                        product_name: product_name,
                        vendor: vendor
                    },
                    url: "/dcart/data/store/" + id,
                    success: function(data) {
                        miniCart();

                        // console.log(data)

                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  
                    }
                })

            }

            /// Eend Details Page Add To Cart Product 
        </script>

        <script type="text/javascript">
            function miniCart() {
                $.ajax({
                    type: 'GET',
                    url: '/product/mini/cart',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)

                        $('span[id="cartSubTotal"]').text(response.cartTotal);
                        $('#cartQty').text(response.cartQty);

                        var miniCart = ""

                        $.each(response.carts, function(key, value) {
                            miniCart +=
                                `
                                <ul class="mini-products-list">

                                    <li class="item" style="font-size: 20px;">

                                        <a class="product-image" href="#">
                                            <img src="/${value.options.image}"
                                                alt="" title="" />
                                        </a>

                                        <div class="product-details">
                                            <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="remove">
                                                <i class="anm anm-times-l" aria-hidden="true"></i>
                                            </a>
                                            <a class="pName" href="cart.html" style="font-size: 15px;font-weight: 600;">${value.name}</a>
                                            <div class="priceRow" style="font-size: 15px;">
                                                <div class="product-price">
                                                    <span class="money">${value.qty}</span> x <span class="money">${value.price}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li> 

                                </ul> 
                                <hr><br>
                            `
                        });

                        $('#miniCart').html(miniCart);

                    }

                })
            }
            miniCart();


            /// Mini Cart Remove Start 
            function miniCartRemove(rowId) {
                $.ajax({
                    type: 'GET',
                    url: '/minicart/product/remove/' + rowId,
                    dataType: 'json',
                    success: function(data) {
                        miniCart();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  

                    }



                })
            }



            /// Mini Cart Remove End 
        </script>

        <!--  /// Start Wishlist Add -->
        <script type="text/javascript">
            function addToWishList(product_id) {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/add-to-wishlist/" + product_id,

                    success: function(data) {
                        wishlist();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
        </script>
        <!--  /// End Wishlist Add -->



        <!--  /// Start Load Wishlist Data -->
        <script type="text/javascript">
            function wishlist() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/get-wishlist-product/",

                    success: function(response) {

                        $('#wishQty').text(response.wishQty);

                        var rows = ""
                        $.each(response.wishlist, function(key, value) {

                            rows += `<tr class="pt-30">
                        <td class="custome-checkbox pl-30">
                            
                        </td>
                        <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thambnail}" alt="#" /></td>
                        <td class="product-des product-name">
                            <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.product_name} </a></h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                        </td>
                        <td class="price" data-title="Price">
                        ${value.product.discount_price == null
                        ? `<h3 class="text-brand">$${value.product.selling_price}</h3>`
                        :`<h3 class="text-brand">$${value.product.discount_price}</h3>`

                        }
                            
                        </td>
                        <td class="text-center detail-info" data-title="Stock">
                            ${value.product.product_qty > 0 
                                ? `<span class="stock-status in-stock mb-0"> In Stock </span>`

                                :`<span class="stock-status out-stock mb-0">Stock Out </span>`

                            } 
                           
                        </td>
                       
                        <td class="action text-center" data-title="Remove">
                            <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fi-rs-trash"></i></a>
                        </td>
                    </tr> `

                        });

                        $('#wishlist').html(rows);

                    }
                })
            }

            wishlist();

            // / End Load Wishlist Data -->

            // Wishlist Remove Start 

            function wishlistRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/wishlist-remove/" + id,

                    success: function(data) {
                        wishlist();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }


            // Wishlist Remove End
        </script>




        <!--  /// Start Compare Add -->
        <script type="text/javascript">
            function addToCompare(product_id) {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/add-to-compare/" + product_id,

                    success: function(data) {

                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
        </script>
        <!--  /// End Compare Add -->


        <!--  /// Start Load Compare Data -->
        <script type="text/javascript">
            function compare() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/get-compare-product/",

                    success: function(response) {

                        var rows = ""
                        $.each(response, function(key, value) {

                            rows += ` <tr class="pr_image">
                                    <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
    <td class="row_img"><img src="/${value.product.product_thambnail} " style="width:300px; height:300px;"  alt="compare-img" /></td>
                                    
                                </tr>
                                <tr class="pr_title">
                                    <td class="text-muted font-sm fw-600 font-heading">Name</td>
                                    <td class="product_name">
                                        <h6><a href="shop-product-full.html" class="text-heading">${value.product.product_name} </a></h6>
                                    </td>
                                   
                                </tr>
                                <tr class="pr_price">
                                    <td class="text-muted font-sm fw-600 font-heading">Price</td>
                                    <td class="product_price">
                      ${value.product.discount_price == null
                        ? `<h4 class="price text-brand">$${value.product.selling_price}</h4>`
                        :`<h4 class="price text-brand">$${value.product.discount_price}</h4>`

                        } 
                                    </td>
                                  
                                </tr>
                                
                                <tr class="description">
                                    <td class="text-muted font-sm fw-600 font-heading">Description</td>
                                    <td class="row_text font-xs">
                                        <p class="font-sm text-muted"> ${value.product.short_descp}</p>
                                    </td>
                                    
                                </tr>
                                <tr class="pr_stock">
                                    <td class="text-muted font-sm fw-600 font-heading">Stock status</td>
                                    <td class="row_stock">
                                ${value.product.product_qty > 0 
                                ? `<span class="stock-status in-stock mb-0"> In Stock </span>`

                                :`<span class="stock-status out-stock mb-0">Stock Out </span>`

                               } 

                              </td>
                                   
                                </tr>
                                
            <tr class="pr_remove text-muted">
                <td class="text-muted font-md fw-600"></td>
                <td class="row_remove">
                    <a type="submit" class="text-muted"  id="${value.id}" onclick="compareRemove(this.id)"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                </td>
                
            </tr> `

                        });

                        $('#compare').html(rows);

                    }
                })
            }

            compare();

            // / End Load Compare Data -->

            // Compare Remove Start 

            function compareRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/compare-remove/" + id,

                    success: function(data) {
                        compare();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }


            // Compare Remove End
        </script>

        <!--  // Start Load MY Cart // -->
        <script type="text/javascript">
            function cart() {
                $.ajax({
                    type: 'GET',
                    url: '/get-cart-product',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)


                        var rows = ""

                        $.each(response.carts, function(key, value) {
                            rows +=
                                ` 
                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <td class="cart__image-wrapper cart-flex-item">
                                        <a href="#">
                                            <img class="cart__image" src="/${value.options.image}"
                                                alt="">
                                        </a>
                                    </td>
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a href="#">${value.name}</a>
                                        </div>
                                    </td>
                                    <td class="cart__price-wrapper cart-flex-item">
                                        <span class="money">BDT ${value.price}</span>
                                    </td>
                                    <td class="cart__update-wrapper cart-flex-item text-right">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                <a type="submit" class="qtyBtn minus" id="${value.rowId}" onclick="cartDecrement(this.id)" href="javascript:void(0);">
                                                    <i class="icon icon-minus"></i>
                                                </a>
                                                <input class="cart__qty-input qty" type="text" name="updates[]"
                                                    id="qty" value="${value.qty}" min="1" pattern="[0-9]*">
                                                <a  type="submit" class="qtyBtn plus" id="${value.rowId}" onclick="cartIncrement(this.id)" href="javascript:void(0);">
                                                    <i class="icon icon-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right small--hide cart-price">
                                        <div><span class="money">BDT ${value.subtotal}</span></div>
                                    </td>
                                    <td class="text-center small--hide">
                                        <a type="submit" class="btn btn--secondary cart__remove" title="Remove tem" id="${value.rowId}" onclick="cartRemove(this.id)">
                                            <i class="icon icon anm anm-times-l" style="color: #fff;"></i>
                                        </a>
                                    </td>
                                </tr>
                            `
                        });

                        $('#cartPage').html(rows);

                    }

                })
            }
            cart();

            // Cart Remove Start 
            function cartRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/cart-remove/" + id,

                    success: function(data) {
                        cart();
                        miniCart();
                        couponCalculation();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
            // Cart Remove End 

            // Cart INCREMENT 

            function cartIncrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: "/cart-increment/" + rowId,
                    dataType: 'json',
                    success: function(data) {
                        couponCalculation();
                        cart();
                        miniCart();

                    }
                });
            }


            // Cart INCREMENT End 

            // Cart Decrement Start

            function cartDecrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: "/cart-decrement/" + rowId,
                    dataType: 'json',
                    success: function(data) {
                        couponCalculation();
                        cart();
                        miniCart();

                    }
                });
            }


            // Cart Decrement End 
        </script>
        <!--  // End Load MY Cart // -->

        <!--  ////////////// Start Apply Coupon ////////////// -->
        <script type="text/javascript">
            function applyCoupon() {
                var coupon_name = $('#coupon_name').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        coupon_name: coupon_name
                    },

                    url: "/coupon-apply",

                    success: function(data) {
                        couponCalculation();

                        if (data.validity == true) {
                            $('#couponField').hide();
                        }


                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }

            // Start CouponCalculation Method   
            function couponCalculation() {
                $.ajax({
                    type: 'GET',
                    url: "/coupon-calculation",
                    dataType: 'json',
                    success: function(data) {
                        if (data.total) {
                            $('#couponCalField').html(
                                `
                                    <div class="row" style="margin-top:-30px ;">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                            <p style="color:#fff; font-size:14px;">Order Value</p>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-center" style="padding-left:0px;">
                                            <p style="color:#fff; font-size:14px; margin-left:-20px;">BDT ${data.total}</p>
                                        </div>
                                    </div>
                                `
                            )
                        } else {
                            $('#couponCalField').html(
                                `
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">BDT ${data.subtotal}</span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Coupon</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">${data.coupon_name} <a type="submit" onclick="couponRemove()" class="pointer"><i class="fa-solid fa-trash"></i></a></span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Discount Amoount</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">BDT ${data.discount_amount}</span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">
                                            <strong>Grand Total</strong>
                                        </span>
                                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right">
                                            <span class="money">BDT ${data.total_amount}</span>
                                        </span>
                                    </div>
                                `
                            )
                        }

                    }
                })
            }

            couponCalculation();
            // Start CouponCalculation Method   
        </script>

        <!--  ////////////// End Apply Coupon ////////////// -->

        <script type="text/javascript">
            // Coupon Remove Start 
            function couponRemove() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/coupon-remove",

                    success: function(data) {
                        couponCalculation();
                        $('#couponField').show();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
            // Coupon Remove End 
        </script>

    </div>
</body>

</html>
<!DOCTYPE html>
<html class="no-js" lang="en">

@php
    $seo = App\Models\Seo::find(1);
@endphp

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="title" content="{{ $seo->meta_title }}" />
    <meta name="author" content="{{ $seo->meta_author }}" />
    <meta name="keywords" content="{{ $seo->meta_keyword }}" />
    <meta name="description" content="{{ $seo->meta_description }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/assets/images/favicon.png" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins.css">

    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <script src="https://js.stripe.com/v3/"></script>
</head>



<body class="template-index belle template-index-belle">

    {{-- <div id="pre-loader">
        <img src="{{ asset('frontend') }}/assets/images/loader.gif" alt="Loading..." />
    </div> --}}


    <div class="pageWrapper">

        <!--Search Form Drawer-->
        <div class="search">
            <div class="search__form">
                <form class="search-bar__form" action="{{ route('product.search') }}" method="post">
                    @csrf
                    <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                    <input class="search__input" type="search" aria-label="Search" autocomplete="off" onfocus="search_result_show()" onblur="search_result_hide()" name="search"
                    id="search" placeholder="Search for items...">
                    <div id="searchProducts"></div>
                </form>
                {{-- <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button> --}}
            </div>
        </div>
        <!--End Search Form Drawer-->


        <!--Header & Mobile Menu-->
        @include('frontend.body.header')
        <!--End Header & Mobile Menu-->


        <!--Body Content-->
        <div id="page-content">
            @yield('main')
        </div>
        <!--End Body Content-->


        <!--Footer-->
        @include('frontend.body.footer')
        <!--End Footer-->


        <!--Scoll Top-->
        <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
        <!--End Scoll Top-->


        <!--Quick View popup-->
        @include('frontend.body.quickview')
        <!--End Quick View popup-->


        <!-- Age Verification Popup -->
        @include('frontend.body.age_verification')
        <!-- End Age Verification Popup -->


        <!-- Including Jquery -->
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.cookie.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/wow.min.js"></script>

        <!-- Including Javascript -->
        <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/lazysizes.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/main.js"></script>

        <!--For Newsletter Popup-->
        <script>
            jQuery(document).ready(function() {
                jQuery('.closepopup').on('click', function() {
                    jQuery('#popup-container').fadeOut();
                    jQuery('#modalOverly').fadeOut();
                });

                var visits = jQuery.cookie('visits') || 0;
                visits++;
                jQuery.cookie('visits', visits, {
                    expires: 1,
                    path: '/'
                });
                console.debug(jQuery.cookie('visits'));
                if (jQuery.cookie('visits') > 1) {
                    jQuery('#modalOverly').hide();
                    jQuery('#popup-container').hide();
                } else {
                    var pageHeight = jQuery(document).height();
                    jQuery('<div id="modalOverly"></div>').insertBefore('body');
                    jQuery('#modalOverly').css("height", pageHeight);
                    jQuery('#popup-container').show();
                }
                if (jQuery.cookie('noShowWelcome')) {
                    jQuery('#popup-container').hide();
                    jQuery('#active-popup').hide();
                }
            });

            jQuery(document).mouseup(function(e) {
                var container = jQuery('#popup-container');
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.fadeOut();
                    jQuery('#modalOverly').fadeIn(200);
                    jQuery('#modalOverly').hide();
                }
            });

            /*--------------------------------------
                Promotion / Notification Cookie Bar 
              -------------------------------------- */
            if (Cookies.get('promotion') != 'true') {
                $(".notification-bar").show();
            }
            $(".close-announcement").on('click', function() {
                $(".notification-bar").slideUp();
                Cookies.set('promotion', 'true', {
                    expires: 1
                });
                return false;
            });
        </script>
        <!--End For Newsletter Popup-->

        <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch (type) {
                    case 'info':
                        toastr.info(" {{ Session::get('message') }} ");
                        break;

                    case 'success':
                        toastr.success(" {{ Session::get('message') }} ");
                        break;

                    case 'warning':
                        toastr.warning(" {{ Session::get('message') }} ");
                        break;

                    case 'error':
                        toastr.error(" {{ Session::get('message') }} ");
                        break;
                }
            @endif
        </script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            /// Start product view with Modal 
            function productView(id) {
                // alert(id)
                $.ajax({
                    type: 'GET',
                    url: '/product/view/modal/' + id,
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data)

                        $('#pname').text(data.product.product_name);
                        $('#pprice').text(data.product.selling_price);
                        $('#pcode').text(data.product.product_code);
                        $('#pcategory').text(data.product.category.category_name);
                        $('#pbrand').text(data.product.brand.brand_name);
                        $('#pimage').attr('src', '/' + data.product.product_thambnail);
                        $('#pvendor_id').text(data.product.vendor_id);
                        $('#product_id').val(id);
                        $('#qty').val(1);

                        // Product Price 
                        if (data.product.discount_price == null) {
                            $('#pprice').text('');
                            $('#oldprice').text('');
                            $('#pprice').text(data.product.selling_price);
                        } else {
                            $('#pprice').text(data.product.discount_price);
                            $('#oldprice').text(data.product.selling_price);
                        } // end else


                        /// Start Stock Option
                        if (data.product.product_qty > 0) {
                            $('#aviable').text('');
                            $('#stockout').text('');
                            $('#aviable').text('aviable');
                        } else {
                            $('#aviable').text('');
                            $('#stockout').text('');
                            $('#stockout').text('stockout');
                        }
                        ///End Start Stock Option

                        ///Size 
                        $('select[name="size"]').empty();
                        $.each(data.size, function(key, value) {
                            $('select[name="size"]').append('<option value="' + value + ' ">' + value +
                                '  </option')
                            if (data.size == "") {
                                $('#sizeArea').hide();
                            } else {
                                $('#sizeArea').show();
                            }
                        }) // end size

                        ///Color 
                        $('select[name="color"]').empty();
                        $.each(data.color, function(key, value) {
                            $('select[name="color"]').append('<option value="' + value + ' ">' + value +
                                '  </option')
                            if (data.color == "") {
                                $('#colorArea').hide();
                            } else {
                                $('#colorArea').show();
                            }
                        }) // end size
                    }
                })
            }
            // End Product View With Modal 

            /// Start Add To Cart Prodcut 
            function addToCart() {
                var product_name = $('#pname').text();
                var id = $('#product_id').val();
                var vendor = $('#pvendor_id').text();
                var color = $('#color option:selected').text();
                var size = $('#size option:selected').text();
                var quantity = $('#qty').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        color: color,
                        size: size,
                        quantity: quantity,
                        product_name: product_name,
                        vendor: vendor
                    },
                    url: "/cart/data/store/" + id,
                    success: function(data) {
                        miniCart();
                        $('#closeModal').click();
                        // console.log(data)

                        // Start Message 
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })
                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }
                        // End Message  
                    }
                })
            }
            /// End Add To Cart Product 

            /// Start Details Page Add To Cart Product 
            function addToCartDetails() {

                var product_name = $('#dpname').text();
                var id = $('#dproduct_id').val();
                var vendor = $('#vproduct_id').val();
                var color = $('#dcolor option:selected').text();
                var size = $('#dsize option:selected').text();
                var quantity = $('#dqty').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        color: color,
                        size: size,
                        quantity: quantity,
                        product_name: product_name,
                        vendor: vendor
                    },
                    url: "/dcart/data/store/" + id,
                    success: function(data) {
                        miniCart();

                        // console.log(data)

                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  
                    }
                })

            }

            /// Eend Details Page Add To Cart Product 
        </script>

        <script type="text/javascript">
            function miniCart() {
                $.ajax({
                    type: 'GET',
                    url: '/product/mini/cart',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)

                        $('span[id="cartSubTotal"]').text(response.cartTotal);
                        $('#cartQty').text(response.cartQty);

                        var miniCart = ""

                        $.each(response.carts, function(key, value) {
                            miniCart +=
                                `
                                <ul class="mini-products-list">

                                    <li class="item" style="font-size: 20px;">

                                        <a class="product-image" href="#">
                                            <img src="/${value.options.image}"
                                                alt="" title="" />
                                        </a>

                                        <div class="product-details">
                                            <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="remove">
                                                <i class="anm anm-times-l" aria-hidden="true"></i>
                                            </a>
                                            <a class="pName" href="cart.html" style="font-size: 15px;font-weight: 600;">${value.name}</a>
                                            <div class="priceRow" style="font-size: 15px;">
                                                <div class="product-price">
                                                    <span class="money">${value.qty}</span> x <span class="money">${value.price}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li> 

                                </ul> 
                                <hr><br>
                            `
                        });

                        $('#miniCart').html(miniCart);

                    }

                })
            }
            miniCart();


            /// Mini Cart Remove Start 
            function miniCartRemove(rowId) {
                $.ajax({
                    type: 'GET',
                    url: '/minicart/product/remove/' + rowId,
                    dataType: 'json',
                    success: function(data) {
                        miniCart();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  

                    }



                })
            }



            /// Mini Cart Remove End 
        </script>

        <!--  /// Start Wishlist Add -->
        <script type="text/javascript">
            function addToWishList(product_id) {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/add-to-wishlist/" + product_id,

                    success: function(data) {
                        wishlist();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
        </script>
        <!--  /// End Wishlist Add -->



        <!--  /// Start Load Wishlist Data -->
        <script type="text/javascript">
            function wishlist() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/get-wishlist-product/",

                    success: function(response) {

                        $('#wishQty').text(response.wishQty);

                        var rows = ""
                        $.each(response.wishlist, function(key, value) {

                            rows += `<tr class="pt-30">
                        <td class="custome-checkbox pl-30">
                            
                        </td>
                        <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thambnail}" alt="#" /></td>
                        <td class="product-des product-name">
                            <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.product_name} </a></h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                        </td>
                        <td class="price" data-title="Price">
                        ${value.product.discount_price == null
                        ? `<h3 class="text-brand">$${value.product.selling_price}</h3>`
                        :`<h3 class="text-brand">$${value.product.discount_price}</h3>`

                        }
                            
                        </td>
                        <td class="text-center detail-info" data-title="Stock">
                            ${value.product.product_qty > 0 
                                ? `<span class="stock-status in-stock mb-0"> In Stock </span>`

                                :`<span class="stock-status out-stock mb-0">Stock Out </span>`

                            } 
                           
                        </td>
                       
                        <td class="action text-center" data-title="Remove">
                            <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fi-rs-trash"></i></a>
                        </td>
                    </tr> `

                        });

                        $('#wishlist').html(rows);

                    }
                })
            }

            wishlist();

            // / End Load Wishlist Data -->

            // Wishlist Remove Start 

            function wishlistRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/wishlist-remove/" + id,

                    success: function(data) {
                        wishlist();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }


            // Wishlist Remove End
        </script>




        <!--  /// Start Compare Add -->
        <script type="text/javascript">
            function addToCompare(product_id) {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/add-to-compare/" + product_id,

                    success: function(data) {

                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
        </script>
        <!--  /// End Compare Add -->


        <!--  /// Start Load Compare Data -->
        <script type="text/javascript">
            function compare() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/get-compare-product/",

                    success: function(response) {

                        var rows = ""
                        $.each(response, function(key, value) {

                            rows += ` <tr class="pr_image">
                                    <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
    <td class="row_img"><img src="/${value.product.product_thambnail} " style="width:300px; height:300px;"  alt="compare-img" /></td>
                                    
                                </tr>
                                <tr class="pr_title">
                                    <td class="text-muted font-sm fw-600 font-heading">Name</td>
                                    <td class="product_name">
                                        <h6><a href="shop-product-full.html" class="text-heading">${value.product.product_name} </a></h6>
                                    </td>
                                   
                                </tr>
                                <tr class="pr_price">
                                    <td class="text-muted font-sm fw-600 font-heading">Price</td>
                                    <td class="product_price">
                      ${value.product.discount_price == null
                        ? `<h4 class="price text-brand">$${value.product.selling_price}</h4>`
                        :`<h4 class="price text-brand">$${value.product.discount_price}</h4>`

                        } 
                                    </td>
                                  
                                </tr>
                                
                                <tr class="description">
                                    <td class="text-muted font-sm fw-600 font-heading">Description</td>
                                    <td class="row_text font-xs">
                                        <p class="font-sm text-muted"> ${value.product.short_descp}</p>
                                    </td>
                                    
                                </tr>
                                <tr class="pr_stock">
                                    <td class="text-muted font-sm fw-600 font-heading">Stock status</td>
                                    <td class="row_stock">
                                ${value.product.product_qty > 0 
                                ? `<span class="stock-status in-stock mb-0"> In Stock </span>`

                                :`<span class="stock-status out-stock mb-0">Stock Out </span>`

                               } 

                              </td>
                                   
                                </tr>
                                
            <tr class="pr_remove text-muted">
                <td class="text-muted font-md fw-600"></td>
                <td class="row_remove">
                    <a type="submit" class="text-muted"  id="${value.id}" onclick="compareRemove(this.id)"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                </td>
                
            </tr> `

                        });

                        $('#compare').html(rows);

                    }
                })
            }

            compare();

            // / End Load Compare Data -->

            // Compare Remove Start 

            function compareRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/compare-remove/" + id,

                    success: function(data) {
                        compare();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }


            // Compare Remove End
        </script>

        <!--  // Start Load MY Cart // -->
        <script type="text/javascript">
            function cart() {
                $.ajax({
                    type: 'GET',
                    url: '/get-cart-product',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)


                        var rows = ""

                        $.each(response.carts, function(key, value) {
                            rows +=
                                ` 
                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <td class="cart__image-wrapper cart-flex-item">
                                        <a href="#">
                                            <img class="cart__image" src="/${value.options.image}"
                                                alt="">
                                        </a>
                                    </td>
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a href="#">${value.name}</a>
                                        </div>
                                    </td>
                                    <td class="cart__price-wrapper cart-flex-item">
                                        <span class="money">BDT ${value.price}</span>
                                    </td>
                                    <td class="cart__update-wrapper cart-flex-item text-right">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                <a type="submit" class="qtyBtn minus" id="${value.rowId}" onclick="cartDecrement(this.id)" href="javascript:void(0);">
                                                    <i class="icon icon-minus"></i>
                                                </a>
                                                <input class="cart__qty-input qty" type="text" name="updates[]"
                                                    id="qty" value="${value.qty}" min="1" pattern="[0-9]*">
                                                <a  type="submit" class="qtyBtn plus" id="${value.rowId}" onclick="cartIncrement(this.id)" href="javascript:void(0);">
                                                    <i class="icon icon-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right small--hide cart-price">
                                        <div><span class="money">BDT ${value.subtotal}</span></div>
                                    </td>
                                    <td class="text-center small--hide">
                                        <a type="submit" class="btn btn--secondary cart__remove" title="Remove tem" id="${value.rowId}" onclick="cartRemove(this.id)">
                                            <i class="icon icon anm anm-times-l" style="color: #fff;"></i>
                                        </a>
                                    </td>
                                </tr>
                            `
                        });

                        $('#cartPage').html(rows);

                    }

                })
            }
            cart();

            // Cart Remove Start 
            function cartRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/cart-remove/" + id,

                    success: function(data) {
                        cart();
                        miniCart();
                        couponCalculation();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
            // Cart Remove End 

            // Cart INCREMENT 

            function cartIncrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: "/cart-increment/" + rowId,
                    dataType: 'json',
                    success: function(data) {
                        couponCalculation();
                        cart();
                        miniCart();

                    }
                });
            }


            // Cart INCREMENT End 

            // Cart Decrement Start

            function cartDecrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: "/cart-decrement/" + rowId,
                    dataType: 'json',
                    success: function(data) {
                        couponCalculation();
                        cart();
                        miniCart();

                    }
                });
            }


            // Cart Decrement End 
        </script>
        <!--  // End Load MY Cart // -->

        <!--  ////////////// Start Apply Coupon ////////////// -->
        <script type="text/javascript">
            function applyCoupon() {
                var coupon_name = $('#coupon_name').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        coupon_name: coupon_name
                    },

                    url: "/coupon-apply",

                    success: function(data) {
                        couponCalculation();

                        if (data.validity == true) {
                            $('#couponField').hide();
                        }


                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }

            // Start CouponCalculation Method   
            function couponCalculation() {
                $.ajax({
                    type: 'GET',
                    url: "/coupon-calculation",
                    dataType: 'json',
                    success: function(data) {
                        if (data.total) {
                            $('#couponCalField').html(
                                `
                                    <div class="row" style="margin-top:-30px ;">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                            <p style="color:#fff; font-size:14px;">Order Value</p>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-center" style="padding-left:0px;">
                                            <p style="color:#fff; font-size:14px; margin-left:-20px;">BDT ${data.total}</p>
                                        </div>
                                    </div>
                                `
                            )
                        } else {
                            $('#couponCalField').html(
                                `
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">BDT ${data.subtotal}</span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Coupon</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">${data.coupon_name} <a type="submit" onclick="couponRemove()" class="pointer"><i class="fa-solid fa-trash"></i></a></span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Discount Amoount</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">BDT ${data.discount_amount}</span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">
                                            <strong>Grand Total</strong>
                                        </span>
                                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right">
                                            <span class="money">BDT ${data.total_amount}</span>
                                        </span>
                                    </div>
                                `
                            )
                        }

                    }
                })
            }

            couponCalculation();
            // Start CouponCalculation Method   
        </script>

        <!--  ////////////// End Apply Coupon ////////////// -->

        <script type="text/javascript">
            // Coupon Remove Start 
            function couponRemove() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/coupon-remove",

                    success: function(data) {
                        couponCalculation();
                        $('#couponField').show();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
            // Coupon Remove End 
        </script>

    </div>
</body>

</html>
<!DOCTYPE html>
<html class="no-js" lang="en">

@php
    $seo = App\Models\Seo::find(1);
@endphp

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="title" content="{{ $seo->meta_title }}" />
    <meta name="author" content="{{ $seo->meta_author }}" />
    <meta name="keywords" content="{{ $seo->meta_keyword }}" />
    <meta name="description" content="{{ $seo->meta_description }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/assets/images/favicon.png" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins.css">

    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <script src="https://js.stripe.com/v3/"></script>
</head>



<body class="template-index belle template-index-belle">

    {{-- <div id="pre-loader">
        <img src="{{ asset('frontend') }}/assets/images/loader.gif" alt="Loading..." />
    </div> --}}


    <div class="pageWrapper">

        <!--Search Form Drawer-->
        <div class="search">
            <div class="search__form">
                <form class="search-bar__form" action="{{ route('product.search') }}" method="post">
                    @csrf
                    <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                    <input class="search__input" type="search" aria-label="Search" autocomplete="off" onfocus="search_result_show()" onblur="search_result_hide()" name="search"
                    id="search" placeholder="Search for items...">
                    <div id="searchProducts"></div>
                </form>
                {{-- <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button> --}}
            </div>
        </div>
        <!--End Search Form Drawer-->


        <!--Header & Mobile Menu-->
        @include('frontend.body.header')
        <!--End Header & Mobile Menu-->


        <!--Body Content-->
        <div id="page-content">
            @yield('main')
        </div>
        <!--End Body Content-->


        <!--Footer-->
        @include('frontend.body.footer')
        <!--End Footer-->


        <!--Scoll Top-->
        <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
        <!--End Scoll Top-->


        <!--Quick View popup-->
        @include('frontend.body.quickview')
        <!--End Quick View popup-->


        <!-- Age Verification Popup -->
        @include('frontend.body.age_verification')
        <!-- End Age Verification Popup -->


        <!-- Including Jquery -->
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.cookie.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/wow.min.js"></script>

        <!-- Including Javascript -->
        <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/lazysizes.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/main.js"></script>

        <!--For Newsletter Popup-->
        <script>
            jQuery(document).ready(function() {
                jQuery('.closepopup').on('click', function() {
                    jQuery('#popup-container').fadeOut();
                    jQuery('#modalOverly').fadeOut();
                });

                var visits = jQuery.cookie('visits') || 0;
                visits++;
                jQuery.cookie('visits', visits, {
                    expires: 1,
                    path: '/'
                });
                console.debug(jQuery.cookie('visits'));
                if (jQuery.cookie('visits') > 1) {
                    jQuery('#modalOverly').hide();
                    jQuery('#popup-container').hide();
                } else {
                    var pageHeight = jQuery(document).height();
                    jQuery('<div id="modalOverly"></div>').insertBefore('body');
                    jQuery('#modalOverly').css("height", pageHeight);
                    jQuery('#popup-container').show();
                }
                if (jQuery.cookie('noShowWelcome')) {
                    jQuery('#popup-container').hide();
                    jQuery('#active-popup').hide();
                }
            });

            jQuery(document).mouseup(function(e) {
                var container = jQuery('#popup-container');
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.fadeOut();
                    jQuery('#modalOverly').fadeIn(200);
                    jQuery('#modalOverly').hide();
                }
            });

            /*--------------------------------------
                Promotion / Notification Cookie Bar 
              -------------------------------------- */
            if (Cookies.get('promotion') != 'true') {
                $(".notification-bar").show();
            }
            $(".close-announcement").on('click', function() {
                $(".notification-bar").slideUp();
                Cookies.set('promotion', 'true', {
                    expires: 1
                });
                return false;
            });
        </script>
        <!--End For Newsletter Popup-->

        <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch (type) {
                    case 'info':
                        toastr.info(" {{ Session::get('message') }} ");
                        break;

                    case 'success':
                        toastr.success(" {{ Session::get('message') }} ");
                        break;

                    case 'warning':
                        toastr.warning(" {{ Session::get('message') }} ");
                        break;

                    case 'error':
                        toastr.error(" {{ Session::get('message') }} ");
                        break;
                }
            @endif
        </script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            /// Start product view with Modal 
            function productView(id) {
                // alert(id)
                $.ajax({
                    type: 'GET',
                    url: '/product/view/modal/' + id,
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data)

                        $('#pname').text(data.product.product_name);
                        $('#pprice').text(data.product.selling_price);
                        $('#pcode').text(data.product.product_code);
                        $('#pcategory').text(data.product.category.category_name);
                        $('#pbrand').text(data.product.brand.brand_name);
                        $('#pimage').attr('src', '/' + data.product.product_thambnail);
                        $('#pvendor_id').text(data.product.vendor_id);
                        $('#product_id').val(id);
                        $('#qty').val(1);

                        // Product Price 
                        if (data.product.discount_price == null) {
                            $('#pprice').text('');
                            $('#oldprice').text('');
                            $('#pprice').text(data.product.selling_price);
                        } else {
                            $('#pprice').text(data.product.discount_price);
                            $('#oldprice').text(data.product.selling_price);
                        } // end else


                        /// Start Stock Option
                        if (data.product.product_qty > 0) {
                            $('#aviable').text('');
                            $('#stockout').text('');
                            $('#aviable').text('aviable');
                        } else {
                            $('#aviable').text('');
                            $('#stockout').text('');
                            $('#stockout').text('stockout');
                        }
                        ///End Start Stock Option

                        ///Size 
                        $('select[name="size"]').empty();
                        $.each(data.size, function(key, value) {
                            $('select[name="size"]').append('<option value="' + value + ' ">' + value +
                                '  </option')
                            if (data.size == "") {
                                $('#sizeArea').hide();
                            } else {
                                $('#sizeArea').show();
                            }
                        }) // end size

                        ///Color 
                        $('select[name="color"]').empty();
                        $.each(data.color, function(key, value) {
                            $('select[name="color"]').append('<option value="' + value + ' ">' + value +
                                '  </option')
                            if (data.color == "") {
                                $('#colorArea').hide();
                            } else {
                                $('#colorArea').show();
                            }
                        }) // end size
                    }
                })
            }
            // End Product View With Modal 

            /// Start Add To Cart Prodcut 
            function addToCart() {
                var product_name = $('#pname').text();
                var id = $('#product_id').val();
                var vendor = $('#pvendor_id').text();
                var color = $('#color option:selected').text();
                var size = $('#size option:selected').text();
                var quantity = $('#qty').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        color: color,
                        size: size,
                        quantity: quantity,
                        product_name: product_name,
                        vendor: vendor
                    },
                    url: "/cart/data/store/" + id,
                    success: function(data) {
                        miniCart();
                        $('#closeModal').click();
                        // console.log(data)

                        // Start Message 
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })
                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }
                        // End Message  
                    }
                })
            }
            /// End Add To Cart Product 

            /// Start Details Page Add To Cart Product 
            function addToCartDetails() {

                var product_name = $('#dpname').text();
                var id = $('#dproduct_id').val();
                var vendor = $('#vproduct_id').val();
                var color = $('#dcolor option:selected').text();
                var size = $('#dsize option:selected').text();
                var quantity = $('#dqty').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        color: color,
                        size: size,
                        quantity: quantity,
                        product_name: product_name,
                        vendor: vendor
                    },
                    url: "/dcart/data/store/" + id,
                    success: function(data) {
                        miniCart();

                        // console.log(data)

                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  
                    }
                })

            }

            /// Eend Details Page Add To Cart Product 
        </script>

        <script type="text/javascript">
            function miniCart() {
                $.ajax({
                    type: 'GET',
                    url: '/product/mini/cart',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)

                        $('span[id="cartSubTotal"]').text(response.cartTotal);
                        $('#cartQty').text(response.cartQty);

                        var miniCart = ""

                        $.each(response.carts, function(key, value) {
                            miniCart +=
                                `
                                <ul class="mini-products-list">

                                    <li class="item" style="font-size: 20px;">

                                        <a class="product-image" href="#">
                                            <img src="/${value.options.image}"
                                                alt="" title="" />
                                        </a>

                                        <div class="product-details">
                                            <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="remove">
                                                <i class="anm anm-times-l" aria-hidden="true"></i>
                                            </a>
                                            <a class="pName" href="cart.html" style="font-size: 15px;font-weight: 600;">${value.name}</a>
                                            <div class="priceRow" style="font-size: 15px;">
                                                <div class="product-price">
                                                    <span class="money">${value.qty}</span> x <span class="money">${value.price}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li> 

                                </ul> 
                                <hr><br>
                            `
                        });

                        $('#miniCart').html(miniCart);

                    }

                })
            }
            miniCart();


            /// Mini Cart Remove Start 
            function miniCartRemove(rowId) {
                $.ajax({
                    type: 'GET',
                    url: '/minicart/product/remove/' + rowId,
                    dataType: 'json',
                    success: function(data) {
                        miniCart();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  

                    }



                })
            }



            /// Mini Cart Remove End 
        </script>

        <!--  /// Start Wishlist Add -->
        <script type="text/javascript">
            function addToWishList(product_id) {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/add-to-wishlist/" + product_id,

                    success: function(data) {
                        wishlist();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
        </script>
        <!--  /// End Wishlist Add -->



        <!--  /// Start Load Wishlist Data -->
        <script type="text/javascript">
            function wishlist() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/get-wishlist-product/",

                    success: function(response) {

                        $('#wishQty').text(response.wishQty);

                        var rows = ""
                        $.each(response.wishlist, function(key, value) {

                            rows += `<tr class="pt-30">
                        <td class="custome-checkbox pl-30">
                            
                        </td>
                        <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thambnail}" alt="#" /></td>
                        <td class="product-des product-name">
                            <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.product_name} </a></h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                        </td>
                        <td class="price" data-title="Price">
                        ${value.product.discount_price == null
                        ? `<h3 class="text-brand">$${value.product.selling_price}</h3>`
                        :`<h3 class="text-brand">$${value.product.discount_price}</h3>`

                        }
                            
                        </td>
                        <td class="text-center detail-info" data-title="Stock">
                            ${value.product.product_qty > 0 
                                ? `<span class="stock-status in-stock mb-0"> In Stock </span>`

                                :`<span class="stock-status out-stock mb-0">Stock Out </span>`

                            } 
                           
                        </td>
                       
                        <td class="action text-center" data-title="Remove">
                            <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fi-rs-trash"></i></a>
                        </td>
                    </tr> `

                        });

                        $('#wishlist').html(rows);

                    }
                })
            }

            wishlist();

            // / End Load Wishlist Data -->

            // Wishlist Remove Start 

            function wishlistRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/wishlist-remove/" + id,

                    success: function(data) {
                        wishlist();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }


            // Wishlist Remove End
        </script>




        <!--  /// Start Compare Add -->
        <script type="text/javascript">
            function addToCompare(product_id) {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/add-to-compare/" + product_id,

                    success: function(data) {

                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
        </script>
        <!--  /// End Compare Add -->


        <!--  /// Start Load Compare Data -->
        <script type="text/javascript">
            function compare() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/get-compare-product/",

                    success: function(response) {

                        var rows = ""
                        $.each(response, function(key, value) {

                            rows += ` <tr class="pr_image">
                                    <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
    <td class="row_img"><img src="/${value.product.product_thambnail} " style="width:300px; height:300px;"  alt="compare-img" /></td>
                                    
                                </tr>
                                <tr class="pr_title">
                                    <td class="text-muted font-sm fw-600 font-heading">Name</td>
                                    <td class="product_name">
                                        <h6><a href="shop-product-full.html" class="text-heading">${value.product.product_name} </a></h6>
                                    </td>
                                   
                                </tr>
                                <tr class="pr_price">
                                    <td class="text-muted font-sm fw-600 font-heading">Price</td>
                                    <td class="product_price">
                      ${value.product.discount_price == null
                        ? `<h4 class="price text-brand">$${value.product.selling_price}</h4>`
                        :`<h4 class="price text-brand">$${value.product.discount_price}</h4>`

                        } 
                                    </td>
                                  
                                </tr>
                                
                                <tr class="description">
                                    <td class="text-muted font-sm fw-600 font-heading">Description</td>
                                    <td class="row_text font-xs">
                                        <p class="font-sm text-muted"> ${value.product.short_descp}</p>
                                    </td>
                                    
                                </tr>
                                <tr class="pr_stock">
                                    <td class="text-muted font-sm fw-600 font-heading">Stock status</td>
                                    <td class="row_stock">
                                ${value.product.product_qty > 0 
                                ? `<span class="stock-status in-stock mb-0"> In Stock </span>`

                                :`<span class="stock-status out-stock mb-0">Stock Out </span>`

                               } 

                              </td>
                                   
                                </tr>
                                
            <tr class="pr_remove text-muted">
                <td class="text-muted font-md fw-600"></td>
                <td class="row_remove">
                    <a type="submit" class="text-muted"  id="${value.id}" onclick="compareRemove(this.id)"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                </td>
                
            </tr> `

                        });

                        $('#compare').html(rows);

                    }
                })
            }

            compare();

            // / End Load Compare Data -->

            // Compare Remove Start 

            function compareRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/compare-remove/" + id,

                    success: function(data) {
                        compare();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }


            // Compare Remove End
        </script>

        <!--  // Start Load MY Cart // -->
        <script type="text/javascript">
            function cart() {
                $.ajax({
                    type: 'GET',
                    url: '/get-cart-product',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)


                        var rows = ""

                        $.each(response.carts, function(key, value) {
                            rows +=
                                ` 
                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <td class="cart__image-wrapper cart-flex-item">
                                        <a href="#">
                                            <img class="cart__image" src="/${value.options.image}"
                                                alt="">
                                        </a>
                                    </td>
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a href="#">${value.name}</a>
                                        </div>
                                    </td>
                                    <td class="cart__price-wrapper cart-flex-item">
                                        <span class="money">BDT ${value.price}</span>
                                    </td>
                                    <td class="cart__update-wrapper cart-flex-item text-right">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                <a type="submit" class="qtyBtn minus" id="${value.rowId}" onclick="cartDecrement(this.id)" href="javascript:void(0);">
                                                    <i class="icon icon-minus"></i>
                                                </a>
                                                <input class="cart__qty-input qty" type="text" name="updates[]"
                                                    id="qty" value="${value.qty}" min="1" pattern="[0-9]*">
                                                <a  type="submit" class="qtyBtn plus" id="${value.rowId}" onclick="cartIncrement(this.id)" href="javascript:void(0);">
                                                    <i class="icon icon-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right small--hide cart-price">
                                        <div><span class="money">BDT ${value.subtotal}</span></div>
                                    </td>
                                    <td class="text-center small--hide">
                                        <a type="submit" class="btn btn--secondary cart__remove" title="Remove tem" id="${value.rowId}" onclick="cartRemove(this.id)">
                                            <i class="icon icon anm anm-times-l" style="color: #fff;"></i>
                                        </a>
                                    </td>
                                </tr>
                            `
                        });

                        $('#cartPage').html(rows);

                    }

                })
            }
            cart();

            // Cart Remove Start 
            function cartRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/cart-remove/" + id,

                    success: function(data) {
                        cart();
                        miniCart();
                        couponCalculation();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
            // Cart Remove End 

            // Cart INCREMENT 

            function cartIncrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: "/cart-increment/" + rowId,
                    dataType: 'json',
                    success: function(data) {
                        couponCalculation();
                        cart();
                        miniCart();

                    }
                });
            }


            // Cart INCREMENT End 

            // Cart Decrement Start

            function cartDecrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: "/cart-decrement/" + rowId,
                    dataType: 'json',
                    success: function(data) {
                        couponCalculation();
                        cart();
                        miniCart();

                    }
                });
            }


            // Cart Decrement End 
        </script>
        <!--  // End Load MY Cart // -->

        <!--  ////////////// Start Apply Coupon ////////////// -->
        <script type="text/javascript">
            function applyCoupon() {
                var coupon_name = $('#coupon_name').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        coupon_name: coupon_name
                    },

                    url: "/coupon-apply",

                    success: function(data) {
                        couponCalculation();

                        if (data.validity == true) {
                            $('#couponField').hide();
                        }


                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }

            // Start CouponCalculation Method   
            function couponCalculation() {
                $.ajax({
                    type: 'GET',
                    url: "/coupon-calculation",
                    dataType: 'json',
                    success: function(data) {
                        if (data.total) {
                            $('#couponCalField').html(
                                `
                                    <div class="row" style="margin-top:-30px ;">
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                            <p style="color:#fff; font-size:14px;">Order Value</p>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-center" style="padding-left:0px;">
                                            <p style="color:#fff; font-size:14px; margin-left:-20px;">BDT ${data.total}</p>
                                        </div>
                                    </div>
                                `
                            )
                        } else {
                            $('#couponCalField').html(
                                `
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">BDT ${data.subtotal}</span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Coupon</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">${data.coupon_name} <a type="submit" onclick="couponRemove()" class="pointer"><i class="fa-solid fa-trash"></i></a></span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Discount Amoount</span>
                                        <span class="col-12 col-sm-6 text-right">
                                            <span class="money">BDT ${data.discount_amount}</span>
                                        </span>
                                    </div>
                                    <div class="row border-bottom pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">
                                            <strong>Grand Total</strong>
                                        </span>
                                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right">
                                            <span class="money">BDT ${data.total_amount}</span>
                                        </span>
                                    </div>
                                `
                            )
                        }

                    }
                })
            }

            couponCalculation();
            // Start CouponCalculation Method   
        </script>

        <!--  ////////////// End Apply Coupon ////////////// -->

        <script type="text/javascript">
            // Coupon Remove Start 
            function couponRemove() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/coupon-remove",

                    success: function(data) {
                        couponCalculation();
                        $('#couponField').show();
                        // Start Message 

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message  


                    }
                })
            }
            // Coupon Remove End 
        </script>

    </div>
</body>

</html>

                    {{ $cat->blog_category_name }}
                @endforeach

            </a>
            <span></span> {{ $blogdetails->post_title }}
        </div>
    </div>
</div>
<div class="page-content mb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-11 col-lg-12 m-auto">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="single-page pt-50 pr-30">
                            <div class="single-header style-2">
                                <div class="row">
                                    <div class="col-xl-10 col-lg-12 m-auto">

                                        <h2 class="mb-10">{{ $blogdetails->post_title }}</h2>
                                        <div class="single-header-meta">
                                            <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                                                <a class="author-avatar" href="#">
                                                    <img class="img-circle" src="assets/imgs/blog/author-1.png"
                                                        alt="" />
                                                </a>
                                                <span class="post-by">By <a href="#">Admin</a></span>
                                                <span
                                                    class="post-on has-dot">{{ Carbon\Carbon::parse($blogdetails->created_at)->diffForHumans() }}</span>
                                                <span class="time-reading has-dot">8 mins read</span>
                                            </div>
                                            <div class="social-icons single-share">
                                                <ul class="text-grey-5 d-inline-block">
                                                    <li class="mr-5">
                                                        <a href="#"><img
                                                                src="{{ asset('frontend/assets/imgs/theme/icons/icon-bookmark.svg') }}"
                                                                alt="" /></a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <figure class="single-thumbnail">
                                <img src="{{ asset($blogdetails->post_image) }}" alt=""
                                    style="width: 500px; height: 400px;" />
                            </figure>
                            <div class="single-content">
                                <div class="row">
                                    <div class="col-xl-10 col-lg-12 m-auto">
                                        <p class="single-excerpt"> {!! $blogdetails->post_long_description !!} </p>
                                        <!--Entry bottom-->
                                        <div class="entry-bottom mt-50 mb-30">
                                            <div class="tags w-50 w-sm-100">
                                                <a href="blog-category-big.html" rel="tag"
                                                    class="hover-up btn btn-sm btn-rounded mr-10">deer</a>
                                                <a href="blog-category-big.html" rel="tag"
                                                    class="hover-up btn btn-sm btn-rounded mr-10">nature</a>
                                                <a href="blog-category-big.html" rel="tag"
                                                    class="hover-up btn btn-sm btn-rounded mr-10">conserve</a>
                                            </div>
                                            <div class="social-icons single-share">
                                                <ul class="text-grey-5 d-inline-block">
                                                    <li><strong class="mr-10">Share this:</strong></li>
                                                    <li class="social-facebook">
                                                        <a href="#"><img
                                                                src="assets/imgs/theme/icons/icon-facebook.svg"
                                                                alt="" /></a>
                                                    </li>
                                                    <li class="social-twitter">
                                                        <a href="#"><img
                                                                src="assets/imgs/theme/icons/icon-twitter.svg"
                                                                alt="" /></a>
                                                    </li>
                                                    <li class="social-instagram">
                                                        <a href="#"><img
                                                                src="assets/imgs/theme/icons/icon-instagram.svg"
                                                                alt="" /></a>
                                                    </li>
                                                    <li class="social-linkedin">
                                                        <a href="#"><img
                                                                src="assets/imgs/theme/icons/icon-pinterest.svg"
                                                                alt="" /></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--Author box-->
                                        <div class="author-bio p-30 mt-50 border-radius-15 bg-white">
                                            <div class="author-image mb-30">
                                                <a href="author.html"><img src="assets/imgs/blog/author-1.png"
                                                        alt="" class="avatar" /></a>
                                                <div class="author-infor">
                                                    <h5 class="mb-5">Barbara Cartland</h5>
                                                    <p class="mb-0 text-muted font-xs">
                                                        <span class="mr-10">306 posts</span>
                                                        <span class="has-dot">Since 2012</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="author-des">
                                                <p>Hi there, I am a veteran food blogger sharing my daily all kinds of
                                                    healthy and fresh recipes. I find inspiration in nature, on the
                                                    streets and almost everywhere. Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing elit. Amet id enim, libero sit. Est donec
                                                    lobortis cursus amet, cras elementum libero</p>
                                            </div>
                                        </div>
                                        <!--Comment form-->
                                        <div class="comment-form">
                                            <h3 class="mb-15">Leave a Comment</h3>
                                            <div class="product-rate d-inline-block mb-30"></div>
                                            <div class="row">
                                                <div class="col-lg-9 col-md-12">
                                                    <form class="form-contact comment_form mb-50" action="#"
                                                        id="commentForm">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                                        placeholder="Write Comment"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="name"
                                                                        id="name" type="text"
                                                                        placeholder="Name" />
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="email"
                                                                        id="email" type="email"
                                                                        placeholder="Email" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="website"
                                                                        id="website" type="text"
                                                                        placeholder="Website" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit"
                                                                class="button button-contactForm">Post Comment</button>
                                                        </div>
                                                    </form>
                                                    <div class="comments-area">
                                                        <h3 class="mb-30">Comments</h3>
                                                        <div class="comment-list">
                                                            <div
                                                                class="single-comment justify-content-between d-flex mb-30">
                                                                <div class="user justify-content-between d-flex">
                                                                    <div class="thumb text-center">
                                                                        <img src="assets/imgs/blog/author-2.png"
                                                                            alt="" />
                                                                        <a href="#"
                                                                            class="font-heading text-brand">Sienna</a>
                                                                    </div>
                                                                    <div class="desc">
                                                                        <div
                                                                            class="d-flex justify-content-between mb-10">
                                                                            <div class="d-flex align-items-center">
                                                                                <span
                                                                                    class="font-xs text-muted">December
                                                                                    4, 2022 at 3:12 pm </span> </div>
                                                                            <div class="product-rate d-inline-block">
                                                                                <div class="product-rating"
                                                                                    style="width: 80%"></div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="mb-10">Lorem ipsum dolor sit amet,
                                                                            consectetur adipisicing elit. Delectus,
                                                                            suscipit exercitationem accusantium
                                                                            obcaecati quos voluptate nesciunt facilis
                                                                            itaque modi commodi dignissimos sequi
                                                                            repudiandae minus ab deleniti totam officia
                                                                            id incidunt? <a href="#"
                                                                                class="reply">Reply</a></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                                <div class="user justify-content-between d-flex">
                                                                    <div class="thumb text-center">
                                                                        <img src="assets/imgs/blog/author-3.png"
                                                                            alt="" />
                                                                        <a href="#"
                                                                            class="font-heading text-brand">Brenna</a>
                                                                    </div>
                                                                    <div class="desc">
                                                                        <div
                                                                            class="d-flex justify-content-between mb-10">
                                                                            <div class="d-flex align-items-cer"> </div>
                                                                            <div class="product-rate d-inline-block">
                                                                                <div class="product-rating"
                                                                                    style="width: 80%"></div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="mb-10">Lorem ipsum dolor sit amet,
                                                                            consectetur adipisicing elit. Delectus,
                                                                            suscipit exercitationem accusantium
                                                                            obcaecati quos voluptate nesciunt facilis
                                                                            itaque modi commodi dignissimos sequi
                                                                            repudiandae minus ab deleniti totam officia
                                                                            id incidunt? <a href="#"
                                                                                class="reply">Reply</a></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="single-comment justify-content-between d-flex">
                                                                <div class="user justify-content-between d-flex">
                                                                    <div class="thumb text-center">
                                                                        <img src="assets/imgs/blog/author-4.png"
                                                                            alt="" />
                                                                        <a href="#"
                                                                            class="font-heading text-brand">Gemma</a>
                                                                    </div>
                                                                    <div class="desc">
                                                                        <div
                                                                            class="d-flex justify-content-between mb-10">
                                                                            <div class="d-flex align-items-center">
                                                                                <span
                                                                                    class="font-xs text-muted">December
                                                                                    4, 2022 at 3:12 pm </span> </div>
                                                                            <div class="product-rate d-inline-block">
                                                                                <div class="product-rating"
                                                                                    style="width: 80%"></div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="mb-10">Lorem ipsum dolor sit amet,
                                                                            consectetur adipisicing elit. Delectus,
                                                                            suscipit exercitationem accusantium
                                                                            obcaecati quos voluptate nesciunt facilis
                                                                            itaque modi commodi dignissimos sequi
                                                                            repudiandae minus ab deleniti totam officia
                                                                            id incidunt? <a href="#"
                                                                                class="reply">Reply</a></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar pt-50">
                        <div class="widget-area">
                            <div class="sidebar-widget-2 widget_search mb-50">
                                <div class="search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Search…" />
                                        <button type="submit"><i class="fi-rs-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-widget widget-category-2 mb-50">
                                <h5 class="section-title style-1 mb-30">Category</h5>
                                <ul>
                                    @foreach ($blogcategoryies as $category)
                                        @php
                                            $posts = App\Models\BlogPost::where('category_id', $category->id)->get();
                                        @endphp

                                        <li>
                                            <a
                                                href="{{ url('post/category/' . $category->id . '/' . $category->blog_category_slug) }}">
                                                <img src="{{ asset('frontend/assets/imgs/theme/icons/category-1.svg') }}"
                                                    alt="" />{{ $category->blog_category_name }}</a><span
                                                class="count">{{ count($posts) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Product sidebar Widget -->

                            <div class="banner-img wow fadeIn mb-50 animated d-lg-block d-none">
                                <img src="{{ asset('frontend/assets/imgs/banner/banner-11.png') }}" alt="" />
                                <div class="banner-text">
                                    <span>Oganic</span>
                                    <h4>
                                        Save 17% <br />
                                        on <span class="text-brand">Oganic</span><br />
                                        Juice
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
