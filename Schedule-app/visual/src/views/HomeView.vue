<template>
  <section class="section">
    <div class="login-wrapper">
      <span class="login-title">Авторизация</span>
      <form action="" class="login-form">
        <div class="form-item">
          <label class="form-label" for="login">Кіру</label>
          <input v-model="login" type="text" id="login" class="form-input" placeholder="Логинді енгізіңіз">
        </div>
        <div class="form-item">
          <label class="form-label" for="password">Құпия сөз</label>
          <input v-model="password" type="password" id="password" placeholder="құпия сөзді еңгізіңіз" class="form-input">
        </div>
      </form>
      <div class="login-button btn-style" @click="authorize">Кіру</div>
      <div class="lower-text">{{message !== '' ? message : " "}}</div>
    </div>
  </section>
</template>

<style>
.section{
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
}
.login-wrapper{
  max-width: 480px;
  width: 100%;
  height: 450px;
  background: #FFFFFF;
  box-shadow: 0px 4px 67px rgba(0, 0, 0, 0.2);
  border-radius: 34px;
  padding: 29px 45px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.login-title{
  font-family: 'Montserrat', sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 2.28rem;
  color: #000000;
}

.form-label{
  font-family: 'Montserrat', sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 1.42rem;
  color: #2E3237;
}

.form-input{
  width: 100%;
  height: 55px;
  border: 2px solid #DE0A34;
  border-radius: 18px;
  font-family: 'Montserrat', sans-serif;
  font-style: normal;
  font-weight: 400;
  font-size: 1.42rem;
  color: #000000;
  padding: 5px 10px;
}

.form-item{
  display: flex;
  flex-direction: column;
  gap: 8px;
  width: 100%;
}

.login-form{
  display: flex;
  flex-direction: column;
  gap: 24px;
  align-items: center;
  justify-content: center;
  margin-top: 30px;
  width: 100%;
}

.login-button{
  width: 100%;
  height: 54px;
  background: #DE0A34;
  border-radius: 18px;
  font-family: 'Montserrat', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 1.21rem;
  color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 10px;
}

.lower-text{
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  font-size: 1.42rem;
  line-height: 100%;
  color: #2E3237;
  margin-top: 10px;
}

@media (max-width: 900px){
  .login-button{
    margin-top: 20px;
  }

  .login-form{
    gap: 16px;
  }

  .login-wrapper{
    padding: 30px;
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
      login: '',
      password: '',
      message: ''
    }
  },
  methods:{
    isLoginedRedirect(){
      if(this.isLogined){
        this.$router.push({name: 'schedule'});
      }
    },
    authorize(){
      const data = new URLSearchParams();
      data.append("login", this.login);
      data.append("password", this.password);
      fetch(`http://${this.siteLink}/api/auth`, {method: 'POST', mode:'cors', body: data}).then(gotData => gotData.json())
          .then(response => {
            this.message = response.message;
            if(JSON.parse(response?.status)){ // залогинился крч
              localStorage.setItem('token', response.api_token);
              this.$emit("update-is-logined");
              this.isLoginedRedirect();
            }
          }).catch(error => {
            console.log(error)
      });
    }
  },
  updated(){
    this.isLoginedRedirect();
  },
  created(){
    this.isLoginedRedirect();
  }
}
</script>

