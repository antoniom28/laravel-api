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
      concatTag(post){
        console.log(post);
        for(let i=0; i<post.tags.length; i++){
          post.content += ` #${post.tags[i].name}`;
        }
      },
      async getPost() {
      let response = await this.makeAxiosCall(`api/posts`);
      //console.log(response.data);
      this.posts.push(...response.data);
      //for(let i=0; i<this.posts.length; i++)
        //this.concatTag(this.posts[i]);
    },
    makeAxiosCall(url) {
      console.log(`call of axos`);
      return axios.get(url, {
        params: {
        },
      });
    },
    },
}
</script>

<style lang="scss" scoped>
</style>