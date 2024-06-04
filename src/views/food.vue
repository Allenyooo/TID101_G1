<template>
    <!-- top-banner -->
    <div class="food-top-banner">
        <div class="food-banner-cover">
            <div class="food-text-box">
                <h2 class="food-h2-text">
                「探索高麗的傳統美味」
                </h2>
                <h1 class="food-h1-text">
                韓食文化
                </h1>
            </div>
        </div>
    </div>

    <!-- food-main-description -->
    <div class="food-description-blue" id="article1">
        <h1>
            主食 밥면
        </h1>
        <h4>
            韓國的主食文化以米飯為主，米飯是餐桌上的核心，也會加入糯米、紅豆等增加風味。韓國人也喜愛各類麵食，如冷麵和拌麵。冷麵清爽的口感適合夏季食用，而拌麵則辛辣和多樣的配料深受大眾喜愛。白米飯和麵食共同構成了韓國主食文化的重要部分，反映了韓國人對健康主食的追求。
        </h4>
    </div>

    <!-- food-category-main -->
    <div class="food-category">
        <div class="food-category-left">
            <img src="../assets/Image/food/food_half_circle.png" class="food-img-back">
            <div class="img-circle-big">
                <img src="../assets/Image/food/food_cold_noodle.jpeg" id="food-img-front">
            </div>
        </div>
        <div class="food-category-middle">
            <div class="food-category-middle-text">
                <h1>韓式冷麵냉면</h1>
                <h4>韓式冷麵是一道韓國傳統美食，特別受夏季歡迎，主要有兩種類型：水冷麵和拌冷麵。水冷麵以冰涼的牛骨湯或雞湯為基底，口感清爽；拌冷麵則以辣椒醬拌勻，風味辛辣。冷麵的麵條由蕎麥或馬鈴薯澱粉製成，細而有彈性。這道菜常搭配切片牛肉、雞蛋和黃瓜片，既美味又解暑。</h4>
            </div>
            <!-- 小圖Swiper套件 -->
            <div class="categoru-detail">
            <button @click="nextSlide"><img src="/src/assets/Image/food/food_left_arrow.png" alt="" /></button>
            <ul>
            <li v-for="(item, index) in displayedItems" :key="index">
                <a href="">
                <div class="img-circle-small">
                    <img :src="item.image" alt="" />
                </div>
                <p>{{ item.text }}</p>
                </a>
            </li>
            </ul>
            <button @click="prevSlide"><img src="/src/assets/Image/food/food_right_arrow.png" alt="" /></button>
        </div>
        </div>
        <div class="food-category-right">
            <div class="category-item"><a href="#article1">
                <div class="category-icon primary-color"></div></a>
                <p class="category-text">主食</p>
            </div>
            <div class="category-item"><a href="#article2">
                <div class="category-icon gold-color"></div></a>
                <p class="category-text">肉類</p>
            </div>
            <div class="category-item"><a href="#article3">
                <div class="category-icon gold-color"></div></a>
                <p class="category-text">海鮮</p>
            </div>
            <div class="category-item"><a href="#article4">
                <div class="category-icon gold-color"></div></a>
                <p class="category-text">小菜</p>
            </div>
            <div class="category-item"><a href="#article5">
                <div class="category-icon gold-color"></div></a>
                <p class="category-text">湯品</p>
            </div>
  
        </div>
    </div>
    <!-- ----------------------------------------------------------------- -->

    <div class="food-description-red" id="article2">
        <h1>
            肉類 고기
        </h1>
        <h4>
            韓國的肉類飲食文化豐富多樣，以烤肉為代表。烤肉是一種社交活動，家人或朋友聚在一起在炭火上烤製各種肉類，如牛肉、豬肉和雞肉。除了烤肉，還有燉牛肉和韓式炸雞。韓國肉類飲食重視品質和調味，常搭配各種小菜和醬料一起享用，展現了韓國人對美食和社交的熱愛。
        </h4>
    </div>
    <!-- food-category-meat -->
    
    <div class="food-description-blue" id="article3">
        <h1>
            海鮮 해물
        </h1>
        <h4>
            韓國的海鮮飲食文化擁有豐富多樣的海產品，海鮮在飲食中也佔有重要地位，如生魚片、海鮮湯、海鮮煎餅等。韓國人喜歡將新鮮的海鮮生吃或烹煮，搭配醬料和小菜，味道鮮美。此外，韓國還有豐富的海鮮醃製和發酵食品，如韓國泡菜中的醃製海鮮，展現了海洋資源的多樣性和韓國人對食材的巧妙應用。
        </h4>
    </div>
    <!-- food-category-seafood -->
    
    <div class="food-description-red" id="article4">
        <h1>
            小菜 반찬
        </h1>
        <h4>
            韓國的小菜飲食文化獨具特色，被視為餐桌上不可或缺的一部分。小菜種類繁多，包括泡菜、醃製蔬菜、炒菜、煎餅等，提供多樣的風味和營養。這些小菜與主食搭配使用，韓國人重視小菜的製作工藝和味道，認為小菜反映了餐廳或家庭的品質和風格，是韓國飲食文化中不可或缺的一部分。
        </h4>
    </div>
    <!-- food-category-sideDish -->
    
    <div class="food-description-blue" id="article5">
        <h1>
            湯品 국
        </h1>
        <h4>
            韓國的湯品飲食文化源遠流長，湯在韓國飲食中佔有重要地位，被視為滋補身體、補充營養的重要途徑。韓國湯類繁多，包括清湯、辣湯、醬汁湯等，以及加入各種肉類、海鮮和蔬菜的燉煮湯品。韓國人相信湯能促進健康、保持體力，因此在日常生活中經常享用各種湯品。
        </h4>
    </div>
    <!-- food-category-soup -->
   
    <!-- bottom -->
    <div class="food-bottom">
        <div class="food-bottom-cover">
            <div class="food-bottom-box">
                <p class="food-bottom-text">秉持對食物的熱情，繼續探索韓食的美好。</p>
                <a href="#">點擊看更多</a>
            </div>
        </div>    
    </div>

</template>

<script>
  import { defineComponent } from "vue";

//主食swiper小圖輪播
import foodHalfCircle from '../assets/Image/food/food_half_circle.png';
import foodColdNoodle from '../assets/Image/food/food_cold_noodle.jpeg';
import steamWhiteRice from '../assets/Image/food/steam_white_rice.jpg';
import blackBeanNoodles from '../assets/Image/food/food_black_bean_noodles.jpg';
import bibimbap from '../assets/Image/food/food_bibimbap.jpeg';
import ShinRamyun from '../assets/Image/food/food_ShinRamyun.jpeg';
import leftArrow from '../assets/Image/food/food_left_arrow.png';
import rightArrow from '../assets/Image/food/food_right_arrow.png';

export default {
  data() {
    return {
      currentSlide: 0,
      items: [
        { image: foodColdNoodle, text: '韓式冷麵' },
        { image: steamWhiteRice, text: '白飯' },
        { image: blackBeanNoodles, text: '韓式炸醬麵' },
        { image: bibimbap, text: '石鍋拌飯' },
        { image: ShinRamyun, text: '辛拉麵' },
      ],
    };
  },
  computed: {
    displayedItems() {
      let start = this.currentSlide;
      let end = start + 4;
      let slides = this.items.slice(start, end);

      if (end > this.items.length) {
        slides = slides.concat(this.items.slice(0, end - this.items.length));
      }

      return slides;
    },
  },
  methods: {
    nextSlide() {
      this.currentSlide = (this.currentSlide + 1) % this.items.length;
    },
    prevSlide() {
      this.currentSlide = (this.currentSlide - 1 + this.items.length) % this.items.length;
    },
  },
};
  
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";
/* top-banner */
.food-top-banner {
    width: 100vw;
    height: 100vh;
    background-image: url(/src/assets/Image/food/food_banner.jpeg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    .food-banner-cover {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        
        display: flex;
        align-items: center;
        justify-content: center;
    
        .food-text-box {
            display: flex;
            justify-content: center;
            flex-direction: column;
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
}
/* food-main-description */ 
.food-description-blue{
    max-width: 100vw;
    background-color: #073763;
    justify-content: center;
    padding: 56px 268px 40px;
    h1{
        text-align: center;
            color: #FFF4EB;
            margin-bottom: 44px;
    }
    h4{
        text-align: center;
            color: #FFF4EB;
            line-height: 1.5;
    }
}

.food-description-red{
    max-width: 100vw;
    background-color: #CB4847;
    justify-content: center;
    padding: 56px 268px 40px;
    h1{
        text-align: center;
            color: #FFF4EB;
            margin-bottom: 44px;
    }
    h4{
        text-align: center;
            color: #FFF4EB;
            line-height: 1.5;
    }
}
/* food-category */ 
.food-category{
    width: 100vw;
    height: 809px;
    background-color:#F6F1ED;
    display: flex;
    .food-category-left{
        flex: 2;
        position: relative;
        .food-img-back{
            z-index: 1;
        }
        .img-circle-big{
            z-index: 2;
            top: 170px;
            left: 119px;
            width: 300px;
            height: 300px;
            background-color:#CB4847;
            overflow: hidden;
            border-radius: 50%;
            display: flex;
            position: absolute;
            img{
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
                }  
            }
        }
    }
    .food-category-middle{
        margin-top: 107px;
        flex: 3;
        text-align: center;
        .food-category-middle-text{
            max-width: 100%;
            
            h1{
                color:#CB4847;
                margin-bottom: 72px;
                
            }
            h4{
                margin-bottom: 72px
            }
        }
        .categoru-detail{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center; /* 这将使图片在垂直方向上居中 */
            button{
                background: none;  /* 移除背景 */
                border: none;
                cursor: pointer;
                &:hover{
                filter: drop-shadow(0 0 30px $Gold);
                }  
                img{
                max-height: 45px;   
                }
            }          
            ul{
                display: flex;
                flex-direction: row;
                
                li{
                    margin:0 15px;
                    width: 136px;
                    height: 214px;
                    background-color: #DBCEC6;
                    border-radius:30px;
                    text-align: center;
                    a{
                        text-decoration: none;
                        &:hover{
                        filter: drop-shadow(0 0 30px $Gold);
                        }
                    }                   
                    .img-circle-small{
                        margin-top: 28px;
                        width: 96px;
                        height: 96px;
                        overflow: hidden;
                        border-radius: 50%;
                        margin: 0 auto;
                        margin-bottom: 32px;
                        margin-top: 28px;
                        display: flex;
                       img{
                        max-width: 100%;
                        max-height: 100%;
                        width: auto;
                        height: auto;
                       }  
                    }
                    p{
                        font-size: 20px;
                        color: #7A625B;
                        line-height: 1.5;
                    }
                }
            }
        }       
    }
    .food-category-right{
        flex: 1;
        display: flex;
        flex-direction: column;
        max-width: 100%;
        font-size: 20px;
        color: #999;
        text-align: center;
        line-height: 150%;
        padding-top: 281px;
        padding-left: 36px;
        
        .category-item {
            display: flex;
            margin-bottom: 16px; 
        }
        .category-icon {
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin-right: 8px;
        }
        .primary-color {
            background-color: var(--Primary-Trello-Red, #cb4847);
        }
        .gold-color {
            background-color: var(--Primary-Gold, #c3a988);
        }
        .category-text {
            margin: auto 0;
            font-size: 20px;
            color:$Gold;
        }
        a{
            text-decoration: none;
            &:hover{
            filter: drop-shadow(0 0 30px $Gold);
            }
        }
    }
/* bottom */
.food-bottom{
    width: 100vw;
    height: 226px;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url(/src/assets/Image/food/food_bottom.jpeg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    .food-bottom-cover{
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        .food-bottom-box{
            display: flex;
            flex-direction: column;
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
}

</style>