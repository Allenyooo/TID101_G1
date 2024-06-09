<template>
  <div class="BkBody">
    <BH></BH>
    <div class="BkM">
      <BM :manage="manage" :page="page"></BM>
      <div class="BkContent">
        <p>{{ manage[page - 1].manageName }}</p>
        <div class="Bkline"></div>

        <p class="breadCrumbs">首頁 > 會員資料管理 > 詳細資料</p>

        <div class="MDText">
          <ul>
            <li>會員編號:1</li>
            <li>會員暱稱:xxx</li>
            <li>加入日期:2012-01-01</li>
          </ul>

          <ul class="MDUl2">
            <li>會員姓名:xxx</li>
            <li>手機號碼:0000-123-123</li>
            <li>最後登入日期:2013-01-01</li>
          </ul>

          <ul>
            <li>會員帳號:123@gmail.com</li>
            <li>會員生日:2000-01-01</li>
          </ul>
        </div>

        <div class="BMDData">
          <table class="table">
            <thead class="tableHead">
              <tr>
                <th colspan="3">歷史訂單</th>
                <th class="centered"><button>查看訂單明細</button></th>
              </tr>
            </thead>
            <tbody class="tableBody">
              <tr class="tableTr1">
                <td>訂單編號</td>
                <td>訂單日期</td>
                <td>訂單金額</td>
                <td>訂單狀態</td>
              </tr>

              <tr>
                <td>xxx01</td>
                <td>2024-01-01 00:00:00</td>
                <td>1000</td>
                <td>已付款</td>
              </tr>

              <tr>
                <td>xxx02</td>
                <td>2024-01-01 00:00:00</td>
                <td>1000</td>
                <td>已付款</td>
              </tr>

              <tr>
                <td>xxx03</td>
                <td>2024-01-01 00:00:00</td>
                <td>1000</td>
                <td>已付款</td>
              </tr>
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
    };
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";
.BkBody {
  background-color: $OffWhite;

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

      .breadCrumbs {
        font-size: 16px;
      }

      .MDText {
        display: flex;
        margin-top: 28px;

        ul {
          li {
            width: 360px;
            height: 48px;
            font-size: 24px;
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

              text-align: left;
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
            }
          }
        }
      }
    }
  }
}
</style>
