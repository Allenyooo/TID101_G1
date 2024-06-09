<template>
    <div
        class="floating-button-container"
        @mouseenter="showButtons = true"
        @mouseleave="showButtons = false"
    >
        <div v-if="showButtons" class="additional-buttons">
            <button class="additional-button">
                <img src="/src/assets/Image/food/Facebook.png" alt="" />
            </button>
            <button class="additional-button">
                <img src="/src/assets/Image/food/Instagram.png" alt="" />
            </button>
            <button class="additional-button">
                <img
                    src="/src/assets/Image/food/QuestionCircleFill.png"
                    alt=""
                />
            </button>
        </div>
        <button class="main-button">
            <!-- <img src="/src/assets/Image/food/FloatingButton.png" alt="" /> -->
        </button>
    </div>
    <button class="back-to-top-button" @click="scrollToTop">
        <!-- <img src="/src/assets/Image/food/BackToTop.png" alt="" /> -->
    </button>
</template>

<script>
export default {
    data() {
        return {
            showButtons: false,
        };
    },
    methods: {
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        },
    },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.floating-button-container {
    position: fixed;
    bottom: 96px;
    right: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 100;
    .main-button {
        width: 60px;
        height: 60px;
        background-image: url(/src/assets/Image/food/FloatingButton.png);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-color: $OffWhite;
        border: none;
        // color: white;
        // padding: 15px;
        border-radius: 50%;
        cursor: pointer;
        // box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        // transition: background-color 0.3s;

        &:hover {
            // background-color: #0056b3;
        }
    }

    .additional-buttons {
        // margin-top: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;

        animation: fadeIn 0.3s ease-in-out;

        .additional-button {
            background-color: $OffWhite;
            border: none;
            // color: white;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            margin: 5px 0;
            width: 60px;
            height: 60px;
            display: flex;
            // box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            // transition: background-color 0.3s, transform 0.3s;
            img {
                max-width: 100%;
                max-height: 100%;
            }
            &:hover {
                background-color: $WarmNude;
                // transform: translateY(-2px);
            }
        }
    }
}
.back-to-top-button {
    z-index: 100;
    position: fixed;
    bottom: 28px;
    right: 20px;
    width: 60px;
    height: 60px;

    background-color: $Nude;
    border: none;
    color: $Gold;
    padding: 10px;
    border-radius: 50%;
    cursor: pointer;
    margin-top: 10px;
    // box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    // transition: background-color 0.3s;
    background-image: url(/src/assets/Image/food/BackToTop.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    &:hover {
        // background-color: $Gold;
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(0px);
    }
    to {
        opacity: 1;
        transform: translateY(1px);
    }
}
</style>
