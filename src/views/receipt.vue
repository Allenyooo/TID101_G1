<script>
import couponSwiper from "../components/receipt_swiper.vue";

export default {

    mounted(){
        this.getMemberID();
        this.loginStatus();
        // this.getOrderDetails();
    },

    data(){
        return{
            orderDetails: {
                id: "24EAE33493",
                date: "2024 / 05 / 15",
                payment: "LINE Pay",
                amount: "2600"
            },
            memberId: "",
        }
    },

    components: { couponSwiper },

    methods: {
        getMemberID(){
            let cookies = document.cookie;
            let match = cookies.match(/memberId=(\d+)/);
            let memberId = match[1];
            // console.log(match)
            console.log(memberId);
            this.memberId = memberId;
            return memberId;
        },
        loginStatus(){
            if(this.memberId == null){
                alert("發生錯誤 請稍後再嘗試");
            }else{
                this.getOrderDetails()
            }
        },
        async getOrderDetails(){
            fetch(
                // "http://localhost/tid101_g1/public/php/receipt/orderDetails.php"
            `${import.meta.env.VITE_PHP_PATH}receipt/orderDetails.php`,{
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    memberId: this.memberId
                })
            })
                .then(resp => resp.json())
                .then(orderDB => {
                    this.order = orderDB
                })
                .catch(wrong => {
                    console.log(wrong)
                })
        },

        member() {
            this.$router.push("/member");
        },
    },
};
</script>

<template>
    <div class="receipt_body">
        <div class="receipt_coupon">
            <div class="receipt_coupon_left">
                <h2>訂單明細</h2>
                <div class="receipt_order_detail">
                    <ul class="receipt_order_details">
                        <li>
                            <h5>訂單編號</h5>
                            <h5>{{ orderDetails.id }}</h5>
                        </li>
                        <li>
                            <h5>訂購日期</h5>
                            <h5>{{ orderDetails.date }}</h5>
                        </li>
                        <li>
                            <h5>付款方式</h5>
                            <h5>{{ orderDetails.payment }}</h5>
                        </li>
                        <li>
                            <h5>實付金額</h5>
                            <h5>NT$ {{ orderDetails.amount }}</h5>
                        </li>
                    </ul>
                    <div class="receipt_consumer_details">
                        <table>
                            <tr>
                                <th>商品</th>
                                <th>數量</th>
                                <th>面額</th>
                            </tr>
                            <tr>
                                <td>梨饗券</td>
                                <td>1</td>
                                <td>$100</td>
                            </tr>
                            <tr>
                                <td>梨饗券</td>
                                <td>1</td>
                                <td>$300</td>
                            </tr>
                            <tr>
                                <td>梨饗券</td>
                                <td>1</td>
                                <td>$500</td>
                            </tr>
                            <tr>
                                <td>梨饗券</td>
                                <td>1</td>
                                <td>$800</td>
                            </tr>
                            <tr>
                                <td>梨饗券</td>
                                <td>1</td>
                                <td>$1000</td>
                            </tr>
                        </table>
                        <ul class="receipt_amount">
                            <li>
                                <h5>小計</h5>
                                <h5>NT$2700</h5>
                            </li>
                            <li>
                                <h5>折扣</h5>
                                <h5>- NT$100</h5>
                            </li>
                            <li>
                                <h4>總金額</h4>
                                <h4>NT$2600</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="receipt_coupon_right">
                <div class="swiper">
                    <couponSwiper></couponSwiper>
                </div>
                <ul class="coupon_info">
                    <li>
                        <h5>序號</h5>
                        <h5>24KK2988EFIJ</h5>
                    </li>
                    <li>
                        <h5>使用期限</h5>
                        <h5>2025/12/31</h5>
                    </li>
                </ul>
                <div class="coupon_button">
                    <button>寄送信箱</button>
                    <button>點擊下載</button>
                </div>
            </div>
        </div>

        <div class="receipt_plan">
            <h3>方案詳情</h3>
            <p>
                探索美食之旅！梨花殿攜手一流餐廳，推出超值梨饗券！可在我們合作餐廳使用，抵扣結帳金額。掃描手機中的QR
                Code，立即享優惠。無論韓式烤肉或地道韓國美食，滿足您的味蕾。梨饗券使用期限為一年，在您購買後一年內有效，適用於全台知名韓國餐廳。<br /><br />梨饗券可以優先訂位，無實體票券，方便快捷！開啟美食之旅，品味精彩美味！
            </p>
        </div>

        <div class="receipt_howToUse">
            <h3>如何使用</h3>
            <p>
                感謝您選擇我們的梨饗券！梨饗券可以讓您在我們合作的餐廳上享受美味的用餐體驗。完成付款後，您將收到一組QR
                Code，請將QR
                Code儲存到您的信箱和手機中，以便在餐廳使用。到達餐廳後，您只需向服務人員出示QR
                Code，即可抵扣等值金額。此外，我們的餐券有效期為一年，請在有效期內使用。<br /><br />請注意，本餐券僅限在我們指定的合作餐廳使用，並且不能兌換現金。最後，我們對於使用本餐券所造成的任何意外概不負責，並保留對本說明的最終修改權。希望您享受美食之旅！
            </p>
        </div>

        <button class="receipt_ticketBox" @click="member">檢視票匣</button>
    </div>
</template>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.receipt_body {
    background-color: $OffWhite;
    max-width: 100vw;
    // height: 100vh;
    padding-top: 5%;
    padding-left: 3vw;
    padding-bottom: 92px;
    @include breakpoint(1280px){
        padding-left: 5%;
        padding-top: 2%;
    }
    @include breakpoint(820px){
        padding-top: 1%;
    }
    .receipt_coupon {
        background-image: url(../assets/Image/receipt/receipt_bg.png);
        // width: 78%;
        // height: 78%;
        width: 1026px;
        height: 536px;
        background-repeat: no-repeat;
        background-size: contain;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        position: relative;
        @include breakpoint(1280px){
            background-image: url(../assets/Image/receipt/receipt_bg_1280px.png);
            width: unset;
            height: 960px;
            background-position: top center;
            flex-direction: column;
            align-items: center;
            justify-content: unset;
        }
        @include breakpoint(820px){
            background-image: url(../assets/Image/receipt/receipt_bg_m.png);
            width: 340px;
            height: 1200px;
        }
        .receipt_coupon_left {
            // border: 1px solid red;
            position: absolute;
            top: 0;
            left: 0;
            width: 63%;
            height: 100%;
            @include breakpoint(1280px){
                position: unset;
                width: 100%;
                height: 57%;
            }
            @include breakpoint(820px){
                margin-bottom: 0;
                height: 53%;
            }
            h2 {
                color: $Gold;
                font-weight: bold;
                text-align: center;
                margin-bottom: 40px;
                margin-top: 44px;
                @include breakpoint(1280px){
                    margin-bottom: 32px;
                    margin-top: 52px;
                }
                @include breakpoint(820px){
                    margin-bottom: 20px;
                    margin-top: 40px;
                }
            }
        }
        .receipt_coupon_right {
            // border: 1px solid slateblue;
            position: absolute;
            top: 0;
            right: 0;
            width: 37%;
            height: 100%;
            @include breakpoint(1280px){
                position: unset;
                width: unset;
                height: unset;
                margin-left: 2%;
            }
            @include breakpoint(820px){
                margin-left: 0;
            }
            .swiper {
                // border: 1px solid #fff;
                width: 307px;
                height: 360px;
                margin: 0 auto;
                @include breakpoint(1280px){
                    float: left;
                    // width: 292px;
                    // height: 320px;
                }
                @include breakpoint(820px){
                    float: none;
                    width: 292px;
                    height: 320px;
                }
            }
            .coupon_info {
                width: 168px;
                height: 60px;
                margin: 12px auto 0;
                color: $White;
                @include breakpoint(1280px){
                    float: right;
                    margin: 14% 10% 0 0;
                    color: $DarkBrown;
                    background: $LightGoldGrad;
                    border-radius: 20px;
                    font-weight: bold;
                    padding: 14px;
                    width: unset;
                    height: unset;
                }
                @include breakpoint(820px){
                    float: none;
                    margin: 20px auto 0;
                    color: $White;
                    background: none;
                    border-radius: 20px;
                    font-weight: normal;
                    padding: 0;
                    width: 168px;
                }
                li {
                    display: flex;
                    justify-content: space-between;
                    @include breakpoint(1280px){
                        flex-direction: column;
                        align-items: center;
                    }
                    @include breakpoint(820px){
                        flex-direction: row;
                        align-items: normal;
                    }
                }
                li:first-child {
                    margin-bottom: 8px;
                    @include breakpoint(1280px){
                        margin-bottom: 20px;
                    }
                }
            }
            .coupon_button {
                margin-top: 20px;
                display: flex;
                justify-content: center;
                @include breakpoint(1280px){
                    float: right;
                    flex-direction: column;
                    margin-right: 12%;
                    margin-top: 44px;
                }
                @include breakpoint(820px){
                    float: none;
                    flex-direction: row;
                    margin: 40px auto 44px;
                }
                button {
                    background-color: $OffWhite;
                    border: none;
                    font-size: $fontSize * 1.25;
                    color: $DarkBrown;
                    font-weight: bold;
                    font-family: $fontFamily;
                    border-radius: 20px;
                    padding: 6px 20px;
                    @include breakpoint(820px){
                        padding: 12px 20px;
                    }
                }
                button:first-child {
                    margin-right: 28px;
                    @include breakpoint(1280px){
                        margin-right: 0;
                        margin-bottom: 20px;
                    }
                    @include breakpoint(820px){
                        margin-right: 28px;
                        margin-bottom: 0;
                    }
                }
            }
        }
    }
}

.receipt_order_detail {
    display: flex;
    justify-content: center;
    @include breakpoint(820px){
        flex-direction: column;
    }
    .receipt_order_details {
        background-color: $WarmNude;
        padding: 12px 28px;
        border-radius: 20px 0 20px 0;
        margin-right: 28px;
        @include breakpoint(820px){
            display: flex;
            flex-wrap: wrap;
            margin: 0 36px 20px;
            padding: 12px 0 12px 20px;
        }
        li{
            width: 108px;
            @include breakpoint(820px){
                width: 124px;
            }
        }
        li:not(:last-child) {
            margin-bottom: 28px;
            @include breakpoint(820px){
                margin-bottom: 0;
            }
        }
        li:first-child{
            @include breakpoint(820px){
                margin-bottom: 20px;
            }
        }
        h5:first-child {
            color: $DarkGray;
            margin-bottom: 8px;
        }
        h5:last-child {
            font-weight: bold;
        }
    }
    .receipt_consumer_details {
        @include breakpoint(820px){
            margin: 0 auto;
        }
        table {
            margin: 12px 0 32px;
            text-align: center;
            // border: 1px solid black;
            width: 244px;
            @include breakpoint(820px){
                margin: 12px 0 20px;
            }
            tr {
                th {
                    color: $Gray;
                }
            }
            tr:not(:last-child) {
                th {
                    padding-bottom: 16px;
                }
                td {
                    padding-bottom: 12px;
                }
            }
        }
        .receipt_amount {
            padding: 32px 24px 0;
            border-top: 2px solid $Gray;
            @include breakpoint(820px){
                padding: 20px 24px 0;
            }
            li {
                display: flex;
                justify-content: space-between;
            }
            li:first-child {
                margin-bottom: 4px;
            }
            li:last-child {
                margin-top: 4px;
                h4 {
                    font-weight: bold;
                }
            }
        }
    }
}

.receipt_plan,
.receipt_howToUse {
    width: 1026px;
    margin: 72px auto 0;
    @include breakpoint(1280px) {
        width: 70%;
    }
    @include breakpoint(1280px) {
        margin: 40px auto 0;
    }
    @include breakpoint(700px) {
        width: 50%;
    }
    @include breakpoint(500px) {
        width: 50%;
    }
    @include breakpoint(430px) {
        width: 90%;
    }
    h3 {
        font-size: $fontSize * 1.5;
        font-weight: bold;
        margin-bottom: 16px;
    }
    p {
        padding: 20px;
        background-color: $White;
        border-radius: 20px;
        border: 1px solid $Gold;
        font-size: $fontSize;
        color: $Black;
    }
}
.receipt_ticketBox {
    background-color: $Gold;
    border-radius: 42px;
    color: $White;
    padding: 12px 40px;
    border: transparent;
    font-size: $fontSize * 1.5;
    font-weight: bold;
    font-family: $fontFamily;
    // margin-top: 44px;
    // margin-bottom: 132px;
    margin: 44px auto 0;
    display: block;
}
</style>
