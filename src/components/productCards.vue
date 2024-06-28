<template>
  <swiper
    :effect="'cards'"
    :grabCursor="true"
    :modules="modules"
    class="mySwiper swiper"
  >
    <swiper-slide class="swiper-slide">
      <div class="pcImage i1"></div>
      <div class="pcText">
        <p>便利快捷</p>
        <h5>
          簡單的線上購買流程，隨時隨地輕鬆取得QR
          Code，無需等待即可享受美食體驗。
        </h5>
      </div>
    </swiper-slide>
    <swiper-slide class="swiper-slide">
      <div class="pcImage i2"></div>
      <div class="pcText">
        <p>多樣選擇</p>
        <h5>
          我們合作的餐廳涵蓋全台灣，從北到南，更延伸到東部，隨時隨地滿足您不同的口味喜好。
        </h5>
      </div>
    </swiper-slide>
    <swiper-slide class="swiper-slide">
      <div class="pcImage i3"></div>
      <div class="pcText">
        <p>優先訂位</p>
        <h5>
          梨饗券享有優先訂位之服務，預定前告知合作餐廳，不論何時、何地都能擁有訂位保留權。
        </h5>
      </div>
    </swiper-slide>
    <swiper-slide class="swiper-slide">
      <div class="pcImage i4"></div>
      <div class="pcText t4">
        <p>有效期一年</p>
        <h5>
          充足的使用時間，讓您有充分的彈性規劃，享受美味體驗，一年內任選時刻到訪合作餐廳。
        </h5>
      </div>
    </swiper-slide>

    >
  </swiper>
</template>
<script>
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";

// Import Swiper styles
import "swiper/css";

import "swiper/css/effect-cards";

// import "./style.css";

// import required modules
import { EffectCards } from "swiper/modules";

export default {
  components: {
    Swiper,
    SwiperSlide,
  },
  data() {
    return {
      modules: [EffectCards],
    };
  },
};
</script>

<style lang="scss" scoped>
.swiper {
  width: 60vw;
  height: 97.3vw;

  .swiper-slide {
    display: flex;
    flex-direction: column;
    align-items: center;
    /* justify-content: center; */
    border-radius: 18px;
    font-weight: bold;
    color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

    &:nth-child(1) {
      background-color: #ffffff;
    }
    &:nth-child(2) {
      background-color: #dbcec6;
    }
    &:nth-child(3) {
      background-color: #c8ac96;
    }
    &:nth-child(4) {
      background-color: #7a625b;
    }

    .pcImage {
      background-size: 100%;
      width: 40vw;
      height: 40vw;
      margin-top: 4.3vw;
      margin-bottom: 2vw;
    }

    .i1 {
      background-image: url("/src/assets/Image/product/system_update.png");
    }
    .i2 {
      background-image: url("/src/assets/Image/product/system_update2.png");
    }
    .i3 {
      background-image: url("/src/assets/Image/product/system_update3.png");
    }
    .i4 {
      background-image: url("/src/assets/Image/product/system_update4.png");
    }

    .pcText {
      width: 200px;

      p {
        font-size: 24px;
        color: #333333;
        text-align: center;
      }

      h5 {
        color: #333333;
      }
    }

    .t4 {
      p {
        color: #ffffff;
      }
      h5 {
        color: #ffffff;
      }
    }
  }
}
</style>
