@extends('layouts.adminlayout')
@section('content')
    <!-- 风格切换 -->
    <div class="tpl-skiner">
        <div class="tpl-skiner-toggle am-icon-cog">
        </div>
        <div class="tpl-skiner-content">
            <div class="tpl-skiner-content-title">
                选择主题
            </div>
            <div class="tpl-skiner-content-bar">
                <span class="skiner-color skiner-white" data-color="theme-white"></span>
                <span class="skiner-color skiner-black" data-color="theme-black"></span>
            </div>
        </div>
    </div>
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="container-fluid am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                        <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 首页 <small></small></div>



                        <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                            <div class="widget widget-primary am-cf">
                                <div class="widget-statistic-header">
                                    系统基本信息
                                </div>
                                <div class="widget-statistic-body">

                                    <div class="widget-statistic-description">
                                        版本 <strong>v1</strong>
                                    </div>
                                    <div class="widget-statistic-description">
                                        操作系统 <span>{{PHP_OS}}</span>
                                    </div>
                                    <div class="widget-statistic-description">
                                        运行环境 <span>{{$_SERVER['SERVER_SOFTWARE']}}</span>
                                    </div>
                                    <div class="widget-statistic-description">
                                        北京时间 <span><?php echo date('Y年m月d日 H时i分s秒')?></span>
                                    </div>
                                    <div class="widget-statistic-description">
                                        服务器域名/IP <span>{{$_SERVER['SERVER_NAME']}} [ {{$_SERVER['SERVER_ADDR']}} ]</span>
                                    </div>
                                    <span class="widget-statistic-icon am-icon-credit-card-alt"></span>
                                </div>
                            </div>
                        </div>




                    </div>
                    <div class="am-u-lg-3 tpl-index-settings-button">
                        <button type="button" class="page-header-button"><span class="am-icon-paint-brush"></span> 设置</button>
                    </div>
                </div>

            </div>


        </div>

@endsection