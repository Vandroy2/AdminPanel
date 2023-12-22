@extends('layouts.admin')

@section('style')


    <link href="{{ asset('adminAssets/vendor/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('adminAssets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/pickadate/themes/default.date.css') }}">
@endsection



@section('content')

    <div class="container-fluid">
        @include('includes.errors')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST"
                              @if(isset($seo))
                              action="{{ route('admin.seos.update', ['seo' => $seo->id]) }}"
                              @else
                              action="{{ route('admin.seos.store') }}"
                              @endif
                              class="form-group form-valide mb-2"  enctype="multipart/form-data" novalidate>

                            {{ csrf_field() }}
                            @if(isset($seo))
                                {{ method_field('put') }}
                                <input type="hidden" name="url" value="{{ url()->previous() }}">
                                <input type="hidden" name="seo_id" value="{{ $seo->id }}">

                            @endif
                            <div class="row">
                                <div class="col-sm-8">

                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-uk-tab" data-bs-toggle="tab" data-bs-target="#uk" type="button" role="tab" aria-controls="nav-uk" aria-selected="true">Українська версiя</button>
                                            <button class="nav-link" id="nav-en-tab" data-bs-toggle="tab" data-bs-target="#en" type="button" role="tab" aria-controls="nav-en" aria-selected="false">English version</button>
                                        </div>
                                    </nav>

                                    <div class="tab-content" id="myTabContent">


                                        <div class="tab-pane fade show active" id="ru" role="tabpanel" aria-labelledby="ru-tab"><br>

                                            <div class="form-group mb-2">
                                                <label>Назва<small>(український варiант)</small></label>
                                                <input type="text" name="title_uk" class="form-control"
                                                       @isset($seo)
                                                       value="{!!old('title_uk') ? old('title_uk') : $seo->title_uk !!}"
                                                       @else
                                                       value="{{ old('title_uk') }}"
                                                        @endisset
                                                >
                                            </div>
                                            <div class="form-group mb-2">
                                                <label>Змст<small>(український варiант)</small></label>
                                                <textarea name="description_uk" class="form-control editTextarea" id="" rows="5">
                                                    @isset($seo)
                                                        {!!old('description_uk') ? old('description_uk') : $seo->description_uk !!}
                                                    @else
                                                        {!!old('description_uk') !!}
                                                    @endisset
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="en" role="tabpanel" aria-labelledby="en-tab"><br>

                                            <div class="form-group mb-2">
                                                <label>Title<small>(english)</small></label>
                                                <input type="text" name="title_en" class="form-control"
                                                       @isset($seo)
                                                       value="{!! old('title_en') ? old('title_en') : $seo->title_en !!}"
                                                       @else
                                                       value="{{ old('title_en') }}"
                                                        @endisset
                                                >
                                            </div>

                                            <div class="form-group mb-2">
                                                <label>Description<small>(english)</small></label>
                                                <textarea name="description_en" class="form-control editTextarea" id="" rows="5">
                                                    @isset($seo)
                                                        {!! old('description_en') ? old('description_en') : $seo->description_en !!}
                                                    @else
                                                        {!!old('description_en') !!}
                                                    @endisset
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4">Адреса</div>
                                    <input type="string" name="seo_url" class="form-control"
                                           @isset($seo)
                                           value="{!! old('seo_url') ? old('seo_url') : $seo->seo_url !!}"
                                           @else
                                           value="{{ old('seo_url') }}"
                                            @endisset
                                    >

                                </div>

                            </div>
                            <br>
                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-success">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')



<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js" type="text/javascript"></script>

    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
        This must be loaded before fileinput.min.js -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js" type="text/javascript"></script>


    <!-- the main fileinput plugin script JS file -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>

    <!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`). Uncomment if needed. -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/themes/fas/theme.min.js"></script>

    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/locales/ru.js"></script>
    <!-- momment js is must -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ru.min.js" integrity="sha512-+yvkALwyeQtsLyR3mImw8ie79H9GcXkknm/babRovVSTe04osQxiohc1ukHkBCIKQ9y97TAf2+17MxkIimZOdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('adminAssets/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('adminAssets/vendor/summernote/js/summernote.min.js') }}"></script>
    <!-- Material color picker -->
    <script src="{{ asset('adminAssets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    <!-- Summernote init -->
    <script src="{{ asset('adminAssets/js/plugins-init/summernote-init.js') }}"></script>
    <!-- Material color picker init -->
    <script src="{{ asset('adminAssets/js/plugins-init/material-date-picker-init.js') }}"></script>

    <script src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>

    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>

    <script src="{{asset('js/wysiwyg.js')}}"></script>


    <script>
        tinymce.init({
            selector: '.editTextarea',
        });
    </script>

@endsection
