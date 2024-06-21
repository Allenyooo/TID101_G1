<template>
  <div class="BkDate">
    <input
      type="date"
      name=""
      id=""
      placeholder="請輸入日期"
      v-model="startDate"
    />
    ~
    <input
      type="date"
      name=""
      id=""
      placeholder="請輸入日期"
      v-model="endDate"
    />
  </div>
</template>

<script>
export default {
  data() {
    return {
      startDate: "",
      endDate: "",
    };
  },
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
