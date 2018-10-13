<template>
    <transition name="fade">
        <div class="modal fade jar_material" :class="[head_class,{'d-none':!main_opt,'show':main_opt,'d-block':main_opt}]" :id="id"
             tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background: rgba(0,0,0,.58)">
            <div class="modal-dialog" role="document" style="margin-top: 25vh">
                <div class="modal-content">
                    <div class="modal-header" :class="haeder_class">
                        <h5 class="modal-title ml-auto" id="modal_title" style="color:inherit !important;">
                            {{title}}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" @click="m_close" aria-label="Close" style="color:inherit !important; background-color: inherit !important;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <slot name="body"></slot>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <slot name="foot"></slot>
                        <button type="button" class="btn btn-info m-btn m-btn--custom m-btn--air" data-dismiss="modal">
                            {{submit_txt}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </transition>

</template>

<script>
    export default {
        name: "material",
        props:{
            head_class:'',
            id:{
                type:String,
                default:'m_modal_basic'
            },
            option:{
                type:Boolean,
                default:false
            },
            title:{
                type:String,
                default:'Sin Phyu Kyun'
            },
            submit_txt:{
                type:String,
                default:'Submit'
            },
            color:{
                type:String,
                default:'bg1'
            }
        },
        data(){
            return{
                main_opt:false
            }
        },
        methods:{
          m_close:function(){
              this.main_opt= !this.main_opt;
              eventBus.$emit('close_modal',this.main_opt);
          }
        },
        computed:{
            haeder_class:function () {
                return 'modal-header--'+this.color
            },


        },
        watch:{
            option:function () {
                this.main_opt=this.option
            }
        }
    }
</script>

<style scoped>

</style>