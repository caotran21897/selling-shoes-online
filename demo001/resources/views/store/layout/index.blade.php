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


    {{-- boxchat --}}
    <link rel="stylesheet" href="asset/css/boxchat.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
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
    <style>
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            left: 7%;
            
        }

        .sticky + .content {
        padding-top: 60px;
        
        }

        #navbar {
        /* overflow: hidden; */
        background-color: #333;
        z-index: 1;
        }
        #change-item-cart table tbody tr td{
            width: 70%;
        }
            
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    @include('store.layout.header')
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        @yield('link')

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                {{-- @yield('content') --}}
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                            @yield('content')
                           
                        </div>
                    </div>
                    </div>
                </div>
        
    </section>   
    <div style="position:fixed; bottom:-10% !important; right:10px; width:50%; z-index:1; height:100%;display:none "  id="chatboxcao" class="col-md-12">
           

            <section class="msger">
                <header class="msger-header">
                  <div class="msger-header-title">
                    <i class="fas fa-comment-alt"></i> Chat Box
                  </div>
                  <div class="msger-header-options">
                    <span><a class="btn btn-danger" onclick="closeForm()" href="javascript:">X</a></i></span>
                  </div>
                </header>
            
                <main class="msger-chat">
                  <div class="msg left-msg">
                    <div
                    class="msg-img"
                    style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"
                    ></div>
            
                    <div class="msg-bubble">
                      <div class="msg-info">
                        <div class="msg-info-name">BOT</div>
                        <div class="msg-info-time"><?php echo now(); ?></div>
                      </div>
            
                      <div class="msg-text">
                        Xin chào, Tôi có thể giúp gì cho bạn?.
                      </div>
                    </div>
                  </div>
                </main>
            
                <form class="msger-inputarea">
                  <input type="text" class="msger-input" placeholder="Nhập nội dung chat ...">
                  <button type="submit" class="msger-send-btn">Gửi</button>
                </form>
              </section>
              <script type="text/javascript">
                var socket = io.connect('http://localhost:7777');
            
                const msgerForm = get(".msger-inputarea");
                const msgerInput = get(".msger-input");
                const msgerChat = get(".msger-chat");
            
                const BOT_MSGS = [
                  "Hi, how are you?",
                  "Ohh... I can't understand what you trying to say. Sorry!",
                  "I like to play games... But I don't know how to play!",
                  "Sorry if my answers are not relevant. :))",
                  "I feel sleepy! :("
                ];
            
                // Icons made by Freepik from www.flaticon.com
                const BOT_IMG = "https://image.flaticon.com/icons/svg/327/327779.svg";
                const PERSON_IMG = "https://image.flaticon.com/icons/svg/145/145867.svg";
                const BOT_NAME = "BOT";
                const PERSON_NAME = "Khách hàng";
                
                msgerForm.addEventListener("submit", event => {
            
                  event.preventDefault();
            
                  const msgText = msgerInput.value;
                  if (!msgText) return;
                  
                  ;
                  appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
                  msgerInput.value = "";
            
            
                  // axios({
                  //   method: 'post',
                  //   url: 'http://localhost:7777/chat',
                  //   headers: { 'content-type': 'application/json' },
                  //   data: JSON.stringify({
                  //       message: msgText,
                  //     })
                  // }).then(function(response){
                  //   console.log(response)
                  // });cls
                  socket.emit('chat message', {message: msgText,
                                      })
                  
                  // botResponse();
                });
                socket.on("bot reply", function (data) {
                      const delay = 200
                      setTimeout(() => {
                        appendMessage(BOT_NAME, BOT_IMG, "left", data);
                      }, delay);
                  })
                function appendMessage(name, img, side, text) {
                  const msgHTML = `
                    <div class="msg ${side}-msg">
                      <div class="msg-img" style="background-image: url(${img})"></div>
            
                      <div class="msg-bubble">
                        <div class="msg-info">
                          <div class="msg-info-name">${name}</div>
                          <div class="msg-info-time">${formatDate(new Date())}</div>
                        </div>
            
                        <div class="msg-text">${text}</div>
                      </div>
                    </div>
                  `;
            
                  msgerChat.insertAdjacentHTML("beforeend", msgHTML);
                  msgerChat.scrollTop += 500;
                  
                }
                
                
                
                function botResponse() {
            
                  const r = random(0, BOT_MSGS.length - 1);
                  const msgText = BOT_MSGS[r];
                  const delay = msgText.split(" ").length * 100;
            
                  setTimeout(() => {
                    appendMessage(BOT_NAME, BOT_IMG, "left", msgText);
                  }, delay);
                }
            
                // Utils
                function get(selector, root = document) {
                  return root.querySelector(selector);
                }
            
                function formatDate(date) {
                  const h = "0" + date.getHours();
                  const m = "0" + date.getMinutes();
            
                  return `${h.slice(-2)}:${m.slice(-2)}`;
                }
            
                function random(min, max) {
                  return Math.floor(Math.random() * (max - min) + min);
                }
            
              </script>
            
             

                </div>
            </div>
    </div>
  <div id="popup" style="position: fixed; bottom: 10px;
            right: 10px; width:50px; height:50px;
            border-radius:50%;
            z-index: 9;">
  
  <a onclick="openForm()" href="javascript:"><img  src="upload/mess.png" alt=""></a>
  </div>
    <!-- Product Shop Section End -->

    <!-- Partner Logo Section Begin -->
    {{-- <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="asset/img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="asset/img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="asset/img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="asset/img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="asset/img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    @include('store.layout.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="asset/js/jquery-3.3.1.min.js"></script>
    <script src="asset/js/jquery-3.5.1.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/jquery-ui.min.js"></script>
    <script src="asset/js/jquery.countdown.min.js"></script>
    <script src="asset/js/jquery.nice-select.min.js"></script>
    <script src="asset/js/jquery.zoom.min.js"></script>
    <script src="asset/js/jquery.dd.min.js"></script>
    <script src="asset/js/jquery.slicknav.js"></script>
    <script src="asset/js/owl.carousel.min.js"></script>
    <script src="asset/js/main.js"></script>
    @yield('script')

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
        function addCart(id,color,size,qty){
            var conf =$('#slcl').val();
            if(conf >= qty)
            
            {
                 $.ajax({
                    url: 'add-cart/'+id+'/'+color+'/'+size+'/'+qty,
                    type: 'GET',
                }).done(function(data){
                
                    renderCart(data);
                
                    alertify.success('Đã thêm sản phẩm');
                
                    
                });
            }
            else
            {
                alertify.error('Số lượng mua vược quá số lượng có');
                brack;
            }
            
            
            // alert(id+"-"+color+"-"+size+"-"+qty +"- done")
           
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

            // location.reload();
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

     

        $('#search').on('keyup',function(){
                $value = $(this).val();
                if($value!=''){
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('search') }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('#show_search').html(data);
                    }
                });
                }
                else{
                    $('#show_search').html('');
                }
            });
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
 
    function change_color(color_id,id)
    {
        // alert(id)
        
        $.ajax({
        url:'change-color/'+color_id+'/'+id,
        type: 'GET',
        }).done(function(data)
        {
        $("#cao-change-color").empty();
        // $("#etalage").append("<h4>Hello</h4>");
        $("#cao-change-color").append(data);
        // console.log(data)
        
        $(".color_tick").css("display","none");
        $("#"+color_id).css("display","block");
        });
        
    }

    $(document).ready(function(){
        $("select#getSize").change(function(){
            var selected = $(this).children("option:selected").val();
            var id =$('#product_id').val();
            // var id = document.getElementById('sss').value;
            var color =$('#cao-get-color').val();
            // alert(id);
            $.ajax({
            url:'getquantity/'+id+'/'+color+'/'+ selected,
            type: 'GET',
            }).done(function(data)
            {
                
                // alert(data);
                $("#slcon").empty();
                $("#slcon").html(data);
            });
        });
    });

    function openForm() {
         document.getElementById("chatboxcao").style.display = "block";
    }

    function closeForm() {
        document.getElementById("chatboxcao").style.display = "none";
    }

      
    </script>



{{-- --- --}}


</body>

</html>