@extends('layouts.adminlayout')
@section('content')

    <div class="am-g tpl-g">
        <!-- 头部 -->
        <header>
            <!-- logo -->
            <div class="am-fl tpl-header-logo">
                <a href="javascript:;"><img src="/resources/views/admin/assets/img/logo.png" alt=""></a>
            </div>
            <!-- 右侧内容 -->
            <div class="tpl-header-fluid">
                <!-- 侧边切换 -->
                <div class="am-fl tpl-header-switch-button am-icon-list">
                    <span>

                </span>
                </div>

                <!-- 其它功能-->
                <div class="am-fr tpl-header-navbar">
                    <ul>
                        <!-- 欢迎语 -->
                        <li class="am-text-sm tpl-header-navbar-welcome">
                            <a href="javascript:;">欢迎你, <span>Amaze UI</span> </a>
                        </li>

                        <!-- 退出 -->
                        <li class="am-text-sm">
                            <a href="javascript:;">
                                <span class="am-icon-sign-out"></span> 退出
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </header>
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
        <!-- 侧边导航栏 -->
        <div class="left-sidebar">
            <!-- 用户信息 -->
            <div class="tpl-sidebar-user-panel">
                <div class="tpl-user-panel-slide-toggleable">
                    <div class="tpl-user-panel-profile-picture">
                        <img src="/resources/views/admin/assets/img/user04.png" alt="">
                    </div>
                    <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
              禁言小张
          </span>
                    <a href="javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
                </div>
            </div>

            <!-- 菜单 -->
            <ul class="sidebar-nav">

                <li class="sidebar-nav-link">
                    <a href="javascript:void(0)" class="active" onclick="leftmenugoto('{{url('admin/signup')}}')">
                        <i class="am-icon-home sidebar-nav-link-logo"></i> 首页
                    </a>
                </li>
               @foreach($menus as $menu)
                    @if($menu->parent_id==0)
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title ">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> {{ $menu->menu_name }}
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico sidebar-nav-sub-ico-rotate"></span>
                    </a>

                    <ul class="sidebar-nav sidebar-nav-sub" style="display: block;">
                        @foreach($menus as $menu_ch)
                            @if($menu_ch->parent_id==$menu->menu_id)
                        <li class="sidebar-nav-link">
                            @php
                                $tempurl=$menu_ch->menu_url;
                            @endphp

                            <a href="javascript:void(0)" class="menu_ch" onclick="leftmenugoto('{{url($tempurl)}}')">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span>  {{ $menu_ch->menu_name }}
                            </a>
                        </li>
                            @endif
                        @endforeach

                    </ul>

                </li>
                 @endif
                @endforeach
            </ul>
        </div>
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
        <!--主体部分 开始  {{url('admin/info')}}-->
        <div class="main_box" width="100%" height="100%">
            <iframe id="iframeid" src="{{url('admin/content')}}" frameborder="0" width="100%" height="1200px" name="main"></iframe>
        </div>
        <!--主体部分 结束-->
        </div>


    </div>
    </div>
    <script>
        function leftmenugoto(url) {
            console.log('调往的url:'+url)
            $("#iframeid",parent.document.body).attr("src",url);

        }
    </script>
@endsection