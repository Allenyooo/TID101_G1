<template>
	<section class="login_wrapper">
		<div class="login_left">
			<img
				src="../assets/Image/login/soju.svg"
				alt="soju"
				class="login_soju"
				draggable="false"
			/>
			<img
				src="../assets/Image/login/cup.svg"
				alt="cup1"
				class="login_cup1"
				draggable="false"
			/>
			<img
				src="../assets/Image/login/cup.svg"
				alt="cup2"
				class="login_cup2"
				draggable="false"
			/>
		</div>
		<div id="login_right">
			<router-view />
		</div>
	</section>
</template>

<script>
	export default {
		mounted() {
			const memberId = this.getCookie("memberId");
			if (memberId) {
				this.$router.push({ path: "/member" });
			}
		},
		methods: {
			getCookie(name) {
				const value = `; ${document.cookie}`;
				const parts = value.split(`; ${name}=`);
				if (parts.length === 2) return parts.pop().split(";").shift();
			},
		},
	};
</script>

<style lang="scss" scoped>
	@import "/src/sass/style.scss";

	@mixin breakpoint($point) {
		@media screen and (max-width: $point) {
			@content;
		}
	}

	.login_wrapper {
		max-width: 100vw;
		width: 100%;
		min-height: 100vh;
		overflow: hidden;
		background-color: $OffWhite;
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 10vw;
		@include breakpoint(430px) {
			flex-direction: column-reverse;
		}
		.login_left {
			width: 30vw;
			position: relative;
			.login_soju {
				display: block;
				height: 40vw;
				margin: 0 auto;
				transform: translate(-2vw);
				filter: drop-shadow(2px 10px 5px #aaa);
				@include breakpoint(430px) {
					position: absolute;
					height: 70vh;
					top: -70vh;
					right: -50vw;
					opacity: 0.1;
				}
			}
			.login_cup1 {
				width: 7vw;
				position: absolute;
				top: 40%;
				right: 29%;
				transform: rotate(20deg);
				filter: drop-shadow(7px 7px 3px #bbb);
				@include breakpoint(430px) {
					width: 40vw;
					transform: rotate(0);
					top: -25vh;
					right: 130%;
					opacity: 0.2;
				}
			}
			.login_cup2 {
				width: 7vw;
				position: absolute;
				top: 45%;
				right: 2%;
				transform: rotate(-15deg);
				filter: drop-shadow(2px 7px 3px #bbb);
				@include breakpoint(430px) {
					width: 40vw;
					transform: rotate(0);
					top: -35vh;
					right: 130%;
					opacity: 0.2;
					filter: unset;
				}
			}
		}
		#login_right {
			position: relative;
			width: 30vw;
			background-color: $WarmNude;
			border: 1px solid transparent;
			border-image: $RevGoldGrad;
			border-image-slice: 1;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: space-evenly;
			@include breakpoint(820px) {
				width: 40vw;
			}
			@include breakpoint(430px) {
				background-color: unset;
				border-image: unset;
				width: 80vw;
			}
		}
	}
</style>
