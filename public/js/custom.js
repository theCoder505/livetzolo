$(document).ready(function () {
    $('#allCoinsData').DataTable();
    $('.dataTables_length').addClass('bs-select');
});

$(document).ready(function () {
    $('#promtonorm').DataTable();
    $('.dataTables_length').addClass('bs-select');
});

$(document).ready(function () {
    $('#normtoprom').DataTable();
    $('.dataTables_length').addClass('bs-select');
});



function editCoin(editNum) {
    console.log(editNum);
    $("#scrollable").modal('show');



    $.ajax({
        url: "/particular-coin-data-" + editNum,
        type: 'GET',
        success: function (response) {


            $.each(response.partCoin, function (key, item) {
                console.log(item);

                // $("#coinLogo").src(item.coin_img);

                $("#coinLogo").attr("src", item.coin_img);
                $("#descText").text(item.description);

                // $("#addProfileImg").val(item.coin_img);
                $("#coinUniqueId").val(item.id);
                $("#addedCoinName").val(item.coin_name);
                $("#addedcoinSymbol").val(item.symbol);
                $("#addedlaunchDate").val(item.launch);
                $("#addedcontractAddr").val(item.contract_addr);
                $("#addedmarketCap").val(item.marketcap);
                $("#addedpriceusd").val(item.price_usd);
                $("#addedboggedLink").val(item.chart_link);
                $("#addedcoinmrkt").val(item.coin_mrkt_link);
                $("#addedcoinGeko").val(item.coin_geko_link);
                $("#addedswapLink").val(item.swap_link);
                $("#addedwebLink").val(item.web_link);
                $("#addedtelLink").val(item.telegram_link);
                $("#addedtwitLink").val(item.twitter_link);
                $("#addeddiscordLink").val(item.discord_link);
                $("#addedpooCoin").val(item.poo_coin);
                $("#addedfloozTrade").val(item.flooz_trade);
                $("#selectedSlct").val(item.network_chain);
                $("#selectedSlct").html(item.network_chain);
                $("#phase").html("[ " + (item.project_phase) + " ]");
            });


        }
    });




}






function deleteCoin(deleteNum) {

    $("#deletingModal").modal('show');

    $("#permanentDelete").click(function () {
        console.log(deleteNum);


        $.ajax({
            url: "/delete-coin-" + deleteNum,
            type: 'GET',
            success: function (response) {
                console.log(response);
                $("#deletingModal").modal('hide');
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            }
        });

    });


}






function crossItem(element) {
    element.closest('div').remove();
}



function upPageEditCoin(editNum) {
    console.log(editNum);




    $.ajax({
        url: "/update-page-particular-coin-data-" + editNum,
        type: 'GET',
        success: function (response) {
            console.log(response);

            $("#submitHolder").html(response);
            $("#scrollable").modal('show');
            $.each(response.partCoin, function (key, item) {
                console.log(item);

                // $("#coinLogo").src(item.coin_img);


                $("#descText").text(item.description);

                // $("#addProfileImg").val(item.coin_img);
                if ((item.img) == '') {
                    // $("#coinLogo").attr("src", 'webimages/upimg.png');

                    var element = document.getElementById("coinLogo");
                    element.parentNode.removeChild(element);

                } else {
                    $("#coinLogo").attr("src", item.img);
                }


                $("#coinUniqueId").val(item.coin_id);
                $("#addedCoinName").val(item.name);
                $("#addedcoinSymbol").val(item.symbol);
                $("#addedlaunchDate").val(item.launch);
                $("#addedcontractAddr").val(item.contract);
                $("#addedboggedLink").val(item.chart);
                $("#addedswapLink").val(item.swap);
                $("#addedwebLink").val(item.web);
                $("#addedtelLink").val(item.tel);
                $("#addedtwitLink").val(item.twit);
                $("#addeddiscordLink").val(item.discord);
                $("#selectedSlct").val(item.network);
                $("#selectedSlct").html(item.network);

                $("#phase").html("[ " + (item.phase) + " ]");
            });


        }
    });




}





function cancelRequest(cancelId) {
    $.ajax({
        url: "/cancel-request-" + cancelId,
        type: 'GET',
        success: function (response) {

            console.log(response.resp);
            window.location.reload();

        }
    });
}





function fetchCoins() {

    $("#tbodyData").html("");
    $("#Loader").removeClass("d-none");

    $.ajax({
        url: "/all-coins-data",
        type: 'GET',
        success: function (response) {
            // console.log(response.allCoins);

            $("#tbodyData").html("");
            $.each(response.allCoins, function (key, item) {
                $("#tbodyData").append(' \
                    <tr> \
                        <td> '+ (key + 1) + ' </td> \
                        <td class="th-sm"> \
                            <img src="'+ (item.coin_img) + '" alt="" class="coinLogo"></img> \
                        </td> \
                        <td class="th-sm"> '+ (item.coin_name) + ' </td> \
                        <td class="th-sm">'+ (item.votes_total) + '</td> \
                        <td class="th-sm">'+ (item.status) + '</td> \
                        <td class="th-sm"> \
                            <button class="btn btn-sm btn-primary" \
                                onclick="editCoin('+ (item.id) + ')">Edit</button> \
                        </td> \
                        <td class="th-sm"> \
                            <button class="btn btn-sm btn-danger" \
                                onclick="deleteCoin('+ (item.id) + ')">Delete</button> \
                        </td> \
                    </tr> \
                ');
            });

            $("#Loader").addClass("d-none");
        }
    });
}






// coin upload show coin image 

var previewProfile1 = document.querySelector("#coinLogo");
var imgSizeChecker = document.querySelector(".imgSizeChecker");

function showProfile(event) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        // var ImgError = document.querySelector(".ImgError");

        var size = event.target.files[0].size;
        var sizeInKb = size / 1024;
        if (sizeInKb > 5000) {
            alert("Image Size is Larger than 5000KB, use a 5000KB image...");
            // ImgError.style.display = "block";
            customProfileFileInput1.value = "";
            previewProfile1.src = "";
            previewProfile1.style.display = null;
        } else if (sizeInKb < 5000) {
            imgSizeChecker.src = src;
            // ImgError.style.display = null;
            // previewProfile1.style.display = "block";


            setTimeout(() => {

                var checkSize = document.querySelector(".imgSizeChecker");
                var realWidth = checkSize.naturalWidth;
                var realHeight = checkSize.naturalHeight;
                console.log("Original width=" + realWidth + ", " + "Original height=" + realHeight);

                if ((realWidth <= 387) && (realHeight <= 387)) {
                    previewProfile1.src = src;
                }
                else {
                    alert("Use highest 387 X 387 Image");
                    $("#addProfileImg").val('');
                }

            }, 100);

        }
    }
}




function showpass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showCnfrmpass() {
    var x = document.getElementById("confirmpassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}





var previewLogo = document.querySelector("#logoImg");
// var imgSizeChecker = document.querySelector(".imgSizeChecker");

function showLogo(event) {
    if (event.target.files.length > 0) {
        var imageSource = URL.createObjectURL(event.target.files[0]);
        // var ImgError = document.querySelector(".ImgError");

        var size = event.target.files[0].size;
        var sizeInKb = size / 1024;
        if (sizeInKb > 5000) {
            alert("Image Size is Larger than 5000KB, use a 5000KB image...");
            customProfileFileInput1.value = "";
            previewLogo.src = "";
            previewLogo.style.display = null;
        } else if (sizeInKb < 5000) {
            previewLogo.src = imageSource;
        }
    }
}




