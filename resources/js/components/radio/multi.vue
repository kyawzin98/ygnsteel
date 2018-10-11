<template>
    <div :class="row">
        <label class="m-radio"  :class="jradioclass"  v-for="(v,i) in this.multi_r">
            <p :class="{'is-danger': errors.has(name)}">{{v[label]}}</p>
            <input type="radio" :name="name" :value="v[key_id]" v-model="radioMulti" @change="onChange">
            <span></span>
        </label>
    </div>
</template>

<script>
    import ComMix from '../../component_mixins.js'
    export default {
        name: "multi",
        mixins:[ComMix],
        mounted(){
            this.o_check;
        },
    }
</script>

<style scoped>

</style>