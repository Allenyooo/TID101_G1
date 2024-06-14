<template>
    <img
        src="../assets/Image/login/decoTop.svg"
        alt="deco"
        class="decoTop"
        draggable="false"
    />

    <h2>會員登入</h2>

    <div class="login_google">
        <button>
            <img
                src="../assets/Image/login/google.svg"
                alt="google"
                draggable="false"
            />
            <h5>以 Google 帳號登入</h5>
        </button>
    </div>

    <div class="login_or">
        <div class="line"></div>
        <h4>或</h4>
        <div class="line"></div>
    </div>

    <div class="login_account">
        <label for="login_acc">會員帳號</label>
        <input
            type="text"
            id="login_acc"
            v-model.trim="account"
            placeholder="example@account.com"
        />
        <p v-if="errors.account" class="error">{{ errors.account }}</p>
    </div>

    <div class="login_password">
        <label for="login_pw">會員密碼</label>
        <input
            type="password"
            id="login_pw"
            v-model.trim="password"
            placeholder="* * * * * * * * *"
        />
        <p v-if="errors.password" class="error">{{ errors.password }}</p>
    </div>

    <div class="login_forgotPW">
        <router-link to="/login/forgotpw">
            <h6>忘記密碼?</h6>
        </router-link>
    </div>

    <div class="login_rmb">
        <input type="checkbox" id="login_check" />
        <label for="login_check">記住我的登入資訊</label>
    </div>

    <div class="login_in">
        <button :disabled="!isValid" @click="login">
            <h3>登入</h3>
        </button>
    </div>

    <div class="login_register">
        <h5>
            還沒辦帳號?
            <router-link to="/register">立即註冊!</router-link>
        </h5>
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
            account: "",
            password: "",
            errors: {
                account: "",
                password: "",
            },
        };
    },
    computed: {
        isValid() {
            return this.account !== "" && this.password !== "";
        },
    },
    methods: {
        login() {
            console.log("Login button clicked!");
            const trimmedAccount = this.account.trim();
            const trimmedPassword = this.password.trim();
            if (trimmedAccount === "" || trimmedPassword === "") {
                if (trimmedAccount === "") {
                    this.errors.account = "請輸入帳號";
                }
                if (trimmedPassword === "") {
                    this.errors.password = "請輸入密碼";
                }
                console.log("Error messages set:", this.errors);
            } else {
                // Assume the account and password are valid, log in the user
                this.$router.push("/member");
                this.errors.account = "";
                this.errors.password = "";
            }
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
}
.login_google {
    background-color: #fff;
    border: 1px solid $Black;
    border-radius: 34px;
    width: 207px;
    height: 40px;
    margin-bottom: 1vw;
    &:active {
        background-color: #eee;
    }
    button {
        cursor: pointer;
        width: 207px;
        height: 40px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        background-color: transparent;
        border: none;
    }
}

.login_or {
    display: flex;
    align-items: center;
    div {
        width: 9vw;
        height: 0px;
        border: 0.5px solid $Black;
    }
    h4 {
        margin: 0 0.5vw;
    }
}

.login_account {
    display: flex;
    flex-direction: column;
    label {
        font-size: 20px;
        margin-top: 24px;
        margin-bottom: 8px;
    }
    input {
        width: 20vw;
        height: 38px;
        background-color: transparent;
        border: none;
        border-bottom: 1px solid $Black;
    }
}
.error {
    color: red;
    font-size: 12px;
}
.login_password {
    display: flex;
    flex-direction: column;
    label {
        font-size: 20px;
        margin-top: 24px;
        margin-bottom: 8px;
    }
    input {
        width: 20vw;
        height: 38px;
        background-color: transparent;
        border: none;
        border-bottom: 1px solid $Black;
    }
}
.login_forgotPW {
    width: 20vw;
    display: flex;
    justify-content: flex-end;
    margin-right: 1vw;
    margin-top: 8px;
    a {
        text-decoration: none;
        color: $DarkBrown;
        font-weight: bold;
    }
}

.login_rmb {
    display: flex;
    align-items: center;
    margin: 8px auto;
    input {
        width: 16px;
        height: 16px;
        margin: 4px;
    }
    label {
        color: $Black;
    }
}

.login_in {
    background-image: $GoldGrad;
    border: 1px solid $Gold;
    border-radius: 15px;
    margin: 16px auto 32px;
    &:active {
        background-image: $RevGoldGrad;
    }
    button {
        background-color: transparent;
        border: none;
        text-decoration: none;
        text-align: center;
        line-height: 52px;
        user-select: none;
        cursor: pointer;
        h3 {
            width: 165px;
            height: 52px;
            color: $DarkBrown;
            font-weight: 600;
            font-size: 24px;
        }
    }
}

.login_register {
    margin-bottom: 28px;
    a {
        text-decoration: none;
        color: $DarkBrown;
    }
}

.decoBottom {
    height: 14vw;
    position: absolute;
    bottom: 3%;
    left: 0;
}
</style>
