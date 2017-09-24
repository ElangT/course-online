// $(".addToCart").click(function(e){
//     var url = {!! '"'.url('/').'"' !!};
//     var course_id = {{$course->ak_course_id}};
//     $.ajaxSetup({
//     headers: {
//             'X-CSRF-TOKEN': $('input[name="_token"]').val()
//         }
//     });


//     e.preventDefault();
//     console.log($('input[name=schedule]').val());
//         $.ajax({
//             url: url + '/addtocart',
//             type: 'POST',
//             data: { "_token" : $('input[name=_token]').val(),
//                     'course_id' : parseInt(course_id),
//                     'schedule_id' : parseInt($('input[name=schedule]').val())},
//             success: function(data) {
//             console.log(data);
//             $('.addToCartForm').hide();
//             $('#cartadded').show();
//             }
//         });  
// });



$("#addschedule").click(function(e){
    e.preventDefault();
    schedule = $(".scheduleinput");
    num = schedule.length + 1;
    str = "<div id='schedule"+num+"' class='scheduleinput'>\
                <div class='form-group row'>\
                    <div class='col-md-5'>\
                        <input class='form-control' required name='day["+num+"]' id='day"+num+"' type='text' placeholder='Hari'>\
                    </div>\
                    <div class='col-md-5'>\
                        <input class='form-control' required name='time["+num+"]' id='time"+num+"' type='text' placeholder='Waktu'>\
                    </div>\
                    <div class='col-md-2'>\
                        <input type='button' class='btndelete' id='btn"+num+"' value='x'>\
                    </div>\
                </div>\
            </div>\
";
    $("#jml").val(num);
    schedule.parent().append(str);
    console.log(schedule.length);
});

$("#schedule").on("click", '.btndelete' ,function() {
    console.log($(this));
    console.log($(".scheduleinput").length);
    $(this).parent().parent().remove();
});

var prov = $('#province');
var region = $('#region');

prov.change(function() {
    var disabled = region.attr('disabled');
    console.log(region.attr('name'));
    if(typeof disabled !== typeof undefined && disabled !== false){
        region.removeAttr('disabled');
    }
    if ($(this).data('options') == undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
        $(this).data('options', $('#region option').clone());
    }
    var id = $(this).val();
    console.log(id);
    var options = $(this).data('options').filter('[data-id=' + id + ']');
    console.log(options);
    region.html(options);
});
