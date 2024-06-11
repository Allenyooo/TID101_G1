<template>
  <div class="enter_body">
    <section class="enter_cut1">
      <div class="enter_cut1_open">
        <div class="cut1_door">
          <img
            src="../assets/Image/enter/palace_door_L.png"
            class="cut1_door_L"
          />
          <img
            src="../assets/Image/enter/palace_door_R.png"
            class="cut1_door_R"
          />
        </div>
      </div>
      <!-- <img src="../assets/Image/enter/cut1.png" alt=""> -->
    </section>
  </div>
</template>

<script>
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

export default {
  mounted() {
    let tl = gsap.timeline({
      scrollTrigger: {
        trigger: ".enter_cut1",
        start: "top top",
        end: "65%",
        pin: true,
        // markers: true,
        scrub: 1,
      },
    });

<<<<<<< HEAD
        tl.to(".cut1_door_L", {
            // x: -45,
            x: "-99%" ,
            duration: 1
        })
        
            .to(".cut1_door_R", {
                // x: 45,
                x: "99%",
                duration: 1
            },0)
            
            .to(".enter_cut1_open",{
                scale: 3,
                duration: 1.5,
                transformOrigin: "center 68%",
            },1)

            .to(".enter_cut1_open",{
                scale: 10,
                duration: 1.5,
                transformOrigin: "center 68%",
            },2)

          .to(".enter_cut1_open",{
            scale: 20,
            duration: 1.5,
            // transformOrigin: "center 73%",
          },3);
    }
=======
    tl.to(".cut1_door_L", {
      x: -45,
      duration: 1,
    })

      .to(
        ".cut1_door_R",
        {
          x: 45,
          duration: 1,
        },
        0
      )

      .to(
        ".enter_cut1_open",
        {
          scale: 3,
          duration: 1.5,
          transformOrigin: "center 70%",
        },
        1
      )

      .to(
        ".enter_cut1_open",
        {
          scale: 10,
          duration: 1.5,
          transformOrigin: "center 70%",
        },
        2
      )

      .to(
        ".enter_cut1_open",
        {
          scale: 20,
          duration: 1.5,
          transformOrigin: "center 70%",
        },
        3
      );
  },
>>>>>>> roy
};
</script>

<style lang="scss" scoped>
@import "/src/sass/style.scss";

.enter_body {
  max-width: 100vw;
  height: 100vh;
}

<<<<<<< HEAD
    .enter_body {
        max-width: 100vw;
        height: 100vh;
        position: relative;
        .enter_cut1{
            // width: 98vw;
            // height: 100vh;
            width: 100%;
            height: 110%;
            background-image: url(../assets/Image/enter/cut1_bg.png);
            // background: #ECE6D9;
            background-repeat: no-repeat;
            background-size: contain;
            padding-top: 1%;
            overflow: hidden;
            position: relative;
            z-index: 49;
            .enter_cut1_open{
                // width: 95vw;
                // height: 95vh;
                width: 95%;
                height: 95%;
                background-image: url(../assets/Image/enter/palace_open.png);
                background-repeat: no-repeat;
                background-size: contain;
                background-position: center top;
                margin: 0 auto;
                z-index: 50;
                // opacity: 0;
                position: relative;
                .cut1_door{
                    // padding: 33.24% 0 0 0.42%;
                    padding: 32.05% 0 0 0.40%;
                    display: flex;
                    justify-content: center;
                    img{
                        // width: 3.52%;
                        width: 3.5%;
                    }
                }
            }

        }
    }



</style>
=======
.enter_cut1 {
  width: 100%;
  height: 110%;
  background-image: url(../assets/Image/enter/cut1_bg.png);
  // background: #ECE6D9;
  background-repeat: no-repeat;
  background-size: contain;
  overflow: hidden;
  .enter_cut1_open {
    width: 95%;
    height: 95%;
    background-image: url(../assets/Image/enter/palace_open.png);
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center 20%;
    margin: 0 auto;
    .cut1_door {
      padding: 33.24% 0 0 0.42%;
      display: flex;
      justify-content: center;
      img {
        width: 3.52%;
      }
    }
  }
}
</style>
>>>>>>> roy
