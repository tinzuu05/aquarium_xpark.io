@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="css/booking.css">
@endsection

@section('name')
    <div id="app">
        <section>
            <h1>購買票券</h1>
            <div class="container d-flex ">
                <div class="content">

                    <h2>一行程特色一</h2>
                    <div class="content_text">
                        由日本橫濱八景島首度來台開設分館 Xpark，
                        主打新都會型水族館，驅使最先端的科技，
                        營造出環境的溫度、濕度、氣味、聲音，
                        帶您到地球上每個不可思議的角落，
                        受到啟發、感受療癒、洗滌心靈。
                        在KKday訂購電子票即可掃QRcode入園，
                        不必排隊購票・輕鬆入場！
                        <br>
                        <br>
                        <span><i class="fas fa-comment-dollar " style="padding-right: 10px;"></i>6天前可免費取消</span>
                        <br>
                        <br>
                        <span><i class="fas fa-mobile-alt" style="padding-right: 15px;"></i>現場請出示 QR code</span>
                    </div>
                </div>
                <!-- 左邊行程特色 介紹 -->
                <!-- <input type="button" value="Reload Page" onClick="document.location.reload(true)"> 重新整理 -->
                <div class="pfmitem">
                    <div class="pfmcontainer">
                        <h3 class="tab">
                            <strong>選擇日期、場次</strong>
                            <i class="fas fa-chevron-down" style="padding-right: 10px;"></i>&#160;</h3>
                        <div class="tabpanel" style="display: none;">

                            <h4 class="padding-left">請選擇使用日期</h4>

                            <hr>
                            <form action="/action_page.php">
                                <label for="birthday" style="margin-left: 15px;"></label>
                                <input type="date" id="birthday" name="birthday" >

                            </form>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link  disabled" id="home-tab" data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">10:00</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" id="profile-tab" data-toggle="tab" href="#profile"
                                        role="tab" aria-controls="profile" aria-selected="false">12:00</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" id="contact-tab" data-toggle="tab" href="#contact"
                                        role="tab" aria-controls="contact" aria-selected="false">14:00</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" id="contact-tab" data-toggle="tab" href="#contact"
                                        role="tab" aria-controls="contact" aria-selected="false">16:00</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false"><i
                                            class="fas fa-exclamation-triangle"
                                            style="color: rgb(251, 195, 13);"></i>18:00</a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false">20:00</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <!-- 18:00 的內容 -->
                                </div>
                            </div>

                            <div>
                                <h6>選擇數量</h6>
                                <div class="ticket">
                                    <form action=""></form>
                                    <div class="men" v-for="(item,index) in sub_total_price">
                                        <h4>@{{ball[index]}}<span class="age">(@{{age[index]}})</span></h4>
                                        <div class="count">
                                            <span>TWD @{{price[index]}}/每人</span>
                                            <button type="button" class="cart_btn" @click='dec(index)'>-</button>
                                            <input v-model="item.price" size="1" class="inp"
                                                style="text-align: center; margin:0 5px 5px 0;" min="1" step="1"
                                                type="number">
                                            <button type="button" class="cart_btn" @click='inc(index)'
                                                style="padding-left:5px">+</button>
                                            <span>張</span>
                                        </div>
                                    </div>

                                    <div class="total text-right">
                                        <span>總共</span>
                                        @{{sum()}}
                                        <span>元</span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 確認付款明細 start-->
                    <div class="pfmitem">
                        <div class="pfmcontainer">
                            <h3 class="tab">
                                <strong>確認付款明細</strong>
                                <i class="fas fa-chevron-down" style="padding-right: 10px;"></i></h3>
                            <div class="tabpanel" style="display: none;">
                                <h4 class="padding-left">訂購人資料</h4>
                                <hr>
                                <form id="register_form" role="form" data-toggle="validator">
                                    <div class="form-group">
                                        <input id="inputName" name="Name" type="text" class="form-control"
                                            placeholder="姓名" required="required" >
                                        <div class="help-block with-errors" style="color: red;"></div>
                                    </div>
                                    <div class="form-group">
                                        <input id="inputEmail" name="Email" class="form-control" type="email"
                                            placeholder="電子郵件地址" data-error="郵件格式錯誤" required="required">
                                        <div class="help-block with-errors" style="color: red;"></div>
                                    </div>
                                    <div class="form-group">
                                        <input id="inputTel" name="Number" class="form-control" type="number"
                                            placeholder="手機號碼" data-error="輸入格式錯誤" required="required">
                                        <div class="help-block with-errors" style="color: red;"></div>
                                    </div>
                                    <input type="submit" value="繼續" class="btn btn-danger btn-block w-25"
                                        style="background: #26bec9" />
                                </form>
                            </div>
                        </div>
                        <!-- 確認付款明細 end-->
                        <!--  填寫付款資料 start-->
                        <div class="pfmitem">
                            <div class="pfmcontainer ">
                                <h3 class="tab">
                                    <strong style="padding-right: 10px;">填寫付款資料</strong><i
                                        class="fas fa-chevron-down"></i>
                                </h3>
                                <div class="tabpanel" style="display: none;">
                                    <form action="">
                                        <div class="form-group">
                                            <h4 class="padding-left">請選擇付款方式</h4>
                                            <hr>
                                            <div class="custom-control custom-radio" style="padding-left: 46px">
                                                <input type="radio" class="custom-control-input "
                                                    id="defaultGroupExample1" name="groupOfDefaultRadios">
                                                <label class="custom-control-label"
                                                    for="defaultGroupExample1">信用卡</label>
                                                <div class="credit">
                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Visa.svg/1200px-Visa.svg.png"
                                                        style="width: 10%; height: 35px;" alt="">
                                                    <img src="https://www.mastercard.com.tw/content/dam/mccom/global/logos/logo-mastercard-mobile.svg"
                                                        style="width: 10%; height: 35px;" alt="">
                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/JCB_logo.svg/1200px-JCB_logo.svg.png"
                                                        style="width: 10%; height: 35px;" alt="">
                                                </div>
                                            </div>
                                    </form>
                                    <hr>
                                    <div class="ccn " style="padding-left: 20px">
                                        <form action="" id="form1">
                                            <div class="form-group">
                                                <label for="ccn">信用卡號碼</label>
                                                <br>
                                                <p>
                                                    <input id="ccn" type="tel" inputmode="numeric"
                                                        pattern="[0-9\s]{13,19}" autocomplete="cc-number" minlength="16"
                                                        maxlength="16" placeholder="xxxx xxxx xxxx xxxx"
                                                        data-error="輸入格式錯誤" required="required">
                                                </p>
                                            </div>
                                            <p>
                                                <label for="ccn">有效期限</label>
                                                <br>
                                                <input id="ccn" type="month" inputmode="numeric"
                                                    pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="14"
                                                    placeholder="xxxx xxxx xxxx xxxx" required="required">
                                            </p>
                                            <p>
                                                <label for="ccn">CVC/CVV(4碼)</label>
                                                <br>
                                                <input name="credit-cvc" class="cc-cvc" type="tel" pattern="\d*"
                                                    maxlength="4" placeholder="CVC" id="cvc">
                                            </p>
                                            <button type="submit" name="button" id="demo2" value="送出" />送出

                                    </div>
                                    </form>
                                    <div class="help-block with-errors" style="color: red;"></div>
                                </div>
                            </div>
                            <!-- 填寫付款資料 end -->
                            <!-- 確認付款明細 -->
                            <div class="pfmitem">
                                <div class="pfmcontainer">
                                    <h3 class="tab">
                                        <strong style="padding-right: 10px;">付款明細</strong>
                                        <i class="fas fa-chevron-down"></i></h3>
                                    <div class="tabpanel" style="display: none;">
                                        <div class="pay">
                                            <div class="pay_img">
                                                <img src="https://www.xpark.com.tw/upload/news63_cover_20201015155524.jpg"
                                                    alt="">
                                            </div>
                                            <div class="pay_content">
                                                <div class="pay_title">
                                                    <span>桃園青埔|Xpark都會型水生公園門票</span>
                                                    <br>
                                                    <span>Xpark 入園門票</span>
                                                    <br>
                                                    <div class="pay_icon">
                                                        <span><i class="far fa-calendar-alt"
                                                                style="padding-right: 10px;"></i>2020-10-18</span>
                                                        <span><i class="far fa-clock"
                                                                style="padding-right: 5px;"></i></i>18:00</span>
                                                    </div>

                                                    <ul>
                                                        <li v-for="(item,index) in sub_total_price"
                                                            v-if="item.price!=0">
                                                            <div>@{{ball[index]}} x @{{item.price}} <span>張</span>
                                                            </div>
                                                        </li>
                                                        <hr>

                                                    </ul>
                                                    <br>
                                                    <div class="allTotal">
                                                        <br>

                                                        <p>@{{sum()}}<span>元</span></p>

                                                    </div>
                                                    <hr>
                                                    <div class="pay_btn"> <button type="submit" id="demo1"
                                                            class="payMoney">付款</button>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 確認付款明細 -->
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>
    <br>
</div>
<div id="logo"><img src="image/xpark_logo.png" alt=""></div>

<div id="nav">
    <i class="bars fas fa-bars"></i>
    <ul class="phoneVersion">
        <li><a href="#"><img class="bubble" src="svg/bubble.svg" alt="">最新消息</a></li>
        <li><a href="#"><img class="bubble" src="svg/bubble.svg" alt="">館內介紹</a></li>
        <li><a href="#"><img class="bubble" src="svg/bubble.svg" alt="">購買票券 </a></li>
        <li><a href="#"><img class="bubble" src="svg/bubble.svg" alt="">紀念品店</a></li>
        <li><a href="#"><img class="bubble" src="svg/bubble.svg" alt="">常見問題</a></li>
        <li><a href="#">CH/</a><a href="">EN</a></li>
        <li>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </li>
    </ul>
</div>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>

<!-- bts 表單驗證外掛 cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<!--執行 Validator-->

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script> -->
<!-- vue.js cdn -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- sweetAlert -->
<script>

    console.log($('.tabpanel'));
    // rwd menubar
    $(document).ready(function () {
        $("#myForm").validator();

        $('.tabpanel').hide();

        $(".icon").on("click", function () {
            $(this).next("nav").toggleClass("active");
        })

        $(".tab").on("click", function () {
            // $(this).find(".fas").toggleClass("fa-caret-right");
            // $(this).find(".fas").toggleClass("fa-caret-down");
            $('.tabpanel').hide();
            $(this).next('.tabpanel').slideToggle("slow");




        });
    })

    // 填寫信用卡資料
    $(document).ready(function () {
        $('#button').click(function () {
            if ($("#ccn").val() == "") {
                alert("你尚未填信用卡資料");
                eval("document.form1['ccn'].focus()");
            } else if ($("#cvc").val() == "") {
                alert("你尚未填寫CVC/CVV");
                eval("document.form1['cvc'].focus()");
            } else {
                document.form1.submit();
            }
        })
    });


    // vue start
    var vm = new Vue({
        el: '#app',
        data: {
            ball: ['成人', '兒童', '長者', '學生 '],
            age: ['18-60', '6-8', '60-80', '-'],
            price: [550, 250, 250, 400],
            sub_total_price: [{ price: 0 }, { price: 0 }, { price: 0 }, { price: 0 }],
            Total: 0
        },
        methods: {
            inc(index) {
                this.sub_total_price[index].price = this.sub_total_price[index].price + 1;
            },
            dec(index) {
                this.sub_total_price[index].price = this.sub_total_price[index].price - 1;
            },
            sum() {
                var sum = 0
                this.sub_total_price.forEach((sub_total_price, index) => {
                    sum = sum + sub_total_price.price * this.price[index];
                });
                return sum
                // return this.Total * 550;
            }
        }
    })


    document.getElementById("demo1").addEventListener("click", function () {
        swal("付款完成!", "You clicked the button!", "success");
    });




    // sweetAlert

</script>

<script>
    // phone version navbar
    var bars = document.querySelector(".bars")
    var menu = document.querySelector(".phoneVersion")

    bars.onclick = function () {
        console.log(123)
        bars.classList.toggle("fa-times")
        menu.classList.toggle("active")
    }
</script>
@endsection
