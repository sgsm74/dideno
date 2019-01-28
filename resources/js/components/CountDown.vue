<template>
    <div class="event_time_area">
        <div class="event_time_inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="event_text">
                        <h3>{{ desc }}</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="timer_inner">
                        <div class="timer" style="opacity: 1;">
                            <div class="timer__section seconds">
                                <div class="timer__number">{{ seconds | twoDigits }}</div>
                                <div class="timer__label">ثانیه</div>
                            </div>
                            <div class="timer__section minutes">
                                <div class="timer__number">{{ minutes | twoDigits }}</div>
                                <div class="timer__label">دقیقه</div>
                            </div>
                             <div class="timer__section hours">
                                <div class="timer__number">{{ hours | twoDigits }}</div>
                                <div class="timer__label">ساعت</div>
                            </div>
                            <div class="timer__section days">
                                <div class="timer__number">{{ days | twoDigits }}</div>
                                <div class="timer__label">روز</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
let interval = null;
export default {
    name: 'vuejsCountDown',
    props: {
        deadline: {
            type: String
        },
        end: {
            type: String
        },
        stop: {
            type: Boolean
        },
        desc:null,
    },
    data() {
        return {
            now: Math.trunc((new Date()).getTime() / 1000),
            date: null,
            diff: 0
        }
    },
    created() {
        if (!this.deadline && !this.end) {
            throw new Error("Missing props 'deadline' or 'end'");
        }
        let endTime = this.deadline ? this.deadline : this.end;
        this.date = Math.trunc(Date.parse(endTime.replace(/-/g, "/")) / 1000);
        if (!this.date) {
            throw new Error("Invalid props value, correct the 'deadline' or 'end'");
        }
        interval = setInterval(() => {
            this.now = Math.trunc((new Date()).getTime() / 1000);
        }, 1000);
    },
    computed: {
        seconds() {
            return Math.trunc(this.diff) % 60
        },
        minutes() {
            return Math.trunc(this.diff / 60) % 60
        },
        hours() {
            return Math.trunc(this.diff / 60 / 60) % 24
        },
        days() {
            return Math.trunc(this.diff / 60 / 60 / 24)
        }
    },
    watch: {
        now(value) {
            this.diff = this.date - this.now;
            if(this.diff <= 0 || this.stop){
                this.diff = 0;
                // Remove interval
                clearInterval(interval);
            }
        }
    },
    filters: {
        twoDigits(value) {
            if ( value.toString().length <= 1 ) {
                return '0'+value.toString()
            }
            return value.toString()
        }
    },
    destroyed() {
        clearInterval(interval);
    }
}
</script>
<style>
.vuejs-countdown {
  padding: 0;
  margin: 0;
}
.vuejs-countdown li {
  display: inline-block;
  margin: 0 8px;
  text-align: center;
  position: relative;
}
.vuejs-countdown li p {
    margin: 0;
}
.vuejs-countdown li:after {
  content: ":";
  position: absolute;
  top: 0;
  right: -13px;
  font-size: 32px;
}
.vuejs-countdown li:first-of-type {
  margin-left: 0;
}
.vuejs-countdown li:last-of-type {
  margin-right: 0;
}
.vuejs-countdown li:last-of-type:after {
  content: "";
}
.vuejs-countdown .digit {
  font-size: 32px;
  font-weight: 600;
  line-height: 1.4;
  margin-bottom: 0;
}
.vuejs-countdown .text {
  text-transform: uppercase;
  margin-bottom: 0;
  font-size: 10px;
}
</style>