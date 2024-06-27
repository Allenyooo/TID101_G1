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
export default {
  props: ["statePage", "stateId", "stateBd"],

  data() {
    return {
      // isChecked: true,
      isChecked:
        this.stateBd.status === "套用中" ||
        this.stateBd.status === "上架" ||
        this.stateBd.status === "啟用" ||
        this.stateBd.status === "正常",
    };
  },
  methods: {
    inputChange(event) {
      const newValue = event.target.checked;
      console.log(newValue);

      if (newValue == false) {
        fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkAccess/accessState.php`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            stateID: this.stateId,
          }),
        });
      }
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
