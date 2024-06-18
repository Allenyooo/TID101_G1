<script>
import shopcard from "../components/Shopcard.vue";

export default {
    components: { shopcard },

    data() {
        return {
            // marker1Src : "/src/assets/Image/map/unmarker.png",
            // marker2Src : "/src/assets/Image/map/unmarker.png",
            // marker3Src : "/src/assets/Image/map/unmarker.png",
            marker1Src: new URL(
                "@/assets/Image/map/unmarker.png",
                import.meta.url
            ).href,
            marker2Src: new URL(
                "@/assets/Image/map/unmarker.png",
                import.meta.url
            ).href,
            marker3Src: new URL(
                "@/assets/Image/map/unmarker.png",
                import.meta.url
            ).href,
        };
    },

    methods: {
        backToIsland(event) {
            event.stopPropagation(); //停止冒泡事件
            const img = document.querySelector(".southIsland");
            img.style.opacity = "1";
            img.style.transform = "translate(0px, 0px)";
            img.style.transition = "all 0.5s ease";
            img.style.width = "185px";
            img.style.height = "335px";
            this.$router.push("/map");
            console.log("backToIsland is called");
            img.style.transform = "";
        },
        markLight1() {
            //this.marker1Src = "/src/assets/Image/map/marker.png";
            this.marker1Src = new URL(
                "@/assets/Image/map/marker.png",
                import.meta.url
            ).href;
        },
        unmarker1() {
            //this.marker1Src = "/src/assets/Image/map/unmarker.png";
            this.marker1Src = new URL(
                "@/assets/Image/map/unmarker.png",
                import.meta.url
            ).href;
        },
        markLight2() {
            //this.marker2Src = "/src/assets/Image/map/marker.png";
            this.marker2Src = new URL(
                "@/assets/Image/map/marker.png",
                import.meta.url
            ).href;
        },
        unmarker2() {
            //this.marker2Src = "/src/assets/Image/map/unmarker.png";
            this.marker2Src = new URL(
                "@/assets/Image/map/unmarker.png",
                import.meta.url
            ).href;
        },
        markLight3() {
            //this.marker3Src = "/src/assets/Image/map/marker.png";
            this.marker3Src = new URL(
                "@/assets/Image/map/marker.png",
                import.meta.url
            ).href;
        },
        unmarker3() {
            //this.marker3Src = "/src/assets/Image/map/unmarker.png";
            this.marker3Src = new URL(
                "@/assets/Image/map/unmarker.png",
                import.meta.url
            ).href;
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
                    <img :src="marker1Src" alt="" />
                </span>
                <span>
                    <img :src="marker2Src" alt="" />
                </span>
                <span>
                    <img :src="marker3Src" alt="" />
                </span>
            </div>
        </div>

        <div class="map_shoptitle">
            <h1>精 選 店 家</h1>
        </div>

        <ul class="shops">
            <router-link to="/restaurant" class="marker">
                <shopcard
                    can_hover="true"
                    @mouseenter.native="markLight1"
                    @mouseleave.native="unmarker1"
                ></shopcard>
            </router-link>

            <router-link to="/restaurant" class="marker">
                <shopcard
                    can_hover="true"
                    @mouseenter.native="markLight2"
                    @mouseleave.native="unmarker2"
                ></shopcard>
            </router-link>

            <router-link to="/restaurant" class="marker">
                <shopcard
                    can_hover="true"
                    @mouseenter.native="markLight3"
                    @mouseleave.native="unmarker3"
                ></shopcard>
            </router-link>
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
            background-image: url("../assets/Image/map/southsideOpen2.png");
            background-size: cover;
            // width: 512px;
            width: 32vw;
            // height: 667px;
            height: 41.6864vw;
            opacity: 1;
            position: relative;
            // object-fit: cover;
            & span:nth-child(1) {
                position: absolute;
                top: 10%;
                right: 55%;
            }
            & span:nth-child(2) {
                position: absolute;
                top: 40%;
                right: 60%;
            }
            & span:nth-child(3) {
                position: absolute;
                top: 85%;
                right: 25%;
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
