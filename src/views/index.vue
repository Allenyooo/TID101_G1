<template>
    <!--這是前後台首頁-->
    <div class="wrapper">
        <img src="../assets/Image/index/gate.png" alt="" class="gate">
        
        <div class="door" :class="{rotate: rotating}">
            <img class="left" src="/src/assets/Image/index/door_left.png" alt="">
            <img class="right" src="/src/assets/Image/index/door_right.png" alt="">
        </div>

        <div class="yiayng" @click="cyclerotate" :class="{rotate: rotating}">

            <div class="FrontDesk" :class="{ 'move-right': moved, 'highlight': rotating }">
                
                <router-link to="/enter">
                    <h5 class="frontdesk">前台</h5>
                </router-link>
                
                <img class="yia" src="../assets/Image/index/yin.png" alt="">
            </div>

            <div class="BackStage" :class="{ 'move-left': moved, 'highlight': rotating }">

                <router-link to="/BkHome">
                    <h5 class="Backstage">後台</h5>
                </router-link>
                
                <img class="yng" src="../assets/Image/index/yng.png" alt="">
            </div>

        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            rotating: false,
            moved: false
        }
    },
    methods: {
        cyclerotate() {
            this.rotating = true;

            setTimeout(() => {
                this.moved = true;
            }, 2500); 
        }
    }
}
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

//RWD
// @mixin windows{
//   @media(max-width:1280px){
//     @content;
//   }
// }

// @mixin xxx{
//   @media(max-width:1024px){
//     @content;
//   }
// }

// @mixin tablet{
//   @media(max-width:820px){
//     @content;
//   }
// }

// @mixin mobile{
//   @media(max-width:430px){
//     @content;
//   }
// }
// @mixin mobile{
//   @media(max-width:375px){
//     @content;
//   }
// }

.wrapper{
    background-color: #333;
    width: 100vw;
    height: 100vh;
    position: relative;
    overflow: hidden;
    .gate{
        width: 100vw;
        height: 100vh;
    }
    .door{
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        .left, .right {
            width: 23vw;
            height: 86vh;
        }
        .left {
            transform-origin: left;
        }

        .right {
            transform-origin: right;
        }
        &.rotate .left {
            animation: door-left-rotate 2.5s linear forwards;

            animation-delay: 2.5s; //門打開時間
        }

        &.rotate .right {
            animation: door-right-rotate 2.5s linear forwards;

            animation-delay: 2.5s; // 門打開時間
        }
    }
    .yiayng{
        position: absolute;
        top: 40%;
        left: 42.3%;
        width: 16vw;
        height: 16vw;
        &.rotate {
            animation: cycle 2s linear forwards;
        }
        .FrontDesk{
            position: absolute;
            top: 30px;
            left: 90px;
            z-index: 1;
            transition: transform 5s;
            .frontdesk{
                color: #ccc;
                font-size: 24px;
                font-weight: 800;
                position: absolute;
                padding-left: 10px;
                z-index: 1;
                width: 58px;
                top: 1px;
                left: -16px;
            }
            .yia{
                width: 15.0vw;
                cursor: pointer;
                position: absolute;
                top: -2.1vw;
                left: -5.9vw;
                transition: all .5s ease;
                &:hover{
                    transform: translateY(-10px);
                &:hover{
                    filter: drop-shadow(5px 8px 2px rgba(0, 0, 0, 0.7));
                }
                }
            }
        }
        .BackStage{
            position: absolute;
            top: 150px;
            left: 80px;
            z-index: 1;
            transition: transform 1s;
            .Backstage{  //字
                color: #ccc;
                font-size: 24px;
                font-weight: 800;
                position: absolute;
                width: 48px;
                z-index: 1;
                top: 0vw;
                left: 0.5vw;
            }
            .yng{
                width: 15vw;
                cursor: pointer;
                position: absolute;
                z-index: 0;
                bottom: -5.0vw;
                left: -5.68vw;
                transition: all .5s ease;
                &:hover{
                    transform: translateY(-10px);
                }
                &:hover{
                    filter: drop-shadow(5px 8px 2px rgba(0, 0, 0, 0.7));
                }
            }
        }
        
        .move-right {
            transform: translateY(-50px);
        }

        .move-left {
            transform: translateY(50px);
        }

        .highlight .frontdesk, .highlight .Backstage {
            width: 68px;
            font-size: 28px;
            text-shadow: 4px 1px 4px rgb(8, 8, 9);
        }
    }
}

@keyframes cycle {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
@keyframes door-left-rotate {
    0% {
        transform: rotateY(0deg);
    }
    100% {
        transform: rotateY(-70deg);
    }
}

@keyframes door-right-rotate {
    0% {
        transform: rotateY(0deg);
    }
    100% {
        transform: rotateY(70deg);
    }
}


</style>