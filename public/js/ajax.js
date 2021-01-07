$(function() {
    $("#companyName").on("input", function(event) {
        var target = $(event.target);
        inputValue = target.val();

        $.ajax({
            dataType: "json",
            url: "https://api.foursquare.com/v2/venues/search?client_id=LQ2CHGZ3D2L4M2UO4BGJEJQGRTB4FWC4NQ0XVND4HYDHGLF2&client_secret=B3TIHZXMT33XY51SI1XM3J5IWAKMON3IVQBE5X1PA0BYUJQV&v=20180323&limit=7&categoryId=4bf58dd8d48988d124941735&near=Belgium&query=" + inputValue,
            data: {},
            success: function(data) {
                // Code for handling API response
                $(".autocompleteResponse").remove();
                var response = $(data.response.venues);

                if (inputValue != "") {

                    $.each(response, function(i, venue) {                        
                        if(!venue.location.city){
                            $place = "";
                        }
                        else{
                            $place = venue.location.city;
                        }
 
                        if(venue.location.city){
                            $("#companyNameDivAuto").append('<div><a href="#" class="autocompleteResponse" data-address="'+ venue.location["address"] + " " + venue.location["city"] +'" data-long="'+ venue.location["lng"] +'" data-lat="'+ venue.location["lat"] +'">' + venue.name + " " + $place +'</a></div>');
                        }

                    });

                    $(".autocompleteResponse").on("click", function(e) {
                        e.preventDefault();
                        $target = $(e.target);
                        $name = $(this).text();

                        $("#location").val($target.data("address"));
                        $("#longitude").val($target.data("long"));
                        $("#latitude").val($target.data("lat"));
                        $("#companyName").val($name);                           
                       
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Code for handling errors
            }
        });
    });
});