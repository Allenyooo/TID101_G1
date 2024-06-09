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
        <tr v-for="j in bd" @mouseover="hovertd">
          <td
            v-for="(i, index) in j"
            :key="i.id"
            :class="{ td: hover == true }"
          >
            <h5>{{ i }}</h5>
          </td>

          <td>
            <BState></BState>
          </td>
          <td>
            <!-- <button></button> -->
            <BR></BR>
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
  </div>
</template>

<script>
import { Value } from "sass";
import BR from "/src/components/BkRevise.vue";
import BState from "/src/components/BkState.vue";
import BC from "/src/components/BkCheck.vue";

export default {
  components: { BR, BState },

  props: ["bd", "title"],

  data() {
    return {
      i: 6,
      hover: false,
    };
  },

  methods: {
    // hovertd() {
    //   this.hover = true;
    // },
    tValue(t) {
      for (let v in t) {
        return v;
      }
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
        height: 44px;

        p {
          font-size: 18px;
          font-weight: bold;
          line-height: 44px;
        }
      }
    }

    .tableBody {
      .td {
        background-color: red;
      }

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

        // button {
        //   background-image: url("/src/assets/Image/product/revise.svg");
        //   height: 36px;
        //   width: 36px;
        //   border: none;
        // }
      }
    }
  }
}
</style>
