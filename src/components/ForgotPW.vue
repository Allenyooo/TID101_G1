<template>
    <img
        src="../assets/Image/login/decoTop.svg"
        alt="deco"
        class="decoTop"
        draggable="false"
    />

    <h2>忘記密碼</h2>

    <form @submit.prevent="submitForgotPWForm">
        <div class="forgot_email">
            <label for="forgot_acc">
                <h4>密碼重設驗證信</h4>
                <h6>請輸入您的電子信箱</h6>
            </label>
            <input
                type="text"
                id="forgot_acc"
                name="forgot_account"
                placeholder="example@account.com"
            />
        </div>

        <div class="forgot_getcode">
            <button>
                <h4>寄送驗證碼</h4>
            </button>
        </div>

        <div class="forgot_code">
            <label for="forgot_int">輸入驗證碼</label>
            <input type="text" id="forgot_int" name="forgot_code" placeholder="* * * * * *" />
        </div>

        <div class="forgot_in">
            <router-link to="/login/newpw">
                <h3>送出</h3>
            </router-link>
        </div>
    </form>

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
    position: relative;
    z-index: 1;
    margin: 2vw;
    color: $Black;
}

.forgot_email {
    display: flex;
    flex-direction: column;
    label {
        font-size: 20px;
        margin-top: 24px;
        margin-bottom: 8px;
        h4 {
            width: fit-content;
            font-weight: bold;
        }
        h6 {
            margin: 8px auto 0;
            font-weight: bold;
        }
    }
    input {
        width: 20vw;
        height: 38px;
        background-color: transparent;
        border: none;
        border-bottom: 1px solid $Black;
        @include breakpoint(820px) {
            width: 33vw;
        }
        @include breakpoint(430px) {
            width: 66vw;
        }
    }
}

.forgot_getcode {
    background-color: #fff;
    border: 4px solid $Gold;
    border-radius: 20px;
    margin: 16px auto;
    width: fit-content;
    &:active {
        background-image: $GoldGrad;
        h4 {
            color: #fff;
        }
    }
    button {
        width: 20vw;
        height: 30px;
        background-color: transparent;
        border: none;
        @include breakpoint(820px) {
            width: 25vw;
        }
        @include breakpoint(430px) {
            width: 55vw;
        }
        h4 {
            color: $Gold;
            font-weight: bold;
        }
    }
}

.forgot_code {
    display: flex;
    flex-direction: column;
    label {
        font-size: 20px;
        margin-top: 24px;
        margin-bottom: 8px;
        font-weight: bold;
    }
    input {
        width: 20vw;
        height: 38px;
        background-color: transparent;
        border: none;
        border-bottom: 1px solid $Black;
        @include breakpoint(820px) {
            width: 33vw;
        }
        @include breakpoint(430px) {
            width: 66vw;
        }
    }
}

.forgot_in {
    background-image: $GoldGrad;
    border: 1px solid $Gold;
    border-radius: 15px;
    margin: 32px auto;
    width: fit-content;
    &:active {
        background-image: $RevGoldGrad;
    }
    a {
        background-color: transparent;
        border: none;
        text-align: center;
        text-decoration: none;
        line-height: 52px;
        h3 {
            width: 165px;
            height: 52px;
            color: $DarkBrown;
            font-weight: 600;
            font-size: 24px;
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
