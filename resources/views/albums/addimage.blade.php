<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Laravel PHP Framework</title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="text-align: center;">
    <div class="span4" style="display: inline-block;margin-top:100px;">

            @if($errors->has())
                <div class="alert alert-block alert-error fade in"id="error-block">
                    <?php
                    $messages = $errors->all('<li>:message</li>');
                    ?>
                    <button type="button" class="close"data-dismiss="alert">×</button>

                    <h4>Warning!</h4>
                    <ul>
                        @foreach($messages as $message)
                            {{$message}}
                        @endforeach

                    </ul>
                </div>
            @endif

            <!-- Form -->

            {!! Form::open([ 'url' => URL::route('add_image_to_album'), 'enctype' => 'multipart/form-data']) !!}
            <input type="hidden" name="album_id"value="{{$album->id}}" />
            <fieldset>
                <legend>Add an Image to {{$album->name}}</legend>
                <div class="form-group">
                    <label for="description">Image Description</label>
                    <textarea name="description" type="text"class="form-control" placeholder="Imagedescription"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Select an Image</label>
                    {{Form::file('image')}}
                </div>
                <button type="submit" class="btnbtn-default">Add Image!</button>
            </fieldset>
            {!! Form::close() !!}


    </div>
</div> <!-- /container -->
</body>
</html>