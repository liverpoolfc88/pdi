
$(".s_modal").click(function(e){
    // alert('sasas');
    e.preventDefault();
    $("#modal").modal('show')
        .find('#modalContent')
        .load($(this).attr("href"));

});