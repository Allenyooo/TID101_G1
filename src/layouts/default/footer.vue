<template>
	<footer>
		<!--Logo-->
		<img
			src="/src/assets/Image/navAndFooter/footer/footerLogo.svg"
			alt="footerLogo"
		/>
		<!--聲明-->
		<p>
			©Li_Hua_Dian Co. All rights reserved.<br />
			本網站為緯育 TibaMe
			【第91期】前端工程師專業技術養成班學員作品，僅供學習、展示之用途。
		</p>
		<!--聯絡我們-->
		<div class="contact">
			<img
				src="/src/assets/Image/navAndFooter/footer/mail_icon.png"
				alt="mail"
			/>
			<h5>聯絡我們</h5>
		</div>
	</footer>
</template>

<script>
	export default {
  name: "FooterComponent",

  //固定footer高度
  mounted() {
    this.fixFooter();
    window.addEventListener('resize', this.fixFooter);
  },
  beforeUnmount() {
    window.removeEventListener('resize', this.fixFooter);
  },
  methods: {
    fixFooter() {
      const footer = this.$refs.footer;
      const windowHeight = window.innerHeight;
      const bodyHeight = document.body.scrollHeight;

      if (bodyHeight < windowHeight) {
        footer.style.position = 'fixed';
        footer.style.bottom = '0';
        footer.style.left = '0';
        footer.style.right = '0';
      } else {
        footer.style.position = 'static';
      }
    }
  }
};
</script>

<style lang="scss" scoped>
	@mixin breakpoint($point) {
		@media screen and (max-width: $point) {
			@content;
		}
	}

	footer {
		height: 80px;
		width: 100%;
		background-color: #333;
		display: flex;
		justify-content: space-between;
		align-items: center;

		img {
			margin-left: 49px;
			top: 12px;

			@include breakpoint(820px) {
				margin-left: 4vw;
			}

			@include breakpoint(570px) {
				margin-left: 2vw;
				width: 18vw;
			}

			@include breakpoint(430px) {
				margin-left: 2vw;
				width: 16vw;
			}
		}

		p {
			font-size: 12px;
			font-weight: 400px;
			color: white;
			text-align: center;
			font-family: noto serif tc;
			margin-top: 22px;
			margin-bottom: 22px;

			@include breakpoint(820px) {
				width: 48vw;
			}

			@include breakpoint(570px) {
				width: 58vw;
				font-size: 12px;
			}

			@include breakpoint(500px) {
				font-size: 10px;
			}

			@include breakpoint(400px) {
				font-size: 9px;
			}

			@include breakpoint(430px) {
				width: 60vw;
			}
		}

		.contact {
			display: flex;
			align-items: center;

			@include breakpoint(820px) {
				margin-right: 2vw;
			}

			img {
				scale: 0.8;
				margin: 25px 8px 27px 0px;

				@include breakpoint(570px) {
					scale: 0.5;
					margin: 27px 0px 26px 0px;
					width: 4vw;
				}

				@include breakpoint(430px) {
					width: 6vw;
				}
			}

			h5 {
				margin: 27px 44px 30px 0px;
				color: #fff;
				font-weight: 800;
				font-size: 16px;
				font-family: noto serif tc;

				@include breakpoint(820px) {
					margin: 26px 0px 26px 0px;
					font-size: 15px;
				}

				@include breakpoint(570px) {
					font-size: 12px;
				}

				@include breakpoint(430px) {
					margin: 26px 0px 24px 0px;
					font-size: 10px;
					width: 12vw;
				}
			}
		}
	}
</style>
