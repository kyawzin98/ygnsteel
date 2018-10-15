@extends('t1_layout')
@section('content')
    <div id="main_permission">
        @component('component.portlet.creative',['title'=>'Permissions','head_class'=>'mt-0'])
            <div class="d-flex ">
                <button type="button" onclick="$('#add_permissions').modal('show')"
                        class="jar-btn jar-btn--default ml-auto">
                    <i class="la la-plus"></i> Add New Permission
                </button>
            </div>

            <div class="row">
                <div class="col-12">
                    @component('component.datatable.table',['id'=>'permission_table'])
                        @slot('th')
                            <th class="">ID</th>
                            <th class="">Role Name</th>
                            <th class="">Edit</th>
                        @endslot
                    @endcomponent
                </div>
            </div>
        @endcomponent
        @component('component.modal.my',['id'=>'add_permissions','title'=>'Add New Permission'])
            <form id="main_add" @submit.prevent="add_permission" method="post">
                <j-input-basic v-model="permission.name" v-validate="'required'" name="name" :value="permission.name" label="Permission Name">
                </j-input-basic>
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
        var post_url = "{{route('Permission.store')}}";

        var app = new Vue({
            el: '#main_permission',
            data: {
                permission: {
                    name: ''
                }
            },
            mounted(){
                var old = $('#permission_table').jDatatable({
                    url: post_url+'/create',
                    method:'GET',
                    columns: [
                        {data: 'id', name: 'id', className: 'text-center jsearch all'},
                        {data: 'name', name: 'name', className: 'text-center jsearch all'},
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
                });

                var ta = this;
                var individual_search_table = $('#permission_table').DataTable();

                $('#permission_table tbody').on('click', '.del', function (e) {
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
                add_permission:function () {
                    this.$validator.validateAll().then((res)=>{
                        if (res){
                            var block_id = '#add_permissions';
                            mApp.block(block_id, {
                                overlayColor: '#000000',
                                state: 'primary'
                            });

                            axios.post(post_url,this.permission)
                                .then((result)=>{
                                    mApp.unblock(block_id);
                                    success_song.play();
                                    toastr.success(result.data.success, 'Successful!');
                                    material_componet.reload_dt();
                                    this.$validator.reset();
                                    this.permission={
                                        name: '',
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
        });
    </script>
@endsection