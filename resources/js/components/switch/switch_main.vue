<template>
    <div :class="ma_class">
        <div v-if="onlyOne" class="d-flex justify-content-between align-items-center" :class="{'px-md-3':onepadding}">
            <label :for="id" class="switch_jp text-capitalize" :class="[txt_align,label_class,{'pt-3':lg,'pt-2':!lg}]" style="cursor: pointer !important;">{{label}}</label>
            <span class="m-switch jswitch m-switch--icon m-switch--outline" :class="[sw_class,{'m-switch--lg mt-3':lg}]">
                <label :for="id">
                    <input type="checkbox" :id="id" :name="name" :value="newVal" v-model="OModel" @change="onValueChange" v-bind="$attrs">
                    <span></span>
                </label>
            </span>
        </div>
        <div :class="row" class="d-flex justify-content-between align-items-center px-2 px-md-3 pr-sm-5" v-else v-for="(v,i) in multi_r">
            <label :for="id+i" class="switch_jp font-weight-normal text-capitalize jcuros" :class="[txt_align,'j_cursor',{'pt-3':lg,'pt-2':!lg}]">{{v[label]}}</label>
            <span class="m-switch m-switch--icon m-switch--outline" :class="[sw_class,{'m-switch--lg mt-3 ':lg}]">
                <label :for="id+i">
                    <input type="checkbox" class="jswitch " :id="id+i" :name="name" :value="v[key_id]" v-model="radioMulti" @change="onChange" v-bind="$attrs">
                    <span></span>
                </label>
            </span>
        </div>
    </div>
</template>

<script>
    import ComMix from '../../component_mixins.js'
    export default {
        name: "switch_main",
        mixins:[ComMix],
        computed: {
            sw_class: function () {
                if (typeof this.color === 'undefined') {
                    return 'm-switch--success';
                } else {
                    return 'm-switch--' + this.color;
                }
            },

        },
        mounted() {
            this.onlyOne;

        },
    }
</script>

<style scoped>
.jcuros{
    cursor: pointer;
}
</style>