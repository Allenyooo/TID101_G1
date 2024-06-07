<script>

</script>


<template>
    <div class="checkOut_body">
        <div class="checkOut_wrapper">
            <div class="checkOut_confirm_order">
                <h2>確認訂單</h2>
                <div class="checkOut_order">
                    <div class="checkOut_left_zone">
                        <div class="checkOut_purchase_title">
                            <h3>購買明細</h3>
                            <h5>共 3 件</h5>
                        </div>
                        <div class="checkOut_purchase_list">
                            <ul class="checkOut_purchase_item">
                                <li class="checkOut_purchase_item1"></li>
                                <li class="checkOut_purchase_item2"></li>
                                <li class="checkOut_purchase_item3"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="checkOut_right_zone">
                        <div class="checkOut_order_details">
                            <div class="checkOut_order_title">
                                <h3>訂單明細</h3>
                            </div>
                            <div class="checkOut_use_coupon">
                                <div class="checkOut_coupon_text">
                                    <h5>使用優惠券</h5>
                                    <p>找不到此優惠券！</p>
                                </div>
                                <form action="" id="checkOut_promoCode">
                                    <input type="text" placeholder="輸入折扣代碼" id="checkOut_enterCode">
                                    <div id="checkOut_submitCode">確認</div>
                                </form>
                                <ul class="checkOut_amount">
                                    <li class="checkOut_amount_subtotal">
                                        <h5>小計</h5>
                                        <h5>NT$900</h5>
                                    </li>
                                    <li class="checkOut_amount_discount">
                                        <h5>折扣</h5>
                                        <h5>-NT$100</h5>
                                    </li>
                                    <li class="checkOut_amount_total">
                                        <h4>總金額</h4>
                                        <h4>NT$800</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <form action="" class="checkOut_pay">
                            <h4>選擇付款方式</h4>
                            <div class="checkOut_pay_method">
                                <input type="radio" name="pay" id="checkOut_creditCard">
                                <label for="checkOut_creditCard"><span>信用卡</span></label>
                                <input type="radio" name="pay" id="checkOut_linePay">
                                <label for="checkOut_linePay"><span>LINE Pay</span></label>
                            </div>
                        </form>
                    </div>
                </div>
                <form action="" class="checkOut_nextStep">
                    <input type="submit" id="checkOut_next" value="下一步">
                </form>
                <!-- <button id="checkOut_next">下一步</button> -->
                <img src="../assets/Image/checkOut/envelope_forward.png" alt="">
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>

    @import "/src/sass/style.scss";

    .checkOut_body {
        background-color: $OffWhite;
        max-width: 100vw;
        height: 98vh;
        padding-top: 5%;
    }

    .checkOut_wrapper{
        margin: 0 auto;
        width: 80%;
        height: 100%;
        background-image: url('../assets/Image/checkOut/envelope.png');
        background-repeat: no-repeat;
        background-position: bottom;
        background-size: contain;
        position: relative;
        .checkOut_confirm_order{
            width: 85%;
            height: 95%;
            // height: auto;
            background-color: $White;
            border: 1px solid $Gold;
            margin: 0 auto;
            border-radius: 20px;
            h2{
                color: $Gold;
                margin-top: 28px;
                text-align: center;
                margin-bottom: 24px;
            }
            img{
                position: absolute;
                // position: fixed;
                // left: 50%;
                left: 0;
                bottom: 0;
                width: 100%;
                // width: 70%;
                // transform: translateX(-50%);
            }
        }
    }

    .checkOut_order{
        .checkOut_left_zone{
            display: inline-block;
            vertical-align: top;
            // border-bottom: 1px solid $Gold;
            margin-left: 7%;
            width: 50%;
            margin-bottom: 10px;
            .checkOut_purchase_title{
                border-bottom: 1px solid $Gold;
                width: 100%;
                h3{
                    display: inline-block;
                    font-size: $fontSize * 6;
                    font-weight: bold;
                    padding-bottom: 14px;
                    padding-right: 12px;
                }
                h5{
                    display: inline-block;
                    color: #999;
                }
            }
            .checkOut_purchase_list{
                padding: 28px 0;
                .checkOut_purchase_item{
                    width: 90%;
                    height: 332px;
                    overflow-y: scroll;
                    margin-left: 4px;
                    // margin-bottom: 36px;
                    padding-right: 20px;
                    li{
                        margin: 0 auto;
                        width: 90%;
                        height: 100px;
                        background-image: url(../assets/Image/checkOut//meal_ticket.png);
                        background-size: contain;
                        background-repeat: no-repeat;
                    }

                    li:not(:last-child){
                        margin-bottom: 28px;
                    }
                    
                    &::-webkit-scrollbar {
                        width: 10px;
                    }

                    &::-webkit-scrollbar-track-piece {
                        // background: #e8e8e8;
                        background: transparent;
                        border-radius: 12px;
                    }
                    
                    &::-webkit-scrollbar-thumb {
                        border-radius: 12px;
                        background-color: $DarkGray;
                    }
                    
                    &::-webkit-scrollbar-track {
                        box-shadow: none;
                    }
                }
            }
        }

        .checkOut_right_zone{
            display: inline-block;
            // border: 1px solid red;
            // margin-left: 56px;
            margin-left: 6%;
            width: 30%;
            .checkOut_order_details{
                border: 1px solid $Gold;
                border-radius: 20px;
                padding-top: 12px;
                .checkOut_order_title{
                    margin: 0 16px 20px;
                    padding-bottom: 12px;
                    border-bottom: 1px solid $Gold;
                    h3{
                        padding-left: 8px;
                        font-size: $fontSize * 6;
                        font-weight: bold;
                        line-height: 150%;
                    }
                }
                .checkOut_use_coupon{
                    margin: 20px 24px 20px;
                    font-weight: bold;
                    .checkOut_coupon_text{
                        display: flex;
                        align-items: center;
                        margin-bottom: 12px;
                        h5{
                            margin-right: 36px;
                        }
                        
                        p{
                            color: $Red;
                        }
                    }
                    #checkOut_promoCode{
                        display: flex;
                        align-items: center;
                        margin-bottom: 20px;
                        #checkOut_enterCode{
                            border: 1px solid $Gold;
                            border-radius: 20px;
                            padding: 5px 10px;
                            font-size: 14px;
                            font-family: $fontFamily;
                            margin-right: 20px;
                            width: 60%;
                            line-height: 150%;
                        }
                        #checkOut_submitCode{
                            font-family: $fontFamily;
                            font-size: 14px;
                            font-weight: bold;
                            background-color: $OffWhite;
                            border-radius: 20px;
                            padding: 6px 10px;
                            border: 1px solid $Gold;
                            // line-height: 150%;
                            cursor: pointer;
                            margin: auto;
                        }
                    }
                    .checkOut_amount{
                        .checkOut_amount_subtotal{
                            display: flex;
                            justify-content: space-between;
                            margin-bottom: 12px;
                            h5{
                                font-weight: normal;
                            }
                        }
                        .checkOut_amount_discount{
                            display: flex;
                            justify-content: space-between;
                            margin-bottom: 12px;
                            h5{
                                font-weight: normal;
                            }
                        }
                        .checkOut_amount_total{
                            display: flex;
                            justify-content: space-between;
                            margin-bottom: 20px;
                        }
                    }
                }
            }
        }
    }

    .checkOut_pay{
        width: 95%;
        display: inline-block;
        border: 1px solid $Gold;
        margin-top: 20px;
        border-radius: 20px;
        padding-top: 12px;
        padding-left: 16px;
        font-family: $fontFamily;
        h4{
            padding-left: 8px;
            font-weight: bold;
            line-height: 150%;
            margin-bottom: 12px;
        }
        .checkOut_pay_method{
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            #checkOut_creditCard{
                margin: 0 8px;
                width: 16px;
                height: 16px;
                // background-color: $Gold;
                border: 1px solid $Gold;
            }
            span:first-child{
                margin-right: 20px;
            }
            #checkOut_linePay{
                margin: 0 8px;
                width: 16px;
                height: 16px;
            }
        }
    }

    .checkOut_nextStep{
        position: relative;
        #checkOut_next{
            position: absolute;
            z-index: 2;
            font-size: $fontSize * 5;
            padding: 8px 44px;
            background-color: $Gold;
            color: #fff;
            border: none;
            border-radius: 42px;
            font-weight: bold;
            font-family: $fontFamily;
            left: 0;
            right: 0;
            margin: auto;
            margin-bottom: 20px;
            width: 150px;
        }
    }

</style>