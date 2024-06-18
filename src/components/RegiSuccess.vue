<template>
    <img
        src="../assets/Image/login/decoTop.svg"
        alt="deco"
        class="decoTop"
        draggable="false"
    />

    <h2>註冊成功</h2>

    <h4>歡迎成為梨花殿會員<br />您可以開始享受您的美食之旅</h4>

    <div class="regiSuccess_in">
        <router-link to="/login">
            <h3>確定</h3>
        </router-link>
    </div>

    <img
        src="../assets/Image/login/decoBottom.svg"
        alt="deco"
        class="decoBottom"
        draggable="false"
    />
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.decoTop {
    width: 9vw;
    position: absolute;
    top: 0;
    right: 0;
    @include breakpoint(820px) {
        width: 13vw;
    }
    @include breakpoint(430px) {
        display: none;
    }
}
h2 {
    margin: 2vw;
    color: $Black;
    z-index: 1;
}
h4 {
    text-align: center;
    margin: 6vw auto;
    font-weight: bold;
}

.regiSuccess_in {
    background-image: $GoldGrad;
    border: 1px solid $Gold;
    border-radius: 15px;
    margin: 2vw auto 2vw;
    &:active {
        background-image: $RevGoldGrad;
    }
    a {
        background-color: transparent;
        border: none;
        text-decoration: none;
        text-align: center;
        line-height: 52px;
        h3 {
            width: 165px;
            height: 52px;
            color: $DarkBrown;
            font-size: 24px;
            font-weight: 600;
        }
    }
}

.decoBottom {
    height: 14vw;
    position: absolute;
    bottom: 3%;
    left: 0;
    @include breakpoint(820px) {
        height: 20vw;
    }
    @include breakpoint(430px) {
        display: none;
    }
}
</style>
