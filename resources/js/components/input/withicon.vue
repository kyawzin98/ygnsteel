<template>
    <div :class="row">
        <div class="form-group m-form__group">
            <label :for="id" :class="[{'is-danger': errors.has(name)},label_class]" v-if="label">{{label}}</label>
            <div class="m-input-icon" :class="[icon_position_head,inputSize]">
                <input class="form-control m-input" :type="type" :class="{'has-danger': errors.has(name),'m-input--air':air}" :id="id"
                       :name="name" :readonly="readonly" :disabled="disabled" :placeholder="placeholder" v-bind="$attrs"
                       @input="updateCode($event.target.value)">
                <span class="m-input-icon__icon" :class="icon_position"><span><i :class="[icon,{'is-danger': errors.has(name)}]"></i></span></span>
            </div>
            <div class="form-control-feedback m--font-danger" v-show="errors.has(name)" v-cloak>{{ errors.first(name)}}</div>
        </div>
    </div>
</template>

<script>
    export default {
        inject: ['$validator'],
        name: "withicon",
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
            icon:{
                default:'la la-bell'
            },
            label_class:{
                default:''
            },
            icon_right:{
                default:false
            },
            name:'',
            readonly:'',
            disabled:'',
            placeholder:'',
            in_size:''
        },
        data() {
            return {
                icon_position_head:this.icon_right?'m-input-icon--right':'m-input-icon--left',
                icon_position:this.icon_right?'m-input-icon__icon--right':'m-input-icon__icon--left',
            }
        },

        computed:{
            inputSize:function () {
                return "input-group-"+this.in_size;
            }
        },
        mounted() {

        },
        methods: {
            updateCode: function (code) {
                this.$emit('input', code);
            }
        }
    }
</script>

<style scoped>

</style>