<template>
  <div class="BkBody">
    <BH></BH>
    <div class="BkM">
      <BM :manage="manage" :page="page"></BM>
      <div class="BkContent">
        <p>{{ manage[page - 1].manageName }}</p>
        <div class="Bkline"></div>
        <BS :dropdown="dropdown" :search="search" :newButton="newButton"></BS>
        <BDate></BDate>
        <BSort :dropdown="dropdown"></BSort>
        <BD
          :bd="bd"
          :title="title"
          :dataTd="dataTd"
          :stateTd="stateTd"
          :BCHref="BCHref"
        ></BD>
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
          編號: "管理員編號",
        },
        {
          狀態: "狀態",
        },
      ],
      bd: [
        {
          id: 1,
          email: "123@gmail.com",
          name: "xxx",
          date: "2000-01-01",
          sum: 1000,
          pay: "信用卡",
        },
        {
          id: 2,
          email: "123@gmail.com",
          name: "xxx",
          date: "2000-01-01",
          sum: 1000,
          pay: "信用卡",
        },
        {
          id: 3,
          email: "123@gmail.com",
          name: "xxx",
          date: "2000-01-01",
          sum: 1000,
          pay: "信用卡",
        },
      ],
      title: [
        { 訂單編號: "管理員編號" },
        { 訂購人會員帳號: "信箱" },
        { 會員名稱: "會員名稱" },
        { 訂單成立日期: "狀態" },
        { 訂單金額: "修改" },
        { 付款方式: "修改" },
        { 詳細資料: "修改" },
      ],
      newButton: 0,
      search: "",
      stateTd: 0,
      dataTd: 2,
      BCHref: 1,
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
    }
  }
}
</style>
