<template>
  <div class="BkBody">
    <BH></BH>
    <div class="BkM">
      <BM :manage="manage" :page="page"></BM>
      <div class="BkContent">
        <p>{{ manage[page - 1].manageName }}</p>
        <div class="Bkline"></div>

        <div class="BkBreadCrumbs">
          <p class="breadCrumbs">首頁 > 訂單管理 > 詳細資料</p>
          <button>
            <router-link to="/BkOrder" @click="clear"
              ><h5>返回</h5></router-link
            >
          </button>
        </div>

        <div class="MDText">
          <ul>
            <li>訂單編號:{{ members[0].ID }}</li>
            <li>會員帳號:{{ members[0].MAIL }}</li>
            <!-- <li>收件人姓名:xxx</li> -->
          </ul>

          <ul class="MDUl2">
            <li>訂單日期:{{ members[0].ORDERDATE }}</li>
            <li>訂單金額:{{ members[0].TOTAL }}</li>
            <!-- <li>收件人信箱:123@gmail.com</li> -->
          </ul>

          <ul>
            <li>會員姓名:{{ members[0].NAME }}</li>
            <li>付款方式:{{ members[0].PAYMENT }}</li>
            <!-- <li>收件人電話:0000-123-123</li> -->
          </ul>
        </div>

        <div class="BMDData">
          <div class="dataTop">
            <table
              class="table"
              style="margin-bottom: auto; margin-right: 18px"
            >
              <thead class="tableHead">
                <tr>
                  <th>商品</th>
                  <th>份數</th>
                  <th>價錢</th>
                  <th>折扣</th>
                  <th>折扣後價錢</th>
                </tr>
              </thead>
              <tbody class="tableBody">
                <tr v-for="i in orders">
                  <td>{{ i.NAME }}</td>
                  <td>{{ i.QUANTITY }}</td>
                  <td>{{ i.PRICE }}</td>
                  <td>{{ i.PERCENT }}</td>
                  <td>{{ i.DP }}</td>
                </tr>
              </tbody>
            </table>

            <!-- <table class="table" style="margin-bottom: 24px; width: 300px">
              <thead class="tableHead">
                <tr>
                  <th colspan="2">備註</th>
                </tr>
              </thead>
              <tbody class="tableBody">
                <tr>
                  <td class="ODRemark">
                    <p>xxx..</p>
                  </td>
                  <td class="ODRemark">
                    <button></button>
                  </td>
                </tr>
              </tbody>
            </table> -->
          </div>

          <div>
            <table style="width: 240px; margin-left: auto" class="table">
              <thead class="tableHead">
                <tr>
                  <th>訂單總金額</th>
                </tr>
              </thead>
              <tbody class="tableBody">
                <tr v-for="i in orders">
                  <td>{{ i.DP * i.QUANTITY }}</td>
                </tr>

                <tr>
                  <td>折扣 :{{ vou[0].PRICE }}</td>
                </tr>

                <tr>
                  <td class="BODTd">總金額 :{{ members[0].TOTAL }}</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- <table style="width: 580px; margin-left: auto" class="table">
            <thead class="tableHead">
              <tr>
                <th colspan="3">訂單金額明細</th>
              </tr>
            </thead>
            <tbody class="tableBody">
              <tr>
                <td>$100梨饗券</td>
                <td>1</td>
                <td>金額 :$100</td>
              </tr>

              <tr>
                <td>$100梨饗券</td>
                <td>1</td>
                <td>金額 :$100</td>
              </tr>

              <tr>
                <td>$100梨饗券</td>
                <td>1</td>
                <td>金額 :$100</td>
              </tr>

              <tr>
                <td></td>
                <td></td>
                <td>折扣 :$100</td>
              </tr>

              <tr>
                <td></td>
                <td></td>
                <td class="BODTd">總金額 :$200</td>
              </tr>
            </tbody>
          </table> -->
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
import { useOrderDetailStore } from "/src/stores/orderDetail";
import { useOrderStore } from "/src/stores/order";

export default {
  components: { BH, BM, BS, BD, BDate, BSort },

  data() {
    return {
      page: 4,
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
      bd: [
        {
          id: 1,
          email: "123@gmail.com",
          name: "xxx",
          nickname: "xxx",
          phone: "0000-111-222",
          birthday: "2000-01-01",
          addDate: "2010-01-01",
          lastDate: "2010-02-02",
        },
        {
          id: 2,
          email: "123@gmail.com",
          name: "xxx",
          nickname: "xxx",
          phone: "0000-111-222",
          birthday: "2000-01-01",
          addDate: "2010-01-01",
          lastDate: "2010-02-02",
        },
        {
          id: 3,
          email: "123@gmail.com",
          name: "xxx",
          nickname: "xxx",
          phone: "0000-111-222",
          birthday: "2000-01-01",
          addDate: "2010-01-01",
          lastDate: "2010-02-02",
        },
      ],
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

      vou: [],
    };
  },

  methods: {
    clear() {
      const orderStore = useOrderDetailStore();

      orderStore.clearmember();
      orderStore.clearOrders();
      orderStore.clearV();
    },

    checkClickOrder(value) {
      fetch(
        `${import.meta.env.VITE_PHP_PATH}Bk/BkOrder/orderDetailDetail.php`,
        {
          mode: "cors",
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            orderDetailid: value,
          }),
        }
      )
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json();
        })
        .then((data) => {
          this.bd3 = data.data;
          this.bd4 = data.data2;
        });
    },
  },

  created() {
    const orderStore = useOrderDetailStore();

    this.members = orderStore.member;
    this.orders = orderStore.orders;
    this.vou = orderStore.vou;

    const orderStore2 = useOrderStore();

    orderStore2.clearmember();
    orderStore2.clearOrders();
  },
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
    padding-bottom: 40px;
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
        background-color: $White;
        display: flex;

        .dataTop {
          display: flex;

          td {
            button {
              background-image: url("/src/assets/Image/product/revise.svg");
              width: 36px;
              height: 36px;
            }
          }
          .ODRemark {
            p {
              font-size: 16px;
              font-weight: normal;
            }
          }
        }

        table {
          table-layout: fixed;

          tr {
            text-align: center;
          }

          .tableHead {
            th {
              background-color: $DarkBrown;
              color: $White;
              height: 32px;
              line-height: 32px;
              text-align: center;
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
            }

            .BODTd {
              font-weight: bold;
            }

            .widthT {
              width: 180px;
            }
          }
        }
      }
    }
  }
}
</style>
