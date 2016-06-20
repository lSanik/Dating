@extends('client.profile.profile')

@section('profileContent')
    <div class="col-md-10 col-md-offset-1">
        @foreach($photos as $p)
            <div class="photo">
                <img src="{{ url('/uploads/'.$p->image) }}" width="100%">
                @if(Auth::user()->id == $id)
                    <div class="remove" data-id="{{ $p->id }}"><i class="fa fa-trash pull-right"></i></div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal" onclick="document.getElementById('myModal').style.display='none'">

        <!-- The Close Button -->
        <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">
    </div>

@stop

@section('styles')
    <style>
        .photo{
            float: left;
            display: inline-block;
            width: 30%;
        }

        .photo .remove {
            color: red;
            padding: 10px;
            width: 100%;
            cursor: pointer;
        }

        img {
            padding: 10px;
            cursor: pointer;
        }


        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 60%;
            max-width: 80%;
        }

        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)}
            to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }
    </style>
@stop

@section('scripts')
    <script>

        $(function(){
            // Get the modal
            var modal = document.getElementById('myModal');

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var modalImg = document.getElementById("img01");

            $('img').click(function(){
                modal.style.display = "block";
                modalImg.src = $(this).attr('src');
                $('.navbar-static-top').css('z-index', '0');
            });

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

        });

        $(document).ready(function(){
            $('.remove').click(function(){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '{{ url('remove/image') }}',
                    data: {id : $(this).data('id')},
                    success: function( response ){
                        console.log(response);
                        $(this).parent().remove();
                    },
                    error: function( response ){
                        console.log(response);
                    }
                })
            });
        });
    </script>
@stop