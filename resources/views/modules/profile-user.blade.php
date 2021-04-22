<div class="col-12 col-sm-3 float-left profile-info">
    <img src="{{ $user->profile_picture_url }}">
    <h3><a href="{{ route('profile', $user->id) }}">{{ $user->user_name }}</a></h3>
    @if(!empty($_user) && $_user->id == $user->id)
    <a href="{{ route('profile.edit') }}" class="btn">[Edit profile]</a>
    @endif
</div>