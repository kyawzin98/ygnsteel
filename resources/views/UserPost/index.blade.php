@extends('t2_layout')
@section('style')
    <style>
        .dropdown-toggle:after {
            display: none;
        }
        .v-select .open-indicator::before {
            color: white !important;
        }
        .v-select .dropdown-toggle .clear {
            color: white !important;
        }
        .v-select .open-indicator::before {
            border-color: white !important;
        }
        .v-select .dropdown-toggle {
            border: 1px solid white !important;
        }
        .v-select .selected-tag {
            color: white !important;
        }
        .form-control.focus, .form-control:focus{
            color: white !important;
        }
        .form-control,.form-control.focus, .form-control:focus{
            background: transparent;
            color: white !important;
        }
    </style>
@endsection
@section('content')
    <div id="user_post">
        <div class="row">
            <div class="col-12">
                <div class="m-portlet m--bg-dafault m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height " style="border-radius: 10px;">
                    <div class="m-portlet__body">
                        <!--begin::Widget 7-->
                        <div class="m-widget7 m-widget7--skin-dark">
                            <div class="row justify-content-between">
                                <div class="d-flex">
                                    <div class="m-widget7__user-img">
                                        <img class="m-widget7__img" src="{{asset('t1/assets/app/media/img//users/100_3.jpg')}}" alt=""
                                             style="width: 5.6rem; border-radius: 50%; border: 2px solid;margin-top: -30px;box-shadow: 1px 1px 3px #FFFFFF;">
                                    </div>
                                    <div class="m-widget7__info">
                                        <span class="m-widget7__username" style="margin-top: .71rem;margin-left: .71rem;font-size: 1rem;font-weight: 500;">
                                            Dan Bold
                                        </span>
                                        <br>
                                        {{--<span class="m-widget7__time" style="margin-left: .71rem;margin-top: .71rem;font-size: .85rem;">--}}
                                            {{--3 days ago--}}
                                        {{--</span>--}}
                                    </div>
                                </div>
                                {{--<div class="d-flex" style="align-items: end;">--}}
                                    {{--<span style="font-size: .85rem;"><i class="flaticon-visible m--font-light"></i> 121-views</span>--}}
                                    {{--<span style="font-size: .85rem;padding-left: 5px;"><i class="la la-bullhorn m--font-light"></i> 121-responses</span>--}}
                                {{--</div>--}}
                            </div>
                            <h5 class="mt-3">Sell New Product</h5>
                            {{--<p>What does this design whole the terms.</p>--}}

                            <div class="row">
                                <j-switch-group v-model="new_product" row="col-sm-12 text-center" txt_align="ml-auto mr-5 align-self-baseline"
                                                :value="new_product" label="New Product"></j-switch-group>

                                <div class="col-sm-4" v-if="!new_product">
                                    <label class="">Product</label>
                                    <v-select label="created_at" :filterable="false" :options="options" v-model="users" id="users"
                                              @search="onSearch">
                                        <template slot="option" slot-scope="option">
                                            <div class="d-center">
                                                @{{ option.productname }}
                                                <br>
                                                Weight:
                                                <small>@{{ option.weight }}</small>
                                            </div>
                                        </template>
                                        <template slot="selected-option" slot-scope="option">
                                            <div class="selected d-center">
                                                @{{ option.productname }}
                                            </div>
                                        </template>
                                    </v-select>
                                </div>

                                <j-input-icon v-else v-model="users" label="Product" row="col-sm-4"></j-input-icon>

                                <j-input-group v-model="weight" :icon_right="true" side_txt="W" :value="weight" :readonly="!new_product" row="col-sm-4" label="Weight" label_class="col-form-label"></j-input-group>

                                <j-input-group v-model="qty" :icon_right="true" side_txt="Qty" :value="qty"  row="col-sm-4" label="Quantity" label_class="col-form-label"></j-input-group>

                                <j-input-group v-model="price" :icon_right="true" side_txt="Kyats" :value="price"  row="col-sm-12" label="Price" label_class="col-form-label"></j-input-group>


                                <div class="col-12 text-center pb-3 my-3">
                                    <button class="btn m-btn--air  btn-outline-metal m-btn m-btn--custom m-btn--outline-2x m-btn--icon btn-lg m-btn--icon-only" type="button" @click="add_tmp">
                                        <i class="la la-check"></i>
                                    </button>
                                </div>
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Product Name</th>
                                                <th class="text-center">Weight</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-center">Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="(value,key) in table_data" v-if="table_data">
                                                <td  class="text-center">@{{ value.product.productname }}</td>
                                                <td  class="text-center">@{{ value.weight }}</td>
                                                <td  class="text-center">@{{ value.qty }}</td>
                                                <td  class="text-center">@{{ value.price }}</td>
                                            </tr></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <j-input-icon v-model="title" :value="title" icon="la la-font" row="col-sm-12 mt-3" label="Title"></j-input-icon>
                                <div class="col-12">
                                    <div class="form-control">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3" v-model="description"></textarea>
                                    </div>
                                </div>

                                <div class="col-12 text-center mt-3">
                                    <button type="button" class="btn m-btn m-btn--air  btn-outline-metal m-btn m-btn--custom m-btn--outline-2x"
                                    @click="newpost">Accent</button>
                                </div>
                            </div>



                        </div>
                        <!--end::Widget 7-->
                    </div>
                </div>
            </div>
        </div>



    </div>

    {{--<div id="main_product">--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-3 ">--}}
                {{--<div class="my_grid">--}}
                    {{--<div class="inner_grid">--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-3 ">--}}
                {{--<div class="my_grid">--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-3 ">--}}
                {{--<div class="my_grid">--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-3 ">--}}
                {{--<div class="my_grid">--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-3 ">--}}
                {{--<div class="my_grid">--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-3 ">--}}
                {{--<div class="my_grid">--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection

@section('script')
    {{--<script src="{{asset('js/app.js')}}" ?></script>--}}
    <script>
        var post_url = "{{route('UserPost.store')}}";
        var post_url_create = "{{route('UserPost.create')}}";

        var app = new Vue({
            el: '#user_post',
            data: {
                new_product: false,
                qty: '',
                weight: '',
                price: '',
                title: '',
                description: '',
                tmp_prod:[],
                options: [],
                users:null,
            },
            methods: {
                onSearch(search, loading) {
                    loading(true);
                    this.search(loading, search, this);
                },
                add_tmp:function () {
                    if (this.users == null){
                        swal('Please Fill the Product name.');
                        return false;
                    }
                    if (this.qty == ''){
                        swal('Please Fill the Quantity.');
                        return false;
                    }
                    if (this.price == ''){
                        swal('Please Fill the Price.');
                        return false;
                    }

                    if (this.new_product){
                        var tmp={product:{productname:this.users},qty:this.qty,weight:this.weight,price:this.price,new_product:true};

                    }else{
                        var tmp={product:this.users,qty:this.qty,weight:this.weight,price:this.price,new_product:false};
                    }
                    this.tmp_prod.push(tmp);
                    this.users=null;
                    this.new_product=false;
                    this.weight='';
                    this.qty='';
                    this.price='';
                },
                newpost:function(){
                    if (this.tmp_prod.length == 0){
                        swal('Please Create First Product List');
                        return false;
                    }

                    if (this.title == ''){
                        swal('Please Fill the Post Title');
                        return false;
                    }
                    if (this.description == ''){
                        swal('Please Fill the Description');
                        return false;
                    }

                    axios.post(post_url,{main:this.tmp_prod,title:this.title,description:this.description})
                        .then(result=>{
                            success_song.play();
                            toastr.success(result.data.success,'Success!');
                            this.tmp_prod=[];
                            this.title = '';
                            this.description = '';
                        })
                },
                search: _.debounce((loading, search, vm) => {
                    var datas = escape(search);

                    axios.get(post_url_create + `?data=${search}`)
                        .then((res) => {
                            vm.options = res.data;
                            loading(false);
                        });
                }),

            },
            computed:{
              table_data:function () {
                  return this.tmp_prod;
              }
            },
            watch:{
                users:function (value) {
                    if (value !== null){
                        this.weight=value.weight;
                    }
                }
            }
        })
    </script>
@endsection