<div class="header-bg">
    <div class="container">

        <div class="short_search_wrapper bg-default col-md-3">
            <div class="search-form">
                <div class="form-header">
                    <center>{{ trans('searchTitle.findYourTrueLove') }}</center><hr/>
                </div>
                {!! Form::open(['url' => 'search', 'method' => 'POST', 'class' => 'form-search form-inline']) !!}
                    <div class="text-right">
                        <div class="form-group">
                            <label for="I">{{ trans('searchTitle.iAmA') }}</label>
                            <select name="I" class="form-control">
                                <option value="1" selected>{{ trans('searchTitle.man') }}</option>
                                <option value="2">{{ trans('searchTitle.woman') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="I">{{ trans('searchTitle.lookingForA') }}</label>
                            <select name="looking" class="form-control">
                                <option value="1">{{ trans('searchTitle.man1') }}</option>
                                <option value="2" selected>{{ trans('searchTitle.woman1') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="I">{{ trans('searchTitle.age') }}</label>
                            <select name="age_start" class="form-control">
                                @for($i = 18; $i < 60; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select> -
                            <select name="age_stop" class="form-control">
                                @for($i = 60; $i >= 18; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group buttons_adv">
                            <button type="submit" class="btn btn-white">
                                <i class="fa fa-search"></i>{{ trans('searchTitle.findAPerson') }}
                            </button>
                            <a href="/search">{{ trans('searchTitle.advancedSearch') }}</a>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>