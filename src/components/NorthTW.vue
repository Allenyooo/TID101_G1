<script>
import shopcard from "../components/Shopcard.vue";

export default {

components: {shopcard,},

data(){
    return{}
},

methods: {}
}

</script>


<template>
    <section>
        <div class="sidemap">
            <div class="nmap"></div>
        </div>

        <ul class="shops">
            <div class="map_shoptitle">
                <h1>精 選 店 家</h1>
            </div>

            <shopcard can_hover="true" class="cards"></shopcard>
 
            <shopcard can_hover="true"></shopcard>
        </ul>
    </section>
</template>


<style lang="scss" scoped>

    @import "/src/sass/style.scss";

    section {

        .cards{
            margin-bottom: 24px;
        }

        .sidemap{
            outline: 1px blue solid;
            position: fixed;
            top: 10vh;
            left: 5.5vw;
            .nmap{
                background-image: url("../assets/Image/map/northsideOpen.png");
                width: 592px;
                height: 484px;
                object-fit: cover;
            }

            & h1{
                font-size: $fontSize * 32;
                display: inline-block;
            }
        }

        .shops{
            position: fixed;
            top: 10vh;
            right: 3.4vw;            

            .map_shoptitle{
                width: 312px;
                height: 88px;
                background-image: url(/src/assets/Image/map/bannerBGI.png);
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 0 auto;
                margin-bottom: 5vh;

                h1{
                    font-size: $fontSize * 9;
                }
            }            
        }
    }


</style>