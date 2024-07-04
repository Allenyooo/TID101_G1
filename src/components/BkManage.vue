<template>
  <div class="BkManage">
    <ul>
      <li
        v-for="i in manage"
        :key="i.index"
        :class="{
          BmBorder1: i.border == 1,
          BmBorder2: i.border == 2,
          BmOn: i.index == page,
        }"
      >
        <router-link
          :to="i.src"
          :class="{
            BmaOn: i.index == page,
          }"
        >
          {{ i.manageName }}
        </router-link>

        <!-- <a
          :href="i.src"
          :class="{
            BmaOn: i.index == page,
          }"
        >
          {{ i.manageName }}
        </a> -->
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ["manage", "page"],
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.BkManage {
  margin-right: 36px;
  margin-top: 16px;
  margin-left: 20px;

  a {
    text-decoration: none;
    display: block;
  }

  li {
    background-color: $White;
    height: 65px;
    width: 180px;
    line-height: 65px;
    text-align: center;

    &:hover {
      background-color: $LightBrown;
    }

    a {
      font-size: 24px;
      color: $DarkBrown;
      &:hover {
        color: white;
      }
    }

    .BmaOn {
      color: $White;
    }
  }

  .BmBorder1 {
    border: 2px solid $DarkBrown;
  }
  .BmBorder2 {
    border-bottom: 2px solid $DarkBrown;
    border-left: 2px solid $DarkBrown;
    border-right: 2px solid $DarkBrown;
  }
  .BmOn {
    background-color: $DarkBrown;
  }
}
</style>
