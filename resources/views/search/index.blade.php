@include('partials.header_portal')
</head>
<body>
    <div class="">
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content mt-10">
            <div class="col-xs-12 main-cat">
                <div class="well">
                    <form >
                       
                        <fieldset>
                            <div class="form-group">
                               <label><input type="radio" name="srchType" value="player" id="srchTypePlayer" checked> Player</label>
                                <label><input type="radio" name="srchType" value="team" id="srchTypeTeam"> Team</label>
                                <input type="text" class="form-control" name="query" id="query" placeholder="Search by Player or Team name...">
                                <ul id="search-suggestions"></ul> <!-- Suggestion container -->
                            </div>
                            <div class="text-center">
                                <button type="button" id="submit-button" class="btn btn-primary btn-round">Search</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>


    <div class="well" style="background-color: rgb(245, 245, 245); border: 1px solid rgb(227, 227, 227);">
    <div class="team mt-0">

        <div class="tab-pane fade active p-3 in">
            <div id="res-title-wrapper"></div> 
            <div id="match-title" class="mb-3"></div> 
            <div class="lm bg-f4">
                <table class="table table-striped custab">
                    <tbody></tbody>
                </table>
            </div>
        </div>

    
    </div>
</div>

    </div>
    @include('partials.footernew')
    @stack('location')
<script>
    // Function to update the suggestions based on user input
   
</script>

</body>
</html>
