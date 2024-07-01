<script>
export default {
    mounted() {
        // this.purchaseItem();
        this.getMemberID();
        this.loginStatus();
    },

    data() {
        return {
            tickets: [
                {
                    // id: "checkOut_purchase_item1",
                    // name: "$100 梨饗券",
                    // price: 100,
                    // percent: 0.9,
                    // salePrice: 90,
                    // qty: 1,
                },
                {
                    // id: "checkOut_purchase_item2",
                    // name: "$300 梨饗券",
                    // price: 300,
                    // percent: 0.8,
                    // salePrice: 240,
                    // qty: 1,
                },
                {
                    // id: "checkOut_purchase_item3",
                    // name: "$500 梨饗券",
                    // price: 500,
                    // percent: 0.7,
                    // salePrice: 350,
                    // qty: 1,
                },
                {
                    // id: "checkOut_purchase_item3",
                    // name: "$800 梨饗券",
                    // price: 800,
                    // percent: 0.9,
                    // salePrice: 720,
                    // qty: 1,
                },
                {
                    // id: "checkOut_purchase_item3",
                    // name: "$1000 梨饗券",
                    // price: 1000,
                    // percent: 0.9,
                    // salePrice: 900,
                    // qty: 1,
                },
            ],
            promoCode: "",
            // hint: false,
            hintMsg: "",
            voucher_discount: null,
            usedtimes: 0,
            payment: [],
            memberId: "",
            totalQty: "",
            amount: 0,
            subtotal: 0,
            orderID: "",
            cardNumber: "",
            expiryDate: "",
            securityCode: "",
            cardHint: "",
        };
    },

    methods: {
        getMemberID() {
            let cookies = document.cookie;
            let match = cookies.match(/memberId=(\d+)/);
            if (match) {
                let memberId = match[1];
                // console.log(match)
                console.log(memberId);
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
                this.purchaseItem();
            }
        },
        async purchaseItem() {
            fetch(
                // "http://localhost/tid101_g1/public/php/checkOut/purchase.php"
                `${import.meta.env.VITE_PHP_PATH}checkOut/purchase.php`,
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        memberId: this.memberId,
                    }),
                }
            )
                .then((resp) => resp.json())
                .then((ticketsDB) => {
                    this.tickets = ticketsDB;
                })
                .catch((wrong) => {
                    console.log(wrong);
                });
        },
        minusOne(ticket, index) {
            if (ticket.qty > 1) {
                ticket.qty--;
            } else {
                this.tickets.splice(index, 1);
            }
        },
        plusOne(ticket) {
            ticket.qty++;
        },
        deleteItem(index) {
            this.tickets.splice(index, 1);
        },
        // salePrice(ticket){
        //     // let salePrice = ticket.price * ticket.discount
        //     // return salePrice;
        //     return ticket.price * ticket.discount
        // }
        async submitCode() {
            fetch(
                // "http://localhost/tid101_g1/public/php/checkOut/voucher.php"
                `${import.meta.env.VITE_PHP_PATH}checkOut/voucher.php`,
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        enterCode: this.promoCode, // enterCode 為自定義變數名稱
                    }),
                }
            )
                .then((resp) => resp.json())
                .then((voucherDB) => {
                    if (voucherDB.error) {
                        this.hintMsg = voucherDB.error;
                        this.voucher_discount = null;
                    } else {
                        this.voucher_discount = voucherDB.voucher_discount;
                        this.hintMsg = "";
                        this.usedtimes = 1;
                        // console.log(this.usedtimes)
                    }
                })
                .catch((error) => {
                    console.error("Error:", error); // 印出錯誤原因
                    this.hintMsg = "發生錯誤，請稍後再試";
                    this.voucher_discount = null;
                });
        },
        async nextStep() {
            this.numberVerify;
            if(this.cardHint == ""){
                this.dateVerify;
                if(this.cardHint == ""){
                    this.securityVerify;
                    if(this.cardHint == ""){
                        fetch(
                            // "http://localhost/tid101_g1/public/php/checkOut/submitOrder.php"
                            `${import.meta.env.VITE_PHP_PATH}checkOut/submitOrder.php`,
                            {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                body: JSON.stringify({
                                    promoCode: this.promoCode,
                                    usedtimes: this.usedtimes,
                                    payment: this.payment,
                                    memberId: this.memberId,
                                    tickets: this.tickets,
                                    totalQty: this.totalQty,
                                    amount: this.amount,
                                    subtotal: this.subtotal,
                                }),
                            }
                        )
                            .then((resp) => resp.json())
                            .then((orderID) => {
                                // console.log(orderID);
                                this.orderID = orderID;
                                console.log(this.orderID);
                                this.setCookie("orderID", this.orderID, 7);
                            })
                            .then(this.checkOut)
                            .catch((error) => {
                                console.log("Error:", error);
                            });
                    }
                }
            }
        },
        checkOut() {
            this.$router.push("/receipt");
        },
        backStep() {
            this.$router.push("/product");
        },
        setCookie(name, value, days) {
            let expires = "";
            if (days) {
                const date = new Date();
                date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        },
    },

    computed: {
        qtyTotal() {
            // return this.tickets.reduce((acc, ticket) => acc + ticket.qty, 0);
            let totalQty = 0;
            this.tickets.forEach((ticket) => {
                totalQty += ticket.qty;
            });
            this.totalQty = totalQty;
            return this.totalQty;
        },

        expDate() {
            let today = new Date();
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

        sub() {
            let sub = 0;
            this.tickets.forEach((ticket) => {
                let total = ticket.qty * ticket.salePrice;
                sub += total;
                // subTotal += ticket.salePrice;
            });
            this.subtotal = sub;
            // console.log(this.subtotal)
            return sub;
            // let subTotal = this.tickets.reduce((acc, ticket) => acc + (ticket.qty * ticket.price),0);
            // return subTotal;
        },

        total() {
            let total = this.sub - this.voucher_discount;
            if (total < 0) {
                total = 0;
                this.amount = total;
                return total;
            } else {
                total = total;
                this.amount = total;
                return total;
            }
            // return total
        },
        dateVerify(){
            let expiry = this.expiryDate;
            let expiryMonth = expiry.toString().slice(0,2);
            let expiryYear = expiry.toString().slice(-2);
            // console.log(expiryMonth+"/"+expiryYear);
            let today = new Date();
            let y = today.getFullYear();
            let year = y.toString().slice(-2);
            let month = today.getMonth() + 1;
            // console.log(month+"/"+year);

            if( 0 < expiryMonth && expiryMonth <= 12 ){
                if(expiryYear < year){
                    this.cardHint = "";
                    this.cardHint = "請輸入正確有效期限";
                }else if(expiryMonth < month && expiryYear == year){
                    this.cardHint = "";
                    this.cardHint = "請輸入正確有效期限";
                }else{
                    this.cardHint = "";
                }
            }else{
                this.cardHint = "";
                this.cardHint = "請輸入正確有效期限";
            }

        },
        numberVerify(){
            let cardNumber = this.cardNumber;
            cardNumber = cardNumber.replace(/\D/g, '');
            let numberLength = cardNumber.length;
            if(numberLength < 16 || numberLength > 16){
                this.cardHint = "請輸入有效卡號";
            }else{
                let topFifteen = cardNumber.slice(0,15);
                console.log(topFifteen);
                let lastDigit = parseInt(cardNumber.toString().slice(-1));
                console.log(lastDigit);
                let numbers = topFifteen.split('').reverse();
                console.log(numbers);
                let newFifteens = numbers.map((number,index) =>{
                    if((index + 1) % 2 === 1){
                        let number2 = number * 2;
                        if(number2 > 9){
                            let number3 = parseInt(number2.toString().slice(0,1)) + parseInt(number2.toString().slice(-1));
                            // number3 = parseInt(number3);
                            return number3;
                        }else{
                            return number2;
                        }
                    } else {
                        return parseInt(number);
                    }
                });
                console.log(newFifteens);
                let plus = newFifteens.reduce((acc, newFifteen) => acc + newFifteen , 0);
                console.log(plus);
                let plus9 = plus * 9;
                console.log(plus9);
                let lastStep = parseInt(plus9.toString().slice(-1));
                console.log(lastStep);
                if(lastStep !== lastDigit){
                    this.cardHint = "";
                    this.cardHint = "請輸入有效卡號";
                    console.log("失敗");
                }else{
                    this.cardHint = "";
                    console.log("通過");
                }
            }
        },
        securityVerify(){
            let securityCode = this.securityCode;
            securityCode = securityCode.replace(/\D/g, '');
            console.log(securityCode);
            let securityLength = securityCode.length;
            console.log(securityLength);

            if(securityCode == null || securityLength !== 3){
                this.cardHint = "";
                this.cardHint = "請輸入有效安全碼";
            }else{
                this.cardHint = "";
            }
        }

    },
};
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
                            <h5>共 {{ qtyTotal }} 張</h5>
                            <span>，</span>
                            <h5>使用期限至 {{ expDate }}</h5>
                        </div>
                        <div class="checkOut_purchase_list">
                            <ul class="checkOut_purchase_item">
                                <li
                                    v-for="(ticket, index) in tickets"
                                    :key="ticket.id"
                                    :id="ticket.id"
                                    v-if="totalQty !== 0"
                                >
                                    <img :src="ticket.imgSrc" alt="" />
                                    <div class="checkOut_ticket_info">
                                        <h4>{{ ticket.name }}</h4>
                                        <h5>
                                            售價：NT$ {{ ticket.salePrice }}
                                        </h5>
                                        <div class="checkOut_qty">
                                            <h5>數量：</h5>
                                            <button
                                                class="checkOut_qty_minus"
                                                @click="minusOne(ticket, index)"
                                            ></button>
                                            <p>{{ ticket.qty }}</p>
                                            <button
                                                class="checkOut_qty_plus"
                                                @click="plusOne(ticket)"
                                            ></button>
                                            <button
                                                class="checkOut_qty_delete"
                                                @click="deleteItem(index)"
                                            ></button>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    v-if="totalQty == 0"
                                    class="checkOut_emptyCart"
                                >
                                    <!-- <img src="../assets/Image/checkOut/cart.png" alt=""> -->
                                    <h4>沒有排隊中的商品！</h4>
                                    <button
                                        class="emptyCart_btn"
                                        @click="backStep"
                                    >
                                        探索韓食美味<span>，</span>盡在梨花殿
                                    </button>
                                </li>
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
                                    <p v-if="hintMsg">{{ hintMsg }}</p>
                                    <!-- <p v-if="hintMsg">找不到此優惠碼！</p> -->
                                    <!-- <p v-else="expiredMsg">優惠代碼已過期！</p> -->
                                </div>
                                <form action="" id="checkOut_promoCode">
                                    <input
                                        type="text"
                                        placeholder="輸入折扣代碼"
                                        id="checkOut_enterCode"
                                        v-model="promoCode"/>
                                    <div
                                        id="checkOut_submitCode"
                                        @click="submitCode">
                                        確認
                                    </div>
                                </form>
                                <ul class="checkOut_amount">
                                    <li
                                        class="checkOut_amount_subtotal"
                                        v-if="voucher_discount !== null">
                                        <h5>小計</h5>
                                        <h5>NT${{ sub }}</h5>
                                    </li>
                                    <li
                                        class="checkOut_amount_discount"
                                        v-if="voucher_discount !== null"
                                    >
                                        <h5>折扣</h5>
                                        <h5>-NT${{ voucher_discount }}</h5>
                                    </li>
                                    <li class="checkOut_amount_total">
                                        <h4>總金額</h4>
                                        <h4>NT${{ total }}</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <form action="" class="checkOut_pay">
                            <h4>選擇付款方式</h4>
                            <div class="checkOut_pay_method">
                                <input type="radio" name="pay" id="checkOut_creditCard" v-model="payment" value="信用卡">
                                <label for="checkOut_creditCard"><span>信用卡</span></label>
                                <p v-if="cardHint">{{ cardHint }}</p>
                            </div>
                            <div class="creditCard_zone" v-if="payment.length !== 0">
                                <h5>信用卡卡號</h5>
                                <input type="text" placeholder="**** **** **** ****" id="cardNumber" v-model="cardNumber">
                                <ul>
                                    <li>
                                        <h5>有效期限</h5>
                                        <input type="text" placeholder="MM / YY" id="expiryDate" v-model="expiryDate">
                                    </li>
                                    <li>
                                        <h5>安全碼</h5>
                                        <input type="text" placeholder="CVC / CVV" id="securityCode" v-model="securityCode">
                                    </li>
                                </ul>
                            </div>
                            <!-- <div class="creditCard">
                            </div> -->
                            <!-- <div class="linePay">
                                <input
                                    type="radio"
                                    name="pay"
                                    id="checkOut_linePay"
                                    v-model="payment"
                                    value="LINE Pay"
                                    required="required"
                                />
                                <label for="checkOut_linePay"
                                    ><span>LINE Pay</span></label
                                >
                            </div> -->
                        </form>
                    </div>
                </div>
                <!-- <form @submit.prevent="nextStep" action="http://localhost/tid101_g1/public/php/checkOut/submitOrder.php" method="post" class="checkOut_nextStep"> -->
                <form class="checkOut_nextStep">
                    <input
                        type="button"
                        id="checkOut_next"
                        value="下一步"
                        @click="nextStep"
                        v-if="totalQty !== 0 && cardNumber !== '' && expiryDate !== '' && securityCode !== ''"
                    />
                    <input
                        type="button"
                        id="checkOut_cantNext"
                        value="下一步"
                        v-else
                        disabled
                    />
                </form>
                <!-- <button id="checkOut_next">下一步</button> -->
                <img
                    src="../assets/Image/checkOut/envelope_forward.png"
                    alt=""
                    class="envelope_forward"
                />
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.checkOut_body {
    background-color: $OffWhite;
    max-width: 100vw;
    // height: 95vh;
    height: 120vh;
    padding-top: 1%;
    // @include breakpoint(1280px) {
    //     height: 130vh;
    // }
    // @include breakpoint(1180px) {
    //     height: 140vh;
    // }
    // @include breakpoint(1024px) {
    //     height: 150vh;
    // }
    @include breakpoint(760px) {
        height: unset;
    }
    @include breakpoint(460px) {
        padding-top: 5%;
    }
}

.checkOut_wrapper {
    margin: 0 auto;
    width: 80%;
    height: 100%;
    background-image: url("../assets/Image/checkOut/envelope.png");
    background-repeat: no-repeat;
    background-position: bottom;
    background-size: contain;
    position: relative;
    @include breakpoint(1072px) {
        width: 88%;
    }
    @include breakpoint(760px) {
        width: 90%;
    }
    .checkOut_confirm_order {
        width: 85%;
        height: 95%;
        // height: auto;
        background-color: $White;
        border: 1px solid $Gold;
        margin: 0 auto;
        border-radius: 20px;
        @include breakpoint(1072px) {
            width: 90%;
        }
        h2 {
            color: $Gold;
            margin-top: 28px;
            text-align: center;
            margin-bottom: 24px;
        }
        .envelope_forward {
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

.checkOut_order {
    @include breakpoint(760px) {
        margin: 0 auto;
        padding: 0 14% 22%;
    }
    .checkOut_left_zone {
        display: inline-block;
        vertical-align: top;
        // border-bottom: 1px solid $Gold;
        margin-left: 7%;
        width: 50%;
        // margin-bottom: 10px;
        @include breakpoint(1280px) {
            margin-left: 6%;
        }
        @include breakpoint(820px) {
            width: 44%;
            margin-left: 10%;
        }
        @include breakpoint(760px) {
            display: unset;
        }
        .checkOut_purchase_title {
            border-bottom: 1px solid $Gold;
            width: 100%;
            h3 {
                display: inline-block;
                font-size: $fontSize * 1.5;
                font-weight: bold;
                padding-bottom: 14px;
                padding-right: 12px;
            }
            h5 {
                display: inline-block;
                color: #999;
                padding-bottom: 14px;
            }
            h5:nth-of-type(1) {
                @include breakpoint(923px) {
                    margin-right: 20px;
                }
                @include breakpoint(760px) {
                    margin-right: 0;
                }
                @include breakpoint(633px) {
                    margin-right: 20px;
                }
            }
            span {
                font-size: $fontSize;
                color: #999;
                @include breakpoint(923px) {
                    display: none;
                }
                @include breakpoint(760px) {
                    display: unset;
                }
                @include breakpoint(633px) {
                    display: none;
                }
            }
        }
        .checkOut_purchase_list {
            padding: 28px 0;
            @include breakpoint(980px) {
                padding: 28px 0 0;
            }
            .checkOut_purchase_item {
                width: 96%;
                // height: 332px    ;
                height: 64vh;
                overflow-y: scroll;
                margin-left: 12px;
                // margin-bottom: 36px;
                padding-right: 20px;
                @include breakpoint(1024px) {
                    height: 72vh;
                }
                @include breakpoint(760px) {
                    overflow-y: unset;
                    height: unset;
                }

                li {
                    // width: 97%;
                    height: 20%;
                    display: flex;
                    // border: 1px solid red;
                    // @include breakpoint(1550px) {
                    //     height: 20%;
                    // }
                    // @include breakpoint(1365px) {
                    //     height: 20%;
                    // }
                    @include breakpoint(1370px) {
                        height: 18%;
                    }
                    @include breakpoint(1072px) {
                        height: 16%;
                    }
                    @include breakpoint(900px) {
                        // height: 28%;
                        margin-bottom: 36px;
                    }
                    @include breakpoint(760px) {
                        flex-direction: column;
                        margin-bottom: 36px;
                        // width: 80%;
                    }
                    img {
                        margin-right: 9%;
                        @include breakpoint(1550px) {
                            object-position: -20px;
                            margin-right: 0%;
                        }
                        @include breakpoint(1190px) {
                            display: none;
                            // margin-right: -5%;
                            // object-position: -40px;
                        }
                        @include breakpoint(1072px) {
                            display: block;
                            // margin-right: -5%;
                            // object-position: -40px;
                        }
                        // @include breakpoint(1230px) {
                        //     margin-right: -30%;
                        //     // object-position: -143px;
                        //     object-position: -125px;
                        // }
                        @include breakpoint(980px) {
                            display: none;
                        }
                        @include breakpoint(900px) {
                            display: none;
                        }
                        @include breakpoint(760px) {
                            display: block;
                            margin-right: 0;
                            object-position: 0;
                        }
                    }
                    .checkOut_ticket_info {
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                        width: 50%;
                        @include breakpoint(1230px) {
                            width: 100%;
                        }
                        @include breakpoint(760px) {
                            // justify-content: unset;
                        }
                        h4 {
                            font-weight: bold;
                        }
                        .checkOut_qty {
                            display: flex;
                            align-items: center;
                            .checkOut_qty_minus {
                                background-image: url(../assets/Image/checkOut/down.svg);
                                background-size: contain;
                                background-repeat: no-repeat;
                                background-color: transparent;
                                border: transparent;
                                width: 20px;
                                height: 20px;
                                // margin-left: 16px;
                                margin-left: 4%;
                            }
                            p {
                                font-size: $fontSize;
                                margin: 0 16px;
                            }
                            .checkOut_qty_plus {
                                background-image: url(../assets/Image/checkOut/up.svg);
                                background-size: contain;
                                background-repeat: no-repeat;
                                background-color: transparent;
                                border: transparent;
                                width: 20px;
                                height: 20px;
                            }
                            .checkOut_qty_delete {
                                background-image: url(../assets/Image/checkOut/clear.svg);
                                background-size: contain;
                                background-repeat: no-repeat;
                                background-color: transparent;
                                border: transparent;
                                width: 16px;
                                height: 20px;
                                margin-left: 24px;
                            }
                        }
                    }
                }

                // li{
                //     margin: 0 auto;
                //     width: 90%;
                //     height: 100px;
                //     background-image: url(../assets/Image/checkOut//meal_ticket.png);
                //     background-size: contain;
                //     background-repeat: no-repeat;
                // }

                li:not(:last-child) {
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

    .checkOut_right_zone {
        display: inline-block;
        // border: 1px solid red;
        // margin-left: 56px;
        margin-left: 6%;
        width: 30%;
        @include breakpoint(1280px) {
            margin-left: 5%;
            width: 34%;
        }
        @include breakpoint(820px) {
            margin-left: 6%;
        }
        @include breakpoint(760px) {
            display: unset;
        }
        .checkOut_order_details {
            border: 1px solid $Gold;
            border-radius: 20px;
            padding-top: 12px;
            .checkOut_order_title {
                margin: 0 16px 12px;
                padding-bottom: 12px;
                border-bottom: 1px solid $Gold;
                h3 {
                    padding-left: 8px;
                    font-size: $fontSize * 1.5;
                    font-weight: bold;
                    line-height: 150%;
                }
            }
            .checkOut_use_coupon {
                margin: 12px 24px 16px;
                font-weight: bold;
                @include breakpoint(820px) {
                    margin: 12px 12% 16px;
                }
                .checkOut_coupon_text {
                    display: flex;
                    align-items: center;
                    margin-bottom: 12px;
                    justify-content: space-between;
                    @include breakpoint(930px) {
                        flex-wrap: wrap;
                        justify-content: unset;
                    }
                    @include breakpoint(760px) {
                        justify-content: space-between;
                    }
                    @include breakpoint(450px) {
                        flex-wrap: wrap;
                        justify-content: unset;
                    }
                    h5 {
                        @include breakpoint(930px) {
                            margin-right: 30px;
                        }
                        @include breakpoint(760px) {
                            margin-right: 0;
                        }
                        @include breakpoint(450px) {
                            margin-right: 30px;
                        }
                    }

                    p {
                        color: $Red;
                        @include breakpoint(930px) {
                            margin: 4px auto 0;
                        }
                        @include breakpoint(760px) {
                            margin: 0;
                        }
                        @include breakpoint(450px) {
                            margin: 4px auto 0;
                        }
                    }
                }
                #checkOut_promoCode {
                    display: flex;
                    align-items: center;
                    margin-bottom: 16px;
                    justify-content: space-between;
                    @include breakpoint(980px) {
                        flex-wrap: wrap;
                    }
                    #checkOut_enterCode {
                        border: 1px solid $Gold;
                        border-radius: 20px;
                        padding: 5px 10px;
                        font-size: $fontSize * 0.875;
                        font-family: $fontFamily;
                        // margin-right: 20px;
                        // margin-right: 8%;
                        width: 70%;
                        line-height: 150%;
                        @include breakpoint(980px) {
                            width: 60%;
                            // margin-bottom: 8px;
                        }
                        @include breakpoint(760px) {
                            width: 70%;
                            margin-bottom: 0;
                        }
                        @include breakpoint(460px) {
                            width: 100%;
                            margin-bottom: 8px;
                        }
                    }
                    #checkOut_submitCode {
                        font-family: $fontFamily;
                        font-size: $fontSize * 0.875;
                        font-weight: bold;
                        background-color: $OffWhite;
                        border-radius: 20px;
                        padding: 8px 12px;
                        border: 1px solid $Gold;
                        // line-height: 150%;
                        cursor: pointer;
                        // margin: auto;
                    }
                }
                .checkOut_amount {
                    .checkOut_amount_subtotal {
                        display: flex;
                        justify-content: space-between;
                        margin-bottom: 8px;
                        h5 {
                            font-weight: normal;
                        }
                    }
                    .checkOut_amount_discount {
                        display: flex;
                        justify-content: space-between;
                        margin-bottom: 8px;
                        h5 {
                            font-weight: normal;
                        }
                    }
                    .checkOut_amount_total {
                        display: flex;
                        justify-content: space-between;
                        // margin-bottom: 16px;
                    }
                }
            }
        }
    }
}

.checkOut_pay {
    width: 100%;
    border: 1px solid $Gold;
    margin-top: 20px;
    border-radius: 20px;
    padding: 12px 0 16px 16px;
    font-family: $fontFamily;
    position: relative;
    z-index: 2;
    h4 {
        padding-left: 8px;
        font-weight: bold;
        line-height: 150%;
        margin-bottom: 12px;
    }
    .checkOut_pay_method{
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        #checkOut_creditCard {
            margin-left: 8px;
            margin-bottom: -1px;
            width: 16px;
            height: 16px;
            border: 1px solid $Gold;
            cursor: pointer;
        }
        span {
            margin-right: 20px;
            padding-left: 8px;
            cursor: pointer;
        }
        p{
            margin-left: 10%;
            color: $Red;
            font-weight: bold;
        }
    }
    .creditCard_zone {
        width: 94%;
        background-color: #f5f5f5;
        padding: 12px 20px;
        margin-right: 20px;
        h5{
            margin-bottom: 8px;
            font-size: $fontSize * 0.875;
            &::after {
                content: "*";
                margin-left: 4px;
                color: rgb(224, 68, 61);
            }
        }
        #cardNumber{
            border: 1px solid $Gold;
            border-radius: 8px;
            padding: 5px 10px;
            font-size: $fontSize * 0.875;
            font-family: $fontFamily;
            width: 100%;
        }
        ul{
            margin-top: 12px;
            display: flex;
            li{
                &:first-child{
                    margin-right: 16px;
                }
                input{
                    border: 1px solid $Gold;
                    border-radius: 8px;
                    padding: 5px 10px;
                    font-size: $fontSize * 0.875;
                    font-family: $fontFamily;
                    width: 100%;
                }
            }
        }
        // display: flex;
        // align-items: center;
        // margin-bottom: 20px;
        // @include breakpoint(980px) {
        //     flex-wrap: wrap;
        //     margin-left: 10%;
        // }
        // @include breakpoint(460px) {
        //     flex-wrap: wrap;
        // }
        // .creditCard {
        //     // display: flex;
        //     // align-items: center;
        //     // @include breakpoint(980px) {
        //     //     margin-right: 20px;
        //     //     margin-bottom: 8px;
        //     // }
        //     // @include breakpoint(760px) {
        //     //     margin: 0;
        //     // }
        //     // @include breakpoint(460px) {
        //     //     margin-right: 20px;
        //     //     margin-bottom: 8px;
        //     // }
        // }

        // .linePay {
        //     display: flex;
        //     align-items: center;
        //     #checkOut_linePay {
        //         margin-left: 8px;
        //         margin-bottom: -1px;
        //         width: 16px;
        //         height: 16px;
        //         cursor: pointer;
        //     }
        // }
    }
}

.checkOut_nextStep {
    position: relative;
    @include breakpoint(760px) {
        position: unset;
    }
    #checkOut_next {
        position: absolute;
        z-index: 2;
        font-size: $fontSize * 1.25;
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
        margin-top: 20px;
        @include breakpoint(1280px) {
            margin-top: 12px;
        }
        @include breakpoint(980px) {
            margin-top: 20px;
        }
        @include breakpoint(760px) {
            position: relative;
            margin: 0;
            left: 50%;
            bottom: 80px;
            transform: translate(-50%);
        }
        @include breakpoint(560px) {
            bottom: 66px;
            padding: 8px 20px;
            width: unset;
        }
        @include breakpoint(460px) {
            bottom: 56px;
        }
    }
}

#checkOut_cantNext {
    position: absolute;
    z-index: 2;
    font-size: $fontSize * 1.25;
    padding: 8px 44px;
    background-color: $Gray;
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
    margin-top: 20px;
    @include breakpoint(1280px) {
        margin-top: 12px;
    }
    @include breakpoint(980px) {
        margin-top: 20px;
    }
    @include breakpoint(760px) {
        position: relative;
        margin: 0;
        left: 50%;
        bottom: 80px;
        transform: translate(-50%);
    }
    @include breakpoint(560px) {
        bottom: 66px;
        padding: 8px 20px;
        width: unset;
    }
    @include breakpoint(460px) {
        bottom: 56px;
    }
}

.checkOut_emptyCart {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-top: 5vw;
    h4 {
        margin-bottom: 12px;
    }

    .emptyCart_btn {
        font-size: $fontSize;
        padding: 12px 20px;
        background-color: $Gold;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        font-family: $fontFamily;
    }
}
</style>
