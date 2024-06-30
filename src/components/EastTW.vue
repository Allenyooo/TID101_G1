<script>
import shopcard from "../components/Shopcard.vue";
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/effect-cards';
import { EffectCards } from 'swiper/modules';

export default {
    components: { 
        shopcard,
        Swiper,
        SwiperSlide,
    },

    mounted() {
        this.fetchShops();
    },

    data() {
        return {
            unmarker: new URL(
                "@/assets/Image/map/unmarker.png",
                import.meta.url
            ).href,
            marker: new URL("@/assets/Image/map/marker.png", import.meta.url)
                .href,

            hoverIndex: -1,

            shops: [],

            modules: [EffectCards],
        };
    },

    methods: {
        async fetchShops() {
            try {
                const response = await fetch(
                    // "http://localhost/tid101_g1/public/php/map/shop.php?REGION=東"
                    `${import.meta.env.VITE_PHP_PATH}map/shop.php?REGION=東`
                );
                const shopsData = await response.json();
                this.shops = shopsData;
                console.log(shopData);
            } catch (error) {
                console.error("Error fetching shops:", error);
            }
        },

        backToIsland(event) {
            event.stopPropagation(); //停止冒泡事件
            const img = document.querySelector(".eastIsland");
            const screenWidth = window.innerWidth;
            if (screenWidth > 1000) {
                img.style.width = "232px";
                img.style.height = "524px";
            } else if (screenWidth > 750) {
                img.style.width = "186.6px";
                img.style.height = "421.5px";
            } else {
                img.style.width = "147px";
                img.style.height = "339px";
            }
            img.style.opacity = "1";
            img.style.transform = "translate(0px, 0px)";
            img.style.transition = "all 0.5s ease";
            // img.style.width = '232px';
            // img.style.height = '524px';
            this.$router.push("/map");
            console.log("backToIsland is called");
            img.style.transform = "";
        },
        markLight(index) {
            this.hoverIndex = index;
        },
        unmarker() {
            this.hoverIndex = -1;
        },
        getMarkerSrc(index) {
            return this.hoverIndex === index ? this.marker : this.unmarker;
        },
    },
};
</script>

<template>
    <section>
        <div class="filter" @click="backToIsland"></div>
        <div class="sidemap">
            <div class="nmap">
                <span>
                    <img :src="getMarkerSrc(0)" alt="" />
                </span>
                <span>
                    <img :src="getMarkerSrc(1)" alt="" />
                </span>
                <span>
                    <img :src="getMarkerSrc(2)" alt="" />
                </span>
            </div>
        </div>
        <div class="overshop">
            <div class="map_shoptitle">
                <h1>精 選 店 家</h1>
            </div>

            <ul class="shops">
                <shopcard
                    @mouseenter.native="markLight(index)"
                    @mouseleave.native="unmarker()"
                    v-for="(shop, index) in shops"
                    :key="shop.ID"
                    :shop="shop"
                />
            </ul>
        </div>
    </section>
</template>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

@mixin breakpoint($point) {
    @media screen and (max-width: $point) {
        @content;
    }
}

.marker {
    text-decoration: none;
    color: #333;
    margin-bottom: 24px;
}

section {
    // display: none;

    .filter {
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
        @include breakpoint(1350px) {
            top: 25vh;
            left: 10vw;
        }
        @include breakpoint(830px) {
            top: 0;
            left: 30%
        }
        @include breakpoint(430px) {
            top: 0;
            left: 15%
        }
        .nmap {
            background-image: url("../assets/Image/map/eastsideOpen2.png");
            background-size: cover;
            //   width: 443px;
            width: 25vw;
            //   height: 689px;
            height: 38.88vw;
            opacity: 1;
            position: relative;
            // object-fit: cover;
            @include breakpoint(830px) {
                width: 212.45px;
                height: 330.43px;
            }

            & span:nth-child(1) {
                position: absolute;
                top: 25%;
                right: 35%;
            }
            & span:nth-child(2) {
                position: absolute;
                top: 40%;
                right: 40%;
            }
            & span:nth-child(3) {
                position: absolute;
                top: 70%;
                right: 70%;
            }

            & span img{

                @include breakpoint(1350px) {
                    display: block;
                    width: 50%;
                }

            }
        }

        & h1 {
            font-size: $fontSize * 32;
            display: inline-block;
        }
    }
    .overshop{
        // outline: 1px red solid;
        position: fixed;
        top: 8vh;
        right: 10vw;
        z-index: 21;
        @include breakpoint(1350px) {
            right: 3vw;
        }
        @include breakpoint(1080px) {
            right: 13vw;
        }
        @include breakpoint(830px) {
            top: 40%;
            left: 30%;
        }
        @include breakpoint(430px) {
            top: 40%;
            left: 15%;
            width: 312px
        }

    }

    .map_shoptitle {
        margin: 0 auto;
        // outline: 1px red solid;
        // width: 312px;
        width: 312px;
        height: 88px;
        background-image: url(/src/assets/Image/map/bannerBGI.png);
        background-repeat: no-repeat;
        background-position: center center;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 5vh;
        @include breakpoint(830px) {
            display: none;
        }
        h1 {
            font-size: $fontSize * 2;
        }
    }

    .shops {
        // outline: 2px solid red;
        // position: fixed;
        // top: 20vh;
        // right: 10vw;
        z-index: 20;
        width: 725px;
        height: 79vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        overflow-y: auto;
        overflow-x: hidden;
        @include breakpoint(1280px) {
            width: 650px;
        }
        @include breakpoint(1080px) {
            width: 312px;
        }
        @include breakpoint(830px) {
            width: 100%;
            flex-direction: row;
            overflow-y: auto;
            overflow-x: auto;
            align-items: baseline;
        }

        &::-webkit-scrollbar {
            width: 12px; /* 滾動條寬度 */
        }
    }
    
}
</style>
