@extends('registrar::layouts.backend')


@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <div class="flex-grow-1">
                    <h5 class="h5 fw-bold mb-0">
                        Data Import
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Data Import</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page" >
                            Data Import
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
    <div  style="margin-left:20%;" class="block block-rounded col-md-9 col-lg-8 col-xl-6">
        <div class="block-header block-header-default">
            <h3 class="block-title">Import </h3>
          </div>
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-12 space-y-0">

                
                        
                <form class="row row-cols-lg-auto g-3 align-items-center" action="{{ route('courses.importkuccps') }}" method="post" enctype="multipart/form-data">

                    @csrf
                    <div class="col-12 col-xl-12">
                        <label class="mb-2 fw-bold " for="">Intake</label>
                        <select name="intake" id="intake" value="" class="form-control form-control-alt text-uppercase">
                          <option selected disabled> Select Intake</option>
                          @foreach ($intakes as $intake)
                            <option value="{{ $intake->id }}">{{ Carbon\carbon::parse($intake->intake_from)->format('M')}} - {{ Carbon\carbon::parse($intake->intake_to)->format('M Y') }}</option>        
                          @endforeach
                        </select>
                      </div>

                    <div class="col-12 col-xl-12">
                         <label class="mb-2 fw-bold">File Import</label>
                         <input type="file" name="excel_file" class="form-control">
                    </div>

                    <div class="col-12 col-xl-12">
                         <button type="submit" class="btn btn-alt-success mb-3">Import </button>
                    </div>
                    {{-- <div>
                        <a class="btn btn-alt-info" href="{{ route('courses.exportkuccps') }}">Download </a>

                    </div> --}}

                </form>
            </div>

                @if(count($new) > 0)
                <div class="d-flex justify-content-center">

                    <span class="text-success"> You have imported {{ count($new) }} new students </span> 

                </div>
                @endif
                  <div class="d-flex justify-content-center">

                     <a class="btn btn-sm btn-success col-md-4 mt-4" href="{{ route('courses.accepted') }}" data-toggle="click-ripple"> Send Mails </a>
            
                     </div>
                  </div>
        </div>
    </div>
    </div></div>

@endsection