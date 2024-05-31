<template>
    <!-- top-banner -->
    <div class="food-top-banner">
        <div class="food-text-box">
            <h2 class="food-h2-text">
            「探索高麗的傳統美味」
            </h2>
            <h1 class="food-h1-text">
            韓食文化
            </h1>
        </div>
    </div>


    <!-- bottom -->
    <div class="food-bottom">
    <div class="food-bottom-box">
        <p class="food-bottom-text">秉持對食物的熱情，繼續探索韓食的美好。</p>
        <a href="#">點擊看更多</a>
    </div>

    </div>

</template>

<script>
  import { defineComponent } from "vue";
  export default defineComponent({
    name: "TopBanner,Bottom",
  });
  
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";
/* top-banner */
.food-top-banner {
    width: 100%;
    height: 100vh;
    background-color: #000000;
    background-image: url(/src/assets/Image/food/food_banner.jpeg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    .food-text-box {
        display: grid;
        place-items: center; /* 水平垂直置中 */
        margin: 0 auto;
        background-image: url(/src/assets/Image/food/food_banner_small.png);
        width: 674px;
        height: 413px;
        h2 {
            text-align: center;
            color: #FFF4EB;
        }
        h1 {
            text-align: center;
            color: #FFF4EB;
            font-size: $bigTitle;
        }
    }
}


/* bottom */
.food-bottom{
    width: 100%;
    height: 226px;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url(/src/assets/Image/food/food_bottom.jpeg);
    .food-bottom-box{
        display: grid;
        place-items: center; /* 水平垂直置中 */
        margin: 0 auto;
        .food-bottom-text{
        font-size: 24px;
        color: #F6F1ED;
        }
        & a{
        font-size: 24px;
        color: #F6F1ED;
        }
    /* .food-bottom-box a:hover{} */
    }
}
</style>