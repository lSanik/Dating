@extends('admin.layout')

@section('styles')

    <link href="{{ url('/assets/vendor/summernote/dist/summernote.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/css/fileinput.css') }}" rel="stylesheet">

    <style>
        .fileinput-upload-button{
            display: none;
        }

    </style>

@stop

@section('content')

    <section class="panel col-md-8">
        <header class="panel-heading ">
            <div class="row">
                <div class="form-horizontal">
                    <div class="col-sm-12">
                        <label class="col-sm-2" for="locale"> Язык </label>
                        <ul class="nav nav-tabs col-sm-12">
                            @foreach($trans as $tr)
                                @if( $tr->locale == App::getLocale() )
                                    <li class="active"><img class="lang_icon" src="/assets/img/flags/{{  $tr->locale }}.png"><a data-toggle="tab" href="#{{  $tr->locale }}" data-target="#{{  $tr->locale }}, #{{  $tr->locale }}_1">{{ trans('langs.'. $tr->locale) }}</a></li>
                                @else
                                    <li><img class="lang_icon" src="/assets/img/flags/{{  $tr->locale }}.png"><a data-toggle="tab" href="#{{ $tr->locale }}" data-target="#{{  $tr->locale }}, #{{  $tr->locale }}_1" data-toggle="tab">{{ trans('langs.'. $tr->locale) }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="titlef" class="col-sm-2">Заголовок</label>
                            <div class="col-sm-12">
                                <div class="tab-content">
                                    @foreach($trans as $tr)
                                        <div class="title-input  tab-pane fade @if($tr->locale == App::getLocale()) in active @endif" id="{{ $tr->locale }}_1" >
                                            <input class="form-control "  type="text" name="titlef_{{ $tr->locale }}" placeholder="Заголовок" value="{{ $tr->title }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="panel-body">
            <div style="display: none;" class="summernote"> </div>
            <div class="note-editor">
                <div class="note-dropzone">
                    <div class="note-dropzone-message"></div>
                </div>
                <div class="note-dialog">
                    <div class="note-image-dialog modal" aria-hidden="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" aria-hidden="true" tabindex="-1">×</button>
                                    <h4 class="modal-title">Insert Image</h4>
                                </div>
                                <form class="note-modal-form">
                                    <div class="modal-body">
                                        <div class="form-group row-fluid note-group-select-from-files">
                                            <label>Select from files</label>
                                            <input class="note-image-input" name="files" accept="image/*" multiple="multiple" type="file"></div>
                                        <div class="form-group row-fluid"><label>Image URL</label>
                                            <input class="note-image-url form-control span12" type="text">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button href="#" class="btn btn-primary note-image-btn disabled" disabled="">Insert Image</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div style="display: none;" class="note-link-dialog modal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" aria-hidden="true" tabindex="-1">×</button>
                                    <h4 class="modal-title">Insert Link</h4>
                                </div>
                                <form class="note-modal-form">
                                    <div class="modal-body">
                                        <div class="form-group row-fluid">
                                            <label>Text to display</label>
                                            <input class="note-link-text form-control span12" type="text">
                                        </div>
                                        <div class="form-group row-fluid">
                                            <label>To what URL should this link go?</label>
                                            <input class="note-link-url form-control span12" type="text"></div>
                                        <div class="checkbox">
                                            <label><input checked="" type="checkbox"> Open in new window</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button href="#" class="btn btn-primary note-link-btn">Insert Link</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div style="display: none;" class="note-help-dialog modal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="note-modal-form">
                                    <div class="modal-body">
                                        <a class="modal-close pull-right" aria-hidden="true" tabindex="-1">Close</a>
                                        <div class="title">Keyboard shortcuts</div>
                                        <div class="note-shortcut-row row">
                                            <div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12">
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">Action</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Z</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Undo</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + Z</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Redo</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + ]</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Indent</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + [</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Outdent</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + ENTER</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Insert Horizontal Rule</div>
                                                </div>
                                            </div>
                                            <div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12">
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">Text formatting</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + B</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Bold</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + I</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Italic</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + U</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Underline</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + \</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Remove Font Style</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="note-shortcut-row row">
                                            <div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12">
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">Document Style</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM0</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Normal</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM1</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 1</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM2</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 2</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM3</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 3</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM4</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 4</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM5</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 5</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + NUM6</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Header 6</div>
                                                </div>
                                            </div>
                                            <div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12">
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">Paragraph formatting</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + L</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Align left</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + E</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Align center</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + R</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Align right</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + J</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Justify full</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + NUM7</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Ordered list</div>
                                                </div>
                                                <div class="note-shortcut-row row">
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-key">Ctrl + Shift + NUM8</div>
                                                    <div class="note-shortcut-col col-xs-6 note-shortcut-name">Unordered list</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- p class="text-center">
                                            <a href="//hackerwins.github.io/summernote/" target="_blank">Summernote 0.6.0</a> ·
                                            <a href="//github.com/HackerWins/summernote" target="_blank">Project</a> ·
                                            <a href="//github.com/HackerWins/summernote/issues" target="_blank">Issues</a>
                                        </p -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="note-handle">
                    <div style="display: none;" class="note-control-selection">
                        <div class="note-control-selection-bg"></div>
                        <div class="note-control-holder note-control-nw"></div>
                        <div class="note-control-holder note-control-ne"></div>
                        <div class="note-control-holder note-control-sw"></div>
                        <div class="note-control-sizing note-control-se"></div>
                        <div class="note-control-selection-info"></div>
                    </div>
                </div>
                <div class="note-popover">
                    <div class="note-link-popover popover bottom in" style="display: none;">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <a href="http://www.google.com" target="_blank">www.google.com</a>&nbsp;&nbsp;
                            <div class="note-insert btn-group">
                                <button data-original-title="Edit (CTRL+K)" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="showLinkDialog" data-hide="true" tabindex="-1"><i class="fa fa-edit"></i></button>
                                <button data-original-title="Unlink" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="unlink" tabindex="-1"><i class="fa fa-unlink"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="note-image-popover popover bottom in" style="display: none;">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <div class="btn-group">
                                <button data-original-title="Resize Full" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="resize" data-value="1" tabindex="-1">
                                    <span class="note-fontsize-10">100%</span>
                                </button>
                                <button data-original-title="Resize Half" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="resize" data-value="0.5" tabindex="-1"><span class="note-fontsize-10">50%</span></button>
                                <button data-original-title="Resize Quarter" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="resize" data-value="0.25" tabindex="-1"><span class="note-fontsize-10">25%</span></button>
                            </div>
                            <div class="btn-group">
                                <button data-original-title="Float Left" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="floatMe" data-value="left" tabindex="-1"><i class="fa fa-align-left"></i></button>
                                <button data-original-title="Float Right" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="floatMe" data-value="right" tabindex="-1"><i class="fa fa-align-right"></i></button>
                                <button data-original-title="Float None" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="floatMe" data-value="none" tabindex="-1"><i class="fa fa-align-justify"></i></button>
                            </div>
                            <div class="btn-group">
                                <button data-original-title="Shape: Rounded" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="imageShape" data-value="img-rounded" tabindex="-1"><i class="fa fa-square"></i></button>
                                <button data-original-title="Shape: Circle" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="imageShape" data-value="img-circle" tabindex="-1"><i class="fa fa-circle-o"></i></button>
                                <button data-original-title="Shape: Thumbnail" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="imageShape" data-value="img-thumbnail" tabindex="-1"><i class="fa fa-picture-o"></i></button>
                                <button data-original-title="Shape: None" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="imageShape" tabindex="-1"><i class="fa fa-times"></i></button>
                            </div>
                            <div class="btn-group">
                                <button data-original-title="Remove Image" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="removeMedia" data-value="none" tabindex="-1"><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="note-toolbar btn-toolbar">
                    <div class="note-style btn-group">
                        <button aria-expanded="false" data-original-title="Style" type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1"><i class="fa fa-magic"></i> <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a data-event="formatBlock" href="#" data-value="p">Normal</a></li>
                            <li><a data-event="formatBlock" href="#" data-value="blockquote"><blockquote>Quote</blockquote></a></li>
                            <li><a data-event="formatBlock" href="#" data-value="pre">Code</a></li>
                            <li><a data-event="formatBlock" href="#" data-value="h1"><h1>Header 1</h1></a></li>
                            <li><a data-event="formatBlock" href="#" data-value="h2"><h2>Header 2</h2></a></li>
                            <li><a data-event="formatBlock" href="#" data-value="h3"><h3>Header 3</h3></a></li>
                            <li><a data-event="formatBlock" href="#" data-value="h4"><h4>Header 4</h4></a></li>
                            <li><a data-event="formatBlock" href="#" data-value="h5"><h5>Header 5</h5></a></li>
                            <li><a data-event="formatBlock" href="#" data-value="h6"><h6>Header 6</h6></a></li>
                        </ul>
                    </div>
                    <div class="note-font btn-group">
                        <button data-original-title="Bold (CTRL+B)" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="bold" tabindex="-1"><i class="fa fa-bold"></i></button>
                        <button data-original-title="Italic (CTRL+I)" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="italic" tabindex="-1"><i class="fa fa-italic"></i></button>
                        <button data-original-title="Underline (CTRL+U)" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="underline" tabindex="-1"><i class="fa fa-underline"></i></button>
                        <button data-original-title="Remove Font Style (CTRL+\)" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="removeFormat" tabindex="-1"><i class="fa fa-eraser"></i></button>
                    </div>
                    <div class="note-fontname btn-group">
                        <button aria-expanded="false" data-original-title="Font Family" type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1">
                            <span class="note-current-fontname">"Source Sans Pro"</span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="" data-event="fontName" href="#" data-value="Arial"><i class="fa fa-check"></i> Arial</a>
                            </li>
                            <li><a class="" data-event="fontName" href="#" data-value="Comic Sans MS"><i class="fa fa-check"></i> Comic Sans MS</a></li>
                            <li><a class="" data-event="fontName" href="#" data-value="Courier New"><i class="fa fa-check"></i> Courier New</a></li>
                            <li><a class="" data-event="fontName" href="#" data-value="Impact"><i class="fa fa-check"></i> Impact</a></li>
                            <li><a class="" data-event="fontName" href="#" data-value="Tahoma"><i class="fa fa-check"></i> Tahoma</a></li>
                            <li><a class="" data-event="fontName" href="#" data-value="Times New Roman"><i class="fa fa-check"></i> Times New Roman</a></li>
                            <li><a class="" data-event="fontName" href="#" data-value="Verdana"><i class="fa fa-check"></i> Verdana</a></li>
                        </ul>
                    </div>
                    <div class="note-color btn-group">
                        <button data-original-title="Recent Color" type="button" class="btn btn-default btn-sm btn-small note-recent-color" title="" data-event="color" data-value="{&quot;backColor&quot;:&quot;#FFFFFF&quot;}" tabindex="-1"><i class="fa fa-font" style="color: black; background-color: rgb(255, 255, 255);"></i></button>
                        <button aria-expanded="false" data-original-title="More Color" type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1"> <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="btn-group">
                                    <div class="note-palette-title">Background Color</div>
                                    <div class="note-color-reset" data-event="backColor" data-value="inherit" title="Transparent">Set transparent</div>
                                    <div class="note-color-palette" data-target-event="backColor">
                                        <div class="note-color-row">
                                            <button data-original-title="#000000" type="button" class="note-color-btn" style="background-color:#000000;" data-event="backColor" data-value="#000000" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#424242" type="button" class="note-color-btn" style="background-color:#424242;" data-event="backColor" data-value="#424242" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#636363" type="button" class="note-color-btn" style="background-color:#636363;" data-event="backColor" data-value="#636363" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#9C9C94" type="button" class="note-color-btn" style="background-color:#9C9C94;" data-event="backColor" data-value="#9C9C94" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#CEC6CE" type="button" class="note-color-btn" style="background-color:#CEC6CE;" data-event="backColor" data-value="#CEC6CE" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#EFEFEF" type="button" class="note-color-btn" style="background-color:#EFEFEF;" data-event="backColor" data-value="#EFEFEF" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#F7F7F7" type="button" class="note-color-btn" style="background-color:#F7F7F7;" data-event="backColor" data-value="#F7F7F7" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFFFFF" type="button" class="note-color-btn" style="background-color:#FFFFFF;" data-event="backColor" data-value="#FFFFFF" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#FF0000" type="button" class="note-color-btn" style="background-color:#FF0000;" data-event="backColor" data-value="#FF0000" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FF9C00" type="button" class="note-color-btn" style="background-color:#FF9C00;" data-event="backColor" data-value="#FF9C00" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFFF00" type="button" class="note-color-btn" style="background-color:#FFFF00;" data-event="backColor" data-value="#FFFF00" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#00FF00" type="button" class="note-color-btn" style="background-color:#00FF00;" data-event="backColor" data-value="#00FF00" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#00FFFF" type="button" class="note-color-btn" style="background-color:#00FFFF;" data-event="backColor" data-value="#00FFFF" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#0000FF" type="button" class="note-color-btn" style="background-color:#0000FF;" data-event="backColor" data-value="#0000FF" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#9C00FF" type="button" class="note-color-btn" style="background-color:#9C00FF;" data-event="backColor" data-value="#9C00FF" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FF00FF" type="button" class="note-color-btn" style="background-color:#FF00FF;" data-event="backColor" data-value="#FF00FF" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#F7C6CE" type="button" class="note-color-btn" style="background-color:#F7C6CE;" data-event="backColor" data-value="#F7C6CE" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFE7CE" type="button" class="note-color-btn" style="background-color:#FFE7CE;" data-event="backColor" data-value="#FFE7CE" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFEFC6" type="button" class="note-color-btn" style="background-color:#FFEFC6;" data-event="backColor" data-value="#FFEFC6" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#D6EFD6" type="button" class="note-color-btn" style="background-color:#D6EFD6;" data-event="backColor" data-value="#D6EFD6" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#CEDEE7" type="button" class="note-color-btn" style="background-color:#CEDEE7;" data-event="backColor" data-value="#CEDEE7" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#CEE7F7" type="button" class="note-color-btn" style="background-color:#CEE7F7;" data-event="backColor" data-value="#CEE7F7" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#D6D6E7" type="button" class="note-color-btn" style="background-color:#D6D6E7;" data-event="backColor" data-value="#D6D6E7" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#E7D6DE" type="button" class="note-color-btn" style="background-color:#E7D6DE;" data-event="backColor" data-value="#E7D6DE" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#E79C9C" type="button" class="note-color-btn" style="background-color:#E79C9C;" data-event="backColor" data-value="#E79C9C" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFC69C" type="button" class="note-color-btn" style="background-color:#FFC69C;" data-event="backColor" data-value="#FFC69C" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFE79C" type="button" class="note-color-btn" style="background-color:#FFE79C;" data-event="backColor" data-value="#FFE79C" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#B5D6A5" type="button" class="note-color-btn" style="background-color:#B5D6A5;" data-event="backColor" data-value="#B5D6A5" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#A5C6CE" type="button" class="note-color-btn" style="background-color:#A5C6CE;" data-event="backColor" data-value="#A5C6CE" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#9CC6EF" type="button" class="note-color-btn" style="background-color:#9CC6EF;" data-event="backColor" data-value="#9CC6EF" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#B5A5D6" type="button" class="note-color-btn" style="background-color:#B5A5D6;" data-event="backColor" data-value="#B5A5D6" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#D6A5BD" type="button" class="note-color-btn" style="background-color:#D6A5BD;" data-event="backColor" data-value="#D6A5BD" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#E76363" type="button" class="note-color-btn" style="background-color:#E76363;" data-event="backColor" data-value="#E76363" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#F7AD6B" type="button" class="note-color-btn" style="background-color:#F7AD6B;" data-event="backColor" data-value="#F7AD6B" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFD663" type="button" class="note-color-btn" style="background-color:#FFD663;" data-event="backColor" data-value="#FFD663" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#94BD7B" type="button" class="note-color-btn" style="background-color:#94BD7B;" data-event="backColor" data-value="#94BD7B" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#73A5AD" type="button" class="note-color-btn" style="background-color:#73A5AD;" data-event="backColor" data-value="#73A5AD" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#6BADDE" type="button" class="note-color-btn" style="background-color:#6BADDE;" data-event="backColor" data-value="#6BADDE" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#8C7BC6" type="button" class="note-color-btn" style="background-color:#8C7BC6;" data-event="backColor" data-value="#8C7BC6" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#C67BA5" type="button" class="note-color-btn" style="background-color:#C67BA5;" data-event="backColor" data-value="#C67BA5" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#CE0000" type="button" class="note-color-btn" style="background-color:#CE0000;" data-event="backColor" data-value="#CE0000" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#E79439" type="button" class="note-color-btn" style="background-color:#E79439;" data-event="backColor" data-value="#E79439" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#EFC631" type="button" class="note-color-btn" style="background-color:#EFC631;" data-event="backColor" data-value="#EFC631" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#6BA54A" type="button" class="note-color-btn" style="background-color:#6BA54A;" data-event="backColor" data-value="#6BA54A" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#4A7B8C" type="button" class="note-color-btn" style="background-color:#4A7B8C;" data-event="backColor" data-value="#4A7B8C" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#3984C6" type="button" class="note-color-btn" style="background-color:#3984C6;" data-event="backColor" data-value="#3984C6" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#634AA5" type="button" class="note-color-btn" style="background-color:#634AA5;" data-event="backColor" data-value="#634AA5" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#A54A7B" type="button" class="note-color-btn" style="background-color:#A54A7B;" data-event="backColor" data-value="#A54A7B" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#9C0000" type="button" class="note-color-btn" style="background-color:#9C0000;" data-event="backColor" data-value="#9C0000" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#B56308" type="button" class="note-color-btn" style="background-color:#B56308;" data-event="backColor" data-value="#B56308" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#BD9400" type="button" class="note-color-btn" style="background-color:#BD9400;" data-event="backColor" data-value="#BD9400" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#397B21" type="button" class="note-color-btn" style="background-color:#397B21;" data-event="backColor" data-value="#397B21" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#104A5A" type="button" class="note-color-btn" style="background-color:#104A5A;" data-event="backColor" data-value="#104A5A" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#085294" type="button" class="note-color-btn" style="background-color:#085294;" data-event="backColor" data-value="#085294" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#311873" type="button" class="note-color-btn" style="background-color:#311873;" data-event="backColor" data-value="#311873" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#731842" type="button" class="note-color-btn" style="background-color:#731842;" data-event="backColor" data-value="#731842" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#630000" type="button" class="note-color-btn" style="background-color:#630000;" data-event="backColor" data-value="#630000" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#7B3900" type="button" class="note-color-btn" style="background-color:#7B3900;" data-event="backColor" data-value="#7B3900" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#846300" type="button" class="note-color-btn" style="background-color:#846300;" data-event="backColor" data-value="#846300" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#295218" type="button" class="note-color-btn" style="background-color:#295218;" data-event="backColor" data-value="#295218" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#083139" type="button" class="note-color-btn" style="background-color:#083139;" data-event="backColor" data-value="#083139" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#003163" type="button" class="note-color-btn" style="background-color:#003163;" data-event="backColor" data-value="#003163" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#21104A" type="button" class="note-color-btn" style="background-color:#21104A;" data-event="backColor" data-value="#21104A" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#4A1031" type="button" class="note-color-btn" style="background-color:#4A1031;" data-event="backColor" data-value="#4A1031" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <div class="note-palette-title">Foreground Color</div>
                                    <div class="note-color-reset" data-event="foreColor" data-value="inherit" title="Reset">Reset to default</div>
                                    <div class="note-color-palette" data-target-event="foreColor">
                                        <div class="note-color-row">
                                            <button data-original-title="#000000" type="button" class="note-color-btn" style="background-color:#000000;" data-event="foreColor" data-value="#000000" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#424242" type="button" class="note-color-btn" style="background-color:#424242;" data-event="foreColor" data-value="#424242" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#636363" type="button" class="note-color-btn" style="background-color:#636363;" data-event="foreColor" data-value="#636363" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#9C9C94" type="button" class="note-color-btn" style="background-color:#9C9C94;" data-event="foreColor" data-value="#9C9C94" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#CEC6CE" type="button" class="note-color-btn" style="background-color:#CEC6CE;" data-event="foreColor" data-value="#CEC6CE" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#EFEFEF" type="button" class="note-color-btn" style="background-color:#EFEFEF;" data-event="foreColor" data-value="#EFEFEF" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#F7F7F7" type="button" class="note-color-btn" style="background-color:#F7F7F7;" data-event="foreColor" data-value="#F7F7F7" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFFFFF" type="button" class="note-color-btn" style="background-color:#FFFFFF;" data-event="foreColor" data-value="#FFFFFF" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#FF0000" type="button" class="note-color-btn" style="background-color:#FF0000;" data-event="foreColor" data-value="#FF0000" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FF9C00" type="button" class="note-color-btn" style="background-color:#FF9C00;" data-event="foreColor" data-value="#FF9C00" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFFF00" type="button" class="note-color-btn" style="background-color:#FFFF00;" data-event="foreColor" data-value="#FFFF00" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#00FF00" type="button" class="note-color-btn" style="background-color:#00FF00;" data-event="foreColor" data-value="#00FF00" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#00FFFF" type="button" class="note-color-btn" style="background-color:#00FFFF;" data-event="foreColor" data-value="#00FFFF" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#0000FF" type="button" class="note-color-btn" style="background-color:#0000FF;" data-event="foreColor" data-value="#0000FF" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#9C00FF" type="button" class="note-color-btn" style="background-color:#9C00FF;" data-event="foreColor" data-value="#9C00FF" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FF00FF" type="button" class="note-color-btn" style="background-color:#FF00FF;" data-event="foreColor" data-value="#FF00FF" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#F7C6CE" type="button" class="note-color-btn" style="background-color:#F7C6CE;" data-event="foreColor" data-value="#F7C6CE" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFE7CE" type="button" class="note-color-btn" style="background-color:#FFE7CE;" data-event="foreColor" data-value="#FFE7CE" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFEFC6" type="button" class="note-color-btn" style="background-color:#FFEFC6;" data-event="foreColor" data-value="#FFEFC6" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#D6EFD6" type="button" class="note-color-btn" style="background-color:#D6EFD6;" data-event="foreColor" data-value="#D6EFD6" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#CEDEE7" type="button" class="note-color-btn" style="background-color:#CEDEE7;" data-event="foreColor" data-value="#CEDEE7" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#CEE7F7" type="button" class="note-color-btn" style="background-color:#CEE7F7;" data-event="foreColor" data-value="#CEE7F7" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#D6D6E7" type="button" class="note-color-btn" style="background-color:#D6D6E7;" data-event="foreColor" data-value="#D6D6E7" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#E7D6DE" type="button" class="note-color-btn" style="background-color:#E7D6DE;" data-event="foreColor" data-value="#E7D6DE" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#E79C9C" type="button" class="note-color-btn" style="background-color:#E79C9C;" data-event="foreColor" data-value="#E79C9C" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFC69C" type="button" class="note-color-btn" style="background-color:#FFC69C;" data-event="foreColor" data-value="#FFC69C" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFE79C" type="button" class="note-color-btn" style="background-color:#FFE79C;" data-event="foreColor" data-value="#FFE79C" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#B5D6A5" type="button" class="note-color-btn" style="background-color:#B5D6A5;" data-event="foreColor" data-value="#B5D6A5" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#A5C6CE" type="button" class="note-color-btn" style="background-color:#A5C6CE;" data-event="foreColor" data-value="#A5C6CE" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#9CC6EF" type="button" class="note-color-btn" style="background-color:#9CC6EF;" data-event="foreColor" data-value="#9CC6EF" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#B5A5D6" type="button" class="note-color-btn" style="background-color:#B5A5D6;" data-event="foreColor" data-value="#B5A5D6" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#D6A5BD" type="button" class="note-color-btn" style="background-color:#D6A5BD;" data-event="foreColor" data-value="#D6A5BD" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#E76363" type="button" class="note-color-btn" style="background-color:#E76363;" data-event="foreColor" data-value="#E76363" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#F7AD6B" type="button" class="note-color-btn" style="background-color:#F7AD6B;" data-event="foreColor" data-value="#F7AD6B" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#FFD663" type="button" class="note-color-btn" style="background-color:#FFD663;" data-event="foreColor" data-value="#FFD663" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#94BD7B" type="button" class="note-color-btn" style="background-color:#94BD7B;" data-event="foreColor" data-value="#94BD7B" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#73A5AD" type="button" class="note-color-btn" style="background-color:#73A5AD;" data-event="foreColor" data-value="#73A5AD" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#6BADDE" type="button" class="note-color-btn" style="background-color:#6BADDE;" data-event="foreColor" data-value="#6BADDE" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#8C7BC6" type="button" class="note-color-btn" style="background-color:#8C7BC6;" data-event="foreColor" data-value="#8C7BC6" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#C67BA5" type="button" class="note-color-btn" style="background-color:#C67BA5;" data-event="foreColor" data-value="#C67BA5" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#CE0000" type="button" class="note-color-btn" style="background-color:#CE0000;" data-event="foreColor" data-value="#CE0000" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#E79439" type="button" class="note-color-btn" style="background-color:#E79439;" data-event="foreColor" data-value="#E79439" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#EFC631" type="button" class="note-color-btn" style="background-color:#EFC631;" data-event="foreColor" data-value="#EFC631" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#6BA54A" type="button" class="note-color-btn" style="background-color:#6BA54A;" data-event="foreColor" data-value="#6BA54A" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#4A7B8C" type="button" class="note-color-btn" style="background-color:#4A7B8C;" data-event="foreColor" data-value="#4A7B8C" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#3984C6" type="button" class="note-color-btn" style="background-color:#3984C6;" data-event="foreColor" data-value="#3984C6" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#634AA5" type="button" class="note-color-btn" style="background-color:#634AA5;" data-event="foreColor" data-value="#634AA5" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#A54A7B" type="button" class="note-color-btn" style="background-color:#A54A7B;" data-event="foreColor" data-value="#A54A7B" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#9C0000" type="button" class="note-color-btn" style="background-color:#9C0000;" data-event="foreColor" data-value="#9C0000" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#B56308" type="button" class="note-color-btn" style="background-color:#B56308;" data-event="foreColor" data-value="#B56308" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#BD9400" type="button" class="note-color-btn" style="background-color:#BD9400;" data-event="foreColor" data-value="#BD9400" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#397B21" type="button" class="note-color-btn" style="background-color:#397B21;" data-event="foreColor" data-value="#397B21" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#104A5A" type="button" class="note-color-btn" style="background-color:#104A5A;" data-event="foreColor" data-value="#104A5A" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#085294" type="button" class="note-color-btn" style="background-color:#085294;" data-event="foreColor" data-value="#085294" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#311873" type="button" class="note-color-btn" style="background-color:#311873;" data-event="foreColor" data-value="#311873" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#731842" type="button" class="note-color-btn" style="background-color:#731842;" data-event="foreColor" data-value="#731842" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                        <div class="note-color-row">
                                            <button data-original-title="#630000" type="button" class="note-color-btn" style="background-color:#630000;" data-event="foreColor" data-value="#630000" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#7B3900" type="button" class="note-color-btn" style="background-color:#7B3900;" data-event="foreColor" data-value="#7B3900" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#846300" type="button" class="note-color-btn" style="background-color:#846300;" data-event="foreColor" data-value="#846300" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#295218" type="button" class="note-color-btn" style="background-color:#295218;" data-event="foreColor" data-value="#295218" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#083139" type="button" class="note-color-btn" style="background-color:#083139;" data-event="foreColor" data-value="#083139" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#003163" type="button" class="note-color-btn" style="background-color:#003163;" data-event="foreColor" data-value="#003163" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#21104A" type="button" class="note-color-btn" style="background-color:#21104A;" data-event="foreColor" data-value="#21104A" title="" data-toggle="button" tabindex="-1"></button>
                                            <button data-original-title="#4A1031" type="button" class="note-color-btn" style="background-color:#4A1031;" data-event="foreColor" data-value="#4A1031" title="" data-toggle="button" tabindex="-1"></button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="note-para btn-group">
                        <button data-original-title="Unordered list (CTRL+SHIFT+NUM7)" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="insertUnorderedList" tabindex="-1"><i class="fa fa-list-ul"></i></button>
                        <button data-original-title="Ordered list (CTRL+SHIFT+NUM8)" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="insertOrderedList" tabindex="-1"><i class="fa fa-list-ol"></i></button>
                        <button aria-expanded="false" data-original-title="Paragraph" type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1"><i class="fa fa-align-left"></i> <span class="caret"></span></button>
                        <div class="dropdown-menu">
                            <div class="note-align btn-group">
                                <button data-original-title="Align left (CTRL+SHIFT+L)" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="justifyLeft" tabindex="-1"><i class="fa fa-align-left"></i></button>
                                <button data-original-title="Align center (CTRL+SHIFT+E)" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="justifyCenter" tabindex="-1"><i class="fa fa-align-center"></i></button>
                                <button data-original-title="Align right (CTRL+SHIFT+R)" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="justifyRight" tabindex="-1"><i class="fa fa-align-right"></i></button>
                                <button data-original-title="Justify full (CTRL+SHIFT+J)" type="button" class="btn btn-default btn-sm btn-small active" title="" data-event="justifyFull" tabindex="-1"><i class="fa fa-align-justify"></i></button>
                            </div>
                            <div class="note-list btn-group">
                                <button data-original-title="Indent (CTRL+])" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="indent" tabindex="-1"><i class="fa fa-indent"></i></button>
                                <button data-original-title="Outdent (CTRL+[)" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="outdent" tabindex="-1"><i class="fa fa-outdent"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="note-height btn-group">
                        <button data-original-title="Line Height" type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1"><i class="fa fa-text-height"></i> <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a class="" data-event="lineHeight" href="#" data-value="1"><i class="fa fa-check"></i> 1.0</a></li
                            ><li><a class="" data-event="lineHeight" href="#" data-value="1.2"><i class="fa fa-check"></i> 1.2</a></li>
                            <li><a class="checked" data-event="lineHeight" href="#" data-value="1.4"><i class="fa fa-check"></i> 1.4</a></li>
                            <li><a class="" data-event="lineHeight" href="#" data-value="1.5"><i class="fa fa-check"></i> 1.5</a></li>
                            <li><a class="" data-event="lineHeight" href="#" data-value="1.6"><i class="fa fa-check"></i> 1.6</a></li>
                            <li><a class="" data-event="lineHeight" href="#" data-value="1.8"><i class="fa fa-check"></i> 1.8</a></li>
                            <li><a class="" data-event="lineHeight" href="#" data-value="2"><i class="fa fa-check"></i> 2.0</a></li>
                            <li><a class="" data-event="lineHeight" href="#" data-value="3"><i class="fa fa-check"></i> 3.0</a></li>
                        </ul>
                    </div>
                    <div class="note-table btn-group">
                        <button data-original-title="Table" type="button" class="btn btn-default btn-sm btn-small dropdown-toggle" data-toggle="dropdown" title="" tabindex="-1"><i class="fa fa-table"></i> <span class="caret"></span></button>
                        <ul class="note-table dropdown-menu">
                            <div class="note-dimension-picker">
                                <div style="width: 10em; height: 10em;" class="note-dimension-picker-mousecatcher" data-event="insertTable" data-value="1x1"></div>
                                <div class="note-dimension-picker-highlighted"></div>
                                <div class="note-dimension-picker-unhighlighted"></div>
                            </div>
                            <div class="note-dimension-display"> 1 x 1 </div>
                        </ul>
                    </div>
                    <div class="note-insert btn-group">
                        <button data-original-title="Link (CTRL+K)" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="showLinkDialog" data-hide="true" tabindex="-1"><i class="fa fa-link"></i></button>
                        <button data-original-title="Picture" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="showImageDialog" data-hide="true" tabindex="-1"><i class="fa fa-picture-o"></i></button>
                        <button data-original-title="Insert Horizontal Rule (CTRL+ENTER)" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="insertHorizontalRule" tabindex="-1"><i class="fa fa-minus"></i></button>
                    </div>
                    <div class="note-view btn-group">
                        <button data-original-title="Full Screen" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="fullscreen" tabindex="-1"><i class="fa fa-arrows-alt"></i></button>
                        <button data-original-title="Code View" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="codeview" tabindex="-1"><i class="fa fa-code"></i></button>
                    </div>
                    <div class="note-help btn-group">
                        <button data-original-title="Help" type="button" class="btn btn-default btn-sm btn-small" title="" data-event="showHelpDialog" data-hide="true" tabindex="-1"><i class="fa fa-question"></i></button>
                    </div>
                </div>
                <div class="tab-content">
                    <textarea style="height: 175px;" class="note-codable"></textarea>
                    @foreach($trans as $tr)
                        <section  style="height: 175px;" class="note-editable tab-pane fade @if($tr->locale == App::getLocale()) in active @endif " id="{{ $tr->locale }}" contenteditable="true">
                            {!! $tr->body !!}
                        </section>
                    @endforeach
                </div>
                <div class="note-statusbar">
                    <div class="note-resizebar">
                        <div class="note-icon-bar"></div>
                        <div class="note-icon-bar"></div>
                        <div class="note-icon-bar"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="panel col-md-4">
        <header class="panel-heading ">
            Изображение
        </header>
        {!! Form::open(['url' => '/admin/blog/update', 'id' => 'form-hidden', 'enctype' => 'multipart/form-data', 'method' => 'POST']) !!}
        <div class="panel-body">
            <div class="form-group">
                <div class="form-group">

                    {!! Form::hidden('current_locale') !!}
                    <div class="body-list"></div>
                    <div class="title-list"></div>
                    <label>File input</label>
                    <img src="{{ url('/uploads/blog/'.$post->cover_image) }}" width="100%">
                    <input id="file-0" class="file" type="file" multiple=false value="{{ $post->cover_image }}">
                    <input type="hidden" name="id" value="{!! $post->id; !!}">
                </div>
            </div>
        </div>
        <div class="panel-footer text-center text-capitalize" style="background-color: white">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <button type="submit" type="button" id="send" class="btn btn-success">Опубликовать</button>
        </div>
        {!! Form::close() !!}
    </section>
@stop

@section('scripts')
    <script src="{{ url('/assets/vendor/summernote/dist/summernote.min.js') }}"></script>
    <!--bootstrap-fileinput-master-->
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/file-input-init.js') }}"></script>
    <script>
        jQuery(document).ready(function(){
            $('.summernote').summernote({
                height: 200,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true                 // set focus to editable area after initializing summernote
            });
            $('input[name="current_locale"]').val( $('select[name="locale"]').val() );

            $('select[name="locale"]').on('change', function(){
                $('input[name="current_locale"]').val( $(this).val() );
            });

            $('#send').on('click', function(){

                @foreach(Config::get('app.locales') as $locale)

                if( $('input[name="title[{{ $locale }}]"]').length!=0){
                    $('input[name="title[{{ $locale }}]"]').val( $('input[name="titlef_{{ $locale }}"]').val() );
                } else {
                    $('.title-list').append('<input type="hidden" name="title[{{ $locale }}]" value=\'' + $('input[name="titlef_{{ $locale }}"]').val() + '\' >');
                }
                @endforeach
                arr=document.getElementsByClassName("note-editable");

                for (i = 0; i < arr.length; i++) {
                    $('.body-list').append('<input type="hidden" name="body['+arr[i].id+']" value=\'' + arr[i].innerHTML + '\' >');
                }

            });
            /*$('#send').click(function(){
                var title = $('input[name="title"]').val();
                var body = document.getElementsByClassName("note-editable");
                var id = {!! $post->id; !!};
                $.ajax({
                    type: 'POST',
                    url: '/admin/blog/update',
                    data:{
                        title: title,
                        body: body,
                        id: id,
                        _token: $('input[name="_token"]').val()
                    },
                    success: function( response ){
                        console.log(response);
                    },
                    error: function( response ){
                        console.log(response);
                    }
                });

             });*/
        });
    </script>
@stop