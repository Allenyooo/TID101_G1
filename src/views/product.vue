<template>
  <div class="productBody">
    <!-- nav -->
    <div class="productHeader"></div>
    <div class="productBreadCrumbs">
      <router-link to="/Home"><h5>首頁</h5></router-link>
      <img src="/src/assets/Image/product/VectorRight.svg" alt="" />
      <router-link to="/Product"><h5>梨饗券</h5></router-link>
    </div>

    <!-------------- top -------------->
    <div class="productTop" id="app">
      <ul>
        <li class="productNameLine"></li>
        <li class="productImage">
          <div class="piCorner">
            <div class="piPicture">
              <img :src="img" alt="" />
            </div>
          </div>
        </li>
        <li class="productPrice">
          <ul>
            <li class="productName">
              <h2>梨饗券</h2>
            </li>
            <li class="productCount">
              <ul>
                <li class="productCountNav">
                  <div>
                    <button
                      type="button"
                      v-for="i in buttons"
                      :key="i.ID"
                      :class="{ pcnon: currentButton == i.ID }"
                      @click="
                        (currentButton = i.ID),
                          (price = i.PRICE),
                          (img = i.PIC),
                          (discount = i.PERCENT),
                          countReturn()
                      "
                    >
                      {{ i.PRICE }}
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
            <li class="buttonList">
              <button class="shopping" @click="taskAdd()">加入購物車</button>
              <button href="" @click="taskAdd2()">
                <router-link to="/CheckOut"
                  ><h4 class="h4text">立即結帳</h4></router-link
                >
              </button>
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
      <!-- 手機版本 -->
      <p class="pbMobileText">四大亮點 一次收藏</p>
      <div class="pCa2"><pCard></pCard></div>
      <!-- 手機版本 -->

      <div class="pCa">
        <ul>
          <li class="pbList1">
            <div class="pbimage i1"></div>
            <div class="pbText">
              <p>便利快捷</p>
              <h4>
                簡單的線上購買流程，隨時隨地輕鬆取得QR
                Code，無需等待即可享受美食體驗。
              </h4>
            </div>
          </li>

          <li class="pbList2">
            <div class="pbimage i2"></div>
            <div class="pbText">
              <p>多樣選擇</p>
              <h4>
                我們合作的餐廳涵蓋全台灣，從北到南，更延伸到東部，隨時隨地滿足您不同的口味喜好。
              </h4>
            </div>
          </li>
          <li class="pbList3">
            <div class="pbimage i3"></div>
            <div class="pbText">
              <p>優先訂位</p>
              <h4>
                梨饗券享有優先訂位之服務，預定前告知合作餐廳，不論何時、何地都能擁有訂位保留權。
              </h4>
            </div>
          </li>
          <li class="pbList4">
            <div class="pbimage i4"></div>
            <div class="pbText">
              <p>有效期一年</p>
              <h4>
                充足的使用時間，讓您有充分的彈性規劃，享受美味體驗，一年內任選時刻到訪合作餐廳。
              </h4>
            </div>
          </li>
        </ul>
      </div>

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
      <!-- <img src="/public/php/product/test.php" alt=""> -->
      <footer></footer>
    </div>
  </div>
</template>

<script>
import shopping from "/src/components/shoppingCart.vue";
import pCard from "/src/components/productCards.vue";
import Swal from "sweetalert2";

export default {
  components: { pCard, shopping },

  data() {
    return {
      price: 0,
      discount: 0.9,
      img: new URL("@/assets/Image/product/TICKET100.png", import.meta.url)
        .href,
      currentButton: "1",
      // buttons: [
      //   {
      //     id: "b1",
      //     price: 100,
      //     picture: new URL(
      //       "@/assets/Image/product/TICKET100.png",
      //       import.meta.url
      //     ).href,
      //     discount: 0.9,
      //   },
      //   {
      //     id: "b2",
      //     price: 300,
      //     picture: new URL(
      //       "@/assets/Image/product/TICKET300.png",
      //       import.meta.url
      //     ).href,
      //     discount: 0.8,
      //   },
      //   {
      //     id: "b3",
      //     price: 500,
      //     picture: new URL(
      //       "@/assets/Image/product/TICKET500.png",
      //       import.meta.url
      //     ).href,
      //     discount: 0.7,
      //   },
      //   {
      //     id: "b4",
      //     price: 800,
      //     picture: new URL(
      //       "@/assets/Image/product/TICKET800.png",
      //       import.meta.url
      //     ).href,
      //     discount: 0.9,
      //   },
      //   {
      //     id: "b5",
      //     price: 1000,
      //     picture: new URL(
      //       "@/assets/Image/product/TICKET1000.png",
      //       import.meta.url
      //     ).href,
      //     discount: 0.9,
      //   },
      // ],
      buttons: [],
      count: 1,
      total: 0,
      move: false,
      productTasks: [],
      sp: true,
      cart: [],
      test: [],
      memberId: "",
      cartId: 0,
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
      fetch(`${import.meta.env.VITE_PHP_PATH}product/shoppingAdd.php`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          // Search: this.placeholder[id].search,
          // Input: this.input,
          // reviseBd: this.reviseBd,
          memberID: this.memberId,
          // cartID: (this.cartId += 1),
          cartCount: this.count,
          productID: this.currentButton,
          // Start: this.startDate,
          // End: this.endDate,
        }),
      });

      Swal.fire({
        icon: "success",
        title: "成功加入購物車！",
        showConfirmButton: false,
        timer: 1500, // 自動在1.5秒後關閉
      });
    },

    taskAdd2() {
      fetch(`${import.meta.env.VITE_PHP_PATH}product/shoppingAdd.php`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          // Search: this.placeholder[id].search,
          // Input: this.input,
          // reviseBd: this.reviseBd,
          memberID: this.memberId,
          // cartID: (this.cartId += 1),
          cartCount: this.count,
          productID: this.currentButton,
          // Start: this.startDate,
          // End: this.endDate,
        }),
      });
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

    shoppingAdd() {
      fetch(`${import.meta.env.VITE_PHP_PATH}product/test.php`)
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json();
        })
        .then((data) => {
          this.test = data; // 将获取的数据存储到组件的data中的products属性中
        })
        .catch((error) => {
          console.error("Error fetching data:", error);
        });
    },

    // fetchData() {
    //   fetch("http://localhost/vite/tid101_g1/public/php/product/test.php")
    //     .then((response) => {
    //       if (!response.ok) {
    //         throw new Error("Network response was not ok");
    //       }
    //       return response.json();
    //     })
    //     .then((data) => {
    //       this.test = data; // 将获取的数据存储到组件的data中的products属性中
    //     })
    //     .catch((error) => {
    //       console.error("Error fetching data:", error);
    //     });
    // },

    getMemberId() {
      let cookie = document.cookie;
      let getId = cookie.match(/memberId=(\d+)/);
      let memberId = getId[1];
      // console.log(match)
      // console.log(memberId);
      this.memberId = memberId;
      // return memberId;
    },
  },

  mounted() {
    // this.fetchData();

    fetch(`${import.meta.env.VITE_PHP_PATH}product/test.php`, {
      mode: "cors",
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        this.buttons = data.data;
        this.price = data.data[0].PRICE;
        this.discount = data.data[0].PERCENT;
        this.cart = data.data2;
        // this.cartId = data.data2[data.data2.length - 1].ID;

        let cookie = document.cookie;
        let match = cookie.match(/(?:^|;) *memberId=([^;]*)/);

        if (match) {
          let memberId = match[1];
          if (memberId.trim() !== "") {
            this.getMemberId();
          }
        }

        // this.getMemberId();
      });
    // .catch((error) => {
    //   console.error("Error fetching data:", error);
    // });
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

@mixin breakpoint($point) {
  @if $point == mobile {
    @media (max-width: 431px) {
      @content;
    }
  }

  @if $point == table {
    @media (max-width: 801px) {
      @content;
    }
  }

  @if $point == other {
    @media (max-width: 860px) {
      @content;
    }
  }
}

.productBody {
  background-color: $OffWhite;
  font-family: $fontFamily;
  a {
    text-decoration: none;
    display: block;
  }

  .productHeader {
    height: 132px;

    @include breakpoint(mobile) {
      height: 110px;
    }
  }

  .productBreadCrumbs {
    display: flex;
    margin-left: 8.3vw;
    margin-bottom: 12px;

    @include breakpoint(mobile) {
      margin-bottom: 62px;
    }

    h5 {
      color: $Black;

      @include breakpoint(mobile) {
        font-size: 12px;
      }
    }

    img {
      margin: 0 12px;
    }
  }

  .pmOn {
    transform: translate(0%);
  }

  .productTop {
    width: 100%;
    margin-bottom: 70px;

    @include breakpoint(mobile) {
      margin-bottom: 56px;
    }

    ul {
      display: flex;
      width: 100%;

      @include breakpoint(table) {
        flex-direction: column;
      }

      @include breakpoint(mobile) {
        flex-direction: column;
      }

      .productNameLine {
        display: none;

        @include breakpoint(mobile) {
          display: block;
          width: 80%;
          height: 4.5vw;
          border-top: 1px solid transparent;
          border-bottom: 1px solid transparent;
          border-image: $RevGoldGrad;
          border-image-slice: 1;
          margin: 0 10%;
        }
      }

      .productImage {
        width: 34.4vw;
        // height: 24.1vw;
        margin: auto;
        margin-top: 89px;
        margin-right: 5.2vw;
        margin-left: 8.3vw;
        background: url("/src/assets/Image/product/2022newyearT.png") top center
            no-repeat,
          url("/src/assets/Image/product/2022newyearB2.png") bottom center
            no-repeat;
        background-color: white;
        background-size: 13% auto;
        border: 1px solid $Gold;

        @include breakpoint(table) {
          width: 81.4vw;
          margin: 0 auto;
        }

        @include breakpoint(mobile) {
          width: 100%;
          margin: auto;
          border: none;
        }

        .piCorner {
          height: 24.1vw;
          background: url("/src/assets/Image/product/VectorTL.png") top left
              no-repeat,
            url("/src/assets/Image/product/VectorBR.png") bottom right no-repeat;
          margin: 1.3vw;
          display: flex;
          background-size: 13% auto;

          @include breakpoint(table) {
            height: 34vw;
            margin: 3vw;
            background-size: 11% auto;
          }

          @include breakpoint(mobile) {
            height: 51.3vw;
            margin: 5.1vw;
            background-size: 15% auto;
          }

          .piPicture {
            margin: auto auto;

            @include breakpoint(mobile) {
            }

            img {
              width: 25.9vw;
              height: 11.7vw;

              @include breakpoint(table) {
                width: 46vw;
                height: 20vw;
              }

              @include breakpoint(mobile) {
                width: 75.4vw;
                height: 33.7vw;
              }
            }
          }
        }
      }
      .productPrice {
        width: 37.8vw;

        @include breakpoint(table) {
          width: 84%;
          margin: 0 8%;
        }

        @include breakpoint(mobile) {
          width: 84%;
          margin: 0 8%;
        }

        ul {
          flex-direction: column;

          li {
            color: $Black;
          }

          .productName {
            margin-top: 16px;
            margin-bottom: 16px;
            margin-left: 56px;

            @include breakpoint(table) {
              margin-left: 5.2vw;
            }

            @include breakpoint(mobile) {
              position: relative;
              margin: auto;
            }

            h2 {
              @include breakpoint(table) {
                font-size: 28px;
              }

              @include breakpoint(mobile) {
                font-size: 24px;

                position: absolute;
                top: -76vw;
                left: -9vw;
                width: 200px;
              }
            }
          }

          .productCount {
            border-top: 1px solid transparent;
            border-bottom: 1px solid transparent;
            border-image: $RevGoldGrad;
            border-image-slice: 1;
            width: 100%;
            padding: 44px 0;
            margin-bottom: 44px;

            @include breakpoint(mobile) {
              border-top: none;
              padding-top: 32px;
              padding-bottom: 29px;
            }

            ul {
              li {
                margin: 0 2.6vw;
              }
              .productCountNav {
                margin-bottom: 2.9vw;

                @include breakpoint(mobile) {
                  margin: auto 0;
                  margin-bottom: 32px;
                }
              }

              .productCountNav div {
                width: 100%;
                height: 60px;
                background-color: white;
                border-radius: 300px;
                text-align: center;
                // line-height: 60px;
                padding-top: 12px;
                padding-bottom: 12px;

                @include breakpoint(table) {
                  height: auto;
                  padding-top: 1.6vw;
                  padding-bottom: 1.6vw;
                }

                @include breakpoint(mobile) {
                  height: auto;
                  padding-top: 1.6vw;
                  padding-bottom: 1.6vw;
                }

                button {
                  // width: 88px;
                  width: 5.7vw;
                  height: 36px;
                  border: none;
                  border-radius: 50px;
                  color: $Black;
                  background-color: white;
                  font-size: 20px;

                  @include breakpoint(table) {
                    height: 5vw;
                    width: 14vw;
                  }

                  @include breakpoint(mobile) {
                    height: 7.2vw;
                    width: 15.4vw;
                  }
                }
                .pcnon {
                  background-color: $Gold;
                  color: white;
                }
              }

              .countPrice {
                margin-left: 4.4vw;
                margin-right: 0;
                margin-bottom: 2.1vw;
                display: flex;
                position: relative;

                @include breakpoint(mobile) {
                  margin-left: 5px;
                  margin-bottom: 12px;
                }

                .cpOriginal::before {
                  content: "";
                  display: block;
                  position: absolute;
                  height: 1px;
                  width: 50px;
                  top: 50%;
                  left: 92px;
                  background: $Black;
                  position: absolute;
                }

                .cpDiscount {
                  margin-left: 0.9vw;
                  color: $Red;
                }
              }

              .countButton {
                display: flex;
                margin-left: 4.4vw;
                margin-right: 0;

                @include breakpoint(mobile) {
                  margin-left: 5px;
                }

                h4 {
                  margin-right: 22px;
                }

                button {
                  width: 30px;
                  height: 30px;
                  font-size: 20px;
                  border: none;
                  background-color: $OffWhite;
                  color: $Black;
                  background-size: 100%;
                  background-repeat: no-repeat;
                }
                .buttonDrown {
                  background-image: url("/src/assets/Image/product/drown.svg");
                }
                .buttonUp {
                  background-image: url("/src/assets/Image/product/up.svg");
                }

                p {
                  width: 7.4vw;
                  height: 30px;
                  font-size: 20px;
                  background-color: white;
                  margin: 0 0.8vw;
                  text-align: center;
                  line-height: 30px;
                  border-radius: 5px;
                  border: 1px solid $Black;
                }
              }
            }
          }

          .priceTotal {
            margin-left: 4.4vw;
            margin-bottom: 3.1vw;

            @include breakpoint(mobile) {
              margin-left: 5px;
              margin-bottom: 32px;
            }

            p {
              font-size: 24px;
            }
          }

          .buttonList {
            display: flex;

            button {
              width: 14.6vw;
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

              &:hover {
                background-color: #c3a988;
                color: white;
              }

              @include breakpoint(table) {
                width: 31vw;
                height: 7.8vw;
                line-height: 7.8vw;
              }

              @include breakpoint(mobile) {
                width: 33.9vw;
                height: 9.3vw;
                line-height: 9.3vw;
              }

              h4 {
                color: $Gold;

                // &:hover {
                //   background-color: #c3a988;
                //   color: white;
                // }
              }

              &:hover .h4text {
                color: white;
              }
            }

            .shopping {
              margin-right: 3.4vw;
              margin-left: 2.6vw;

              @include breakpoint(table) {
                margin-right: 10vw;
                margin-left: 4.6vw;
              }

              @include breakpoint(mobile) {
                margin-right: 4.6vw;
                margin-left: 4.6vw;
              }
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

      @include breakpoint(mobile) {
        height: 30px;
      }
    }
    .pcDrown {
      background-image: url("/src/assets/Image/product/Frame\ 1476.png");
      height: 36px;

      @include breakpoint(mobile) {
        height: 30px;
      }
    }
    .contentText {
      // height: 424px;
      background-color: #394869;
      padding-top: 24px;
      padding-bottom: 64px;

      @include breakpoint(mobile) {
        padding-top: 32px;
        padding-bottom: 40px;
      }

      h2 {
        background: $DarkGoldGrad;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        text-align: center;
        margin-bottom: 44px;

        @include breakpoint(mobile) {
          font-size: 24px;
          margin-bottom: 28px;
        }
      }
      h4 {
        color: white;
        line-height: 40px;

        @include breakpoint(other) {
          font-size: 17px;
          margin: 0 8.2vw;
        }

        @include breakpoint(mobile) {
          font-size: 16px;
          // word-wrap: break-word;
          margin: 0 8.2vw;
        }
      }
    }
  }

  .productbottom {
    // 手機版才有這個標題
    .pbMobileText {
      font-size: 24px;
      text-align: center;
      color: $DarkBrown;
      font-weight: bold;
      padding-top: 48px;
      display: none;

      @include breakpoint(mobile) {
        display: block;
      }
    }
    // 手機版排版變化
    .pCa {
      @include breakpoint(mobile) {
        display: none;
      }

      ul {
        display: flex;
        width: 80.7vw;
        justify-content: space-between;
        margin: 48px auto;

        // @include breakpoint(table) {
        //   flex-wrap: wrap;
        // }

        @include breakpoint(table) {
          flex-direction: column;
        }

        li {
          // width: 280px;
          // height: 500px;
          background-color: white;
          border-radius: 20px;
          box-shadow: 0 0 10px rgba(#000000, 0.5);
          padding: 36px 2.6vw;

          margin: 0 auto;

          @include breakpoint(table) {
            padding: 30px 4.2vw;
            display: flex;
            margin-bottom: 24px;
          }

          div {
            width: 13vw;
            height: 13vw;
            border-radius: 100px;

            // @include breakpoint(table) {
            //   width: 200px;
            //   height: 200px;
            // }

            @include breakpoint(table) {
              width: 52vw;
              height: 18vw;
            }
          }

          .pbimage {
            background-size: 100%;

            @include breakpoint(table) {
              width: 14vw;
              height: 14vw;
              margin: auto 0;
              margin-right: 3vw;
            }
          }
          .i1 {
            background-image: url("/src/assets/Image/product/system_update.png");
            @include breakpoint(mobile) {
              width: 160px;
              height: 160px;
              margin: 0 auto;
            }
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
            height: auto;

            @include breakpoint(table) {
              margin-top: 0;
            }

            @include breakpoint(mobile) {
              width: 200px;
              height: 72px;
              margin: 0 auto;
            }
          }

          p {
            font-size: 20px;
            text-align: center;
            margin-bottom: 24px;
            font-weight: bold;

            @include breakpoint(table) {
              margin-bottom: 12px;
              text-align: left;
            }

            @include breakpoint(mobile) {
              font-size: 24px;
            }
          }

          h4 {
            @include breakpoint(table) {
              font-size: 18px;
            }

            @include breakpoint(mobile) {
              font-size: 16px;
            }
          }
        }

        .pbList1 {
          @include breakpoint(mobile) {
            width: 280px;
            height: 380px;
            margin: 0 auto;
          }
        }
        .pbList2 {
          @include breakpoint(mobile) {
            display: none;
          }
        }
        .pbList3 {
          @include breakpoint(mobile) {
            display: none;
          }
        }
        .pbList4 {
          @include breakpoint(mobile) {
            display: none;
          }
        }
      }
    }

    .pseudoText {
      position: relative;
      width: 80.7vw;
      margin: 0 auto;
      margin-bottom: 44px;

      h3 {
        text-align: center;
        font-weight: bold;

        @include breakpoint(mobile) {
          font-size: 20px;
        }
      }

      h3::before,
      h3::after {
        content: "";
        display: block;
        position: absolute;
        height: 3px;
        width: 33.9vw;
        top: 50%;
        background: $DarkBrown;

        @include breakpoint(table) {
          width: 25.7vw;
        }

        @include breakpoint(mobile) {
          width: 25.7vw;
        }
      }

      h3::before {
        left: 0;
      }
      h3::after {
        right: 0;
      }
    }

    .ptContent {
      width: 80.7vw;
      margin: 0 auto;

      @include breakpoint(mobile) {
        width: 61.2vw;
      }

      h4 {
        @include breakpoint(mobile) {
          font-size: 14px;
        }
      }
    }
  }
  .pCa2 {
    padding: 50px;
    width: 80%;
    padding-left: 76px;
    display: none;

    @include breakpoint(mobile) {
      display: block;
    }
  }

  footer {
    height: 100px;

    @include breakpoint(mobile) {
      height: 52px;
    }
  }
}
</style>
