@extends('admin.layout')

@section('styles')

@stop
@section('content')
        <!--mail inbox start-->
<div class="mail-box">
    <aside class="sm-side">
        <div class="m-title">
            <h3>Inbox</h3>
            <span>14 unread mail</span>
        </div>
        <div class="inbox-body">
            <a class="btn btn-compose" href="inbox-compose.html">
                Compose
            </a>
        </div>
        <ul class="inbox-nav inbox-divider">
            <li class="active">
                <a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right">2</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-envelope"></i> Sent Mail</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-briefcase"></i> Important</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-star"></i> Starred </a>
            </li>
            <li>
                <a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a>
            </li>
            <li>
                <a href="#"><i class=" fa fa-trash"></i> Trash</a>
            </li>
        </ul>


    </aside>
    <aside class="lg-side" style="height: 1200px">
        <div class="inbox-head">
            <div class="mail-option">

                <div class="btn-group">
                    <a class="btn mini tooltips" href="#" data-toggle="dropdown" data-placement="top" data-original-title="Refresh">
                        <i class=" fa fa-refresh"></i>
                    </a>
                </div>

                <div class="btn-group">
                    <a class="btn" href="#">
                        <i class=" fa fa-archive"></i>
                    </a>
                    <a class="btn" href="#">
                        <i class=" fa fa-info-circle"></i>
                    </a>
                    <a class="btn" href="#">
                        <i class=" fa fa-trash"></i>
                    </a>
                </div>

                <div class="btn-group">
                    <a class="btn" href="#">
                        <i class=" fa fa-folder"></i>
                    </a>
                    <a class="btn" href="#">
                        <i class=" fa fa-tag"></i>
                    </a>
                </div>


                <div class="btn-group hidden-phone">
                    <a class="btn mini blue" href="#" data-toggle="dropdown">
                        More
                        <i class="fa fa-angle-down "></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                        <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                    </ul>
                </div>
                <ul class="unstyled inbox-pagination">
                    <li><span>1-50 of 2045</span></li>
                    <li>
                        <a href="#" class="np-btn"><i class="fa fa-angle-left  pagination-left"></i></a>
                    </li>
                    <li>
                        <a href="#" class="np-btn"><i class="fa fa-angle-right pagination-right"></i></a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="inbox-body">
            <div class="heading-inbox row">

                <div class="col-md-12">
                    <h4> Simple off-camera flash techniques</h4>
                </div>



            </div>
            <div class="sender-info">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="pull-left">
                            <img alt="" src="img/img2.jpg">
                        </div>
                        <div class="s-info">
                            <strong>John Doe</strong>
                            <span>[john-doe@gmail.com]</span>
                            to
                            <span>me</span>
                            <a class="sender-dropdown tooltips" href="javascript:;"  data-placement="bottom" data-toggle="tooltip" type="button" data-original-title="Show Details">
                                <i class="fa fa-chevron-down"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="compose-btn pull-right">
                            <a class="btn btn-sm btn-default" href="inbox-compose.html"><i class="fa fa-reply"></i> Reply</a>
                            <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn btn-default  btn-sm tooltips"><i class="fa fa-print"></i> </button>
                            <button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-default btn-sm tooltips"><i class="fa fa-trash-o"></i></button>
                        </div>
                        <p class="date pull-right"> 12/24/14 (1 days ago) </p>

                    </div>
                </div>
            </div>
            <div class="view-mail">
                <p>
                    <strong>
                        Hello John
                    </strong>
                </p>
                <p>Faucibus rutrum. Phasellus sodales vulputate mosaddek urna, vel accumsan augue egestas ac. Donec vitae leo at sem lobortis porttitor eu consequat risus. Mauris sed congue orci. Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec vitae leo at sem lobortis porttitor eu consequat risus. Mauris sed congue orci. Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec vitae leo at sem lobortis porttitor eu consequat risus. Mauris sed congue orci. </p>
                <p>Consequat risus. Mauris sed congue orci. Donec ultrices. Phasellus sodales tawsif urna, vel accumsan augue egestas ac. Donec
                    <a href="#">vitae leo at sem lobortis porttitor eu consequat risus</a>. Mauris sed congue orci. Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec vitae leo at sem lobortis porttitor eu consequat risus. Mauris sed congue orci. </p>
                <p>Modales vulputate urna, vel <a href="#">thevectorlab.net</a>. Donec vitae leo at sem lobortis porttitor eu slicklab risus. Mauris sed congue orci. Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec vitae leo at sem lobortis porttitor eu consequat risus. Mauris sed congue orci. </p>
            </div>
            <div class="attachment-mail">
                <h5> Attachments </h5>
                <ul>
                    <li>
                        <a href="#" class="atch-thumb">
                            <img src="img/img-attachment.jpg">
                        </a>

                        <div class="file-name">
                            <i class="fa fa-download"></i>  Wordflow_Diagram.jpg
                        </div>
                    </li>

                    <li>
                        <a href="#" class="atch-thumb">
                            <img src="img/pdf-attachment.jpg">
                        </a>

                        <div class="file-name">
                            <i class="fa fa-download"></i> pdf-file.jpg
                        </div>
                    </li>
                    <li>
                        <a href="#" class="atch-thumb">
                            <img src="img/pdf-attachment.jpg">
                        </a>

                        <div class="file-name">
                            <i class="fa fa-download"></i>  Diagram.jpg
                        </div>
                    </li>

                </ul>
            </div>
            <div class="reply-mail m-b-20">
                <form action="">
                    <textarea class="form-control" name="" id="" cols="30" rows="5">Reply</textarea>
                </form>
            </div>
            <div class="compose-btn pull-right">
                <a class="btn  btn-success" href="inbox-compose.html"> Reply Mail</a>
            </div>
        </div>
    </aside>
</div>
<!--mail inbox end-->
@stop
@section('scripts')

@stop