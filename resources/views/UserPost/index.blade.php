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
                            <h5>User Post</h5>
                            <p>What does this design whole the terms.</p>
                            <div class="row">

                                <div class="col-sm-4">
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

                                <j-input-group v-model="weight" :icon_right="true" side_txt="W" :value="weight" readonly="readonly" row="col-sm-4" label="Weight" label_class="col-form-label"></j-input-group>
                                <j-input-group v-model="qty" :icon_right="true" side_txt="Qty" :value="qty"  row="col-sm-4" label="Quantity" label_class="col-form-label"></j-input-group>
                                <div class="col-12 text-center pb-3 my-3">
                                    <button class="btn btn-accent m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill" type="button" @click="add_tmp">
                                        <i class="la la-check"></i>
                                    </button>
                                </div>
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Weight</th>
                                                <th>Qty</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="(value,key) in table_data" v-if="table_data">
                                                <td >@{{ value.product.productname }}</td>
                                                <td >@{{ value.weight }}</td>
                                                <td >@{{ value.qty }}</td>
                                            </tr></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <j-input-icon v-model="qty" :value="qty" icon="la la-font" row="col-sm-12 mt-3" label="Title"></j-input-icon>
                                <div class="col-12">
                                    <div class="form-control">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="row justify-content-between">--}}
                                {{--<div class="d-flex">--}}
                                    {{--<div class="m-widget7__user-img">--}}
                                        {{--<img class="m-widget7__img" src="{{asset('t1/assets/app/media/img//users/100_3.jpg')}}" alt="" style="width: 2.6rem;border-radius: 50%;">--}}
                                    {{--</div>--}}
                                    {{--<div class="m-widget7__info">--}}
                             {{--<span class="m-widget7__username" style="margin-top: .71rem;margin-left: .71rem;font-size: 1rem;font-weight: 500;">--}}
                                {{--Dan Bold--}}
                            {{--</span>--}}
                                        {{--<br>--}}
                                        {{--<span class="m-widget7__time" style="margin-left: .71rem;margin-top: .71rem;font-size: .85rem;">--}}
                                {{--3 days ago--}}
                            {{--</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="d-flex" style="align-items: end;">--}}
                                    {{--<span style="font-size: .85rem;"><i class="flaticon-visible m--font-light"></i> 121-views</span>--}}
                                    {{--<span style="font-size: .85rem;padding-left: 5px;"><i class="la la-bullhorn m--font-light"></i> 121-responses</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}


                        </div>
                        <!--end::Widget 7-->
                    </div>
                </div>
            </div>
        </div>



    </div>

    <div id="main_product">
        <div class="row">
            <div class="col-sm-3 ">
                <div class="my_grid">
                    <div class="inner_grid">

                    </div>
                </div>
            </div>
            <div class="col-sm-3 ">
                <div class="my_grid">

                </div>
            </div>
            <div class="col-sm-3 ">
                <div class="my_grid">

                </div>
            </div>
            <div class="col-sm-3 ">
                <div class="my_grid">

                </div>
            </div>
            <div class="col-sm-3 ">
                <div class="my_grid">

                </div>
            </div>
            <div class="col-sm-3 ">
                <div class="my_grid">

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    {{--<script src="{{asset('js/app.js')}}" ?></script>--}}
    <script>
        var post_url = "{{route('UserPost.store')}}";
        var post_url_create = "{{route('UserPost.create')}}";

        var app = new Vue({
            el: '#user_post',
            data: {
                qty: '',
                weight: '',
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
                    var tmp={product:this.users,qty:this.qty,weight:this.weight};
                    this.users=null;
                    this.weight='';
                    this.qty='';
                    this.tmp_prod.push(tmp);
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