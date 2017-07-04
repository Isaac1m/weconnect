import Vuex from 'vuex'
const Vue = require('vue');

Vue.use(Vuex)

export const store = new Vuex.Store({

    state:{

        notifications: [],
        posts: [],
        auth_user: {}
    },

    getters:{

        all_notifications(state){

            return state.notifications
        },

        all_notifications_count(state){

            return state.notifications.length
        },

        all_posts(state)
        {
            return state.posts
        }

    },

     mutations:{

         add_notification(state, notification){

             state.notifications.push(notification);

         },
         add_post(state, post){

             state.posts.push(post);

         },

         auth_user_data(state, user){

             state.auth_user = user

         },

         update_post_likes(state, payload){

                var post = state.posts.find( (post) =>{

                    return post.id === payload.id
                })

                post.likes.push(payload.like)
         },

         unlike_post(state, payload){
             var post = state.posts.find( (post) =>{

                 return post.id === payload.post_id
             })

             var like = post.likes.find( (like)=>{

                 return like.id === payload.like_id
             })

             var index = post.likes.indexOf(like)

             post.likes.splice(index, 1)
         }

     }
 
})


