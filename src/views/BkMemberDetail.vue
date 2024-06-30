<template>
  <div class="BkBody">
    <BH></BH>
    <div class="BkM">
      <BM :manage="manage" :page="page"></BM>
      <div class="BkContent">
        <p>{{ manage[page - 1].manageName }}</p>
        <div class="Bkline"></div>

        <div class="BkBreadCrumbs">
          <p class="breadCrumbs">首頁 > 會員資料管理 > 詳細資料</p>
          <button>
            <router-link to="/BkMember" @click="clear"
              ><h5>返回</h5></router-link
            >
          </button>
        </div>

        <div class="MDText">
          <ul>
            <li>會員編號:{{ members[0].ID }}</li>
            <li>會員暱稱:{{ members[0].NICKNAME }}</li>
            <li>加入日期:{{ members[0].JOINDATE }}</li>
          </ul>

          <ul class="MDUl2">
            <li>會員姓名:{{ members[0].NAME }}</li>
            <li>手機號碼:{{ members[0].PHONE }}</li>
            <li>最後登入日期:{{ members[0].LASTLOGIN }}</li>
          </ul>

          <ul>
            <li>會員帳號:{{ members[0].MAIL }}</li>
            <li>會員生日:{{ members[0].BIRTHDAY }}</li>
          </ul>
        </div>

        <div class="BMDData">
          <table class="table">
            <thead class="tableHead">
              <tr>
                <th><h4>歷史訂單</h4></th>
                <th><h4></h4></th>
                <th><h4></h4></th>
                <th><h4></h4></th>
                <!-- <th class="centered"><button>查看訂單明細</button></th> -->
              </tr>
            </thead>
            <tbody class="tableBody">
              <tr class="tableTr1">
                <td>訂單編號</td>
                <td>訂單日期</td>
                <td>訂單金額</td>
                <td>訂單詳細資料</td>
              </tr>

              <tr v-for="i in orders">
                <td>{{ i.ID }}</td>
                <td>{{ i.ORDERDATE }}</td>
                <td>{{ i.TOTAL }}</td>
                <td>
                  <router-link
                    to="/BkOrderDetail"
                    @click="checkClickOrder(i.ID)"
                  >
                    <p>查看</p></router-link
                  >
                </td>
              </tr>
              <!-- 
              <tr>
                <td>2</td>
                <td>2024-01-01 00:00:00</td>
                <td>1000</td>
                <td>已付款</td>
              </tr>

              <tr>
                <td>3</td>
                <td>2024-01-01 00:00:00</td>
                <td>1000</td>
                <td>已付款</td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- <BR></BR> -->
  </div>
</template>

<script>
import BH from "/src/components/BkHead.vue";
import BM from "/src/components/BkManage.vue";
import BS from "/src/components/BkSearch.vue";
import BD from "/src/components/BkData.vue";
import BDate from "/src/components/BkDate.vue";
import BSort from "/src/components/BkSort.vue";
// import BR from "/src/components/BkRevise.vue";

import { useOrderStore } from "/src/stores/order";
import { useOrderDetailStore } from "/src/stores/orderDetail";

export default {
  components: { BH, BM, BS, BD, BDate, BSort },

  data() {
    return {
      page: 2,
      manage: [
        {
          index: 1,
          manageName: "權限管理",
          src: "/BkAccess",
          border: 1,
        },
        {
          index: 2,
          manageName: "會員資料管理",
          src: "/BkMember",
          border: 2,
        },
        {
          index: 3,
          manageName: "店家資訊管理",
          src: "/BkShop",
          border: 2,
        },
        {
          index: 4,
          manageName: "訂單管理",
          src: "/BkOrder",
          border: 2,
        },
        {
          index: 5,
          manageName: "商品管理",
          src: "/BkProduct",
          border: 2,
        },
        {
          index: 6,
          manageName: "折價券管理",
          src: "/BkDiscount",
          border: 2,
        },
        {
          index: 7,
          manageName: "FAQ管理",
          src: "/BkFaq",
          border: 2,
        },
      ],
      dropdown: [
        {
          id: "管理員編號",
        },
        {
          name: "姓名",
        },
      ],
      // bd: [
      //   {
      //     id: 1,
      //     email: "123@gmail.com",
      //     name: "xxx",
      //     nickname: "xxx",
      //     phone: "0000-111-222",
      //     birthday: "2000-01-01",
      //     addDate: "2010-01-01",
      //     lastDate: "2010-02-02",
      //   },
      //   {
      //     id: 2,
      //     email: "123@gmail.com",
      //     name: "xxx",
      //     nickname: "xxx",
      //     phone: "0000-111-222",
      //     birthday: "2000-01-01",
      //     addDate: "2010-01-01",
      //     lastDate: "2010-02-02",
      //   },
      //   {
      //     id: 3,
      //     email: "123@gmail.com",
      //     name: "xxx",
      //     nickname: "xxx",
      //     phone: "0000-111-222",
      //     birthday: "2000-01-01",
      //     addDate: "2010-01-01",
      //     lastDate: "2010-02-02",
      //   },
      // ],

      bd: [],
      bd2: [],
      bd3: [],
      bd4: [],
      bd5: [],
      title: [
        { 會員編號: "管理員編號" },
        { 帳號: "信箱" },
        { 會員名稱: "會員名稱" },
        { 會員暱稱: "狀態" },
        { 手機號碼: "修改" },
        { 生日: "修改" },
        { 加入日期: "修改" },
        { 最後登入日期: "修改" },
        { 會員狀態: "修改" },
        { 詳細資料: "修改" },
      ],
      newButton: 1,
      search: "匯出資料",
      stateTd: 1,
      dataTd: 2,

      members: [],
      orders: [],
    };
  },

  methods: {
    clear() {
      const orderStore = useOrderStore();

      orderStore.clearmember();
      orderStore.clearOrders();
    },

    checkClickOrder(value) {
      fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkOrder/orderDetail.php`, {
        mode: "cors",
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          orderDetailid: value,
        }),
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json();
        })
        .then((data) => {
          this.bd3 = data.data;
          this.bd4 = data.data2;
          this.bd5 = data.data3;

          const store = useOrderDetailStore();

          // store.clearmember();
          // store.clearOrders();

          // store.setValue({ bd: this.bd.ID, bd2: this.bd2 });
          this.bd3.forEach((item) => {
            store.setMember({
              // 根據實際對象的屬性調整參數
              ID: item.ID,
              NAME: item.NAME,
              MAIL: item.MAIL,
              ORDERDATE: item.ORDERDATE,
              TOTAL: item.TOTAL,
              PAYMENT: item.PAYMENT,
            });
          });

          this.bd5.forEach((item) => {
            store.setV({
              // 根據實際對象的屬性調整參數
              ID: item.ID,
              PRICE: item.PRICE,
            });
          });

          // 將 bd2 中的每個對象傳遞給 store.setValue()
          this.bd4.forEach((item) => {
            store.addOrder({
              NAME: item.NAME,
              QUANTITY: item.QUANTITY,
              PRICE: item.PRICE,
              PERCENT: item.PERCENT,
              DP: item.DP,
            });
          });
        });
    },
  },

  // computed: {
  //   orderId() {
  //     const orderStore = useOrderStore();
  //     store.orderStore({
  //       id: orderStore.member.ID,
  //     });
  //   },
  // },

  created() {
    const orderStore = useOrderStore();

    this.members = orderStore.member;
    this.orders = orderStore.orders;
  },

  // mounted() {
  //   const orderStore = useOrderStore();

  //   this.$watchEffect(() => {
  //     this.members = orderStore.member;
  //     this.orders = orderStore.orders;
  //   });
  // },

  // mounted() {
  //   fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkMember/memberDetail.php`, {
  //     // mode: "cors",
  //     method: "POST",
  //     headers: {
  //       "Content-Type": "application/json",
  //     },
  //     body: JSON.stringify({
  //       orderDetailid: this.orderId,
  //     }),
  //   })
  //     .then((response) => {
  //       if (!response.ok) {
  //         throw new Error("Network response was not ok");
  //       }
  //       return response.json();
  //     })
  //     .then((data) => {
  //       this.bd = data.data;
  //       // this.bd2 = data.data2;
  //     });
  // },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";
.BkBody {
  background-color: $OffWhite;
  font-family: $fontFamily;

  a {
    text-decoration: none;
    display: block;
  }

  .BkM {
    display: flex;
    height: 100vh;

    .BkContent {
      width: 80vw;

      p {
        font-size: 28px;
        font-weight: bold;
        margin-top: 16px;
      }

      .Bkline {
        height: 1px;

        background-color: $Black;
        margin-bottom: 24px;
      }

      .BkBreadCrumbs {
        display: flex;

        .breadCrumbs {
          font-size: 16px;
          margin-top: 0;
        }

        button {
          margin-left: auto;

          h5 {
            color: $Black;
          }
        }
      }

      .MDText {
        display: flex;
        margin-top: 36px;

        ul {
          li {
            width: 360px;
            height: 48px;
            font-size: 20px;
          }
        }
        .MDUl2 {
          margin: 0 auto;
        }
      }

      .BMDData {
        font-family: $fontFamily;

        table {
          table-layout: fixed;

          tr {
            text-align: center;
          }

          .tableHead {
            th {
              background-color: $DarkBrown;
              color: $White;
              height: 48px;

              h4 {
                font-weight: bold;
              }

              // text-align: left;
            }
            .centered {
              display: flex;

              button {
                height: 32px;

                margin: auto 0;
                margin-left: 52%;
              }
            }
          }

          .tableBody {
            font-size: 16px;

            .tableTr1 {
              font-weight: bold;
              font-size: 20px;
            }
            .td {
              background-color: red;
            }

            td {
              background-color: $White;
              color: $Black;
              padding: 4px 0;
              border-bottom: 1px solid #c4c4c4;
              border-left: none;
              border-right: none;
              vertical-align: middle;

              overflow: hidden;

              height: 44px;
              a {
                font-weight: 0;
                p {
                  height: 26px;
                  font-size: 14px;
                  margin: 0;
                  color: $Black;
                }
              }
            }
          }
        }
      }
    }
  }
}
</style>
