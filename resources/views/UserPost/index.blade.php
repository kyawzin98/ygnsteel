@extends('t1_layout')
@section('content')
    <div id="user_post">


        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">Products</th>
                <th class="text-center">Qty</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="p-0">
                    <v-select label="name" :filterable="false" :options="options" v-model="users" id="users" @search="onSearch">
                        <template slot="option" slot-scope="option">
                            <div class="d-center">
                                @{{ option.productname }}
                                <br>
                                Weight: <small>@{{ option.weight }}</small>
                            </div>
                        </template>
                        <template slot="selected-option" slot-scope="option">
                            <div class="selected d-center">
                                @{{ option.productname }}
                            </div>
                        </template>
                    </v-select>
                </td>
                <td class="p-0">
                    <j-input-basic v-model="qty" in_size="small p-0 m-0 w-100" row="col-sm-12 p-0"></j-input-basic>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div id="main_product">
        <div class="row">
            <div class="col-3 ">
                <div class="my_grid">
                    <div class="inner_grid">

                    </div>
                </div>
            </div>
            <div class="col-3 " >
                <div class="my_grid">

                </div>
            </div>
            <div class="col-3 " >
                <div class="my_grid">

                </div>
            </div>
            <div class="col-3 " >
                <div class="my_grid">

                </div>
            </div>
            <div class="col-3 " >
                <div class="my_grid">

                </div>
            </div>
            <div class="col-3 " >
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
                qty:'',
                options: [],
                users: [],
            },
            methods:{
                onSearch(search, loading) {
                    loading(true);
                    this.search(loading, search, this);
                },
                search: _.debounce((loading, search, vm) => {
                    var datas = escape(search);

                    axios.get(post_url_create+`?data=${search}`)
                            .then((res) => {
                                vm.options = res.data;
                                loading(false);
                            });
                }),
            }
        })
    </script>
@endsection