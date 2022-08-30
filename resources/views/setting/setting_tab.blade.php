
<div class="div">
    <ul class="nav">
        <li class="nav-item {{$active_tab == 'update_profile'?'active':''}}">
            <a class="nav-link" href="{{url('account')}}">
                <span>Update Profile</span>
            </a>
        </li>
        {{-- <li class="nav-item {{$active_tab == 'user_personal_information'?'active':''}}">
            <a class="nav-link" href="{{url('user-personal-information')}}">
                <span>Personal Information</span>
            </a>
        </li> --}}
        <li class="nav-item {{$active_tab == 'orders'?'active':''}}">
            <a class="nav-link" href="{{url('orders')}}">
                <span>Active Orders</span>
            </a>
        </li>
        <li class="nav-item {{$active_tab == 'completed_orders'?'active':''}} ">
            <a class="nav-link" href="{{url('completed-orders')}}">
                <span>Completed Orders</span>
            </a>
        </li>
        <li class="nav-item {{$active_tab == 'change_password'?'active':''}}">
            <a class="nav-link" href="{{url('change-password')}}">
                <span>Change Password</span>
            </a>
        </li>
    </ul>
</div>
