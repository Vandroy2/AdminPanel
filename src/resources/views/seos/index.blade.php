@extends('layouts.admin')
@section('style')

    <link href="{{ asset('adminAssets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/toastr/css/toastr.min.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

@endsection
@section('content')

    <!-- row -->
    <div class="container-fluid">
        @include('includes.errors')
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Сео</h4>
                    <div class="row page-titles mx-0 pall-0">
                        <a href="{{ route('admin.seos.create') }}" class="pall-0">
                            <button type="button" class="btn btn-primary">
                                <span class="btn-icon-left text-primary">
                                    <i class="fa fa-plus color-primary"></i>
                                </span>
                                <span style="font-weight: bold;margin-right:20px;">Додати сео</span>
                            </button>
                        </a>
                    </div>

                </div>
            </div>
            {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Список новостей</a></li>
                </ol>
            </div> --}}
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Сео</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Адреса</th>
                                    <th scope="col">Заголовок</th>
                                    <th scope="col">Опис</th>
                                    <th scope="col" style="width: 10%;text-align: center;">Дiї</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($seos as $seo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $seo->seo_url }}</td>
                                        <td>{{ $seo->title_uk }}</td>
                                        <td>{!!strip_tags(substr($seo->description_uk,0,120))!!}...</td>
                                        <td style="width: 10%;text-align: center;">
                                            <span class="flex">
                                                <a href="{{ route('admin.seos.edit',$seo->id) }}" class="mr-4 btn btn-info" data-toggle="tooltip"
                                                     data-placement="top" title="Edit"><i
                                                        class="fas fa-pencil-alt color-muted"></i> </a>
                                                <form action="{{ route('admin.seos.destroy',$seo->id) }}" onclick="return confirm('Ви дійсно бажаєте видалити?')" method="POST" style="display:inline-block">

                                                @csrf
                                                    @method('DELETE')

                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger"><i class="fas fa-times color-danger"></i></button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="wrapp_pagination admin-pagination">
                            <div class="pagination">
                                {{ $seos->links() }}
                                {{-- <a href="#" class="arrow prev"><span class="icon-arrowDown"></span></a>
                                <a href="#">1</a>
                                <a class="active" href="#">2</a>
                                <a href="#">3</a>
                                <a href="#" class="arrow next"><span class="icon-arrowDown"></span></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')



    <script src="{{ asset('adminAssets/vendor/toastr/js/toastr.min.js') }}"></script>
    @if(session()->has('alert-success'))
        <script>
            toastr.success("{{ session('alert-success') }}", {
                timeOut: 5000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-top-right",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            })

        </script>
    @endif
    <script src="{{ asset('adminAssets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/plugins-init/datatables.init.js') }}"></script>
@endsection
