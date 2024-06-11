<template>
  <div class="BkBody">
    <BH></BH>
    <div class="BkM">
      <BM :manage="manage" :page="page"></BM>
      <div class="BkContent">
        <p>{{ manage[page - 1].manageName }}</p>
        <div class="Bkline"></div>
        <BS :dropdown="dropdown" :search="search" :newButton="newButton"></BS>

        <BSort :dropdown="dropdown"></BSort>
        <BD :bd="bd" :title="title" :dataTd="dataTd" :stateTd="stateTd"></BD>
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

export default {
  components: { BH, BM, BS, BD, BDate, BSort },

  data() {
    return {
      page: 7,
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
          type: "帳號問題",
          question: "無法登入",
          answer: " xxxxx",
        },
        {
          id: 2,
          type: "帳號問題",
          question: "無法登入",
          answer: " xxxxx",
        },
        {
          id: 3,
          type: "帳號問題",
          question: "無法登入",
          answer: " xxxxx",
        },
      ],
      title: [
        { 問題編號: "管理員編號" },
        { 分類: "信箱" },
        { 問題標題: "會員名稱" },
        { 回答內容: "會員名稱" },
        { 狀態: "修改" },
        { 修改: "修改" },
      ],
      newButton: 1,
      search: "新增問答",
      stateTd: 1,
      dataTd: 1,
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
