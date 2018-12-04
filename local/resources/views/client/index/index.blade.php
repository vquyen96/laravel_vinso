@extends('client.master')
@section('title', 'Vinso')
@section('fb_title', 'Vinso')
@section('fb_des', 'Vinso')
@section('fb_img', asset('local/resources/assets/images/PostLink.png'))

@section('main')
    <div id="main">
        <div class="bannerHeaderHome" style="background: url('images/Layer 1.png') no-repeat center /cover">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bannerHeaderHomeBig">
                            <div class="bannerHeaderHomeTop">
                                <div class="bannerHeaderHomeTopItem">
                                    <a href="#">
                                        <img src="images/Logo.png" alt="">
                                    </a>
                                </div>
                                <div class="bannerHeaderHomeTopItem">
                                    <div class="btnSearch">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="btnLogin">
                                        <a href="#" class="btnOutLineRed">
                                            login
                                        </a>
                                    </div>
                                    <div class="btnSignup">
                                        <a href="#" class="btnRed">
                                            signup
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="bannerHeaderHomeMain">
                                <div class="txt30_15 text-uppercase cl_303030">
                                    hight tech
                                </div>
                                <div class="txt40_20 text-uppercase cl_303030">
                                    Engineering Parts
                                </div>
                                <div class="bannerHeaderHomeMainContent">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                </div>
                                <div class="btnReacmore">
                                    <a href="#" class="btnRed">
                                        read more
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <section class="section1">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="sectionMain">
                            <div class="txt25_14 text-center">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            </div>
                            <div class="sectionBranch d-flex">
                                <div class="sectionBranchItem">
                                    <img src="images/Layer 2.png" alt="">
                                </div>
                                <div class="sectionBranchItem">
                                    <img src="images/Logo.png" alt="">
                                </div>
                                <div class="sectionBranchItem">
                                    <img src="images/Bosch-logo.png" alt="">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section2" style="background: url('images/Group 11.png') no-repeat center /cover;">
            <div class="sectionMain">
                <div class="txt40_20 sectionMainTitle">
                    Precision Engineering
                </div>
                <div class="cl_303030 sectionMainContent">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </div>
                <div class="btnReacmore">
                    <a href="#" class="btnRed">
                        read more
                    </a>
                </div>
            </div>
        </section>
        <section class="section3" style="background: url('images/Layer 5.png') no-repeat center /cover;">
            <div class="sectionMain">
                <div class="txt40_20 sectionMainTitle">
                    Project Management
                </div>
                <div class="sectionMainContent">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </div>
                <div class="btnReacmore">
                    <a href="#" class="btnRed">
                        read more
                    </a>
                </div>
            </div>
        </section>
        <section class="section4 d-flex" style="background: url('images/Group 10.png') no-repeat center /cover;">
            <div class="container d-flex">
                <div class="row d-flex">
                    <div class="col-12">
                        <div class="sectionMain">
                            <div class="txt40_20 sectionMainTitle">
                                Materials
                            </div>
                            <div class="cl_303030 sectionMainContent">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </div>
                            <div class="btnReacmore ">
                                <a href="#" class="btnRed">
                                    read more
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section2" style="background: url('images/Group 9.png') no-repeat center /cover;">
            <div class="sectionMain">
                <div class="txt40_20 sectionMainTitle">
                    Rapid Manufacture
                </div>
                <div class="cl_303030 sectionMainContent">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </div>
                <div class="btnReacmore">
                    <a href="#" class="btnRed">
                        read more
                    </a>
                </div>
            </div>
        </section>
        <section class="section6">
            <div class="sectionMain text-center">
                <div class="txt40_20 sectionMainTitle">
                    Case Studies
                </div>
                <div class="sectionMainContent">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                </div>
            </div>
        </section>
        <section class="section7 d-flex">
            @for($i = 8; $i < 14; $i++)
            <div class="section7Item" style="background: url('images/Layer {{$i}}.png') no-repeat center /cover">
                <div class="section7ItemHover">
                    <div class="section7ItemHoverCenter">
                        <div class="txt30_15">
                            Metallurgical
                        </div>
                        <a href="">
                            learn more
                        </a>
                    </div>
                </div>
            </div>
           @endfor
        </section>
    </div>
@stop
@section('script')
    <script type="text/javascript" src="js/main.js"></script>
@stop
