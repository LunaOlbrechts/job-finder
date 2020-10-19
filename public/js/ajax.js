
$.ajax({
    dataType: "json",
    url: "https://api.foursquare.com/v2/venues/explore?client_id=LQ2CHGZ3D2L4M2UO4BGJEJQGRTB4FWC4NQ0XVND4HYDHGLF2&client_secret=B3TIHZXMT33XY51SI1XM3J5IWAKMON3IVQBE5X1PA0BYUJQV&v=20180323&limit=1&ll=40.7243,-74.0018&query=coffee",
    data: {},
    success: function( data ) {
      // Code for handling API response
      console.log(data);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      // Code for handling errors
    }
  });