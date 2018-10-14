@extends('t1_layout')
@section('content')
    <div id="user_main">
        @component('component.portlet.tools',['title'=>'Users','icon'=>'flaticon-avatar','color'=>'accent','head_class'=>'jar_box2'])

            <div class="d-flex justify-content-sm-end justify-content-center">
                <button type="button" onclick="$('#add_products').modal('show')"
                        class="jar-btn jar-btn--default">
                    <i class="la la-plus"></i> Add New User
                </button>
            </div>


            <div class="row">
                <div class="col-12 p-0">
                    @component('component.datatable.table',['id'=>'user_table','head_class'=>'default'])
                        @slot('th')
                            <th class="" style="width: 5%">ID</th>
                            <th class="">Username</th>
                            <th class="" style="width: 10%">Email</th>
                            <th class="" style="min-width: 50px;">Edit</th>
                        @endslot
                    @endcomponent
                </div>

            </div>
        @endcomponent
        @component('component.modal.my',['id'=>'add_products','title'=>'Add new Product'])
            <form id="add_user" @submit.prevent="add_user" method="post">
                <j-input-icon v-model="user.name" v-validate="'required'" name="username" :value="user.name"
                               icon="flaticon-users" label="Username"></j-input-icon>

                <j-input-icon v-model="user.email" v-validate="'required'" name="email" :value="user.email"
                               icon="flaticon-email" label="Email"></j-input-icon>

                <j-input-icon v-model="user.password" v-validate="'required'" name="password" :value="user.password"
                              icon="flaticon-eye" label="Password" type="password"></j-input-icon>

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
        var post_url = "{{route('User.store')}}";

        var app = new Vue({
            el: '#user_main',
            data: {
                user:{
                    name:'',
                    email:'',
                    password:'',
                },
            },
            mounted(){
                var old = $('#user_table').jDatatable({
                    url: post_url+'/create',
                    method:'GET',
                    columns: [
                        {data: 'id', name: 'id', className: 'text-center jsearch all'},
                        {data: 'name', name: 'name', className: 'text-center jsearch all'},
                        {data: 'email', name: 'email', className: 'text-center jsearch'},
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
                var individual_search_table = $('#user_table').DataTable();

                $('#user_table tbody').on('click', '.del', function (e) {
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
                add_user: function () {
                    this.$validator.validateAll().then((res) => {
                        if (res) {
                            var block_id = '#add_products';
                            mApp.block(block_id, {
                                overlayColor: '#000000',
                                state: 'primary'
                            });


                            axios.post(post_url, this.user)
                                .then((result) => {
                                    mApp.unblock(block_id);
                                    success_song.play();
                                    toastr.success(result.data.success, 'Successful!');
                                    material_componet.reload_dt();
                                    this.$validator.reset();
                                    this.user=this.empty_form();
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
                },
                empty_form:function () {
                    return{
                        name:'',
                        email:'',
                        password:'',
                    };
                }
            }
        })
    </script>
@endsection