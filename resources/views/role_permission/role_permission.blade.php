@extends('t2_layout')
@section('content')
    <div id="main_role_permission">
        @component('component.portlet.creative',['title'=>'Role Permission','head_class'=>'mt-0'])
            <div class="d-flex justify-content-sm-end justify-content-center">
                <button type="button" onclick="$('#modal_role_per').modal('show')"
                        class="jar-btn jar-btn--default">
                    <i class="la la-plus"></i> Add New Role Permission
                </button>
            </div>

            <div class="row">
                <div class="col-12">
                    @component('component.datatable.table',['id'=>'role_permission_table'])
                        @slot('th')
                            <th class="">ID</th>
                            <th class="">Role Name</th>
                            <th class="">Permission Name</th>
                            {{--<th class="">Edit</th>--}}
                        @endslot
                    @endcomponent
                </div>
            </div>
        @endcomponent
        @component('component.modal.my',['id'=>'modal_role_per','title'=>'Add New Permission'])
            <form id="main_add" @submit.prevent="add_role_permssion" method="post">
                <div class="col-12 py-4">
                    <label for="role">Roles</label>
                    <v-select v-model="role" id="role" :options="{{$roles}}" label="name"></v-select>
                </div>


                <div class="col-12">

                    <j-switch-group id="permissons-" v-model="permission" :val="{{$permissions}}" label="name"></j-switch-group>
                </div>


                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-info m-btn m-btn--custom m-btn--air">
                        Submit
                    </button>
                </div>
            </form>
        @endcomponent
    </div>
@endsection
@section('script')
    <script>
        var post_url = "{{route('RolePermission.store')}}";
        var app=new Vue({
            el:'#main_role_permission',
            data:{
                role:null,
                permission:[]
            },
            mounted(){
                var old = $('#role_permission_table').jDatatable({
                    url: post_url+'/create',
                    method:'GET',
                    columns: [
                        {data: 'id', name: 'id', className: 'text-center jsearch all'},
                        {data: 'name', name: 'name', className: 'text-center jsearch all'},
                        {data: 'role_permission', name: 'role_permission', className: 'text-center jsearch all'},
                        // {className: 'text-center',
                        //     "render": function ( data, type, row, meta ) {
                        //         return `<a href="${post_url}/${row.id}/edit" class="btn btn-accent m-btn m-btn--icon btn-lg m-btn--icon-only">
							// 			<i class="flaticon-edit-1"></i>
							// 		</a>
							// 		<a href="javascript:" data-url="${post_url}/${row.id}" class="btn btn-danger m-btn m-btn--icon btn-lg m-btn--icon-only del">
							// 			<i class="flaticon-delete-1"</i>
							// 		</a>`;
                        //     },
                        //     orderable:false
                        // },

                    ],
                    delete_btn: false,
                    edit_modal: true,
                    "stateSave": true,
                });

                var ta = this;
                var individual_search_table = $('#role_permission_table').DataTable();

                $('#role_permission_table tbody').on('click', '.del', function (e) {
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
                add_role_permssion:function () {
                    this.$validator.validateAll().then((res)=>{
                        if (res){
                            var block_id = '#modal_role_per';
                            mApp.block(block_id, {
                                overlayColor: '#000000',
                                state: 'primary'
                            });

                            axios.post(post_url,{role:this.role,permission:this.permission})
                                .then((result)=>{
                                    mApp.unblock(block_id);
                                    success_song.play();
                                    toastr.success(result.data.success, 'Successful!');
                                    // material_componet.reload_dt();
                                    this.$validator.reset();
                                    this.role=null;
                                    this.permission=[];
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
        });
    </script>
@endsection

