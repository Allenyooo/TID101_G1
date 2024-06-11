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
    </div>
    <!-- food-main-description -->
    <div class="food-description-blue" id="article1">
        <h1>主食 밥면</h1>
        <h4>
            韓國的主食文化以米飯為主，米飯是餐桌上的核心，也會加入糯米、紅豆等增加風味。韓國人也喜愛各類麵食，如冷麵和拌麵。冷麵清爽的口感適合夏季食用，而拌麵則辛辣和多樣的配料深受大眾喜愛。白米飯和麵食共同構成了韓國主食文化的重要部分，反映了韓國人對健康主食的追求。
        </h4>
    </div>
    <!-- 主食内容 -->
    <div class="food-category">
        <div class="food-category-left">
            <img
                src="../assets/Image/food/food_half_circle.png"
                class="food-img-back"
            />
            <div class="img-circle-big">
                <img :src="currentItemMain.image" id="food-img-front" />
            </div>
        </div>
        <div class="food-category-middle">
            <div class="food-category-middle-text">
                <h1>{{ currentItemMain.title }}</h1>
                <h4>{{ currentItemMain.description }}</h4>
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
                    <div class="category-icon primary-color"></div>
                </a>
                <p class="category-text">主食</p>
            </div>
            <div class="category-item">
                <a href="#article2">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">肉類</p>
            </div>
            <div class="category-item">
                <a href="#article3">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">海鮮</p>
            </div>
            <div class="category-item">
                <a href="#article4">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">小菜</p>
            </div>
            <div class="category-item">
                <a href="#article5">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">湯品</p>
            </div>
        </div>
    </div>
    <div class="food-description-red" id="article2">
        <h1>肉類 고기</h1>
        <h4>
            韓國的肉類飲食文化豐富多樣，以烤肉為代表。烤肉是一種社交活動，家人或朋友聚在一起在炭火上烤製各種肉類，如牛肉、豬肉和雞肉。除了烤肉，還有燉牛肉和韓式炸雞。韓國肉類飲食重視品質和調味，常搭配各種小菜和醬料一起享用，展現了韓國人對美食和社交的熱愛。
        </h4>
    </div>
    <!-- 肉類内容 -->
    <div class="food-category">
        <div class="food-category-left">
            <img
                src="../assets/Image/food/food_half_circle.png"
                class="food-img-back"
            />
            <div class="img-circle-big">
                <img :src="currentItemMain2.image" id="food-img-front" />
            </div>
        </div>
        <div class="food-category-middle">
            <div class="food-category-middle-text">
                <h1>{{ currentItemMain2.title }}</h1>
                <h4>{{ currentItemMain2.description }}</h4>
            </div>
            <!-- 小圖Swiper套件 -->
            <div class="category-detail">
                <button @click="prevSlide2">
                    <img
                        src="/src/assets/Image/food/food_left_arrow.png"
                        alt=""
                    />
                </button>
                <ul>
                    <li v-for="(item, index) in displayedItems2" :key="index">
                        <a href="#" @click.prevent="updateItem2(index)">
                            <div class="img-circle-small">
                                <img :src="item.image" alt="" />
                            </div>
                            <p>{{ item.text }}</p>
                        </a>
                    </li>
                </ul>
                <button @click="nextSlide2">
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
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">主食</p>
            </div>
            <div class="category-item">
                <a href="#article2">
                    <div class="category-icon primary-color"></div>
                </a>
                <p class="category-text">肉類</p>
            </div>
            <div class="category-item">
                <a href="#article3">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">海鮮</p>
            </div>
            <div class="category-item">
                <a href="#article4">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">小菜</p>
            </div>
            <div class="category-item">
                <a href="#article5">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">湯品</p>
            </div>
        </div>
    </div>
    <!-- food-category-seafood -->
    <div class="food-description-blue" id="article3">
        <h1>海鮮 해물</h1>
        <h4>
            韓國的海鮮飲食文化擁有豐富多樣的海產品，海鮮在飲食中也佔有重要地位，如生魚片、海鮮湯、海鮮煎餅等。韓國人喜歡將新鮮的海鮮生吃或烹煮，搭配醬料和小菜，味道鮮美。此外，韓國還有豐富的海鮮醃製和發酵食品，如韓國泡菜中的醃製海鮮，展現了海洋資源的多樣性和韓國人對食材的巧妙應用。
        </h4>
    </div>
    <!-- 海鮮内容 -->
    <div class="food-category">
        <div class="food-category-left">
            <img
                src="../assets/Image/food/food_half_circle.png"
                class="food-img-back"
            />
            <div class="img-circle-big">
                <img :src="currentItemMain3.image" id="food-img-front" />
            </div>
        </div>
        <div class="food-category-middle">
            <div class="food-category-middle-text">
                <h1>{{ currentItemMain3.title }}</h1>
                <h4>{{ currentItemMain3.description }}</h4>
            </div>
            <!-- 小圖Swiper套件 -->
            <div class="category-detail">
                <button @click="prevSlide3">
                    <img
                        src="/src/assets/Image/food/food_left_arrow.png"
                        alt=""
                    />
                </button>
                <ul>
                    <li v-for="(item, index) in displayedItems3" :key="index">
                        <a href="#" @click.prevent="updateItem3(index)">
                            <div class="img-circle-small">
                                <img :src="item.image" alt="" />
                            </div>
                            <p>{{ item.text }}</p>
                        </a>
                    </li>
                </ul>
                <button @click="nextSlide3">
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
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">主食</p>
            </div>
            <div class="category-item">
                <a href="#article2">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">肉類</p>
            </div>
            <div class="category-item">
                <a href="#article3">
                    <div class="category-icon primary-color"></div>
                </a>
                <p class="category-text">海鮮</p>
            </div>
            <div class="category-item">
                <a href="#article4">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">小菜</p>
            </div>
            <div class="category-item">
                <a href="#article5">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">湯品</p>
            </div>
        </div>
    </div>
    <!-- food-category-sideDish -->
    <div class="food-description-red" id="article4">
        <h1>小菜 반찬</h1>
        <h4>
            韓國的小菜飲食文化獨具特色，被視為餐桌上不可或缺的一部分。小菜種類繁多，包括泡菜、醃製蔬菜、炒菜、煎餅等，提供多樣的風味和營養。這些小菜與主食搭配使用，韓國人重視小菜的製作工藝和味道，認為小菜反映了餐廳或家庭的品質和風格，是韓國飲食文化中不可或缺的一部分。
        </h4>
    </div>
    <!-- 小菜内容 -->
    <div class="food-category">
        <div class="food-category-left">
            <img
                src="../assets/Image/food/food_half_circle.png"
                class="food-img-back"
            />
            <div class="img-circle-big">
                <img :src="currentItemMain4.image" id="food-img-front" />
            </div>
        </div>
        <div class="food-category-middle">
            <div class="food-category-middle-text">
                <h1>{{ currentItemMain4.title }}</h1>
                <h4>{{ currentItemMain4.description }}</h4>
            </div>
            <!-- 小圖Swiper套件 -->
            <div class="category-detail">
                <button @click="prevSlide4">
                    <img
                        src="/src/assets/Image/food/food_left_arrow.png"
                        alt=""
                    />
                </button>
                <ul>
                    <li v-for="(item, index) in displayedItems4" :key="index">
                        <a href="#" @click.prevent="updateItem4(index)">
                            <div class="img-circle-small">
                                <img :src="item.image" alt="" />
                            </div>
                            <p>{{ item.text }}</p>
                        </a>
                    </li>
                </ul>
                <button @click="nextSlide4">
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
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">主食</p>
            </div>
            <div class="category-item">
                <a href="#article2">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">肉類</p>
            </div>
            <div class="category-item">
                <a href="#article3">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">海鮮</p>
            </div>
            <div class="category-item">
                <a href="#article4">
                    <div class="category-icon primary-color"></div>
                </a>
                <p class="category-text">小菜</p>
            </div>
            <div class="category-item">
                <a href="#article5">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">湯品</p>
            </div>
        </div>
    </div>
    <!-- food-category-soup -->
    <div class="food-description-blue" id="article5">
        <h1>湯品 국</h1>
        <h4>
            韓國的湯品飲食文化源遠流長，湯在韓國飲食中佔有重要地位，被視為滋補身體、補充營養的重要途徑。韓國湯類繁多，包括清湯、辣湯、醬汁湯等，以及加入各種肉類、海鮮和蔬菜的燉煮湯品。韓國人相信湯能促進健康、保持體力，因此在日常生活中經常享用各種湯品。
        </h4>
    </div>
    <!-- 湯品内容 -->
    <div class="food-category">
        <div class="food-category-left">
            <img
                src="../assets/Image/food/food_half_circle.png"
                class="food-img-back"
            />
            <div class="img-circle-big">
                <img :src="currentItemMain5.image" id="food-img-front" />
            </div>
        </div>
        <div class="food-category-middle">
            <div class="food-category-middle-text">
                <h1>{{ currentItemMain5.title }}</h1>
                <h4>{{ currentItemMain5.description }}</h4>
            </div>
            <!-- 小圖Swiper套件 -->
            <div class="category-detail">
                <button @click="prevSlide5">
                    <img
                        src="/src/assets/Image/food/food_left_arrow.png"
                        alt=""
                    />
                </button>
                <ul>
                    <li v-for="(item, index) in displayedItems5" :key="index">
                        <a href="#" @click.prevent="updateItem5(index)">
                            <div class="img-circle-small">
                                <img :src="item.image" alt="" />
                            </div>
                            <p>{{ item.text }}</p>
                        </a>
                    </li>
                </ul>
                <button @click="nextSlide5">
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
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">主食</p>
            </div>
            <div class="category-item">
                <a href="#article2">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">肉類</p>
            </div>
            <div class="category-item">
                <a href="#article3">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">海鮮</p>
            </div>
            <div class="category-item">
                <a href="#article4">
                    <div class="category-icon gold-color"></div>
                </a>
                <p class="category-text">小菜</p>
            </div>
            <div class="category-item">
                <a href="#article5">
                    <div class="category-icon primary-color"></div>
                </a>
                <p class="category-text">湯品</p>
            </div>
        </div>
    </div>

    <!-- bottom -->
    <div class="food-bottom">
        <div class="food-bottom-cover">
            <div class="food-bottom-box">
                <p class="food-bottom-text">
                    秉持對食物的熱情，繼續探索韓食的美好。
                </p>
                <router-link to="/map">點擊看更多</router-link>
            </div>
        </div>
    </div>
</template>

<script>
//主食
import foodColdNoodle from "../assets/Image/food/food_cold_noodle.jpeg";
import steamWhiteRice from "../assets/Image/food/steam_white_rice.jpg";
import blackBeanNoodles from "../assets/Image/food/food_black_bean_noodles.jpg";
import bibimbap from "../assets/Image/food/food_bibimbap.jpeg";
import ShinRamyun from "../assets/Image/food/food_ShinRamyun.jpeg";
//肉類
import koreanBBQ from "../assets/Image/food/food_bbq.jpeg";
import friedChicken from "../assets/Image/food/food_friedChicken.jpg";
import steak from "../assets/Image/food/food_steak.jpg";
import cilliedChicken from "../assets/Image/food/food_chillied_chicken.jpeg";
import koreanBeef from "../assets/Image/food/food_bbq.jpeg";
//海鮮
import rawSeafood from "../assets/Image/food/food_raw_seafood.jpg";
import rawFish from "../assets/Image/food/food_raw_fish.jpeg";
import grilledEel from "../assets/Image/food/food_grilled_eel.jpg";
import friedOctopus from "../assets/Image/food/food_fried_octopus.jpeg";
import rawTaco from "../assets/Image/food/food_ShinRamyun.jpeg";
//小菜
import kimchi from "../assets/Image/food/food_kimchi.jpg";
import cucamber from "../assets/Image/food/food_cucamber.jpg";
import spicyRadish from "../assets/Image/food/food_spicyRadish.jpg";
import smaillFish from "../assets/Image/food/food_smaillFish.jpg";
import spicyChives from "../assets/Image/food/food_ShinRamyun.jpeg";
//湯品
import koreanSoup from "../assets/Image/food/food_korean_soup.jpg";
import tofuSoup from "../assets/Image/food/food_tofu_soup.jpg";
import kimchiSoup from "../assets/Image/food/food_kimchi_soup.jpeg";
import beefTailSoup from "../assets/Image/food/food_beeftail_soup.jpg";
import seafoodSoup from "../assets/Image/food/food_ShinRamyun.jpeg";

import leftArrow from "../assets/Image/food/food_left_arrow.png";
import rightArrow from "../assets/Image/food/food_right_arrow.png";
//測試用
//--------滾動視差
import { onMounted } from "vue";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);
export default {
    data() {
        return {
            currentSlide: 0,
            currentSlide2: 0,
            currentSlide3: 0,
            currentSlide4: 0,
            currentSlide5: 0,
            currentItemMain: {
                image: foodColdNoodle,
                title: "韓式冷麵 냉면",
                description:
                    "韓式冷麵是一道韓國傳統美食，特別受夏季歡迎，主要有兩種類型：水冷麵和拌冷麵。水冷麵以冰涼的牛骨湯或雞湯為基底，口感清爽；拌冷麵則以辣椒醬拌勻，風味辛辣。冷麵的麵條由蕎麥或馬鈴薯澱粉製成，細而有彈性。這道菜常搭配切片牛肉、雞蛋和黃瓜片，既美味又解暑。",
            },
            currentItemMain2: {
                image: koreanBBQ,
                title: "烤五花肉 삼겹살",
                description:
                    "烤五花肉作為韓國最具代表性的烤肉之一，它展現了韓國人對肉類料理的熱愛。烤五花肉以肥美多汁的口感和香氣四溢的風味聞名，常與大蒜、生菜等一起享用，構成了美味豐盛的韓國烤肉文化。除了在家庭聚餐中受歡迎外，烤五花肉也成為了韓國餐廳的招牌菜，吸引著許多國內外食客前來品嚐。",
            },
            currentItemMain3: {
                image: rawSeafood,
                title: "生醃海鮮 생선회",
                description:
                    "生醃海鮮是一種傳統製作方式，使海鮮保持了鮮美的口感和原始風味，並且具有獨特的酸甜味道。韓國人常將螃蟹、章魚、烏賊等海鮮與醬油、辣椒醬一起醃製，搭配米飯和其他主食一同享用。清新爽口的風味不僅豐富了餐桌上的選擇，也體現了韓國飲食文化中對食材的精湛處理和美味享受的追求。",
            },
            currentItemMain4: {
                image: kimchi,
                title: "泡菜 김치",
                description:
                    "泡菜是韓食料理中不可或缺的一部分。作為韓國最具代表性的發酵食品之一，泡菜以獨特的製作方式和豐富的風味深受喜愛。泡菜不僅作為主菜或配菜，還常用於烹製其他韓式料理，如泡菜湯和泡菜煎餅。酸辣爽口的口感和豐富的營養成分，不僅為餐桌增添了多樣性，也代表韓國獨有的風土及氣候。",
            },
            currentItemMain5: {
                image: koreanSoup,
                title: "大醬湯 된장찌개",
                description:
                    "大醬湯是韓食料理中的經典之一，擁有濃郁的風味和營養價值。以韓國大醬為基礎，加入豆腐、蔬菜等食材，經過燉煮而成。大醬湯不僅具有美味的口感，還被認為有益於消化和增強體力。作為家常菜或節日料理，大醬湯常見於韓國餐桌上，體現了韓國人對傳統食品和健康飲食的追求。",
            }, // 1主食項目
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
                        "韓式炸醬麵是深受歡迎的韓國中華料理，這道菜以中華炸醬為主要調味料，醬料由黑豆醬、洋蔥、豬肉和蔬菜炒製而成，味道濃郁香甜。麵條Q彈有嚼勁，搭配上豐富的黑色炸醬，使整道菜充滿了濃郁的風味和多層次的口感，是韓國家庭聚餐和外出用餐的首選之一。",
                },
                {
                    image: bibimbap,
                    text: "韓式拌飯",
                    title: "韓式拌飯 비빔밥",
                    description:
                        "韓式拌飯是一道將各種豐富食材混合攪拌的韓國傳統料理。米飯上覆蓋著豐富的蔬菜、牛肉(或是其他肉類)、雞蛋和辣椒醬等食材，口感豐富且均衡，既有肉類的鮮美，又有蔬菜的清爽，並且因為辣椒醬的加入，整道菜更加香辣可口，是深受喜愛的家庭料理和餐廳必備菜品。",
                },
                {
                    image: ShinRamyun,
                    text: "辛拉麵",
                    title: "辛拉麵 신라면",
                    description:
                        "辛拉麵是一款經典的韓國速食麵，起源於韓國農心方便麵公司，以其獨特的辛辣口感和豐富的湯底而聞名。這款速食麵自問世以來，便憑藉其濃郁的香氣和火辣的味道，成為了韓國乃至全球消費者喜愛的速食選擇。辛拉麵的製作過程簡單方便，只需幾分鐘即可享受到美味的韓式辣湯麵。",
                },
            ], // 2肉類項目
            items2: [
                {
                    image: koreanBBQ,
                    text: "烤五花肉",
                    title: "烤五花肉 삼겹살",
                    description:
                        "烤五花肉作為韓國最具代表性的烤肉之一，它展現了韓國人對肉類料理的熱愛。烤五花肉以肥美多汁的口感和香氣四溢的風味聞名，常與大蒜、生菜等一起享用，構成了美味豐盛的韓國烤肉文化。除了在家庭聚餐中受歡迎外，烤五花肉也成為了韓國餐廳的招牌菜，吸引著許多國內外食客前來品嚐。",
                },
                {
                    image: friedChicken,
                    text: "韓式炸雞",
                    title: "韓式炸雞 삼겹살",
                    description:
                        "韓式炸雞是一道風靡全球的韓國美食。外皮酥脆，內裡多汁，經過雙重炸製，口感極佳。通常會加入甜辣醬或蒜香醬等多種風味，使得味道豐富多樣，也常與啤酒搭配，是韓國人聚會和慶祝的必備佳品。無論是原味、辣味還是蜂蜜口味，韓式炸雞都能滿足不同口味的需求，是一道讓人垂涎的美味佳餚。",
                },
                {
                    image: steak,
                    text: "去骨牛排",
                    title: "去骨牛排 삼겹살",
                    description:
                        "韓式去骨牛排是韓國傳統佳餚，以嫩滑的牛肉燉煮而成。選用上等牛排，加入醬油、糖、大蒜和各種香料，經長時間燉煮，肉質軟嫩多汁，口感豐富。這道菜常與蔬菜一起烹調，味道鮮美，營養豐富。無論在家庭聚餐還是節日慶典上，韓式去骨牛排都是一道備受喜愛的美食，體現了韓國料理的精髓和美味。",
                },
                {
                    image: cilliedChicken,
                    text: "辣炒雞肉",
                    title: "辣炒雞肉 삼겹살",
                    description:
                        "辣炒雞肉是韓國風味濃郁的傳統料理。使用去骨雞肉，加入韓國辣椒醬、大蒜、洋蔥和各種蔬菜，炒製而成。這道菜口感香辣，肉質鮮嫩，深受喜愛。辣炒雞肉通常在鐵板上烹製，熱騰騰上桌，令人食指大動。這道菜不僅是韓國街頭美食的代表，還常在家庭聚餐和朋友聚會時享用，體現了韓國料理的熱情與活力。",
                },
                {
                    image: koreanBeef,
                    text: "燒烤牛內臟",
                    title: "燒烤牛內臟 삼겹살",
                    description:
                        "燒烤牛內臟是韓國獨特的美食。選用新鮮的牛內臟，經過細緻清洗和調味，再在烤架上炭火燒烤，口感脆嫩，風味十足。這道菜常配以蔥絲、蒜片和特製醬料，提升味道層次。燒烤牛內臟是韓國夜市和燒烤店的招牌菜之一，深受食客喜愛，特別適合搭配燒酒，享受韓式燒烤的獨特魅力。",
                },
            ], //3海鮮項目
            items3: [
                {
                    image: rawSeafood,
                    text: "生醃海鮮",
                    title: "生醃海鮮 생선회",
                    description:
                        "生醃海鮮是一種傳統製作方式，使海鮮保持了鮮美的口感和原始風味，並且具有獨特的酸甜味道。韓國人常將螃蟹、章魚、烏賊等海鮮與醬油、辣椒醬一起醃製，搭配米飯和其他主食一同享用。清新爽口的風味不僅豐富了餐桌上的選擇，也體現了韓國飲食文化中對食材的精湛處理和美味享受的追求。",
                },
                {
                    image: rawFish,
                    text: "生魚片",
                    title: "生魚片 회",
                    description:
                        "韓式生魚片是韓國受歡迎的傳統料理，以新鮮的魚類、貝類為主材，切成薄片後生吃。通常搭配韓國辣椒醬（초고추장）或芝麻油、鹽等調味料，還有生菜、大蒜等配菜。這道菜品味道鮮美，口感滑嫩，是海鮮愛好者的最愛。韓式生魚片常見於韓國餐廳和宴會上，是體驗韓國飲食文化的絕佳選擇。",
                },
                {
                    image: grilledEel,
                    text: "烤鰻魚",
                    title: "烤鰻魚 장어구이",
                    description:
                        "韓式烤鰻魚是韓國的經典美食。新鮮的鰻魚經過醬油、糖、蒜和香油等調料醃製，再在炭火上烤製，直到外皮酥脆、內裡鮮嫩多汁。這道菜風味獨特，常搭配生菜和蒜片，並沾上特製醬料一起食用。韓式烤鰻魚不僅美味可口，還富含營養，是韓國人喜愛的滋補佳品，特別適合在家庭聚餐和宴會中享用。",
                },
                {
                    image: friedOctopus,
                    text: "辣炒魷魚",
                    title: "辣炒魷魚 오징어볶음",
                    description:
                        "韓式辣炒魷魚是韓國風味濃郁的傳統料理。新鮮的魷魚切成條狀，與韓國辣椒醬、蒜、洋蔥和蔬菜一起炒製。這道菜口感鮮嫩，味道辛辣甜美，深受喜愛。韓式辣炒魷魚常作為主菜或下酒菜，搭配米飯享用，是韓國餐桌上的常見美食。這道菜不僅美味，還富含蛋白質和營養，是體驗韓國飲食文化的絕佳選擇。",
                },
                {
                    image: rawTaco,
                    text: "生章魚",
                    title: "生章魚 산낙지",
                    description:
                        "韓式生章魚是韓國的傳統美食之一。新鮮的章魚剁成小塊，生吃或稍微燙熟，再搭配韓國辣椒醬、大蒜、芝麻油等調味料，風味獨特。這道菜口感彈牙，具有鮮甜的海味，是許多人喜愛的開胃菜。韓式生章魚經常與燒酒一起享用，是韓國社交場合常見的美食之一，展現了韓國對海鮮料理的獨特魅力。",
                },
            ], //4小菜項目
            items4: [
                {
                    image: kimchi,
                    text: "泡菜",
                    title: "泡菜 김치",
                    description:
                        "泡菜是韓食料理中不可或缺的一部分。作為韓國最具代表性的發酵食品之一，泡菜以獨特的製作方式和豐富的風味深受喜愛。泡菜不僅作為主菜或配菜，還常用於烹製其他韓式料理，如泡菜湯和泡菜煎餅。酸辣爽口的口感和豐富的營養成分，不僅為餐桌增添了多樣性，也代表韓國獨有的風土及氣候。",
                },
                {
                    image: cucamber,
                    text: "醃小黃瓜",
                    title: "醃小黃瓜 오이김치",
                    description:
                        "韓式醃小黃瓜是韓國傳統泡菜之一。新鮮的小黃瓜經過鹽水醃製，再與韓國辣椒粉、大蒜、蔥和薑等調料混合，味道清爽、微辣。這道小菜常作為配菜，不僅開胃解膩，還富含營養，是韓國家庭餐桌上常見的健康美食。韓式醃小黃瓜既能單獨享用，也可搭配烤肉和米飯，為餐點增添一抹爽脆口感。",
                },
                {
                    image: spicyRadish,
                    text: "醃蘿蔔",
                    title: "醃蘿蔔 깍두기",
                    description:
                        "韓式醃蘿蔔是韓國經典的泡菜之一。選用新鮮的白蘿蔔，切成小塊，與韓國辣椒粉、魚露、大蒜和薑等調料混合，經過發酵後，味道酸辣爽口。這道小菜常作為配菜，搭配烤肉、米飯和湯品，提升整體風味。韓式醃蘿蔔不僅開胃解膩，還富含維生素和纖維，是韓國家庭餐桌上的健康美食，深受食客喜愛。",
                },
                {
                    image: smaillFish,
                    text: "小魚乾",
                    title: "小魚乾 멸치볶음",
                    description:
                        "韓式小魚乾是韓國常見的小菜。使用小銀魚乾，先炒至香脆，再與糖、醬油、蒜、辣椒粉和芝麻等調料混合，炒製入味。這道菜口感酥脆，味道鹹甜適中，營養豐富，富含蛋白質和鈣質。韓式小魚乾常作為配菜，搭配米飯和其他主食一起享用，是韓國餐桌上必備的美味小菜之一，深受各年齡層喜愛。",
                },
                {
                    image: spicyChives,
                    text: "醃韭菜",
                    title: "醃韭菜 부추김치",
                    description:
                        "韓式醃韭菜是韓國傳統泡菜之一。新鮮的韭菜與韓國辣椒粉、大蒜、魚露、薑和蔥等調料拌勻後發酵而成。這道菜口感辛辣爽口，風味獨特。常作為配菜，搭配米飯、湯品或燒烤，增添風味。是韓國家庭餐桌上的健康美食，深受食客喜愛。無論是日常餐飲還是特別聚會，這道菜都是不可或缺的美味佳餚。",
                },
            ], //5湯品項目
            items5: [
                {
                    image: koreanSoup,
                    text: "大醬湯",
                    title: "大醬湯 된장찌개",
                    description:
                        "大醬湯是韓食料理中的經典之一，擁有濃郁的風味和營養價值。以韓國大醬為基礎，加入豆腐、蔬菜等食材，經過燉煮而成。大醬湯不僅具有美味的口感，還被認為有益於消化和增強體力。作為家常菜或節日料理，大醬湯常見於韓國餐桌上，體現了韓國人對傳統食品和健康飲食的追求。",
                },
                {
                    image: tofuSoup,
                    text: "豆腐辣湯",
                    title: "豆腐辣湯 순두부찌개",
                    description:
                        "韓式豆腐辣湯是韓國傳統湯品之一，以豆腐和辣椒醬為主要食材，再加入蔬菜、肉類和調味料煮成。這道湯口感麻辣鮮香，湯汁濃郁，帶有豆腐的柔軟滋味，是韓國人喜愛的暖胃佳品。豆腐辣湯常見於韓國家庭和餐廳，不僅美味可口，而且營養豐富，是寒冷天氣中的暖心美食，展現了韓國對於湯品的獨特熱愛。",
                },
                {
                    image: kimchiSoup,
                    text: "泡菜湯",
                    title: "泡菜湯 김치국",
                    description:
                        "韓式泡菜湯是一道傳統的韓國湯品，以泡菜為主要食材，搭配豬肉或牛肉、蔬菜和調味料，煮成濃郁的湯汁。這道湯口感清爽鮮美，融合了泡菜的酸辣風味和肉類的鮮甜滋味，讓人回味無窮。泡菜湯富含維生素和纖維，有助於消化，常見於韓國家庭和餐廳，是韓國人日常生活中不可或缺的美食之一。",
                },
                {
                    image: beefTailSoup,
                    text: "牛尾湯",
                    title: "牛尾湯 곰탕",
                    description:
                        "韓式牛尾湯是韓國傳統湯品之一，以牛尾為主要材料，經過長時間熬煮而成。湯頭清澈濃郁，口感濃厚，蘊含牛尾的鮮美滋味，飽滿而豐富。這道湯具有營養豐富、滋補健康的特點，常見於韓國家庭聚餐和冬季餐桌上。韓式牛尾湯不僅是一道美味佳餚，更是韓國飲食文化的重要代表之一，深受人們的喜愛與推崇。",
                },
                {
                    image: seafoodSoup,
                    text: "海鮮湯",
                    title: "海鮮湯 해물탕",
                    description:
                        "韓式海鮮湯是韓國傳統美食，以新鮮海鮮為主要材料，如蝦、螃蟹、魚、貽貝等，配以蔬菜和調味料熬煮而成。湯頭鮮甜鮮美，清爽滋味，充滿海洋風情。這道湯常見於韓國家庭和餐廳，是寒冷天氣中的暖胃佳品。海鮮湯不僅營養豐富，還能滿足人們對美味的追求，展現了韓國對食材的愛與用心。",
                },
            ],
        };
    },
    computed: {
        //主食-------
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
        //肉類-------
        displayedItems2() {
            let start = this.currentSlide2;
            let end = start + 4;
            let slides = this.items2.slice(start, end);

            if (end > this.items2.length) {
                slides = slides.concat(
                    this.items2.slice(0, end - this.items2.length)
                );
            }
            return slides;
        },
        //海鮮-------
        displayedItems3() {
            let start = this.currentSlide3;
            let end = start + 4;
            let slides = this.items3.slice(start, end);

            if (end > this.items3.length) {
                slides = slides.concat(
                    this.items3.slice(0, end - this.items3.length)
                );
            }
            return slides;
        },
        //小菜-------
        displayedItems4() {
            let start = this.currentSlide4;
            let end = start + 4;
            let slides = this.items4.slice(start, end);

            if (end > this.items4.length) {
                slides = slides.concat(
                    this.items4.slice(0, end - this.items4.length)
                );
            }
            return slides;
        },
        //湯品-------
        displayedItems5() {
            let start = this.currentSlide5;
            let end = start + 4;
            let slides = this.items5.slice(start, end);

            if (end > this.items5.length) {
                slides = slides.concat(
                    this.items5.slice(0, end - this.items5.length)
                );
            }
            return slides;
        },
    },
    methods: {
        //主食------
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.items.length;
        },
        prevSlide() {
            this.currentSlide =
                (this.currentSlide - 1 + this.items.length) % this.items.length;
        },
        updateItem(index) {
            this.currentItemMain =
                this.items[(this.currentSlide + index) % this.items.length];
        },
        //肉類-------
        nextSlide2() {
            this.currentSlide2 = (this.currentSlide2 + 1) % this.items2.length;
        },
        prevSlide2() {
            this.currentSlide2 =
                (this.currentSlide2 - 1 + this.items2.length) %
                this.items2.length;
        },
        updateItem2(index) {
            this.currentItemMain2 =
                this.items2[(this.currentSlide2 + index) % this.items2.length];
        },
        //海鮮-------
        nextSlide3() {
            this.currentSlide3 = (this.currentSlide3 + 1) % this.items3.length;
        },
        prevSlide3() {
            this.currentSlide3 =
                (this.currentSlide3 - 1 + this.items3.length) %
                this.items3.length;
        },
        updateItem3(index) {
            this.currentItemMain3 =
                this.items3[(this.currentSlide3 + index) % this.items3.length];
        }, //小菜-------
        nextSlide4() {
            this.currentSlide4 = (this.currentSlide4 + 1) % this.items4.length;
        },
        prevSlide4() {
            this.currentSlide4 =
                (this.currentSlide4 - 1 + this.items4.length) %
                this.items4.length;
        },
        updateItem4(index) {
            this.currentItemMain4 =
                this.items4[(this.currentSlide4 + index) % this.items4.length];
        },
        //湯品-------
        nextSlide5() {
            this.currentSlide5 = (this.currentSlide5 + 1) % this.items5.length;
        },
        prevSlide5() {
            this.currentSlide5 =
                (this.currentSlide5 - 1 + this.items5.length) %
                this.items5.length;
        },
        updateItem5(index) {
            this.currentItemMain5 =
                this.items5[(this.currentSlide5 + index) % this.items5.length];
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
    width: 100%;
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
    width: 100%;
    // height: 100vh;
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
    width: 100%;
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
    width: 100%;
    height: 100vh;
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
                object-fit: cover;
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
                    font-size: 24px;
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
    font-size: 24px;
    color: $Gray;
    text-align: center;
    line-height: 150%;
    padding-top: 281px;
    padding-left: 36px;
    overflow: hidden;
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
        font-size: 24px;
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
    width: 100%;
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
                font-size: 24px;
                color: $OffWhite;
            }
            & a {
                font-size: 24px;
                color: $OffWhite;
            }
            /* .food-bottom-box a:hover{} */
        }
    }
}
//-----------------視差滾動-----------------
.food_selector_wrapper {
    margin-top: 100px;
    margin-bottom: 20px;
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
                font-size: 48px;
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

    //------------------------------------

    section {
        margin-top: 100px;
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
                margin: 0 18px; //不可以刪掉

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
                    // padding-right: 36px;
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
}
</style>
