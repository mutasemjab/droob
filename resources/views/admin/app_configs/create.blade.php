@extends('layouts.admin')

@section('title', __('messages.add_new_config'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('messages.add_new_config') }}</h4>
                    <a href="{{ route('app-configs.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> {{ __('messages.back') }}
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('app-configs.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('messages.email') }}</label>
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}"
                                           placeholder="{{ __('messages.enter_email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">{{ __('messages.phone') }}</label>
                                    <input type="text" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone') }}"
                                           placeholder="{{ __('messages.enter_phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Google Play Link -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="google_play_link" class="form-label">{{ __('messages.google_play_link') }}</label>
                                    <input type="url" 
                                           class="form-control @error('google_play_link') is-invalid @enderror" 
                                           id="google_play_link" 
                                           name="google_play_link" 
                                           value="{{ old('google_play_link') }}"
                                           placeholder="{{ __('messages.enter_google_play_link') }}">
                                    @error('google_play_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- App Store Link -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="app_store_link" class="form-label">{{ __('messages.app_store_link') }}</label>
                                    <input type="url" 
                                           class="form-control @error('app_store_link') is-invalid @enderror" 
                                           id="app_store_link" 
                                           name="app_store_link" 
                                           value="{{ old('app_store_link') }}"
                                           placeholder="{{ __('messages.enter_app_store_link') }}">
                                    @error('app_store_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Hawawi Link -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="hawawi_link" class="form-label">{{ __('messages.hawawi_link') }}</label>
                                    <input type="url" 
                                           class="form-control @error('hawawi_link') is-invalid @enderror" 
                                           id="hawawi_link" 
                                           name="hawawi_link" 
                                           value="{{ old('hawawi_link') }}"
                                           placeholder="{{ __('messages.enter_hawawi_link') }}">
                                    @error('hawawi_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Minimum Versions -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="min_version_google_play" class="form-label">{{ __('messages.min_version_google_play') }}</label>
                                    <input type="text" 
                                           class="form-control @error('min_version_google_play') is-invalid @enderror" 
                                           id="min_version_google_play" 
                                           name="min_version_google_play" 
                                           value="{{ old('min_version_google_play') }}"
                                           placeholder="{{ __('messages.enter_version') }}">
                                    @error('min_version_google_play')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="min_version_app_store" class="form-label">{{ __('messages.min_version_app_store') }}</label>
                                    <input type="text" 
                                           class="form-control @error('min_version_app_store') is-invalid @enderror" 
                                           id="min_version_app_store" 
                                           name="min_version_app_store" 
                                           value="{{ old('min_version_app_store') }}"
                                           placeholder="{{ __('messages.enter_version') }}">
                                    @error('min_version_app_store')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="min_version_hawawi" class="form-label">{{ __('messages.min_version_hawawi') }}</label>
                                    <input type="text" 
                                           class="form-control @error('min_version_hawawi') is-invalid @enderror" 
                                           id="min_version_hawawi" 
                                           name="min_version_hawawi" 
                                           value="{{ old('min_version_hawawi') }}"
                                           placeholder="{{ __('messages.enter_version') }}">
                                    @error('min_version_hawawi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('app-configs.index') }}" class="btn btn-secondary me-md-2">
                                {{ __('messages.cancel') }}
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> {{ __('messages.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection