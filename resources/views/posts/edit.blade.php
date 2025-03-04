@extends('partials.layout')

@section('content')
<div class="card bg-base-200 shadow-xl mx-auto my-auto">
    <div class="card-body">
        <form method="POST" action="{{ route('posts.update', ['post' => $post]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <!-- Title Input -->
            <div class="form-control w-full">
                <label for="title" class="label">
                    <span class="label-text">Title</span>
                </label>
                <input type="text" 
                       name="title" 
                       id="title" 
                       placeholder="Title" 
                       value="{{ old('title') ?? $post->title }}" 
                       class="input input-bordered w-full @error('title') input-error @enderror"
                       aria-label="Title" />
                @error('title')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Content Input -->
            <div class="form-control w-full">
                <label for="body" class="label">
                    <span class="label-text">Content</span>
                </label>
                <textarea name="body"
                          id="body"
                          rows="12"
                          placeholder="Write something cool..."
                          class="textarea textarea-bordered w-full @error('body') textarea-error @enderror"
                          aria-label="Content">{{ old('body') ?? $post->body }}</textarea>
                @error('body')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image Input -->
            <div class="form-control w-full">
                <label for="image" class="label">
                    <span class="label-text">Image</span>
                </label>
                <input type="file" 
                       name="image" 
                       id="image" 
                       accept="image/*" 
                       class="file-input file-input-bordered w-full @error('image') file-input-error @enderror"
                       aria-label="Image" />
                @error('image')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="mt-4 flex justify-end space-x-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url()->previous() }}" class="btn btn-error">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
