<script>
	import { RouterLink } from "vue-router";
	import restaurantaMessage from "../components/restaurantaMessage.vue";

	export default {

		components:{restaurantaMessage: restaurantaMessage},

		data() {
			return {
				fullStar: new URL(
					"@/assets/Image/review/sinsinFull.png",
					import.meta.url
				).href,
				nullStar: new URL(
					"@/assets/Image/review/sinsinNull.png",
					import.meta.url
				).href,
				fullStarSrc: new URL(
					"@/assets/Image/review/fullstar.png",
					import.meta.url
				).href,
				emptyStarSrc: new URL(
					"@/assets/Image/review/nullstar.png",
					import.meta.url
				).href,
				like: new URL("@/assets/Image/review/like.png", import.meta.url)
					.href,
				liked: new URL(
					"@/assets/Image/review/liked.png",
					import.meta.url
				).href,
				items: [],
				score: [],
				isLike: false,
				selected: "rLIKE",
				isReversed: false,
				popup_open: false,
				picSrc: '',
				openPic: false,
			};
		},

		methods: {
			getCookie(id) {
				let value = "; " + document.cookie;
				let parts = value.split("; " + id + "=");
				if (parts.length === 2) return parts.pop().split(";").shift();
				return null;
			},
			async fetchReviews() {
				try {
					const memberId = this.getCookie("memberId");
					const response = await fetch(
						// "http://localhost/tid101_g1/public/php/review/reviews.php?shop=1"
						`${
							import.meta.env.VITE_PHP_PATH
						}review/reviews.php?shop=1`
					);
					const reviewData = await response.json();
					console.log(reviewData);
					this.items = reviewData.map((item) => ({
						...item,
						isLike: false,
						isLikedByUser: item.LIKE_MEMBERS.includes(
							parseInt(memberId)
						),
					}));
					console.log(reviewData);
				} catch (error) {
					console.error("Error fetching shops:", error);
				}
			},
			formatDate(datetime) {
				const date = new Date(datetime);
				const year = date.getFullYear();
				const month = String(date.getMonth() + 1).padStart(2, "0"); // 月份從0開始,所以+1
				const day = String(date.getDate()).padStart(2, "0");
				const hours = String(date.getHours()).padStart(2, "0");
				const minutes = String(date.getMinutes()).padStart(2, "0");
				return `${year}-${month}-${day} ${hours}:${minutes}`;
			},
			async toggleLike(itemId, currentLikes) {
				const memberId = this.getCookie("memberId");
				if (memberId == null) {
					alert("請先登入");
				} else {
					try {
						const response = await fetch(
							// "http://localhost/tid101_g1/public/php/review/toggleLike.php",
							`${
								import.meta.env.VITE_PHP_PATH
							}review/toggleLike.php`,

							{
								method: "POST",
								headers: {
									"Content-Type": "application/json",
								},
								body: JSON.stringify({
									itemId,
									memberId: parseInt(memberId),
								}),
							}
						);
						const data = await response.json();
						if (data.success) {
							this.items.forEach((item) => {
								if (item.ID === itemId) {
									if (data.newLikes === 1) {
										item.rLIKE += 1;
										item.isLike = true;
										item.isLikedByUser = true;
									} else {
										item.rLIKE -= 1;
										item.isLike = false;
										item.isLikedByUser = false;
									}
								}
								this.isLike = !this.isLike;
							});
						} else {
							console.error("Failed to toggle like");
						}
					} catch (error) {
						console.error("Error toggle like:", error);
					}
				}
			},
			async fetchScore() {
				try {
					const response = await fetch(
						// "http://localhost/tid101_g1/public/php/review/score.php?shop=1"
						`${
							import.meta.env.VITE_PHP_PATH
						}review/score.php?shop=1`
					);
					const reviewData = await response.json();
					this.score = reviewData;
					console.log(reviewData);
				} catch (error) {
					console.error("Error fetching shops:", error);
				}
			},
			unsort() {
				this.isReversed = !this.isReversed;
			},
			msgShow() {
				this.popup_open = true;
			},
			popup_close() {
				this.popup_open = false;
			},
			picShow() {
				this.picSrc = photo;
				this.openPic = true;
			},
			clearPic() {
				this.picSrc = '';
				this.openPic = false;
			}
		},

		mounted() {
			this.fetchReviews();
			this.fetchScore();
		},

		computed: {
			sortedItems() {
				let sorted = [];

				if (this.selected === "rLIKE") {
					sorted = this.items
						.slice()
						.sort((a, b) => b.rLIKE - a.rLIKE);
				} else if (this.selected === "TIME") {
					sorted = this.items
						.slice()
						.sort((a, b) => new Date(b.TIME) - new Date(a.TIME));
				} else if (this.selected === "STAR") {
					sorted = this.items.slice().sort((a, b) => b.STAR - a.STAR);
				} else {
					sorted = this.items.slice();
				}

				if (this.isReversed) {
					return sorted.reverse();
				} else {
					return sorted;
				}
			},
			
		},
	};
</script>

<template>
	<div class="review_body">
		<div class="review_sidebar">
			<img
				class="storeimg"
				src="../assets/Image/restaurant/north/logo.svg"
				alt="logo"
			/>
			<div class="column">
				<h2>高麗味</h2>
				<h6>고려미</h6>
			</div>
			<span class="review_star">
				<div class="star">{{ score.AVG }}</div>
				<img
					class="review_starimg"
					src="../assets/Image/restaurant/star.png"
					alt="star"
				/>
			</span>
			<ul class="list">
				<li>- 前言</li>
				<li>- 店家資訊</li>
				<li>- 特色介紹</li>
				<li>- 評論區</li>
			</ul>
		</div>

		<div class="review_content">
			<div class="breadcrumb">
				<h6>
					<router-link to="/home">首頁</router-link>
				</h6>
				<span>&gt;</span>
				<h6>
					<router-link to="/map">商店列表</router-link>
				</h6>
				<span>&gt;</span>
				<h6>
					<router-link to="/restaurant">高麗味</router-link>
				</h6>
				<span>&gt;</span>
				<h6>
					<router-link to="/review">評論區</router-link>
				</h6>
			</div>
			<div class="review_score">
				<div class="score_leftside">
					<div class="star_distribute">
						<h3>評論摘要</h3>
						<ul>
							<li>
								<h3>5</h3>
								<div class="scoreline s_5"></div>
							</li>
							<li>
								<h3>4</h3>
								<div class="scoreline s_4"></div>
							</li>
							<li>
								<h3>3</h3>
								<div class="scoreline s_3"></div>
							</li>
							<li>
								<h3>2</h3>
								<div class="scoreline s_2"></div>
							</li>
							<li>
								<h3>1</h3>
								<div class="scoreline s_1"></div>
							</li>
						</ul>
					</div>
				</div>
				<div class="score_middleside">
					<h1>{{ score.AVG }}</h1>
					<div class="scoreSin">
						<img
							v-for="n in 5"
							:key="n"
							:src="n <= score.AVG ? fullStar : nullStar"
							alt="Star"
						/>
					</div>
					<h4>{{ score.num }}則評論</h4>
				</div>
				<div class="score_rightside">
					<h4>立即分享你的用餐體驗 !</h4>
					<div class="writeBtn" @click="msgShow">
						<h3>撰寫評論</h3>
						<img src="/src/assets/Image/review/pen.png" alt="">
					</div>
				</div>
			</div>
			<hr />
			<div class="msg">
				<restaurantaMessage 
				:popup_open="popup_open"
				@close-popup="popup_close"></restaurantaMessage>
			</div>
			<div class="reviews">
				<div class="review_btns">
					<div class="sequence">
						<select v-model="selected">
							<option value="rLIKE">依熱門</option>
							<option value="TIME">依時間</option>
							<option value="STAR">依星數</option>
						</select>
					</div>
					<div class="inTurn" @click="unsort">
						<img src="/src/assets/Image/review/inTurn.png" alt="" />
					</div>
				</div>
				<ul class="review_cards">
					<li
						v-for="(item, index) in sortedItems"
						:key="item.ID"
						:item="item"
					>
						<div class="member_info">
							<div class="avatar">
								<img :src="item.AVATAR" alt="" />
							</div>
							<div class="textinfo">
								<div class="name_like">
									<h3>{{ item.NAME }}</h3>
									<div
										:class="['like', { liked: isLike }]"
										@click="toggleLike(item.ID, item.rLIKE)"
									>
										<img
											:src="
												item.isLikedByUser
													? liked
													: like
											"
											alt=""
										/>
										<h4
											:style="{
												color: item.isLikedByUser
													? '#CB4847'
													: '#999999',
											}"
										>
											{{ item.rLIKE }}
										</h4>
									</div>
								</div>
								<div class="star_time">
									<div class="stars">
										<img
											v-for="n in 5"
											:key="n"
											:src="
												n <= item.STAR
													? fullStarSrc
													: emptyStarSrc
											"
											alt="Star"
										/>
									</div>
									<div class="time">
										<h5>{{ formatDate(item.TIME) }}</h5>
									</div>
								</div>
							</div>
						</div>
						<h5>
							{{ item.CONTENT }}
						</h5>
						<div class="photos">
							<img
								v-for="(photo, index) in item.PHOTOS"
								:key="index"
								:src="photo"
								@click="picShow"
							/>
						</div>
					</li>
				</ul>
				<div :class="[picFilter, {picOpen : openPic}]" @click="clearPic">
					<img :src="picSrc" alt="">
				</div>
				<!-- <button class="readmore">
                    <h3>READ MORE</h3>
                </button> -->
			</div>
		</div>
	</div>
</template>

<style lang="scss" scoped>
	@import "/src/sass/style.scss";

	@mixin breakpoint($point) {
		@media screen and (max-width: $point) {
			@content;
		}
	}

	.review_body {
		background-color: $OffWhite;
		width: 100%;
		display: flex;
		@include breakpoint(615px) {
			flex-direction: column;
		}
	}

	.review_sidebar {
		background-color: #fff;
		width: 17vw;

		@include breakpoint(615px) {
			background-color: #f6f1ed;
			width: auto;
			margin-top: 30%;
			// position: absolute;
			// z-index: 1;
		}

		.storeimg {
			padding-top: 212px;
			width: 80px;
			height: 80px;
			margin: 0 auto;
			display: block;

			@include breakpoint(615px) {
				display: none;
			}
		}

		.column {
			display: flex;
			width: fit-content;
			margin: 0 auto;

			@include breakpoint(615px) {
				// position: absolute;
				// top: 31vw;
				// left: 35vw;
				width: 43vw;
				display: flex;
				flex-direction: column;
				
			}

			h2 {
				-webkit-writing-mode: vertical-lr;
				writing-mode: vertical-lr;
				margin-top: 16px;

				@include breakpoint(1280px) {
					margin-left: 2vw;
				}

				@include breakpoint(820px) {
					font-size: 34px;
				}

				@include breakpoint(615px) {
					-webkit-writing-mode: unset;
					writing-mode: unset;
					font-weight: 800;
					margin: 0 auto;
				}
			}

			h6 {
				-webkit-writing-mode: vertical-lr;
				writing-mode: vertical-lr;
				margin-top: 16px;
				margin-left: 8px;

				@include breakpoint(615px) {
					-webkit-writing-mode: unset;
					writing-mode: unset;
					font-weight: 800;
					margin:0 auto;
				}
			}
		}

		.review_star {
			background-color: #7a625b;
			display: flex;
			width: 83px;
			height: 30px;
			border-radius: 50px;
			margin: 0 auto;
			margin-top: 26px;

			@include breakpoint(615px) {
				display: none;
			}

			.star {
				font-size: 20px;
				color: #dbcec6;
				margin: 5px 41px 5px 12px;

				@include breakpoint(1024px) {
					padding-left: 8px;
				}
			}

			.review_starimg {
				width: 20px;
				height: 20px;
				margin: 5px 12px 5px -35px;
			}
		}

		.list {
			width: 93px;
			height: 168px;
			margin: 0 auto;
			margin-top: 26px;

			@include breakpoint(1280px) {
				width: 76px;
			}

			@include breakpoint(615px) {
				display: none;
			}

			li {
				margin-top: 16px;

				@include breakpoint(1024px) {
					width: 12vw;
				}
			}
		}
	}

	.review_content {
		// outline: 1px solid blue;
		width: 100%;
		margin: 20px;
		@include breakpoint(1024px) {
			margin: 5px;
		}

		.breadcrumb {
			margin-top: 20px;
			margin-bottom: 40px;
			margin-left: 64px;
			@include breakpoint(615px) {
				display: none;
			}
		}

		.breadcrumb h6 {
			display: inline;
			margin-right: 8px;
		}

		.breadcrumb h6 a {
			text-decoration: none;
			color: #333333;
		}

		.breadcrumb h6 a:hover {
			color: #666666;
		}

		.breadcrumb span {
			margin-right: 8px;
			margin-top: 3px;
		}

		.review_score {
			display: flex;
			justify-content: space-between;
			// outline: 1px red solid;
			margin: 20px;
			width: 100%;
			padding: 0 44px;
			padding-bottom: 38px;
			// border-bottom: 2px solid $DarkBrown;
			@include breakpoint(890px) {
				flex-direction: column;
				margin: 0;
			}
			

			.score_leftside {
				
				width: 25%;
				margin: 0 auto;
				// outline: 1px solid green;
				@include breakpoint(1133px) {
					width: 220px;
				}
				@include breakpoint(890px) {
					order: 2;
					margin-bottom: 30px;
				}

				.star_distribute {
					& > h3 {
						margin-bottom: 12px;

						@include breakpoint(1024px) {
							font-size: 24px;
						}

						@include breakpoint(820px) {
							font-size: 22px;
						}
					}

					& li {
						margin-bottom: 12px;
						display: flex;
						align-items: center;

						h3 {
							margin-right: 16px;

							@include breakpoint(1024px) {
								font-size: 20px;
							}
						}

						.scoreline {
							width: 100%;
							height: 20px;
							background-color: $DarkBrown;
							border-radius: 10px;
							position: relative;

							&::after {
								content: "";
								height: 100%;
								border-radius: 10px;
								background-color: $LightBrown;
								position: absolute;
							}
						}

						.s_5::after {
							width: 66%;
						}

						.s_4::after {
							width: 17%;
						}

						.s_3::after {
							width: 17%;
						}

						.s_2::after {
							width: 0%;
						}

						.s_1::after {
							width: 0%;
						}
					}
				}
			}

			.score_middleside {
				margin: 0 auto;
				width: 25%;
				// outline: 1px solid green;
				padding-top: 40px;

				@include breakpoint(1028px) {
					width: 200px;
				}
				@include breakpoint(890px) {
					order: 1;
					margin-bottom: 30px;
				}

				h1 {
					font-weight: normal;
					text-align: center;
					font-size: 100px;
					margin-bottom: 12px;
					background: $RevGoldGrad;
					background-clip: text;
					-webkit-text-fill-color: transparent;
				}

				.scoreSin {
					display: flex;
					justify-content: space-around;
					width: 80%;
					margin: 0 auto;
				}

				img {
					// outline: 1px red solid;
					display: inline-block;
					width: 20px;
					height: 20px;
					margin: 0 auto;
					margin-bottom: 12px;
				}

				h4 {
					text-align: center;
					font-weight: bold;
					color: $DarkBrown;
				}
			}

			.score_rightside {
				margin: 0 auto;
				width: 25%;
				// outline: 1px solid green;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				@include breakpoint(890px) {
					order: 3;
				}

				h4 {
					margin-bottom: 20px;

					@include breakpoint(1028px) {
						width: 24vw;
					}

					@include breakpoint(890px) {
						width: 214px;
						margin-left: 0;
						margin-bottom: 12px;
					}
				}
				.writeBtn{
					width: 221px;
					height: 60px;
					background-color: #C8AC96;
					border-radius: 12px;
					cursor: pointer;
					display: flex;
					justify-content: center;
					align-items: center;	

					h3{
						color: $OffWhite;
					}


					img {
					display: block;
					width: 26px;
					height: 26px;
				}
				}
				
			}
		}

		hr {
			height: 1px;
			width: 100%;
			color: $DarkBrown;
			background-color: $DarkBrown;
			border: 3px solid $DarkBrown;
		}

		.msg{
			position: fixed;
			width: 100%;
			height: 0;
			top: 0;
			left: 0;
			z-index: 10;
		}

		.reviews {
			// outline: 1px red solid;
			padding: 20px;

			@include breakpoint(1024px) {
				padding: 0;
			}

			.review_btns {
				display: flex;
				margin-bottom: 30px;
				width: 200px;
				@include breakpoint(890px) {
					margin: 0 auto;
					margin-bottom: 30px;
				}

				.sequence {
					width: 124px;
					height: 36px;
					display: flex;
					align-items: center;
					justify-content: space-around;
					background-color: #fff;
					color: $DarkBrown;
					margin-right: 16px;

					& select {
						width: 100%;
						height: 100%;
						padding: 0 5px;
					}
				}

				.inTurn {
					background-color: #fff;
					width: 36px;
					height: 36px;
					display: flex;
					align-items: center;
					justify-content: center;
					cursor: pointer;
				}
			}

			.review_cards {
				// outline: 1px green solid;
				display: flex;
				justify-content: space-between;
				width: 98%;
				flex-wrap: wrap;
				margin-bottom: 24px;
				@include breakpoint(860px) {
					display: block
				}

				li {
					// outline: 1px blue solid;
					width: 48%;
					padding: 28px;
					background-color: #fffefe;
					margin-bottom: 24px;
					filter: drop-shadow(0 0 7px rgba(207, 81, 61, 0.4));

					@include breakpoint(1024px) {
						padding: 12px;
					}
					@include breakpoint(860px) {
						margin: 0 auto;
						margin-bottom: 10px;
						width: 340px;
					}
					

					h5 {
						// @include breakpoint(1280px) {
						// 	width: 88%;
						// 	margin-bottom: 20px;
						// }

						@include breakpoint(1024px) {
							margin-top: 0.4vw;
							margin-bottom: 0px;
						}

						@include breakpoint(820px) {
							width: 86%;
						}
					}

					.member_info {
						display: flex;
						// outline: 1px yellow solid;
						margin-bottom: 20px;

						.avatar {
							& > img {
								width: 80px;
								height: 80px;
								border-radius: 50%;
								object-fit: cover;
								margin-right: 16px;
							}
						}

						.textinfo {
							display: flex;
							flex-direction: column;
							justify-content: space-around;
							// outline: 1px green solid;
							width: 100%;

							.name_like {
								// outline: 1px blue solid;
								display: flex;
								justify-content: space-between;
								width: 100%;

								@include breakpoint(1280px) {
									width: 90%;
								}

								@include breakpoint(1145px) {
									width: 90%;
								}

								@include breakpoint(1028px) {
									width: 100%;
								}

								h3 {
									// outline: 1px red solid;
									font-weight: bold;
									color: $DarkBrown;
									letter-spacing: 2px;

									@include breakpoint(1024px) {
										font-size: 20px;
									}
								}

								.like {
									// outline: 1px red solid;
									display: flex;
									align-items: center;
									cursor: pointer;

									img {
										margin-right: 4px;
									}

									h4 {
										color: #999999;
									}
								}

								& .liked {
									img {
										margin-right: 4px;
									}

									h4 {
										color: $Red;
									}
								}
							}

							.star_time {
								display: flex;

								@include breakpoint(1200px) {
									display: block;
								}

								.stars {
									display: flex;
									margin-right: 28px;
									color: #999999;

									& > img {
										margin-right: 4px;
										width: 24px;
										height: 24px;
									}
									@include breakpoint(1200px) {
										margin-bottom: 4px;
									}
									@include breakpoint(890px) {
										width: 150px;
									}
								}

							}
						}
					}

					& > h5 {
						width: 80%;
						margin-bottom: 20px;

						@include breakpoint(1280px) {
							margin-bottom: 20px;
						}
					}

					.photos {
						display: flex;
						flex-wrap: wrap;
						width: 100%;
						// margin: 0 auto;

						img {
							display: block;
							width: 148px;
							height: 100px;
							object-fit: cover;
							margin-right: 20px;
							margin-bottom: 20px;
						    filter: drop-shadow(0 0 7px rgba(207, 81, 61, 0.4));

							@include breakpoint(1050px) {
								margin-right: 10px;
								margin-bottom: 10px;
							}
						}
					}
				}
			}

			.readmore {
				margin: 0 auto;
				width: 248px;
				height: 64px;
				border-radius: 20px;
				background-color: #cb4847;
				display: flex;
				align-items: center;
				justify-content: center;

				h3 {
					color: #ffffff;
					list-style: none;
				}
			}
		}
	}

	.picFilter{
		display: none;
	}
	
	.reviews .picOpen{
		width: 100vw;
        height: 100vh;
        background-color: #333333;
        opacity: 0.8;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 15;
		img{
			margin: 0 auto;
			margin-top: 30%;
			display: block;
			width: 380px;
		}
	}
</style>
