<<template>
  <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <textarea cols="5" class="form-control" v-model="content"> </textarea>
                        <br>
                        <button class="pull-right btn btn-primary" :disabled="not_working" @click="create_post()"> Post </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  mounted(){
      
  },
  data(){

      return {
          content: '',
          not_working: true

      }
  },

  methods:{
      create_post(){

          axios.post('/create/post', {content: this.content})
          .then((response) => {
            this.content = ''
            noty({
                    type: 'success',
                    layout: 'bottomLeft',
                    text: 'Posted successfully!'
                })
            console.log(response)
          })
      }

  },

  watch:{
      content(){
          if(this.content.length > 0)
            this.not_working = false

        else
            this.not_working = true
      }
  }
}
</script>
