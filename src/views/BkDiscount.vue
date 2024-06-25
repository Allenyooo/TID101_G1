<template>
  <div class="BkBody">
    <BH></BH>
    <div class="BkM">
      <BM :manage="manage" :page="page"></BM>
      <div class="BkContent">
        <p>{{ manage[page - 1].manageName }}</p>
        <div class="Bkline"></div>
        <!-- <BS :dropdown="dropdown" :search="search" :newButton="newButton"></BS> -->

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
            <input
              type="text"
              :placeholder="placeholder[sId].name"
              v-model="input"
            />
          </div>
          <div class="searchButton">
            <button @click="searchButton(sId)"><h5>搜尋</h5></button>
          </div>
          <div class="newButton">
            <button>
              <h5>新增折價券</h5>
            </button>
          </div>
        </div>

        <BSort :sortDrop="sortDrop" @sortEvent="sortByID"></BSort>

        <button
          class="discountButton1"
          v-for="i in dButton"
          :class="{ dBOn: buttonState == i.id }"
          @click="(buttonState = i.id), (bdState = i.id)"
        >
          {{ i.text }}
        </button>

        <BD
          :bd="bd"
          :title="title"
          :dataTd="dataTd"
          :stateTd="stateTd"
          :page="page"
          :bd2="bd2"
          v-if="bdState == 1"
        ></BD>

        <BD
          :bd="bdOff"
          :title="title"
          :dataTd="dataTd"
          :stateTd="stateTd"
          :bd2="bd2"
          v-if="bdState == 2"
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

export default {
  components: { BH, BM, BS, BD, BDate, BSort },

  data() {
    return {
      page: 6,
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
      sortDrop: [
        { id: 1, name: "編號:由小到大" },
        { id: 2, name: "編號:由大到小" },
      ],

      searchdrop: [
        { id: 0, name: "折價券編號" },
        { id: 1, name: "折價券名稱" },
      ],
      sId: 0,

      placeholder: [
        { id: 1, name: "折價券編號", search: "ID" },
        { id: 2, name: "折價券名稱", search: "NAME" },
      ],
      input: "",
      // bd: [
      //   {
      //     id: 1,
      //     name: "100折價券",
      //     discountPrice: 100,
      //     number: " 123abc",
      //     start: "2024-06-01",
      //     end: "2025-06-01",
      //     use: 100,
      //   },
      //   {
      //     id: 2,
      //     name: "300折價券",
      //     discountPrice: 300,
      //     number: " 123abc",
      //     start: "2024-06-01",
      //     end: "2025-06-01",
      //     use: 100,
      //   },
      //   {
      //     id: 3,
      //     name: "500折價券",
      //     discountPrice: 500,
      //     number: " 123abc",
      //     start: "2024-06-01",
      //     end: "2025-06-01",
      //     use: 100,
      //   },
      // ],

      // bdOff: [
      //   {
      //     id: 4,
      //     name: "30折價券",
      //     discountPrice: 30,
      //     number: " 123abc",
      //     start: "2024-06-01",
      //     end: "2025-06-01",
      //     use: 100,
      //   },
      //   {
      //     id: 5,
      //     name: "150折價券",
      //     discountPrice: 150,
      //     number: " 123abc",
      //     start: "2024-06-01",
      //     end: "2025-06-01",
      //     use: 100,
      //   },
      //   {
      //     id: 6,
      //     name: "600折價券",
      //     discountPrice: 600,
      //     number: " 123abc",
      //     start: "2024-06-01",
      //     end: "2025-06-01",
      //     use: 100,
      //   },
      // ],
      bd: [],
      bd2: [],
      title: [
        { 折價券編號: "管理員編號" },
        { 折價券名稱: "信箱" },
        { 折抵金額: "會員名稱" },
        { 折價券序號: "狀態" },
        { 開始日期: "修改" },
        { 結束日期: "修改" },
        { 使用次數: "修改" },
        { 狀態: "修改" },
        { 修改: "修改" },
      ],
      newButton: 1,

      stateTd: 1,
      dataTd: 1,

      buttonState: 1,
      dButton: [
        {
          id: 1,
          text: "啟用",
        },
        {
          id: 2,
          text: "下架",
        },
      ],

      bdState: 1,

      sortid: 1,
    };
  },

  methods: {
    sIdchange(e) {
      console.log("Selected value:", e);
      this.sId = e;
    },

    searchButton(id) {
      fetch(
        "http://localhost/tid101_g1/public/php/Bk/BkDiscount/discountSearch.php",
        {
          mode: "cors",
          method: "PUT",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            Search: this.placeholder[id].search,
            Input: this.input,
            // Start: this.startDate,
            // End: this.endDate,
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
          this.bd = data;

          // this.bd2 = data.data2;
          // this.price = data[0].PRICE;
          // this.discount = data[0].PERCENT;
        });

      this.input = "";
    },

    sortByID(id) {
      this.sortid = id;

      if (this.sortid == 1) {
        this.bd.sort((a, b) => {
          console.log("排序1");
          return a.ID - b.ID;
        }); // 按照 ID 属性升序排列
      } else if (this.sortid == 2) {
        this.bd.sort((a, b) => {
          console.log("排序2");
          return b.ID - a.ID;
        }); // 按照 ID 属性升序排列
      }
    },
  },

  mounted() {
    // this.fetchData();
    fetch(
      "http://localhost/tid101_g1/public/php/Bk/BkDiscount/discountData.php",
      {
        mode: "cors",
      }
    )
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        this.bd = data.data;
        this.bd2 = data.data2;
        this.bdOff = data.data3;
        // this.bd2 = data.data2;
        // this.price = data[0].PRICE;
        // this.discount = data[0].PERCENT;
      });
    // .catch((error) => {
    //   console.error("Error fetching data:", error);
    // });
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

      .discountButton1 {
        font-size: 16px;
        width: 60px;
        height: 32px;
        border: none;
        border-top: 1px solid #c4c4c4;
        border-left: 1px solid #c4c4c4;
        border-right: 1px solid #c4c4c4;

        color: $DarkBrown;
        margin-right: 12px;
      }

      .discountButton2 {
        font-size: 16px;
        width: 60px;
        height: 32px;
        border: none;
        border-top: 1px solid #c4c4c4;
        border-left: 1px solid #c4c4c4;
        border-right: 1px solid #c4c4c4;
      }

      .dBOn {
        background-color: $DarkBrown;
        color: $White;
      }
    }
  }
}
</style>
