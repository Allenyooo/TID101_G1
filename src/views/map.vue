<script>
import northtw from "../components/NorthTW.vue";
import southtw from "../components/SouthTW.vue";
import easttw from "../components/EastTW.vue";
import middletw from "../components/MiddleTW.vue";

export default {
    data() {
        return {
            // northOpen : false,
        };
    },

    methods: {
        nWave(event) {
            const img = this.$refs.northIslandImg;
            console.log(img);
            if (img) {
                const moveToN = () => {
                    console.log("moveToN is called");
                    this.$router.push("/map/north");
                };

                img.removeEventListener("transitionend", moveToN, {
                    once: true,
                });

                img.style.width = "510px";
                img.style.height = "400px";
                img.style.transform = "translate(-720px, 110px)";
                img.style.transition = "all 0.5s ease";
                img.style.opacity = "0";
                console.log("nMove");

                img.addEventListener("transitionend", moveToN, { once: true });
            }
        },

        mWave(event) {
            const img = this.$refs.middleIslandImg;
            if (img) {
                const moveToM = () => {
                    console.log("moveToM is called");
                    this.$router.push("/map/middle");
                };

                img.removeEventListener("transitionend", moveToM);

                img.style.width = "510px";
                img.style.height = "400px";
                img.style.transform = "translate(-645px, 15px)";
                img.style.transition = "all 0.5s ease";
                img.style.opacity = "0";

                img.addEventListener("transitionend", moveToM, { once: true });
            }
        },

        sWave(event) {
            const img = this.$refs.southIslandImg;
            if (img) {
                const moveToS = () => {
                    console.log("moveToS is called");
                    this.$router.push("/map/south");
                };

                img.removeEventListener("transitionend", moveToS);

                img.style.width = "370px";
                img.style.height = "660px";
                img.style.transform = "translate(-565px, -265px)";
                img.style.transition = "all 0.5s ease";
                img.style.opacity = "0";

                img.addEventListener("transitionend", moveToS, { once: true });
            }
        },
        eWave(event) {
            const img = this.$refs.eastIslandImg;
            if (img) {
                const moveToE = () => {
                    console.log("moveToE is called");
                    this.$router.push("/map/east");
                };

                img.removeEventListener("transitionend", moveToE);

                img.style.width = "300px";
                img.style.height = "695px";
                img.style.transform = "translate(-700px, -20px)";
                img.style.transition = "all 0.5s ease";
                img.style.opacity = "0";

                img.addEventListener("transitionend", moveToE, { once: true });
            }
        },
    },
    computed: {},
};
</script>

<template>
    <div class="map_body">
        <div class="islandOpen">
            <router-view></router-view>
        </div>

        <div class="taiwanIsland">
            <div class="map_title">
                <h1>美食地圖</h1>
                <h3>
                    走進梨花殿， <br />
                    享受如夢似幻的美食饗宴
                </h3>
            </div>

            <!-- 北部 -->
            <img
                src="/src/assets/Image/map/northIsland.png"
                class="island northIsland"
                ref="northIslandImg"
                @click.native="nWave"
            />

            <!-- 中部 -->
            <img
                src="/src/assets/Image/map/middleIsland.png"
                class="island middleIsland"
                ref="middleIslandImg"
                @click.native="mWave"
            />

            <!-- 南部 -->
            <img
                src="/src/assets/Image/map/southIsland.png"
                class="island southIsland"
                ref="southIslandImg"
                @click.native="sWave"
            />

            <!-- 東部 -->
            <img
                src="/src/assets/Image/map/eastIsland.png"
                class="island eastIsland"
                ref="eastIslandImg"
                @click.native="eWave"
            />
        </div>
    </div>

    <div class="map_animaObj">
        <div>
            <img src="/src/assets/Image/map/cloudNE.png" alt="" />
            <img src="/src/assets/Image/map/cloudNW.png" alt="" />
            <img src="/src/assets/Image/map/cloudSE.png" alt="" />
            <img src="/src/assets/Image/map/cloudSW.png" alt="" />
            <img src="/src/assets/Image/map/bird1.png" alt="" />
            <img src="/src/assets/Image/map/bird2.png" alt="" />
            <img src="/src/assets/Image/map/bird3.png" alt="" />
            <img src="/src/assets/Image/map/waveNE.png" alt="" />
            <img src="/src/assets/Image/map/waveNW.png" alt="" />
            <img src="/src/assets/Image/map/waveSE.png" alt="" />
            <img src="/src/assets/Image/map/waveSW.png" alt="" />
            <img src="/src/assets/Image/map/waveW.png" alt="" />
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.map_body {
    background-color: #f7f2db;
    width: 100%;
    height: 90.96vh;
    background-image: url(/src/assets/Image/map/pointpoint.png);
    transition: 0.3s;
    overflow: hidden;
    // .islandOpen{
    //     position: fixed;
    //     z-index: 20;
    // }
    .taiwanIsland {
        // outline: 1px solid blue;
        max-width: 360px;
        height: 80vh;
        // background-color: #fff;
        margin: 0 auto;
        position: relative;
        transition: 0.3s;

        .map_title {
            // outline: 1px red solid;
            display: inline-block;
            text-align: center;
            position: absolute;
            z-index: 0;
            top: 25%;
            left: -113%;
            h1 {
                margin-bottom: 28px;
            }
            h3 {
                line-height: 1.4;
            }
        }

        &:hover .northIsland {
            transition: 0.3s;
            transform: translateY(-32px);
        }
        &:hover .middleIsland {
            transition: 0.3s;
            transform: translateX(-40px);
        }
        &:hover .southIsland {
            transition: 0.3s;
            transform: translateY(44px);
        }
        &:hover .eastIsland {
            transition: 0.3s;
            transform: translateX(80px);
        }

        .northIsland {
            // outline: 1px red solid;
            // cursor: pointer;
            position: absolute;
            top: 44px;
            left: 94px;
            z-index: 10;
            transition: 0.3s;
        }
        .middleIsland {
            // outline: 1px red solid;
            cursor: pointer;
            position: absolute;
            top: 200px;
            z-index: 11;
            transition: 0.3s;
        }
        .southIsland {
            // outline: 1px red solid;
            cursor: pointer;
            position: absolute;
            top: 356px;
            left: -10px;
            transition: 0.3s;
            z-index: 10;
        }
        .eastIsland {
            // outline: 1px red solid;
            // cursor: pointer;
            position: absolute;
            top: 108px;
            left: 104px;
            transition: 0.3s;
            z-index: 10;
        }
    }
}

.island {
    cursor: pointer;
}

.island:hover {
    filter: drop-shadow(0 0 30px $Gold);
}

.map_animaObj {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;

    & > div {
        margin: 0 auto;
        // top: 50%;
        // left: 40%;
        position: relative;
        max-width: 25vw;
        height: 100%;

        & img:nth-child(1) {
            display: block;
            width: 12vw;
            height: 4.314vw;
            z-index: 12;
            position: absolute;
            top: 20%;
            right: -80%;
            animation: cloudNE 13s linear infinite;
            @keyframes cloudNE{
                0%{
                    left: 3%;
                    opacity: 0;
                }

                5%{
                    left: 7%;
                    opacity: 1;
                }

                95%{
                    opacity: 1;
                }

                100%{
                    left: 90%;
                    opacity: 0;
                }
            }
        }
        & img:nth-child(2) {
            display: block;
            width: 6vw;
            height: 2.21vw;
            position: absolute;
            top: 15%;
            left: -40%;
            animation: cloudNW 13s linear infinite;
            z-index: 12;
            @keyframes cloudNW{
                0%{
                    left: 60%;
                    opacity: 0;
                }

                48%{
                    left: 60%;
                    opacity: 0;
                }

                50%{
                    left: 60.5%;
                    opacity: 1;
                }

                95%{
                    left: 82%;
                    opacity: 1;
                    /* display: none; */
                }

                100%{
                    left: 85%;
                    opacity: 0;
                    /* display: none; */
                }
            }
        }
        & img:nth-child(3) {
            display: block;
            width: 12vw;
            height: 4.314vw;
            position: absolute;
            bottom: 40%;
            right: -100%;
            animation: cloudSE 13s linear infinite;
            z-index: 12;
            @keyframes cloudSE{
                0%{
                    left: 50%;
                    opacity: 0;
                }

                2%{
                    left: 51%;
                    opacity: 1;
                }

                93%{
                    opacity: 1;
                }

                100%{
                    left: 90%;
                    opacity: 0;
                }
            }

        }
        & img:nth-child(4) {
            display: block;
            width: 8vw;
            height: 2.9367vw;
            position: absolute;
            bottom: 30%;
            left: -80%;
            animation: cloudSW 13s linear infinite;
            z-index: 12;
            @keyframes cloudSW{
                0%{
                    left: 1%;
                    opacity: 0;
                }

                2%{
                    left: 2%;
                    opacity: 1;
                }

                93%{
                    opacity: 1;
                }

                100%{
                    left: 40%;
                    opacity: 0;
                }
            }

        }
        & img:nth-child(5) {
            display: block;
            width: 4vw;
            height: 1.27vw;
            position: absolute;
            top: 50%;
            left: -100%;
            animation: bird1 13s linear infinite;

            @keyframes bird1{
                0%{
                    transform: translate(-50%, -80px) rotate(0deg);
                }
                
                25%{
                    transform: translate(50px, -80%) rotate(-30deg);
                }

                35%{
                    transform: translate(50%, -90px) rotate(-20deg);
                }
                
                50%{
                    transform: translate(-50%, -20px) rotate(20deg);
                }
                
                75%{
                    transform: translate(100px, -50%) rotate(-10deg);
                }
                
                100%{
                    transform: translate(-50%, -80px) rotate(0deg);
                }
            }
        }

        & img:nth-child(6) {
            display: block;
            width: 6vw;
            height: 2.8vw;
            position: absolute;
            top: 40%;
            right: -90%;
            animation: bird2 13s linear infinite;
            @keyframes bird2{
                0%{
                    transform: translateX(-50%) translateY(-20%) rotate(0);
                }

                25%{
                    transform: translateX(-70%) translateY(-280%) rotate(20deg);
                }

                50%{
                    transform: translateX(-150%) translateY(-180%) rotate(50deg);
                }

                75%{
                    transform: translateX(-80%) translateY(-100%) rotate(-20deg);
                }

                100%{
                    transform: translateX(-50%) translateY(-20%) rotate(0);
                }
            }
        }
        & img:nth-child(7) {
            display: block;
            width: 6vw;
            height: 2.8vw;
            position: absolute;
            bottom: 20%;
            right: -10%;
            animation: bird3 13s linear infinite;
            @keyframes bird3{
                0%{
                    transform: translate(-50%, -80px) rotate(0deg);
                }
                
                25%{
                    transform: translate(50px, -80%) rotate(-30deg);
                }

                35%{
                    transform: translate(50%, -90px) rotate(-20deg);
                }
                
                50%{
                    transform: translate(-50%, -20px) rotate(20deg);
                }
                
                75%{
                    transform: translate(100px, -50%) rotate(-10deg);
                }
                
                100%{
                    transform: translate(-50%, -80px) rotate(0deg);
                }
            }
        }
        & img:nth-child(8) {
            position: absolute;
            top: 20%;
            right: -130%;
            animation: waveNE 13s linear infinite;
            @keyframes waveNE{
                0%{
                    right: -130%;;
                    opacity: 0;
                }

                2%{
                    right: -129%;;
                    opacity: 1;
                }

                93%{
                    opacity: 1;
                }

                100%{
                    right: -30%;
                    opacity: 0;
                }
            }

        }
        & img:nth-child(9) {
            position: absolute;
            top: 10%;
            left: -80%;
            animation: waveNW 13s linear infinite;
            @keyframes waveNW{
                0%{
                    left: -101%;
                    opacity: 0;
                }

                2%{
                    left: -100%;
                    opacity: 1;
                }

                93%{
                    opacity: 1;
                }

                100%{
                    left: -70%;
                    opacity: 0;
                }
            }            
        }
        & img:nth-child(10) {
            position: absolute;
            bottom: 16%;
            right: -150%;
            animation: waveSE 13s linear infinite;
            @keyframes waveSE{
                0%{
                    right: -138%;
                    opacity: 0;
                }

                2%{
                    right: -135%;
                    opacity: 1;
                }

                93%{
                    opacity: 1;
                }

                100%{
                    right: -110%;
                    opacity: 0;
                }
            }  
        }
        & img:nth-child(11) {
            position: absolute;
            bottom: 18%;
            left: -130%;
            animation: waveSW 13s linear infinite;
            @keyframes waveSW{
                0%{
                    left: -130%;
                    opacity: 0;
                }

                2%{
                    left: -128%;
                    opacity: 1;
                }

                93%{
                    opacity: 1;
                }

                100%{
                    left: -50%;
                    opacity: 0;
                }
            }  
            
        }
        & img:nth-child(12) {
            position: absolute;
            top: 40%;
            left: -150%;
            animation: waveW 13s linear infinite;
            @keyframes waveW{
                0%{
                    left: -136%;
                    opacity: 0;
                }

                2%{
                    left: -135%;
                    opacity: 1;
                }

                93%{
                    opacity: 1;
                }

                100%{
                    left: -90%;
                    opacity: 0;
                }
            } 
        }
    }
}
</style>
