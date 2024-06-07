<template>
    <!--這是前後台首頁-->
    <div class="wrapper">
        <img src="../assets/Image/index/gate.png" alt="" class="gate">
        <div class="door">
            
            <img class="left" src="/src/assets/Image/index/door_left.png" alt="">

            <img class="right" src="/src/assets/Image/index/door_right.png" alt="">
        </div>

        <div class="yiayng">
            <div class="yia">
                <img cless="yia" src="../assets/Image/index/yin.png" alt="">
            </div>
            <div class="yng">
                <img cless="yng" src="../assets/Image/index/yng.png" alt="">
            </div>
        </div>

    </div>
</template>

<script>

</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.wrapper {
    // background-image: url(/src/assets/Image/index/backgroundimg.png);
    background-color: #333;
    width: 100vw;
    height: 100vh;
    position: relative;
    overflow: hidden;

    .gate {
        width: 100vw;
        height: 100vh;
    }

    .door {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        display: flex;

        .left {
            width: 23vw;
            height: 84vh;
            transform-origin: left;
            transition: transform 2.5s;
            
            // transform: translate3d(10px 20px 20px 45deg);
        }


        .right {
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
        @-moz-keyframes spin { 10% { -moz-transform: rotate(45deg); } }
        @-webkit-keyframes spin { 10% { -webkit-transform: rotate(90deg); } }
        @keyframes spin { 10% { -webkit-transform: rotate(-90deg); transform:rotate(250deg);} } 
        -moz-animation:spin 4s linear infinite;
        animation:spin 4s linear infinite;
        .yia{
            position: absolute;
            top: 291px;
            left: 606px;
            width: 264px;
            }        
        
        .yng{
            width: 264px;
            position: absolute;
            top: 340px;
            left: 601px;
            }
                    }
            }

</style>