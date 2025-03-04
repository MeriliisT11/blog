@extends('partials.layout')
@section('content')
<div class="card bg-base-200  shadow-xl mx-auto my-auto">
    <div class="card-body">
        <form method="POST" action="{{ route('posts.update', ['post' => $post]) }}">
            @method('PUT')
            @csrf

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Title</span>
                </div>
                <input type="text" name="title" placeholder="Title" value="{{ old('title') ?? $post->title }}" class="input input-bordered w-full @error('title') input-error @enderror" />
                <div class="label">
                    @error('title')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Content</span>
                </div>
                <textarea name="body"
                          rows="12"
                          placeholder="Write something cool..."
                          class="textarea textarea-bordered w-full @error('body') textarea-error @enderror">{{ old('body') ?? $post->body }}</textarea>
                <div class="label">
                    @error('body')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </div>
            </label>

            <input type="submit" class="btn btn-primary" value="Update">

        </form>
    </div>
</div>
@endsection