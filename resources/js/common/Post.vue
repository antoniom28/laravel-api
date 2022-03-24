<template>
    <div class="post-box">
        <div class="header">
            <div class="left">
               Foto e Nome Utente
            </div>
            <div class="right">
                <a :href="'admin/posts/'+post.slug">Vai al Post</a>
            </div>
        </div>
        <div class="main">
            <img v-if="post.image" :src="'storage/'+post.image">
            <div v-else class="image-404">
                <h1>{{post.title}}</h1>
            </div>
        </div>
        <div class="footer">
            <div class="comments">
                Comments
            </div>
            <div class="add-comment">
                <input type="text" placeholder="Add a comment">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Post",
    props:{
        post: Object,
    }
}
</script>

<style lang="scss" scoped>
img{
    width: 100%;
}

.post-box{
    overflow: hidden;
    border-radius: 4px;
    border: 2px solid rgb(212, 212, 212);
    width: 600px;
    margin: 20px auto;
    background-color: skyblue;

    .header{
        height: 60px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .add-comment{
        border-top: 2px solid rgb(212, 212, 212);
        height: 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
}

.image-404{
    width: 100%;
    height: 300px;
    background-color: red;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>