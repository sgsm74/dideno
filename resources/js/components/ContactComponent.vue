<template>

			<form class="row contact_form" @submit.prevent="submit" id="contactForm" novalidate="novalidate">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" v-model="fields.name" placeholder="نام خود را وارد نمایید">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" v-model="fields.email" placeholder="پست الکترونیکی خود را وارد نمایید">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="subject" name="subject" v-model="fields.subject" placeholder="موضوع را وارد نمایید">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea class="form-control" v-model="fields.message" name="message" id="message" rows="1" placeholder="متن پیام را وارد نمایید"></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <button type="submit" class="genric-btn info circle">ارسال پیام</button>
                </div>
                <p v-if="errors.length">
				    <b>لطفا خطاهای زیر را بررسی نمایید</b>
				    <ul>
				      <li v-for="error in errors">{{ error }}</li>
				    </ul>
				</p>
            </form>       
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
		},
		data(){
			return{
				fields:{},
				errors:{}
			}
		},
		methods:{
			submit() {
			this.errors = {};
			axios.post('contact', this.fields).then(response => {
				iziToast.success({
					message: 'با تشکر از شما همکاران ما به زودی با شما تماس خواهند گرفت',
					rtl:true,
					position:'topCenter',
					progressBarColor: 'rgb(0, 255, 184)',
				});
			}).catch(error => {
				if (error.response.status === 422) {
				this.errors = error.response.data.errors || {};
				}
			});
			},
		}
    }
</script>
				

                