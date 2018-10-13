@extends('t1_layout')
@section('content')
    <div id="main_product">
        @component('component.portlet.creative',['title'=>'Products','head_class'=>'mt-0'])

            <div class="d-flex ">
                <button type="button" onclick="$('#add_products').modal('show')"
                        class="jar-btn jar-btn--default ml-auto">
                    <i class="la la-plus"></i> Add New Product
                </button>
            </div>


            <div class="row">
                <div class="col-12">
                    @component('component.datatable.table',['id'=>'product_table'])
                        @slot('th')
                            <th class="">ID</th>
                            <th class="">Name</th>
                            <th class="">Weight</th>
                            <th class="">Edit</th>
                        @endslot
                    @endcomponent
                </div>

            </div>
        @endcomponent
        @component('component.modal.my',['id'=>'add_products','title'=>'Add new Product'])
            <form id="main_add" @submit.prevent="add_product" method="post">
                <j-input-basic v-model="product.name" v-validate="'required'" name="product_name" :value="product.name"
                               label="Product Name"></j-input-basic>
                <j-input-basic v-model="product.weight" v-validate="'required'" name="weight" :value="product.weight"
                               label="Weight/Kg"></j-input-basic>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-info m-btn m-btn--custom m-btn--air">
                        submit
                    </button>
                </div>
            </form>

        @endcomponent

        <div class="col-xl-12 mx-auto">
            <div class="m-portlet m-portlet--full-height  m-portlet--rounded">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Product Sales
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget11_tab1_content">
                            <!--begin::Widget 11-->
                            <div class="m-widget11">
                                <div class="m-widget11__action m--align-right">
                                    <a href="#" onclick="$('#add_products').modal('show')">

                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table">
                                        <!--begin::Thead-->
                                        <thead>
                                        <tr>
                                            <th class="m-widget11__label">
                                                #
                                            </th>
                                            <th class="m-widget11__app">
                                                Product Name
                                            </th>
                                            <th class="m-widget11__sales">
                                                Weight/Kg
                                            </th>

                                            <th class="m-widget11__sales">
                                                Edit
                                            </th>
                                            <th class="m-widget11__sales">
                                                Delete
                                            </th>
                                        </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody>

                                        @foreach($products as $product)

                                            <tr>
                                                <td class="m--font-brand">
                                                    {{$a++}}
                                                </td>
                                                <td>
                                                    <span class="m-widget11__title">{{$product->productname}}</span>
                                                </td>
                                                <td>
                                                    @if($product->weight == null)
                                                        <span class="btn btn-primary">-</span>
                                                    @else
                                                        {{$product->weight}}
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('Product.edit',$product->id)}}">
                                                        <button class="btn btn-success"><i
                                                                    class="la la-pencil-square "></i></button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:" class="btn btn-danger"
                                                       onclick="event.preventDefault();document.getElementById('delete_task_{{$product->id}}').submit();">
                                                        <i class="la la-close"></i>
                                                    </a>
                                                    <form id="delete_task_{{$product->id}}"
                                                          action="{{ route('Product.destroy',$product->id) }}"
                                                          method="POST"
                                                          style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>

                            </div>
                            <!--end::Widget 11-->
                        </div>
                        <div class="tab-pane" id="m_widget11_tab2_content">
                            <!--begin::Widget 11-->
                            <div class="m-widget11">
                                <div class="m-widget11__action m--align-right">
                                    <button type="button"
                                            class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--hover-brand">
                                        <a href="">Add New Product</a>
                                    </button>
                                </div>
                            </div>
                            <!--end::Widget 11-->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')
    {{--<script src="{{asset('js/app.js')}}" ?></script>--}}
    <script>
        var post_url = "{{route('Product.store')}}";

        var app = new Vue({
            el: '#main_product',
            data: {
                product: {
                    name: '',
                    weight: '',
                }
            },
            mounted(){
                var old = $('#product_table').jDatatable({
                    url: post_url+'/create',
                    method:'GET',
                    columns: [
                        {data: 'id', name: 'id', className: 'text-center jsearch all'},
                        {data: 'productname', name: 'productname', className: 'text-center jsearch all'},
                        {data: 'weight', name: 'weight', className: 'text-center jsearch all'},
                        {className: 'text-center',
                            "render": function ( data, type, row, meta ) {
                            return `<a href="${post_url}/${row.id}/edit" class="btn btn-accent m-btn m-btn--icon btn-lg m-btn--icon-only">
										<i class="flaticon-edit-1"></i>
									</a>
									<a href="javascript:" data-url="${post_url}/${row.id}" class="btn btn-danger m-btn m-btn--icon btn-lg m-btn--icon-only del">
										<i class="flaticon-delete-1"</i>
									</a>`;
                            },
                            orderable:false
                        },

                    ],
                    delete_btn: false,
                    edit_modal: true,
                    "stateSave": true,
                    // "stateSaveParams": function (settings, data) {
                    //     console.log(data.columns);
                    //     data.columns.forEach((result)=>{
                    //         result.search.search='';
                    //         console.log(result.search.search);
                    //     })
                    //     data.search.search = "";
                    // }
                });

                var ta = this;
                var individual_search_table = $('#product_table').DataTable();

                $('#product_table tbody').on('click', '.del', function (e) {
                    var del_url=$(this).data('url');
                    axios.delete(del_url)
                        .then((result)=>{
                            success_song.play();
                            toastr.success(result.data.success, 'Successful!');
                            material_componet.reload_dt();
                        })
                });

            },
            methods: {
                add_product: function () {
                    this.$validator.validateAll().then((res) => {
                        if (res) {
                            var block_id = '#add_products';
                            mApp.block(block_id, {
                                overlayColor: '#000000',
                                state: 'primary'
                            });


                            axios.post(post_url, this.product)
                                .then((result) => {
                                    mApp.unblock(block_id);
                                    success_song.play();
                                    toastr.success(result.data.success, 'Successful!');
                                    material_componet.reload_dt();
                                    this.$validator.reset();
                                    this.product={
                                        name: '',
                                        weight: '',
                                    };
                                    $(block_id).modal('hide');
                                }).catch((res)=> {
                                mApp.unblock(block_id);
                                toastr.error(res.response.data.message, 'Error!');
                                error_song.play();
                            });

                            // this.data_po[edit_id].quantity=this.update.name;
                            // mApp.unblock(block_id);
                            // success_song.play();
                            // $(block_id).modal('hide');
                            // this.$forceUpdate();
                        } else {
                            error_song.play();
                            toastr.error('Error! Try Again,Check the input', "Fill all field.");
                        }

                    })
                }
            }
        })
    </script>
@endsection