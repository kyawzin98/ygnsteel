<template>
    <div :class="row">
        <div class="form-group m-form__group" :class="inputSize">
            <label :for="id" :class="{'is-danger': errors.has(name)}" v-if="label">{{label}}</label>
            <input class="form-control m-input" :type="type" :class="{'has-danger': errors.has(name),'m-input--air':air,'jdate':date}" :id="id"
                   :name="name" :readonly="readonly" :disabled="disabled" :placeholder="placeholder" v-bind="$attrs" :autocomplete="autocomplete"
                   @input="updateCode($event.target.value)" @blur="updateCode($event.target.value)">
            <div class="form-control-feedback m--font-danger" v-show="errors.has(name)" v-cloak>{{ errors.first(name)}}</div>
        </div>
    </div>
</template>

<script>
    import ComMix from '../../component_mixins.js'
    export default {
        mixins:[ComMix],
        name: "basic"
    }
</script>

<style scoped>

</style>