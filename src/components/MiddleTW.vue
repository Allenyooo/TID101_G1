<script>
import shopcard from "../components/Shopcard.vue";

export default {
    components: { shopcard },

    mounted() {
        this.fetchShops();
    },

    data() {
        return {
            unmarker: new URL("@/assets/Image/map/unmarker.png", import.meta.url).href,
            marker: new URL("@/assets/Image/map/marker.png", import.meta.url).href,

            hoverIndex: -1,

            shops:[],
        };
    },

    methods: {
        async fetchShops() {
            try {
                const response = await fetch(
                    "http://localhost/tid101_g1/public/php/map/shop.php?REGION=中"
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
            const img = document.querySelector(".middleIsland");
            img.style.opacity = "1";
            img.style.transform = "translate(0px, 0px)";
            img.style.transition = "all 0.5s ease";
            img.style.width = "252px";
            img.style.height = "204px";
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
        }
    },
};
</script>

<template>
    <section>
        <div class="filter" @click="backToIsland"></div>
        <div class="sidemap">
            <div class="nmap">
                <span>
                    <img :src="getMarkerSrc(0)" alt="">
                </span>
                <span>
                    <img :src="getMarkerSrc(1)" alt="">
                </span>
                <span>
                    <img :src="getMarkerSrc(2)" alt="">
                </span>
            </div>
        </div>

        <div class="map_shoptitle">
            <h1>精 選 店 家</h1>
        </div>

        <ul class="shops">

                <shopcard @mouseenter.native="markLight(index)" @mouseleave.native="unmarker()"
                    v-for="(shop, index) in shops" :key="shop.ID" :shop="shop"/>

        </ul>
    </section>
</template>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

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
        .nmap {
            background-image: url("../assets/Image/map/middlesideOpen2.png");
            background-size: cover;
            // width: 531px;
            width: 33vw;
            // height: 621px;
            height: 38.593vw;
            opacity: 1;
            position: relative;
            // object-fit: cover;
            & span:nth-child(1) {
                position: absolute;
                top: 25%;
                right: 50%;
            }
            & span:nth-child(2) {
                position: absolute;
                top: 60%;
                right: 30%;
            }
            & span:nth-child(3) {
                position: absolute;
                top: 55%;
                right: 70%;
            }
        }

        & h1 {
            font-size: $fontSize * 32;
            display: inline-block;
        }
    }

    .shops {
        // outline: 2px solid red;
        position: fixed;
        top: 20vh;
        right: 10vw;
        z-index: 20;
        width: 725px;
        height: 79vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        overflow-y: auto;
        overflow-x: hidden;

        &::-webkit-scrollbar {
            width: 12px; /* 滾動條寬度 */
        }
    }
    .map_shoptitle {
        // outline: 1px red solid;
        // width: 312px;
        width: 720px;
        height: 88px;
        background-image: url(/src/assets/Image/map/bannerBGI.png);
        background-repeat: no-repeat;
        background-position: center center;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 5vh;
        position: fixed;
        top: 8vh;
        right: 10vw;
        z-index: 16;

        h1 {
            font-size: $fontSize * 2;
        }
    }
}
</style>
