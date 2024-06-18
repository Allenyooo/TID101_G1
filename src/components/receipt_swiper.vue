<template>
    <swiper
      :cssMode="true"
      :navigation="true"
      :pagination="true"
      :mousewheel="true"
      :keyboard="true"
      :modules="modules"
      class="mySwiper"
    >
    <swiper-slide>
      <h3>$100 梨饗券</h3>
      <img src="../assets/Image/receipt/QRcode.png" alt="">
    </swiper-slide>

    <swiper-slide>
      <h3>$300 梨饗券</h3>
      <img src="../assets/Image/receipt/QRcode.png" alt="">
    </swiper-slide>

    <swiper-slide>
      <h3>$500 梨饗券</h3>
      <img src="../assets/Image/receipt/QRcode.png" alt="">
    </swiper-slide>

    <swiper-slide>
      <h3>$800 梨饗券</h3>
      <img src="../assets/Image/receipt/QRcode.png" alt="">
    </swiper-slide>

    <swiper-slide>
      <h3>$1000 梨饗券</h3>
      <img src="../assets/Image/receipt/QRcode.png" alt="">
      <!-- <ul class="coupon_info">
          <li>
              <h5>序號</h5>
              <h5>24KK2988EFIJ</h5>
          </li>
          <li>
              <h5>使用期限</h5>
              <h5>2025/12/31</h5>
          </li>
      </ul> -->
    </swiper-slide>
    
  </swiper>
</template>

<script>
  // Import Swiper Vue.js components
  import { Swiper, SwiperSlide } from 'swiper/vue';

  // Import Swiper styles
  import 'swiper/css';

  import 'swiper/css/navigation';
  import 'swiper/css/pagination';   

//   import './style.css';

  // import required modules
  import { Navigation, Pagination, Mousewheel, Keyboard } from 'swiper/modules';

  export default {
    components: {
      Swiper,
      SwiperSlide,
    },
    data() {
      return {
        modules: [Navigation, Pagination, Mousewheel, Keyboard],
      };
    },
  };
</script>


<style>

.swiper-slide {
  display: flex;
  justify-content: center;
  flex-flow: wrap;
}

.swiper-slide h3{
  margin-top: 44px;
  /* margin-bottom: 28px; */
  color: #fff;
}

.swiper-slide img {
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
}

.swiper-button-prev, .swiper-button-next{
    width: 12px;
    height: 24px;
    align-items: unset;
    justify-content: unset;
    top: var(--swiper-navigation-top-offset, 59%);
}

.swiper-button-prev:after, .swiper-rtl .swiper-button-next:after{
    content: "";
    background-image: url(../assets/Image/receipt/arrow_left.svg);
    background-size: contain;
    background-repeat: no-repeat;
    width: 12px;
    height: 24px;
}

.swiper-button-next:after, .swiper-rtl .swiper-button-prev:after{
    content: "";
    background-image: url(../assets/Image/receipt/arrow_right.svg);
    background-size: contain;
    background-repeat: no-repeat;
    width: 12px;
    height: 24px;
}

.swiper-horizontal > .swiper-pagination-bullets .swiper-pagination-bullet, .swiper-pagination-horizontal.swiper-pagination-bullets .swiper-pagination-bullet{
    background: #7A625B;
}

.swiper-pagination-bullet{
    width: var(--swiper-pagination-bullet-width, var(--swiper-pagination-bullet-size, 12px));
    height: var(--swiper-pagination-bullet-height, var(--swiper-pagination-bullet-size, 12px));
    opacity: var(--swiper-pagination-bullet-inactive-opacity, 0.3);
}

.swiper-pagination-bullet-active {
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
  