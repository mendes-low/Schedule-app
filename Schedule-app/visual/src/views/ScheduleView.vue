<template>
  <div class="days-wrapper" v-if="schedule">
    <div class="day-wrapper" v-for="i in Object.entries(schedule)" :key="i">
      <div class="day-title">{{ days[i[0]] }}</div>
      <div class="lessons-wrapper">
        <div class="lesson-item" v-for="j in i[1]" :key="j">
          <div class="lesson-left">
            <div class="lesson-time">
              {{ j.time_start }}<br>{{j.time_end}}
            </div>
          </div>
          <div class="lesson-right">
            <div class="lesson-header">{{ j.title }}</div>
            <div class="lesson-paragraph">Ғимарат: {{ j.corps }} </div>
            <div class="lesson-paragraph">Аудитория: {{ j.audience }} </div>
            <div class="lesson-paragraph">{{ j.teacher }} {{ j.lesson_type }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.day-title{
  font-family: 'Poppins', sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 1.71rem;
  line-height: 100%;
  color: #5A5555;
  margin: 0 0 15px 10px;
}

.lesson-item{
  width: 341px;
  height: 87px;
  left: 101px;
  top: 297px;
  padding: 14px;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  gap: 25px;
  background: #FFFFFF;
  box-shadow: 0px 4px 67px rgba(0, 0, 0, 0.2);
  border-radius: 8px;
}

.lesson-right{
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.lesson-time{
  font-family: 'Poppins', sans-serif;
  font-style: normal;
  font-weight: 400;
  font-size: 1rem;
  line-height: 100%;
  color: #000000;
}

.lesson-header{
  font-family: 'Poppins', sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 1rem;
  line-height: 100%;
  color: #000000;
}

.lesson-paragraph{
  font-family: 'Poppins', sans-serif;
  font-style: normal;
  font-weight: 400;
  font-size: 0.85rem;
  line-height: 100%;
  color: #5A5555;
}

.lessons-wrapper{
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.days-wrapper{
  margin-top: 100px;
  max-width: 100vw;
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
}

@media (max-width: 1400px){
  .days-wrapper{
    justify-content: center;
    align-items: center;
  }
}

@media (max-width: 400px){
  .lesson-item{
    width: 100%;
    gap: 15px;
  }
}
</style>

<script>
export default {
  props: {
    siteLink: String,
    isLogined: Boolean,
  },
  data(){
    return {
      schedule: [],
      days: {"Monday": 'Дүйсенбі', "Tuesday": 'Сейсенбі', "Wednesday": 'Сәрсенбі', "Thursday": 'Бейсенбі', "Friday": 'Жұма', "Saturday": 'Сенбі', "Sunday": 'Жексенбі'}
    }
  },
  methods:{
    isLoginedRedirect(){
      if(!this.isLogined){
        this.$router.push({name: 'home'});
      }
    },
    getSchedule(){
      fetch(`http://${this.siteLink}/api/getTable`, {method: 'GET', mode:'cors', headers: {'token': localStorage.getItem('token')}}).then(gotData => gotData.json())
          .then(response => {
            this.schedule = response;
          }).catch(error => {
        console.log(error)
      });
    }
  },
  updated(){
    this.isLoginedRedirect();
  },
  created(){
    this.getSchedule()
    this.isLoginedRedirect();
  }
}
</script>