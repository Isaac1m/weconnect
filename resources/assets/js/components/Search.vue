<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <input type="text" class=" form-control" placeholder="Find Your Friends" v-model="query" @keyup.enter="search()">
                <br>
                <div class="row" v-if="results.length > 0">
                    <div class="row" v-for="user in results" :key="user.id">
                        <img :src="user.avatar" class="search-res-avatar pull-left col-lg-offset-1">
                        <a :href="profile_url(user.slug)" class="profile-url">
                            <span> {{user.name}} </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

    var algoliasearch = require('algoliasearch');
    var client = algoliasearch("CKI9VLN58G", "0e9bb198ec5da114e61301db834cc282");
    var index = client.initIndex('users');

    export default {
        mounted(){


        }, 
        data(){

            return {
                query:' ',
                results: []
            } 
        },
        methods:{
            search() {
                    index.search(this.query, { hitsPerPage: 5},(err, content) => {
                              this.results = content.hits
                        })
                },
        
                   profile_url(slug) {
                         const url = "http://weconnect.dev/profile/"
                         return url + slug
                         
                   }
             }
    }
</script>

<style>
   .search-res-avatar{
        height: 20px;
        width: 20px;
        border-radius: 50%;
        margin-right: 5px;     
   }

  * a{
       list-style: none;
   }
</style>


