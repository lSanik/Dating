<div class="header-bg">
    <div class="container">
        {!! Form::open(['url' => '#', 'method' => 'POST', 'class' => 'form-search form-inline']) !!}
        <div class="short_search_wrapper bg-default col-md-3">
                <div class="search-form">
                    <div class="form-header">
                        Serious dating with Sweet date <br/>
                        Your perfect match is just a click away
                    </div>

                        <div class="text-right">
                            <div class="form-group">
                                <label for="I">I am a</label>
                                <select name="I" class="form-control">
                                    <option value="1" selected> Man </option>
                                    <option value="2"> Woman </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="I">Looking for a</label>
                                <select name="looking" class="form-control">
                                    <option value="1"> Man </option>
                                    <option value="2" selected> Woman </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="I">Age</label>
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
                        </div>
                </div>
            </div>

            <div class="col-md-9 short_search_wrapper bg-default">
                <div class="search-form">
                    <div class="form-header">
                        <h4> {{ trans('search.filter') }} </h4>
                    </div>
                    <div class="form-search">
                        <div class="form-group">
                            <label for="lan">{{ trans('users.online') }} </label>
                            <select name="lan" class="form-control">
                                <option value="0">{{ trans('answer.yes') }}</option>
                                <option value="1">{{ trans('answer.no') }}</option>
                                <option value="2">{{ trans('answer.nomatter') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="eyes">{{ trans('profile.eyes') }}</label>
                            <select name="eyes" class="form-control">
                                @foreach($selects['eye'] as $eye)
                                    <option value="{{ $eye }}">{{ trans('profile.'.$eye) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="hair">{{ trans('profile.hair') }}</label>
                            <select name="hair" class="form-control">
                                @foreach($selects['hair'] as $hair)
                                    <option value="{{ $hair }}">{{ trans('profile.'.$hair) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="hair">{{ trans('profile.kids') }}</label>
                            <select name="kids" class="form-control">
                                @foreach($selects['kids'] as $kids)
                                    <option value="{{ $kids }}">{{ trans('profile.'.$kids) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="want_k">{{ trans('profile.want_k') }}</label>
                            <select name="want_k" class="form-control">
                                @foreach($selects['want_k'] as $want_k)
                                    <option value="{{ $want_k }}">{{ trans('profile.'.$want_k) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="family">{{ trans('profile.family') }}</label>
                            <select name="family" class="form-control">
                                @foreach($selects['family'] as $family)
                                    <option value="{{ $family }}">{{ trans('profile.'.$family) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="religion">{{ trans('profile.religion') }}</label>
                            <select name="religion" class="form-control">
                                @foreach($selects['religion'] as $religion)
                                    <option value="{{ $religion }}">{{ trans('profile.'.$religion) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="smoke">{{ trans('profile.smoke') }}</label>
                            <select name="smoke" class="form-control">
                                @foreach($selects['smoke'] as $smoke)
                                    <option value="{{ $smoke }}">{{ trans('profile.'.$smoke) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="drink">{{ trans('profile.drink') }}</label>
                            <select name="drink" class="form-control">
                                @foreach($selects['drink'] as $drink)
                                    <option value="{{ $drink }}">{{ trans('profile.'.$drink) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-pink">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
