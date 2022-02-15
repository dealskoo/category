@extends('admin::layouts.panel')

@section('title',__('category::category.view_category'))
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
                        <li class="breadcrumb-item active">{{ __('category::category.view_category') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('category::category.view_category') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">{{ __('category::category.name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" required
                                   value="{{ old('name',$category->name) }}" autofocus tabindex="1" readonly
                                   placeholder="{{ __('category::category.name_placeholder') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug" class="form-label">{{ __('category::category.slug') }}</label>
                            <input type="text" class="form-control" id="slug" name="slug" required
                                   value="{{ old('slug',$category->slug) }}" tabindex="2" readonly
                                   placeholder="{{ __('category::category.slug_placeholder') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="country_id"
                                   class="form-label">{{ __('category::category.country') }}</label>
                            <select id="country_id" name="country_id" class="form-control select2" data-toggle="select2" tabindex="3">
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}"
                                            @if($category->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="index" class="form-label">{{ __('category::category.index') }}</label>
                            <input type="number" class="form-control" id="index" name="index" required
                                   value="{{ old('index',$category->index) }}" tabindex="4" readonly
                                   placeholder="{{ __('category::category.index_placeholder') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="parent_id"
                                   class="form-label">{{ __('category::category.parent') }}</label>
                            <select id="parent_id" name="parent_id" class="form-control select2" data-toggle="select2" tabindex="5">
                                <option value="">{{ __('category::category.parent_placeholder') }}</option>
                                @foreach($categories as $cate)
                                    <option value="{{ $cate->id }}"
                                            @if($category->parent_id == $cate->id) selected @endif>{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
