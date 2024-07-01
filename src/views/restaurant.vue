<template>
	<div class="restaurant_wrapper">
		<!--店家測軸-->
		<div class="restaurant_sidebar">
			<img
				class="storeimg"
				src="../assets/Image/restaurant/north/logo.svg"
				alt="logo"
			/>
			<div class="column">
				<h2>高麗味</h2>
				<h6>고려미</h6>
			</div>
			<span class="restaurant_star">
				<div class="star">{{ score.AVG }}</div>
				<img
					class="restaurant_starimg"
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
		<div class="restaurant_content">
			<img
				class="Banner"
				src="../assets/Image/restaurant/north/storebanner.jpg"
				alt="banner"
			/>
			<img
				class="Banner430"
				src="../assets/Image/restaurant/north/storebannerRWD.jpg"
				alt=""
			/>
			<!--banner-->
			<div class="restaurant_breadcrumb">
				<!---麵包屑-->
				<ol class="breadcrumb">
					<li class="crumb1">
						<router-link to="/home">首頁</router-link>
						<img
							src="/src/assets/Image/restaurant/north/left.png"
							alt=""
						/>
					</li>
					<li class="crumb2">
						<router-link to="/map">商店列表</router-link>
						<img
							src="/src/assets/Image/restaurant/north/left.png"
							alt=""
						/>
					</li>
					<li class="crumb3">
						<a href="#">高麗味</a>
					</li>
				</ol>

				<!--收藏按鈕-->
				<ol class="restaurant_btns">
					<li>
						<button
							@click="handleCollect"
							:class="[
								'collect',
								{
									collected: isCollected,
									'prompt-active': showPrompt,
								},
							]"
						>
							<img
								class="collect_img"
								src="../assets/Image/restaurant/north/collect.svg"
								alt="collect"
							/>
						</button>
					</li>

					<button>
						<li class="share">
							<!--分享 連接fb訊息-->
							<a
								href="javascript: void(window.open('https://lineit.line.me/share/ui?url=' .concat(encodeURIComponent(location.href)) ));"
								title="分享給 LINE 好友"
							>
								<img
									alt="分享梨花殿給LINE好友 !"
									height="44"
									src="../assets/Image/restaurant/north/share.svg"
									width="44"
								/>
							</a>
						</li>
					</button>
					<!--寫留言按鈕-->
					<li class="message" :class="{ active: popup_open }">
						<button
							@click="pop"
							:class="[
								'message',
								{
									messaged: popup_open,
									'message-active': showPrompt2,
								},
							]"
						>
							<div class="icon_bg">
								<img
									class="restaurantstarimg"
									src="../assets/Image/restaurant/north/message.svg"
									alt="message"
								/>
							</div>
						</button>
					</li>

					<!-- 提示框 -留言收藏共用-->
					<div v-if="showPrompt" class="collect-prompt">
						<p class="collect-prompt_p">請先登入會員</p>
						<button
							class="collect-prompt_button"
							@click="redirectToLogin"
						>
							確認
						</button>
						<button
							class="collect-prompt_button"
							@click="browseAsGuest"
						>
							以訪客身分瀏覽
						</button>
					</div>

					<div v-if="showPrompt2" class="collect-prompt">
						<p class="collect-prompt_p">請先登入會員</p>
						<button
							class="collect-prompt_button"
							@click="redirectToLogin"
						>
							確認
						</button>
						<button
							class="collect-prompt_button"
							@click="browseAsGuest"
						>
							以訪客身分瀏覽
						</button>
					</div>
				</ol>
			</div>

			<header class="restaurant_header">
				<h2 class="restaurant_slogan">
					“ 品味正宗韓國美味！<br />來，一起享受美食之旅！”
				</h2>
				<h4>
					歡迎光臨！高麗味是一家由韓國人親自經營的韓國餐廳，致力於將最正統的韓國風味從韓國帶到台灣。<br /><br />我們的廚師們擁有精湛的手藝，將傳統的韓國料理製作得口感鮮美、味道道地。無論是韓式烤肉、泡菜、大醬湯還是韓式炸雞，每道菜都是我們對傳統飲食文化的真摯致敬。<br /><br />無論您是想要品嚐道地的韓國美食，還是尋找一個溫馨舒適的用餐環境，我們都竭誠歡迎您的光臨。讓高麗味成為您感受韓國風情的第一選擇！
				</h4>
			</header>

			<!--店家資訊-->
			<section class="restaurant_section">
				<div class="restaurant_h3">
					<h3>店 家 資 訊</h3>
				</div>
				<div class="restaurant_mapinfo">
					<div class="restaurant_info">
						<table class="info">
							<tr>
								<th>店名</th>
								<td>高麗味 天母店</td>
							</tr>
							<tr>
								<th>地址</th>
								<td>111 台北市士林區忠誠路二段152號</td>
							</tr>
							<tr>
								<th>聯絡電話</th>
								<td>02-2873-6995</td>
							</tr>
							<tr>
								<th>平均消費</th>
								<td>NT$300</td>
							</tr>
							<tr>
								<th>營業時間</th>
								<td>11:30-14:00 / 17:00-22:00</td>
							</tr>
						</table>
						<div class="restaurant_media">
							<div class="restaurant_fb">
								<img
									src="../assets/Image/restaurant/FB.png"
									alt="fb"
								/>
								<h4>高麗味 • 韓之味小吃店</h4>
							</div>
							<div class="restaurant_ig">
								<img
									src="../assets/Image/restaurant/ig.png"
									alt="ig"
								/>
								<h4>@KoreawayBBQ</h4>
							</div>
							<div class="line"></div>
						</div>
					</div>
					<!---google map-->
					<div class="map">
						<iframe
							src="https://map.google.com?output=embed&q=高麗味"
							width="500px"
							height="300px"
							frameborder="0"
							id="google_map"
						>
						</iframe>
					</div>
				</div>
			</section>
			<main class="restaurant_mainContent">
				<div class="restaurant_content1">
					<h4>
						高麗味的生醃螃蟹，在醃製過程中以醬汁和<br />調味料醃製，保留了螃蟹原始鮮味，同時帶<br />來了濃郁的醬汁風味。我們以大蒜、辣椒醬<br />和其他調味料入味，口感香辣鮮美。作為小<br />菜（반찬）或配菜，搭配米飯和其他主食一<br />同享用，為餐桌增添了豐富的風味和營養。
					</h4>
					<img
						src="../assets/Image/restaurant/north/crab.png"
						alt="crab"
					/>
				</div>
				<div class="restaurant_content2">
					<img
						src="../assets/Image/restaurant/north/chicken.png"
						alt="chicken"
					/>
					<h4>
						韓國炸雞，被譽為「黃金雞」，是韓國料理<br />中的經典美食。高麗味的炸雞，外皮酥脆、<br />內裡多汁，口感極佳。經過特殊調味和炸製<br />技術，使得炸雞的風味豐富多樣。我們特別<br />選用雞腿肉，肉質鮮嫩多汁，常搭配韓式泡<br />菜和啤酒，是韓國人非常喜愛的下酒菜。
					</h4>
				</div>
				<div class="restaurant_content3">
					<h4>
						高麗味的牛肉湯，加入蔬菜和牛肉片，燉煮<br />成濃郁湯品。湯頭澄清鮮美，牛肉軟嫩入<br />味。搭配白飯和泡菜，營養豐富，口感溫<br />暖。不論是冬天進補，或是想要來一碗熱<br />湯，牛肉湯都是非常受歡迎的料理選項。
					</h4>
					<img
						src="../assets/Image/restaurant/north/soup.png"
						alt="soup"
					/>
				</div>
			</main>

			<!---評論區-->
			<section class="restaurant">
				<div class="restaurant_review">
					<div class="restaurant_review_content">
						<div class="restaurant_review_title">
							<h3>評論區</h3>
							<span>
								<img
									class="restaurantstarimg"
									src="../assets/Image/restaurant/star.png"
									alt="star"
								/>
								<h4 class="restaurant_rating">
									{{ score.AVG }}
								</h4>
								<h4 class="restaurant_review_num">
									({{ score.num }}則評論)
								</h4>
							</span>
						</div>

						<button @click="pop()">
							<div class="icon_bg" @click="popup_open = true">
								<img
									class="restaurantstarimg"
									src="../assets/Image/restaurant/north/message.svg"
									alt="message"
								/>
							</div>
						</button>

						<button @click="popup_open = true"></button>
						<div id="pop" :class="{ active: popup_open }">
							<div class="concent_one" v-if="popup_open">
								<div class="starbars">
									<h4 class="starbar_store">整體評價</h4>
									<div id="stars" class="left">
										<!--星級test-->
										<img
											src="/src/assets/Image/restaurant/north/pentagram.png"
											alt=""
											v-if="rating >= 1"
											@click="change_rating(0)"
										/>
										<img
											src="/src/assets/Image/restaurant/north/empty_pentagram.png"
											alt=""
											v-else
											@click="change_rating(1)"
										/>
										<img
											src="/src/assets/Image/restaurant/north/pentagram.png"
											alt=""
											v-if="rating >= 2"
											@click="change_rating(1)"
										/>
										<img
											src="/src/assets/Image/restaurant/north/empty_pentagram.png"
											alt=""
											v-else
											@click="change_rating(2)"
										/>
										<img
											src="/src/assets/Image/restaurant/north/pentagram.png"
											alt=""
											v-if="rating >= 3"
											@click="change_rating(2)"
										/>
										<img
											src="/src/assets/Image/restaurant/north/empty_pentagram.png"
											alt=""
											v-else
											@click="change_rating(3)"
										/>
										<img
											src="/src/assets/Image/restaurant/north/pentagram.png"
											alt=""
											v-if="rating >= 4"
											@click="change_rating(3)"
										/>
										<img
											src="/src/assets/Image/restaurant/north/empty_pentagram.png"
											alt=""
											v-else
											@click="change_rating(4)"
										/>
										<img
											src="/src/assets/Image/restaurant/north/pentagram.png"
											alt=""
											v-if="rating >= 5"
											@click="change_rating(4)"
										/>
										<img
											src="/src/assets/Image/restaurant/north/empty_pentagram.png"
											alt=""
											v-else
											@click="change_rating(5)"
										/>
										<span
											v-text="rating_text[rating]"
										></span>
									</div>
									<div id="comment" class="left"></div>
								</div>

								<p class="masg">
									根據你的體驗，整體而言你會給該店家幾顆星？
								</p>
								<div class="line"></div>
								<h4 class="experience">體驗心得</h4>
								<h5 class="text_1">
									<textarea
										class="text_concent"
										name="text_concent"
										placeholder="大家都想聽聽你的感想，給還沒去過的人一個參考吧！"
										v-model="content"
									></textarea>
								</h5>
								<p class="text_words">字元數限制 0/100 字</p>
							</div>

							<div class="share">
								<h4 class="share_photo">分享照片</h4>
								<p class="share_six">(至多6張)</p>
							</div>

							<!--照片動態-->
							<div class="concent_two">
								<div class="box1">
									<div class="add">+</div>
									<input
										type="file"
										@change="fileChange($event, 1)"
									/>
								</div>
								<div class="box2">
									<div class="add">+</div>
									<input
										type="file"
										@change="fileChange($event, 2)"
									/>
								</div>
								<div class="box3">
									<div class="add">+</div>
									<input
										type="file"
										@change="fileChange($event, 3)"
									/>
								</div>
								<div class="box4">
									<div class="add">+</div>
									<input
										type="file"
										@change="fileChange($event, 4)"
									/>
								</div>
								<div class="box5">
									<div class="add">+</div>
									<input
										type="file"
										@change="fileChange($event, 5)"
									/>
								</div>
								<div class="box6">
									<div class="add">+</div>
									<input
										type="file"
										@change="fileChange($event, 6)"
									/>
								</div>
							</div>
							<div class="buttons">
								<button class="cancel" @click="popup_close()">
									<h4>取消</h4>
								</button>
								<button class="sendout" @click="submitFile()">
									<h4>送出</h4>
								</button>
							</div>
						</div>
					</div>

					<!---評論卡片區，卡片1-->
					<ul class="customer_review">
						<li
							v-for="(item, index) in items.slice(0, 3)"
							:key="item.ID"
							:item="item"
						>
							<div class="namenlike">
								<span>
									<img
										class="user"
										:src="item.AVATAR"
										alt="user"
									/>
									<h4 class="restaurant_username">
										{{ item.NAME }}
									</h4>
								</span>
								<span
									:class="['like', { liked: isLike }]"
									@click="toggleLike(item.ID, item.rLIKE)"
								>
									<img
										:src="item.isLikedByUser ? liked : like"
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
								</span>
							</div>
							<div class="star">
								<span class="starbar">
									<img
										v-for="n in 5"
										:key="n"
										:src="
											n <= item.STAR ? fullStar : nullStar
										"
										alt="Starfull"
									/>
								</span>
								<span class="date">
									<h5>{{ formatDate(item.TIME) }}</h5>
								</span>
							</div>
							<h4>
								{{ item.CONTENT.slice(0, 35) + "..." }}
							</h4>
						</li>
					</ul>

					<!--彈跳視窗按鈕-->
					<button class="readmord">
						<!--btn btn-primary-->
						<router-link to="/review">READ MORE</router-link>
					</button>
				</div>
			</section>
		</div>
	</div>
</template>

<script>
	import axios from "axios";

	export default {
		mounted() {
			this.fetchReviews();
			this.fetchScore();
			this.checkMemberId();

			const memberId = this.getMemberIdFromCookie();

			if (memberId) {
				this.checktStore(this.storeId, memberId);
			}
		},

		data() {
			return {
				rating: 0,
				rating_text: ["", "1级星", "2级星", "3级星", "4级星", "5级星"],
				isMember: false,
				isCollected: false, // 控制按钮是否被收藏
				showPrompt: false, // 控制提示框显示与否
				showPrompt2: false, // 控制提示框显示与否
				memberId: null,
				popup_open: false, // 控制留言弹窗显示与否
				isMessageActive: false,
				pendingAction: null,
				content: "", // 评论内容功能
				files: [], // 上传照片功能
				imageData: [],
				storeId: 1,
				score: [],
				items: [],
				fullStar: new URL(
					"@/assets/Image/restaurant/north/Starfull.png",
					import.meta.url
				).href,
				nullStar: new URL(
					"@/assets/Image/restaurant/north/Starnull.png",
					import.meta.url
				).href,
				like: new URL("@/assets/Image/review/like.png", import.meta.url)
					.href,
				liked: new URL(
					"@/assets/Image/review/liked.png",
					import.meta.url
				).href,
				isLike: false,
			};
		},

		methods: {
			//從cookie抓memberId值
			getMemberIdFromCookie() {
				const cookieValue = document.cookie
					.split("; ")
					.find((row) => row.startsWith("memberId="));
				// console.log(cookieValue);
				return cookieValue ? cookieValue.split("=")[1] : null;
			},

			//會員收藏
			handleCollect() {
				const memberId = this.getMemberIdFromCookie();
				if (memberId) {
					const storeId = 1; // storeId默認值
					if (this.isCollected) {
						// 取消收藏
						this.cancelCollectStore(storeId, memberId);
					} else {
						// 添加收藏
						this.collectStore(storeId, memberId);
					}
					this.isCollected = !this.isCollected;
				} else {
					// 未登錄，顯示提示對話框
					this.showPrompt = true;
				}
			},

			// 收藏並將數據送到PHP
			collectStore(storeId, memberId) {
				const data = {
					storeId,
					memberId,
				};
				axios
					.post(
						`${
							import.meta.env.VITE_PHP_PATH
						}restaurant/collection.php`,
						data
					)
					.then((response) => {
						console.log(response.data);
						this.isCollected = true;
						// Handle success response
					})
					.catch((error) => {
						console.error("Error collecting store:", error);
						// Handle error response
						let errorMessage = "提交失敗，請稍後再試";
						if (error.response) {
							errorMessage =
								error.response.data.message || errorMessage;
						}
						alert(errorMessage);
					});
			},

			checktStore(storeId, memberId) {
				const data = {
					storeId,
					memberId,
				};
				axios
					.post(
						`${import.meta.env.VITE_PHP_PATH}restaurant/check.php`,
						data
					)
					.then((response) => {
						if (
							response.data &&
							response.data.message &&
							response.data.message === "已收藏"
						) {
							this.isCollected = true;
						}
						// Handle success response
					})
					.catch((error) => {
						console.error("Error collecting store:", error);
						// Handle error response
						let errorMessage = "提交失敗，請稍後再試";
						if (error.response) {
							errorMessage =
								error.response.data.message || errorMessage;
						}
						alert(errorMessage);
					});
			},
			//取消收藏並將資料送到php
			cancelCollectStore(storeId, memberId) {
				const data = {
					storeId,
					memberId,
				};
				axios
					.post(
						`${
							import.meta.env.VITE_PHP_PATH
						}restaurant/collection_cancel.php`,
						data
					)
					.then((response) => {
						console.log(response.data);
						this.isCollected = false;
						this.showCancelCollectButton = true; // 顯示取消收藏按鈕
						// Handle success response
						// this.deleteCollectDetail(storeId, memberId);
						alert("您已取消收藏該店家");
					})
					.catch((error) => {
						console.error("Error collecting store:", error);
						// Handle error response
						let errorMessage = "無法取消收藏，請稍後再試";
						if (error.response) {
							errorMessage =
								error.response.data.message || errorMessage;
						}
						alert(errorMessage);
					});
			},

			//collection.PHP ->收藏:跳轉過去同時關閉提示框
			closePrompt() {
				this.showPrompt = false;
				// this.showPrompt_two = false;
			},

			//review.PHP ->給星級、評論、照片新增:送出
			submitFile() {
				const memberId = this.getMemberIdFromCookie(); // Get member ID from cookie
				const storeId = 1; // Default store ID
				const rating = this.rating;
				const content = this.content; // Get the review content from the data object

				// 檢查必要的字段是否存在且不為空
				if (!memberId) {
					alert("未能獲取會員ID，請重新登錄");
					return;
				}
				if (rating === 0) {
					alert("請給予星級評分");
					return;
				}
				if (!content.trim()) {
					alert("評論內容不能為空");
					return;
				}

				if (this.files.length === 0) {
					const reviewData = {
						storeId,
						memberId,
						rating,
						content,
						imageData: [], // or null, depending on your requirements
					};

					axios
						.post(
							`${
								import.meta.env.VITE_PHP_PATH
							}restaurant/review.php`,
							reviewData
						)
						.then((response) => {
							console.log(response.data);
							alert("評論已送出"); // Display the message returned by PHP
							this.content = "";
							this.rating = 0;
							this.files = []; // Clear the file input
						})
						.catch((error) => {
							console.error("Error submitting review:", error);
							let errorMessage = "提交失敗，請稍後再試";
							if (error.response) {
								errorMessage =
									error.response.data.message || errorMessage;
							}
							alert(errorMessage);
						});

					this.popup_close(); // close the popup after submitting the form
					return;
				}

				const filePromises = this.files.map((file) => {
					return new Promise((resolve, reject) => {
						const reader = new FileReader();
						reader.onload = () => {
							const base64String = reader.result;
							resolve(base64String);
						};
						reader.onerror = () => {
							reject(reader.error);
						};
						reader.readAsDataURL(file);
					});
				});

				// Wait for all files to be converted to base64
				Promise.all(filePromises).then((base64Files) => {
					const imageData = base64Files.filter(
						(file) => file !== null && file !== undefined
					);
					const reviewData = {
						storeId,
						memberId,
						rating,
						content,
						imageData,
					};

					axios
						.post(
							`${
								import.meta.env.VITE_PHP_PATH
							}restaurant/review.php`,
							reviewData
						)
						.then((response) => {
							console.log(response.data);
							alert("評論已送出"); // Display the message returned by PHP
							this.content = "";
							this.rating = 0;
							this.files = []; // Clear the file input
						})
						.catch((error) => {
							console.error("Error submitting review:", error);
							let errorMessage = "提交失敗，請稍後再試";
							if (error.response) {
								errorMessage =
									error.response.data.message || errorMessage;
							}
							alert(errorMessage);
						});

					this.popup_close(); // close the popup after submitting the form
				});
			},

			//review.PHP ->給星級、評論、照片新增
			change_rating(value) {
				this.rating = value;
			},
			pop() {
				if (!this.isMember) {
					this.showPrompt2 = true;
					return;
				}
				this.popup_open = true;
				this.isMessageActive = this.popup_open;
			},
			browseAsGuest() {
				console.log("已訪客身分瀏覽");
				this.popup_close();
				this.showPrompt = false;
			},
			browseAsGuest() {
				this.popup_close();
				this.showPrompt2 = false;
			},
			popup_close() {
				// 弹窗關閉
				this.popup_open = false;
				this.showPrompt = false;
			},
			change_rating(index) {
				this.rating = index;
			},
			isUserLoggedIn() {
				return true;
			},
			fileChange(e, index) {
				let file = e.target.files[0];
				let readFile = new FileReader();
				readFile.readAsDataURL(file);

				readFile.addEventListener("load", () => {
					let image = document.createElement("img");
					image.src = readFile.result;
					image.style.width = "100%";
					image.style.height = "100%";

					let box = document.querySelector(`.box${index}`);
					box.innerHTML = "";
					box.appendChild(image);

					// this.imageData[index - 1] = readFile.result;
					// this.files[index - 1] = file;
				});
				this.files[index] = file;
			},
			async fetchReviews() {
				try {
					const memberId = this.getMemberIdFromCookie();
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
				const memberId = this.getMemberIdFromCookie();
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

			//彈跳-留言功能，檢查會員id
			checkMemberId() {
				// 獲取cookie中的memberId
				const memberId = this.getMemberIdFromCookie();
				this.isMember = !!memberId;
				this.memberId = memberId;
			},

			// 檢查商店是否已收藏
			async checkStore(storeId, memberId) {
				try {
					const response = await axios.post(
						"path_to_your_api/check_store",
						{ storeId, memberId }
					);
					this.isCollected = response.data.isCollected;
				} catch (error) {
					console.error("Error checking store:", error);
				}
			},

			redirectToLogin() {
				// 跳到登入頁面邏輯
				this.$router.push({ path: "/login" });
			},

			// pop() {
			//     if (!this.isMember) {
			//         this.showPrompt = true;
			//         return;
			//     }

			//     this.popup_open = true;
			// },
			collect() {
				// 收藏按鈕
				alert("");
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

	* {
		text-decoration: none;
		list-style: none;
	}

	//留言按鈕變色
	// .message button.button-active {
	//     background-color: #ffcc00;
	//     width: 46px;
	//     height: 46px;
	//     border-radius: 50px;
	//     margin-right: 12px;
	//     border-radius: 50%;
	// }

	#share-btn {
		#share-btn {
			width: 90px;
			height: 30px;
			margin-left: 20px;
			border-radius: 50px;
			color: #fff;
			background-color: #7a625b;
		}
	}

	.restaurant_wrapper {
		overflow: hidden;
		background-color: #f6f1ed;
		display: flex;

		@include breakpoint(430px) {
			display: block;
			position: relative;
		}
	}

	button {
		background-color: transparent;
		border: none;
		cursor: pointer;
		margin-bottom: 28px;
		padding-left: 1px;

		@include breakpoint(430px) {
			margin-bottom: 4px;
			padding-left: 1px;
		}

		@include breakpoint(390px) {
			margin-bottom: 0px;
		}
	}

	.restaurant_sidebar {
		background-color: #fff;
		width: 17vw;

		@include breakpoint(430px) {
			background-color: #f6f1ed;
			position: absolute;
			z-index: 1;
		}

		.storeimg {
			padding-top: 212px;
			width: 80px;
			height: 80px;
			margin: 0 auto;
			display: block;

			@include breakpoint(430px) {
				display: none;
			}
		}

		.column {
			display: flex;
			width: fit-content;
			margin: 0 auto;

			@include breakpoint(430px) {
				position: absolute;
				top: 31vw;
				left: 35vw;
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

				@include breakpoint(430px) {
					-webkit-writing-mode: unset;
					writing-mode: unset;
					font-weight: 800;
				}
			}

			h6 {
				-webkit-writing-mode: vertical-lr;
				writing-mode: vertical-lr;
				margin-top: 16px;
				margin-left: 8px;

				@include breakpoint(430px) {
					-webkit-writing-mode: unset;
					writing-mode: unset;
					font-weight: 800;
					margin-left: 9vw;
				}
			}
		}

		.restaurant_star {
			background-color: #7a625b;
			display: flex;
			width: 83px;
			height: 30px;
			border-radius: 50px;
			margin: 0 auto;
			margin-top: 26px;

			@include breakpoint(430px) {
				position: absolute;
				top: 48vw;
				left: 39vw;
			}

			.star {
				font-size: 20px;
				color: #dbcec6;
				margin: 5px 41px 5px 12px;

				@include breakpoint(1024px) {
					padding-left: 8px;
				}

				@include breakpoint(390px) {
					padding-left: 0px;
				}
			}

			.restaurant_starimg {
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

			@include breakpoint(430px) {
				display: none;
			}

			li {
				margin-top: 16px;

				@include breakpoint(820px) {
					width: 80px;
				}
			}
		}
	}

	.restaurant_content {
		top: 0;
		left: 17vw;
		width: 83vw;
		object-fit: cover;
		overflow: hidden;
		background-color: #f6f1ed;

		@include breakpoint(430px) {
			width: 100vw;
		}

		.Banner {
			opacity: 50%;
			width: 82vw;

			@include breakpoint(430px) {
				display: none;
			}
		}

		.Banner430 {
			display: none;

			@include breakpoint(430px) {
				display: block;
				object-fit: contain;
				width: 100vw;
				background-color: #000;
				opacity: 0.5;
				position: relative;
				margin-top: 21vw;
			}
		}

		.restaurant_breadcrumb {
			height: 88px;
			width: 82vw;
			color: #333333;
			display: flex;
			justify-content: space-between;

			@include breakpoint(1024px) {
				width: 64vw;
				margin-left: 0.9vw;
			}

			@include breakpoint(820px) {
				width: 64vw;
				margin-left: 0.8vw;
			}

			@include breakpoint(430px) {
				height: 8vh;
				width: 95vw;
			}

			.breadcrumb {
				margin: 20px 20px 0 20px;
				width: 206px;
				height: 23px;

				@include breakpoint(430px) {
					width: fit-content;
				}

				@include breakpoint(390px) {
					margin: 10px 10px 10px 10px;
				}

				.crumb1 {
					position: absolute;

					a {
						color: #333333;

						&:hover {
							color: #999999;
						}
					}
				}
			}

			.crumb2 {
				margin-left: 56px;
				margin-right: 20px;

				@include breakpoint(430px) {
					margin-left: 33px;
					margin-right: 0px;
				}

				a {
					color: #333333;
					margin-left: 8px;
					margin-right: 8px;

					&:hover {
						color: #999999;
					}
				}
			}

			img {
				// margin-left: 1.0vw;

				@include breakpoint(1024px) {
					margin-left: 1.3vw;
				}

				@include breakpoint(430px) {
					margin-left: 0vw;
					margin-right: 0vw;
				}

				@include breakpoint(390px) {
					margin-left: 0vw;
					margin-right: 0vw;
				}
			}
		}

		.crumb3 {
			margin-left: 143px;
			margin-top: -18px;

			@include breakpoint(430px) {
				margin-left: 114px;
				margin-top: -19px;
			}

			a {
				color: #333333;
				margin-left: 15px;

				@include breakpoint(430px) {
					margin-left: 10px;
				}

				&:hover {
					color: #999999;
				}
			}
		}
	}

	.restaurant_btns {
		display: flex;
		margin-top: 22px;
		margin-right: 30px;

		@include breakpoint(1350px) {
			margin-right: 1vw;
		}

		@include breakpoint(1024px) {
			width: 20px;
			height: 20px;
		}

		@include breakpoint(430px) {
			width: fit-content;
			margin-top: 14px;
		}

		@include breakpoint(390px) {
			margin-top: 10px;
		}

		.collect {
			width: 46px;
			height: 46px;
			background-color: #c8ac96;
			border-radius: 50px;
			margin-right: 12px;

			&:hover {
				transform: translateY(-5px);
				filter: drop-shadow(3px 3px 2px rgba(97, 97, 97, 0.7));
			}

			//收藏後按鈕變色
			&.collected {
				background-color: #cb4847;
			}

			// 提示框彈出時按鈕變色
			&.prompt-active {
				background-color: #cb4847;
			}

			.collect_img {
				width: 20px;
				height: 20px;

				@include breakpoint(430px) {
					width: 15px;
					height: 15px;
				}
			}

			.restaurant_btns .collect {
				background: none;
				border: none;
				cursor: pointer;
			}

			@include breakpoint(820px) {
				width: 40px;
				height: 40px;
				margin-right: 0px;
			}

			@include breakpoint(430px) {
				width: 30px;
				height: 30px;
				margin: 0px 8px 2px 8px;
				position: relative;
			}
		}

		img {
			width: 13px;
			height: 16px;
			margin: 14px 12px 14px 12px;

			@include breakpoint(820px) {
				margin-left: 6px;
				margin: 12px 12px 12px 12px;
				// padding-left: 14px;
			}

			@include breakpoint(430px) {
				margin: 0;
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
			}
		}

		.share {
			width: 44px;
			height: 44px;
			background-color: #c8ac96;
			border-radius: 50px;
			margin-right: 8px;

			&:hover {
				transform: translateY(-5px);
				filter: drop-shadow(3px 5px 2px rgba(97, 97, 97, 0.7));
			}

			@include breakpoint(1024px) {
				margin-right: 8px;
			}

			@include breakpoint(820px) {
				width: 40px;
				height: 40px;
				margin-left: 10px;
			}

			@include breakpoint(430px) {
				width: 28px;
				height: 28px;
				position: relative;
				margin-left: -1vw;
				margin-right: 1px;
			}

			@include breakpoint(390px) {
				margin-left: 0vw;
			}

			img {
				width: 23px;
				height: 23px;
				margin: 10px 10px 10px 10px;

				@include breakpoint(820px) {
					margin: 8px 10px 10px 10px;
				}

				@include breakpoint(430px) {
					margin: 0;
					position: absolute;
					top: 50%;
					left: 50%;
					transform: translate(-50%, -50%);
				}

				@include breakpoint(430px) {
					width: 17px;
				}
			}
		}

		.message {
			width: 44px;
			height: 44px;
			background-color: #c8ac96;
			border-radius: 50px;

			&:hover {
				transform: translateY(-5px);
				filter: drop-shadow(3px 5px 2px rgba(97, 97, 97, 0.7));
			}

			&.messaged {
				background-color: #ffcc00;
			}

			&.message-active {
				background-color: #ffcc00;
			}

			@include breakpoint(820px) {
				width: 40px;
				height: 40px;
			}

			@include breakpoint(430px) {
				width: 28px;
				height: 28px;
				position: relative;
			}

			img {
				width: 23px;
				height: 22.98px;
				margin: 9.73px 10px 11.29px 11px;

				@include breakpoint(820px) {
					width: 20px;
					height: 20px;
				}

				@include breakpoint(430px) {
					margin: 0;
					position: absolute;
					top: 50%;
					left: 50%;
					transform: translate(-50%, -50%);
					width: 16px;
					height: 16px;
				}
			}
		}
	}
	.collect-prompt {
		position: fixed;
		top: 50%;
		left: 55%;
		transform: translate(-50%, -50%);
		background-color: white;
		padding: 20px;
		border: 1px solid #ccc;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		z-index: 50;
		width: 17vw;
		border-radius: 3px;

		@include breakpoint(1024px) {
			width: 23vw;
		}

		@include breakpoint(820px) {
			width: 25vw;
		}
	}

	.collect-prompt_p {
		// margin-bottom: 20px;
		font-size: 16px;
		text-align: center;
	}

	.collect-prompt_button {
		background-color: #f6f1ed;
		padding: 6px 15px;
		cursor: pointer;
		margin: 1vw 1vw 0vw 1.5vw;
		color: #7a625b;
		border: 1px solid #f6f1ed;
		width: 11vw;

		@include breakpoint(1024px) {
			width: 16vw;
		}

		@include breakpoint(820px) {
			width: 18vw;
		}
	}

	.restaurant_header {
		display: flex;
		width: 78vw;
		margin: 0 auto;
		justify-content: center;

		@include breakpoint(430px) {
			flex-direction: column;
			margin: 3vw 10vw 2vw 6vw;
		}

		@include breakpoint(390px) {
			width: 91vw;
		}

		.restaurant_slogan {
			line-height: 150%;
			color: #7a625b;
			margin-top: 5%;
			margin-left: 6.5%;

			@include breakpoint(1280px) {
				margin-left: 2vw;
			}

			@include breakpoint(1024px) {
				// width: 52vw;
				margin-top: 17%;
				width: 49vw;
				font-size: 34px;
			}

			@include breakpoint(820px) {
				font-size: 27px;
				width: 53vw;
				margin-left: 0vw;
				margin-top: 19%;
			}

			@include breakpoint(430px) {
				font-size: 29px;
				margin-left: 7vw;
				width: 81vw;
				margin-top: 2vw;
			}

			@include breakpoint(390px) {
				margin-left: 16px;
				width: 89vw;
				font-size: 28px;
			}
		}

		h4 {
			line-height: 150%;
			margin-left: 9%;
			width: 478px;

			@include breakpoint(1280px) {
				margin-left: 2vw;
			}

			@include breakpoint(1024px) {
				width: 423px;
				margin-left: 0px;
			}

			@include breakpoint(820px) {
				font-size: 17px;
			}

			@include breakpoint(430px) {
				font-size: 16px;
				width: 74vw;
				margin: 3vw 10vw 6vw 9vw;
			}
		}
	}

	.restaurant_section {
		background-color: #f6f1ed;
		width: 70vw;
		padding-bottom: 46px;
		border-bottom: 2px solid #cb4847;
		margin: 0 auto;

		@include breakpoint(1280px) {
			width: 68vw;
		}

		@include breakpoint(1024px) {
			width: 68vw;
			padding-bottom: 7vw;
		}

		@include breakpoint(820px) {
			padding-bottom: 0vw;
		}

		@include breakpoint(430px) {
			width: 85vw;
			margin: 0 auto;
		}

		@include breakpoint(390px) {
			width: 98vw;
		}

		.restaurant_h3 {
			h3 {
				color: #cb4847;
				font-weight: bold;
				padding-bottom: 10px;
				margin-bottom: 16px;
				width: 70vw;
				border-bottom: 2px solid #cb4847;
				// margin-left: 2vw;

				@include breakpoint(1024px) {
					// margin-left: 2vw;
				}

				@include breakpoint(820px) {
					font-size: 26px;
				}

				@include breakpoint(430px) {
					font-size: 23px;
					width: 86vw;
				}

				@include breakpoint(390px) {
					margin-left: 8vw;
				}
			}
		}

		.restaurant_mapinfo {
			display: flex;
			justify-content: center;
			gap: 3vw;
			width: 69vw;

			@include breakpoint(1440px) {
				gap: 0vw;
			}

			@include breakpoint(1280px) {
				width: 66vw;
				// margin-left: 3vw;
			}

			@include breakpoint(1100px) {
				gap: 0vw;
				width: 80vw;
			}

			@include breakpoint(1024px) {
				width: 94vw;
				flex-direction: column;
			}

			@include breakpoint(820px) {
				margin-left: 0vw;
				margin-bottom: 5vw;
			}

			@include breakpoint(430px) {
				margin-left: 0vw;
				margin-bottom: 20vw;
			}

			@include breakpoint(390px) {
				margin-left: 6vw;
				margin-bottom: 1vw;
			}

			.restaurant_info {
				.info {
					width: 540px;
					padding-left: 0;

					@include breakpoint(1350px) {
						width: 40vw;
					}

					@include breakpoint(1280px) {
						width: 38vw;
						margin-left: 1vw;
					}

					@include breakpoint(1100px) {
						width: 50vw;
					}

					@include breakpoint(1024px) {
						width: 600px;
					}

					@include breakpoint(820px) {
						width: 60vw;
					}

					@include breakpoint(430px) {
						width: 86vw;
					}

					tr {
						@include breakpoint(1280px) {
							margin-left: 10px;
						}

						@include breakpoint(1100px) {
							margin-left: 12px;
						}

						th {
							font-weight: bold;
							font-size: 20px;
							color: #333333;
							padding-top: 16px;
							padding-bottom: 8px;
							border-bottom: 1px solid #333333;
							text-align: left;
							width: 160px;

							@include breakpoint(1314px) {
								width: 8vw;
							}

							@include breakpoint(1280px) {
								width: 8vw;
							}

							@include breakpoint(1100px) {
								margin-left: 145px;
								width: 10vw;
							}

							@include breakpoint(1024px) {
								width: 150px;
							}

							@include breakpoint(820px) {
								font-size: 18px;
							}

							@include breakpoint(820px) {
								font-size: 17px;
								width: 93px;
							}

							@include breakpoint(390px) {
								font-size: 17px;
								width: 76px;
							}
						}

						td {
							font-size: 20px;
							padding-right: 70px;
							border-bottom: 1px solid #333333;

							@include breakpoint(1280px) {
								padding-right: 50px;
							}

							@include breakpoint(1024px) {
								padding: 0 0 0 0;
								margin-left: 0;
							}

							@include breakpoint(820px) {
								font-size: 18px;
							}

							@include breakpoint(390px) {
								font-size: 17px;
							}
						}
					}
				}

				.restaurant_media {
					margin-top: 25.5px;
					display: flex;
					margin-left: -46px;

					@include breakpoint(1280px) {
						margin-left: -30px;
					}

					@include breakpoint(430px) {
						display: block;
						margin-left: -72px;
					}

					.restaurant_fb {
						display: flex;

						@include breakpoint(430px) {
							margin-left: 8vw;
						}

						@include breakpoint(390px) {
							margin-left: 8vw;
						}

						img {
							margin-right: 8px;
							flex-direction: row-reverse;

							@include breakpoint(430px) {
								// width: 28px;
								margin-left: 48px;
							}

							@include breakpoint(390px) {
								width: 26px;
							}
						}

						h4 {
							display: block;

							@include breakpoint(1280px) {
								// font-size: 18px;
								width: 17vw;
							}

							@include breakpoint(1024px) {
								font-size: 18px;
								width: 24vw;
							}

							@include breakpoint(820px) {
								font-size: 18px;
								width: 24vw;
							}

							@include breakpoint(788px) {
								font-size: 18px;
								width: 68vw;
							}

							@include breakpoint(753px) {
								font-size: 18px;
								width: 68vw;
							}

							@include breakpoint(430px) {
								font-size: 18px;
								width: 45vw;
							}

							@include breakpoint(390px) {
								font-size: 17px;
								width: 49vw;
							}
						}
					}

					.restaurant_ig {
						display: flex;

						@include breakpoint(1280px) {
							padding-left: 0px;
						}

						@include breakpoint(430px) {
							margin: 4vw 0 4vw 7vw;
						}

						img {
							margin-right: 12px;
							display: flex;
							// margin-left: 76px;
							display: inline;

							@include breakpoint(1314px) {
								margin-left: 12px;
							}

							@include breakpoint(1280px) {
								margin-left: 0vw;
							}

							@include breakpoint(1200px) {
								margin-left: 28px;
							}

							@include breakpoint(1024px) {
								margin-left: 48px;
							}

							@include breakpoint(430px) {
								width: 33px;
								margin-left: 51px;
							}

							@include breakpoint(390px) {
								width: 26px;
								margin-left: 52px;
							}
						}

						h4 {
							@include breakpoint(430px) {
								font-size: 18px;
							}

							@include breakpoint(390px) {
								font-size: 17px;
							}
						}
					}

					.line {
						width: 1096 vw;
						border-bottom: 2px solid #cb4847;

						@include breakpoint(1024px) {
							width: 71vw;
							margin-left: -56vw;
							margin-bottom: -2vw;
						}

						@include breakpoint(790px) {
							width: 68vw;
							margin-left: -61vw;
							// padding-bottom: 5px;
						}

						@include breakpoint(820px) {
							width: 70vw;
							margin-bottom: -2vw;
							margin-left: -62vw;
						}

						@include breakpoint(430px) {
							margin-left: 17vw;
							width: 85vw;
						}

						@include breakpoint(390px) {
							margin-left: 20vw;
						}
					}
				}
			}

			.map {
				height: 248px;

				@include breakpoint(1440px) {
					padding-left: 0px;
				}

				@include breakpoint(1280px) {
					padding-left: 0px;
					padding-right: 3vw;
				}

				@include breakpoint(1024px) {
					width: 83vw;
					margin-right: 2vw;
					margin-top: 3vw;
					margin-left: 12vw;
					padding-bottom: 4vw;
				}

				@include breakpoint(820px) {
					margin-left: 6vw;
					padding-left: 0vw;
				}

				#google_map {
					width: 500px;
					height: 300px;

					@include breakpoint(1280px) {
						// scale: 0.89;
						width: 420px;
						height: 300px;
					}

					@include breakpoint(1024px) {
						width: 600px;
						margin-left: -6vw;
					}
				}

				@include breakpoint(820px) {
					width: 87vw;
					margin-right: 0vw;
					margin-top: 10vw;
					margin-left: 9vw;
					padding-bottom: 8vw;

					#google_map {
						width: 500px;
						height: 300px;
						margin-left: -7vw;
						margin-top: -4vw;
					}

					@include breakpoint(430px) {
						#google_map {
							margin-left: -3vw;
							margin-top: -2vw;
							width: 380px;
							height: 350px;
						}
					}
				}

				@include breakpoint(430px) {
					width: 88vw;
					margin-right: 0vw;
					margin-top: 8vw;
					margin-left: 2vw;
				}

				@include breakpoint(390px) {
					#google_map {
						width: 350px;
						height: 250px;
					}
				}
			}

			img {
				display: block;
				text-align: right;
				margin-left: 50px;
			}
		}
	}

	.restaurant_mainContent {
		width: 82vw;
		background-color: #f6f1ed;
		padding-top: 38px;
		display: flex;
		flex-wrap: wrap;
		justify-content: center;

		@include breakpoint(430px) {
			width: 100vw;
		}

		@include breakpoint(390px) {
			width: 90vw;
		}

		.restaurant_content1 {
			display: flex;

			@include breakpoint(430px) {
				flex-direction: column-reverse;
			}

			@include breakpoint(390px) {
				margin-left: 10vw;
			}

			h4 {
				color: #333333;
				line-height: 150%;

				@include breakpoint(1425px) {
					font-size: 20px;
					margin-top: 2vw;
				}

				@include breakpoint(1024px) {
					font-size: 20px;
					margin-top: 2vw;
				}

				@include breakpoint(820px) {
					font-size: 17px;
					width: 40vw;
				}

				@include breakpoint(749px) {
					font-size: 17px;
					width: 45vw;
				}

				@include breakpoint(430px) {
					font-size: 17px;
					width: 76vw;
					margin: 0;
				}

				@include breakpoint(390px) {
					width: 85vw;
					font-size: 16px;
				}
			}

			img {
				padding-left: 32px;

				@include breakpoint(1024px) {
					padding-left: 5px;
					width: 32vw;
				}

				@include breakpoint(820px) {
					width: 34vw;
					height: 23vw;
				}

				@include breakpoint(430px) {
					width: 57vw;
					height: 38vw;
					margin: 0 auto 5vw;
				}
			}
		}

		.restaurant_content2 {
			display: flex;

			@include breakpoint(430px) {
				flex-direction: column;
			}

			@include breakpoint(390px) {
				margin-left: 3vw;
			}

			h4 {
				margin-top: 40px;
				margin-left: 42px;

				@include breakpoint(1024px) {
					margin-left: 5px;
					margin-top: 6vw;
				}

				@include breakpoint(820px) {
					margin-left: 2vw;
					font-size: 17px;
				}

				@include breakpoint(430px) {
					font-size: 17px;
					margin: 0 auto;
				}

				@include breakpoint(390px) {
					margin-left: 3vw;
				}
			}

			img {
				margin-left: -25px;
				margin-top: 40px;

				@include breakpoint(1024px) {
					padding-left: 5px;
					width: 32vw;
				}

				@include breakpoint(820px) {
					width: 34vw;
					height: 23vw;
					margin-left: 11px;
				}

				@include breakpoint(430px) {
					width: 57vw;
					height: 38vw;
					margin: 5vw auto;
				}

				@include breakpoint(390px) {
					height: 35vw;
					margin-left: 16vw;
				}
			}
		}

		.restaurant_content3 {
			display: flex;
			padding-bottom: 61px;

			@include breakpoint(430px) {
				flex-direction: column-reverse;
				padding-bottom: 20px;
			}

			@include breakpoint(3900px) {
				text-align: center;
				padding-bottom: 0px;
				margin: 0 auto;
			}

			h4 {
				margin-top: 40px;

				@include breakpoint(1024px) {
					margin-top: 80px;
				}

				@include breakpoint(820px) {
					margin-top: 8vw;
					font-size: 17px;
				}

				@include breakpoint(430px) {
					font-size: 17px;
					margin: 0 auto;
				}

				@include breakpoint(390px) {
					margin-left: 4vw;
				}
			}

			img {
				margin-left: 52px;
				margin-top: 40px;

				@include breakpoint(1024px) {
					margin-left: 5px;
					padding-left: 5px;
					width: 32vw;
				}

				@include breakpoint(820px) {
					width: 34vw;
					height: 23vw;
				}

				@include breakpoint(430px) {
					width: 57vw;
					height: 38vw;
					margin: 5vw auto;
				}

				@include breakpoint(390px) {
					margin-left: 18vw;
				}
			}
		}
	}

	.restaurant {
		background-color: #f6f1ed;
		width: 82.75vw;
		padding-bottom: 40px;

		@include breakpoint(820px) {
			padding-bottom: 0vw;
		}

		.restaurant_review {
			width: 78vw;
			background-color: #fff;
			padding-left: 20px;
			margin: 20px 20px;
			padding-bottom: 20px;


			@include breakpoint(1024px) {
				padding-left: 15px;
			}

			@include breakpoint(820px) {
				height: unset;
				width: 71vw;
				margin: 20px auto;
			}

			@include breakpoint(430px) {
				width: 81vw;
				margin-left: 10vw;
				padding-left: unset;
				height: 207vw;
			}

			@include breakpoint(390px) {
				margin-left: 10vw;
				margin-top: 5vw;
				height: 215vw;
			}

			.restaurant_review_content {
				display: flex;
				justify-content: space-between;
				padding-top: 8px;
				width: 76.5vw;

				.restaurant_review_title {
					display: flex;
					width: 535px;
					line-height: 50px;
					font-weight: bold;
					border-bottom: 2px solid #cb4847;

					@include breakpoint(820px) {
						margin-left: 1vw;
						width: 56vw;
					}

					@include breakpoint(430px) {
						width: 61vw;
					}

					h3 {
						margin-top: 18px;
						width: 535px;
						height: 50px;
						color: #cb4847;

						@include breakpoint(820px) {
							font-size: 26px;
							width: 32vw;
						}

						@include breakpoint(430px) {
							font-size: 23px;
						}

						@include breakpoint(390px) {
							font-size: 21px;
						}
					}

					span {
						display: flex;
						align-items: center;

						@include breakpoint(390px) {
							padding-top: 4vw;
						}

						.restaurantstarimg {
							width: 20px;
							height: 20px;
						}

						.restaurant_rating {
							color: #7a625b;
							font-size: 20px;
							font-weight: bold;
							margin-left: 8px;

							@include breakpoint(390px) {
								font-size: 18px;
							}

							font-size: 18px;
						}
					}

					.restaurant_review_num {
						color: #999999;
						font-size: 20px;
						font-weight: bold;
						width: 107px;
						margin-left: 8px;

						@include breakpoint(430px) {
							font-size: 18px;
						}

						@include breakpoint(390px) {
							font-size: 16px;
							width: 88px;
						}
					}
				}
			}

			.icon_bg {
				margin-top: 16px;
				width: 44px;
				height: 44px;
				background-color: #c8ac96;
				border-radius: 50%;
				margin-left: 35vw;

				@include breakpoint(1280px) {
					margin-left: 30vw;
				}

				@include breakpoint(1024px) {
					margin-left: 14vw;
				}

				@include breakpoint(820px) {
					margin-left: -7vw;
				}

				@include breakpoint(430px) {
					width: 30px;
					height: 30px;
					margin-left: 2vw;
				}

				@include breakpoint(390px) {
					width: 28px;
					height: 28px;
					margin-left: -4vw;
				}

				img {
					margin: 10.76px 11.49px 11.96px 11px;

					@include breakpoint(820px) {
						width: 28px;
						height: 28px;
						margin: 7px 0px 7px 2px;
					}

					@include breakpoint(430px) {
						width: 20px;
						height: 20px;
						top: 50%;
						left: 50%;
						transform: translate(-50% -50%);
					}

					@include breakpoint(390px) {
						width: 18px;
						height: 18px;
						top: 50%;
						left: 50%;
						transform: translate(-50% -50%);
						margin: 4px 2px 3px 4px;
					}
				}
			}
		}

		.customer_review {
			display: flex;
			width: 75vw;
			height: 220px;
			justify-content: space-between;
			margin-top: 20px;

			@include breakpoint(1024px) {
				display: flex;
				height: 230px;
				width: 75vw;
			}

			@include breakpoint(820px) {
				display: block;
				height: 90vh;
				width: 51vw;
				margin: 20px auto 0;
			}

			@include breakpoint(430px) {
				width: 100%;
				height: fit-content;
			}

			li {
				width: 24vw;
				height: 220px;
				border-radius: 5px;
				background-color: #f6f1ed;
				border-radius: 5px;
				filter: drop-shadow(0 0 7px rgba(207, 81, 61, 0.4));

				@include breakpoint(1024px) {
					width: 24vw;
					height: 230px;
					padding: 5px 17px 5px 16px;
				}

				@include breakpoint(820px) {
					margin: auto;
					width: 48vw;
					height: 27vh;
					margin-bottom: 3vw;
				}

				@include breakpoint(430px) {
					width: 71vw;
					margin-bottom: 6vw;
					height: 50vw;
				}

				@include breakpoint(390px) {
					width: 68vw;
					height: 52vw;
				}

				.namenlike {
					display: flex;
					justify-content: space-between;
				}

				div {
					display: flex;

					@include breakpoint(820px) {
						// margin-left: 3vw;
					}

					span {
						margin-top: 20px;

						.user {
							display: block;
							width: 36px;
							height: 36px;
							margin-left: 1.7vw;
							border-radius: 50%;
							object-fit: cover;

							@include breakpoint(1280px) {
								padding-left: 0px;
							}

							@include breakpoint(1024px) {
								margin-left: 0.7vw;
							}

							@include breakpoint(820px) {
								// margin-left: 1.7vw;
							}
						}

						.restaurant_username {
							padding-left: 16px;
							font-size: 20px;
							font-weight: bold;
							color: #7a625b;
							margin: 0 auto;

							@include breakpoint(1280px) {
								width: 14vw;
							}

							@include breakpoint(1024px) {
								padding-left: 9px;
								font-size: 18px;
								width: 120px;
								padding-top: 12px;
							}
						}
					}

					span {
						display: flex;
						padding-left: 0px;

						@include breakpoint(1024px) {
							padding-left: 0px;
						}

						.good {
							margin-top: 7px;
							margin-left: 52px;
							width: 16px;
							height: 16px;

							@include breakpoint(1280px) {
								margin-left: 12px;
							}

							@include breakpoint(1024px) {
								margin-left: 0px;
								margin-top: 16px;
							}

							@include breakpoint(820px) {
								margin-top: 16px;
								margin-left: 124px;
							}

							@include breakpoint(430px) {
								margin-left: 13vw;
							}

							@include breakpoint(390px) {
								margin-left: 19px;
							}
						}

						.number {
							width: 28px;
							height: 24px;
							text-align: center;
							margin: 0 auto;
							color: #cb4847;
							margin-left: 4px;
							padding-top: 5px;

							@include breakpoint(1024px) {
								margin-top: 7px;
							}

							@include breakpoint(820px) {
								padding-left: 0vw;
							}
						}
					}
				}

				.star {
					display: flex;
					padding-left: 26px;

					@include breakpoint(1024px) {
						padding-left: 2px;
					}

					@include breakpoint(820px) {
						padding-left: 2vw;
					}

					@include breakpoint(430px) {
						padding-left: 4vw;
					}

					.starbar {
						display: flex;

						@include breakpoint(1024px) {
							padding-left: 2px;
						}

						img {
							width: 24px;
							height: 24px;
							padding-left: 4px;

							@include breakpoint(1280px) {
								height: 20px;
							}

							@include breakpoint(1024px) {
								width: 18px;
								height: 16px;
							}

							@include breakpoint(430px) {
								// width: 18px;
								// height: 16px;
							}

							@include breakpoint(390px) {
								width: 18px;
								height: 15px;
							}
						}
					}

					.date {
						margin-left: 28px;

						@include breakpoint(1024px) {
							margin-left: 0;
						}

						h5 {
							padding-right: 15px;
							font-size: 16px;

							@include breakpoint(1280px) {
								margin-left: -0.9vw;
								font-size: 13.7px;
							}

							@include breakpoint(1024px) {
								padding-left: 24px;
								width: 500px;
							}

							@include breakpoint(820px) {
								padding-left: 10vw;
								margin-left: -0.5vw;
								width: -1px;
								font-size: 15px;
							}

							@include breakpoint(430px) {
								padding-left: 8vw;
							}

							@include breakpoint(390px) {
								margin-left: -4.2vw;
							}
						}
					}
				}

				h4 {
					margin-top: 12px;
					padding: 4px 16px 5px 16px;

					@include breakpoint(1024px) {
						// margin-left: 18px;
						font-size: 18px;
						padding: 0px 12px 0px 16px;
					}

					@include breakpoint(820px) {
						margin-left: 1vw;
					}

					@include breakpoint(390px) {
						font-size: 16px;
						margin-top: 0px;
					}
				}
			}
		}
	}

	.readmord {
		width: 144px;
		height: 52px;
		background-color: #cb4847;
		border-radius: 15px;
		margin: 16px auto 0;
		display: block;
		border: none;

		@include breakpoint(1024px) {
			// margin: 16px auto;
		}

		@include breakpoint(820px) {
			margin: 0 auto;
		}

		a {
			font-size: 20px;
			color: #fff;

			@include breakpoint(430px) {
				font-size: 16px;
			}
		}
	}

	#pop {
		background-color: #f6f1ed;
		margin: 0 auto;
		border: none;
		border-radius: 12px;
		filter: drop-shadow(0 0 7px rgba(207, 81, 61, 0.4));
		z-index: 10;
		position: fixed;
		top: -50px;
		left: 450px;
		opacity: 0;
		pointer-events: none;
		transition: opacity 0.4s;
		text-align: center;

		&.active {
			width: 412px;
			height: 625px;
			opacity: 1;
			pointer-events: auto;
			text-align: center;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);

			@include breakpoint(430px) {
				width: 386px;
				height: 560px;
			}

			@include breakpoint(390px) {
				width: 300px;
				height: 512px;
			}
		}

		.concent_one {
			.starbars {
				display: flex;
				margin-top: 26px;

				.starbar_store {
					margin-left: 28px;
					margin-right: 16px;
					font-weight: 800;
					color: #7a625b;

					@include breakpoint(430px) {
						font-size: 18px;
					}

					@include breakpoint(390px) {
						font-size: 18px;
					}

					#stars {
						img {
							width: 24px;
							margin-left: 5px;

							@include breakpoint(390px) {
								// margin-left: 10px;
							}

							span {
								font-size: 16px;
								color: #7a625b;
								margin-left: 10px;
							}
						}
					}
				}
			}
			.line {
				border: 1px solid red;
				width: 356px;
				border: 1px dashed #333333;
				margin: 20px auto 0;

				@include breakpoint(1024px) {
					width: 34vw;
					margin-left: 3vw;
				}

				@include breakpoint(820px) {
					width: 68vw;
					margin-left: -55vw;
					margin-bottom: -1vw;
					margin-left: 5vw;
					width: 40vw;
				}

				@include breakpoint(390px) {
					margin-bottom: -1vw;
					margin-left: 6vw;
					width: 66vw;
				}
			}

			.masg {
				width: 252px;
				margin-top: 8px;
				color: #7a625b;
				margin-left: 28px;

				@include breakpoint(430px) {
					margin-top: 0px;
				}
			}

			.experience {
				width: 100px;
				font-weight: 800;
				color: #7a625b;
				margin-left: 20px;
				margin-top: 28px;

				@include breakpoint(430px) {
					margin-left: 10px;
					margin-top: 20px;
					font-size: 18px;
				}

				@include breakpoint(390px) {
					margin-top: 11px;
					font-size: 19px;
				}
			}

			.text_1 {
				margin-top: 8px;

				.text_concent {
					width: 350px;
					height: 108px;
					font-size: 14px;
					border-radius: 9px;
					color: #c3a988;
					padding: 9px 0 0 10px;

					@include breakpoint(390px) {
						width: 267px;
						height: 83px;
						font-size: 11px;
						padding: 8px 0 0 8px;
					}
				}

				&::placeholder {
					color: #c3a988;
					font-size: 12px;
				}
			}
		}

		.text_words {
			color: #7a625b;
			text-align: right;
			margin-right: 28px;
		}
	}

	.share {
		display: flex;

		&_photo {
			width: fit-content;
			font-weight: 800;
			color: #7a625b;
			margin-left: 30px;

			@include breakpoint(430px) {
				font-size: 18px;
			}
		}

		&_six {
			margin-top: 5px;
			color: #7a625b;
			margin-left: 12px;
		}
	}

	.concent_two {
		width: 264px;
		height: 168px;
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		margin: auto;
		margin-top: 16px;
		padding-bottom: 40px;

		@include breakpoint(390px) {
			width: 253px;
			justify-content: space-around;
		}

		.box1,
		.box2,
		.box3,
		.box4,
		.box5,
		.box6 {
			border: 1px solid #dbcec6;
			background-color: #dbcec6;
			width: 80px;
			height: 80px;
			text-align: center;
			border-radius: 6px;
			position: relative;
			margin-bottom: 12px;

			@include breakpoint(390px) {
				width: 70px;
				height: 70px;
				margin-bottom: 7px;
				margin-top: 0px;
			}

			.add {
				font: bold 15px Tahoma;
				color: #999999;
				position: absolute;
				transform: translate(-50%, -50%);
				margin-left: 39px;
				margin-top: 37px;
			}

			& img {
				width: 124px;
				height: 124px;
			}

			input[type="file"] {
				width: 80px;
				height: 80px;
				opacity: 0;
			}
		}
	}

	.buttons {
		display: flex;
		text-align: center;
		width: 200px;
		justify-content: space-between;
		align-items: center;
		margin: 30px auto;

		@include breakpoint(430px) {
			margin: 4vw auto;
		}

		@include breakpoint(390px) {
			margin: 0px auto;
		}

		.cancel {
			width: 100px;
			height: 40px;
			font-size: 32px;
			font-weight: bold;
			background-color: #c8ac96;
			color: #fff;
			border-radius: 9px;
			
		}

		.sendout {
			width: 100px;
			height: 40px;
			font-weight: bold;
			background-color: #cb4847;
			color: #fff;
			border-radius: 9px;
			margin-left: 24px;
		}
	}

	.test {
		// display: flex;
		.test1 {
			display: flex;
			margin-left: 81px;
			padding-right: 1px;
			margin-top: 16px;
		}

		.test2 {
			margin-top: 14px;
			margin-left: 80px;
		}

		img {
			max-width: 124px;
			max-height: 124px;
			margin-left: 30px;
			border-radius: 9px;
		}

		input[type="file"] {
			padding: 10px;
			background-color: #f6f1ed;
			border-radius: 9px;
			padding-left: 34px;
		}
	}

	.like {
		// outline: 1px red solid;
		display: flex;
		align-items: center;
		cursor: pointer;

		img {
			margin-right: 4px;

			@include breakpoint(1024px) {
				margin-top: 10px;
			}
		}

		h4 {
			color: #999999;
		}
	}

	.liked {
		img {
			margin-right: 4px;
		}

		h4 {
			color: $Red;
		}
	}
</style>
