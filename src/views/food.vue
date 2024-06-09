<template>
    <!-- top-banner -->
    <div class="food-top-banner">
        <div class="food-banner-cover">
            <div class="food-text-box">
                <h2 class="food-h2-text">「探索高麗的傳統美味」</h2>
                <h1 class="food-h1-text">韓食文化</h1>
            </div>
        </div>
    </div>
    <!-- 視差滾動第一個 -->
    <div class="food_selector_wrapper">
        <div class="food_selector_text">
            <div class="food_1st_scroll">
                <p class="left_text">從食材到餐盤</p>
                <div class="food_and_time">
                    <h1 class="inRed">食</h1>
                    <img
                        src="/src/assets/Image/food/food_spotlight.png"
                        alt=""
                    />
                    <h1 class="inBlue">時</h1>
                </div>
                <p class="right_text">的美味歷程</p>
            </div>
            <div class="scroll_down">
                <h2>往下滑動</h2>
                <img
                    src="/src/assets/Image/food/keyboard_double_arrow_down.png"
                    alt=""
                />
            </div>
        </div>
    </div>
    <!-- 視差滾動主欄位 -->
    <section class="horizontal">
        <div class="pin-wrap">
            <div class="animation-wrap to-right">
                <div class="item">
                    <a href="#article1"
                        ><img
                            src="/src/assets/Image/food/horizontal_main.png"
                            alt=""
                    /></a>
                </div>
                <div class="item">
                    <a href="#article2"
                        ><img
                            src="/src/assets/Image/food/horizontal_meat.png"
                            alt=""
                    /></a>
                </div>
                <div class="item">
                    <a href="#article3"
                        ><img
                            src="/src/assets/Image/food/horizontal_seafood.png"
                            alt=""
                    /></a>
                </div>
                <div class="item">
                    <a href="#article4"
                        ><img
                            src="/src/assets/Image/food/horizontal_sidedish.png"
                            alt=""
                    /></a>
                </div>
                <div class="item">
                    <a href="#article5"
                        ><img
                            src="/src/assets/Image/food/horizontal_soup.png"
                            alt=""
                    /></a>
                </div>
            </div>
        </div>
    </section>
    <!-- food-main-description -->
    <div class="food-description-blue" id="article1">
        <h1>主食 밥면</h1>
        <h4>
            韓國的主食文化以米飯為主，米飯是餐桌上的核心，也會加入糯米、紅豆等增加風味。韓國人也喜愛各類麵食，如冷麵和拌麵。冷麵清爽的口感適合夏季食用，而拌麵則辛辣和多樣的配料深受大眾喜愛。白米飯和麵食共同構成了韓國主食文化的重要部分，反映了韓國人對健康主食的追求。
        </h4>
    </div>

    <!-- food-category-main-主食 -->
    <div class="food-category">
        <div class="food-category-left">
            <img
                src="../assets/Image/food/food_half_circle.png"
                class="food-img-back"
            />
            <div class="img-circle-big">
                <img :src="currentItem.image" id="food-img-front" />
            </div>
        </div>
        <div class="food-category-middle">
            <div class="food-category-middle-text">
                <h1>{{ currentItem.title }}</h1>
                <h4>{{ currentItem.description }}</h4>
            </div>
            <!-- 小圖Swiper套件 -->
            <div class="category-detail">
                <button @click="prevSlide">
                    <img
                        src="/src/assets/Image/food/food_left_arrow.png"
                        alt=""
                    />
                </button>
                <ul>
                    <li v-for="(item, index) in displayedItems" :key="index">
                        <a href="#" @click.prevent="updateItem(index)">
                            <div class="img-circle-small">
                                <img :src="item.image" alt="" />
                            </div>
                            <p>{{ item.text }}</p>
                        </a>
                    </li>
                </ul>
                <button @click="nextSlide">
                    <img
                        src="/src/assets/Image/food/food_right_arrow.png"
                        alt=""
                    />
                </button>
            </div>
        </div>
        <!--右邊錨定欄位-->
        <div class="food-category-right">
            <div class="category-item">
                <a href="#article1">
                    <div class="category-icon primary-color"></div
                ></a>
                <p class="category-text">主食</p>
            </div>
            <div class="category-item">
                <a href="#article2">
                    <div class="category-icon gold-color"></div
                ></a>
                <p class="category-text">肉類</p>
            </div>
            <div class="category-item">
                <a href="#article3">
                    <div class="category-icon gold-color"></div
                ></a>
                <p class="category-text">海鮮</p>
            </div>
            <div class="category-item">
                <a href="#article4">
                    <div class="category-icon gold-color"></div
                ></a>
                <p class="category-text">小菜</p>
            </div>
            <div class="category-item">
                <a href="#article5">
                    <div class="category-icon gold-color"></div
                ></a>
                <p class="category-text">湯品</p>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- ----------------------------------------------------------------- -->

    <div class="food-description-red" id="article2">
        <h1>肉類 고기</h1>
        <h4>
            韓國的肉類飲食文化豐富多樣，以烤肉為代表。烤肉是一種社交活動，家人或朋友聚在一起在炭火上烤製各種肉類，如牛肉、豬肉和雞肉。除了烤肉，還有燉牛肉和韓式炸雞。韓國肉類飲食重視品質和調味，常搭配各種小菜和醬料一起享用，展現了韓國人對美食和社交的熱愛。
        </h4>
    </div>
    <!-- food-category-meat -->

    <div class="food-description-blue" id="article3">
        <h1>海鮮 해물</h1>
        <h4>
            韓國的海鮮飲食文化擁有豐富多樣的海產品，海鮮在飲食中也佔有重要地位，如生魚片、海鮮湯、海鮮煎餅等。韓國人喜歡將新鮮的海鮮生吃或烹煮，搭配醬料和小菜，味道鮮美。此外，韓國還有豐富的海鮮醃製和發酵食品，如韓國泡菜中的醃製海鮮，展現了海洋資源的多樣性和韓國人對食材的巧妙應用。
        </h4>
    </div>
    <!-- food-category-seafood -->

    <div class="food-description-red" id="article4">
        <h1>小菜 반찬</h1>
        <h4>
            韓國的小菜飲食文化獨具特色，被視為餐桌上不可或缺的一部分。小菜種類繁多，包括泡菜、醃製蔬菜、炒菜、煎餅等，提供多樣的風味和營養。這些小菜與主食搭配使用，韓國人重視小菜的製作工藝和味道，認為小菜反映了餐廳或家庭的品質和風格，是韓國飲食文化中不可或缺的一部分。
        </h4>
    </div>
    <!-- food-category-sideDish -->

    <div class="food-description-blue" id="article5">
        <h1>湯品 국</h1>
        <h4>
            韓國的湯品飲食文化源遠流長，湯在韓國飲食中佔有重要地位，被視為滋補身體、補充營養的重要途徑。韓國湯類繁多，包括清湯、辣湯、醬汁湯等，以及加入各種肉類、海鮮和蔬菜的燉煮湯品。韓國人相信湯能促進健康、保持體力，因此在日常生活中經常享用各種湯品。
        </h4>
    </div>
    <!-- food-category-soup -->

    <!-- bottom -->
    <div class="food-bottom">
        <div class="food-bottom-cover">
            <div class="food-bottom-box">
                <p class="food-bottom-text">
                    秉持對食物的熱情，繼續探索韓食的美好。
                </p>
                <a href="#">點擊看更多</a>
            </div>
        </div>
    </div>
</template>

<script>
// import foodHalfCircle from '../assets/Image/food/food_half_circle.png';
import foodColdNoodle from "../assets/Image/food/food_cold_noodle.jpeg";
import steamWhiteRice from "../assets/Image/food/steam_white_rice.jpg";
import blackBeanNoodles from "../assets/Image/food/food_black_bean_noodles.jpg";
import bibimbap from "../assets/Image/food/food_bibimbap.jpeg";
import ShinRamyun from "../assets/Image/food/food_ShinRamyun.jpeg";
import leftArrow from "../assets/Image/food/food_left_arrow.png";
import rightArrow from "../assets/Image/food/food_right_arrow.png";
//--------
import { onMounted } from "vue";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

//--------
export default {
    data() {
        return {
            currentSlide: 0,
            currentItem: {
                image: foodColdNoodle,
                title: "韓式冷麵 냉면",
                description:
                    "韓式冷麵是一道韓國傳統美食，特別受夏季歡迎，主要有兩種類型：水冷麵和拌冷麵。水冷麵以冰涼的牛骨湯或雞湯為基底，口感清爽；拌冷麵則以辣椒醬拌勻，風味辛辣。冷麵的麵條由蕎麥或馬鈴薯澱粉製成，細而有彈性。這道菜常搭配切片牛肉、雞蛋和黃瓜片，既美味又解暑。",
            },
            items: [
                {
                    image: foodColdNoodle,
                    text: "韓式冷麵",
                    title: "韓式冷麵 냉면",
                    description:
                        "韓式冷麵是一道韓國傳統美食，特別受夏季歡迎，主要有兩種類型：水冷麵和拌冷麵。水冷麵以冰涼的牛骨湯或雞湯為基底，口感清爽；拌冷麵則以辣椒醬拌勻，風味辛辣。冷麵的麵條由蕎麥或馬鈴薯澱粉製成，細而有彈性。這道菜常搭配切片牛肉、雞蛋和黃瓜片，既美味又解暑。",
                },
                {
                    image: steamWhiteRice,
                    text: "白飯",
                    title: "白飯 밥",
                    description:
                        "白飯在韓國料理中扮演著至關重要的角色。作為主食、飲食文化的核心，它與各種湯品、小菜和烤肉等搭配，形成了均衡的飲食結構，呈現出豐富的風味和營養。白飯的影響力超越了飲食層面，還體現了韓國人對健康飲食和文化傳承的重視，成為韓國飲食文化的象徵之一。",
                },
                {
                    image: blackBeanNoodles,
                    text: "韓式炸醬麵",
                    title: "韓式炸醬麵 짜장면",
                    description:
                        "韓式炸醬麵是深受歡迎的韓國中華料理，這道菜以炸醬為主要調味料，醬料由黑豆醬、洋蔥、豬肉和蔬菜炒製而成，味道濃郁。麵條勁道，搭配香濃的醬汁，口感豐富。炸醬麵通常配以黃瓜絲或青豆裝飾，增加清爽感。這道料理在韓國不僅是日常美食，也常在特別日子享用，如黑色情人節，是許多人喜愛的美味選擇。",
                },
                {
                    image: bibimbap,
                    text: "石鍋拌飯",
                    title: "石鍋拌飯 돌솥비빔밥 ",
                    description:
                        "石鍋拌飯是韓國傳統美食之一，以熱石鍋製作。將蔬菜、肉類、醬料和生蛋放在煮熟的白飯上，再淋上辣椒醬，用筷子攪拌均勻。由於石鍋的高溫，飯底會變得酥脆，增添口感。這道菜風味豐富，口感獨特，集合了韓式料理的精髓。這道菜風味豐富，口感獨特，集合了韓式料理的精髓。",
                },
                {
                    image: ShinRamyun,
                    text: "辛拉麵",
                    title: "辛拉麵 신라면",
                    description:
                        "辛拉麵是韓國著名的辛辣拉麵品牌，深受韓國人的喜愛。以辣味為特色，湯底辛辣濃郁，配以彈牙的麵條和豐富的配料，如蔬菜、肉片和調味包，口感豐富。煮熟後，麵條彈性十足，湯汁濃郁鮮美，帶有微辣的風味，令人回味無窮。煮熟後，麵條彈性十足，湯汁濃郁鮮美，帶有微辣的風味，令人回味無窮。",
                },
            ],
        };
    },
    computed: {
        displayedItems() {
            let start = this.currentSlide;
            let end = start + 4;
            let slides = this.items.slice(start, end);

            if (end > this.items.length) {
                slides = slides.concat(
                    this.items.slice(0, end - this.items.length)
                );
            }

            return slides;
        },
    },
    methods: {
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.items.length;
        },
        prevSlide() {
            this.currentSlide =
                (this.currentSlide - 1 + this.items.length) % this.items.length;
        },
        updateItem(index) {
            this.currentItem =
                this.items[(this.currentSlide + index) % this.items.length];
        },
    }, //---------視差滾動----------
    mounted() {
        const horizontalSections = gsap.utils.toArray("section.horizontal");

        horizontalSections.forEach((sec, i) => {
            const pinWrap = sec.querySelector(".pin-wrap");
            const animationWrap = pinWrap.querySelector(".animation-wrap");

            const getToValue = () =>
                -(animationWrap.scrollWidth - window.innerWidth);

            gsap.fromTo(
                animationWrap,
                {
                    x: () =>
                        animationWrap.classList.contains("to-right")
                            ? 0
                            : getToValue(),
                },
                {
                    x: () =>
                        animationWrap.classList.contains("to-right")
                            ? getToValue()
                            : 0,
                    ease: "none",
                    scrollTrigger: {
                        trigger: sec,
                        start: "top top",
                        end: () =>
                            "+=" +
                            (animationWrap.scrollWidth - window.innerWidth),
                        pin: pinWrap,
                        invalidateOnRefresh: true,
                        scrub: true,
                    },
                }
            );
        });
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
                color: $WarmNude;
            }
            h1 {
                text-align: center;
                color: $WarmNude;
                font-size: $bigTitle;
            }
        }
    }
}
/* food-main-description */
.food-description-blue {
    max-height: 100vh;
    max-width: 100vw;
    background-color: $Blue;
    justify-content: center;
    padding: 56px 268px 40px;
    h1 {
        text-align: center;
        color: $WarmNude;
        margin-bottom: 44px;
    }
    h4 {
        text-align: center;
        color: $WarmNude;
        line-height: 1.5;
    }
}

.food-description-red {
    max-width: 100vw;
    background-color: $Red;
    justify-content: center;
    padding: 56px 268px 40px;
    h1 {
        text-align: center;
        color: $WarmNude;
        margin-bottom: 44px;
    }
    h4 {
        text-align: center;
        color: $WarmNude;
        line-height: 1.5;
    }
}
/* food-category */
.food-category {
    width: 100vw;
    height: 809px;
    background-color: $OffWhite;
    display: flex;
    .food-category-left {
        flex: 2;
        position: relative;
        .food-img-back {
            z-index: 1;
        }
        .img-circle-big {
            z-index: 2;
            top: 170px;
            left: 119px;
            width: 300px;
            height: 300px;
            background-color: $Red;
            overflow: hidden;
            border-radius: 50%;
            display: flex;
            position: absolute;
            img {
                max-width: 100%;
                max-height: 100%;
                width: auto;
                height: auto;
            }
        }
    }
}
.food-category-middle {
    margin-top: 107px;
    flex: 3;
    text-align: center;
    .food-category-middle-text {
        max-width: 100%;
        h1 {
            color: $Red;
            margin-bottom: 72px;
        }
        h4 {
            margin-bottom: 72px;
        }
    }
    .category-detail {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        button {
            background: none; /* 移除背景 */
            border: none;
            cursor: pointer;
            &:hover {
                filter: drop-shadow(0 0 30px $Gold);
            }
            img {
                max-height: 45px;
            }
        }
        ul {
            display: flex;
            flex-direction: row;
            li {
                margin: 0 15px;
                width: 136px;
                height: 214px;
                background-color: $Nude;
                border-radius: 30px;
                text-align: center;
                a {
                    text-decoration: none;
                    &:hover {
                        filter: drop-shadow(0 0 30px $Gold);
                    }
                }
                .img-circle-small {
                    margin-top: 28px;
                    width: 96px;
                    height: 96px;
                    overflow: hidden;
                    border-radius: 50%;
                    margin: 0 auto;
                    margin-bottom: 32px;
                    margin-top: 28px;
                    display: flex;
                    img {
                        max-width: 100%;
                        max-height: 100%;
                        width: auto;
                        height: auto;
                    }
                }
                p {
                    font-size: $smallTitle/2;
                    color: $DarkBrown;
                    line-height: 1.5;
                }
            }
        }
    }
}
.food-category-right {
    flex: 1;
    display: flex;
    flex-direction: column;
    max-width: 100%;
    font-size: $smallTitle/2;
    color: $Gray;
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
        background-color: var(--Primary-Trello-Red, $Red);
    }
    .gold-color {
        background-color: var(--Primary-Gold, $Gold);
    }
    .category-text {
        margin: auto 0;
        font-size: $smallTitle/2;
        color: $Gold;
    }
    a {
        text-decoration: none;
        &:hover {
            filter: drop-shadow(0 0 30px $Gold);
        }
    }
}

/* bottom */
.food-bottom {
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
    .food-bottom-cover {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        .food-bottom-box {
            display: flex;
            flex-direction: column;
            place-items: center; /* 水平垂直置中 */
            margin: 0 auto;
            .food-bottom-text {
                font-size: $smallTitle/2;
                color: $OffWhite;
            }
            & a {
                font-size: $smallTitle/2;
                color: $OffWhite;
            }
            /* .food-bottom-box a:hover{} */
        }
    }
}
//-----------------視差滾動-----------------
.food_selector_wrapper {
    background-color: $OffWhite;
    padding-top: 100px;
    .food_selector_text {
        width: 444px;
        height: 704px;
        display: flex;
        background-image: url(/src/assets/Image/food/time_and_food.png);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        flex-direction: column;
        text-align: center;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        .food_1st_scroll {
            display: flex;
            align-items: center;
            justify-content: center;
            p {
                writing-mode: vertical-rl; /* 文字垂直從右到左 */
                text-orientation: upright;
                font-size: $smallTitle;
                color: $LightBrown;
            }
            .left_text {
                margin-bottom: 160px;
            }
            .right_text {
                margin-top: 200px;
            }
            .food_and_time {
                h1 {
                    font-size: $bigTitle;
                    background: $RevGoldGrad;
                    background-clip: text;
                    -webkit-text-stroke: 8px transparent;
                }
                .inRed {
                    color: $Red;
                }
                .inBlue {
                    color: $Blue;
                }
                img {
                }
            }
            p {
            }
        }
        .scroll_down {
            margin-top: 50px;
            animation: jump 0.8s infinite;
            @keyframes jump {
                0%,
                20%,
                50%,
                80%,
                100% {
                    transform: translateY(0);
                }
                40% {
                    transform: translateY(7px);
                }
                60% {
                    transform: translateY(1px);
                }
            }
            h2 {
                color: $Gold;
            }

            img {
                margin-top: 5px;
                width: 64px;
                height: 56px;
            }
        }
    }
}
//------------------------------------

section {
    padding-top: 100px;
    background-color: $OffWhite;
    &.horizontal {
        overflow-x: hidden;

        .pin-wrap,
        .animation-wrap {
            display: flex;
            position: relative;
            z-index: 1;
            // height: 100vh;
        }
        .item {
            position: relative;
            padding: 110px 36px; //不可以刪掉
            // flex: 0 0 500px;
            height: calc(100vh - 300px); //暫時不可以刪掉
            display: flex;
            align-items: center;
            // line-height: 1.7;
            // user-select: none;
            // border-right: 1px solid rgba(0, 0, 0, 0.06);
            background-color: transparent;
            //以下開始新增樣式
            width: 444px;
            height: 704px;
            &:before {
                position: absolute;
                // font-size: 100px;
                // opacity: 0.13;
                font-weight: bold;
                z-index: -1;
                transform: translate(-30px, -50px);
                // line-height: 1;
            }
            img {
            }
        }
        .animation-wrap {
            &.to-right {
                // counter-reset: item;
                // float: left;

                .item:before {
                    // counter-increment: item;
                    // content: counter(item);
                }
            }

            &.to-left {
                counter-reset: item 11;
                float: right;

                .item:before {
                    counter-increment: item -1;
                    content: counter(item);
                }
            }

            .item:nth-child(2n + 2) {
                align-items: flex-start;
            }

            .item:nth-child(4n + 4) {
                align-items: flex-end;
            }
        }
    }
}
</style>
