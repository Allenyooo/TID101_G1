<template>
  <!-- <div class="dropdown">
    <button
      class="btn btn-secondary dropdown-toggle"
      type="button"
      id="dropdownMenuButton1"
      data-bs-toggle="dropdown"
      aria-expanded="false"
    >
      <h4>管理員編號</h4>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <li>
        <a class="dropdown-item" href="#">1</a>
      </li>
      <li><a class="dropdown-item" href="#">Another action</a></li>
      <li><a class="dropdown-item" href="#">Something e</a></li>
    </ul>
  </div> -->
  <div class="BkSearch">
    <div>
      <button class="Bkdrop" @click="dd">管理員編號</button>
      <ul :class="{ drop: down == true }">
        <li v-for="i in dropdown">
          <a href="">{{ i }}</a>
        </li>
      </ul>
    </div>
    <div class="inputSearch">
      <input type="text" placeholder="請輸入會員編號" />
    </div>
    <div class="rightButton">
      <button class="rB">搜尋</button>
    </div>

    <div class="BkNew">
      <button class="bN">{{ search }}</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["dropdown", "search"],

  data() {
    return {
      down: false,
    };
  },
  methods: {
    dd() {
      if (this.down == false) {
        return (this.down = true);
      } else if (this.down == true) {
        return (this.down = false);
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.dropdown {
  button {
    --bs-btn-bg: #c8ac96;
  }

  ul.dropdown-menu {
    --bs-dropdown-min-width: 140px;

    li {
      border: 1px solid black;

      .dropdown-item {
        height: 30px;
      }
    }
  }
}

// .aa {
//   width: 140px;
//   height: 40px;
// }

.BkSearch {
  display: flex;
  font-family: $fontFamily;
  margin-bottom: 12px;

  .drop {
    display: block;
  }
  div {
    height: 32px;
    position: relative;

    .Bkdrop {
      height: 32px;
      width: 126px;
      background-color: $LightBrown;
      color: $White;
      text-align: left;
    }

    .Bkdrop::before {
      content: "";
      display: block;
      position: absolute;
      height: 23px;
      width: 23px;
      top: 16%;
      right: 6%;
      background-image: url("/src/assets/Image/BK/dropdown.svg");
    }

    ul {
      display: none;
      position: absolute;

      li {
        background-color: antiquewhite;
        width: 126px;
        height: 40px;
        border: 1px solid black;
      }
    }
  }
  .inputSearch {
    margin-left: 4px;

    input {
      height: 32px;
    }
  }
  .rightButton {
    margin-left: 4px;

    .rB {
      width: 60px;
      height: 32px;
    }
  }

  .BkNew {
    margin-left: auto;
    .bN {
      width: auto;
      height: 32px;
    }
  }
}
</style>
