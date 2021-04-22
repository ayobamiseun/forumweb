@extends('layouts.main')

@section('scripts')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<!-- Initialize the editor. -->
<script>
$(function() {
    initWYSIWYG('textarea');
});
</script>
@endsection

@section('content')
<div class="post has-profile bg2">
    <div class="inner">
        <dl class="postprofile">
            <dt class="has-profile-rank has-avatar">
                <div class="avatar-container">
                    <a href="{{ route('profile', $topic->creator->id)}}" class="avatar"><img class="avatar" src="{{ $topic->creator->profile_picture_url }}" alt="Profile picture" width="80" height="80"></a>
                </div>
                <a href="{{ route('profile', $topic->creator->id) }}" class="username-coloured">{{ $topic->creator->user_name }}</a>
            </dt>
            <dd class="profile-posts"><strong>Topics:</strong> <a href="{{ route('profile.topics', $topic->creator->id) }}">{{ count($topic->creator->topics) }}</a></dd>
            <dd class="profile-posts"><strong>Posts:</strong> <a href="{{ route('profile.posts', $topic->creator->id) }}">{{ count($topic->creator->posts) }}</a></dd>
            <dd class="profile-joined"><strong>Joined:</strong> {{ $topic->creator->created_at->diffForHumans() }}</dd>
        </dl>
        <div class="postbody">
            <div>
                <h3 class="first">{{ $topic->title }}</h3>
                <p class="author">
                    by <strong><a href="{{ route('profile', $topic->creator->id) }}" class="username-coloured">{{ $topic->creator->user_name }}</a></strong> » {{ $topic->created_at->format('d M Y, H:i') }}
                </p>
                <div class="content">{!! $topic->description !!}</div>
                @if (!empty($topic->creator->signature))
                <div class="signature">{{ $topic->creator->signature }}</div>
                @endif
            </div>
        </div>
    </div>
</div>
<div>
    @if(empty($_user))
    <a href="{{ route('login') }}?redirectTo={{ urlencode(route('topic', $topic->id)) }}" class="button button-reply icon-button reply-icon" title="Post a reply">Post Reply</a>
    @else
    <a href="#reply-post" class="button button-reply icon-button reply-icon" title="Post a reply">Post Reply</a>
    @endif
    {{ $posts->render() }}
    <div class="clear"></div>
</div>
@foreach($posts as $post)
<div id="post-{{ $post->id }}" class="post has-profile bg2">
    <div class="inner">
        <dl class="postprofile">
            <dt class="has-profile-rank has-avatar">
                <div class="avatar-container">
                    <a href="{{ route('profile', $post->author->id)}}" class="avatar"><img class="avatar" src="{{ $post->author->profile_picture_url }}" alt="Profile picture" width="80" height="80"></a>
                </div>
                <a href="{{ route('profile', $post->author->id) }}" class="username-coloured">{{ $post->author->user_name }}</a>
            </dt>
            <dd class="profile-posts"><strong>Topics:</strong> <a href="{{ route('profile.topics', $post->author->id) }}">{{ count($post->author->topics) }}</a></dd>
            <dd class="profile-posts"><strong>Posts:</strong> <a href="{{ route('profile.posts', $post->author->id) }}">{{ count($post->author->posts) }}</a></dd>
            <dd class="profile-joined"><strong>Joined:</strong> {{ $post->author->created_at->diffForHumans() }}</dd>
        </dl>
        <div class="postbody">
            <div>
                <div class="content topic-post">{!! $post->post !!}</div>
                <div class="signature">
                    {{ $post->author->signature }}<br />
                    by <strong><a href="{{ route('profile', $post->author->id) }}" class="username-coloured">{{ $post->author->user_name }}</a></strong> » {{ $post->created_at->format('d M Y, H:i') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@if(count($posts) > 0)
<div>
    @if(empty($_user))
    <a href="{{ route('login') }}" class="button button-reply icon-button reply-icon" title="Post a reply">Post Reply</a>
    @else
    <a href="#reply-post" class="button button-reply icon-button reply-icon" title="Post a reply">Post Reply</a>
    @endif
    {{ $posts->render() }}
    <div class="clear"></div>
</div>
@endif
@if(!empty($_user))
<a id="reply-post"></a>
<div class="post bg2">
    <div class="inner">
        <h4>Reply to this topic</h4>
        <form method="POST" action="{{ route('post.create') }}">
            {{ csrf_field() }}
            <textarea name="post"></textarea>
            <input type="hidden" name="topic_id" value="{{ $topic->id }}" />
            <input type="submit" name="submit" id="submit" value="Submit" class="button1 default-submit-action" />
        </form>
    </div>
</div>
@endif
@endsection
