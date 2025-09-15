@extends('layouts.admin')

@section('title', __('messages.app_configurations'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('messages.app_configurations') }}</h4>
                    <a href="{{ route('app-configs.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('messages.add_new_config') }}
                    </a>
                </div>

                <div class="card-body">
                    

                    @if($appConfigs->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('messages.id') }}</th>
                                        <th>{{ __('messages.email') }}</th>
                                        <th>{{ __('messages.phone') }}</th>
                                        <th>{{ __('messages.google_play_link') }}</th>
                                        <th>{{ __('messages.app_store_link') }}</th>
                                        <th>{{ __('messages.hawawi_link') }}</th>
                                        <th>{{ __('messages.created_at') }}</th>
                                        <th>{{ __('messages.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($appConfigs as $config)
                                        <tr>
                                            <td>{{ $config->id }}</td>
                                            <td>{{ $config->email ?? '-' }}</td>
                                            <td>{{ $config->phone ?? '-' }}</td>
                                            <td>
                                                @if($config->google_play_link)
                                                    <a href="{{ $config->google_play_link }}" target="_blank" class="btn btn-sm btn-success">
                                                        <i class="fab fa-google-play"></i>
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if($config->app_store_link)
                                                    <a href="{{ $config->app_store_link }}" target="_blank" class="btn btn-sm btn-primary">
                                                        <i class="fab fa-app-store"></i>
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if($config->hawawi_link)
                                                    <a href="{{ $config->hawawi_link }}" target="_blank" class="btn btn-sm btn-info">
                                                        <i class="fas fa-mobile-alt"></i>
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $config->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('app-configs.show', $config) }}" 
                                                       class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('app-configs.edit', $config) }}" 
                                                       class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('app-configs.destroy', $config) }}" 
                                                          method="POST" 
                                                          class="d-inline"
                                                          onsubmit="return confirm('{{ __('messages.confirm_delete') }}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $appConfigs->links() }}
                        </div>
                    @else
                        <div class="text-center py-4">
                            <p class="text-muted">{{ __('messages.no_configurations_found') }}</p>
                            <a href="{{ route('app-configs.create') }}" class="btn btn-primary">
                                {{ __('messages.create_first_config') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection