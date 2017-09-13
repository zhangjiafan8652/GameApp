@extends('layouts.adminlayout')
@section('content')

    <style>

        .tpl-content-wrapper{
            width: 2000px;!important;
        }
    </style>
    <link rel="stylesheet" href="/public/css/app.css">
    <script src="/public/js/app.js"></script>
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
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">系统用户列表</div>

                        </div>
                        <div class="widget-body  am-fr">

                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">
                                        <a href="{{ url('admin/gamefubenedit?id=0') }}" >
                                            <i class="am-icon-pencil"></i> 新增
                                        </a>
                                       {{-- <div class="am-btn-group am-btn-group-xs">
                                            <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</button>
                                            <button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 保存</button>
                                            <button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 审核</button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                                <div class="am-form-group tpl-table-list-select">
                                    <select data-am-selected="{btnSize: 'sm'}">
                                        <option value="option1">所有类别</option>
                                        <option value="option2">IT业界</option>
                                        <option value="option3">数码产品</option>
                                        <option value="option3">笔记本电脑</option>
                                        <option value="option3">平板电脑</option>
                                        <option value="option3">只能手机</option>
                                        <option value="option3">超极本</option>
                                    </select>
                                </div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                    <input type="text" class="am-form-field ">
                                    <span class="am-input-group-btn">
            <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="button"></button>
          </span>
                                </div>
                            </div>

                            <div class="am-u-sm-12">
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                    <tr>


                                        @for($i= 0;$i< count($tabledatas['column_comment']); $i++)

                                            <th>{{$tabledatas['column_comment'][$i]->column_comment}}</th>
                                            @endfor
                                     {{--   @foreach($tabledatas['column_comment'] as $column_comment)
                                        <th>{{$column_comment->column_comment}}</th>

                                        @endforeach--}}
                                    </tr>
                                    </thead>
                                    <tbody>


                                  @for($i= 0;$i< count($tabledatas['datas']); $i++)
                                      <tr class="gradeX">
                                          @php
                                              $privateidname=$tabledatas['column_comment'][0]->COLUMN_NAME;
                                          @endphp
                                        @for($j= 0;$j< count($tabledatas['column_comment']); $j++)
                                            @php
                                                $k=$tabledatas['column_comment'][$j]->COLUMN_NAME;
                                            @endphp
                                            <td>{{ $tabledatas['datas'][$i]->$k }}</td>
                                        @endfor
                                            <td>
                                                <div class="tpl-table-black-operation">
                                                    @php
                                                        $privateidname=$tabledatas['column_comment'][0]->COLUMN_NAME;
                                                        $privateid=$tabledatas['datas'][$i]->$privateidname;
                                                    @endphp
                                                    <a href="{{ url('admin/gamefubenedit?id='.$privateid) }}" >
                                                        <i class="am-icon-pencil"></i> 编辑
                                                    </a>
                                                    <a href="javascript:;" class="tpl-table-black-operation-del">
                                                        <i class="am-icon-trash"></i> 删除
                                                    </a>
                                                </div>
                                            </td>
                                      </tr>
                                    @endfor
                                    <!-- more data -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="am-u-lg-12 am-cf">

                                <div class="am-fr">
                                    <ul class="am-pagination tpl-pagination">

                                        {!! $tabledatas['datas']->links() !!}

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<script>

</script>
@endsection