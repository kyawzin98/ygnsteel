export default {
    inject: ['$validator'],
    props: {
        row: {
            default: 'col-sm-12'
        },
        type: {
            default: 'text'
        },
        label: {
            default: false
        },
        label_class: {
            type: String,
            default: ''
        },
        id: {
            type: String
        },
        air: {
            type: Boolean,
            default: true,

        },
        date: {
            type: Boolean,
            default: false,

        },

        lg: {
            type: Boolean,
            default: false
        },
        in_size: {
            default:'',
        },

        name: '',
        readonly: '',
        disabled: '',
        placeholder: '',
        value: '',
        input_class: '',
        val: '',
        color: '',
        autocomplete:{
            type:String,
            default:'off',

        },

        key_id: {
            type: String,
            default: 'id'
        },
        txt_align: {
            type: String,
            default: ''
        },

    },
    data() {
        return {
            newchecked: typeof this.check_id !== 'undefined' ? JSON.parse(this.check_id) : [],
            jchecked: [],
            alldata: [],
            newVal:'',

        }
    },
    methods: {
        updateCode: function (code) {
            this.$emit('input', code);
        },
        onChange: function (e) {
            this.$emit('input', this.jchecked)
        },
        onValueChange: function (e) {
            this.$emit('input', this.newVal)
        }

    },
    computed: {
        inputSize:function () {
            return "input-group-"+this.in_size;
        },
        date_init: function () {
            if (this.date === true) {
                var jdate = $('.jdate').datepicker({
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>'
                    }
                });
            }
        },

        jradioclass: function () {
            if (typeof this.color !== 'undefined') {
                return 'm-radio--state-' + this.color + ' ' + this.row;
            } else {
                return 'm-radio--state-success' + ' ' + this.row;
            }

        },
        radioMulti: {
            get() {
                return this.value
            },
            set(val) {
                this.jchecked = val;
            }
        },
        multi_r: function () {
            this.alldata = this.val;
            // this.alldata = JSON.parse(this.val);
            return this.alldata;
        },
        ma_class:function () {
            if (!this.onlyOne){
                return 'row '+this.input_class;
            }else{
                return this.row;
            }
        },
        // o_check: function () {
        //     this.$emit('input', this.newchecked);
        // },
        onlyOne:function () {
            if(typeof this.val == 'undefined'){
                return true;
            }else {
                this.o_check;
                return false;
            }
        },
        OModel: {
            get() {
                return this.value
            },
            set(val) {
                this.newVal = val
            }
        },

    }
}