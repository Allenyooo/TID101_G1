<template>
  <div class="BkBody">
    <BH :headname="head"></BH>
    <div class="BkM">
      <BM :manage="manage" :page="page"></BM>
      <div class="BkContent">
        <p>後台首頁</p>
        <div class="Bkline"></div>

        <div class="BkStatistics">
          <div class="BS1">累積會員人數: {{ webInfo[1] }}筆</div>
          <!-- <div class="BS2">目前使用人數: 12,345筆</div> -->
          <div class="BS3">今日營收: {{ webInfo[0] }}元</div>
        </div>

        <div class="chartTtle">
          會員人數
          <button>月</button>
        </div>
        <section class="chartBg">
          <canvas id="Chart"></canvas>
        </section>
        <!-- 這一段刪掉 chart.js會壞掉 -->
        <!-- <div class="chartTtle">    
          使用人數
          <button>月</button>
        </div>
        <section class="chartBg">
          <canvas id="Chart2"></canvas>
        </section> -->
        <!-- 這一段刪掉 chart.js會壞掉 -->

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
    this.checkManagerIdCookie();
    this.renderChart1();
    // this.renderChart2();
    this.renderChart3();
    this.getwebInfo();
    // this.getMemberId();

    // fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkHead.php`, {
    //   mode: "cors",
    //   method: "POST",
    //   headers: {
    //     "Content-Type": "application/json",
    //   },
    //   body: JSON.stringify({
    //     ID: this.managerId,
    //   }),
    // })
    //   .then((response) => {
    //     if (!response.ok) {
    //       throw new Error("Network response was not ok");
    //     }
    //     return response.json();
    //   })
    //   .then((data) => {
    //     console.log(data);
    //     this.bd = data;
    //   });
  },

  data() {
    return {
      page: 0,
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
      webInfo: [],
      stateTd: 1,
      dataTd: 1,

      head: "",
      managerId: 0,
    };
  },

  methods: {
    headname() {
      fetch(`${import.meta.env.VITE_PHP_PATH}Bk/BkHead.php`, {
        mode: "cors",
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          ID: this.managerId,
        }),
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json();
        })
        .then((data) => {
          console.log(data);
          this.head = data[0].NAME;
        });
    },

    checkManagerIdCookie() {
      // 檢查managerId是否存在於Cookies中的函數
      const cookies = document.cookie.split(";");
      const managerIdCookie = cookies.find((cookie) =>
        cookie.trim().startsWith("managerId=")
      );

      if (!managerIdCookie) {
        // 如果managerId cookie不存在，則重定向到登入頁面
        this.$router.push("/BkLogin"); // 將'/login'替換為你實際的登入路徑
      } else {
        this.getMemberId();
      }
    },

    getMemberId() {
      let cookie = document.cookie;
      let getId = cookie.match(/managerId=(\d+)/);
      let managerId = getId[1];
      // console.log(match)
      // console.log(memberId);
      this.managerId = managerId;
      console.log(this.managerId);
      this.headname();
      console.log(this.head);
      // return memberId;
    },
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
    async getwebInfo() {
      try {
        const response = await fetch(
          // "http://localhost/tid101_g1/public/php/review/score.php?shop=1"
          `${import.meta.env.VITE_PHP_PATH}Bk/BkHome.php`
        );
        const webData = await response.json();
        this.webInfo = webData;
        console.log(webData);
      } catch (error) {
        console.error("Error fetching shops:", error);
      }
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

.BS1 {
  margin-right: 20px;
}
</style>
