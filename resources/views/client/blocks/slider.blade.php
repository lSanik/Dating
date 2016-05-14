<div class="header-bg">
    <div class="container">

        <div class="short_search_wrapper bg-default col-md-3">
            <div class="search-form">
                <div class="form-header">
                    Serious dating with Sweet date <br/>
                    Your perfect match is just a click away
                </div>
                <form action="#" method="POST" class="form-search form-inline">
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
                            <select name="I" class="form-control">
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

                        <div class="form-group">
                            <button type="submit" class="btn btn-pink">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>