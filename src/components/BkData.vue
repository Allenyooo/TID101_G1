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
          <th scope="col"><h4>管理員編號</h4></th>
          <th scope="col"><h4>姓名</h4></th>
          <th scope="col"><h4>信箱</h4></th>
          <th scope="col"><h4>管理權限</h4></th>
          <th scope="col"><h4>狀態</h4></th>
          <th scope="col"><h4>修改</h4></th>
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
import BR from "/src/components/BkRevise.vue";

export default {
  components: { BR },

  props: ["bd"],

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
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.BkData {
  table {
    table-layout: fixed;

    tr {
      text-align: center;
    }

    .tableHead {
      th {
        background-color: $DarkBrown;
        color: $White;
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
