<template>
	<div>
		<strong>کد تخفیف</strong><br>
		<form @submit.prevent="submit" method="post">
			<div class="input-group input-group-sm">
				<input type="text" class="form-control" name="code" v-model="fields.code">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-info btn-flat">اعمال</button>
				</span>
			</div>
		</form>
		<div style="margin-top: 50px">
			<div class="table-responsive">
			<table class="table">
				<tbody><tr>
					<th style="width:50%">مبلغ کل:</th>
					<td>{{ cost }} تومان</td>
				</tr>
				<tr>
					<th>تخفیف</th>
					<td>{{ discountAmount }} تومان</td>
				</tr>
				<tr>
					<th>مبلغ قابل پرداخت:</th>
					<td>{{ afterDiscount }} تومان</td>
				</tr>
			</tbody></table>
		</div>
		</div>
	</div>
</template>
<script>
	export default{
		mounted() {
            console.log('Component mounted.')
		},
		props:{
			cost:{
				type: String,
			}
		},
		data(){
			return{
				fields:{},
				discountAmount:null,
				afterDiscount:null,
			}
		},
		methods:{
			submit() {
			axios.post('/home/event/discount/calculate', this.fields).then(response => {
				this.discountAmount = response.data.discount;
				this.afterDiscount = response.data.cost;
				iziToast.success({
					message: 'کد تخفیف با موفقیت اعمال شد',
					rtl:true,
					position:'topCenter',
					progressBarColor: 'rgb(0, 255, 184)',
				});
			}).catch(error => {
				iziToast.error({
					message: error.response.data.msg,
					rtl:true,
					position:'topCenter',
					progressBarColor: 'rgb(0, 255, 184)',
				});
			});
			},
		}
	}
</script>