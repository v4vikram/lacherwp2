jQuery(document).ready(function ($) {
  function SearchForm() {
    // Toggle dropdown on click
    $(".dropdown-toggle").on("click", function (e) {
      // alert("ji")
      e.preventDefault();
      e.stopPropagation(); // Prevent event bubbling
      $(".custom-dropdown").toggleClass("open");
    });
  }
  SearchForm();
});

jQuery(document).ready(function ($) {
    // Define the selectedCategory variable globally
    let selectedCategory = ""; // Empty or "all" for all products
  
    // Dropdown category selection
    $("#categoryDropdown").on("click", ".cat-search-item", function () {
        selectedCategory = $(this).data("category"); // Set the selected category
        $("#selectedCategory").text($(this).text()); // Update the selected category label
  
        console.log("Selected Category:", selectedCategory);
  
        // Trigger the AJAX search when a category is selected
        const searchTerm = $("#productSearch").val();
        triggerAjaxSearch(searchTerm);
    });
  
    // AJAX product search for both search term and category
    $("#productSearch").on("input", function () { // Use 'input' event instead of 'keyup'
        const searchTerm = $(this).val();
  
        if (searchTerm.length > 1 && selectedCategory) {
            // Trigger search if search term length is greater than 1 and a category is selected
            triggerAjaxSearch(searchTerm);
        } else if (searchTerm.length > 1 && !selectedCategory) {
            // If search term length is greater than 1 but no category is selected, trigger search
            triggerAjaxSearch(searchTerm);
        } else if (searchTerm.length === 0 && !selectedCategory) {
            // If the search term is empty and no category is selected, clear the results
            $("#searchResults").empty();
        } else if (searchTerm.length === 0 && selectedCategory) {
            // If the search term is empty but a category is selected, show "No results found."
            $("#searchResults").html("<p>No results found.</p>");
        }
    });
  
    // Function to trigger the AJAX search
    function triggerAjaxSearch(searchTerm = "") {
        // Only trigger search if the term is more than 1 character or a category is selected
        if ((searchTerm.length > 1 || selectedCategory) && searchTerm.length > 0) {
            $.ajax({
                url: ajax_object.ajax_url, // Correct key is `ajax_url`
                type: "POST",
                data: {
                    action: "search_products",
                    term: searchTerm, // Pass the search term
                    category: selectedCategory, // Pass the selected category
                },
                success: function (response) {
                    if (response.trim() === "") {
                        // No results found
                        $("#searchResults").html("<p>No results found.</p>");
                    } else {
                        // Update the search results
                        $("#searchResults").html(response); 
                    }
                    console.log(response); // For debugging
                },
                error: function () {
                    $("#searchResults").html("<p>Something went wrong.</p>");
                },
            });
        } else {
            // If there's no valid search term and no category selected, clear the results
            $("#searchResults").empty();
        }
    }
});




  
