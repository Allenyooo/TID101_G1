<script>
import shopcard from "../components/Shopcard.vue";

export default {
  components: { shopcard },

  data() {
    return {
        marker1Src : "/src/assets/Image/map/unmarker.png",
        marker2Src : "/src/assets/Image/map/unmarker.png",
        marker3Src : "/src/assets/Image/map/unmarker.png",
    };
  },

  methods: {
    backToIsland() {
        this.$router.push('/map');
    },
    markLight1() {
        this.marker1Src="/src/assets/Image/map/marker.png";
    },
    unmarker1() {
        this.marker1Src="/src/assets/Image/map/unmarker.png";
    },
    markLight2() {
        this.marker2Src="/src/assets/Image/map/marker.png";
    },
    unmarker2() {
        this.marker2Src="/src/assets/Image/map/unmarker.png";
    },
    markLight3() {
        this.marker3Src="/src/assets/Image/map/marker.png";
    },
    unmarker3() {
        this.marker3Src="/src/assets/Image/map/unmarker.png";
    }
  },
};

</script>

<template>
    <section >
        <div class="filter" @click="backToIsland"></div>
        <div class="sidemap">
            <div class="nmap">
                <span>
                    <img :src="marker1Src" alt="">
                </span>
                <span>
                    <img :src="marker2Src" alt="">
                </span>
                <span>
                    <img :src="marker3Src" alt="">
                </span>
            </div>
        </div>
        <ul class="shops">
        <div class="map_shoptitle">
            <h1>精 選 店 家</h1>
        </div>

        <router-link to="/restaurant" class="marker">
            <shopcard can_hover="true" @mouseenter.native="markLight1" @mouseleave.native="unmarker1"></shopcard>
        </router-link>

        <router-link to="/restaurant" class="marker">
            <shopcard can_hover="true" @mouseenter.native="markLight2" @mouseleave.native="unmarker2"></shopcard>
        </router-link>

        <router-link to="/restaurant" class="marker">
            <shopcard can_hover="true" @mouseenter.native="markLight3" @mouseleave.native="unmarker3"></shopcard>
        </router-link>

        </ul>
    </section>
</template>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.marker{
    text-decoration: none;
    color: #333;
}

section {
  display: none;

  .filter{
    width: 100vw;
    height: 100vh;
    background-color: #333333;
    opacity: 0.8;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 15; 
  }
  .cards {
    margin-bottom: 24px;
  }

  .sidemap {
    // outline: 1px blue solid;
    position: fixed;
    top: 10vh;
    left: 5.5vw;
    z-index: 20;
    .nmap {
      background-image: url("../assets/Image/map/eastsideOpen2.png");
      width: 443px;
      height: 689px;
      opacity: 1;
      position: relative;
      // object-fit: cover;
      & span:nth-child(1){
        position: absolute;
        top: 25%;
        right: 35%;
      }
      & span:nth-child(2){
        position: absolute;
        top: 40%;
        right: 40%;
      }
      & span:nth-child(3){
        position: absolute;
        top: 70%;
        right: 70%;
      }
    }

    & h1 {
      font-size: $fontSize * 32;
      display: inline-block;
    }
  }

  .shops {
    position: fixed;
    top: 10vh;
    right: 15vw;
    z-index: 16;
    width: 460px;

    .map_shoptitle {
      width: 312px;
      height: 88px;
      background-image: url(/src/assets/Image/map/bannerBGI.png);
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto;
      margin-bottom: 5vh;

      h1 {
        font-size: $fontSize * 2;
      }
    }
  }
}
</style>