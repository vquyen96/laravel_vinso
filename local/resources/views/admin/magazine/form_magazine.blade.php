@extends('admin.master')

@section('css')
    <style>
        .image-slide{
            min-height: 170px;
            border: 1px dotted forestgreen;
            border-radius: 10px;
            margin: 0;
        }
    </style>
@stop
@section('main')
    @if (session('error'))
        <div class="alert alert-error">
            <p>{{ session('error') }}</p>
        </div>
    @endif
    <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>{{isset($magazine) && $magazine->id != 0? 'Thay đổi' : 'Thêm mới'}} Magazine</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ asset('admin') }}">Trang chủ</a></li>
                  <li class="breadcrumb-item"><a href="{{ asset('admin/magazine') }}">Magazine</a></li>
                  <li class="breadcrumb-item active">{{isset($magazine) && $magazine->id != 0? 'Thay đổi' : 'Thêm mới'}}</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12 col-sm-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">{{isset($magazine) && $magazine->id != 0? 'Thay đổi' : 'Thêm mới'}}</h3>
                    </div>
                    <form id="create_magazine" action="{{route('action_magazine')}}" method="post">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="row form-group d-none">
                                <label class="col-sm-2">ID video</label>
                                <div class="col-sm-10">
                                    <input type="text" name="magazine[id]" value="{{$magazine->id}}" class="form-control" placeholder="ID danh mục">
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-2">
                                    Tiêu đề tạp chí
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="magazine[title]" value="{{$magazine->title}}">
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-2">Danh mục tạp chí</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" data-placeholder="Chọn danh mục" name="magazine[groupid]"
                                            style="width: 100%;">
                                        @foreach($list_group as $articel_item)
                                            <option {{$magazine->groupid == $articel_item->id ? 'selected' : ''}} value="{{ $articel_item->id }}">{{ $articel_item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-2">Slide ảnh</label>
                                <div class="col-sm-10">
                                    <div class="row image-slide" style="position: relative">
                                        @foreach($magazine->slide_show as $slide)
                                            <div class="col-sm-3 img-avatar" style="position: relative;width: 100% ; z-index: 10000">
                                                <img id="blog_avatar" style="width: 100%" src="{{asset("/local/resources".$slide)}}"
                                                     alt="">
                                                <i class="fa fa-trash text-danger pointer"
                                                   style="position: absolute;top: 10px;right: 15px"
                                                   onclick="$(this).closest('div').remove();"></i>
                                                <input class="d-none" name="magazine[slide_show][]" value="{{$slide}}" type="text">
                                            </div>
                                        @endforeach
                                        {{-- @if(count($magazine->slide_show) < 4)
                                           
                                        @endif --}}
                                            <div class="add-slide" style="position: absolute;top: 15px;right: 20px">
                                                <a style="cursor: pointer" onclick="avatar.click()"><i class="fa fa-plus-circle"></i></a>
                                                <input #avatar class="d-none" type="file" id="avatar"
                                                       onchange="uploadSlideImage(avatar,avatar.files[0])">
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-2">Trạng thái</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <label class="col-sm-3 text-primary">
                                            <input value="2" type="radio" name="magazine[status]" {{ $magazine->status == 1 ? 'checked' : '' }}>
                                            Hoạt động
                                        </label>
                                        <label class="col-sm-3 text-primary">
                                            <input value="1" type="radio" name="magazine[status]" {{ $magazine->status != 1 ? 'checked' : '' }}>
                                            Không hoạt động
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                            



                        {{--<div class="row" style="margin: 20px 0px">--}}
                            {{--<div class="col-sm-6 text-danger">Thông tin SEO</div>--}}
                        {{--</div>--}}

                        {{--<div class="row form-group">--}}
                            {{--<label class="col-sm-2">Keywords </label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-12">--}}
                                        {{--<input type="text" class="form-control" name="magazine[keywords]" value="{{$magazine->keywords}}">--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-12">--}}
                                        {{--<span class="text-danger" style="font-style: italic">Tối đa 4 từ khóa, ngăn cách dấu "-"</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row form-group">--}}
                            {{--<label class="col-sm-2">Description Meta</label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-12">--}}
                                        {{--<input type="text" class="form-control" name="magazine[description]" value="{{$magazine->description}}">--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-12">--}}
                                        {{--<span class="text-danger" style="font-style: italic">Tối đa 160 ký tự</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row form-group">--}}
                            {{--<label class="col-sm-2">SeoTitle </label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-12">--}}
                                        {{--<input type="text" class="form-control" name="magazine[seo_title]" value="{{$magazine->seo_title}}">--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-12">--}}
                                        {{--<span class="text-danger" style="font-style: italic">Tối đa 70 ký tự</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="box-footer card-footer">
                            <button type="submit" class="btn btn-info pull-right" style="margin-right: 10px">{{$magazine->id ? 'Cập nhật' : 'Tạo mới'}}</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>

            <!-- ./row -->
        </section>
    </div>
@stop



@section('script')
@stop
