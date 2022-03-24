<template>
  <main>
    <div class="all-posts">
      <Post
      v-for="(elem, index) in posts" 
      :key="index" 
      :post="elem" 
      />
    </div>
  </main>
</template>

<script>
//import axios from "axios";
import Post from '../common/Post.vue';

export default {
    name: 'Main',
    data(){
      return{
        posts : [],
      }
    },
    components:{
      Post,
    },
    created: function(){
      this.getPost();
    },
    methods: {
      async getPost() {
      let response = await this.makeAxiosCall(`api/posts`);
      console.log(response.data);
      this.posts.push(...response.data);
    },
    makeAxiosCall(url) {
      console.log(`call of axos`);
      return axios.get(url, {
        params: {
          api_key: "8de7c27ea07119ebc4c79cbfffb7d231",
        },
      });
    },
    },
}
</script>

<style lang="scss" scoped>
</style>