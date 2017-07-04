<template>
  <div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default" v-for="post in posts" :key="post.id">
                <div class="panel-heading">
                    <img :src="post.user.avatar" class="avatar-feed">
                    {{post.user.name}}
                    <span class="pull-right"> {{ post.created_at  | moment("from", "now") }} </span>
                </div>

                <div class="panel-body"> 
                    <p class="text-center">
                        {{post.content}}
                    </p>
                    <like :id="post.id"></like>
                </div>
            </div>
        </div>
    </div>
</div> 
</template>

<script>

import Like from './Like.vue'

export default {

    mounted(){

        this.get_feed()
    },

    components:{

        Like

    },

    methods:{

        get_feed()
        {
            axios.get('/feed')
             .then((response) =>{
                 response.data.forEach((post)=>{
                    this.$store.commit('add_post',post)
                 })
            })
        }
    },

    computed:{

        posts(){

            return this.$store.getters.all_posts
        }
    }
  
}
</script>

<style>
    .avatar-feed{
        margin-right: 10px;
        border-radius: 50%;
        height:40px;
        width: 40px;
    }
</style>
