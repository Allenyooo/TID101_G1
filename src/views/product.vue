<template>
  <!-- nav -->
  <div class="nav2"></div>
  <!-------------- top -------------->
  <div class="productTop" id="app">
    <ul>
      <li class="productImage">
        <div class="piCorner">
          <div class="piPicture">
            <img :src="img" alt="" />
          </div>
        </div>
      </li>
      <li class="productPrice">
        <ul>
          <li class="productName"><h2>梨饗券</h2></li>
          <li class="productCount">
            <ul>
              <li class="productCountNav">
                <div>
                  <button
                    type="button"
                    v-for="i in buttons"
                    :key="i.id"
                    :class="{ pcnon: currentButton == i.id }"
                    @click="
                      (currentButton = i.id),
                        (price = i.price),
                        (img = i.picture),
                        countReturn()
                    "
                  >
                    {{ i.price }}
                  </button>
                </div>
              </li>
              <li class="countPrice">
                <h4>售價： NT${{ price }}</h4>
              </li>
              <li class="countButton">
                <h4>輸入購買張數:</h4>
                <button class="buttonDrown" @click="bDrown"></button>
                <p>{{ count }}</p>
                <button class="buttonUp" @click="bUp"></button>
              </li>
            </ul>
          </li>
          <li class="priceTotal">
            <p>票券金額小計：NT${{ price * count }}</p>
          </li>
          <li class="right-4">
            <a class="shopping" href="">加入購物車</a>
            <a href="">立即結帳</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="productContent">
    <div class="pcUp"></div>
    <div class="contentText">
      <h2>梨花殿會員專享餐券</h2>
      <h4>
        探索美食之旅！梨花殿與一流餐廳攜手合作，為您帶來超值梨饗券！
        <br />
        「梨饗券」為梨花殿獨家販售之票券，可以在梨花殿指定合作餐廳上使用，
        <br />
        只要掃描手機中的QR Code，就可以立即扣抵當天消費金額，
        <br />
        讓您以更實惠的價格品味高品質的美食。
        <br />
        無論您想要享受豐盛的韓式烤肉還是品嚐正宗道地的韓國美食，梨饗券都能滿足您的味蕾，
        <br />
        趕快抓住這個機會，讓我們帶您開啟一場美食之旅，品味來自韓國的美味佳餚！
      </h4>
    </div>
    <div class="pcDrown"></div>
  </div>

  <!-------------- bottom -------------->
  <div class="productbottom">
    <ul>
      <li>
        <div class="pbimage i1"></div>
        <div class="pbText">
          <p>便利快捷</p>
          <h4>
            簡單的線上購買流程，隨時隨地輕鬆取得QR
            Code，無需等待即可享受美食體驗。
          </h4>
        </div>
      </li>

      <li>
        <div class="pbimage i2"></div>
        <div class="pbText">
          <p>多樣選擇</p>
          <h4>
            我們合作的餐廳涵蓋全台灣，從北到南，更延伸到東部，隨時隨地滿足您不同的口味喜好。
          </h4>
        </div>
      </li>
      <li>
        <div class="pbimage i3"></div>
        <div class="pbText">
          <p>優先訂位</p>
          <h4>
            梨饗券享有優先訂位之服務，預定前告知合作餐廳，不論何時、何地都能擁有訂位保留權。
          </h4>
        </div>
      </li>
      <li>
        <div class="pbimage i4"></div>
        <div class="pbText">
          <p>有效期一年</p>
          <h4>
            充足的使用時間，讓您有充分的彈性規劃，享受美味體驗，一年內任選時刻到訪合作餐廳。
          </h4>
        </div>
      </li>
    </ul>

    <div class="pseudoText">
      <h3>使用說明</h3>
    </div>
    <div class="ptContent">
      <h4>
        感謝您選擇我們的梨花券！梨花券可以讓您在我們合作的餐廳上享受美味的用餐體驗。在我們的網站上選擇您喜歡的餐券套餐，完成付款後，您將收到一組QR
        Code。請將QR
        Code儲存到您的信箱和手機中，以便在餐廳使用。到達餐廳後，您只需向服務人員出示QR
        Code，即可抵扣等值金額。此外，我們的餐券有效期為一年，請在有效期內使用。
      </h4>
      <br />
      <br />
      <h4>
        請注意，本餐券僅限在我們指定的合作餐廳使用，並且不能兌換現金。最後，我們對於使用本餐券所造成的任何意外概不負責，並保留對本說明的最終修改權。希望您享受美食之旅！
      </h4>
    </div>

    <!-- ----- -->
    <footer>
      <!-- <div id="app">{{aa}}</div> -->
    </footer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      price: 100,
      img: "/src/assets/Image/product/TICKET100.png",
      currentButton: "b1",
      buttons: [
        {
          id: "b1",
          price: 100,
          picture: "/src/assets/Image/product/TICKET100.png",
        },
        {
          id: "b2",
          price: 300,
          picture: "/src/assets/Image/product/TICKET300.png",
        },
        {
          id: "b3",
          price: 500,
          picture: "/src/assets/Image/product/TICKET500.png",
        },
        {
          id: "b4",
          price: 800,
          picture: "/src/assets/Image/product/TICKET800.png",
        },
        {
          id: "b5",
          price: 1000,
          picture: "/src/assets/Image/product/TICKET1000.png",
        },
      ],
      count: 1,
    };
  },

  methods: {
    countReturn() {
      return (this.count = 1);
    },
    bDrown() {
      if (this.count > 1) {
        this.count -= 1;
      }
    },
    bUp() {
      this.count += 1;
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

body {
  background-color: $OffWhite;
  font-family: $fontFamily;
  a {
    text-decoration: none;
    display: block;
  }

  .nav2 {
    height: 200px;
  }

  .productTop {
    width: 100%;

    margin-bottom: 70px;

    ul {
      display: flex;
      //   align-items: center;
      width: 100%;

      .productImage {
        width: 528px;
        height: 370px;
        margin: auto;
        margin-top: 89px;
        margin-right: 80px;
        margin-left: 128px;

        background: url("/src/assets/Image/product/2022newyearT.png") top center
            no-repeat,
          url("/src/assets/Image/product/2022newyearB.png") bottom center
            no-repeat;
        background-color: white;

        .piCorner {
          height: 330px;
          background: url("/src/assets/Image/product/VectorTL.png") top left
              no-repeat,
            url("/src/assets/Image/product/VectorBR.png") bottom right no-repeat;
          margin: 20px;
          display: flex;

          .piPicture {
            margin: auto auto;
          }
        }
      }
      .productPrice {
        width: 580px;
        height: 528px;

        ul {
          flex-direction: column;

          li {
            color: $Black;
          }

          .productName {
            margin-top: 16px;
            margin-bottom: 16px;
            margin-left: 56px;
          }

          .productCount {
            border-top: 1px solid transparent;
            border-bottom: 1px solid transparent;
            border-image: $RevGoldGrad;
            border-image-slice: 1;

            width: 100%;
            padding: 44px 0;
            margin-bottom: 44px;

            ul {
              li {
                margin-left: 40px;
              }
              .productCountNav {
                margin-bottom: 44px;
              }

              .productCountNav div {
                width: 500px;
                height: 60px;
                background-color: white;
                border-radius: 300px;
                text-align: center;
                line-height: 60px;

                button {
                  width: 88px;
                  height: 36px;
                  border: none;
                  border-radius: 50px;
                  color: $Black;
                  background-color: white;
                  font-size: 20px;
                }
                .pcnon {
                  background-color: $Gold;
                  color: white;
                }
              }

              .countPrice {
                margin-left: 68px;
                margin-bottom: 32px;
              }
              .countButton {
                display: flex;
                margin-left: 68px;

                h4 {
                  margin-right: 22px;
                }

                button {
                  width: 30px;
                  height: 30px;
                  font-size: 20px;
                  border: none;
                  // border-radius: 5px;
                  background-color: $OffWhite;

                  color: $Black;
                }
                .buttonDrown {
                  background-image: url("/src/assets/Image/product/drown.svg");
                }
                .buttonUp {
                  background-image: url("/src/assets/Image/product/up.svg");
                }

                p {
                  width: 114px;
                  height: 30px;
                  font-size: 20px;
                  background-color: white;
                  margin: 0 12px;
                  text-align: center;
                  line-height: 30px;
                  border-radius: 5px;
                  border: 1px solid $Black;
                }
              }
            }
          }

          .priceTotal {
            margin-left: 68px;
            margin-bottom: 48px;

            p {
              font-size: 24px;
            }
          }

          .right-4 {
            display: flex;

            a {
              width: 224px;
              height: 50px;
              color: $Gold;
              background-color: white;
              border-radius: 200px;
              line-height: 50px;
              text-align: center;
              border: 1px solid $Gold;
              font-size: 20px;
              font-weight: bold;
            }

            .shopping {
              margin-right: 52px;
              margin-left: 40px;
            }
          }
        }
      }
    }
  }

  .productContent {
    text-align: center;
    // background: url("/src/assets/Image/product/Frame\ 1476.png") top no-repeat,
    //   url("/src/assets/Image/product/Frame\ 1476.png") bottom no-repeat;
    background-size: 100%;

    // padding-top: 80px;
    .pcUp {
      background-image: url("/src/assets/Image/product/Frame\ 1476.png");
      height: 36px;
    }
    .pcDrown {
      background-image: url("/src/assets/Image/product/Frame\ 1476.png");
      height: 36px;
    }
    .contentText {
      // height: 424px;
      background-color: #394869;
      padding-top: 24px;
      padding-bottom: 64px;

      h2 {
        background: $DarkGoldGrad;
        background-clip: text;
        -webkit-text-fill-color: transparent;

        text-align: center;
        margin-bottom: 44px;
      }
      h4 {
        color: white;
        line-height: 40px;
      }
    }
  }

  .productbottom {
    ul {
      display: flex;
      width: 1240px;
      justify-content: space-between;
      margin: 48px auto;

      li {
        // width: 280px;
        // height: 500px;
        background-color: white;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(#000000, 0.5);
        padding: 36px 40px;

        div {
          width: 200px;
          height: 200px;
          border-radius: 100px;
        }

        .pbimage {
          background-size: 100%;
        }
        .i1 {
          background-image: url("/src/assets/Image/product/system_update.png");
        }
        .i2 {
          background-image: url("/src/assets/Image/product/system_update2.png");
        }
        .i3 {
          background-image: url("/src/assets/Image/product/system_update3.png");
        }
        .i4 {
          background-image: url("/src/assets/Image/product/system_update4.png");
        }

        .pbText {
          background-color: white;
          border-radius: 0;
          margin-top: 28px;
        }

        p {
          font-size: 20px;
          text-align: center;

          margin-bottom: 24px;
          font-weight: bold;
        }
      }
    }

    .pseudoText {
      position: relative;
      width: 1240px;
      margin: 0 auto;
      margin-bottom: 44px;

      h3 {
        text-align: center;
        font-weight: bold;
      }

      h3::before,
      h3::after {
        content: "";
        display: block;
        position: absolute;
        height: 3px;
        width: 520px;
        top: 50%;
        background: $DarkBrown;
      }

      h3::before {
        left: 0;
      }
      h3::after {
        right: 0;
      }
    }

    .ptContent {
      width: 1240px;
      margin: 0 auto;
    }
  }

  footer {
    height: 200px;
  }
}
</style>
