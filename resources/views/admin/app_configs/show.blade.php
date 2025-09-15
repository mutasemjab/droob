@extends('layouts.admin')

@section('title', __('messages.view_config'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('messages.view_config') }}</h4>
                    <div>
                        <a href="{{ route('app-configs.edit', $appConfig) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> {{ __('messages.edit') }}
                        </a>
                        <a href="{{ route('app-configs.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> {{ __('messages.back') }}
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="bg-light" width="30%">{{ __('messages.id') }}</th>
                                        <td>{{ $appConfig->id }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">{{ __('messages.email') }}</th>
                                        <td>
                                            @if($appConfig->email)
                                                <a href="mailto:{{ $appConfig->email }}">{{ $appConfig->email }}</a>
                                            @else
                                                <span class="text-muted">{{ __('messages.not_set') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">{{ __('messages.phone') }}</th>
                                        <td>
                                            @if($appConfig->phone)
                                                <a href="tel:{{ $appConfig->phone }}">{{ $appConfig->phone }}</a>
                                            @else
                                                <span class="text-muted">{{ __('messages.not_set') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">{{ __('messages.google_play_link') }}</th>
                                        <td>
                                            @if($appConfig->google_play_link)
                                                <a href="{{ $appConfig->google_play_link }}" target="_blank" class="btn btn-sm btn-success">
                                                    <i class="fab fa-google-play"></i> {{ __('messages.open_link') }}
                                                </a>
                                                <br><small class="text-muted">{{ $appConfig->google_play_link }}</small>
                                            @else
                                                <span class="text-muted">{{ __('messages.not_set') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">{{ __('messages.app_store_link') }}</th>
                                        <td>
                                            @if($appConfig->app_store_link)
                                                <a href="{{ $appConfig->app_store_link }}" target="_blank" class="btn btn-sm btn-primary">
                                                    <i class="fab fa-app-store"></i> {{ __('messages.open_link') }}
                                                </a>
                                                <br><small class="text-muted">{{ $appConfig->app_store_link }}</small>
                                            @else
                                                <span class="text-muted">{{ __('messages.not_set') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">{{ __('messages.hawawi_link') }}</th>
                                        <td>
                                            @if($appConfig->hawawi_link)
                                                <a href="{{ $appConfig->hawawi_link }}" target="_blank" class="btn btn-sm btn-info">
                                                    <i class="fas fa-mobile-alt"></i> {{ __('messages.open_link') }}
                                                </a>
                                                <br><small class="text-muted">{{ $appConfig->hawawi_link }}</small>
                                            @else
                                                <span class="text-muted">{{ __('messages.not_set') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">{{ __('messages.min_version_google_play') }}</th>
                                        <td>
                                            @if($appConfig->min_version_google_play)
                                                <span class="badge bg-success">{{ $appConfig->min_version_google_play }}</span>
                                            @else
                                                <span class="text-muted">{{ __('messages.not_set') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">{{ __('messages.min_version_app_store') }}</th>
                                        <td>
                                            @if($appConfig->min_version_app_store)
                                                <span class="badge bg-primary">{{ $appConfig->min_version_app_store }}</span>
                                            @else
                                                <span class="text-muted">{{ __('messages.not_set') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">{{ __('messages.min_version_hawawi') }}</th>
                                        <td>
                                            @if($appConfig->min_version_hawawi)
                                                <span class="badge bg-info">{{ $appConfig->min_version_hawawi }}</span>
                                            @else
                                                <span class="text-muted">{{ __('messages.not_set') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">{{ __('messages.created_at') }}</th>
                                        <td>{{ $appConfig->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">{{ __('messages.updated_at') }}</th>
                                        <td>{{ $appConfig->updated_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('app-configs.edit', $appConfig) }}" class="btn btn-warning me-md-2">
                                    <i class="fas fa-edit"></i> {{ __('messages.edit') }}
                                </a>
                                <form action="{{ route('app-configs.destroy', $appConfig) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('{{ __('messages.confirm_delete') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i> {{ __('messages.delete') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection