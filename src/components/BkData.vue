<template>
  <div class="BkData">
    <!-- <ul class="BkRow">
      <li v-for="j in bd">
        <ul class="BkCol">
          <li v-for="(i, index) in j" :key="index">
            {{ i }}
          </li>
        </ul>
      </li>
    </ul> -->

    <table class="table">
      <thead class="tableHead">
        <tr>
          <th scope="col" v-for="(t, key) in title">
            <p>{{ tValue(t) }}</p>
          </th>
        </tr>
      </thead>
      <tbody class="tableBody">
        <tr v-for="(j, index) in pageData">
          <td
            v-for="(i, index) in j"
            :key="j.ID"
            :class="{ td: hover == true }"
          >
            <h5>{{ i }}</h5>
          </td>

          <td v-if="stateTd == 1">
            <BState
              :statePage="page"
              :stateId="j.ID"
              :stateBd="bd3[j.ID - 1]"
            ></BState>
          </td>
          <td v-if="dataTd == 1">
            <BR
              :revisePage="page"
              :reviseId="j.ID"
              :reviseBd="bd2[j.ID - 1]"
            ></BR>
          </td>

          <td v-if="dataTd == 2">
            <!-- <button></button> -->
            <BC :BCH="BCHref"></BC>
          </td>
        </tr>

        <!-- <tr v-for="j in bd">
          <td v-for="(i, key) in j">
            {{ key }}
          </td>
        </tr> -->
      </tbody>
      <!-- <tbody>
        <tr v-for="i in bd">
          <td>
            {{ i.管理員編號 }}
          </td>
          <td>
            {{ i.姓名 }}
          </td>
          <td>
            {{ i.信箱 }}
          </td>
          <td>
            {{ i.管理權限 }}
          </td>
          <td>
            {{ i.狀態 }}
          </td>
          <td>
            <button>修改</button>
          </td>
        </tr>
      </tbody> -->
    </table>

    <div class="pagination">
      <button
        @click="prevPage"
        :disabled="currentPage === 1"
        class="firstButton"
      >
        &lt;
      </button>

      <li v-for="i in totalPages" :key="i">
        <button :class="{ pageOn: i == currentPage }" @click="changePage(i)">
          {{ i }}
        </button>
      </li>
      <button
        @click="nextPage"
        :disabled="currentPage === totalPages"
        class="lastButton"
      >
        &gt;
      </button>
    </div>
  </div>
</template>

<script>
import { Value } from "sass";
import BR from "/src/components/BkRevise.vue";
import BState from "/src/components/BkState.vue";
import BC from "/src/components/BkCheck.vue";

export default {
  components: { BR, BState, BC },

  props: ["bd", "title", "dataTd", "stateTd", "BCHref", "page", "bd2", "bd3"],

  data() {
    return {
      hover: false,
      currentPage: 1,
      itemsPerPage: 10,
    };
  },

  methods: {
    tValue(t) {
      for (let v in t) {
        return v;
      }
    },

    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage += 1;
      }
    },
    prevPage() {
      if (this.currentPage > 1) {
        this.currentPage -= 1;
      }
    },

    changePage(i) {
      this.currentPage = i;
    },
  },
  computed: {
    // Calculate the total number of pages
    totalPages() {
      return Math.ceil(this.bd.length / this.itemsPerPage);
    },
    // Filter and display the data for the current page
    pageData() {
      const startIndex = (this.currentPage - 1) * this.itemsPerPage;
      return this.bd.slice(startIndex, startIndex + this.itemsPerPage);
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.BkData {
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
        height: 39px;

        p {
          font-size: 18px;
          font-weight: bold;
          line-height: 39px;
        }
      }
    }

    .tableBody {
      tr {
        // :hover {
        //   background-color: coral;
        // }
        td {
          background-color: $White;
          color: $Black;
          padding: 4px 0;
          border-bottom: 1px solid #c4c4c4;
          border-left: 1px solid #c4c4c4;
          border-right: 1px solid #c4c4c4;
          vertical-align: middle;
          overflow: hidden;

          // text-overflow: ellipsis;
        }
      }
    }
  }
  .pagination {
    margin-top: 20px;
    justify-content: center;

    button {
      background-color: #ffffff;
      color: #0056b3;
      border: 1px solid #dee2e6;
      border-right: 0;

      font-size: 18px;
      padding: 4px 8px 4px 8px;

      &:hover {
        background-color: #bad5f3;
      }
    }

    .lastButton {
      border-right: 1px solid #dee2e6;
      border-radius: 0 5px 5px 0;
    }

    .firstButton {
      border-radius: 5px 0 0 5px;
    }

    .pageOn {
      background-color: #2852ab;
      color: $LightGray;
    }
  }
}
</style>
