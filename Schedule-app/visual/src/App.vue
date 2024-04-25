<template>
  <div class="header-wrapper">
    <header class="header content">
      <div class="logo-wrapper">
        <img src="@/assets/images/logo.svg" alt="Логотип" class="header-logo">
      </div>
      <nav class="header__nav" :class="{'header__nav-opened':isBurgerOpened}">
        <a href="/map.pdf" download class="nav__item btn-style">Кабинеттер</a>
        <div class="nav__button btn-style" @click="loginButton">
          {{isLogined ? "Шығу" : "Кіру"}}
          <img :src="myImageSource" alt="Кіру" class="nav__button__image">
        </div>
      </nav>
      <div class="burger" :class="{'burger-opened':isBurgerOpened}" @click="isBurgerOpened = !isBurgerOpened">
        <div class="burger-line burger-line1"></div>
        <div class="burger-line burger-line2"></div>
        <div class="burger-line burger-line3"></div>
      </div>
    </header>
  </div>
  <main class="main content">
    <router-view :siteLink="siteLink" :isLogined="isLogined" @update-is-logined="isLogined = true"/>
  </main>
  <div class="footer-wrapper">
    <footer class="footer content">

    </footer>
  </div>
</template>

<style>
*{
  box-sizing: border-box;
}
  a{
    text-decoration: none;
  }

  html{
    font-size: 14px;
  }

  body{
    min-height: 100vh;
    width: 100vw;
    padding: 0;
    margin: 0;
    overflow-x: hidden;
  }

  #app{
    width: 100%;
    max-width: 100vw;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow-x: hidden;
  }

  .main{
    width: 100%;
  }

  .content{
    width: 1220px;
    margin-left: auto;
    margin-right: auto;
  }

  .header-wrapper{
    width: 100%;
    background-image: url('@/assets/images/header.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }

  .header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 78px;
  }

  .header-logo{
    height: 45px;
  }

  .nav__item{
    font-family: 'Poppins', sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 20px;
    color: #FDFDFD;
  }

  .nav__button{
    font-family: 'Poppins', sans-serif;
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 18px;
    color: #000000;
    flex: none;
    order: 0;
    flex-grow: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 140px;
    height: 38px;
    background: #FFFFFF;
    border-radius: 12px;
    gap: 8px;
  }

  .nav__button__image{
    height: 20px;
    width: 20px;
  }

  .header__nav{
    display: flex;
    align-items: center;
    gap: 60px;
  }

  .btn-style{
    cursor: pointer;
    -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none;   /* Chrome/Safari/Opera */
    -khtml-user-select: none;    /* Konqueror */
    -moz-user-select: none;      /* Firefox */
    -ms-user-select: none;       /* Internet Explorer/Edge */
    user-select: none;
  }

  .footer-wrapper{
    height: 70px;
    width: 100%;
  }

  .burger{
    position: relative;
    width: 25px;
    height: 20px;
    display: none;
    z-index: 10;
  }

  .burger-opened .burger-line1{
    transform: rotate(45deg);
    top: 10px;
  }

.burger-opened .burger-line2{
  width: 0px;
}

.burger-opened .burger-line3{
  transform: rotate(135deg);
  top: 10px;
}

  .burger-line{
    width: 25px;
    height: 2px;
    position: absolute;
    left: 0;
    background-color: #FFFFFF;
    transition: .4s;
  }

.burger-line1{
  top: 0px;
}

.burger-line2{
  top: 10px;
}

.burger-line3{
  top: 20px;
}

.display-none{
  display: none;
}

  @media(max-width: 1400px){
    .content{
      width: 950px;
    }
  }

@media(max-width: 1100px){
  .content{
    width: 650px;
  }
}

@media(max-width: 900px){
  .content{
    width: 500px;
  }
  html{
    font-size: 13px;
  }
}

@media(max-width: 600px){
  .content{
    width: 85vw;
  }
  .burger{
    display: block;
  }
  .header__nav{
    display: none;
  }
  .header__nav-opened{
    display: block;
    padding-top: 90px;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.65);
    border-radius: 10px;
  }
}
</style>

<script>
export default{
  data(){
    return {
      isLoginedValue: JSON.parse(localStorage.getItem('isLogined')) == true,
      isBurgerOpened: false,
      siteLink: "a0761440.xsph.ru"
    }
  },
  computed:{
    isLogined: {
      get: function (){
        return this.isLoginedValue;
      },
      set: function (value){
        this.isLoginedValue = value;
        localStorage.setItem('isLogined', value);
      }
    },
    myImageSource(){
      return require('@/assets/images/' + (this.isLogined ? 'signout' : 'user') + '.svg');
    }
  },
  methods:{
    loginButton(){
      if(this.isLogined){
        this.isLogined = !this.isLogined;
      }
    }
  }
}
</script>