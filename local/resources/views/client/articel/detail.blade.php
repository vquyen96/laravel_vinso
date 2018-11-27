@extends('client.master')
@section('title', $articel_detail->title)
@section('fb_title', cut_string($articel_detail->title, 70))
@section('fb_des', $articel_detail->summary)
@section('fb_img', isset($articel_detail->fimage)  && $articel_detail->fimage ? (file_exists(storage_path('app/article/resized500-'.$articel_detail->fimage)) ? asset('local/storage/app/article/resized500-'.$articel_detail->fimage) : (file_exists(resource_path($articel_detail->fimage)) ? asset('/local/resources'.$articel_detail->fimage) : 'images/default-image.png')) : 'images/default-image.png')


@section('css')
    <style>
        .error{
            color: red;
            font-style: italic;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/detail.css">
@stop
@section('main')
    <div id="main">
        <section class="section1">
            <div class="detailTitle my-2">
                @if ($articel_detail->status == 1)
                    @foreach($list_group as $group)
                        @if($loop->index != 0)
                            <i class="fas fa-angle-right"></i>
                        @endif
                        <a href="{{ route('get_articel_by_group',$group->slug.'---n-'.$group->id) }}">
                            {{$group->title}}
                        </a>
                    @endforeach
                @else
                    
                    <a href="{{ asset('') }}">
                        Việt nam hội nhập
                    </a>
                    <i class="fas fa-angle-right"></i>
                    <a href="{{ asset('about') }}">
                        giới thiệu
                    </a>
                    
                @endif
                    
            </div>
            <div class="detailMain">
                <div class="mainDetailLeft">
                    <h1 class="mt-2">{{$articel_detail->title}}</h1>
                    <div class="mainDetailLeftTime">
                        <i class="far fa-clock"></i>
                        {{$articel_detail->day_in_week_str}}, {{$articel_detail->release_time}} (GMT+7)
                        <div class="float-right btn-fb">
                            {{--<div class="fb-like" data-href="{{ route('get_detail_articel',$articel_detail->slug.'---n-'.$articel_detail->id) }}"--}}
                                 {{--data-action="like" data-size="small" data-layout="button_count"></div>--}}

                            {{--<div class="fb-share-button"--}}
                                 {{--data-href="{{ route('get_detail_articel',$articel_detail->slug.'---n-'.$articel_detail->id) }}" data-size="small"--}}
                                 {{--data-layout="button_count">--}}
                            {{--</div>--}}


                            <div class="fb-like" data-href="{{ URL::current() }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                            {{--<div class="fb-share-button" data-href="{{ URL::current() }}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>--}}
                            <a href="{{$web_info->facebook}}" class="fb-fanpage" target="blank">
                                <i class="fab fa-facebook-f"></i>
                                Fanpage
                            </a>
                        </div>
                    </div>
                    @if($relates != null)
                    <div class="mainDetailLeftRelate">
                        <ul style="padding-left: 20px;">
                            @foreach($relates as $article)
                            <li>
                                <a href="{{ route('get_detail_articel',$article->slug.'---n-'.$article->id) }}">
                                    {{ $article->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="mainDetailLeftContent">
                        {!! $articel_detail->content !!}
                    </div>

                    <div class="mainDetailLeftInfo mb-4">
                        <p>{!! $articel_detail->tacgia !!}</p>
                        @if($articel_detail->tacgia != '' && $articel_detail->nguontin != '')
                            <span>&nbsp;/&nbsp;</span>
                        @endif
                        <p>{!! $articel_detail->nguontin !!}</p>
                    </div>
                    <div class="btn-fb">

                        <div class="fb-like" data-href="{{ URL::current() }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

                        {{--<div class="btn-fb-item fb-like" data-href="{{ route('get_detail_articel',$articel_detail->slug.'---n-'.$articel_detail->id) }}"--}}
                             {{--data-action="like" data-size="small" data-layout="button_count"></div>--}}

                        {{--<div class="btn-fb-item fb-share-button"--}}
                             {{--data-href="{{ route('get_detail_articel',$articel_detail->slug.'---n-'.$articel_detail->id) }}" data-size="small"--}}
                             {{--data-layout="button_count">--}}
                        {{--</div>--}}
                        <a href="{{$web_info->facebook}}" class="btn-fb-item fb-fanpage" target="blank">
                            <i class="fab fa-facebook-f"></i>
                            Fanpage1
                        </a>
                    </div>


                    <div class="mainDetailLeftBanner">
                        <?php $count_ad = 0?>
                        @if (count($list_ad[4]) > 0)
                            @for ($i = 0; $i < count($list_ad[4]); $i++)
                                @if ($list_ad[4][$i]->advert->ad_status == 1)
                                    <a href="{{ $list_ad[4][$i]->advert->ad_link}}" target="blank"><img src="{{asset('local/storage/app/advert/'.$list_ad[4][$i]->advert->ad_img)}}"></a>
                                    <?php $count_ad++ ?>
                                @endif
                            @endfor
                        @endif
                        @if (count($ad_home[6])>0)
                            @for ($i = 0; $i < count($ad_home[6]); $i++)
                                @if ($ad_home[6][$i]->advert->ad_status == 1 && $count_ad == 0)
                                    <a href="{{ $ad_home[6][$i]->advert->ad_link}}" target="blank"><img src="{{asset('local/storage/app/advert/'.$ad_home[6][$i]->advert->ad_img)}}"></a>
                                    <?php $count_ad++ ?>
                                @endif
                            @endfor
                        @endif
                        @if ($count_ad == 0)
                            <a href="{{ asset('') }}">
                                <img src="images/728x90.png">
                            </a>
                        @endif
                    </div>
                    {{-- <div class="mainDetailLeftRecommend">
                        <div class="mainDetailLeftRecommendItem left">
                            <div class="mainDetailLeftRecommendItemImg">
                                <img src="images/Layer 66.png">
                            </div>
                            <div class="mainDetailLeftRecommendItemTitle">
                                <i class="fas fa-angle-double-left"></i>
                                Bài trước
                            </div>
                            <div class="mainDetailLeftRecommendItemContent">
                                Sở Giáo dục Hà Giang đề nghị khởi tố điều tra sai phạm về điểm thi
                            </div>
                        </div>
                        <div class="mainDetailLeftRecommendItem right">
                            <div class="mainDetailLeftRecommendItemImg">
                                <img src="images/Layer 66.png">
                            </div>
                            <div class="mainDetailLeftRecommendItemTitle">
                                <i class="fas fa-angle-double-right"></i>
                                Bài tiếp
                            </div>
                            <div class="mainDetailLeftRecommendItemContent">
                                Sở Giáo dục Hà Giang đề nghị khởi tố điều tra sai phạm về điểm thi
                            </div>
                        </div>
                    </div> --}}
                    @if($list_comment->count())
                    <div class="mainDetailLeftComment">
                        <h4 class="mainDetailLeftTitle">{{\Illuminate\Support\Facades\Config::get('app.locale') ==
                        'vn' ? 'Bình luận' : 'Comment'}}</h4>

                        
                            <div id="bigger-3" class="list_comment {{$list_comment->count() <= 3 ? 'd-none' : ''}}">
                                @foreach($list_comment->chunk(3)[0] as $comment)
                                    <div class="comment">
                                        <div class="info">
                                            <span class="name">{{$comment->fullname}}</span>
                                            <span style="margin: 0 5px">-</span>
                                            <span class="time">{{$comment->created_at}}</span>
                                        </div>
                                        <div class="comment-content">
                                            {{$comment->content}}
                                        </div>
                                        <div class="reply" id_comment="{{ $comment->id }}">
                                            Trả lời
                                        </div>
                                        @if($loop->index == 2)
                                            <div class="load-comment">
                                                <button class="btn btn-default" onclick="load_comment()">Xem thêm</button>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <div id="less-3" class="list_comment {{$list_comment->count() > 3 ? 'd-none' : ''}}">
                                @foreach($list_comment as $comment)
                                    <div class="comment">
                                        <div class="info">
                                            <span class="name">{{$comment->fullname}}</span>
                                            <span style="margin: 0 5px">-</span>
                                            <span class="time">{{$comment->created_at}}</span>
                                        </div>
                                        <div class="comment-content">
                                            {{$comment->content}}
                                        </div>
                                        <div class="reply" id_comment="{{ $comment->id }}">
                                            Trả lời
                                        </div>
                                    </div>
                                    @foreach($comment->reply as $reply)
                                        <div class="reply_comment">
                                            <div class="info">
                                                <span class="name">{{$reply->fullname}}</span>
                                                <span style="margin: 0 5px">-</span>
                                                <span class="time">{{$reply->created_at}}</span>
                                            </div>
                                            <div class="comment-content">
                                                {{$reply->content}}
                                            </div>
                                            <div class="reply_child" id_comment="{{ $comment->id }}">
                                                Trả lời
                                            </div>
                                        </div>
                                    @endforeach

                                @endforeach
                            </div>
                        
                    </div>
                    @endif
                    <div class="mainDetailLeftComment">
                        <h4 class="mainDetailLeftTitle">{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Ý kiến của bạn' : 'Your opinion'}}</h4>
                        <div class="mainDetailLeftCommentMain">
                            <form id="comment_art" method="post" action="{{route('action_comment')}}">
                                {{ csrf_field() }}
                                <label>{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Nội dung' : 'Content'}} <span class="reply_in_form"></span></label>
                                <div class="form-group">
                                    <textarea name="comment[content]" rows="4" required id="com_content"></textarea>
                                </div>
                                <div class="mainDetailLeftCommentMainName_Email">
                                    <div class="mainDetailLeftCommentMainName">
                                        <label>{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Họ tên' : 'Fullname'}}</label>
                                        <div class="form-group">
                                            <input name="comment[fullname]" type="text" required value="{{ Auth::check() ? Auth::user()->fullname : '' }}" >
                                        </div>
                                    </div>
                                    <div class="mainDetailLeftCommentMainEmail">
                                        <label>Email</label>
                                        <div class="form-group">
                                            <input name="comment[email]" type="email"  required value="{{ Auth::check() ? Auth::user()->email : '' }}" >
                                        </div>
                                    </div>
                                </div>
                                <input name="comment[idnew]" value="{{$articel_detail->id}}" class="d-none">
                                <input name="comment[parent_id]" value="0" class="d-none" id="com_parent_id">
                                <input name="comment[groupid]" value="{{$articel_detail->groupid}}" class="d-none">
                                <input name="comment[slug]" value="{{$articel_detail->slug}}" class="d-none">

                                <div id="re-captcha" class="g-recaptcha" data-sitekey="{{env('KEY_GOOGLE_CAPTCHA')}}"  data-callback="onReCaptchaSuccess"></div>
                                {{-- <div class="g-recaptcha" data-theme="light" data-type="image" data-sitekey="{{env('KEY_GOOGLE_CAPTCHA')}}" data-callback="onReCaptchaSuccess"> --}}
                                
                                <div class="form-group mt-3">
                                    <button id="submit-comment" type="button" class="btn btn-danger">{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Gửi bình luận' : 'Comment'}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mainDetailLeftInvolve">
                        <h4 class="mainDetailLeftTitle">{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Bài được quan tâm' : 'Interested article'}}</h4>
                        <div class="mainDetailLeftInvolveMain">
                            @foreach($articel_related_3 as $art_related)
                                <div class="mainDetailLeftInvolveItem">
                                    <a href="{{ route('get_detail_articel',$art_related->slug.'---n-'.$art_related->id) }}">
                                        <div class="mainDetailLeftInvolveItemImg">

                                            <div class="avatar mb-2" style="background-image: url('{{ isset($art_related->fimage)  && $art_related->fimage ? (file_exists(storage_path('app/article/resized200-'.$art_related->fimage)) ? asset('local/storage/app/article/resized200-'.$art_related->fimage) : (file_exists(resource_path($art_related->fimage)) ? asset('/local/resources'.$art_related->fimage) : 'images/default-image.png')) : 'images/default-image.png' }}');">
                                            </div>
                                            <h3 class="title">{{$art_related->title}}</h3>

                                            {{--<img src="{{ file_exists(asset('/local/resources'.$art_related->fimage)) ? asset('/local/resources'.$art_related->fimage) : 'http://vietnamhoinhap.vn/'.$art_related->fimage }}">--}}
                                        </div>

                                        {{--<div class="mainDetailLeftInvolveItemContent">--}}
                                        {{----}}
                                        {{--</div>--}}
                                    </a>

                                </div>
                            @endforeach
                        </div>
                        <ul class="news-older">
                            @foreach($articel_related_5 as $art_related)
                                <li>
                                    <a href="{{ route('get_detail_articel',$art_related->slug.'---n-'.$art_related->id) }}">{{$art_related->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <div class="mainDetailRight">
                    <div class="mainDetailRightFollow mb-2">
                        <h4 class="mainDetailRightTitle red mb-0">{{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Bài được quan tâm' : 'Interested articel'}}</h4>
                        <ul class="mainDetailRightList">
                            @foreach($articel_top_view as $articel)
                                <li>
                                    <i class="fas fa-caret-right mr-1"></i>
                                    <a href="{{ route('get_detail_articel',$articel->slug.'---n-'.$articel->id) }}">{{$articel->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mainDetailRightJournal mb-3">
                        <h4 class="mainDetailRightTitle red">
                            {{\Illuminate\Support\Facades\Config::get('app.locale') == 'vn' ? 'Tạp chí thường kì' : 'Regular magazine'}}
                        </h4>
                        <div class="slide">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($magazine_new as $item)
                                        <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
                                            <img class="d-block w-100" src="{{asset('/local/storage/app/magazine/'.$item->m_img)}}" alt="Second slide">
                                            <div class="title">
                                                <h3>{{$item->m_title}}</h3>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mainDetailRightVideo mb-3">
                        <h4 class="mainDetailRightTitle red">
                            VNHN Video
                        </h4>
                        <ul class="mainDetailRightList">
                            @foreach($list_video_new as $video)

                                @if($loop->index == 0)
                                    @if(file_exists(resource_path($video->url_video)))
                                        <video height="auto" width="100%">
                                            <source src="{{ asset('/local/resources'.$video->url_video) }}">
                                        </video>
                                    @else
                                        <iframe width="100%" height="auto" src="{{ (file_exists(resource_path($video->url_video)) ? : file_exists('http://vietnamhoinhap.vn/'.$video->url_video) ? : '') ? : $video->url_video }}">
                                        </iframe>
                                    @endif
                                @endif
                                <li>
                                    <i class="fas fa-caret-right mr-1"></i>
                                    <a style="cursor: pointer" onclick="open_video('{{route('open_video',$video->id)}}')">{{$video->title}}</a>
                                </li>

                            @endforeach
                        </ul>

                    </div>
                    <div class="mainDetailRightAdvert">
                        <?php $count_ad = 0?>
                        @if (count($list_ad[3]) > 0)
                            @for ($i = 0; $i < count($list_ad[3]); $i++)
                                @if ($list_ad[3][$i]->advert->ad_status == 1)
                                    <a href="{{ $list_ad[3][$i]->advert->ad_link}}" target="blank"><img src="{{asset('local/storage/app/advert/'.$list_ad[3][$i]->advert->ad_img)}}"></a>
                                    <?php $count_ad++ ?>
                                @endif
                            @endfor
                        @endif
                        @if (count($ad_home[7])>0 && $count_ad == 0)
                            @for ($i = 0; $i < count($ad_home[7]); $i++)
                                @if ($ad_home[7][$i]->advert->ad_status == 1)
                                    <a href="{{ $ad_home[7][$i]->advert->ad_link}}" target="blank"><img src="{{asset('local/storage/app/advert/'.$ad_home[7][$i]->advert->ad_img)}}"></a>
                                    <?php $count_ad++ ?>
                                @endif
                            @endfor
                        @endif
                        @if ($count_ad == 0)
                            <a href="{{ asset('') }}">
                                <img src="images/300x250.png">
                            </a>

                        @endif

                    </div>


                </div>

            </div>
        </section>
    </div>
@stop
@section('script')
    <script src="js/jquery.validate.min.js"></script>


    @if(\Illuminate\Support\Facades\Config::get('app.locale','vn') == 'vn')
        <script src="https://www.google.com/recaptcha/api.js?hl=vi" async defer></script>
    @else
        <script src="https://www.google.com/recaptcha/api.js?hl=en" async defer></script>
    @endif
    {{--<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>--}}
    <script>
        $("#comment_art").validate({
            ignore: [],
            rules: {
                'comment[content]': {
                    required: true
                },
                'articel[fullname]': {
                    required: true
                },
                'articel[email]': {
                    required: true,
                    email: true
                }
            },
            messages: {
                'comment[content]': {
                    required: 'Vui lòng nhập nội dung'
                },
                'comment[fullname]': {
                    required: 'Vui lòng nhập họ tên'
                },
                'comment[email]': {
                    required: 'Vui lòng chọn email',
                    email: 'Vui lòng nhập đúng định dạng email'
                }
            }
        });


        $('#submit-comment').click(function () {
            $('#comment_art').addClass('disabled');
            var recaptcha = $("#g-recaptcha-response").val();
            if (recaptcha != '') {
                $('#comment_art').submit();
            }
        });

        function load_comment() {
            $('#bigger-3').addClass('d-none');
            $('#less-3').removeClass('d-none');
        }

        $("#comment_art").one("submit", function () {
            $('#comment_art #submit-comment').prop('disabled', true);
        });
        $('.reply').click(function(){
            var id_com = $(this).attr('id_comment');
            var name_com = $(this).siblings('.info').find('.name').text();
            $('#com_parent_id').attr('value', id_com);
            $('.reply_in_form').text(" [Trả lời "+name_com+"]");
            $('#com_content').focus();
        });
        $('.reply_child').click(function(){
            var id_com = $(this).attr('id_comment');
            var name_com = $(this).siblings('.info').find('.name').text();
            $('#com_parent_id').attr('value', id_com);
            $('.reply_in_form').text(" [Trả lời "+name_com+"]");

            var content = $('#com_content').val();
            var str_add = " ["+name_com+"] ";
            if(content.indexOf(str_add) == -1){
                $('#com_content').val(content+str_add);
            }
            $('#com_content').focus();

        });
    </script>
    <script type="text/javascript">
        var HEADER_HEIGHT = 0; // Height of header/menu fixed if exists
        var isIOS = /iPhone|iPad|iPod/i.test(navigator.userAgent);
        var grecaptchaPosition;

        var isScrolledIntoView = function (elem) {
          var elemRect = elem.getBoundingClientRect();
          var isVisible = (elemRect.top - HEADER_HEIGHT >= 0 && elemRect.bottom <= window.innerHeight);
          
          return isVisible;
        };

        if (isIOS) {
          var recaptchaElements = document.querySelectorAll('.g-recaptcha');
          window.addEventListener('scroll', function () {
            Array.prototype.forEach.call(recaptchaElements, function (element) {
              if (isScrolledIntoView(element)) {
                grecaptchaPosition = document.documentElement.scrollTop || document.body.scrollTop;
              }
            });
          }, false);
        }

        var onReCaptchaSuccess = function () {
          if (isIOS && grecaptchaPosition !== undefined) {
            window.scrollTo(0, grecaptchaPosition);
          }
        };
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(window).on("load", function() {
                var advert = $('.mainDetailRightAdvert').offset().top;
                
                var footer = $('#footer').offset().top;
                $( document ).scroll(function(){
                    var top = $(document).scrollTop();

                    if (top > advert-10 && top < footer - $(window).height()) {
                        $('.mainDetailRightAdvert').css('margin-top', top-advert+20);
                    }
                    
                   
                });
            });

            $.ajax({
                method: 'GET',
                url: 'https://graph.facebook.com/?id='+window.location.href,
                success: function (resp) {
                    console.log(resp.share.share_count);
                    console.log('ok');
                },
                error: function () {
                    console.log('Lỗi Server')
                }
            });
        });
    </script>
    
@stop
