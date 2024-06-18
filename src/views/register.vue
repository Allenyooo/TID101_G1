<template>
    <section class="register_wrapper">
        <div class="register_left">
            <img
                src="../assets/Image/login/soju.svg"
                alt="soju"
                class="register_soju"
                draggable="false"
            />
            <img
                src="../assets/Image/login/cup.svg"
                alt="cup1"
                class="register_cup1"
                draggable="false"
            />
            <img
                src="../assets/Image/login/cup.svg"
                alt="cup2"
                class="register_cup2"
                draggable="false"
            />
        </div>
        <div id="register_right">
            <router-view />
        </div>
    </section>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

@mixin breakpoint($point) {
    @media screen and (max-width: $point) {
        @content;
    }
}

.register_wrapper {
    max-width: 100vw;
    width: 100%;
    min-height: 100vh;
    overflow: hidden;
    background-color: $OffWhite;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10vw;
    @include breakpoint(430px) {
        flex-direction: column-reverse;
    }
    .register_left {
        width: 30vw;
        position: relative;
        .register_soju {
            display: block;
            height: 40vw;
            margin: 0 auto;
            transform: translate(-2vw);
            filter: drop-shadow(2px 10px 5px #aaa);
            @include breakpoint(430px) {
                position: absolute;
                height: 70vh;
                top: -70vh;
                right: -50vw;
                opacity: 0.1;
            }
        }
        .register_cup1 {
            width: 7vw;
            position: absolute;
            top: 40%;
            right: 29%;
            transform: rotate(20deg);
            filter: drop-shadow(7px 7px 3px #bbb);
            @include breakpoint(430px) {
                width: 40vw;
                transform: rotate(0);
                top: -25vh;
                right: 130%;
                opacity: 0.2;
            }
        }
        .register_cup2 {
            width: 7vw;
            position: absolute;
            top: 45%;
            right: 2%;
            transform: rotate(-15deg);
            filter: drop-shadow(2px 7px 3px #bbb);
            @include breakpoint(430px) {
                width: 40vw;
                transform: rotate(0);
                top: -35vh;
                right: 130%;
                opacity: 0.2;
                filter: unset;
            }
        }
    }
    #register_right {
        position: relative;
        width: 30vw;
        background-color: $WarmNude;
        border: 1px solid transparent;
        border-image: $RevGoldGrad;
        border-image-slice: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
        margin: 5vh 0;
        @include breakpoint(820px) {
            width: 40vw;
        }
        @include breakpoint(430px) {
            background-color: unset;
            border-image: unset;
            width: 80vw;
        }
    }
}
</style>
