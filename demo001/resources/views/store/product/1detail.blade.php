@extends('store.layout.index')
@section('content')
<div class="row">
    <div class="col-md-8 col-sm-5">
        <div id="cao-change">
            <div id="cao-img" class="product-details-row1">
                <div class="product-details-row1-head">
                    <h2>Men'sFootwear</h2>
                    <p>Hookset Handcrafted Fabric Chukka</p>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 product-details-row1-col1">
                    <!----details-product-slider--->
                    <!-- Include the Etalage files -->
                        <link rel="stylesheet" href="xanh/css/etalage.css">
                        <script src="xanh/js/jquery.etalage.min.js"></script>
                    <!-- Include the Etalage files -->
                    <script>
                            jQuery(document).ready(function($){

                                $('#etalage').etalage({
                                    thumb_image_width: 300,
                                    thumb_image_height: 400,
                                    source_image_width: 900,
                                    source_image_height: 1000,
                                    show_hint: true,
                                    click_callback: function(image_anchor, instance_id){
                                        alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                                    }
                                });
                                // This is for the dropdown list example:
                                $('.dropdownlist').change(function(){
                                    etalage_show( $(this).find('option:selected').attr('class') );
                                });

                        });
                    </script>
                    <!----//details-product-slider--->
                    <div class="details-left">
                        <div class="details-left-slider" id="details-left-slider">
                            <ul id="etalage">
                            @foreach ($pro_de->product_colors->take(1) as $item)
                                    @foreach ($item->images->take(1) as $cl)
                                       <li>
                    
                                        <img class="etalage_thumb_image" src="{{ $cl->image }}" />
                                        <img class="etalage_source_image" src="{{ $cl->image }}" />
                                        </li>
                                    @endforeach
                                @endforeach
                            </ul>

                            
                            {{-- <ul id="etalage">

                                @foreach ($pro_de->product_colors->take(1) as $item)
                                    @foreach ($item->images as $cl)
                                        <li>
                                            <img class="etalage_thumb_image" src="{{ $cl->image }}" />
                                            <img class="etalage_source_image" src="{{ $cl->image }}" />
                                        </li>
                                    @endforeach
                                @endforeach
                                
                            </ul> --}}
                        </div>
                    </div>
                </div>
                <div  class="col-md-6 col-sm-12 col-xs-12  product-details-row1-col2">
                    <div class="row">
                        <div class="product-rating col-md-12">
                            <a class="rate" href="#"><span> </span></a>
                            <label><a href="#">Read <b>8</b> Reviews</a></label>
                        </div>
                            
                        <div class="product-price-details col-md-12">
                            <div class="row">
                                <p class="text-right">{!! '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;' !!}<br>
                                    {{ $pro_de->product_describe}}
                                </p>
                                {{-- <a class="shipping" href="#"><span> </span>Free shipping</a> --}}
                                <div class="color-product col-md-12">
                                    <h4>color</h4>
                                    <?php $check_first_tick = 1; ?>
                                    @foreach ($pro_de->product_colors as $item)
                                        <a onclick="change_color({{ $item->color->id }},{{ $pro_de->id }})" href="javascript:">
                                            <div style="background-color:{{ $item->color->hex }} ; " class="cao-color" id="cao-color">
                                                @if ($check_first_tick == 1)
                                                    <h3 id="{{ $item->color->id }}" class="color_tick" style="color:gray !important">✔</h3>
                                                    <?php $check_first_tick = 0;?>
                                                @else
                                                    <h3 id="{{ $item->color->id }}" class="color_tick" style="color:gray !important; display:none;">✔</h3>

                                                @endif
                                            </div>
                                        </a>
                                    @endforeach
                                </div>

                                <div class="product-size-qty col-md-12">
                                    <div class="pro-size"> 
                                        <span>Size:</span>
                                        <select id="getSize">
                                            @foreach ($pro_de->product_colors->first()->product_details as $item)
                                                <option value="{{ $item->id }}">{{ $item->size_id }}</option>   
                                            @endforeach
                                        </select>
                                        
                                        <div id="qty">
                                            <span>Qty:</span>
                                            <input type="number" value='1' id="quantity" name="quantity" min="1" max="5">
                                        </div>
                                        
                                    </div> 
                                    {{-- <div class="pro-qty"> 
                                        <span>Qty:</span>
                                        <input type="number" id="quantity" name="quantity" min="1" max="5">
                                    </div>  --}}
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="product-cart-share col-md-12">
                                    <div class="add-cart-btn">
                                        <a onclick="addcart($pro_de->id)" href="javascript:"><input type="button"  value="Add to cart" /></a>
                                    </div>
                                    <ul class="product-share text-right">
                                        <h3>Share This:</h3>
                                        <ul>
                                            <li><a class="share-face" href="#"><span> </span> </a></li>
                                            <li><a class="share-twitter" href="#"><span> </span> </a></li>
                                            <li><a class="share-google" href="#"><span> </span> </a></li>
                                            <li><a class="share-rss" href="#"><span> </span> </a></li>
                                            <div class="clear"> </div>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Responsive Tabs JS -->
        <script src="xanh/js/jquery.responsiveTabs.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').responsiveTabs({
                    rotate: false,
                    startCollapsed: 'accordion',
                    collapsible: 'accordion',
                    setHash: true,
                    disabled: [3,4],
                    activate: function(e, tab) {
                        $('.info').html('Tab <strong>' + tab.id + '</strong> activated!');
                    }
                });

                $('#start-rotation').on('click', function() {
                    $('#horizontalTab').responsiveTabs('active');
                });
                $('#stop-rotation').on('click', function() {
                    $('#horizontalTab').responsiveTabs('stopRotation');
                });
                $('#start-rotation').on('click', function() {
                    $('#horizontalTab').responsiveTabs('active');
                });
                $('.select-tab').on('click', function() {
                    $('#horizontalTab').responsiveTabs('activate', $(this).val());
                });

            });
        </script>
    
    <div class="col-md-4 col-sm-7">
        <div class="row">
            <div class="col-12">
                <a href="javascript:void" onclick="document.getElementById('modal-wrapper').style.display='block'"><img src="shoes/images/1.png"></a>

            </div>
            <div class="col-12">
                <button onclick="document.getElementById('modal-wrapper').style.display='block'"><font style="font-weight: bold;">3D</font>View</button>

            </div>
            <div id="modal-wrapper" class="modal">
                <div class="center">

                            <div class="rotation">

                                <img src="shoes/images/1.png">
                                <img src="shoes/images/361/2.png">
                                <img src="shoes/images/361/3.png">
                                <img src="shoes/images/361/4.png">
                                <img src="shoes/images/361/5.png">
                                <img src="shoes/images/361/6.png">
                                <img src="shoes/images/361/7.png">
                                <img src="shoes/images/361/8.png">
                                <img src="shoes/images/361/9.png">
                                <img src="shoes/images/361/10.png">
                                <img src="shoes/images/361/11.png">
                                <img src="shoes/images/361/12.png">
                                <img src="shoes/images/361/13.png">
                                <img src="shoes/images/361/14.png">
                                <img src="shoes/images/361/15.png">
                                <img src="shoes/images/361/16.png">
                                <img src="shoes/images/361/17.png">
                                <img src="shoes/images/361/18.png">
                                <img src="shoes/images/361/19.png">
                                <img src="shoes/images/361/20.png">
                                <img src="shoes/images/361/21.png">
                                <img src="shoes/images/361/22.png">
                                <img src="shoes/images/361/23.png">
                                <img src="shoes/images/361/24.png">
                                
            
                                <!-- <img src="images/361/24.png">
                                <img src="images/361/25.png">
                                <img src="images/361/26.png">
                                <img src="images/361/27.png">
                                <img src="images/361/28.png">
                                <img src="images/361/29.png">
                                <img src="images/361/30.png">
                                <img src="images/361/31.png">
                                <img src="images/361/32.png">
                                <img src="images/361/33.png">
                                <img src="images/361/34.png">
                                <img src="images/361/35.png">
                                <img src="images/361/36.png">
                                <img src="images/361/37.png">
                                <img src="images/361/38.png">
                                <img src="images/361/39.png">
                                <img src="images/361/40.png">
                                <img src="images/361/41.png">
                                <img src="images/361/42.png">
                                <img src="images/361/43.png">
                                <img src="images/361/44.png">
                                <img src="images/361/45.png"> -->
                            </div>

   
                            <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close">&times;</span>

                    <link rel="stylesheet" href="shoes/css/style.css"/>
                    <script src="shoes/js/360deg.js"></script>

                </div>
            </div>

                    
        </div>
        
    </div>

</div>
<!-- //product-details ---->

@endsection
@section('script')

<link href="xanh/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="xanh/js/jquery.min.js"></script>
 <!-- Custom Theme files -->
<link href="xanh/css/style.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <!---- start-smoth-scrolling---->
<script type="text/javascript" src="xanh/js/move-top.js"></script>
<script type="text/javascript" src="xanh/js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){		
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
 <!---- start-smoth-scrolling---->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<!---//webfonts--->
<!----start-top-nav-script---->
<script>
    $(function() {
        var pull 		= $('#pull');
            menu 		= $('nav ul');
            menuHeight	= menu.height();
        $(pull).on('click', function(e) {
            e.preventDefault();
            menu.slideToggle();
        });
        $(window).resize(function(){
            var w = $(window).width();
            if(w > 320 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
    });
</script>
<link rel="stylesheet" href="xanh/css/etalage.css">
    <script src="xanh/js/jquery.etalage.min.js"></script>
<!-- Include the Etalage files -->
<script>
        jQuery(document).ready(function($){

            $('#etalage').etalage({
                thumb_image_width: 300,
                thumb_image_height: 400,
                source_image_width: 900,
                source_image_height: 1000,
                show_hint: true,
                click_callback: function(image_anchor, instance_id){
                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                }
            });
            // This is for the dropdown list example:
            $('.dropdownlist').change(function(){
                etalage_show( $(this).find('option:selected').attr('class') );
            });

    });
</script>

@endsection