<template>

    <section class="login_wrapper">
        <div class="login_left">
            <img src="../assets/Image/login/soju.svg" alt="soju" class="login_soju">
            <img src="../assets/Image/login/cup.svg" alt="cup1" class="login_cup1">
            <img src="../assets/Image/login/cup.svg" alt="cup2" class="login_cup2">
        </div>
        <div id="login_right">
            <h2>會員登入</h2>
            <button></button>
            
        </div>

    </section>

</template>

<script>

</script>

<style lang="scss" scoped>
    @import "/src/sass/style.scss";

    .login_wrapper {
        max-width: 100vw;
        width: 100%;
        min-height: 100vh;
        overflow: hidden;
        background-color: $OffWhite;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10vw;

        .login_left {
            width: 30vw;
            position: relative;
            .login_soju{
                display: block;
                height: 40vw;
                margin: 0 auto;
                transform: translate(-2vw);
                filter: drop-shadow(2px 10px 5px #aaa);
            }
            .login_cup1{
                width: 7vw;
                position: absolute;
                top: 40%;
                right: 29%;
                transform: rotate(20deg);
                filter: drop-shadow(7px 7px 3px #bbb);
            }
            .login_cup2{
                width: 7vw;
                position: absolute;
                top:45%;
                right: 2%;
                transform: rotate(-15deg);
                filter: drop-shadow(2px 7px 3px #bbb);
            }
        }
        #login_right{
            width: 30vw;
            background-color: $WarmNude;
            border: 1px solid transparent;
            border-image: $RevGoldGrad;
            border-image-slice: 1;
        }
    }



</style>