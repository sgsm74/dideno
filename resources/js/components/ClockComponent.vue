<template>
	<div>
		<strong>{{ datenow }}</strong>
	</div>
</template>
<script>
export default {
	data(){
		return{
			datenow:''
		}
		
	},
	methods:{
		time() {
	      var self = this
	      this.datenow = moment().format('hh:mm:ss')

	      setInterval(self.time, 1000)
	    },
	},
	mounted: function(){
	    this.time()
	  }
}
</script>