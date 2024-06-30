<template>
  <div class="BkState">
    <div class="form-check form-switch">
      <input
        class="form-check-input"
        type="checkbox"
        id="flexSwitchCheckChecked"
        v-model="isChecked"
        @change="inputChange"
      />
      <span
        class="s2"
        :class="{ checkColor2: isChecked == true }"
        v-if="statePage == 2 || statePage == 5 || statePage == 6"
        >{{ isChecked ? "啟用" : "停用" }}</span
      >
      <span
        class="s1"
        :class="{ checkColor: isChecked == true }"
        v-if="statePage == 1 || statePage == 3 || statePage == 7"
        >{{ isChecked ? "啟用" : "停用" }}</span
      >

      <!-- 
      <span
        class="s1"
        :class="{ checkColor: stateBd.status == true }"
        v-if="
          (statePage == 1 || statePage == 3 || statePage == 7) &&
          (stateBd.status == '套用中' ||
            stateBd.status == '上架' ||
            stateBd.status == '啟用')
        "
        >{{ isChecked ? "啟用" : "停用" }}</span
      > -->

      <!-- <span
        class="s1"
        :class="{ checkColor: isChecked2 == false }"
        v-if="
          (statePage == 1 || statePage == 3 || statePage == 7) &&
          (stateBd.status != '套用中' ||
            stateBd.status != '上架' ||
            stateBd.status != '啟用')
        "
        >{{ isChecked ? "停用" : "起用" }}</span
      > -->
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";

export default {
  props: ["statePage", "stateId", "stateBd"],

  data() {
    return {
      // isChecked: true,
      isChecked:
        this.stateBd.STATUS === "套用中" ||
        this.stateBd.STATUS === "上架" ||
        this.stateBd.STATUS === "啟用" ||
        this.stateBd.STATUS === "正常",
    };
  },
  methods: {
    inputChange() {
      const requestData = {
        stateID: this.stateId,
        newState: this.isChecked ? "啟用" : "停用", // 根据 newValue 发送 啟用 或 停用
      };
      console.log(requestData.stateID, requestData.newState);

      if (this.statePage == 1) {
        fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkAccess/accessState.php`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            STATEID: requestData.stateID,
            NEWSTATE: requestData.newState,
          }),
        });
      }
      if (this.statePage == 2) {
        fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkMember/memberState.php`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            STATEID: requestData.stateID,
            NEWSTATE: requestData.newState,
          }),
        });
      }

      this.ale();
    },

    ale() {
      Swal.fire({
        icon: "success",
        title: "狀態更改成功",
        showConfirmButton: false,
        timer: 1500, // 自動在1.5秒後關閉
      });
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.BkState {
  display: flex;
  justify-content: center;
  position: relative;

  .form-check {
    display: flex;
    justify-content: center;

    input {
      margin: auto;
      width: 66px;
      height: 24px;
      background-color: #919191;
      &:checked {
        background-color: #2852ab;
      }
    }

    span {
      position: absolute;
      // top: 16%;
      // left: 46%;
      font-size: 16px;
      color: $White;
      pointer-events: none;
    }

    .s1 {
      position: absolute;
      top: 16%;
      left: 46%;
      font-size: 16px;
      color: $White;
      pointer-events: none;
    }
    .s2 {
      position: absolute;
      top: 16%;
      left: 45%;
      font-size: 16px;
      color: $White;
      pointer-events: none;
    }
    .checkColor {
      color: $White;
      left: 36%;
    }
    .checkColor2 {
      color: $White;
      left: 28%;
    }
  }
}
</style>
