<template>

        <div>
            <p class="text-center" v-if="loading">
               loading...
            </p>

            <p class="text-center" v-if="!loading">
                <button class="btn btn-primary" v-if="status =='not_friends' " @click="add_friend"> add friend </button>
                <button class="btn btn-success" v-if="status =='pending' " @click="accept_friend"> accept friend </button>
                <span class="text-default" v-if="status =='waiting'"> friend request sent </span>
                <span class="text-success" v-if="status =='friends'"> friends </span>
            </p>  
        </div>

</template>

<script>
    export default {

        mounted() {
           axios.get('/get_relationship_status/' + this.profile_user_id)
           .then( (response)=> {
               console.log(response)
                this.status = response.data.status
                this.loading = false
               
           })
        },

        props: ['profile_user_id'],

        data() {

            return {
                status: '',
                loading: true
            }
        },

        methods: {

            add_friend(){

                loading: true
                axios.get('/add_friend/'+ this.profile_user_id)
                .then( (response)=>{
                    if(response.data == 1){

                        this.status = 'waiting'

                        noty({
                            type:'success',
                            layout: 'bottomLeft',
                            text: 'Friend request sent'
                        })

                        loading: false
                    }
                })
            },

            accept_friend(){

                loading: true
                axios.get('/accept_friend/'+ this.profile_user_id)
                .then( (response)=>{
                    if(response.data == 1){

                        this.status = 'friends'

                        noty({
                            type:'success',
                            layout: 'bottomLeft',
                            text: 'Friend request accepted!'
                        })

                        loading: false
                    }
                })


            }
        }

        
    }
</script>
