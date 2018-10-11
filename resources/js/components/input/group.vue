<template>
    <div :class="row">
        <div class="form-group m-form__group">
            <label :for="id" :class="{'is-danger': errors.has(name)}" v-if="label">{{label}}</label>
            <div class="input-group m-input-group" :class="inputSize">
                <div class="input-group-prepend" v-if="!icon_right"><span class="input-group-text" :class="side_class" v-html="side_txt">{{side_txt}}</span></div>
                <input class="form-control m-input m-input--air" aria-describedby="basic-addon1" :name="name" :disabled="disabled" v-bind="$attrs"
                       :autocomplete="autocomplete"  :placeholder="placeholder" :id="id" :readonly="readonly" @input="onInput($event.target.value)"
                       ref="tsi">
                <div class="input-group-append" v-if="icon_right"><span class="input-group-text" :class="side_class" v-html="side_txt">{{side_txt}}</span></div>
            </div>
            <div class="form-control-feedback m--font-danger" v-show="errors.has(name)" v-cloak>{{ errors.first(name)}}</div>
            <span class="m-form__help" v-if="help">{{help}}</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "group",
        inject: ['$validator'],
        props: {
            row: {
                default:'col-sm-12'
            },
            type:{
                default:'text'
            },
            label:{
                default:false
            },
            id:{
                type:String
            },
            air:{
                type:Boolean,
                default:true,

            },
            name:'',
            readonly:'',
            disabled:'',
            placeholder:'',
            autocomplete:{
                type:String,
                default:'off',
            },
            value:'',
            val:'',
            help:{
                default:false
            },
            icon_right:{
                default:false
            },
            side_txt:{
                default:'@'
            },
            side_class:'',
            in_size:'',
        },
        data(){
            return{
            }
        },
        computed:{
            inputSize:function () {
                return "input-group-"+this.in_size;
            }
        },
        mounted(){


        },
        methods:{
            onInput: function(code) {
                this.$emit('input', code)
            }
        }

    }
</script>

<style scoped>

</style>