<template>
  <div class="BkBody">
    <BH></BH>
    <div class="BkM">
      <BM :manage="manage" :page="page"></BM>
      <div class="BkContent">
        <p>後台首頁</p>
        <div class="Bkline"></div>

        <div class="BkStatistics">
          <div class="BS1">累積會員人數: 12,345筆</div>
          <div class="BS2">目前使用人數: 12,345筆</div>
          <div class="BS3">今日營收: 12,345元</div>
        </div>

        <div class="chartTtle">
          會員人數
          <button>月</button>
        </div>
        <section class="chartBg">
          <canvas id="Chart"></canvas>
        </section>

        <div class="chartTtle">
          使用人數
          <button>月</button>
        </div>
        <section class="chartBg">
          <canvas id="Chart2"></canvas>
        </section>

        <div class="chartTtle">
          營收
          <button>月</button>
        </div>
        <section class="chartBg">
          <canvas id="Chart3"></canvas>
        </section>
      </div>
    </div>

    <!-- <BR></BR> -->
  </div>
</template>

<script>
import BH from "/src/components/BkHead.vue";
import BM from "/src/components/BkManage.vue";
import Chart from "chart.js/auto";

export default {
  components: { BH, BM },

  mounted() {
    this.renderChart1();
    this.renderChart2();
    this.renderChart3();
  },

  data() {
    return {
      page: 1,
      manage: [
        {
          index: 1,
          manageName: "權限管理",
          src: "/BkAccess",
          border: 1,
        },
        {
          index: 2,
          manageName: "會員資料管理",
          src: "/BkMember",
          border: 2,
        },
        {
          index: 3,
          manageName: "店家資訊管理",
          src: "/BkShop",
          border: 2,
        },
        {
          index: 4,
          manageName: "訂單管理",
          src: "/BkOrder",
          border: 2,
        },
        {
          index: 5,
          manageName: "商品管理",
          src: "/BkProduct",
          border: 2,
        },
        {
          index: 6,
          manageName: "折價券管理",
          src: "/BkDiscount",
          border: 2,
        },
        {
          index: 7,
          manageName: "FAQ管理",
          src: "/BkFaq",
          border: 2,
        },
      ],

      stateTd: 1,
      dataTd: 1,
    };
  },

  methods: {
    renderChart1() {
      const ctx = document.getElementById("Chart").getContext("2d");
      const labels = ["6/5", "6/10", "6/15", "6/20", "6/25", "6/30"];
      const data = {
        labels: labels,
        datasets: [
          {
            label: "會員人數",
            data: [1000, 1300, 600, 300, 1200, 2510],
            fill: true,
            borderColor: "#2852AB",
            backgroundColor: "rgba(0, 0, 0, 0)",
            pointStyle: "circle",
            pointBackgroundColor: "#2852AB",
            pointRadius: 4,
            pointHoverRadius: 10,
            pointHoverBackgroundColor: "#CB4847",
            tension: 0,
          },
        ],
      };
      const config = {
        type: "line",
        data: data,
        options: {
          responsive: true,
          interaction: {
            intersect: false,
          },
          scales: {
            x: {
              display: true,
              title: {
                display: true,
                text: "日期",
              },
            },
            y: {
              display: true,
              title: {
                display: true,
                text: "人數",
              },
            },
          },
          plugins: {
            title: {
              display: true,
              text: "當月會員人數",
              font: {
                size: 20,
              },
            },
          },
        },
      };
      new Chart(ctx, config);
    },
    renderChart2() {
      const ctx = document.getElementById("Chart2").getContext("2d");
      const labels = ["6/5", "6/10", "6/15", "6/20", "6/25", "6/30"];
      const data = {
        labels: labels,
        datasets: [
          {
            label: "使用人數",
            data: [1000, 1300, 600, 300, 1200, 2510],
            fill: true,
            borderColor: "#2852AB",
            backgroundColor: "rgba(0, 0, 0, 0)",
            pointStyle: "circle",
            pointBackgroundColor: "#2852AB",
            pointRadius: 4,
            pointHoverRadius: 10,
            pointHoverBackgroundColor: "#CB4847",
            tension: 0,
          },
        ],
      };
      const config = {
        type: "line",
        data: data,
        options: {
          responsive: true,
          interaction: {
            intersect: false,
          },
          scales: {
            x: {
              display: true,
              title: {
                display: true,
                text: "日期",
              },
            },
            y: {
              display: true,
              title: {
                display: true,
                text: "人數",
              },
            },
          },
          plugins: {
            title: {
              display: true,
              text: "當月使用人數",
              font: {
                size: 20,
              },
            },
          },
        },
      };
      new Chart(ctx, config);
    },
    renderChart3() {
      const ctx = document.getElementById("Chart3").getContext("2d");
      const labels = ["6/5", "6/10", "6/15", "6/20", "6/25", "6/30"];
      const data = {
        labels: labels,
        datasets: [
          {
            label: "營收",
            data: [32000, 11200, 42000, 22200, 16000, 27100],
            fill: true,
            borderColor: "#2852AB",
            backgroundColor: "rgba(0, 0, 0, 0)",
            pointStyle: "circle",
            pointBackgroundColor: "#2852AB",
            pointRadius: 4,
            pointHoverRadius: 10,
            pointHoverBackgroundColor: "#CB4847",
            tension: 0,
          },
        ],
      };
      const config = {
        type: "line",
        data: data,
        options: {
          responsive: true,
          interaction: {
            intersect: false,
          },
          scales: {
            x: {
              display: true,
              title: {
                display: true,
                text: "日期",
              },
            },
            y: {
              display: true,
              title: {
                display: true,
                text: "元",
              },
            },
          },
          plugins: {
            title: {
              display: true,
              text: "當月營收",
              font: {
                size: 20,
              },
            },
          },
        },
      };
      new Chart(ctx, config);
    },
  },
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";
.BkBody {
  background-color: $OffWhite;
  font-family: $fontFamily;

  .BkM {
    display: flex;
    height: 150vw;

    .BkContent {
      width: 80vw;

      p {
        font-size: 28px;
        font-weight: bold;
        margin-top: 16px;
      }

      .Bkline {
        height: 1px;

        background-color: $Black;
        margin-bottom: 24px;
      }

      .BkStatistics {
        display: flex;
        margin-bottom: 24px;

        div {
          width: 300px;
          height: 76px;
          background-color: $Nude;
          text-align: center;
          line-height: 72px;
          font-size: 24px;
          color: $Black;
          font-size: 20px;
        }

        .BS2 {
          margin: 0 auto;
        }
      }

      .chartBg {
        background-color: white;
        margin-bottom: 24px;
      }

      .chartTtle {
        font-size: 24px;
        margin-bottom: 12px;

        button {
          font-size: 20px;
          width: 60px;
          height: 24px;
          background-color: $White;
          text-align: left;
          margin-left: 12px;
        }
      }
    }
  }
}
</style>
