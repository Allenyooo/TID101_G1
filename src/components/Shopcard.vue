<script>

export default {

    props:{
        can_hover: {
            default : true,
        }
    },

    data(){
        return{
            hovered : false,
        }
    },

    methods: {
        cardOpen(){
            this.hovered = !this.hovered;
        },
    }
}

</script>



<template>
    <li :class="{ map_open : hovered }" @mouseover="cardOpen" @mouseleave="cardOpen">
        <img src="/src/assets/Image/map/koreawaybgi.png" alt="" >
        <div class="shopinfo">
            <h3>高麗味</h3>
            <div class="content">
                <div class="address">
                    <img src="/src/assets/Image/map/addressLogo.png" alt="">
                    <h5>台北市，天母區</h5>
                </div>
                <div class="star">
                    <img src="/src/assets/Image/map/star.png" alt="">
                    <h5>4.8</h5>
                </div>
            </div>
        </div>
    </li>
</template>


<style lang="scss" scoped>

    @import "/src/sass/style.scss";

    li{
        // outline: 1px red solid;
        width: 460px;
        height: 202px;
        border-radius: 15px;
        overflow: hidden;
        transition: 0.2s;

        img{
            width: 100%;
            height: 132px;
            object-fit: cover;
            display: block;
        }
        .shopinfo{
            width: 100%;
            height: 100%;
            background-color: $OffWhite;
            padding-left: 32px;
            padding-top: 4px;
            & h3{
                margin-bottom: 4px;
                font-weight: bold;
            }
            .content{
                display: flex;
                align-items: center;
                & img{
                    width: 16px;
                    height: 16px;
                    margin-right: 5px;
                }
                .address{
                    display: flex;
                    align-items: center;
                    margin-right: 32px;
                }
                .star{
                    display: flex;
                    align-items: center;
                }
            }
        }
    // ------------------hover效果
}

.map_open{
    transition: 0.2s;
    width: 720px;
    height: 364px;
    outline: 2px solid red;
}
</style>