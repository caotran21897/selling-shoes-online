<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>
    <base href="{{ asset('') }}">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="asset/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="asset/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="asset/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="list-cart">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Delete</th>
									<th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Session::has("Cart") != null)
                                    @foreach (Session::get("Cart")->products as $item)
                                        <tr>
                                            <td class="cart-pic first-row"><img width="100" src="{{ $item['productInfo']->images->first()->image }}" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5>{{ $item['productInfo']->product_name }}</h5>
                                            </td>
                                            <td class="p-price first-row">{{ number_format($item['productInfo']->prices->last()->price) }}₫</td>
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input id="quantity-item-{{ $item['productInfo']->id }}" type="text" value="{{ $item['quantity'] }}">
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total-price first-row">{{ number_format($item['price']) }}₫</td>
                                            <td class="close-td first-row"><i onclick="deleteListItemCart({{ $item['productInfo']->id }})" class="ti-close" ></i></td>
                                            <td class="close-td first-row"><i onclick="saveListItemCart({{ $item['productInfo']->id }})"  class="ti-save"></i></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                @if (Session::has("Cart") != null)
                                <ul>
                                    <li class="subtotal">Subtotal <span>$0</span></li>
                                    <li class="cart-total">Total <span>{{ number_format(Session::get('Cart')->totalprice) }}₫</span></li>
                                </ul>
                                <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->	

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="asset/js/jquery-3.3.1.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/jquery-ui.min.js"></script>
    <script src="asset/js/jquery.countdown.min.js"></script>
    <script src="asset/js/jquery.nice-select.min.js"></script>
    <script src="asset/js/jquery.zoom.min.js"></script>
    <script src="asset/js/jquery.dd.min.js"></script>
    <script src="asset/js/jquery.slicknav.js"></script>
    <script src="asset/js/owl.carousel.min.js"></script>
    <script src="asset/js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <script>
        function renderCart(data)
        {
            $("#change-item-cart").empty();
            $("#change-item-cart").html(data);
            $("#total-quantity-show").text($("#total-quantity-Cart").val());
        }
        function addCart(id){
            $.ajax({
                url: 'add-cart/'+id,
                type: 'GET',
            }).done(function(data){
                // console.log(data);
                renderCart(data);
                // $("#change-item-cart").empty();
                // $("#change-item-cart").html(data);
                alertify.success('Đã thêm sản phẩm');
            });
        }
        $("#change-item-cart").on("click",".si-close i",function(){
            // console.log( $(this).data("id"));
            $.ajax({
                url: 'delete-item-cart/'+ $(this).data("id"),
                type: 'GET',
            }).done(function(data){
                // console.log(data);
                renderCart(data);
                alertify.success('Đã xóa sản phẩm');
                
            });
        });


        function renderListCart(data)
        {
            $("#list-cart").empty();
            $("#list-cart").html(data);
            var proQty = $('.pro-qty');
            proQty.prepend('<span class="dec qtybtn">-</span>');
            proQty.append('<span class="inc qtybtn">+</span>');
            proQty.on('click', '.qtybtn', function () {
                var $button = $(this);
                var oldValue = $button.parent().find('input').val();
                if ($button.hasClass('inc')) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 0) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                    }
                }
                $button.parent().find('input').val(newVal);
            });
        }
        function deleteListItemCart(id)
        {
            // alert(id);
            $.ajax({
                url: 'delete-item-list-cart/'+id,
                type: 'GET',
            }).done(function(data){
                // console.log(data);
                renderListCart(data);
                alertify.success('Đã xóa sản phẩm');
                
            });
        }
        function saveListItemCart(id)
        {
          
           
            $.ajax({
                url:'save-item-list-cart/'+id+'/'+ $("#quantity-item-"+id).val(),
                type: 'GET',
            }).done(function(data){
                // console.log(data);
                renderListCart(data);
                alertify.success('saved');
                
            });
             
        }

        window.onscroll = function() {myFunction()};

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
        }


      
    </script>
</body>

</html>