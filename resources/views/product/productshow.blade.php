@extends('t1_layout')
@section('content')
    <div id="main_product">
        @component('component.portlet.creative',['title'=>'Products','head_class'=>'mt-0'])

            <div class="d-flex justify-content-sm-end justify-content-center">
                <button type="button" onclick="$('#add_products').modal('show')"
                        class="jar-btn jar-btn--default">
                    <i class="la la-plus"></i> Add New Product
                </button>
            </div>


            <div class="row">
                <div class="col-12 p-0">
                    @component('component.datatable.table',['id'=>'product_table','head_class'=>'default'])
                        @slot('th')
                            <th class="" style="width: 5%">ID</th>
                            <th class="">Name</th>
                            <th class="" style="width: 10%">Weight</th>
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
                        {data: 'weight', name: 'weight', className: 'text-center jsearch'},
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