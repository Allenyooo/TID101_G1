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

  <div class="spBottom" :class="{ pmOn: sp == true }">
    <p>總計： NT${{ total }}</p>
    <a href="">前往結帳</a>
  </div>
</template>

<script>
export default {
  props: ["sp"],

  data() {
    return {
      move: false,
    };
  },
  methods: {
    pmColse(e) {
      e.target.closest("div.productMove").classList.toggle("pmOn");
      this.move = false;
    },
    pmColse2() {
      if (this.move == false) {
        return (this.move = true);
      } else if (this.move == true) {
        return (this.move = false);
      }
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
</style>
