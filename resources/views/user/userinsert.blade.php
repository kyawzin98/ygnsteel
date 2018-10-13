@extends('t1_layout')
@section('content')
    <div id="user_insert">

        <button onclick="$('#m_modal_basic').modal('show')">Click</button>
        @component('component.modal.my',['header_class'=>'bg1'])

        @endcomponent

        <button @click="show = true">Click</button>
        <j-modal-material :option="show" id="jargyi" color="bg1"></j-modal-material>
        @component('component.portlet.base',['title'=>'User Form'])
            <form @submit.prevent="useradd">
                <j-input-basic v-model="user.name" name="name" label="Username"></j-input-basic>
                <div class="m-form__actions">
                    <input type="submit" value="Add" class="btn btn-primary">
                    <a href="{{route('User.index')}} " class="btn btn-secondary">Cancel</a>
                </div>
            </form>
            <div class="row">
                <div class="col-sm-6">

                    <j-input-basic v-model="value1" name="name" label="Address 2"></j-input-basic>
                    <j-input-basic v-model="value1" name="name" label="Township"></j-input-basic>
                    <j-input-group v-model="value1" name="name" label="Township" :icon_right="true"
                                   side_txt="<span class='m--font-light'> User Name</span>" in_size="lg" side_class="m--bg-accent"></j-input-group>
                </div>
                <div class="col-sm-6">
                    <j-input-basic v-model="value1" name="name" label="Address 1"></j-input-basic>
                    <j-input-basic v-model="value1" name="name" label="Address 2"></j-input-basic>
                    <j-input-basic v-model="value1" name="name" label="Township"></j-input-basic>
                </div>
                <div class="col-12">

                    <j-radio-group v-model="gender" :val="{{$radio_data}}" label="label" key_id="name"
                                   row="col-sm-3" color="info"></j-radio-group>

                    <j-switch-group v-model="genders" :val="{{$radio_data}}" label="label" key_id="name" id="gen-"
                                   row="col-sm-3" color="accent" :lg="true"></j-switch-group>
                </div>
            </div>

        @endcomponent
        <div class="m-portlet__body">
            <form action="{{route('User.store')}}" method="POST">

                <j-input-basic v-model="value1" name="name" row="col-12" label="Name" ></j-input-basic>
                <j-input-icon v-model="value1" name="jare" label="Testing"></j-input-icon>
                <j-input-group v-model="value1" name="jare" label="Testing" side_txt="<i class='flaticon-lock-1'></i>" side_class=" m--font-light"></j-input-group>
                <?php $jar=[['id'=>3,'name'=>'Testing'],['id'=>4,'name'=>'Testing1']]; ?>
                <j-radio-group v-model="rad" name="jare" :val="{{ json_encode($jar) }}" row="col-3" label="name" color="primary"></j-radio-group>
                <j-switch-group v-model="res" id="jargyi" name="jare" :val="{{ json_encode($jar) }}" row="col-2" label="name" color="accent"></j-switch-group>

                @csrf
                <div class="form-group m-form__group">
                    <label for="username">User Name</label>
                    <input type="text" class="form-control m-input" required name="name" id="name"  placeholder="Enter user name">
                </div>
                <div class="form-group m-form__group">
                    <label for="Email">Email address</label>
                    <input type="email" class="form-control m-input" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <span class="m-form__help">We'll never share your email with anyone else.</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control m-input" name="password" id="Password" placeholder="Password">
                </div>
                <div class="form-group m-form__group">
                    <label for="ConfirmPassword">Password</label>
                    <input type="password" class="form-control m-input" name="password_confirmation" id="Password" placeholder="Conform Password">
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="m-form__actions">
                    <input type="submit" value="Add" class="btn btn-primary">
                    <a href="{{route('User.index')}} " class="btn btn-secondary">Cancel</a>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('script')
    <script>
        var post_link="{{route('User.store')}}";
        const app = new Vue({
            el:'#user_insert',
            data:{
                user:{
                    name:''
                },

                show:false,
                value1:'',
                gender:'female',
                genders:[],
                checkBox1:true,
                checkBox2:false,
                checkBox3:true,
                checkBox4:false,
                rad:4,
                res:[3,4],
            },
            methods:{
                useradd:function () {
                    if(this.user.name == ''){
                        swal('Please Fill the Username');
                        return false;
                    }

                    axios.post(post_link,this.user)
                        .then(result=>{
                            this.user.name='';
                            swal(result.data.success);
                        })


                }
            },
            created(){
                var ts=this;

                eventBus.$on('close_modal',function (data) {
                    ts.show=data;

                })
            },
        });

        // var user_insert=new Vue({
        //     el:'#user_insert',
        //
        // })
    </script>
@endsection