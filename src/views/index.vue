<template>
    <!--這是前後台首頁-->
    <div class="wrapper">
        <div class="gap">
            <img src="../assets/Image/index/wall.png" alt="">
        </div>
        <div class="main">
            <img src="../assets/Image/index/gate.png" alt="" class="gate">

            <div class="door" :class="{ rotate: rotating }">
                <img class="left" src="/src/assets/Image/index/door_left.png" alt="">
                <img class="right" src="/src/assets/Image/index/door_right.png" alt="">
            </div>

            <div class="yiayng" @click="cyclerotate" :class="{ rotate: rotating }">

                <div class="yiayng__group -top" :class="{ 'move-right': moved, 'highlight': rotating }">

                    <router-link to="/enter" class="yiayng__link -frontend">
                        <h5 class="yiayng__title">前台</h5>
                    </router-link>

                    <img class="yiayng__img -yia" src="../assets/Image/index/top.svg" alt="">
                </div>

                <div class="yiayng__group -bottom" :class="{ 'move-left': moved, 'highlight': rotating }">

                    <router-link to="/BkHome" class="yiayng__link -backend">
                        <h5 class="yiayng__title">後台</h5>
                    </router-link>

                    <img class="yiayng__img -yng" src="../assets/Image/index/bottom.svg" alt="">
                </div>

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

.wrapper {
    background-color: #333;
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    z-index: 3;

}

.gap {
    flex: 1 0 auto;
    position: relative;
    background: #fff;

    img {
        width: 100%;
        height: auto;
        position: absolute;
        bottom: -100px;
        left: 0;
        object-position: center bottom;

        @include breakpoint(1174px) {
            height: auto;
            width: auto;
        }

        @include breakpoint(1028px) {
            bottom: 17px;
        }
    }
}

.door {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    display: flex;

    @include breakpoint(820px) {
        scale: 2.25;
        top: 48%;
        left: 78%;
    }

    @include breakpoint(430px) {
        transform: translateX(-50%);
        display: flex;
        width: 33%;
        height: 87%;
        scale: 508%;
        top: 81%;
        left: 88%;
    }

    .left,
    .right {
        width: 23vw;
        height: 42vw;
    }

    .left {
        transform-origin: left;

        @include breakpoint(820px) {
            width: 23vw;
            height: 45vw;
            margin-top: -3vw;
        }
    }

    .right {
        transform-origin: right;

        @include breakpoint(820px) {
            width: 23vw;
            height: 45vw;
            margin-top: -3vw;
        }
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

.gate {
    width: 100%;
    height: auto;
    display: block;
    position: relative;
    margin-top: -20px;

    @include breakpoint(820px) {
        height: 85vh;
        width: 238%;
        margin-top: -63.5px;
        margin-left: -70vw;
    }

    @include breakpoint(810px) {
        height: unset;
    }
}

.main {
    position: relative;
}


.yiayng {
    position: absolute;
    top: 42%;
    left: 42%;
    width: 15.8vw;
    height: 15.8vw;

    @include breakpoint(1280px) {
        top: 42%;
        left: 42%;
    }

    @include breakpoint(430px) {
        position: fixed;
        top: auto;
        left: 7.5vw;
        bottom: 74vw;
        width: 85vw;
        height: 85vw;
    }



    .-top {
        .-frontend {
            @include breakpoint(820px) {
                top: 3px
            }
        }

        a:hover~img {
            transform: translateY(-10px);
            filter: drop-shadow(5px 8px 2px rgba(0, 0, 0, 0.7));


            @include breakpoint(1280px) {
                transform: translateY(-2px);
            }

            @include breakpoint(430px) {
                transform: translateY(-1px);
            }
        }


    }

    .-bottom {
        a:hover~img {
            transform: translateY(-10px);
            filter: drop-shadow(5px 8px 2px rgba(0, 0, 0, 0.7));


            @include breakpoint(1280px) {
                transform: translateY(-2px);
            }

            @include breakpoint(430px) {
                transform: translateY(-1px);
            }
        }
    }


    h5 {
        font-size: 24px;

        @include breakpoint(430px) {
            font-size: 28px;
            margin-bottom: 1vw;
        }

    }

    &.rotate {
        animation: cycle 2s linear forwards;
    }

    &__group {
        position: absolute;
        top: 0px;
        left: 0px;
        z-index: 1;
        transition: transform 1s;
        width: 100%;
        height: 100%;
        // pointer-events: none;

        // a{
        //     pointer-events: auto;
        // }

        &.move-right {
            transform: translateY(-50px);
        }

        &.move-left {
            transform: translateY(50px);
        }
    }

    &__title {

        .highlight & {
            transform: scale(1.2);
            text-shadow: 4px 1px 4px rgb(8, 8, 9);
        }
    }

    &__link {
        color: #ccc;
        font-size: 24px;
        font-weight: 800;
        position: absolute;
        z-index: 1;
        width: 100%;
        height: 50%;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;

        &.-frontend {
            top: 0;


        }

        &.-backend {
            bottom: 0;
        }
    }

    &__img {
        width: 100%;
        height: 100%;
        cursor: pointer;
        display: block;
        transition: all .3s ease;
        pointer-events: none;

        // &:hover {
        //     transform: translateY(-10px);
        //     filter: drop-shadow(5px 8px 2px rgba(0, 0, 0, 0.7));


        //     @include breakpoint(1280px) {
        //         transform: translateY(-2px);
        //     }

        //     @include breakpoint(430px) {
        //         transform: translateY(-1px);
        //     }
        // }
    }

    // .yiayng__group -top{

    // }
    // .yiayng__group -bottom{

    // }
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