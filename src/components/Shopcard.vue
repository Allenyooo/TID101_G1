<script>


export default {

  props: {
    isHoverEnabled: {
      type: Boolean,
      default: true,
    },
    shop: {
      type: Object,
      required: true,
      // {
      //     ID: 1,
      //     SNAME: '高麗味',
      //     REGION: '北',
      //     MNAME: 'Allen',
      //     CONTENT: '超級好吃blablablabla...',
      //     TIME: '2024-06-22'
      // }
    },
  },

  data() {
    return {
      hovered: false,
      pics: "",
    };
  },

  methods: {
    cardOpen() {
      this.hovered = !this.hovered;
    },
    formatDate(datetime) {
      const date = new Date(datetime);
      const year = date.getFullYear();
      const month = String(date.getMonth() + 1).padStart(2, "0"); // 月份從0開始,所以+1
      const day = String(date.getDate()).padStart(2, "0");
      return `${year}-${month}-${day}`;
    },
    async fetchPic() {
      const response = await fetch(
        `${import.meta.env.VITE_PHP_PATH}map/pics.php?storeId=${this.shop.ID}`
      );
      const picData = await response.text();
      this.pics = picData;
      console.log(picData);
    },
  },

  mounted() {
    // let cookie = document.cookie;
    // let getId = cookie.match(/memberId=(\d+)/);

    // console.log(getId);

    // if (getId) {
    //   this.fetchPic();
    // }
    this.fetchPic();
  },
  computed: {
    lowerString() {
      const length = 15;
      if (!this.shop.CONTENT) return "";
      return this.shop.CONTENT.length > length
        ? this.shop.CONTENT.substring(0, length) + "..."
        : this.shop.CONTENT;
    },
  },
};
</script>

<template>
  <router-link to="/restaurant" class="marker">
    <!-- <li :class="{ map_open : hovered }" @mouseover="cardOpen" @mouseleave="cardOpen"> -->
    <li
      @mouseenter="$emit('mouseenter')"
      @mouseleave="$emit('mouseleave')"
      :class="{ 'no-hover': !isHoverEnabled }"
    >
      <div class="normal">
        <img :src="this.pics" alt="" />
        <div class="shopinfo">
          <h3>{{ shop.SNAME }}</h3>
          <div class="content">
            <div class="address">
              <img src="/src/assets/Image/map/addressLogo.png" alt="" />
              <h5>{{ shop.REGION }}部地區</h5>
            </div>
            <div class="star">
              <img src="/src/assets/Image/map/star.png" alt="" />
              <h5>4.8</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="opened">
        <div class="card_header"></div>
        <div class="card_main">
          <div class="maininfo">
            <img :src="this.pics" class="shopImg" />
            <div class="maincontent">
              <div class="name_collect">
                <h2>{{ shop.SNAME }}</h2>
                <div class="collect"></div>
              </div>
              <div class="star_price">
                <div class="score">
                  <h4>4.8</h4>
                  <img src="/src/assets/Image/map/star.png" class="scorestar" />
                </div>
                <h4>( 100則評論 )</h4>
                <h4>．均消 $300</h4>
              </div>
              <div class="opentime">
                <img src="/src/assets/Image/map/clock.png" alt="" />
                <h4>營業時間 : 11:00 - 21:00</h4>
              </div>
              <div class="shop_address">
                <img src="/src/assets/Image/map/addressLogo.png" alt="" />
                <h4>台{{ shop.REGION }}市士林區忠誠路二段152號</h4>
              </div>
            </div>
          </div>
          <div class="bestreview">
            <div>
              <h4>最佳<br />評論</h4>
              <div class="reviewcontent">
                <h4>{{ lowerString }}</h4>
                <h5>
                  來自{{ shop.MNAME }} 於 {{ formatDate(shop.TIME) }} 的評論
                </h5>
              </div>
            </div>
            <img src="/src/assets/Image/map/koreawaybgi.png" alt="" />
          </div>
        </div>
      </div>
    </li>
  </router-link>
</template>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

@mixin breakpoint($point) {
  @media screen and (max-width: $point) {
    @content;
  }
}

li {
  display: block;
  transition: 0.1s;
  // outline: 2px solid red;
  width: 456px;
  // width: 24vw;
  height: 202px;
  // height: 36.59vh;
  background-color: $OffWhite;
  border-radius: 15px;
  position: relative;
  // margin-bottom: 24px;
  // margin: 0 auto;
  @include breakpoint(1280px) {
    width: 400px;
  }
  @include breakpoint(1080px) {
    width: 312px;
    height: 406px;
  }
  @include breakpoint(830px) {
    margin-right: 20px;
  }

  &:not(.no-hover) {
    &:hover {
      transition: 0.1s;
      width: 720px;
      height: 364px;
      @include breakpoint(1280px) {
        width: 650px;
      }
      @include breakpoint(1080px) {
        width: 312px;
        height: 406px;
        
      }
    }

    &:hover .opened {
      transition: 0.1s;
      width: 720px;
      height: 364px;
      z-index: 20;
      // margin-left: -28%;
      opacity: 1;
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      @include breakpoint(1280px) {
        width: 650px;
      }
      @include breakpoint(1080px) {
        width: 312px;
        height: 406px;
      }
    }

    &:hover .normal {
      opacity: 0;
      transition: 0.1s;
      width: 460px;
      height: 202px;
      z-index: 0;
      display: none;
      // @include breakpoint(1080px) {
      //   width: 312px;
      //   height: 406px;
      // }
    }
  }
}

.normal {
  // outline: 1px red solid;
  width: 456px;
  height: 202px;
  // width: 24vw;
  // height: 36.59vh;
  border-radius: 15px;
  overflow: hidden;
  transition: 0.2s;
  transform-origin: 50% center;
  margin-bottom: 12px;
  @include breakpoint(1280px) {
    width: 400px;
  }
  @include breakpoint(1080px) {
    display: none;
  }

  img {
    width: 100%;
    height: 132px;
    object-fit: cover;
    display: block;
  }

  .shopinfo {
    width: 100%;
    height: 100%;
    background-color: $OffWhite;
    padding-left: 32px;
    padding-top: 4px;

    & h3 {
      margin-bottom: 4px;
      font-weight: bold;
    }

    .content {
      display: flex;
      align-items: center;

      & img {
        width: 16px;
        height: 16px;
        margin-right: 5px;
      }

      .address {
        display: flex;
        align-items: center;
        margin-right: 32px;
      }

      .star {
        display: flex;
        align-items: center;
      }
    }
  }
}

.opened {
  border-radius: 15px;
  background-color: $OffWhite;
  overflow: hidden;
  width: 720px;
  height: 364px;
  z-index: 0;
  opacity: 0;
  margin-bottom: 12px;
  display: none;
  @include breakpoint(1280px) {
    width: 650px;
  }
  @include breakpoint(1080px) {
    width: 312px;
    height: 406px;
    display: block;
    opacity: 1;
  }

  .card_header {
    width: 100%;
    height: 32px;
    background-color: $Red;
    @include breakpoint(1080px) {
      display: none;
    }
  }

  .card_main {
    margin: 20px 28px;
    @include breakpoint(1080px) {
      margin: 0 0;
    }
  }
}

.maininfo {
  display: flex;
  @include breakpoint(1080px) {
    width: 100%;
    display: block;
  }

  .shopImg {
    display: block;
    width: 244px;
    height: 186px;
    object-fit: cover;
    border-radius: 15px;
    margin-right: 28px;
    @include breakpoint(1080px) {
      width: 100%;
      border-radius: 0;
    }
  }
}

.maincontent {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  margin-bottom: 20px;
  @include breakpoint(1080px) {
    padding: 20px;
  }

  .name_collect {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    @include breakpoint(1080px) {
      margin-bottom: 8px;
    }
  }

  .star_price {
    display: flex;
    flex-direction: row;
    margin-bottom: 16px;

    // align-items: left;
    .score {
      width: 84px;
      height: 32px;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-around;
      background-color: #dbcec6;
      border-radius: 16px;
      // outline: 1px solid green;
      margin-right: 4px;

      h4 {
        display: inline-block;
        width: 30px;
        height: 30px;
      }

      .scorestar {
        display: block;
        width: 16px;
        height: 16px;
      }
    }

    & > h4:nth-child(2) {
      color: #999999;
      @include breakpoint(1080px) {
        display: none;
      }
    }
  }

  .opentime {
    display: flex;
    align-items: center;
    margin-bottom: 8px;

    img {
      width: 16px;
      height: 16px;
      margin-right: 8px;
    }
    h4 {
      @include breakpoint(1080px) {
        font-size: 16px;
      }
    }
  }

  .shop_address {
    display: flex;
    align-items: center;

    img {
      width: 16px;
      height: 16px;
      margin-right: 8px;
    }
    h4 {
      @include breakpoint(1080px) {
        font-size: 16px;
      }
    }
  }
}

.bestreview {
  display: flex;
  align-items: center;
  justify-content: space-around;
  background-color: #dbcec6;
  width: 100%;
  height: 88px;
  border-radius: 15px;
  @include breakpoint(1080px) {
    display: none;
  }

  & > div {
    display: flex;
    align-items: center;
    justify-content: space-around;

    & > h4 {
      width: 80px;
      height: 64px;
      text-align: center;
      background-color: #fff4eb;
      display: inline-block;
      font-weight: bold;
      border-radius: 20px;
      margin-right: 16px;
    }

    .reviewcontent {
      h4 {
        font-weight: bold;
      }

      h5 {
        color: #898888;
      }
    }
  }

  img {
    display: block;
    width: 64px;
    height: 64px;
    object-fit: cover;
    border-radius: 15px;
  }
}

// 不給hover效果

.member_collection .no-hover:hover {
  width: 460px;
  height: 202px;

  @include breakpoint(1280px) {
    width: 400px;
  }
  @include breakpoint(1080px) {
    width: 312px;
    height: 406px;
  }
  // @include breakpoint(830px) {
  //   margin-right: 20px;
  // }
}

.member_collection .no-hover:hover .normal {
  opacity: 1;
  transform: scale(1);
  display: block;
  @include breakpoint(1080px) {
    width: 312px;
    height: 406px;
  }
}

.member_collection .no-hover:hover .opened {
  opacity: 0;
  //   transform: scale(0.8);
  @include breakpoint(1080px) {
    width: 312px;
    height: 406px;
  }
}
</style>
