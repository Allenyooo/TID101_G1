<script>

</script>


<template>
    <body>
        <div class="checkOut_wrapper">
            <div class="checkOut_confirm_order">
                <h2>確認訂單</h2>
                <div class="checkOut_order">
                    <div class="checkOut_left_zone">
                        <div class="checkOut_purchase_title">
                            <h3>購買明細</h3>
                            <h5>共 3 件</h5>
                        </div>
                    </div>
                    <div class="checkOut_right_zone">
                        <div class="checkOut_order_details">
                            <div class="checkOut_order_title">
                                <h3>訂單明細</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="envelope">
                    <img src="../assets/Image/checkOut/envelope.png">
                    <img src="../assets/Image/checkOut/envelope_forward.png">
                </div> -->
            </div>
        </div>
    </body>
</template>

<style lang="scss" scoped>

    @import "/src/sass/style.scss";

    body {
        background-color: $OffWhite;
        max-width: 100vw;
        height: 90vh;
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
        .checkOut_confirm_order{
            width: 85%;
            height: 90%;
            background-color: $White;
            border: 1px solid $Gold;
            margin: 0 auto;
            border-radius: 20px;
            h2{
                color: $Gold;
                margin-top: 28px;
                text-align: center;
                margin-bottom: 32px;
            }
        }
    }

    .checkOut_order{
        .checkOut_left_zone{
            display: inline-block;
            border-bottom: 1px solid $Gold;
            margin-left: 68px;
            width: 50%;
            h3{
                display: inline-block;
                font-size: $fontSize * 6;
                font-weight: bold;
                padding-bottom: 14px;
                padding-right: 12px;
            }
            h5{
                display: inline-block;
            }
        }

        .checkOut_right_zone{
            display: inline-block;
            // border: 1px solid red;
            margin-left: 56px;
            .checkOut_order_details{
                border: 1px solid $Gold;
                border-radius: 20px;
                .checkOut_order_title{
                    margin: 20px 16px 16px 16px;
                    h3{
                        font-size: $fontSize * 6;
                        font-weight: bold;
                    }
                }
            }
        }
    }







    .envelope{
        position: relative;
        img{
            width: 80%;
            position: absolute;
            &:nth-child(2){
                left: 0;
                bottom: 0;
            }
        }
    }



</style>