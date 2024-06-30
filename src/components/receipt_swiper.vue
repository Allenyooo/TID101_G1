<template>
    <swiper
        :cssMode="true"
        :navigation="true"
        :pagination="true"
        :mousewheel="true"
        :keyboard="true"
        :modules="modules"
        @slideChange="onSlideChange"
        class="mySwiper"
    >
        <swiper-slide 
            class="receipt-swiper-slide" 
            v-for="(receipt, index) in receipts" 
            :key="receipt.id" 
            :id="receipt.id" 
            @click="used(receipt)">

            <h3>{{ receipt.name }}</h3>
            <img src="../assets/Image/receipt/QRcodeUsed.png" class="QRcodeUsed" v-if="receipt.codeUsed == true">
            <img :src="receipt.imgSrc" class="receiptImg">

        </swiper-slide>
        <!-- 
        <swiper-slide class="receipt-swiper-slide">
            <h3>$300 梨饗券</h3>
            <img src="../assets/Image/receipt/QRcode.png" alt="" />
        </swiper-slide>

        <swiper-slide class="receipt-swiper-slide">
            <h3>$500 梨饗券</h3>
            <img src="../assets/Image/receipt/QRcode.png" alt="" />
        </swiper-slide>

        <swiper-slide class="receipt-swiper-slide">
            <h3>$800 梨饗券</h3>
            <img src="../assets/Image/receipt/QRcode.png" alt="" />
        </swiper-slide>

        <swiper-slide class="receipt-swiper-slide">
            <h3>$1000 梨饗券</h3>
            <img src="../assets/Image/receipt/QRcode.png" alt="" />
        </swiper-slide> -->
    </swiper>
</template>

<script>
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";

// Import Swiper styles
import "swiper/css";

import "swiper/css/navigation";
import "swiper/css/pagination";

//   import './style.css';

// import required modules
import { Navigation, Pagination, Mousewheel, Keyboard } from "swiper/modules";

export default {
    components: {
        Swiper,
        SwiperSlide,
    },
    mounted(){
        // this.receipts.forEach(receipt => {
        //     this.getQrCode(receipt)
        // })
        this.getOrderID();
        this.getReceiptNumber();
        this.getReceiptStatus();
    },
    data() {
        return {
            modules: [Navigation, Pagination, Mousewheel, Keyboard],
            receipts:[
                // {
                //     id: 17196448591,
                //     name: "$100 梨饗券",
                //     // imgSrc: new URL("/assets/Image/receipt/QRcode.png", import.meta.url).href,
                //     imgSrc: "",
                //     codeUsed: false
                // }
            ],
        };
    },
    methods: {
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
        getQrCode(){
            this.receipts.forEach(receipt => {
                receipt.imgSrc = new URL("https://api.pwmqr.com/qrcode/create/?url=" + receipt.id)
                // console.log(receipt.imgSrc);
            })
        },
        async getReceiptNumber(){
            let orderID = this.getOrderID();
            fetch(`${import.meta.env.VITE_PHP_PATH}receipt/receiptNumber.php`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    orderID: orderID
                })
            })
                .then((resp) => resp.json())
                .then((receiptNumberDB) => {
                    // console.log(receiptNumberDB);
                    this.receipts = receiptNumberDB;
                    // this.receipts[index].codeUsed = false;
                    // this.receipts.forEach(receipt => {
                    //     receipt.codeUsed = false
                    // });
                    this.getQrCode();
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        onSlideChange(swiper) {
            const activeIndex = swiper.activeIndex;
            const receiptID = this.receipts[activeIndex].id;
            this.$emit('sendMsg', receiptID);
        },
        // showID(index){
        //     console.log(this.receipts[index].id);
        //     const receiptID = this.receipts[index].id;
        //     this.$emit('sendMsg',receiptID);
        //     // console.log(receiptID);
        // },
        async getReceiptStatus() {
            let orderID = this.getOrderID();
            fetch(`${import.meta.env.VITE_PHP_PATH}receipt/receiptStatus.php`,{
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        orderID: orderID
                    }),
                }
            )
                .then((resp) => resp.json())
                .then((receiptDB) => {
                    console.log(receiptDB);
                    // console.log(index);
                    this.receipts.forEach(receipt => {
                        // const status = array.includes(receipt.id);
                        let status = receiptDB.find(item => item.sn === receipt.id);
                        if (status) {
                            receipt.codeUsed = true;
                        } else {
                            receipt.codeUsed = false;
                        }
                    });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async used(receipt) {
            receipt.codeUsed = true;
            fetch(`${import.meta.env.VITE_PHP_PATH}receipt/usedReceipt.php`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    receiptID: receipt.id,
                    status: receipt.codeUsed
                })
            })
        }
    },
};
</script>

<style scoped>
.receipt-swiper-slide {
    display: flex;
    justify-content: center;
    flex-flow: wrap;
}

.receipt-swiper-slide h3 {
    margin-top: 44px;
    /* margin-bottom: 28px; */
    color: #fff;
}

.QRcodeUsed{
    width: 50%;
    position: absolute;
    top: 34%;
    left: 24%;
    background-color: rgba(255, 255, 255, 0.95);
    padding: 35px;
}

.receipt-swiper-slide .receiptImg {
    background-color: #fff;
    padding: 20px 16px;
    border-radius: 10px;
    display: block;
    /* width: 80%; */
    width: 180px;
    height: 168px;
    /* height: 80%; */
    object-fit: cover;
    margin-bottom: 28px;
    /* position: relative; */
}

::v-deep .swiper-button-prev,
::v-deep .swiper-button-next {
    width: 12px;
    height: 24px;
    align-items: unset;
    justify-content: unset;
    top: var(--swiper-navigation-top-offset, 59%);
}

::v-deep .swiper-button-prev:after,
::v-deep .swiper-rtl .swiper-button-next:after {
    content: "";
    background-image: url(../assets/Image/receipt/arrow_left.svg);
    background-size: contain;
    background-repeat: no-repeat;
    width: 12px;
    height: 24px;
}

::v-deep .swiper-button-next:after,
::v-deep .swiper-rtl .swiper-button-prev:after {
    content: "";
    background-image: url(../assets/Image/receipt/arrow_right.svg);
    background-size: contain;
    background-repeat: no-repeat;
    width: 12px;
    height: 24px;
}

::v-deep
    .swiper-horizontal
    > .swiper-pagination-bullets
    .swiper-pagination-bullet,
::v-deep
    .swiper-pagination-horizontal.swiper-pagination-bullets
    .swiper-pagination-bullet {
    background: #7a625b;
}
::v-deep
    .swiper-pagination-bullets {
    bottom: var(--swiper-pagination-bottom, 16px);
}

::v-deep .swiper-pagination-bullet {
    width: var(
        --swiper-pagination-bullet-width,
        var(--swiper-pagination-bullet-size, 12px)
    );
    height: var(
        --swiper-pagination-bullet-height,
        var(--swiper-pagination-bullet-size, 12px)
    );
    opacity: var(--swiper-pagination-bullet-inactive-opacity, 0.3);
}

::v-deep .swiper-pagination-bullet-active {
    opacity: var(--swiper-pagination-bullet-opacity, 1);
}

.coupon_info {
    width: 168px;
    height: 60px;
    margin: 12px auto 0;
    color: #fff;
}

.coupon_info li {
    display: flex;
    justify-content: space-between;
}

.coupon_info li:first-child {
    margin-bottom: 8px;
}
</style>
