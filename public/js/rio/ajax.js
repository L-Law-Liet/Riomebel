let ajaxPriceTimer = 0;
function ajaxFilter(reset, page) {
    let arr = [];
    if(reset === 1){
        arr = [];
    }
    else{
        arr = $(".ajax-filter").serializeArray();
        if (reset === 3){
            arr['page'] = page;
        }
    }
    phpUrl = document.getElementById('phpVal').getAttribute('url');
    phpPage = document.getElementById('phpVal').getAttribute('page');
    if(page > 0){
        urL = phpUrl+'?page='+page;
    }
    else {
        urL = phpUrl+'?page='+phpPage;
    }
    console.log('--------', arr);
    $.ajax({
        type : 'get',
        url : urL,
        data : {'a' : arr},
        success:function (data) {
            $('#Resp').html(data);
        },
    });
}
$('#reset_filter').on('click', function () {
    $('.ajax-filter').value = null;
    ajaxFilter(1, -1);
});
$('.ajax-filter').on('keyup', function (e) {
    console.log('353223232');
    if (e.target.name == 'from' || e.target.name == 'till') {
        console.log('111111111');
        clearTimeout(ajaxPriceTimer);
        ajaxPriceTimer = setTimeout(ajaxFilter(2, -1), 1000);
    }
    });

$('.ajax-filter').on('change', function () {
        ajaxFilter(2, -1);

});
$(document).ready(function () {
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        console.log(page);
        ajaxFilter(3, page);
    });
});
