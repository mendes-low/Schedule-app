"use strict";(self["webpackChunkschedule"]=self["webpackChunkschedule"]||[]).push([[443],{6914:function(e,s,t){t.r(s),t.d(s,{default:function(){return m}});var a=t(3396),i=t(7139);const d={key:0,class:"days-wrapper"},l={class:"day-title"},n={class:"lessons-wrapper"},r={class:"lesson-left"},c={class:"lesson-time"},o=(0,a._)("br",null,null,-1),h={class:"lesson-right"},u={class:"lesson-header"},p={class:"lesson-paragraph"},g={class:"lesson-paragraph"},w={class:"lesson-paragraph"};function y(e,s,t,y,v,k){return v.schedule?((0,a.wg)(),(0,a.iD)("div",d,[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(Object.entries(v.schedule),(e=>((0,a.wg)(),(0,a.iD)("div",{class:"day-wrapper",key:e},[(0,a._)("div",l,(0,i.zw)(v.days[e[0]]),1),(0,a._)("div",n,[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(e[1],(e=>((0,a.wg)(),(0,a.iD)("div",{class:"lesson-item",key:e},[(0,a._)("div",r,[(0,a._)("div",c,[(0,a.Uk)((0,i.zw)(e.time_start),1),o,(0,a.Uk)((0,i.zw)(e.time_end),1)])]),(0,a._)("div",h,[(0,a._)("div",u,(0,i.zw)(e.title),1),(0,a._)("div",p,"Ғимарат: "+(0,i.zw)(e.corps),1),(0,a._)("div",g,"Аудитория: "+(0,i.zw)(e.audience),1),(0,a._)("div",w,(0,i.zw)(e.teacher)+" "+(0,i.zw)(e.lesson_type),1)])])))),128))])])))),128))])):(0,a.kq)("",!0)}t(7658);var v={props:{siteLink:String,isLogined:Boolean},data(){return{schedule:[],days:{Monday:"Дүйсенбі",Tuesday:"Сейсенбі",Wednesday:"Сәрсенбі",Thursday:"Бейсенбі",Friday:"Жұма",Saturday:"Сенбі",Sunday:"Жексенбі"}}},methods:{isLoginedRedirect(){this.isLogined||this.$router.push({name:"home"})},getSchedule(){fetch(`http://${this.siteLink}/api/getTable`,{method:"GET",mode:"cors",headers:{token:localStorage.getItem("token")}}).then((e=>e.json())).then((e=>{this.schedule=e})).catch((e=>{console.log(e)}))}},updated(){this.isLoginedRedirect()},created(){this.getSchedule(),this.isLoginedRedirect()}},k=t(89);const _=(0,k.Z)(v,[["render",y]]);var m=_}}]);
//# sourceMappingURL=about.c4d2369c.js.map