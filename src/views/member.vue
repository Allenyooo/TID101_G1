<template>
	<div class="member_wrapper">
		<!--麵包屑-->
		<ol class="breadcrumb">
			<li class="crumb1">
				<router-link to="/home">首頁</router-link>
				<img src="/src/assets/Image/restaurant/north/left.png" alt="" />
			</li>
			<li class="crumb2">
				<a href="#">會員首頁</a>
			</li>
		</ol>

		<!--user photo-->
		<h2 class="member_title">會員資料</h2>

		<section
			class="member_user"
			v-for="(detail, index) in details"
			:key="index"
		>
			<div class="user_name">
				<!-- 新增大頭貼 -->
				<div class="user_photo">
					<div class="box1">
						<img
							ref="preview"
							:src="imageSrc? imageSrc : (detail.PHOTO === null? '/tid101/g1/src/assets/Image/member/Person.png' : detail.PHOTO)"
							alt="profile pic"
							id="profilePic"
						/>
						<input
							type="file"
							id="user_input"
							v-if="!imageSrc"
							@change="fileChange"
							accept="image/*"
						/>
					</div>
				</div>
				<h2>{{ detail.NAME }}</h2>
			</div>

			<ul class="member_container">
				<h4 class="member_labeltwo">會員資訊</h4>

				<li>
					<label for="container_name">會員姓名</label>
					<input
						type="text"
						id="container_name"
						:value="detail.NAME"
						disabled
					/>
				</li>

				<li>
					<div>
						<label for="container_nickname">會員暱稱</label>
						<button @click="shownickname = true">
							<img
								src="/src/assets/Image/member/PencilSquare.svg"
								alt="edit"
							/>
						</button>
					</div>
					<input
						type="text"
						id="container_nickname"
						v-model="detail.NICKNAME"
						disabled
					/>
				</li>

				<!--修改暱稱彈窗-->
				<div
					class="modal"
					v-if="shownickname"
					@click.self="shownickname = false"
				>
					<div class="pop_container">
						<h4>會員暱稱修改</h4>
						<label for="newNickname">新的暱稱</label>
						<input
							type="text"
							id="newNickname"
							v-model="newNickname"
							placeholder="請輸入新的暱稱"
						/>
						<button class="modal__confirm" @click="updateNickname">
							確認
						</button>
					</div>
				</div>

				<!-- 成功彈窗 -->
				<div class="modal" v-if="shownNicknameSuccess">
					<div class="pop_container">
						<h4>成功訊息</h4>
						<img src="../assets/Image/member/success.svg" alt="" />
						<p>成功修改暱稱為：{{ newNickname }}</p>
						<button
							class="modal__confirm"
							@click="closeNicknameSuccessModal"
						>
							確認
						</button>
					</div>
				</div>

				<li>
					<div>
						<label for="container_phone">電話號碼</label>
						<button @click="showniPhone = true">
							<img
								src="/src/assets/Image/member/PencilSquare.svg"
								alt="edit"
							/>
						</button>
					</div>
					<input
						type="tel"
						id="container_phone"
						v-model="detail.PHONE"
						pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}"
						disabled
					/>
				</li>

				<!--修改電話號碼彈窗-->
				<div
					class="modal"
					v-if="showniPhone"
					@click.self="showniPhone = false"
				>
					<div class="pop_container">
						<h4>會員電話號碼修改</h4>
						<label for="newPhone">新的電話號碼</label>
						<input
							type="text"
							id="newPhone"
							v-model="newiPhone"
							placeholder="0 9 * * - * * * - * * *"
						/>
						<button class="modal__confirm" @click="updatePhone">
							確認
						</button>
					</div>
				</div>

				<!-- 成功彈窗 -->
				<div class="modal" v-if="showniPhoneSuccess">
					<div class="pop_container">
						<h4>成功訊息</h4>
						<img src="../assets/Image/member/success.svg" alt="" />
						<p>成功修改電話號碼為：{{ newiPhone }}</p>
						<button
							class="modal__confirm"
							@click="closeSuccessModal"
						>
							確認
						</button>
					</div>
				</div>

				<!--Error-->
				<div class="modal" v-if="phoneError">
					<div class="pop_container">
						<h4>錯誤訊息</h4>
						<img src="../assets/Image/member/error.svg" alt="" />
						<p>{{ phoneError }}</p>
						<button
							class="modal__confirm"
							@click="closePhoneErrorModal"
						>
							確認
						</button>
					</div>
				</div>

				<li>
					<label for="container_email">電子信箱</label>
					<input
						type="text"
						id="container_email"
						:value="detail.MAIL"
						onfocus="(this.type='date')"
						disabled
					/>
				</li>

				<li>
					<div>
						<label for="container_password">會員密碼</label>
						<img
							src="/src/assets/Image/member/PencilSquare.svg"
							alt="edit"
						/>
						<button
							@click="
								showModal = true;
								console.log('showModal:', showModal);
							"
						></button>
					</div>

					<!--開眼閉眼功能-->
					<div class="password-input">
						<input
							type="password"
							id="container_password"
							:value="detail.PASSWORD"
							disabled
							v-if="eyeClose"
						/>

						<input
							type="text"
							name="password"
							id="container_password"
							v-model="detail.PASSWORD"
							readonly
							v-else
						/>

						<img
							src="../assets/Image/member/eye-closed.svg"
							alt="eyeClosed"
							class="eye"
							v-if="eyeClose"
						/>

						<img
							src="../assets/Image/member/eye.svg"
							alt="eyeOpen"
							class="eye"
							v-else
						/>

						<button
							class="eye-toggle"
							@click="eyeClose = !eyeClose"
						></button>
					</div>
				</li>

				<!-- 修改密碼start -->
				<div
					class="modal"
					v-if="showModal"
					@click.self="showModal = false"
				>
					<div class="pop_container">
						<h4>修改密碼</h4>
						<label for="old_PW">輸入舊密碼</label>

						<div class="password-input">
							<input
								:type="eyeCloseOld ? 'password' : 'text'"
								id="old_PW"
								v-model="oldPassword"
								placeholder="請注意字母大小寫"
							/>
							<img
								v-if="!eyeCloseOld"
								src="../assets/Image/member/eye.svg"
								alt="eye"
								class="eye"
								@click="toggleEye('old')"
							/>
							<img
								v-else
								src="../assets/Image/member/eye-closed.svg"
								alt="eyeclosed"
								class="eye"
								@click="toggleEye('old')"
							/>
							<button
								class="eye-toggle"
								@click="eyeCloseOld = !eyeCloseOld"
							></button>
						</div>

						<label for="new_PW">輸入新密碼</label>
						<div class="password-input">
							<input
								:type="eyeCloseNew ? 'password' : 'text'"
								id="new_PW"
								v-model="newPassword"
								placeholder="至少8個字元，英文數字不限"
							/>
							<img
								v-if="!eyeCloseNew"
								src="../assets/Image/member/eye.svg"
								alt="eye"
								class="eye"
								@click="toggleEye('new')"
							/>
							<img
								v-else
								src="../assets/Image/member/eye-closed.svg"
								alt="eyeclosed"
								class="eye"
								@click="toggleEye('new')"
							/>
							<button
								class="eye-toggle"
								@click="eyeCloseNew = !eyeCloseNew"
							></button>
						</div>

						<label for="repeat_PW">重新輸入新密碼</label>
						<div class="password-input">
							<input
								:type="eyeCloseConfirm ? 'password' : 'text'"
								id="repeat_PW"
								v-model="confirmPassword"
								placeholder="請再次輸入相同的密碼"
							/>
							<img
								v-if="!eyeCloseConfirm"
								src="../assets/Image/member/eye.svg"
								alt="eye"
								class="eye"
								@click="toggleEye('confirm')"
							/>
							<img
								v-else
								src="../assets/Image/member/eye-closed.svg"
								alt="eyeclosed"
								class="eye"
								@click="toggleEye('confirm')"
							/>
							<button
								class="eye-toggle"
								@click="eyeCloseConfirm = !eyeCloseConfirm"
							></button>
						</div>
						<button
							class="modal__confirm"
							@click="validatePassword"
						>
							確認
						</button>
					</div>
				</div>
				<!-- 修改密碼end -->

				<!-- Error Modal -->
				<div class="modal" v-if="passwordError">
					<div class="pop_container">
						<h4>錯誤訊息</h4>
						<img src="../assets/Image/member/error.svg" alt="" />
						<p>{{ passwordError }}</p>
						<button class="modal__confirm" @click="closeErrorModal">
							確認
						</button>
					</div>
				</div>
				<!-- Error Modal End -->

				<!-- Success Modal -->
				<div class="modal" v-if="passwordSuccess">
					<div class="pop_container">
						<h4>成功訊息</h4>
						<img src="../assets/Image/member/success.svg" alt="" />
						<p>修改密碼成功</p>
						<p v-if="updatedPassword">
							新密码：{{ updatedPassword }}
						</p>
						<button
							class="modal__confirm"
							@click="closeSuccessModal"
						>
							確認
						</button>
					</div>
				</div>
				<!-- Success Modal End -->

				<li>
					<label for="container_birthday">生日日期</label>
					<input
						type="text"
						id="container_birthday"
						:value="detail.BIRTHDAY"
						onfocus="(this.type='date')"
						disabled
					/>
				</li>
			</ul>
		</section>

		<!--collect-->
		<section class="member_collection">
			<h4>我的收藏</h4>
			<ul class="card_container">
				<ShopCard
					class="card"
					v-for="(shop, index) in shops"
					:key="shop.ID"
					:shop="shop"
					:isHoverEnabled="aaa"
				/>
			</ul>
		</section>

		<!--voucher-->
		<!-- <section class="member_voucher">
			<h4>優惠券</h4>
			<div class="voucher_code">
				<input
					type="text"
					placeholder="&#127991; 輸入優惠碼"
					class="voucher_number"
				/>
				<input type="submit" value="確認" class="voucher_sure" />
			</div>

			<table class="voucher_data">
				<tr>
					<th>
						<h5>優惠序號</h5>
					</th>
					<th>
						<h5>有效日期</h5>
					</th>
					<th>
						<h5>備註</h5>
					</th>
				</tr>
				<tr>
					<td>Q7R89A1</td>
					<td>2025/06/11</td>
					<td>僅限使用一次</td>
				</tr>
			</table>
		</section> -->

		<!--my ticket-->
		<section class="member_ticket">
			<h4>我的訂單</h4>

			<table class="ticket_data">
				<thead>
					<tr>
						<th>
							<h5>訂單序號</h5>
						</th>
						<th>
							<h5>訂單成立日期</h5>
						</th>
						<th>
							<h5>有效日期</h5>
						</th>
						<th>
							<h5>備註</h5>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="order in orders" :key="order.ID">
						<td>
							<router-link
								@click.native="setOrderIdCookie(order.ID)"
								:to="`/receipt`"
								>{{ order.ID }}</router-link
							>
						</td>
						<td>{{ order.ORDERDATE }}</td>
						<td>{{ getEndDate(order.ORDERDATE) }}</td>
						<td>僅限使用一次</td>
					</tr>
				</tbody>
			</table>
		</section>

		<div class="buttons">
			<router-link to="/Home" class="btn btn-primary return"
				>返回首頁</router-link
			>
			<button class="logout" @click="logout">登出</button>
		</div>
	</div>
</template>

<script>
	//掛載shopCard
	import ShopCard from "../components/Shopcard.vue";
	import axios from "axios";

	export default {
		name: "Member",
		components: {
			ShopCard,
		},
		data() {
			return {
				aaa: false,
				imageSrc: "",

				shownickname: false, //修改暱稱closePhoneErrorModal
				shownNicknameSuccess: false,
				newNickname: "",

				showniPhone: false,
				newiPhone: "",
				phoneError: "",
				showniPhoneSuccess: false,

				showModal: false,
				eyeClose: true,
				password: "",
				eyeCloseOld: true,
				eyeCloseNew: true,
				eyeCloseConfirm: true,
				oldPassword: "",
				newPassword: "",
				confirmPassword: "",
				passwordError: null,
				passwordSuccess: false,

				details: [],
				shops: [],
				orders: [],

				updatedPassword: "",
			};
		},
		methods: {
			setOrderIdCookie(orderID) {
				document.cookie = `orderID=${orderID};path=/`;
			},

			logout() {
				document.cookie =
					"memberId=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/;";
				document.cookie =
					"token=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/;";
				this.$router.push({ path: "/login" });
			},
			getCookie(name) {
				let value = "; " + document.cookie;
				let parts = value.split("; " + name + "=");
				if (parts.length === 2) return parts.pop().split(";").shift();
				return null;
			},

			async fetchDetails() {
				try {
					const memberId = this.getCookie("memberId");
					const response = await axios.get(
						`${import.meta.env.VITE_PHP_PATH}member/details.php`,
						{
							params: {
								memberId: memberId,
							},
						}
					);
					// console.log(response.data);
					this.details = response.data;
				} catch (error) {
					console.error("Error fetching details:", error);
				}
			},

			async fetchShops() {
				try {
					const memberId = this.getCookie("memberId");
					const response = await axios.get(
						`${import.meta.env.VITE_PHP_PATH}member/card.php`,
						{
							params: {
								memberId: memberId,
							},
						}
					);
					this.shops = response.data;
				} catch (error) {
					console.error("Error fetching shops:", error);
				}
			},

			async fetchOrders() {
				try {
					const memberId = this.getCookie("memberId");
					const response = await axios.get(
						`${import.meta.env.VITE_PHP_PATH}member/orders.php`,
						{
							params: {
								memberId: memberId,
							},
						}
					);
					this.orders = response.data;
				} catch (error) {
					console.error("Error fetching details:", error);
				}
			},

			getEndDate(orderDate) {
				const [year, month, day] = orderDate.split("-");
				return `${parseInt(year) + 1}-${month}-${day}`;
			},

			closeModal() {
				//修改完畢關閉彈窗
				this.showModal = false;
			},
			closeErrorModal() {
				this.passwordError = null;
			},
			closeSuccessModal() {
				this.passwordSuccess = false;
				// this.iPhoneSuccessModal = false;  //修改電話成功後彈窗按下確定後關閉彈窗，不能被關閉
			},
			closeNicknameSuccessModal() {
				this.shownNicknameSuccess = false; //修改會員暱稱成功v-if(shownNicknameSuccess)  = false;
				this.shownickname = false;
			},
			closeiPhoneSuccessModal() {
				//修改電話號碼
				this.showniPhoneSuccess = false;
				this.showniPhone = false;
			},
			closePhoneErrorModal() {
				this.showniPhone = false;
				this.phoneError = "";
			},
			closeSuccessModal() {
				this.showniPhoneSuccess = false;
				this.passwordSuccess = false;
			},
			//修改密碼眼睛各別控制
			toggleEye(type) {
				if (type === "old") {
					this.eyeCloseOld = !this.eyeCloseOld;
				} else if (type === "new") {
					this.eyeCloseNew = !this.eyeCloseNew;
				} else if (type === "confirm") {
					this.eyeCloseConfirm = !this.eyeCloseConfirm;
				}
			},
			closePhoneErrorModal() {
				this.phoneError = "";
				this.showniPhone = false;
			},
			closeiPhoneSuccessModal() {
				this.showniPhoneSuccess = false;
				this.showniPhone = false;

				// 未輸入訊息時候設定
				if (this.newPassword === "" || this.confirmPassword === "") {
					this.passwordError = "您尚未輸入訊息";
					return;
				}
				if (this.newPassword !== this.confirmPassword) {
					this.passwordError = "新密碼和確認密碼不相符";
					return;
				}
				this.passwordSuccess = true;
				this.showModal = false;
			},

			async updateNickname() {
				try {
					const nicknamePattern = /^[a-zA-Z0-9_]{1,20}$/; // adjust the pattern to your needs
					if (nicknamePattern.test(this.newNickname)) {
						const user = this.details.find(
							(u) => u.ID === this.selectedUserId
						);
						if (user) {
							user.NICKNAME = this.newNickname;
						} else {
							console.error(
								`User with ID ${this.selectedUserId} not found`
							);
						}
						this.shownNicknameSuccess = true;
						this.shownNickname = false;
						this.nicknameError = "";

						const memberId = this.getCookie("memberId");
						const url = `${
							import.meta.env.VITE_PHP_PATH
						}member/nicknameUpdate.php`;
						const params = {
							memberId,
							newNickname: this.newNickname,
						};
						const response = await axios.post(url, params);
						if (response.data.success) {
							console.log("Nickname updated successfully");
						} else {
							console.error(
								"Error updating nickname:",
								response.data.error
							);
						}
					} else {
						this.nicknameError = "暱稱格式不正確。";
					}
				} catch (error) {
					console.error("Error updating nickname:", error);
				}
			},

			async updatePhone() {
				try {
					const phonePattern = /^[0-9]{4}-[0-9]{3}-[0-9]{3}$/;
					if (phonePattern.test(this.newiPhone)) {
						const user = this.details.find(
							(u) => u.ID === this.selectedUserId
						);
						if (user) {
							user.PHONE = this.newiPhone;
						} else {
							console.error(
								`User with ID ${this.selectedUserId} not found`
							);
						}
						this.showniPhoneSuccess = true;
						this.showniPhone = false;
						this.phoneError = "";

						const memberId = this.getCookie("memberId");
						const url = `${
							import.meta.env.VITE_PHP_PATH
						}member/phoneUpdate.php`;
						const params = { memberId, newiPhone: this.newiPhone };
						const response = await axios.post(url, params);
						if (response.data.success) {
							console.log("Phone number updated successfully");
						} else {
							console.error(
								"Error updating phone:",
								response.data.error
							);
						}
					} else {
						this.phoneError = "電話號碼格式不正確。";
					}
				} catch (error) {
					console.error("Error updating phone:", error);
				}
			},

			//修改密碼
			async validatePassword() {
				try {
					if (this.newPassword !== this.confirmPassword) {
						this.passwordError = "新密碼和確認密碼不符合";
						return;
					}

					const passwordPattern = /^(?=.*[a-zA-Z])(?=.*[0-9]).{8,}$/; // adjust the pattern to your needs
					if (!passwordPattern.test(this.newPassword)) {
						this.passwordError = "密碼格式不正確";
						return;
					}

					const memberId = this.getCookie("memberId");
					const url = `${
						import.meta.env.VITE_PHP_PATH
					}member/pwUpdate.php`;
					const params = { memberId, newPassword: this.newPassword };
					const response = await axios.post(url, params);
					if (response.data.success) {
						console.log("Password updated successfully");
						this.passwordSuccess = true;
						this.showModal = false;
					} else {
						console.error(
							"Error updating password:",
							response.data.error
						);
					}
				} catch (error) {
					console.error("Error updating password:", error);
				}
			},

			//照片類型
			fileChange(event) {
				const file = event.target.files[0];
				this.checkImageSize(file);
			},

			//照片大小限制00px內
			checkImageSize(file) {
				const reader = new FileReader();
				reader.onload = (e) => {
					const base64String = e.target.result;
					this.imageSrc = base64String; // Update the imageSrc variable
					this.uploadImageToServer(base64String);
				};
				reader.readAsDataURL(file);
			},

			uploadImageToServer(base64String) {
				axios
					.post(
						`${
							import.meta.env.VITE_PHP_PATH
						}member/profilePicUpload.php`,
						{
							memberId: this.getCookie("memberId"),
							image: base64String,
						},
						{
							headers: {
								"Content-Type": "application/json",
							},
						}
					)
					.then((response) => {
						console.log(response);
					})
					.catch((error) => {
						console.error(error.response.data);
					});
			},

			validatePhone() {
				const phonePattern = /^[0-9]{4}-[0-9]{3}-[0-9]{3}$/;
				if (!this.newiPhone) {
					this.phoneError = "請輸入電話號碼";
				} else if (!phonePattern.test(this.newiPhone)) {
					this.phoneError = "格式錯誤";
				} else {
					this.showniPhoneSuccess = true;
					this.showniPhone = false;
					this.phoneError = "";
				}
			},
		},
		created() {
			this.fetchDetails();
			this.fetchShops();
			this.fetchOrders();
		},
	};
</script>

<style lang="scss" scoped>
	@import "/src/sass/style.scss";

	#profilePic {
		width: 200px;

		@include breakpoint(430px) {
			width: 100px;
		}
	}
	
	.card_container {
		display: grid;
		grid-template-rows: auto;
		grid-template-columns: 1fr 1fr;
		overflow: hidden;
		width: 80%;
		margin: 0 auto;

		@include breakpoint(1280px) {
			width: 90%;
		}

		@include breakpoint(1024px) {
			display: block;
		}

		@include breakpoint(820px) {
			display: block;
		}

		@include breakpoint(430px) {
			margin: 0 auto;
		}
	}

	.card {
		width: fit-content;
		margin: 0 auto;

		@include breakpoint(1024px) {
			margin-bottom: 40px;
		}

		@include breakpoint(430px) {
			background-color: #fff;
			width: 312px;
		}
	}

	.member_wrapper {
		background-color: $OffWhite;

		//麵包屑
		.breadcrumb {
			width: fit-content;
			padding-top: 130px;
			margin-left: 5vw;

			@include breakpoint(430px) {
				margin-left: 12vw;
			}

			.crumb1 {
				a {
					font-size: 16px;
					text-decoration: none;
					color: #000000;

					@include breakpoint(430px) {
						font-size: 14px;
					}

					&:hover {
						color: #999999;
					}
				}

				img {
					padding-left: 1vw;
					padding-right: 1vw;
				}
			}

			.crumb2 {
				a {
					font-size: 16px;
					text-decoration: none;
					color: #000000;

					@include breakpoint(430px) {
						font-size: 14px;
					}

					&:hover {
						color: #999999;
					}
				}
			}
		}

		//user photo
		.member_title {
			margin: 0 auto;
			font-size: 36px;
			display: block;
			width: fit-content;
			margin: 2vh auto 3vh;

			@include breakpoint(430px) {
				font-size: 28px;
				margin: 6vh auto 3vh;
			}
		}

		.member_user {
			background-color: $White;
			border: 1px solid $Gold;
			border-radius: 20px;
			width: 83vw;
			margin: 0 auto 6vh;
			display: flex;
			justify-content: space-evenly;

			@include breakpoint(820px) {
				width: 75vw;
				justify-content: center;
			}

			@include breakpoint(430px) {
				display: block;
				width: 100%;
				border: none;
				background-color: #f6f1ed;
				margin: 0 auto;
			}

			.user_name {
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;

				@include breakpoint(430px) {
					flex-direction: row;
				}

				.user_photo {
					border-radius: 50%;
					width: 200px;
					height: 200px;
					border: 1px solid $Black;
					background-color: $LightGray;
					position: relative;
					margin-bottom: 28px;
					overflow: hidden;

					@include breakpoint(430px) {
						margin-top: 8vw;
						width: 100px;
						height: 100px;
					}

					img {
						height: auto;
						position: absolute;
						top: 50%;
						left: 50%;
						transform: translate(-50%, -50%);
						z-index: 0;
					}

					& input {
						width: 200px;
						height: 200px;
						border-radius: 100%;
						font-size: 11px;
						opacity: 0;
						cursor: pointer;

						@include breakpoint(430px) {
							width: 100px;
							height: 100px;
						}
					}
				}

				h2 {
					font-size: 28px;
					color: $Black;

					@include breakpoint(430px) {
						font-size: 24px;
						margin-left: 4vw;
					}
				}
			}

			.member_container {
				display: flex;
				flex-direction: column;
				text-align: left;
				justify-content: center;
				margin: 5vh 0 3vh;

				@include breakpoint(820px) {
					margin: 5vh 1.5vh 3vh;
				}

				@include breakpoint(430px) {
					margin: 5vh 3vh 5vh;
				}

				@include breakpoint(390px) {
					margin: 2vh 3vh 0vh;
				}

				.member_labeltwo {
					font-weight: 800;
					font-size: 24px;
					color: #000;
					text-align: left;
					margin-bottom: 2vh;

					@include breakpoint(430px) {
						font-size: 16px;
					}

					@include breakpoint(390px) {
						margin-left: 5vw;
					}
				}

				li {
					display: flex;
					flex-direction: column;

					@include breakpoint(390px) {
						margin-left: 5vw;
					}

					label {
						font-size: 16px;
						margin-bottom: 2vh;
					}

					div {
						position: relative;
						width: 90px;

						label {
							font-size: 16px;
						}

						img {
							width: 16px;
							height: 16px;
							margin-left: 8px;
							position: absolute;
							top: 0;
							right: 0;
						}

						button {
							position: absolute;
							top: 0;
							right: 0;
							width: 16px;
							height: 16px;
							cursor: pointer;
							border: none;
							background-color: transparent;
						}
					}

					input {
						margin-bottom: 3vh;
						font-size: 16px;
						width: 330px;
						border: none;
						border-bottom: 1px solid $Black;
						background-color: transparent;

						@include breakpoint(820px) {
							width: 32vw;
						}

						@include breakpoint(430px) {
							width: 78vw;
						}
					}

					.password-input {
						position: relative;
						width: 330px;

						input {
							outline: none;
						}

						.eye {
							//img
							width: 20px;
							height: 20px;
							position: absolute;
							bottom: 0;
							right: 4px;
							position: absolute;

							@include breakpoint(820px) {
								right: 10vw;
							}

							@include breakpoint(430px) {
								right: 10px;
								width: 14px;
								height: 14px;
							}

							@include breakpoint(390px) {
								right: 30px;
							}
						}

						.eye-toggle {
							//button
							width: 20px;
							height: 20px;
							position: absolute;
							bottom: 0;
							right: 4px;
							border: none;
							background-color: transparent;

							@include breakpoint(820px) {
								right: 10vw;
							}

							@include breakpoint(430px) {
								right: 10px;
								width: 14px;
								height: 14px;
							}

							@include breakpoint(390px) {
								right: 30px;
							}
						}
					}
				}

				//修改密碼彈窗star
				.modal {
					position: fixed;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					background-color: rgba(0, 0, 0, 0.5);
					display: flex;
					justify-content: center;
					align-items: center;

					.pop_container {
						width: 50vw;
						background-color: $White;
						border: 1px solid $Gold;
						border-radius: 20px;
						display: flex;
						flex-direction: column;
						align-items: center;

						@include breakpoint(430px) {
							width: 90vw;
						}

						h4 {
							width: 70%;
							font-size: 20px;
							font-weight: bold;
							margin: 3vh 0;
						}

						p {
							font-size: 18px;
							padding-bottom: 14px;
						}

						label {
							width: 70%;
							margin-bottom: 1vh;
							font-weight: normal;
							font-size: 16px;
						}

						.password-input {
							width: 70%;
							margin-bottom: 1vh;
							position: relative;
							::placeholder {
								font-size: 12px;
							}

							input {
								width: 100%;
								height: 30px;
								border: none;
								border-bottom: 1px solid black;
								margin-bottom: 2vh;
							}

							.eye {
								width: 20px;
								position: absolute;
								top: 30%;
								right: 0;
								transform: translateY(-70%);
								margin-right: 10px;
							}

							.eye-toggle {
								width: 20px;
								height: 20px;
								border: none;
								background-color: transparent;
								position: absolute;
								top: 30%;
								right: 0;
								transform: translateY(-70%);
								margin-right: 10px;
								cursor: pointer;
							}
						}

						#newNickname {
							width: 70%;
							height: 30px;
							border: none;
							border-bottom: 1px solid black;
							margin-bottom: 2vh;
						}

						.modal__confirm {
							font-size: 16px;
							width: 20%;
							height: 40px;
							color: $Gold;
							border: 4px solid $Gold;
							border-radius: 15px;
							background-color: $White;
							margin: 2vh;
							cursor: pointer;
						}

						#newPhone {
							width: 70%;
							height: 30px;
							border: none;
							border-bottom: 1px solid black;
							margin-bottom: 2vh;
						}
					}
				}

				.close {
					position: absolute;
					top: 10px;
					right: 10px;
				}
			}
		}

		//collect
		.member_collection {
			background-color: $White;
			border: 1px solid $Gold;
			border-radius: 20px;
			width: 83vw;
			margin: 0 auto 6vh;
			padding-bottom: 28px;

			@include breakpoint(820px) {
				width: 75vw;
			}

			@include breakpoint(430px) {
				width: 85vw;
				padding-bottom: 28px;
				border: none;
				background-color: $White;
			}

			h4 {
				width: 90%;
				font-weight: 800;
				font-size: 24px;
				color: $Black;
				margin: 5vh auto 2vh;

				@include breakpoint(430px) {
					font-size: 16px;
					width: 100%;
					padding-top: 20px;
					margin-left: 10px;
				}

				@include breakpoint(390px) {
					width: 92%;
					margin: 0 auto;
				}
			}
		}

		//voucher
		// .member_voucher {
		// 	background-color: $White;
		// 	border: 1px solid $Gold;
		// 	border-radius: 20px;
		// 	width: 83vw;
		// 	margin: 0 auto 6vh;

		// 	@include breakpoint(820px) {
		// 		width: 75vw;
		// 	}

		// 	@include breakpoint(430px) {
		// 		width: 90vw;
		// 		background-color: #f6f1ed;
		// 		border-radius: 0px;
		// 	}

		// 	h4 {
		// 		width: 90%;
		// 		font-weight: 800;
		// 		font-size: 24px;
		// 		color: $Black;
		// 		margin: 5vh auto 2vh;

		// 		@include breakpoint(430px) {
		// 			font-size: 16px;
		// 			margin: 2vh 3vh 2vh;
		// 		}
		// 	}

		// 	.voucher_code {
		// 		font-size: 15px;
		// 		width: 90%;
		// 		margin: 0 auto 3vh;

		// 		@include breakpoint(430px) {
		// 			margin: 0 auto;
		// 		}

		// 		.voucher_number {
		// 			padding-left: 10px;
		// 			border-radius: 20px;
		// 			width: 50%;
		// 			height: 40px;
		// 			background-color: transparent;

		// 			@include breakpoint(1280px) {
		// 				width: 64%;
		// 			}

		// 			@include breakpoint(700px) {
		// 				width: 83%;
		// 			}

		// 			@include breakpoint(820px) {
		// 				width: 83%;
		// 			}

		// 			@include breakpoint(430px) {
		// 				height: 32px;
		// 				font-size: 14px;
		// 				margin-bottom: 4vw;
		// 			}

		// 			@include breakpoint(390px) {
		// 				width: 60vw;
		// 			}
		// 		}

		// 		.voucher_sure {
		// 			border-radius: 20px;
		// 			height: 40px;
		// 			width: 60px;
		// 			background-color: transparent;
		// 			margin-left: 20px;

		// 			@include breakpoint(430px) {
		// 				width: 48px;
		// 				height: 32px;
		// 				font-size: 14px;
		// 				margin-left: 6px;
		// 			}
		// 		}
		// 	}

		// 	.voucher_data {
		// 		width: 90%;
		// 		margin: 0 auto 4vh;

		// 		@include breakpoint(430px) {
		// 			// margin: 20px 15px;
		// 		}

		// 		tr {
		// 			height: 40px;

		// 			@include breakpoint(430px) {
		// 				font-size: 14px;
		// 			}

		// 			th {
		// 				h5 {
		// 					font-weight: 800;
		// 					color: $Black;

		// 					@include breakpoint(430px) {
		// 						font-size: 14px;
		// 						// text-align: center;
		// 					}
		// 				}
		// 			}

		// 			td {
		// 				color: $Black;

		// 				@include breakpoint(430px) {
		// 					// text-align: center;
		// 				}
		// 			}
		// 		}
		// 	}
		// }

		//my ticket
		.member_ticket {
			background-color: $White;
			border: 1px solid $Gold;
			border-radius: 20px;
			width: 83vw;
			margin: 0 auto 4vh;

			@include breakpoint(820px) {
				width: 76vw;
			}

			@include breakpoint(430px) {
				width: 90vw;
				background-color: #f6f1ed;
				border-radius: 0px;
				font-size: 16px;
			}

			h4 {
				width: 90%;
				font-weight: 800;
				font-size: 24px;
				color: $Black;
				margin: 5vh auto 2vh;

				@include breakpoint(430px) {
					margin: 2vh auto 2vh;
					font-size: 16px;
				}
			}

			.ticket_data {
				width: 90%;
				margin: 0 auto 4vh;

				@include breakpoint(430px) {
					margin: 0;
					width: 100%;
				}

				tr {
					height: 40px;

					@include breakpoint(430px) {
						text-align: center;
					}

					th {
						h5 {
							font-weight: 800;
							color: $Black;

							@include breakpoint(1280px) {
								width: 8vw;
								height: 4vh;
							}

							@include breakpoint(1024px) {
								width: 10vw;
							}

							@include breakpoint(698px) {
								width: 18vw;
							}

							@include breakpoint(820px) {
								width: 12vw;
							}

							@include breakpoint(430px) {
								width: 20vw;
								font-size: 13px;
							}
						}
					}

					td {
						color: $Black;

						@include breakpoint(430px) {
							font-size: 14px;
							text-align: center;
							padding-left: 0vw;
						}

						a {
							color: $Black;
						}
					}
				}
			}
		}

		.buttons {
			margin: 0 auto;
			display: flex;
			width: fit-content;
			gap: 40px;

			.return {
				display: block;
				width: 203px;
				height: 64px;
				background-color: $Gold;
				border-radius: 20px;
				font-size: 20px;
				color: $White;
				border: 4px solid $Gold;
				text-align: center;
				line-height: 60px;
				margin-bottom: 4vh;

				@include breakpoint(430px) {
					font-size: 16px;
					width: 132px;
					height: 42px;
					line-height: 36px;
				}
			}
			.logout {
				display: block;
				width: 203px;
				height: 64px;
				background-color: $White;
				border-radius: 20px;
				font-size: 20px;
				color: $Gold;
				border: 4px solid $Gold;
				text-align: center;
				line-height: 60px;
				margin-bottom: 4vh;

				@include breakpoint(430px) {
					font-size: 16px;
					width: 132px;
					height: 42px;
					line-height: 36px;
				}
			}
		}
	}
</style>
