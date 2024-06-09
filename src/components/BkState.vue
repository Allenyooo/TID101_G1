<template>
  <div class="BkState">
    <div class="form-check form-switch">
      <input
        class="form-check-input"
        type="checkbox"
        id="flexSwitchCheckChecked"
        checked
      />
      <span>啟用</span>
    </div>
  </div>
</template>

<script>
export default {
  data() {},
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
      background-color: #2852ab;
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
