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
        </div>

        <div class="BkDatebody">
          <div class="BkDate">
            <input
              type="date"
              name=""
              id=""
              placeholder="請輸入日期"
              v-model="startDate"
            />
            ~
            <input
              type="date"
              name=""
              id=""
              placeholder="請輸入日期"
              v-model="endDate"
            />
          </div>
          <button @click="searchButton(sId)">搜尋</button>
        </div>

        <BSort :sortDrop="sortDrop" @sortEvent="sortByID"></BSort>
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
      sortDrop: [
        { id: 1, name: "編號:由小到大" },
        { id: 2, name: "編號:由大到小" },
      ],

      searchdrop: [
        { id: 0, name: "訂單編號" },
        { id: 1, name: "訂購人會員帳號" },
      ],
      sId: 0,

      placeholder: [
        { id: 1, name: "訂單編號", search: "ID" },
        { id: 2, name: "訂購人會員帳號", search: "MAIL" },
      ],
      input: "",
      // bd: [
      //   {
      //     id: 1,
      //     email: "123@gmail.com",
      //     name: "xxx",
      //     date: "2000-01-01",
      //     sum: 1000,
      //     pay: "信用卡",
      //   },
      //   {
      //     id: 2,
      //     email: "123@gmail.com",
      //     name: "xxx",
      //     date: "2000-01-01",
      //     sum: 1000,
      //     pay: "信用卡",
      //   },
      //   {
      //     id: 3,
      //     email: "123@gmail.com",
      //     name: "xxx",
      //     date: "2000-01-01",
      //     sum: 1000,
      //     pay: "信用卡",
      //   },
      // ],

      bd: [],
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

      startDate: "",
      endDate: "",

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
        "http://localhost/vite/tid101_g1/public/php/Bk/BkOrder/orderSearch.php",
        {
          mode: "cors", // 请求模式
          method: "PUT",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            Search: this.placeholder[id].search,
            Input: this.input,
            Start: this.startDate,
            End: this.endDate,
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
    },

    sortByID(id) {
      this.sortid = id;

      if (this.sortid == 1) {
        this.bd.sort((a, b) => {
          return a.ID - b.ID;
        }); // 按照 ID 属性升序排列
      } else if (this.sortid == 2) {
        this.bd.sort((a, b) => {
          return b.ID - a.ID;
        }); // 按照 ID 属性升序排列
      }
    },
  },

  mounted() {
    // this.fetchData();
    fetch(
      "http://localhost/vite/tid101_g1/public/php/Bk/BkOrder/orderData.php",
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
        this.bd = data;
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

      .BkDatebody {
        display: flex;

        .BkDate {
          margin-bottom: 12px;

          input {
            height: 32px;
          }
          button {
            height: 32px;
            margin-left: 8px;
          }
        }

        button {
          height: 32px;
          margin-left: 12px;
        }
      }
    }
  }
}
</style>
