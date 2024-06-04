<template>
  <div class="productBody">
    <!-- nav -->
    <div class="productHeader"></div>
    <button @click="scToggle()">購物車</button>

    <!-- <div class="left"></div> -->

    <div class="productMove" :class="{ pmOn: move == true }">
      <div class="spTop">
        <ul>
          <li>
            <button @click="pmColse"></button>
          </li>
          <li><p>購物車清單</p></li>
          <li class="scBorder"></li>
        </ul>
      </div>
      <div class="pmCount">
        <ul>
          <li v-for="(j, index) in productTasks" :key="index" class="pmcLi">
            <ul>
              <li class="pmcImg">
                <img :src="j.tPicture" />
              </li>
              <li>
                <ul>
                  <li class="pmcName">
                    <h4>${{ j.tPrice }}梨饗券</h4>
                  </li>
                  <li class="pmcButton">
                    <button class="pmcDown" @click="pmcD(index)"></button>
                    <p>{{ j.tCount }}</p>
                    <button class="pmcUp" @click="pmcU(index)"></button>
                    <button class="pmcClear" @click="pmcC(index)"></button>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <div class="spBottom" :class="{ pmOn: move == true }">
      <p>總計： NT${{ total }}</p>
      <a href="">前往結帳</a>
    </div>

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
                          (discount = i.discount),
                          countReturn()
                      "
                    >
                      {{ i.price }}
                    </button>
                  </div>
                </li>
                <li class="countPrice">
                  <h4 class="cpOriginal">售價： NT${{ price }}</h4>
                  <h4 class="cpDiscount">${{ price * discount }}</h4>
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
              <p>票券金額小計：NT${{ price * discount * count }}</p>
            </li>
            <li class="right-4">
              <button class="shopping" @click="taskAdd()">加入購物車</button>
              <button href="">立即結帳</button>
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
      <footer></footer>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      price: 100,
      discount: 0.9,
      img: "/src/assets/Image/product/TICKET100.png",
      currentButton: "b1",
      buttons: [
        {
          id: "b1",
          price: 100,
          picture: "/src/assets/Image/product/TICKET100.png",
          discount: 0.9,
        },
        {
          id: "b2",
          price: 300,
          picture: "/src/assets/Image/product/TICKET300.png",
          discount: 0.8,
        },
        {
          id: "b3",
          price: 500,
          picture: "/src/assets/Image/product/TICKET500.png",
          discount: 0.7,
        },
        {
          id: "b4",
          price: 800,
          picture: "/src/assets/Image/product/TICKET800.png",
          discount: 0.9,
        },
        {
          id: "b5",
          price: 1000,
          picture: "/src/assets/Image/product/TICKET1000.png",
          discount: 0.9,
        },
      ],
      count: 1,
      total: 0,
      move: false,
      productTasks: [],
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
    scToggle() {
      if (this.move == false) {
        return (this.move = true);
      } else if (this.move == true) {
        return (this.move = false);
      }
    },

    taskAdd() {
      let price = this.price;
      let picture = this.img;
      let count = this.count;
      let discount = this.discount;

      this.total += this.price * this.count * this.discount;

      this.productTasks.unshift({
        tPrice: price,
        tPicture: picture,
        tCount: count,
        tDiscount: discount,

        tTotal: price * count * discount,
      });

      // 都會存到productTasks
      localStorage.setItem("productTasks", JSON.stringify(this.productTasks));
    },
    pmColse(e) {
      e.target.closest("div.productMove").classList.toggle("pmOn");
      this.move = false;
    },
    pmcD(i) {
      if (this.productTasks[i].tCount > 1) {
        this.productTasks[i].tCount -= 1;

        this.total -=
          this.productTasks[i].tPrice * this.productTasks[i].tDiscount;
      }
    },
    pmcU(i) {
      this.productTasks[i].tCount += 1;
      this.total +=
        this.productTasks[i].tPrice * this.productTasks[i].tDiscount;
    },
    pmcC(i) {
      this.total -=
        this.productTasks[i].tPrice *
        this.productTasks[i].tDiscount *
        this.productTasks[i].tCount;

      this.productTasks.splice(i, 1);
      localStorage.setItem("productTasks", JSON.stringify(this.productTasks));
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.productBody {
  background-color: $OffWhite;
  font-family: $fontFamily;
  a {
    text-decoration: none;
    display: block;
  }

  .productHeader {
    height: 168px;
  }

  // .left {
  //   width: 400px;
  //   height: 100vh;
  //   background-color: rgba($color: #333333, $alpha: 0.85);
  // }

  .spBottom {
    position: fixed;
    right: 0;
    bottom: 0;
    z-index: 20;

    transform: translate(100%);
    transition: transform 1s ease-in-out;

    a {
      font-size: 24px;
      font-weight: bold;
      height: 60px;
      width: 520px;
      background-color: $LightBrown;
      text-align: center;
      line-height: 60px;
      color: $White;
    }

    p {
      font-size: 32px;
      font-weight: bold;
      color: #000000;
      text-align: center;
    }
  }

  .productMove {
    height: 100vw;
    width: 520px;
    background-color: $OffWhite;
    position: fixed;
    z-index: 3;
    top: 0;
    right: 0;
    transform: translate(100%);
    transition: transform 1s ease-in-out;
    border-left: 1px solid $Black;

    // display: flex;
    // flex-direction: column;

    .spTop {
      margin-top: 35px;
      margin-bottom: 24px;
      padding: 0 36px;

      ul {
        li {
          button {
            background-image: url("/src/assets/Image/product/close.svg");
            height: 23px;
            width: 24px;
            background-position: center center;
            border: none;
            margin-left: 19px;
            margin-bottom: 14px;
          }

          p {
            font-size: 20px;
            margin-left: 164px;
            margin-bottom: 24px;
          }
        }
        .scBorder {
          border-bottom: 1px solid $Gray;
        }
      }
    }

    .pmCount {
      margin-left: 52px;

      ul {
        .pmcImg {
          margin-right: 32px;
          margin-bottom: 40px;
        }
        li {
          width: 416px;

          ul {
            display: flex;
            li {
              img {
                width: 200px;
                height: 90px;
              }

              ul {
                flex-direction: column;
                .pmcName {
                  margin-top: 4px;
                }

                .pmcButton {
                  display: flex;
                  margin-top: 24px;

                  button {
                    width: 28px;
                    height: 28px;
                    border: none;
                  }
                  .pmcDown {
                    background-image: url("/src/assets/Image/product/drown.svg");
                    background-size: 100%;
                  }
                  .pmcUp {
                    background-image: url("/src/assets/Image/product/up.svg");
                    background-size: 100%;
                  }
                  .pmcClear {
                    width: 20px;
                    height: 25px;
                    background-image: url("/src/assets/Image/product/clear.svg");
                    margin-left: 42px;
                    margin-top: 1.5px;
                  }

                  p {
                    font-size: 20px;
                    margin: 0 27px;
                  }
                }
              }
            }
          }
        }
      }
    }
  }

  .pmOn {
    transform: translate(0%);
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
                display: flex;
                position: relative;

                .cpOriginal::before {
                  content: "";
                  display: block;
                  position: absolute;
                  height: 1px;
                  width: 48px;
                  top: 50%;
                  left: 92px;
                  background: $Black;
                  position: absolute;
                }

                .cpDiscount {
                  margin-left: 13px;
                  color: $Red;
                }
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

            button {
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
              cursor: pointer;
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
