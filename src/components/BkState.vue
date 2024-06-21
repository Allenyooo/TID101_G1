<template>
  <div class="BkState">
    <div class="form-check form-switch">
      <input
        class="form-check-input"
        type="checkbox"
        id="flexSwitchCheckChecked"
        v-model="isChecked"
      />
      <span>{{ isChecked ? "啟用" : "停用" }}</span>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isChecked: true, // 初始設置為啟用
    };
  },
  methods: {},
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
        background-color: #2852ab; /* 設置選中時的背景顏色 */
      }
    }

    span {
      position: absolute;
      top: 20%;
      left: 36%;
      font-size: 16px;
      color: $White;
      pointer-events: none;
    }
  }
}
</style>
