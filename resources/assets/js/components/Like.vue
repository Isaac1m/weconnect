<template>

    <div> 
        
        
        <span class="text-center" v-for="like in post.likes" :key="like.id">
           <img :src="like.user.avatar" alt="avatar" class="likes-avatar">
        </span>

        <hr>
        <button class="btn btn-primary" v-if="!auth_user_likes_post" @click="like()">Like</button>
        <button class="btn btn-primary" v-else @click="unlike()"> Unlike</button>
    </div>

</template>

<script>
export default {
  mounted(){

  },

  props: ['id'],

  computed:{

      post(){

          return this.$store.state.posts.find((post) =>{
              return post.id === this.id
          })
      },

      likers(){

          var likers = []

          this.post.likes.forEach( (like) =>{

            likers.push(like.user.id)
          })

          return likers

      },

      auth_user_likes_post(){

          var check_index = this.likers.indexOf(
              this.$store.state.auth_user.id
        )

        if(check_index == -1)
            return false
        else
            return true
    }
  },
  
  methods:{

        like(){

            axios.get('/post/like/'+ this.id)
                .then( (response) => {

                    this.$store.commit('update_post_likes',{
                        id: this.id,
                        like: response.data 
                    })

                    noty({
                    type:'success',
                    layout: 'bottomLeft',
                    text: 'Liked!'
                })

                })

                
        },

        unlike(){

            axios.get('/post/unlike/' + this.id)
                .then( (response) =>{
                    this.$store.commit('unlike_post', {
                        post_id: this.id,
                        like_id: response.data
                    })

                     noty({
                        type:'success',
                        layout: 'bottomLeft',
                        text: 'Unliked'
                    })
                })
        }
      },
}
</script>

<style>
    
   .likes-avatar{

        border-radius: 50%;
        height: 30px;
        width:  30px;
        margin-right:5px;
        display: inline;
       
        

    }
</style>

