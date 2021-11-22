<template>
    <main>
        <h2>
            main
            <ul>
                <li v-for="post in this.posts">{{post.title}}</li>
            </ul>
        </h2>
    </main>
</template>
<script>
    import axios from 'axios';
    export default{
        name:'Main',
        data(){
            return{
                posts:[],
            }
        },
        mounted () {
            axios.get('/api/posts')
            .then((response)=>{
                this.posts=response.data.data;
                // console.log(this.posts);
            })
        }
    }
</script>