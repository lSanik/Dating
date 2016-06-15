function get_cities( $id )
{
    $.ajax({
        type: 'POST',
        url: '{{ url('/get/cities/') }}',
        data: {id: $id, _token: $('input[name="_token').val() },
        success: function( response ){
            $('select[name="city"]').empty();
            for ( var i = 0; i < response.length; i++)
            {
                if( response[i].id == $('input[name="user_city_id"]').val() )
                    $('select[name="city"]').append("<option value='" + response[i].id + "'  selected='selected'>" + response[i].name + "</option>");
                else
                    $('select[name="city"]').append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
            }

        },
        error: function( response ){
            console.log( response );
        }
    });
}

function get_states( $id )
{
    $.ajax({
        type: 'POST',
        url: '{{ url('/get/states/') }}',
        data: {id: $id, _token: $('input[name="_token"]').val()  },
        success: function( response ){
            $('select[name="state"]').empty();

            for( var i = 0; i < response.length; i++ )
            {
                if( response[i].id == $('input[name="user_state_id"]').val() )
                    $('select[name="state"]').append("<option value='" + response[i].id + "' selected='selected'>" + response[i].name + "</option>");
                else
                    $('select[name="state"]').append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
            }
        },
        error: function( response ){
            console.log( response )
        }
    });

    get_cities($id);
}

$(window).on('load', function(){

    get_states( $('select[name="county"]').val() );

});
