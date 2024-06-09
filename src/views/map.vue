<script>
import northtw from "../components/NorthTW.vue";
import southtw from "../components/SouthTW.vue";
import easttw from "../components/EastTW.vue";
import middletw from "../components/MiddleTW.vue";

export default {
    components: { northtw, southtw, easttw, middletw },

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
                img.removeEventListener('transitionend', (event)=>{
                    this.$router.push('/map/north');
                });

                img.style.width = '510px';
                img.style.height = '400px';
                img.style.transform = 'translate(-720px, 110px)';
                img.style.transition = 'all 0.5s ease';
                console.log('nMove');

                img.addEventListener('transitionend', (event)=>{
                    this.$router.push('/map/north');
                    console.log('nWave is called');
                });

            }
        },

        mWave(event) {
            const img = this.$refs.middleIslandImg;
            if (img) {
                img.removeEventListener('transitionend', ()=>{
                    this.$router.push('/map/middle');
                });

                img.style.width = '510px';
                img.style.height = '400px';
                img.style.transform = 'translate(-645px, 15px)';
                img.style.transition = 'all 0.5s ease';

                img.addEventListener('transitionend', ()=>{
                    this.$router.push('/map/middle');
                    console.log('mWave is called');
                });
            }
        },

        sWave(event) {
            const img = this.$refs.southIslandImg;
            if (img) {
                img.removeEventListener('transitionend', ()=>{
                    this.$router.push('/map/south');
                });

                img.style.width = '400px';
                img.style.height = '650px';
                img.style.transform = 'translate(-645px, -270px)';
                img.style.transition = 'all 0.5s ease';

                img.addEventListener('transitionend', ()=>{
                    this.$router.push('/map/south');
                    console.log('sWave is called');
                });
            }
        },
        eWave() {
            alert("east");
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
            <router-link to="/map/south" @click.native="sWave">
                <img
                    src="/src/assets/Image/map/southIsland.png"
                    class="island southIsland"
                    ref="southIslandImg"
                />
            </router-link>

            <!-- 東部 -->
            <router-link to="/map/east" @click.native="eWave">
                <img
                    src="/src/assets/Image/map/eastIsland.png"
                    class="island eastIsalnd"
                    ref="eastIslandImg"
                />
            </router-link>
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
        &:hover .eastIsalnd {
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
        }
        .eastIsalnd {
            // outline: 1px red solid;
            // cursor: pointer;
            position: absolute;
            top: 108px;
            left: 104px;
            transition: 0.3s;
        }
    }
}

.island{
    cursor: pointer;
}

.island:hover{
    filter: drop-shadow(0 0 30px $Gold);
}

</style>
