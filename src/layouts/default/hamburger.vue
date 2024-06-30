<template>
	<nav>
		<!--Logo-->
		<router-link to="/home">
			<img
				src="/src/assets/Image/navAndFooter/hamburger/logoWord.svg"
				alt="logo"
			/>
		</router-link>
		<!--漢堡-->
		<button
			id="btnMenu"
			class="c-btnMenu"
			aria-label="梨花殿"
			@click="toggleMenu"
		>
			<!--漢堡上方文字-->
			<span class="c-btnMenu_text">
				<span id="Menu" class="text" :class="{ show: !show }"
					>Menu</span
				>
				<!-- 展開時顯示文字-->
				<span id="Close" class="text" :class="{ show: show }"
					>Close</span
				>
				<!--未展開時顯示文字-->
				<img
					class="deco deco1"
					:class="{ show: !show }"
					src="/src/assets/Image/navAndFooter/hamburger/deco1.png"
					alt="#"
				/>
			</span>
			<!--漢堡-->
			<span class="c-btnMenu_front" :class="{ show: show }">
				<span class="line"></span>
				<span class="line"></span>
			</span>
		</button>
		<!--展開底圖-->
		<div id="menulist" :class="{ show: show }">
			<div class="o-menu_bg">
				<div class="circle"></div>
				<img
					id="deco2"
					class="deco deco2"
					src="/src/assets/Image/navAndFooter/hamburger/deco2.png"
					alt=""
				/>
			</div>
			<!--展開內選單-->
			<div id="o-menulist" :class="{ show: show }">
				<ul class="menu_list">
					<li class="menu_list_food">
						<router-link to="/food" @click="closeMenu">
							<h3>食物介紹</h3>
							<p>음식소개</p>
						</router-link>
					</li>
					<li class="menu_list_box">
						<div class="menu_list_recommend">
							<router-link to="/map" @click="closeMenu">
								<h3>全台推薦</h3>
								<p>매장 추천</p>
							</router-link>
						</div>
					</li>
					<li class="menu_list_box">
						<div class="menu_list_ticket">
							<router-link to="/product" @click="closeMenu">
								<h3>餐券販售</h3>
								<p>쿠폰 판매</p>
							</router-link>
						</div>
					</li>
					<li class="menu_list_box">
						<div class="menu_list_user">
							<router-link
								v-if="!isMember"
								to="/login"
								@click="closeMenu"
							>
								<h3>會員登入</h3>
								<p>회원 등록</p>
							</router-link>
							<router-link
								v-else="isMember"
								to="/member"
								@click="closeMenu"
							>
								<h3>會員中心</h3>
								<p>회원 센터</p>
							</router-link>
						</div>
					</li>
					<li class="menu_list_box">
						<div class="menu_list_shoppingcart">
							<a style="cursor: pointer" @click="scToggle">
								<h3>購物車</h3>
								<p>쇼핑카트</p>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<shopping
		:sp="move"
		:allTotal="allTotal"
		:shoppingCartData="shoppingdata"
		@close="scToggle"
	></shopping>
</template>

<script>
	import axios from "axios";
	import shopping from "/src/components/shoppingCart.vue";

	export default {
		components: { shopping },
		data() {
			return {
				show: false,
				hidden: true,
				isMember: false, //判斷是否為會員
				move: false, //購物車開關
				sp: true, //購物車開關
				allTotal: 0,
				shoppingdata: [],
				memberId: "",
			};
		},
		mounted() {
			this.checkMemberStatus();
			let cookie = document.cookie;
			let match = cookie.match(/(?:^|;) *memberId=([^;]*)/);

			if (match) {
				let memberId = match[1];
				if (memberId.trim() !== "") {
					this.getMemberId();
				}
			}
		},
		methods: {
			toggleMenu() {
				this.show = !this.show;
				this.hidden = !this.hidden;
			},
			closeMenu() {
				this.show = false;
				this.hidden = true;
			},
			getCookie(name) {
				const value = `; ${document.cookie}`;
				const parts = value.split(`; ${name}=`);
				if (parts.length === 2) return parts.pop().split(";").shift();
			},
			checkMemberStatus() {
				const memberId = this.getCookie("memberId");
				this.isMember = !!memberId;
			},

			scToggle() {
				if (this.move == false) {
					this.shoppingcartData();
					this.closeMenu();
					return (this.move = true);
				} else if (this.move == true) {
					this.closeMenu();
					return (this.move = false);
				}
			},

			sumtotal() {
				let alltotal = 0;
				for (let i = 0; i < this.shoppingdata.length; i++) {
					alltotal +=
						this.shoppingdata[i].PRICE *
						this.shoppingdata[i].COUNT *
						this.shoppingdata[i].PERCENT;
				}
				this.allTotal = alltotal;
			},

			shoppingcartData() {
				fetch(
					`${
						import.meta.env.VITE_PHP_PATH
					}shoppingCart/shoppingCart.php`,
					{
						method: "POST",
						headers: {
							"Content-Type": "application/json",
						},
						body: JSON.stringify({
							memberID: this.memberId,
						}),
					}
				)
					.then((response) => {
						if (!response.ok) {
							throw new Error("Network response was not ok");
						}
						return response.json();
					})
					.then((data) => {
						this.shoppingdata = data;
						this.sumtotal();
						// this.localstorageDAta();
						// this.shoppingCartTasks = this.shoppingCartTasks.concat();
					});
			},

			getMemberId() {
				let cookie = document.cookie;
				let getId = cookie.match(/memberId=(\d+)/);
				let memberId = getId[1];
				this.memberId = memberId;
				// return memberId;
			},
		},
	};
</script>

<style lang="scss" scoped>
	@import url(/src/sass/style.scss);

	@mixin breakpoint($point) {
		@media screen and (max-width: $point) {
			@content;
		}
	}

	nav {
		overflow: hidden;
		position: relative;
		z-index: 10000;
	}

	.menu_list_box {
		margin: 32px 0 0 0;

		@include breakpoint(390px) {
			margin: 0px;
		}
	}

	#btnMenu {
		background-color: transparent;
		border: none;
	}

	.c-btnMenu {
		cursor: pointer;
		position: fixed;
		top: 26px;
		right: 28px;
		z-index: 200;
		width: 60px;
		height: 60px;
		display: flex;
	}

	.deco1 {
		position: absolute;
		top: 57px;
		left: 18px;
		transition: opacity 0.4s, transform 0.9s;
		transition-delay: 0.3s;
		opacity: 0;
		z-index: 100;
		transform: translateY(-100%);
	}

	.deco1.show {
		opacity: 1;
		transform: none;
		z-index: 100;
	}

	.deco2 {
		position: absolute;
		top: 260px;
		right: 322px;
		z-index: 105;
		width: 100px;

		@include breakpoint(430px) {
			top: 167px;
			right: 165px;
			scale: 0.8;
		}

		@include breakpoint(390px) {
			top: 133px;
			right: 154px;
			scale: 0.8;
		}
	}

	#o-menulist {
		position: relative;
		width: 409px;

		@include breakpoint(430px) {
			left: 141px;
			top: 10px;
		}

		@include breakpoint(390px) {
			left: 141px;
			top: 10px;
		}
	}

	.button {
		cursor: pointer;
		border: none;
		background: initial;
	}

	.c-btnMenu_text .text {
		position: absolute;
		inset: 0;
		margin: auto;
		z-index: 101;
		font-family: Arial, Helvetica, sans-serif;
		/*改系統字體色*/
		font-weight: 700;
		top: 0px;
		right: 50px;
		font-size: 16px;
		font-family: sans-serif;
		letter-spacing: 0.02em;
		color: #7a625b;
		transition: 0.3s cubic-bezier(0, 0, 0.38, 2) transform,
			0.2s ease opacity, 0.4s ease color;
		transform: rotate(-50deg);
	}

	/*平常隱藏*/
	#Menu {
		display: none;
	}

	#Menu.show {
		display: block;
	}

	/*點擊時隱藏*/
	#Close {
		display: none;
	}

	#Close.show {
		display: block;
	}

	.c-btnMenu {
		@include breakpoint(430px) {
			scale: 0.6;
			top: 12px;
			right: 8px;
		}

		@include breakpoint(390px) {
			scale: 0.6;
			top: 12px;
			right: 8px;
		}
	}

	.c-btnMenu span {
		display: block;
	}

	.c-btnMenu_text {
		pointer-events: none;
		user-select: none;
	}

	/*漢堡本人*/
	.c-btnMenu_front {
		display: flex;
		pointer-events: none;
		user-select: none;
		position: absolute;
		inset: 0;
		margin: auto;
		z-index: 101;
		width: 60px;
		height: 60px;
		background: #c8ac96;
		box-sizing: border-box;
		border-radius: 50%;
		transform: scale(1);
		transform-origin: center;
		transition: 0.4s ease opacity,
			0.3s cubic-bezier(0, 0, 0.38, 3) transform;
	}

	/*漢堡線*/
	.c-btnMenu_front .line:nth-of-type(1) {
		top: 43px;
		right: 1px;
	}

	.c-btnMenu_front .line:nth-of-type(2) {
		top: 12px;
		right: 1px;
	}

	.c-btnMenu_front .line {
		position: absolute;
		inset: 0;
		margin: 0 auto;
		z-index: 101;
		top: 88px;
		width: 28px;
		height: 4px;
		background: #7a625b;
		transition: transform 0.5s, opacity 0.5s;
	}

	/*hover打叉叉*/
	.c-btnMenu_front .line:nth-of-type(1) {
		transform: translate3d(0, -8px, 0) rotate(0);
	}

	.c-btnMenu_front .line:nth-of-type(2) {
		transform: translate3d(0, 8px, 0) rotate(0);
	}

	#btnMenu:hover .c-btnMenu_front .line:nth-of-type(1) {
		transform: translateY(-15px) rotate(90deg);
	}

	#btnMenu:hover .c-btnMenu_front .line:nth-of-type(2) {
		transform: translateY(15px) rotate(-180deg);
	}

	.o-menu {
		position: fixed;
		top: 0;
		right: 0;
		z-index: 110;
		width: 533px;
		height: 533px;
		border-radius: 0 0 0% 90%;
		pointer-events: none;
		user-select: none;
		opacity: 1;
		background-color: #fff4eb;
	}

	/* o-menu漢堡底*/
	.o-menu {
		width: 198px;
		height: 184px;
	}

	/*點擊動畫*/
	.o-menu_bg {
		pointer-events: none;
		user-select: none;
		position: absolute;
		top: 26px;
		right: 26px;
		width: 68px;
		height: 68px;
		border-radius: 50%;
	}

	/*子選單設定*/
	* {
		list-style: none;
		text-decoration: none;
	}

	h3 {
		width: 96px;
		font-size: 24px;
		line-height: 100%;
		margin: 0;
		text-align: center;
		color: #7a625b;
		font-weight: bold;
	}

	p {
		width: 96px;
		font-size: 16px;
		line-height: 100%;
		margin: 0;
		color: #7a625b;
		text-align: center;
		margin-top: 2px;

		@include breakpoint(430px) {
			font-size: 16px;
		}

		@include breakpoint(390px) {
			font-size: 16px;
		}
	}

	.menulist {
		position: relative;
		/*平常隱藏------------------------點擊打開*/
	}

	.menu_list .menu_list_food {
		position: absolute;
		top: 0px;
		right: 348px;
		z-index: 120;

		@include breakpoint(430px) {
			top: -25px;
		}

		@include breakpoint(390px) {
			top: 5px;
			left: -4vw;
		}

		h3 {
			@include breakpoint(430px) {
				font-size: 16px;
			}

			@include breakpoint(390px) {
				font-size: 16px;
			}
		}
	}

	.menu_list .menu_list_recommend {
		position: absolute;
		top: 90px;
		right: 308px;
		z-index: 120;

		@include breakpoint(430px) {
			top: 36px;
		}

		@include breakpoint(390px) {
			top: 64px;
		}

		h3 {
			@include breakpoint(430px) {
				font-size: 16px;
			}

			@include breakpoint(390px) {
				font-size: 16px;
			}
		}
	}

	.menu_list .menu_list_ticket {
		position: absolute;
		top: 180px;
		right: 245px;
		z-index: 120;

		@include breakpoint(430px) {
			top: 100px;
			right: 265px;
		}

		@include breakpoint(390px) {
			top: 123px;
			right: 265px;
		}

		h3 {
			@include breakpoint(430px) {
				font-size: 16px;
			}

			@include breakpoint(390px) {
				font-size: 16px;
			}
		}
	}

	.menu_list .menu_list_user {
		position: absolute;
		top: 265px;
		right: 158px;
		z-index: 120;

		@include breakpoint(430px) {
			top: 162px;
			right: 215px;
		}

		@include breakpoint(390px) {
			top: 186px;
			right: 215px;
		}

		h3 {
			@include breakpoint(430px) {
				font-size: 16px;
			}

			@include breakpoint(390px) {
				font-size: 16px;
			}
		}
	}

	.menu_list .menu_list_shoppingcart {
		position: absolute;
		top: 330px;
		right: 52px;
		z-index: 120;

		@include breakpoint(430px) {
			top: 220px;
			right: 149px;
		}

		@include breakpoint(390px) {
			top: 236px;
			right: 149px;
		}

		h3 {
			@include breakpoint(430px) {
				font-size: 16px;
			}

			@include breakpoint(390px) {
				font-size: 16px;
			}
		}
	}

	.o-menu_bg .circle {
		position: absolute;
		top: -350px;
		right: -330px;
		transform-origin: right;
		z-index: 102;
		width: 780px;
		height: 770px;
		border-radius: 50%;
		background-color: #fff4eb;
		transition: 0.6s 0.2s cubic-bezier(0.16, 1, 0.3, 1) transform;

		@include breakpoint(430px) {
			top: -368px;
			right: -374px;
			width: 657px;
			height: 672px;
		}

		@include breakpoint(390px) {
			top: -386px;
			right: -394px;
			width: 657px;
			height: 672px;
		}
	}

	.o-menu_bg .circle.show {
		transform: scale(10);
		transition: transform 1.5s ease-in-out;
	}

	.o-menu.show {
		opacity: 1;
		pointer-events: auto;
		user-select: auto;
	}

	.o-menulist.show {
		display: block;
	}

	/* 未點擊前菜單預設隐藏 */
	#menulist {
		transform: scale(0);
		width: 400px;
		position: fixed;
		top: 0;
		right: 0;
		display: block;
		transition: all 0.9s ease-in;
		transform-origin: 100% 0;
	}

	/* 切換時動畫 */
	#menulist.show {
		transform: scale(1);
		transition: all 0.9s ease-in;
	}

	/* 菜單顯示時過度 */
	.transformed {
		transform: scale(1.2);
	}

	/* 隱藏Close */
	#Close {
		display: none;
	}

	/* 顯示Close */

	/*線調整，漢堡線初始状态*/
	.c-btnMenu_front .line {
		position: absolute;
		inset: 0;
		margin: 0 auto;
		z-index: 100;
		top: 50%;
		width: 28px;
		height: 4px;
		background: #7a625b;
		transition: transform 0.5s, opacity 0.5s;
	}

	/* 漢堡打開時 .line 元素的旋轉 */
	.c-btnMenu_front.show .line:nth-of-type(1) {
		transform: translateY(-16px) rotate(20deg);
	}

	.c-btnMenu_front.show .line:nth-of-type(2) {
		transform: translateY(15px) rotate(-20deg);
	}

	.c-btnMenu_front .show:hover .c-btnMenu_front .line:nth-of-type(1) {
		transform: translateY(-15px) rotate(40deg);
	}

	.c-btnMenu_front .show:hover .c-btnMenu_front .line:nth-of-type(2) {
		transform: translateY(15px) rotate(-42deg);
	}

	/*logo*/
	nav a img {
		width: 100px;
		height: 70px;
		position: fixed;
		z-index: 120;
		top: 32px;
		left: 40px;

		@include breakpoint(430px) {
			width: 59px;
			height: 70px;
			top: 7px;
			left: 19px;
		}

		@include breakpoint(390px) {
			width: 59px;
			height: 70px;
			top: 7px;
			left: 19px;
		}
	}
</style>
