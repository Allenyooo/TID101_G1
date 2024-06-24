<template>
    <img
        src="../assets/Image/login/decoTop.svg"
        alt="deco"
        class="decoTop"
        draggable="false"
    />

    <h2>會員註冊</h2>

    <div class="register_google">
        <button>
            <img
                src="../assets/Image/login/google.svg"
                alt="google"
                draggable="false"
            />
            <h5>以 Google 帳號登入</h5>
        </button>
    </div>

    <div class="register_or">
        <div class="line"></div>
        <h4>或</h4>
        <div class="line"></div>
    </div>

    <form
        @submit.prevent="handleRegistration"
        method="post"
        action="register.php"
    >
        <div class="register_emailadd">
            <label for="email">電子信箱</label>
            <input
                type="text"
                id="email"
                placeholder="example@account.com"
                v-model="email"
                @blur="validateEmail"
                required
            />
            <span v-if="!isValidEmail" class="error-message">
                {{ errorMessage }}
            </span>
        </div>

        <div class="register_password">
            <label for="password">設定密碼</label>
            <input
                type="password"
                id="password"
                placeholder="* * * * * * * * * *"
                v-model="password"
                @input="validatePassword"
                required
            />
            <p>8 ~ 10個字符，必須至少一個數字跟英文字母</p>
            <span v-if="isPasswordEmpty" class="error-message">請輸入密碼</span>
            <span v-else-if="isPasswordInvalid" class="error-message">{{
                passwordErrorMessage
            }}</span>
        </div>

        <div class="register_confirmPassword">
            <label for="confirmPassword">確認密碼</label>
            <input
                type="password"
                id="confirmPassword"
                placeholder="* * * * * * * * * *"
                v-model="confirmPassword"
                @input="validateConfirmPassword"
                required
            />
            <span v-if="!isConfirmPasswordMatch" class="error-message"
                >密碼不匹配</span
            >
        </div>

        <div class="register_realname">
            <label for="name">會員姓名</label>
            <input
                type="text"
                id="name"
                placeholder="王小明"
                v-model="name"
                required
            />
        </div>

        <div class="register_acceptCondition">
            <input type="checkbox" id="accept" v-model="accept" required />
            <label for="accept">
                請在此處勾選以表明您接受我們用於線上或行動服務的用途。
            </label>
        </div>

        <div class="register_in">
            <button @click.prevent="handleSubmit">
                <h3>註冊</h3>
            </button>
        </div>
    </form>

    <div class="register_login">
        <h5>已經有帳號了?<router-link to="/login"> 立即登入!</router-link></h5>
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
            email: "",
            errorMessage: "",
            isValidEmail: true,
            password: "",
            confirmPassword: "",
            name: "",
            passwordErrorMessage: "",
            accept: false,
            isValidPassword: true,
            isConfirmPasswordMatch: true,
        };
    },
    methods: {
        validateEmail() {
            const emailRegex =
                /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            const emailValue = this.email.trim();

            if (emailValue === "") {
                this.errorMessage = "請輸入電子信箱";
                this.isValidEmail = false;
            } else if (!emailRegex.test(emailValue)) {
                this.errorMessage = "電子信箱無效";
                this.isValidEmail = false;
            } else {
                this.errorMessage = "";
                this.isValidEmail = true;
            }
        },
        validatePassword() {
            const passwordValue = this.password.trim();

            if (passwordValue === "") {
                this.passwordErrorMessage = "請輸入密碼";
                this.isValidPassword = false;
            } else if (passwordValue.length < 8) {
                this.passwordErrorMessage = "密碼至少需要8個字元";
                this.isValidPassword = false;
            } else if (
                !/[a-zA-Z]/.test(passwordValue) ||
                !/\d/.test(passwordValue)
            ) {
                this.passwordErrorMessage =
                    "密碼必須至少包含一個數字跟英文字母";
                this.isValidPassword = false;
            } else {
                this.passwordErrorMessage = "";
                this.isValidPassword = true;
            }
        },

        validateConfirmPassword() {
            const confirmPasswordValue = this.confirmPassword.trim();
            const passwordValue = this.password.trim();

            if (confirmPasswordValue !== passwordValue) {
                this.isConfirmPasswordMatch = false;
            } else {
                this.isConfirmPasswordMatch = true;
            }
        },
        handleSubmit() {
            console.log("Form submitted!");
            if (this.formIsValid) {
                console.log("Form is valid, sending request...");
                axios
                    .post(
                        "http://localhost/tid101_g1/public/php/register/register.php",
                        {
                            email: this.email,
                            password: this.password,
                            confirmPassword: this.confirmPassword,
                            name: this.name,
                            accept: this.accept,
                        }
                    )
                    .then((response) => {
                        const responseData = response.data;
                        if (responseData.success) {
                            console.log("Registration successful!");
                            this.$router.push("/register/regisuccess");
                        } else {
                            console.error("Error:", responseData.message);
                            this.errorMessage =
                                "Registration failed. Please try again.";
                        }
                    })
                    .catch((error) => {
                        console.error("Error caught:", error);
                    });
            } else {
                console.log("Form is invalid, not sending request.");
            }
        },
        isValidForm() {
            return (
                this.isValidEmail &&
                this.isValidPassword &&
                this.isConfirmPasswordMatch &&
                this.email !== "" &&
                this.password !== "" &&
                this.confirmPassword !== "" &&
                document.getElementById("accept").checked &&
                document.getElementById("name").value !== ""
            );
        },
    },
    computed: {
        formIsValid() {
            return (
                this.isValidEmail &&
                this.isValidPassword &&
                this.isConfirmPasswordMatch &&
                this.email !== "" &&
                this.password !== "" &&
                this.confirmPassword !== "" &&
                document.getElementById("accept").checked &&
                document.getElementById("name").value !== ""
            );
        },
        isPasswordEmpty() {
            return this.password === "";
        },
        isPasswordInvalid() {
            return (
                this.password.length < 8 ||
                !/[a-zA-Z]/.test(this.password) ||
                !/\d/.test(this.password)
            );
        },
    },
    watch: {
        email: function () {
            this.validateEmail();
        },
        password: function () {
            this.validatePassword();
        },
        confirmPassword: function () {
            this.validateConfirmPassword();
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
    margin: 2vw;
    color: $Black;
    position: relative;
    z-index: 1;
    @include breakpoint(430px) {
        margin-bottom: 8vw;
    }
}
.register_google {
    background-color: #fff;
    border: 1px solid $Black;
    border-radius: 34px;
    width: 207px;
    height: 40px;
    margin-bottom: 1vw;
    position: relative;
    z-index: 1;
    @include breakpoint(430px) {
        margin-bottom: 5vw;
    }
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

.register_or {
    display: flex;
    align-items: center;
    div {
        width: 9vw;
        height: 0px;
        border: 0.5px solid $Black;
        @include breakpoint(1280px) {
            width: 11vw;
        }
        @include breakpoint(820px) {
            width: 15vw;
        }
        @include breakpoint(430px) {
            width: 30vw;
        }
    }
    h4 {
        margin: 0 0.5vw;
    }
}

.register_emailadd {
    display: flex;
    flex-direction: column;
    width: fit-content;
    margin: 0 auto;
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
.error-message {
    color: red;
    font-size: 12px;
    padding-top: 4px;
}
.register_password {
    display: flex;
    flex-direction: column;
    width: fit-content;
    margin: 0 auto;
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
    p {
        font-weight: bold;
        color: $DarkBrown;
    }
}

.register_confirmPassword {
    display: flex;
    flex-direction: column;
    width: fit-content;
    margin: 0 auto;
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

.register_realname {
    display: flex;
    flex-direction: column;
    width: fit-content;
    margin: 0 auto;
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

.register_acceptCondition {
    width: 70%;
    display: flex;
    align-items: center;
    justify-content: start;
    margin: 24px auto;
    @include breakpoint(1280px) {
        width: 90%;
    }
    input {
        width: 16px;
        height: 16px;
        margin: 4px;
    }
    label {
        color: $Black;
    }
}

.register_in {
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
        h3 {
            width: 165px;
            height: 52px;
            color: $DarkBrown;
            font-weight: 600;
            font-size: 24px;
        }
    }
}

.register_login {
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
