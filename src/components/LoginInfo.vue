<template>
    <img
        src="../assets/Image/login/decoTop.svg"
        alt="deco"
        class="decoTop"
        draggable="false"
    />

    <h2>會員登入</h2>

    <form @submit.prevent="makeLoginRequest" method="post" action="login.php">
        <div class="login_account">
            <label for="account">會員帳號</label>
            <input
                type="email"
                id="account"
                v-model.trim="account"
                placeholder="example@account.com"
            />
            <p v-if="errors.account" class="error">{{ errors.account }}</p>
        </div>

        <div class="login_password">
            <label for="password">會員密碼</label>
            <input
                type="password"
                id="password"
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
            <input type="checkbox" id="remember" v-model="remember" />
            <label for="remember">記住我的登入資訊</label>
        </div>

        <div class="login_in">
            <button :disabled="!isValid" @click="makeLoginRequest">
                <h3>登入</h3>
            </button>
        </div>
    </form>

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
import axios from "axios";

export default {
    data() {
        return {
            account: "",
            password: "",
            errors: {
                account: "",
                password: "",
            },
            remember: false,
        };
    },
    computed: {
        isValid() {
            return this.account !== "" && this.password !== "";
        },
    },
    mounted() {
        this.checkCookies();
    },
    methods: {
        checkCookies() {
            const accountCookie = this.getCookie("account");
            const passwordCookie = this.getCookie("password");

            if (accountCookie && passwordCookie) {
                this.account = accountCookie;
                this.password = passwordCookie;
                this.remember = true;
            }
        },
        validateAccount() {
            const trimmedAccount = this.account.trim();
            if (trimmedAccount.includes(" ")) {
                this.errors.account = "帳號中不能有空格";
                return false;
            }
            const emailRegex =
                /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailRegex.test(trimmedAccount)) {
                this.errors.account = "帳號無效";
                return false;
            }
            return true;
        },
        validatePassword() {
            const trimmedPassword = this.password.trim();
            if (trimmedPassword === "") {
                this.errors.password = "請輸入密碼";
                return false;
            }
            return true;
        },
        makeLoginRequest() {
            axios
                .post(`${import.meta.env.VITE_PHP_PATH}login/login.php`, {
                    account: this.account,
                    password: this.password,
                })
                .then(this.handleLoginResponse)
                .catch((error) => {
                    console.error("Error logging in:", error);
                    console.error("Error message:", error.message);
                    console.error("Error response:", error.response);
                    console.error("Error request:", error.request);
                    this.errors.account = "An unknown error occurred";
                });
        },
        handleLoginResponse(response) {
            if (response.data.success) {
                const token = response.data.token;
                const memberId = response.data.memberId;
                this.storeToken(token, memberId);
                this.navigateToMemberRoute();
            } else {
                this.errors.account = "帳號或密碼不正確";
            }
        },
        handleError(error) {
            console.error("Error logging in:", error);
            console.error("Error message:", error.message);
            console.error("Error response:", error.response);
            console.error("Error request:", error.request);
            this.errors.account = "An unknown error occurred";
        },
        storeToken(token, memberId) {
            this.setCookie("token", token);
            this.setCookie("memberId", memberId);
            sessionStorage.setItem("token", token);
            sessionStorage.setItem("memberId", memberId);

            if (this.remember) {
                this.setCookie("account", this.account, 30);
                this.setCookie("password", this.password, 30);
                this.remember = true;
            } else {
                this.removeCookie("account");
                this.removeCookie("password");
            }
        },
        removeCookie(name) {
            document.cookie = `${name}=; path=/; max-age=0`;
        },
        navigateToMemberRoute() {
            this.$router.push("/member");
        },
        isLoggedIn() {
            return this.getCookie("token") !== null;
        },
        setCookie(name, value, days = null) {
            let expires = "";
            if (days) {
                const date = new Date();
                date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
                expires = `; expires=${date.toUTCString()}`;
            }
            document.cookie = `${name}=${value}; path=/${expires}`;
        },
        removeCookie(name) {
            document.cookie = `${name}=; path=/; max-age=0`;
        },
        getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(";").shift();
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
    @include breakpoint(430px) {
        margin-bottom: 8vw;
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
        @include breakpoint(1280px) {
            width: 25vw;
        }
        @include breakpoint(820px) {
            width: 33vw;
        }
        @include breakpoint(430px) {
            width: 66vw;
        }
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
        @include breakpoint(1280px) {
            width: 25vw;
        }
        @include breakpoint(820px) {
            width: 33vw;
        }
        @include breakpoint(430px) {
            width: 66vw;
        }
    }
}
.login_forgotPW {
    width: 20vw;
    display: flex;
    justify-content: flex-end;
    margin-right: 1vw;
    margin-top: 8px;
    @include breakpoint(1280px) {
        width: 25vw;
    }
    @include breakpoint(820px) {
        width: 33vw;
    }
    @include breakpoint(430px) {
        width: 66vw;
    }
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
    width: fit-content;
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
    @include breakpoint(820px) {
        height: 20vw;
    }
    @include breakpoint(430px) {
        display: none;
    }
}
</style>
