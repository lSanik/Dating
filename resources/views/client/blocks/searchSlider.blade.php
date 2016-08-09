<div class="header-bg">
    <div class="container">
        {!! Form::open(['url' => '#', 'method' => 'POST', 'class' => 'form-search form-inline']) !!}
        <div class="short_search_wrapper bg-default col-md-3">
                <div class="search-form">
                    <div class="form-header">
                        <center>{{ trans('searchTitle.seriousDatingWithSweetDate') }}</center> <hr/>
                    </div>

                        <div class="text-right">
                            <div class="form-group">
                                <label for="I">{{ trans('searchTitle.iAmA') }}</label>
                                <select name="I" class="form-control">
                                    <option value="4" selected>{{ trans('searchTitle.man') }}</option>
                                    <option value="5">{{ trans('searchTitle.woman') }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="I">{{ trans('searchTitle.lookingForA') }}</label>
                                <select name="looking" class="form-control">
                                    <option value="4">{{ trans('searchTitle.man1') }}</option>
                                    <option value="5" selected>{{ trans('searchTitle.woman1') }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="I">{{ trans('searchTitle.age') }}</label>
                                <select name="age_start" class="form-control">
									<!--if ($_POST) -->
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
			<div class="col-md-1"></div>
            <div class="col-md-8 short_search_wrapper bg-default">
                <div class="search-form">
                    <div class="form-header">
                        <h4> {{ trans('search.filter') }} </h4>
                    </div>
                    <div class="form-search">
	                    <div class="row">
	                        <div class="col-md-3 form-group">
	                            <label for="is_online">{{ trans('users.online') }} </label>
	                            <select name="is_online" class="form-control">
	                                <option value="0">---</option>
	                                <option value="1">{{ trans('answer.yes') }}</option>
								</select>
	                        </div>
                            <div class="col-md-3 form-group">
                                <label for="is_avatar">{{ trans('users.photo') }} </label>
                                <select name="is_avatar" class="form-control">
                                    <option value="0">---</option>
                                    <option value="1">{{ trans('answer.yes') }}</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                {!! Form::label('coutry', trans('profile.country')) !!}
                                <select name="county" class="form-control">
                                    <option value="false" selected>---</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"> {{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                {!! Form::label('user_state_id', trans('profile.state') ) !!}
                                <select name="user_state_id" class="form-control">
                                    <option value="false" selected>---</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                {!! Form::label('education', trans('profile.education')) !!}
                                {!! Form::select('education', $selects['education'], null,['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-3 form-group">
                                {!! Form::label('height', trans('profile.height') ) !!}
                                <input type="number" name="height" class="form-control" value="0" style="width: 75px;float: right;">
                            </div>

                            <div class="col-md-3 form-group">
                                {!! Form::label('weight', trans('profile.weight') ) !!}
                                <input type="number" name="weight" class="form-control" value="0" style="width: 75px;float: right;">
                            </div>

	                        <div class="col-md-3 form-group">
	                            <label for="eyes">{{ trans('profile.eyes') }}</label>
	                            <select name="eyes" class="form-control">
	                                @foreach($selects['eye'] as $eye)
	                                    <option value="{{ $eye }}">{{ trans('profile.'.$eye) }}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                        <div class="col-md-3 form-group">
	                            <label for="hair">{{ trans('profile.hair') }}</label>
	                            <select name="hair" class="form-control">
	                                @foreach($selects['hair'] as $hair)
	                                    <option value="{{ $hair }}">{{ trans('profile.'.$hair) }}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                        <div class="col-md-3 form-group">
	                            <label for="hair">{{ trans('profile.kids') }}</label>
	                            <select name="kids" class="form-control">
	                                @foreach($selects['kids'] as $kids)
	                                    <option value="{{ $kids }}">{{ trans('profile.'.$kids) }}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                        <div class="col-md-3 form-group">
	                            <label for="want_k">{{ trans('profile.want_k') }}</label>
	                            <select name="want_k" class="form-control">
	                                @foreach($selects['want_k'] as $want_k)
	                                    <option value="{{ $want_k }}">{{ trans('profile.'.$want_k) }}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                        <div class="col-md-3 form-group">
	                            <label for="family">{{ trans('profile.family') }}</label>
	                            <select name="family" class="form-control">
	                                @foreach($selects['family'] as $family)
	                                    <option value="{{ $family }}">{{ trans('profile.'.$family) }}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                        <div class="col-md-3 form-group">
	                            <label for="religion">{{ trans('profile.religion') }}</label>
	                            <select name="religion" class="form-control">
	                                @foreach($selects['religion'] as $religion)
	                                    <option value="{{ $religion }}">{{ trans('profile.'.$religion) }}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                        <div class="col-md-3 form-group">
	                            <label for="smoke">{{ trans('profile.smoke') }}</label>
	                            <select name="smoke" class="form-control">
	                                @foreach($selects['smoke'] as $smoke)
	                                    <option value="{{ $smoke }}">{{ trans('profile.'.$smoke) }}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                        <div class="col-md-3 form-group">
	                            <select name="drink" class="form-control">
	                                @foreach($selects['drink'] as $drink)
	                                    <option value="{{ $drink }}">{{ trans('profile.'.$drink) }}</option>
	                                @endforeach
	                            </select>
	                            <label for="drink">{{ trans('profile.drink') }}</label>
	                        </div>
                        </div>
                        <div class="row">
	                        <div class="col-md-12 col-xs-12 form-group text-right">
	                            <button type="submit" class="btn btn-white">
	                                <i class="fa fa-search"></i>{{ trans('profile.findAPerson') }}
	                            </button>
	                        </div>
	                    </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
