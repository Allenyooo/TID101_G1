<template>
  <div class="BkDate">
    <input type="date" name="" id="" placeholder="請輸入日期" />
    ~
    <input type="date" name="" id="" placeholder="請輸入日期" />
    <button>搜尋</button>
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
</style>
