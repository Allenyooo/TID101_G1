<script>
import northtw from "../components/NorthTW.vue";
import southtw from "../components/SouthTW.vue";
import easttw from "../components/EastTW.vue";
import middletw from "../components/MiddleTW.vue";

export default {

    components: { northtw, southtw, easttw, middletw, },

    data(){
        return{

        }
    },

    methods: {
        nOpen(){},
        mOpen(){},
        sOpen(){},
        eOpen(){},
        nClick(event){
            event.preventDefault();
        },
    }
}

</script>


<template>
    <div class="map_body">

        <div class="islandOpen">
            <div class="ntw">
                <northtw></northtw>
            </div>
            <div class="stw">
                <southtw></southtw>
            </div>
            <div class="etw">
                <easttw></easttw>
            </div>
            <div class="mtw">
                <middletw></middletw>
            </div>
        </div>
<!-- 
        <div class="taiwanIsland">

            <div class="map_title">
                <h1>
                    美食地圖
                </h1>
                <h3>
                    走進梨花殿， <br>
                    享受如夢似幻的美食饗宴
                </h3>
            </div>

            <img src="/src/assets/Image/map/northIsland.png" class="island northIsland" usemap="#nIsland" @click="nOpen">
            <map name="nIsland">
                <area shape="poly" coords="0,0,256,0,256,60,128,199,0,199" class="area"  href="" @click="nClick">
            </map>


            <img src="/src/assets/Image/map/middleIsland.png" class="island middleIsland" @click="mOpen">

            <img src="/src/assets/Image/map/southIsland.png" class="island southIsland" @click="sOpen">
            
            <img src="/src/assets/Image/map/eastIsland.png" class="island eastIsalnd" usemap="#eIsland" @click="eOpen">
            <map name="eIsland">                
                <area shape="poly" coords="155,0,232,0,232,524,0,524,0,393" href="" @click="nClick">
            </map>

        </div> -->
    </div>
</template>


<style lang="scss" scoped>

    @import "/src/sass/style.scss";

    

    .map_body {
        background-color: #F7F2DB;
        width: 100vw;
        height: 100vh;
        background-image: url(/src/assets/Image/map/pointpoint.png);
        transition: 0.3s;
        .taiwanIsland{
            // outline: 1px solid blue;
            max-width: 360px;
            height: 80vh;
            // background-color: #fff;
            margin: 0 auto;
            position: relative;
            transition: 0.3s;

            .map_title{
                // outline: 1px red solid;
                display: inline-block;
                text-align: center;
                position: absolute;
                top: 25%;
                left: -113%;
                h1{
                    margin-bottom: 28px;
                }
                h3{
                    line-height: 1.4;
                }
            }

            &:hover .northIsland{
                transition: 0.3s;
                transform: translateY(-32px);
            }
            &:hover .middleIsland{
                transition: 0.3s;
                transform: translateX(-40px);
            }
            &:hover .southIsland{
                transition: 0.3s;
                transform: translateY(44px);
            }
            &:hover .eastIsalnd{
                transition: 0.3s;
                transform: translateX(60px);
            }

            .northIsland{
                // outline: 1px red solid;
                // cursor: pointer;
                position: absolute;
                top: 44px;
                left: 94px;
                z-index: 10;
            }
            .middleIsland{
                // outline: 1px red solid;
                cursor: pointer;
                position: absolute;
                top: 200px;
                z-index: 15;
            }
            .southIsland{
                // outline: 1px red solid;
                cursor: pointer;
                position: absolute;
                top: 356px;
                left: -10px;
            }
            .eastIsalnd{
                // outline: 1px red solid;
                // cursor: pointer;
                position: absolute;
                top: 108px;
                left: 104px;
            }
            .island:hover{
                transition: 0.3s;
                // filter: drop-shadow(0 0 30px red);
                // transform: translateY(-12px);
                // text-shadow: 0 0 0.5em #fff, 0 0 0.5em #fff, 0 0 0.5em #fff;
            }
            
        }
    }


</style>