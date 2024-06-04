<template>
  <div class="BkData">
    <ul class="col">
      <li v-for="j in bd">
        <ul>
          <li v-for="(i, index) in j" :key="index">
            {{ i }}
          </li>
        </ul>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ["bd"],
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.BkData {
  margin-top: 200px;
  .col {
    display: flex;
  }

  li {
    background-color: antiquewhite;
    border: 1px solid black;
    width: 100px;
    height: 100px;
  }
}
</style>
