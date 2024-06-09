<template>
    <img
        src="../assets/Image/login/decoTop.svg"
        alt="deco"
        class="decoTop"
        draggable="false"
    />

    <h2>設定新密碼</h2>

    <div class="newPW_password">
        <label for="newPW_PW">輸入新密碼</label>
        <input
            type="password"
            id="newPW_PW"
            placeholder="* * * * * * * * * *"
        />
        <p>8 ~ 10個字符，必須至少各一個大小寫字符</p>
    </div>

    <div class="newPW_confirmPW">
        <label for="newPW_confirm">確認新密碼</label>
        <input
            type="password"
            id="newPW_confirm"
            placeholder="* * * * * * * * * *"
        />
    </div>

    <div class="newPW_in">
        <button>
            <h3>修改密碼</h3>
        </button>
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
.decoTop {
    width: 9vw;
    position: absolute;
    top: 0;
    right: 0;
}
h2 {
    margin: 2vw;
    color: $Black;
}

.newPW_password {
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
    }
    p {
        color: $Gray;
    }
}

.newPW_confirmPW {
    display: flex;
    flex-direction: column;
    label {
        font-size: 20px;
        margin-top: 2vw;
        margin-bottom: 8px;
        font-weight: bold;
    }
    input {
        width: 20vw;
        height: 38px;
        background-color: transparent;
        border: none;
        border-bottom: 1px solid $Black;
    }
}

.newPW_in {
    background-image: $GoldGrad;
    border: 1px solid $Gold;
    border-radius: 15px;
    margin: 2vw auto 2vw;
    &:active {
        background-image: $RevGoldGrad;
    }
    button {
        width: 165px;
        height: 52px;
        background-color: transparent;
        border: none;
        h3 {
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
}
</style>
