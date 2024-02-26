<div class="form-group">
    <input type="text" class="form-control" id="search_input" placeholder="Search for Dealership..." autocomplete="off">
    <ul id="dealership_list" style="list-style-type: none">
    </ul>
    <input type="hidden" id="dealership_id" name="dealership_id">
</div>

<script>
    function searchDealerships(query) {
            console.log(query);
            var route = "{{route('admin.dealership_search_axios',[':query'])}}";
            route = route.replace(':query', query);
            axios.get(route)
                .then(response => {
                    console.log(response);
                    const dealership_list = $('#dealership_list');
                    dealership_list.empty();

                    $.each(response.data.dealerships, function(index, dealership) {
                        const listItem = $('<li class="text-primary" style="margin-top: 3px;">').text(dealership.dname );
                        listItem.on('click', function() {
                            selectDealership(dealership);
                        });

                        dealership_list.append(listItem);
                    });
                })
                .catch(error => {
                    console.error(error);
                });
    }

    // Function to handle dealership selection
    function selectDealership(dealership) { 
        console.log("select")       ;
        //select dealership 
        $('#dealership_id').val(dealership.id);
        $("#search_input").val(dealership.dname);
        //clear list 
        $("#dealership_list").empty();
    }

    // Event listener for search input
    $('#search_input').on('input', function() {
        searchDealerships($(this).val());
    });
</script>