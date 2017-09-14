$(function() {

    $('.sidebar-nav-sub').slideUp(80);
    theminit();
    autoLeftNav();
    $(window).resize(function() {
        autoLeftNav();
        console.log($(window).width())
    });
})

//风格初始化
function theminit() {

// 风格切换

    $('.tpl-skiner-toggle').on('click', function() {
        console.log('风格切换');
        $('.tpl-skiner').toggleClass('active');
    })

    $('.tpl-skiner-content-bar').find('span').on('click', function() {
        $('body').attr('class', $(this).attr('data-color'))
        saveSelectColor.Color = $(this).attr('data-color');
        // 保存选择项
        storageSave(saveSelectColor);

    })
}



// 侧边菜单开关


function autoLeftNav() {





    $('.tpl-header-switch-button').on('click', function() {
        if ($('.left-sidebar').is('.active')) {
            if ($(window).width() > 1024) {
                $('.tpl-content-wrapper').removeClass('active');
            }
            $('.left-sidebar').removeClass('active');
        } else {

            $('.left-sidebar').addClass('active');
            if ($(window).width() > 1024) {
                $('.tpl-content-wrapper').addClass('active');
            }


        }
    })

    if ($(window).width() < 1024) {
        $('.left-sidebar').addClass('active');
    } else {
        $('.left-sidebar').removeClass('active');
    }



    // 侧边菜单
    $('.sidebar-nav-sub-title').on('click', function() {
        $(this).next('.sidebar-nav-sub').slideToggle(80)
            .end()
            .find('.sidebar-nav-sub-ico').toggleClass('sidebar-nav-sub-ico-rotate');
    })

    $('.menu_ch').on('click', function() {
        $('.menu_ch').removeClass('sub-active');
        $(this).addClass('sub-active');
        console.log('改变子菜单颜色');

    })

}


