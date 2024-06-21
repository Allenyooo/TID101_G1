<template>
  <div class="productMove" :class="{ pmOn: sp == true }">
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
        <li v-for="(j, index) in shoppingCartTasks" :key="j.ID" class="pmcLi">
          <ul>
            <li class="pmcImg">
              <img :src="j.PIC" />
            </li>
            <li>
              <ul>
                <li class="pmcName">
                  <h4>${{ j.PRICE }}梨饗券</h4>
                </li>
                <li class="pmcButton">
                  <button class="pmcDown" @click="pmcD(index)"></button>
                  <p>{{ j.COUNT }}</p>
                  <button class="pmcUp" @click="pmcU(index)"></button>
                  <button class="pmcClear" @click="pmcC(index)"></button>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="spBottom">
      <p>總計： NT${{ total }}</p>
      <a href="">前往結帳</a>
    </div>
  </div>

  <!-- <div class="spBottom pmOn" :class="{ pmOn: sp == true }">
    <p>總計： NT${{ total }}</p>
    <a href="">前往結帳</a>
  </div> -->
</template>

<script>
export default {
  props: ["sp"],

  data() {
    return {
      move: false,
      move2: false,
      productTasks: [],
      total: 0,
      test: [],
      shoppingCartTasks: [],
    };
  },
  methods: {
    pmColse(e) {
      e.target.closest("div.productMove").classList.toggle("pmOn");
      // this.move = false;
      this.pmColse2(e);
    },
    pmColse2(e) {
      e.target.closest("div.spBottom").classList.toggle("pmOn");
    },
    // pmcD(i) {
    //   if (this.productTasks[i].tCount > 1) {
    //     this.productTasks[i].tCount -= 1;

    //     this.total -=
    //       this.productTasks[i].tPrice * this.productTasks[i].tDiscount;
    //   }
    // },
    // pmcU(i) {
    //   this.productTasks[i].tCount += 1;
    //   this.total +=
    //     this.productTasks[i].tPrice * this.productTasks[i].tDiscount;
    // },
    // pmcC(i) {
    //   this.total -=
    //     this.productTasks[i].tPrice *
    //     this.productTasks[i].tDiscount *
    //     this.productTasks[i].tCount;

    //   this.productTasks.splice(i, 1);
    //   localStorage.setItem("productTasks", JSON.stringify(this.productTasks));
    // },

    pmcD(i) {
      if (this.shoppingCartTasks[i].COUNT > 1) {
        this.shoppingCartTasks[i].COUNT -= 1;

        this.total -=
          this.shoppingCartTasks[i].PRICE * this.shoppingCartTasks[i].PERCENT;

        // -------------------fetch部分-----------------
        // fetch(
        //   "http://localhost/vite/tid101_g1/public/php/shoppingCart/shoppingCount.php",
        //   {
        //     method: "PUT",
        //     headers: {
        //       "Content-Type": "application/json",
        //     },
        //     body: JSON.stringify({
        //       count: this.shoppingCartTasks[i].COUNT,
        //     }),
        //   }
        // )
        //   .then((response) => {
        //     if (!response.ok) {
        //       throw new Error("Network response was not ok");
        //     }
        //     return response.json();
        //   })
        //   .then((data) => {
        //     this.shoppingCartTasks = data; // 将获取的数据存储到组件的data中的products属性中
        //   });
        // .catch((error) => {
        //   console.error("Error fetching data:", error);
        // });
      }
    },
    pmcU(i) {
      this.shoppingCartTasks[i].COUNT += 1;
      this.total +=
        this.shoppingCartTasks[i].PRICE * this.shoppingCartTasks[i].PERCENT;
    },
    pmcC(i) {
      this.total -=
        this.shoppingCartTasks[i].PRICE *
        this.shoppingCartTasks[i].PERCENT *
        this.shoppingCartTasks[i].COUNT;

      this.shoppingCartTasks.splice(i, 1);
      // localStorage.setItem("productTasks", JSON.stringify(this.productTasks));
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

    sumtotal() {
      let alltotal = 0;
      for (let i = 0; i < this.shoppingCartTasks.length; i++) {
        alltotal +=
          this.shoppingCartTasks[i].PRICE *
          this.shoppingCartTasks[i].COUNT *
          this.shoppingCartTasks[i].PERCENT;
      }
      this.total = alltotal;
    },

    // shoppingCount() {
    //   fetch(
    //     "http://localhost/vite/tid101_g1/public/php/shoppingCart/shoppingCart.php",
    //     {
    //       method: "PUT",
    //       headers: {
    //         "Content-Type": "application/json",
    //       },
    //       body: JSON.stringify({
    //         username: username.value,
    //         password: password.value,
    //       }),
    //     }
    //   )
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

    localstorageDAta() {
      // 從 localStorage 中讀取已有的 productTasks，如果不存在則初始化為空陣列
      let storedTasks = localStorage.getItem("productTasks");
      this.productTasks = storedTasks ? JSON.parse(storedTasks) : [];
    },
  },

  //----------------- 這邊是抓lolocalStorage
  // created() {
  //   // 從 localStorage 中檢索資料
  //   const storedData = localStorage.getItem("productTasks");

  //   // 檢查 localStorage 中是否有資料
  //   if (storedData) {
  //     // 解析 JSON 資料
  //     this.productTasks = JSON.parse(storedData);

  //     // 計算總計
  //     this.total = this.productTasks.reduce((acc, curr) => {
  //       return acc + curr.tPrice * curr.tDiscount * curr.tCount;
  //     }, 0);
  //   }
  // },
  //----------------- 這邊是抓lolocalStorage

  mounted() {
    // this.fetchData();
    fetch(
      "http://localhost/vite/tid101_g1/public/php/shoppingCart/shoppingCart.php",
      {
        mode: "cors", // 请求模式
      }
    )
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        this.shoppingCartTasks = data;
        this.sumtotal();
        this.localstorageDAta();
        this.shoppingCartTasks = this.shoppingCartTasks.concat();
      });
    // .catch((error) => {
    //   console.error("Error fetching data:", error);
    // });
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.spBottom {
  position: fixed;
  right: 0;
  bottom: 52.5%;
  z-index: 20;
  width: 520px;

  // transform: translate(100%);
  // transition: transform 1s ease-in-out;

  a {
    display: block;
    font-size: 24px;
    font-weight: bold;
    height: 60px;
    width: 519px;
    margin-left: auto;
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
    background-color: $OffWhite;
    width: 519px;
    margin-left: auto;
  }
}

.productMove {
  height: 100vh;
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
    height: 30vw;
    overflow-y: scroll;
    overflow-x: hidden; // 强制隐藏水平軸

    ul {
      .pmcImg {
        margin-right: 32px;
        margin-bottom: 24px;
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
</style>
