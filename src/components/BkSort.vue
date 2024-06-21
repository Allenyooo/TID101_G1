<template>
  <!-- <div class="BkSort">
    <div>
      <button class="Bkd" @click="dD">編號:由小到大</button>
      <ul :class="{ sDrop: this.sDown == true }">
        <li v-for="i in dropdown">
          <a>{{ dropValue(i) }}</a>
        </li>
      </ul>
    </div>
  </div> -->

  <div class="BkSortbody">
    <select class="BkSortSelect" @change="sortChange">
      <option v-for="s in sortDrop" :key="s.id" class="sort" :value="s.id">
        <h4>{{ s.name }}</h4>
      </option>
    </select>
  </div>
</template>

<script>
export default {
  props: ["sortDrop"],
  emits: ["sortEvent"],

  data() {
    return {
      sId: 1,
    };
  },
  methods: {
    sortChange(e) {
      this.sId = e.target.value;
      console.log(this.sId);
      this.$emit("sortEvent", this.sId);
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

// .BkSort {
//   height: 32px;
//   font-family: $fontFamily;
//   margin-bottom: 12px;

//   div {
//     position: relative;
//     width: 160px;

//     .sDrop {
//       display: block;
//     }

//     .Bkd {
//       height: 32px;
//       width: 160px;
//       background-color: $LightBrown;
//       color: $White;
//       text-align: left;
//     }

//     .Bkd::before {
//       content: "";
//       display: block;
//       position: absolute;
//       height: 23px;
//       width: 23px;
//       top: 16%;
//       right: 6%;
//       background-image: url("/src/assets/Image/BK/sort.svg");
//     }

//     ul {
//       display: none;
//       position: absolute;

//       li {
//         background-color: antiquewhite;
//         width: 160px;
//         height: 32px;
//         border: 1px solid black;
//         line-height: 32px;
//         padding: 0 6px;
//       }
//     }
//   }
// }

.BkSortbody {
  margin-bottom: 12px;

  .BkSortSelect {
    font-family: $fontFamily;
    background-color: $LightBrown;
    color: $White;

    .sort {
      background-color: $White;
      color: $Black;
    }
  }
}
</style>
