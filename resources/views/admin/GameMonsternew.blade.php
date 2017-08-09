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

    <div class="row-content am-cf">


        <div class="row">

            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">

                    <div class="widget-body am-fr">
                        @php
                            $columnname=$tabledatas['column_comment'][0]->COLUMN_NAME;

                        @endphp

                        <form class="am-form tpl-form-line-form" action="{{url('admin/gamemonstersave') }}" method="GET">
                                @for($i= 0;$i< count($tabledatas['column_comment']); $i++)

                                    @if($i==0)
                                       <div class="am-form-group" hidden="hidden">
                                            <label for="user-name" class="am-u-sm-3 am-form-label">{{$tabledatas['column_comment'][$i]->column_comment}}</label>
                                            <div class="am-u-sm-9">
                                                <input type="hidden" class="tpl-form-input" name="{{$tabledatas['column_comment'][$i]->COLUMN_NAME}}" id="{{$tabledatas['column_comment'][$i]->COLUMN_NAME}}"  placeholder="请输入标题文字">
                                            </div>
                                        </div>
                                    @else
                                        <div class="am-form-group">
                                            <label for="user-name" class="am-u-sm-3 am-form-label">{{$tabledatas['column_comment'][$i]->column_comment}}</label>
                                            <div class="am-u-sm-9">

                                                <input type="text" class="tpl-form-input"  name="{{$tabledatas['column_comment'][$i]->COLUMN_NAME}}" id="{{$tabledatas['column_comment'][$i]->COLUMN_NAME}}"  placeholder="请输入标题文字">

                                            </div>
                                        </div>
                                    @endif
                                @endfor


                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <input  class="am-btn am-btn-primary tpl-btn-bg-color-success "  type="submit" value="提交"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection