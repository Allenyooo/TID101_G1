<template>
  <div class="BkBody">
    <BH></BH>
    <div class="BkM">
      <BM :manage="manage" :page="page"></BM>
      <div class="BkContent">
        <p>{{ manage[page - 1].manageName }}</p>
        <div class="Bkline"></div>
        <BS :dropdown="dropdown" :search="search"></BS>
        <BDate></BDate>
        <BSort :dropdown="dropdown"></BSort>
        <BD :bd="bd"></BD>
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
      page: 1,
      manage: [
        {
          index: 1,
          manageName: "權限管理",
          src: "/product",
          border: 1,
        },
        {
          index: 2,
          manageName: "會員資料管理",
          src: "/product",
          border: 2,
        },
        {
          index: 3,
          manageName: "店家資訊管理",
          src: "/product",
          border: 2,
        },
        {
          index: 4,
          manageName: "訂單管理",
          src: "/product",
          border: 2,
        },
        {
          index: 5,
          manageName: "商品管理",
          src: "/product",
          border: 2,
        },
        {
          index: 6,
          manageName: "折價券管理",
          src: "/product",
          border: 2,
        },
        {
          index: 7,
          manageName: "FAQ管理",
          src: "/product",
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
          姓名: "xxx",
          信箱: "123@gmail.com",
          管理權限: 4,
          狀態: 5,
        },
        {
          id: 5,
          姓名: "xxx",
          信箱: "123@gmail.com",
          管理權限: 8,
          狀態: 5,
        },
        {
          id: 9,
          姓名: "xxx",
          信箱: "123@gmail.com",
          管理權限: 12,
          狀態: 5,
        },
      ],

      search: "新增操作人員帳號",
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
      width: 1172px;

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
