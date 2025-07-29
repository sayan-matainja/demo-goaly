
function myFunction(id) {
    if(id==1){
        $("#latest2, #transfer3, #video4").removeClass( "activ" );
        console.log("hot");

        $("#hottest1").addClass( "activ" );
    }
    if(id==2){
        $("#hottest1, #transfer3, #video4").removeClass( "activ" );
        console.log("latest");
        $("#latest2").addClass( "activ" );
    }
    if(id==3){
        $("#hottest1, #latest2, #video4").removeClass( "activ" );
        $("#transfer3").addClass( "activ" );
    }
    if(id==4){
        $("#hottest1, #latest2, #transfer3").removeClass( "activ" );
        $("#video4").addClass( "activ" );
    }
};

function setLocalTimeZone()
{

 var base_url = window.location.origin;
 

     $.ajax({
            url:base_url+'/set-timezone',
            method:'GET',
            success: function(responseMatches){

               
                  
            }
        });
}
//show more option in transfer new
$(document).ready(function(){

 
    // Time Zone Update using ajax */


    //show more option
    var size_item = $('.transfer_listing').length;
    var v=5;
    $('.transfer_listing').hide(); // hide all divs with class `listing`
    $('.transfer_listing:lt('+v+')').show();
    $('#transferLoadMore').click(function () {
        //alert(size_item); return false;
        v= (v+5 <= size_item) ? v+5 : size_item;
        // var abcd=$(".listing").length;
        // alert(abcd); return false;
        $('.transfer_listing:lt('+v+')').show();
        // hide load more button if all items are visible
        if($(".transfer_listing:visible").length >= size_item ){ $("#transferLoadMore").hide(); }
    });
});

//show more option in hottest new

$(document).ready(function(){
    //show more option
    var size_item = $('.hottest_listing').length;
    var v=5;
    $('.hottest_listing').hide(); // hide all divs with class `listing`
    $('.hottest_listing:lt('+v+')').show();
    $('#hottestLoadMore').click(function () {
        //alert(size_item); return false;
        v= (v+5 <= size_item) ? v+5 : size_item;
        // var abcd=$(".listing").length;
        // alert(abcd); return false;
        $('.hottest_listing:lt('+v+')').show();
        // hide load more button if all items are visible
        if($(".hottest_listing:visible").length >= size_item ){ $("#hottestLoadMore").hide(); }
    });
});

//show more video
$(document).ready(function(){
//show more option
    var size_item = $('.video-listing').length;
    var v=5;
    $('.video-listing').hide(); // hide all divs with class `listing`
    $('.video-listing:lt('+v+')').show();
    $('#videoLoadMore').click(function () {
        //alert(size_item); return false;
        v= (v+5 <= size_item) ? v+5 : size_item;
        // var abcd=$(".listing").length;
        // alert(abcd); return false;
        $('.video-listing:lt('+v+')').show();
        // hide load more button if all items are visible
        if($(".video:visible").length >= size_item ){ $("#videoLoadMore").hide(); }
    });
});

//show more option in latest new

//prediction 
$(document).ready(function(){
    //show more option
    var size_item = $('.listing').length;
    var v=5;
    $('.listing').hide(); // hide all divs with class `listing`
    $('.listing:lt('+v+')').show();
    $('#showMoreBtn').click(function () {
        //alert(size_item); return false;
        v= (v+5 <= size_item) ? v+5 : size_item;
        // var abcd=$(".listing").length;
        // alert(abcd); return false;
        $('.listing:lt('+v+')').show();
        // hide load more button if all items are visible
        if($(".listing:visible").length >= size_item ){ $("#showMoreBtn").hide(); }
    });
});

//search 
    function getTeamCode(code, name) {
        if (code) return code;

        if (!name) return ''; // edge case

        const words = name.trim().split(' ');

        if (words.length > 1) {
            return words[0].charAt(0).toUpperCase(); // First letter of first word
        } else {
            return name.substring(0, 3).toUpperCase(); // First 3 letters
        }
    }


    function getPositionName(positionId) {
    switch (String(positionId)) { // Convert to string as switch cases might be strings
        case '24': return 'GK'; // Goalkeeper
        case '25': return 'DF'; // Defender
        case '26': return 'MD'; // Midfielder
        case '27': return 'FW'; // Attacker
        default: return 'N/A'; // Not Available or unknown position
    }
    }

    $(document).ready(function() {
        var base_url = window.location.origin;
        var selectedSearchType = $('input[name="srchType"]:checked').val(); // Get initial selected type

        // Event listener for radio button change
        $('input[name="srchType"]').on('change', function() {
            selectedSearchType = $(this).val();
            $('#search-suggestions').empty(); // Clear suggestions when type changes
            $('#query').val(''); // Clear search box when type changes
            $('#query').attr('placeholder', 'Search by ' + selectedSearchType.charAt(0).toUpperCase() + selectedSearchType.slice(1) + ' name...');
        });

        // Event listener for input in the search box
        let debounceTimer;
        $('#query').on('input', function () {
            clearTimeout(debounceTimer); // Clear previous timer
            const query = $(this).val();

            debounceTimer = setTimeout(() => {
                if (query.length > 0) {
                    let suggestionUrl = base_url;
                    if (selectedSearchType === 'player') {
                        suggestionUrl += '/player-suggestions/';
                    } else if (selectedSearchType === 'team') {
                        suggestionUrl += '/search-suggestions/';
                    } else {
                        $('#search-suggestions').empty();
                        return;
                    }

                    $.ajax({
                        url: suggestionUrl + encodeURIComponent(query),
                        type: 'GET',
                        success: function (data) {
                            $('#search-suggestions').empty();

                            if (data.success === 1 && data.suggestion?.length > 0) {
                                data.suggestion.forEach(function (suggestion) {
                                    suggestion = suggestion.endsWith('.') ? suggestion.slice(0, -1) : suggestion;

                                    const suggestionItem = $('<li class="suggestion-item">' + suggestion + '</li>');

                                    suggestionItem.on('click', function () {
                                        $('#query').val(suggestion);
                                        $('#search-suggestions').empty();
                                    });

                                    $('#search-suggestions').append(suggestionItem);
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Error fetching suggestions:", error);
                            $('#search-suggestions').empty();
                        }
                    });
                } else {
                    $('#search-suggestions').empty();
                }
            }, 300); // Delay in ms (300ms is a good balance)
        });

        // Event listener for the Search button
        $('#submit-button').click(function (e) {
            e.preventDefault();
            var query = $('#query').val();

            // Determine the URL based on the selected radio button
            var searchResultUrl = base_url;
            if (selectedSearchType === 'player') {
                searchResultUrl += '/player-search-result'; // New route for player search results
            } else if (selectedSearchType === 'team') {
                searchResultUrl += '/search-result'; // New route for team search results
            } else {
                Swal.fire({
                            icon: 'warning',
                            title: 'Search Type Missing',
                            text: 'Please select whether you want to search for a Player or a Team.',
                            confirmButtonText: 'OK'
                        });
                return;
            }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: searchResultUrl,
                type: 'POST',
                data: { query: query },
                success: function (data) {
                    if (data.teams && data.teams.length > 0) {
                        let titleHtml = `<h5 id="res-title">Teams:</h5>`;
                        titleHtml += '<div class="d-flex flex-wrap gap-4 mb-3">';

                       data.teams.forEach(function (team) {
                        const teamCode = getTeamCode(team.short_code, team.name); // compute first

                        titleHtml += `
                            <div class="text-center">
                                <img src="${team.image_path}" alt="${team.name}" style="width: 60px; height: 60px; object-fit: contain;">
                                <div style="margin-top: 4px; font-size: 13px; font-weight: bold;">${teamCode}</div>
                            </div>
                        `;
                    });
                       
                        $('#res-title-wrapper').html(titleHtml); // Wrap title in a container for cleaner reset
                    }

                    if (data.pastMatches) {
                        $('#match-title').html(`<h4><strong>Matches for ${query}</strong></h4>`);
                        var tableBody = $('.table.table-striped.custab tbody');
                        tableBody.empty();
                        if (data.pastMatches.length > 0) {
                             data.pastMatches.forEach(function (match) {
                                // Your existing match rendering logic
                                var date = new Date(match.date_time);
                                var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                var dayOfWeek = daysOfWeek[date.getDay()];
                                var shortDay = dayOfWeek.substring(0, 3);

                                var rowHtml = '<tr style="cursor: pointer;" onclick="window.location.href=\'/match/details/' + match.match_id + '\'">';

                                // Left column
                                rowHtml += '<td style="vertical-align: top; padding: 8px;">';
                                rowHtml += '<div style="margin-bottom: 5px;">' + shortDay + ', ' + match.date_time + '</div>';
                                rowHtml += '<span class="badge" style="background-color: ' +
                                    (match.MatchStatuS === 'Finished' ? 'red' : 'green') +
                                    '; color: white; border-radius: 12px; padding: 4px 12px; font-size: 14px; display: inline-block;">' +
                                    match.MatchStatuS +
                                    '</span>';
                                rowHtml += '</td>';

                                // Right column
                                rowHtml += '<td style="padding: 8px;">';
                                rowHtml += '<div style="display: flex; align-items: center; justify-content: space-between;">';

                                // Home team
                                rowHtml += '<div style="text-align: center; flex: 1;">';
                                rowHtml += '<img src="' + match.homeTeam_logo + '" alt="' + match.homeTeam_name + '" style="padding: 4px; width: 50px; height: 50px;">';
                                rowHtml += '<div><strong>' + (match.homeTeam_score !== null ? match.homeTeam_score : '-') + '</strong></div>'; // Handle null scores
                                rowHtml += '<div style="font-size: 13px; margin-top: 4px;">' + getTeamCode(match.homeTeam_code, match.homeTeam_name) + '</div>';
                                rowHtml += '</div>';

                                // VS
                                rowHtml += '<div style="text-align: center; flex: 0 0 40px;"><strong>vs</strong></div>';

                                // Away team
                                rowHtml += '<div style="text-align: center; flex: 1;">';
                                rowHtml += '<img src="' + match.awayTeam_logo + '" alt="' + match.awayTeam_name + '" style="padding: 4px; width: 50px; height: 50px;">';
                                rowHtml += '<div><strong>' + (match.awayTeam_score !== null ? match.awayTeam_score : '-') + '</strong></div>'; // Handle null scores
                                rowHtml += '<div style="font-size: 13px; margin-top: 4px;">' + getTeamCode(match.awayTeam_code, match.awayTeam_name) + '</div>';
                                rowHtml += '</div>';

                                rowHtml += '</div>'; // close team row
                                rowHtml += '</td>';

                                rowHtml += '</tr>';
                                tableBody.append(rowHtml);
                            });
                        } else {
                            tableBody.append('<tr><td colspan="2" class="text-center">No matches found for "' + query + '".</td></tr>');
                        }

                    } else if (data.playerData) { 
                        const player = data.playerData; 
                        console.log(player); 
                        $('#res-title').text('Search Result'); 
                        var tableBody = $('.table.table-striped.custab tbody');
                        tableBody.empty();
                        
                        var translatedPosition = getPositionName(player.position_id);
                         let marketValue = 'N/A';
                            if (player.transferAmount) {
                                marketValue = '€ ' + (player.transferAmount / 1000000).toFixed(0) + 'M';
                            }
                        let playerRow = `<tr>
                            <td><strong>Name:</strong></td><td>${player.name || 'N/A'}</td>
                        </tr>
                         <tr>
                            <td><strong>Position:</strong></td> <td>${translatedPosition}</td>
                        </tr>
                         <tr>
                            <td><strong>Team:</strong></td> <td>${player.teamLogo 
                                    ? `<img src="${player.teamLogo}" alt="${player.name}" style="width: 50px; height: 50px;">`
                                    : 'N/A'}</td>
                        </tr>
                        <tr>
                            <td><strong>Nationality:</strong></td><td>${player.nationality || 'N/A'}</td>
                        </tr>
                        <tr>
                            <td><strong>Market Value:</strong></td><td>${marketValue}</td>
                        </tr>           
                        <tr>
                            <td><strong>Image:</strong></td>
                            <td>
                                ${player.image_path 
                                    ? `<img src="${player.image_path}" alt="${player.name}" style="width: 50px; height: 50px;">`
                                    : 'N/A'}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="${base_url}/player/details/${player.player_id}" >More Details</a>
                            </td>
                        </tr>`;

                        tableBody.append(playerRow);

                    } else if (data.success === 0 && data.playerData === null) {
                        // This handles the case where the API returned success:0 because no player was found
                        $('#res-title').text('No Player Found');
                        $('.table.table-striped.custab tbody').empty().append('<tr><td colspan="2" class="text-center">No player data found for this search.</td></tr>');
                    } else {
                        // Generic message if data structure is unknown or other error from backend
                        $('#res-title').text('Search Results');
                        $('.table.table-striped.custab tbody').empty().append('<tr><td colspan="2" class="text-center">No results found for "' + query + '".</td></tr>');
                    }
                                },
                                error: function (xhr, status, error) {
                                    console.error("Error fetching search results:", error);
                                    $('#res-title').text('Error');
                                    $('.table.table-striped.custab tbody').empty().append('<tr><td colspan="2" class="text-center">An error occurred while searching. Please try again.</td></tr>');
                                }
                            });
                        });
                    });


//leaderboard
    

    var  showAll = false;

          $("#allButton").click(function () {
                $("#allButton").removeClass("buttonPink").addClass("buttonGray");
                $("#monthlyButton").removeClass("buttonGray").addClass("buttonPink");
                 $('#general').show();
                 $('#monthly').hide();
            });

            $("#monthlyButton").click(function () {
                $("#monthlyButton").removeClass("buttonPink").addClass("buttonGray");
                $("#allButton").removeClass("buttonGray").addClass("buttonPink");
                $('#general').hide();
                $('#monthly').show();
            });

        $('#general').show();
        $('#monthly').hide();

        // $('#seeAllLeadersBtn').click(function() {
        //     showAll = !showAll; // Toggle the showAll state

        //     $('.board').each(function(index) {
        //         if (showAll || index < 3) {
        //             $(this).show(); // Show the board if showAll is true or index is less than 3
        //         } else {
        //             $(this).hide(); // Hide the board if showAll is false and index is 3 or greater
        //         }
        //     });
        // });

        // $('#monthlyLeader').click(function() {
        //     showAll = !showAll; // Toggle the showAll state

        //     $('.boardd').each(function(index) {
        //         if (showAll || index < 3) {
        //             $(this).show(); // Show the board if showAll is true or index is less than 3
        //         } else {
        //             $(this).hide(); // Hide the board if showAll is false and index is 3 or greater
        //         }
        //     });
        // });

    $('.see-all-button').click(function() {
    const playerIndex = $(this).data('player-index');
    const $records = $('.record-' + playerIndex);

    // Toggle the visibility of records for the clicked player
    $records.toggle();

    const buttonText = $records.is(':visible') ? translations.see_less : translations.see_all;
    $(this).text(buttonText);
});


    function getTeamCode(teamCode, teamName) {
    if (teamCode && teamCode.trim() !== '') {
        return teamCode;
    }

    const words = teamName.trim().split(' ');
    if (words.length > 1) {
        // Multi-word name like "FC Barcelona"
        return words.map(word => word[0]).join('').toUpperCase();  // → FCB
    } else {
        // Single-word name like "RealMadrid"
        return teamName.substring(0, 3).toUpperCase();  // → REA
    }
}

