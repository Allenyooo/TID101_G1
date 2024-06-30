<script>
import couponSwiper from "../components/receipt_swiper.vue";

export default {
    mounted() {
        this.getMemberID();
        this.loginStatus();
        this.getOrderID();
        this.preSerialNumber();
    },

    data() {
        return {
            orderDetails: [],
            tickets: [
                {
                    id: "1",
                    qty: "0",
                    price: 100,
                },
                {
                    id: "2",
                    qty: "0",
                    price: 300,
                },
                {
                    id: "3",
                    qty: "0",
                    price: 500,
                },
                {
                    id: "4",
                    qty: "0",
                    price: 800,
                },
                {
                    id: "5",
                    qty: "0",
                    price: 1000,
                },
            ],
            orderID: "",
            orderDate: "",
            orderPayment: "",
            orderSubtotal: "",
            orderDiscount: "",
            orderAmount: "",
            serialNumber: "",
            // imgSrc: "",
            memberId: "",
        };
    },

    components: { couponSwiper },

    methods: {
        getMemberID() {
            let cookies = document.cookie;
            let match = cookies.match(/memberId=(\d+)/);
            if (match) {
                let memberId = match[1];
                // console.log(match)
                // console.log(memberId);
                this.memberId = memberId;
                return memberId;
            } else {
                let memberId = null;
                this.memberId = memberId;
                return memberId;
            }
        },
        loginStatus() {
            if (this.memberId == null) {
                alert("請先登入");
                this.$router.push("/login");
            } else {
                this.getOrderDetails();
                this.getOrderQty();
            }
        },
        getOrderID() {
            let cookies = document.cookie;
            let match = cookies.match(/orderID=(\d+)/);
            if (match) {
                let orderID = match[1];
                // console.log(match);
                // console.log(orderID);
                this.orderID = orderID;
                // console.log(this.orderID);
                return this.orderID;
            } else {
                alert("發生錯誤，請稍後再試");
            }
        },
        async getOrderDetails() {
            let orderID = this.getOrderID();
            fetch(`${import.meta.env.VITE_PHP_PATH}receipt/orderDetails.php`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    memberId: this.memberId,
                    orderID: orderID,
                }),
            })
                .then((resp) => resp.json())
                .then((orderDetailsDB) => {
                    // this.orderDetails = orderDetailsDB;
                    this.orderDate = orderDetailsDB[0].date;
                    this.orderPayment = orderDetailsDB[0].payment;
                    this.orderSubtotal = orderDetailsDB[0].subtotal;
                    this.orderDiscount = orderDetailsDB[0].discount;
                    this.orderAmount = orderDetailsDB[0].amount;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        async getOrderQty(){
            let orderID = this.getOrderID();
            fetch(`${import.meta.env.VITE_PHP_PATH}receipt/orderQty.php`,{
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    orderID: orderID
                })
            })
                .then((resp) => resp.json())
                .then((orderQtyDB) => {
                    // console.log(orderQtyDB);
                    // this.tickets = orderQtyDB;
                    // this.tickets = this.tickets.map(
                    //     (ticket) => ticket.qty = orderQtyDB
                    // );
                    this.tickets = this.tickets.map((ticket, index) => ({
                        ...ticket, 
                        qty: orderQtyDB[index].qty
                    }));

                })
                .catch((error) => {
                    console.log(error);
                });
        },
        download() {
            // let url = "https://api.pwmqr.com/qrcode/create/?url=" + this.serialNumber + "&down=1";
            // console.log(url)
            location.href = "https://api.pwmqr.com/qrcode/create/?url=" + this.serialNumber + "&down=1";
        },
        member() {
            this.$router.push("/member");
        },
        showID(receiptID){
            this.serialNumber = receiptID;
            // console.log(this.serialNumber);
        },
        preSerialNumber(){
            this.serialNumber = this.orderID+'1';
        },
        async sendEmail(){
            fetch(`${import.meta.env.VITE_PHP_PATH}receipt/userEmail.php`,{
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    memberId: this.memberId
                })
            })
            .then((resp) => resp.json())
            .then((email) => {
                console.log(email[0]);
                alert("梨饗券已寄送至 " + email[0] + "\n請至信箱查收！");
            })
        }
    },

    computed: {
        expDate() {
            this.getOrderDetails();
            // console.log(this.orderDate);
            let today = new Date(this.orderDate);
            let year = today.getFullYear() + 1;
            let m = today.getMonth() + 1;
            let d = today.getDate();
            // let m = 2;
            // let d = 29;
            if (m == 2 && d == 29) {
                var mon = 3;
                var da = 1;
            } else {
                var mon = m;
                var da = d;
            }
            let month = mon < 10 ? "0" + mon : mon;
            let day = da < 10 ? "0" + da : da;
            return `${year} / ${month} / ${day}`;
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
                            <h5>{{ orderID }}</h5>
                        </li>
                        <li>
                            <h5>訂購日期</h5>
                            <h5>{{ orderDate }}</h5>
                        </li>
                        <li>
                            <h5>付款方式</h5>
                            <h5>{{ orderPayment }}</h5>
                        </li>
                        <li>
                            <h5>實付金額</h5>
                            <h5>NT$ {{ orderAmount }}</h5>
                        </li>
                    </ul>
                    <div class="receipt_consumer_details">
                        <table>
                            <tr>
                                <th>商品</th>
                                <th>數量</th>
                                <th>面額</th>
                            </tr>
                            <tr v-for="ticket in tickets" :key="ticket.id">
                                <td>梨饗券</td>
                                <td>{{ ticket.qty }}</td>
                                <td>${{ ticket.price }}</td>
                            </tr>
                            <!-- <tr>
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
                            </tr> -->
                        </table>
                        <ul class="receipt_amount">
                            <li v-if="orderDiscount !== null">
                                <h5>小計</h5>
                                <h5>NT$ {{ orderSubtotal }}</h5>
                            </li>
                            <li v-if="orderDiscount !== null">
                                <h5>折扣</h5>
                                <h5>- NT$ {{ orderDiscount }}</h5>
                            </li>
                            <li>
                                <h4>總金額</h4>
                                <h4>NT$ {{ orderAmount }}</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="receipt_coupon_right">
                <div class="swiper">
                    <couponSwiper @sendMsg="showID"></couponSwiper>
                </div>
                <ul class="coupon_info">
                    <li>
                        <h5>序號</h5>
                        <h5>{{ serialNumber }}</h5>
                    </li>
                    <li>
                        <h5>使用期限</h5>
                        <h5>{{ expDate }}</h5>
                    </li>
                </ul>
                <div class="coupon_button">
                    <button @click="sendEmail">寄送信箱</button>
                    <button @click="download">點擊下載</button>
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
    @include breakpoint(1280px) {
        padding-left: 0;
        padding-top: 2%;
    }
    @include breakpoint(820px) {
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
        @include breakpoint(1280px) {
            background-image: url(../assets/Image/receipt/receipt_bg_1280px.png);
            width: unset;
            height: 960px;
            background-position: top center;
            flex-direction: column;
            align-items: center;
            justify-content: unset;
        }
        @include breakpoint(820px) {
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
            @include breakpoint(1280px) {
                position: unset;
                width: 100%;
                height: 57%;
            }
            @include breakpoint(820px) {
                margin-bottom: 0;
                height: 53%;
            }
            h2 {
                color: $Gold;
                font-weight: bold;
                text-align: center;
                margin-bottom: 40px;
                margin-top: 44px;
                @include breakpoint(1280px) {
                    margin-bottom: 32px;
                    margin-top: 52px;
                }
                @include breakpoint(820px) {
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
            @include breakpoint(1280px) {
                position: unset;
                width: unset;
                height: unset;
                margin-left: 2%;
            }
            @include breakpoint(820px) {
                margin-left: 0;
            }
            .swiper {
                // border: 1px solid #fff;
                width: 307px;
                height: 360px;
                margin: 0 auto;
                @include breakpoint(1280px) {
                    float: left;
                    // width: 292px;
                    // height: 320px;
                }
                @include breakpoint(820px) {
                    float: none;
                    width: 292px;
                    height: 320px;
                }
            }
            .coupon_info {
                width: 200px;
                height: 60px;
                margin: 12px auto 0;
                color: $White;
                @include breakpoint(1280px) {
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
                @include breakpoint(820px) {
                    float: none;
                    margin: 20px auto 0;
                    color: $White;
                    background: none;
                    border-radius: 20px;
                    font-weight: normal;
                    padding: 0;
                    width: 188px;
                }
                li {
                    display: flex;
                    justify-content: space-between;
                    @include breakpoint(1280px) {
                        flex-direction: column;
                        align-items: center;
                    }
                    @include breakpoint(820px) {
                        flex-direction: row;
                        align-items: normal;
                    }
                }
                li:first-child {
                    margin-bottom: 8px;
                    @include breakpoint(1280px) {
                        margin-bottom: 20px;
                    }
                }
            }
            .coupon_button {
                margin-top: 20px;
                display: flex;
                justify-content: center;
                @include breakpoint(1280px) {
                    float: right;
                    flex-direction: column;
                    margin-right: 12%;
                    margin-top: 44px;
                }
                @include breakpoint(820px) {
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
                    @include breakpoint(820px) {
                        padding: 12px 20px;
                    }
                }
                button:first-child {
                    margin-right: 28px;
                    @include breakpoint(1280px) {
                        margin-right: 0;
                        margin-bottom: 20px;
                    }
                    @include breakpoint(820px) {
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
    @include breakpoint(820px) {
        flex-direction: column;
    }
    .receipt_order_details {
        background-color: $WarmNude;
        padding: 12px 28px;
        border-radius: 20px 0 20px 0;
        margin-right: 28px;
        @include breakpoint(820px) {
            display: flex;
            flex-wrap: wrap;
            margin: 0 36px 20px;
            padding: 12px 0 12px 20px;
        }
        li {
            width: 108px;
            @include breakpoint(820px) {
                width: 124px;
            }
        }
        li:not(:last-child) {
            margin-bottom: 28px;
            @include breakpoint(820px) {
                margin-bottom: 0;
            }
        }
        li:first-child {
            @include breakpoint(820px) {
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
        @include breakpoint(820px) {
            margin: 0 auto;
        }
        table {
            margin: 12px 0 32px;
            text-align: center;
            // border: 1px solid black;
            width: 244px;
            @include breakpoint(820px) {
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
            @include breakpoint(820px) {
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
