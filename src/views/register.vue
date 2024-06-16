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

    .register_left {
        width: 30vw;
        position: relative;
        .register_soju {
            display: block;
            height: 40vw;
            margin: 0 auto;
            transform: translate(-2vw);
            filter: drop-shadow(2px 10px 5px #aaa);
        }
        .register_cup1 {
            width: 7vw;
            position: absolute;
            top: 40%;
            right: 29%;
            transform: rotate(20deg);
            filter: drop-shadow(7px 7px 3px #bbb);
        }
        .register_cup2 {
            width: 7vw;
            position: absolute;
            top: 45%;
            right: 2%;
            transform: rotate(-15deg);
            filter: drop-shadow(2px 7px 3px #bbb);
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
        .register_google {
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

        .register_or {
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

        .register_emailadd {
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
        }
        .error-message {
            color: red;
            font-size: 12px;
            padding-top: 4px;
        }
        .register_password {
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
                font-weight: bold;
                color: $DarkBrown;
            }
        }

        .register_confirmPassword {
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
        }

        .register_realname {
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
        }

        .register_acceptCondition {
            display: flex;
            align-items: center;
            justify-content: start;
            margin: 24px auto;
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
        }
    }
}
</style>
