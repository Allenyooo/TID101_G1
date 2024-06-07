<template>
    <!--這是前後台首頁-->
    <div class="wrapper">
        <img src="../assets/Image/index/gate.png" alt="" class="gate">
        
        <div class="door">
            <img class="left" src="/src/assets/Image/index/door_left.png" alt="">
            <img class="right" src="/src/assets/Image/index/door_right.png" alt="">
        </div>
        
        <h5 class="frontdesk">前台</h5>
        <h5 class="Backstage">後台</h5>

        <div class="yiayng" @click="cyclerotate">

            <div class="FrontDesk"> 
                <img class="yia" src="../assets/Image/index/yin.png" alt="">
            </div>

            <div class="BackStage">
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
            showText: true
        }
    },
    methods: {
        cyclerotate() {
            this.rotating = false;
            this.showText = true;

            let yiayngElement = document.querySelector('.yiayng');
            let frontDeskElement = document.querySelector('.FrontDesk');
            let backstageElement = document.querySelector('.BackStage');
            
            yiayngElement.classList.add('rotate');

            yiayngElement.addEventListener('animationend', () => {
                frontDeskElement.classList.add('move-right');
                backstageElement.classList.add('move-left');
            }, { once: true });
        }
    }
}
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

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
        .left{
            width: 23vw;
            height: 84vh;
            transform-origin: left;
            transition: transform 2.5s;
            // transform: translate3d(10px 20px 20px 45deg);
        }
        .right{
            width: 23vw;
            height: 84vh;
            transform-origin: right;
            transition: transform 2.5s;
            // transform: translate3d(28px 12px 40px);
        }
        &:hover .left {
            transform: rotateY(-70deg);
        }

        &:hover .right {
            transform: rotateY(70deg);
        }
    }
    .yiayng{
        position: absolute;
        top: 41%;
        left: 42.6%;
        width: 14.4vw;
        height: 15.8vw;
        // animation: cycle 2s linear 1 forwards;
        
        &.rotate {
            animation: cycle 2s linear forwards;
        } 

        .FrontDesk{
            position: absolute;
            top: 30px;
            left: 90px;
            z-index: 1;
            transition: transform 1s;
            
            .yia{
                width: 15vw;
                cursor: pointer;
                position: absolute;
                top: -2.5vw;
                left: -6.8vw;
            }
        }
        .BackStage{
            position: absolute;
            top: 150px;
            left: 80px;
            z-index: 1;
            transition: transform 1s;
            
            .yng{
                width: 15vw;
                cursor: pointer;
                position: absolute;
                bottom: -3.6vw;
                left: -6.6vw;
            }
        }
        // &.rotate {
        //     animation: cycle 3s linear forwards;
        // }
        .move-right {
            transform: translateY(-50px);
        }

        .move-left {
            transform: translateY(50px);
        }
    }
    .frontdesk{
                color: #ccc;
                font-size: 24px;
                font-weight: 800;
                position: absolute;
                padding-left: 10px;
                z-index: 1;
                top: 23vw;
                left: 48vw;
            }
    .Backstage{  //字
        color: #ccc;
        font-size: 24px;
        font-weight: 800;
        position: absolute;
        width: 48px;
        z-index: 1;
        top: 31vw;
        left: 49vw;
    }
}

@keyframes cycle {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(70deg);
    }
}
</style>