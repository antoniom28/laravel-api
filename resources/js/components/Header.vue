<template>
  <header>
      <div class="fill-menu"></div>

      <div class="main-menu">
        <div class="menu-left">
          <h1>Boolgram</h1>
        </div>
        <div class="menu-right">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input v-model="inputText" @click="openBox()" @keyup="controlInput" type="text" placeholder="Search">
          <a class="icon" href="/admin/posts/create">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M384 32C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H384zM224 368C237.3 368 248 357.3 248 344V280H312C325.3 280 336 269.3 336 256C336 242.7 325.3 232 312 232H248V168C248 154.7 237.3 144 224 144C210.7 144 200 154.7 200 168V232H136C122.7 232 112 242.7 112 256C112 269.3 122.7 280 136 280H200V344C200 357.3 210.7 368 224 368z"/></svg>
          </a>
        </div>
      </div>

      <div v-if="showSearchBox" class="sub-search">
        <ul>
          <li
            v-for="(user,index) in usersSearched"
            :key="index"
          >
            <span>{{user.name}}</span>
          </li>
        </ul>
      </div>
  </header>
</template>

<script>
export default {
    name: 'Header',
    data(){
      return{
        showSearchBox : false,
        inputText: "",
        prevInput: null,
        usersSearched : [],
      }
    },
    created: function(){
      window.addEventListener('click' , ()=>{
        console.log('ciao');
        if(this.showSearchBox == true)
          this.showSearchBox = false;
      });
    },
    methods:{
      openBox(){
        setTimeout(() => {
          this.showSearchBox = true
        }, 0);
      },
      controlInput(){
        if(this.inputText != "" && this.inputText != this.prevInput){
          this.prevInput = this.inputText;
          this.getUsers();
        } else{
          this.usersSearched = [];
        }
      },
      async getUsers() {
      let response = await this.makeAxiosCall(`api/users/${this.inputText}`);
      console.log(response.data);
      //this.posts.push(...response.data);
      this.usersSearched = response.data;
      //for(let i=0; i<this.posts.length; i++)
        //this.concatTag(this.posts[i]);
    },
    makeAxiosCall(url) {
      console.log(`call of axos`);
      return axios.get(url, {
        params: {
          api_key: "8de7c27ea07119ebc4c79cbfffb7d231",
        },
      });
    },
    }
}
</script>

<style lang="scss" scoped>
.fill-menu{
  height: 60px;
}
.main-menu{
  position: fixed;
  border-bottom: 1px solid #d4d4d4;
  padding: 0 30px;
  top: 0;
  left: 0;
  z-index: 9999;
  width: 100%;
  height: 60px;
  background-color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

a.icon{
  width: 20px;
  height: 20px;
}

.menu-right{
  display: flex;
  justify-content: space-between;
  align-items: center;
}

input{
  border-radius: 6px;
  margin: 0 10px;
  padding: 2px 15px;
  background-color: #d4d4d4;
  height: 30px;
}

.sub-search{
  position: fixed;
  height: 300px;
  z-index: 9999;
  width: 300px;
  left: calc(50% - 150px);
  top: 60px;
  background-color: rgba(250,250,250);
}
</style>