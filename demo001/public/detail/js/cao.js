function rendersize(data) {
    $("#selectsize").empty();
    $("#selectsize").html(data);

}



$("#selectcolor").change(function() {
    var sp = $('#selectcolor ').val();

    var newarr1 = sp.split("--");
    var newarr = newarr1.join(",")
    var fullArray = [];
    if (newarr !== undefined) {
        // console.log(newarr)
        if (newarr.indexOf(",") == -1) {
            fullArray.push(newarr);
        } else {
            fullArray = newarr.split(",");
        }
    }
    var product_id = fullArray[0];
    var color_id = fullArray[1];



    $.ajax({
        url: 'getsize/' + product_id + '/' + color_id,
        type: 'GET',
    }).done(function(data) {
        // alert(JSON.stringify(data));
        $("#selectsize").empty();
        for (i = 0; i < data.length; i++) {
            $("#selectsize").append('<option value = "' + data[i] + '" >' + data[i] + '</option > ')

        };

        // console.log(data);
        // for (var key in data) {
        //     console.log(key + '-' + JSON.stringify(data[key]));
        // }
        // renderCart(data);
        // $("#change-item-cart").empty();
        // $("#change-item-cart").html(data);
        // rendersize(data)
        // alertify.success('Đã thêm sản phẩm');
    });
});