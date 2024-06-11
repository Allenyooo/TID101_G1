<template>
    <section class="login_wrapper">
        <div class="login_left">
            <img
                src="../assets/Image/login/soju.svg"
                alt="soju"
                class="login_soju"
                draggable="false"
            />
            <img
                src="../assets/Image/login/cup.svg"
                alt="cup1"
                class="login_cup1"
                draggable="false"
            />
            <img
                src="../assets/Image/login/cup.svg"
                alt="cup2"
                class="login_cup2"
                draggable="false"
            />
        </div>
        <div id="login_right" >
            <router-view></router-view>
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
                <input type="text" id="login_acc" placeholder="example@account.com" />
            </div>

            <div class="login_password">
                <label for="login_pw">會員密碼</label>
                <input
                    type="password"
                    id="login_pw"
                    placeholder="* * * * * * * * * *"
                />
            </div>

            <div class="login_forgotPW">
                <!-- <router-link to="/login/forgotpw"> -->
                    <h6 @click="forgotpw">忘記密碼?</h6>
                <!-- </router-link> -->
            </div>

            <div class="login_rmb">
                <input type="checkbox" id="login_check" />
                <label for="login_check">記住我的登入資訊</label>
            </div>

            <div class="login_in">
                <button>
                    <h3>登入</h3>
                </button>
            </div>

            <div class="login_register">
                <h5>
                    還沒辦帳號?
                    <RouterLink to="/register">立即註冊!</RouterLink> 
                </h5>
            </div>

            <img
                src="../assets/Image/login/decoBottom.svg"
                alt="deco"
                class="decoBottom"
                draggable="false"
            />
        </div>
    </section>
</template>

<script>
// import LoginInfo from "../components/LoginInfo.vue"
import ForgotPW from '../components/ForgotPW.vue';

export default {
    // components: { LoginInfo },
    methods: {
        forgotpw() {
            this.$router.push("/login/forgotpw");
        }
    }

}
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
        .login_soju {
            display: block;
            height: 40vw;
            margin: 0 auto;
            transform: translate(-2vw);
            filter: drop-shadow(2px 10px 5px #aaa);
        }
        .login_cup1 {
            width: 7vw;
            position: absolute;
            top: 40%;
            right: 29%;
            transform: rotate(20deg);
            filter: drop-shadow(7px 7px 3px #bbb);
        }
        .login_cup2 {
            width: 7vw;
            position: absolute;
            top: 45%;
            right: 2%;
            transform: rotate(-15deg);
            filter: drop-shadow(2px 7px 3px #bbb);
        }
    }
    #login_right {
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
                width: 165px;
                height: 52px;
                background-color: transparent;
                border: none;
                h3 {
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
        }
    }
</style>
