<template>
  <div class="BkBody">
    <BH></BH>
    <div class="BkM">
      <BM :manage="manage" :page="page"></BM>
      <div class="BkContent">
        <p>{{ manage[page - 1].manageName }}</p>
        <div class="Bkline"></div>
        <!-- <BS :dropdown="dropdown" :search="search" :newButton="newButton" :searchdrop="search""></BS> -->
        <!-- <BS :searchdrop="searchdrop"></BS> -->

        <div class="Bksearchbody">
          <select @change="sIdchange($event.target.value)">
            <option
              v-for="s in searchdrop"
              :key="s.id"
              class="search"
              :value="s.id"
            >
              <h4>{{ s.name }}</h4>
            </option>
          </select>

          <div class="inputSearch">
            <input type="text" :placeholder="placeholder[sId].name" />
          </div>
          <div class="searchButton">
            <button><h5>搜尋</h5></button>
          </div>
          <div class="newButton">
            <button>
              <h5>新增操作人員帳號</h5>
            </button>
          </div>
        </div>

        <BD
          :bd="bd"
          :title="title"
          :dataTd="dataTd"
          :stateTd="stateTd"
          :page="page"
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
import BRS from "/src/components/BkReviseSweet.vue";

export default {
  components: { BH, BM, BS, BD, BDate, BSort, BRS },

  data() {
    return {
      page: 1,
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
      searchdrop: [
        { id: 0, name: "管理員編號" },
        { id: 1, name: "管理員姓名" },
      ],
      sId: 0,

      placeholder: [
        { id: 1, name: "管理員編號" },
        { id: 2, name: "管理員姓名" },
      ],
      bd: [
        {
          id: 1,
          name: "xxx",
          email: "123@gmail.com",
          access: "操作人員",
        },
        {
          id: 2,
          name: "xxx",
          email: "123@gmail.com",
          access: "操作人員",
        },
        {
          id: 3,
          name: "xxx",
          email: "123@gmail.com",
          access: "操作人員",
        },
      ],
      title: [
        { 管理員編號: "管理員編號" },
        { 姓名: "姓名" },
        { 信箱: "信箱" },
        { 管理權限: "管理權限" },
        { 狀態: "狀態" },
        { 修改: "修改" },
      ],
      newButton: 1,
      search: "新增操作人員帳號",
      stateTd: 1,
      dataTd: 1,
    };
  },

  methods: {
    sIdchange(e) {
      console.log("Selected value:", e);
      this.sId = e;
    },
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

      .Bksearchbody {
        display: flex;
        margin-bottom: 12px;

        select {
          font-family: $fontFamily;
          background-color: $LightBrown;
          color: $White;

          .search {
            background-color: $White;
            color: $Black;
          }
        }

        .inputSearch {
          margin-left: 8px;
        }

        .searchButton {
          margin-left: 8px;
        }

        .newButton {
          margin-left: auto;
        }
      }
    }
  }
}
</style>
