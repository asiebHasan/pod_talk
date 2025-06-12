@extends('layouts.app')

@section('title', 'Become a Podcaster')

@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-0">Become a Podcaster</h2>
                    <p class="lead">Share your voice and connect with the world.</p>
                </div>
            </div>
        </div>
    </header>

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h3 class="mb-4">Why Become a Podcaster?</h3>
                    <p class="lead">Join a community of creators and share your stories, ideas, and passions with the
                        world.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Reach a Global Audience</h5>
                            <p class="card-text">Your voice can reach listeners around the world. Share your message and
                                connect with a diverse audience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Easy to Start</h5>
                            <p class="card-text">Getting started is simple. We provide the tools and resources you need to
                                launch your podcast.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Supportive Community</h5>
                            <p class="card-text">Join a vibrant community of podcasters. Share tips, get feedback, and
                                collaborate with others.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="mb-4 text-center">Set Up Your Podcast Channel</h3>
                            <p class="lead text-center">Please provide details about your channel</p>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('podcaster.register') }}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <div class="mb-3">
                                    <label for="bio" class="form-label">Bio <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="4" required>{{ old('bio') }}</textarea>
                                    @error('bio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nationality" class="form-label">Nationality <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nationality') is-invalid @enderror" id="nationality" name="nationality" value="{{ old('nationality') }}" required>
                                </div>


                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Avatar</label>
                                    <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                        id="avatar" name="avatar" accept="avatar/*">
                                    @error('avatar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Recommended size: 1000x1000 pixels, JPG or PNG format</div>
                                </div>

                                <div class="mb-3">
                                    <label for="tags" class="form-label">Channel Tags <span
                                            class="text-danger">*</span></label>
                                    <p class="form-text">Select tags that best describe your podcast content</p>

                                    <div class="row">
                                        @foreach ($tags as $tag)
                                            <div class="col-md-4 mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tags[]"
                                                        value="{{ $tag->id }}" id="tag-{{ $tag->id }}"
                                                        @if (in_array($tag->id, old('tags', []))) checked @endif>
                                                    <label class="form-check-label" for="tag-{{ $tag->id }}">
                                                        {{ $tag->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('tags')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- identification passport/nid/driving licence --}}
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-3 mb-2">
                                            <label for="id_type" class="form-label">ID Type <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select @error('id_type') is-invalid @enderror"
                                                id="id_type" name="id_type" required>
                                                <option value="">Select ID Type</option>
                                                <option value="passport"
                                                    {{ old('id_type') == 'passport' ? 'selected' : '' }}>Passport</option>
                                                <option value="national_id"
                                                    {{ old('id_type') == 'national_id' ? 'selected' : '' }}>National ID
                                                </option>
                                                <option value="driver_license"
                                                    {{ old('id_type') == 'driver_license' ? 'selected' : '' }}>Driving
                                                    License</option>
                                            </select>
                                            @error('id_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="id_number" class="form-label">ID Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('id_number') is-invalid @enderror"
                                                id="id_number" name="id_number" value="{{ old('id_number') }}" required>
                                            @error('id_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- social media --}}
                                <div class="mb-3">
                                    <label for="social_links" class="form-label">Social Media Links</label>
                                    <p class="form-text">Optional: Add links to your social media profiles</p>
                                    {{-- insta/facebook/discord/linkedin/printerest/twitter --}}
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <input type="url" class="form-control" id="instagram" name="instagram"
                                                placeholder="Instagram URL" value="{{ old('instagram') }}">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <input type="url" class="form-control" id="facebook" name="facebook"
                                                placeholder="Facebook URL" value="{{ old('facebook') }}">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <input type="url" class="form-control" id="discord" name="discord"
                                                placeholder="Discord URL" value="{{ old('discord') }}">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <input type="url" class="form-control" id="twitter" name="twitter"
                                                placeholder="Twitter URL" value="{{ old('twitter') }}">
                                        </div>

                                    </div>

                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="terms" name="terms"
                                            required>
                                        <label class="form-check-label" for="terms">
                                            I agree to the <a href="">Terms of Service</a> and
                                            <a href="">Privacy Policy</a>
                                        </label>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn custom-btn smoothscroll mt-3">Become a
                                            Podcaster</button>
                                    </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <p>Already have a channel? <a href="{{ route('login') }}">Go to your dashboard</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
