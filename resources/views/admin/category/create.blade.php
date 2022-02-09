@extends('admin::layouts.panel')

@section('title',__('category::category.add_category'))
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.dashboard') }}">{{ __('admin::admin.dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('admin::admin.settings') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('category::category.add_category') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('category::category.add_category') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="post">
                        @csrf
                        @if(!empty(session('success')))
                            <div class="alert alert-success">
                                <p class="mb-0">{{ session('success') }}</p>
                            </div>
                        @endif
                        @if(!empty($errors->all()))
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p class="mb-0">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">{{ __('category::category.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                       value="{{ old('name') }}" autofocus tabindex="1"
                                       placeholder="{{ __('category::category.name_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="slug" class="form-label">{{ __('category::category.slug') }}</label>
                                <input type="text" class="form-control" id="slug" name="slug" required
                                       value="{{ old('slug') }}" tabindex="2"
                                       placeholder="{{ __('category::category.slug_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="country_id"
                                       class="form-label">{{ __('category::category.country') }}</label>
                                <select id="country_id" name="country_id" class="form-select" tabindex="3">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="index" class="form-label">{{ __('category::category.index') }}</label>
                                <input type="number" class="form-control" id="index" name="index" required
                                       value="{{ old('index') }}" tabindex="4"
                                       placeholder="{{ __('category::category.index_placeholder') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="parent_id"
                                       class="form-label">{{ __('category::category.parent') }}</label>
                                <select id="parent_id" name="parent_id" class="form-select" tabindex="5">
                                    <option value="">{{ __('category::category.parent_placeholder') }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> <!-- end row -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-success mt-2" tabindex="6"><i
                                    class="mdi mdi-content-save"></i> {{ __('admin::admin.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
