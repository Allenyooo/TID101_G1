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
            v-model="newPassword"
            placeholder="* * * * * * * * * *"
        />
        <p>8 ~ 10個字符，必須至少一個數字跟英文字母</p>
        <span v-if="newPasswordError" class="error">{{
            newPasswordError
        }}</span>
        <span v-if="!newPassword && !newPasswordError" class="error"
            >請輸入新密碼</span
        >
    </div>

    <div class="newPW_confirmPW">
        <label for="newPW_confirm">確認新密碼</label>
        <input
            type="password"
            id="newPW_confirm"
            v-model="confirmPassword"
            placeholder="* * * * * * * * * *"
        />
        <span v-if="confirmPasswordError" class="error">{{
            confirmPasswordError
        }}</span>
        <span v-if="!confirmPassword && !confirmPasswordError" class="error"
            >請輸入相同密碼</span
        >
    </div>

    <div class="newPW_in">
        <button @click="handleSubmit">
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
export default {
    data() {
        return {
            newPassword: "",
            confirmPassword: "",
            newPasswordError: "",
        };
    },
    computed: {
        confirmPasswordError() {
            if (this.confirmPassword !== this.newPassword) {
                return "密碼不匹配";
            }
            return "";
        },
    },
    watch: {
        newPassword(newVal) {
            const passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)/;
            if (newVal.length < 8) {
                this.newPasswordError = "密碼至少需要8個字元";
            } else if (newVal.length > 10) {
                this.newPasswordError = "密碼不能超過10個字元";
            } else if (!passwordRegex.test(newVal)) {
                this.newPasswordError = "密碼必須至少包含一個數字跟英文字母";
            } else {
                this.newPasswordError = "";
            }
        },
    },
    methods: {
        handleSubmit() {
            if (!this.newPassword || !this.confirmPassword) {
                return;
            }
            if (this.newPasswordError) {
                return;
            }
            if (this.confirmPassword !== this.newPassword) {
                this.confirmPasswordError = "密碼不匹配";
                return;
            }
            this.$router.push({ path: "/login/pwsuccess" });
        },
    },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

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

.error {
    color: red;
    font-size: 12px;
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
}
</style>
