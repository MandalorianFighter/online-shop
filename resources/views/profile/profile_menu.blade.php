<div class="col-4">
    <div class="card">
        <img src="{{ auth()->user()->hasMedia('users/avatar') ? auth()->user()->getFirstMediaUrl('users/avatar') : asset('default/default-avatar.jpeg') }}" alt="avatar" class="card-img-top" style="height:90px; width:90px; margin-left:39%;">
        <div class="card-body">
            <h5 class="card-title text-center">{{ auth()->user()->name }}</h5>
        </div>
        <ul class="list-group list-group-flash">
            <li class="list-group-item"><a href="{{ route('password.change') }}">{{ __('Change Password') }}</a></li>
            <li class="list-group-item"><a href="{{ route('profile.edit') }}">{{ __('Edit Profile') }}</a></li>
            <li class="list-group-item"><a href="{{ route('order_list.success') }}">{{ __('Return Order') }}</a></li>
        </ul>
        <div class="card-body d-grid gap-2">
        <a href="{{ route('user.logout') }}" class="btn btn-sm btn-light">{{ __('Logout') }}</a>
        </div>
    </div>
</div>