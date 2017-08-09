// 添加 touch div 到 iframe 前扩展
$.fn.coverIframes = function(){
    $.each($(this),function(i,v){
        var ifr = $(v);
        var wr = $("<div id='wr"+new Date().getTime()+i+"' class='cifm' style='z-index: 999999; " +
        " opacity: 0; position:absolute; width:100%; height: 100%;'></div>");
        ifr.before(wr);
        wr.click(function(event){
           var iframe = ifr.get(0);
           var iframeDoc = (iframe.contentDocument) ? iframe.contentDocument : iframe.contentWindow.document;
           var x = event.offsetX;
           var y = event.offsetY;
           var link = iframeDoc.elementFromPoint(x, y);
           var newEvent = iframeDoc.createEvent('HTMLEvents');
           newEvent.initEvent('click', true, true);
           link.dispatchEvent(newEvent);
        });
    })
};

//添加 touch div
$('.frame').coverIframes();

//  自动设置iframe高度. (iframe content 高度小于上级高度时设定iframe高度等于上级高度, 为了touchmove时顶部fiexd)
setInterval(function(){
  $('iframe').each(function(index, frame){
      var parentHeight = $(frame).parent().parent().height();
      var frameBodyHeight = $(frame).contents().height();
      var height = parentHeight  > frameBodyHeight? parentHeight : frameBodyHeight;
      $(frame).parent().height(height);
      $(frame).height(height);
  });
}, 100);

// 滑动插件
var sider = new Swiper ('.swiper-container', {
  hashnav: true,
  hashnavWatchState: true,
  onSlideChangeEnd: function(d){
    activeNav(d.realIndex);
  }
});


// 设置tab 选中
function activeNav(index)
{
    $('.tab-link').removeClass('active');
    $('.tab-link').eq(index).addClass('active');
}


/// 解决 touch move 时 顶部fixed菜单滚动.
$(document).on('touchmove',function(e){
  e.preventDefault();
});
var scrolling = false;
$('body').on('touchstart','.page-content',function(e) {
    if (!scrolling) {
        scrolling = true;
        if (e.currentTarget.scrollTop === 0) {
          e.currentTarget.scrollTop = 1;
        } else if (e.currentTarget.scrollHeight === e.currentTarget.scrollTop + e.currentTarget.offsetHeight) {
          e.currentTarget.scrollTop -= 1;
        }
        scrolling = false;
    }
});
$('body').on('touchmove','.page-content',function(e) {
 e.stopPropagation();
});
