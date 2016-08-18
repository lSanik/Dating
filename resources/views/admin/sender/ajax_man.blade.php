<style>
    #list{
        display: inline-block;
        width: 100%;
    }
    #list .mans_container{
        display: inline-block;
        text-align: center;
        width: 100%;
    }
    #list .man{
        display: inline-block;
        height: 225px;
        outline: 1px solid #f3f3f3;
        margin: 0px 10px 20px 10px;
        float: none;

    }
    #list input{
        width: 100%;
        display: inline-block;
        transition:0.2s;
    }
    #list img{
        height: 125px;
        width: auto;
        max-width: 100%;
    }
    #list .first_name{

    }
    #list .last_name{

    }
    #list .age{

    }
    #list .man   input[type="checkbox"]:checked + .man +.age{
        background-color: red;
        border: 1px solid black;
        font-size: 64px;
        width: 240px;
    }
</style>
<div class="mans_container row">
@foreach($find_users as $fu)
    <div class="col-md-2 man">
        <input type="checkbox" name="mans_id[]" value="{{$fu->id}}" @if(isset($edit_page)) {{'checked'}} @endif>
        <img src="{{ url('/uploads/'.$fu->avatar) }}" width="100%"/>
        <div class="first_name">{{$fu->first_name}}</div>
        <div class="last_name">{{$fu->last_name}}</div>
        <div class="age">{{ date('Y-m-d') - $fu->birthday }}</div>

    </div>
@endforeach
</div>
<script>
    $('#list .man input').change(function(){
        if($(this).is(":checked")) {
            console.log( $(this).parent());
            $(this).parent().css({"box-shadow": "0px 0px 10px black", "transition": "0.2s"});
        }else{
            $(this).parent().css({"box-shadow": "none"});
        }
    });
</script>
