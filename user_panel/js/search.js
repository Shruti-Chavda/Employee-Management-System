    var originalContent = ''; // Store the original content
    var storedSearchQuery = ''; // Store the search query

    function performSearch() {
        executeSearch();
    }

    // Function to handle key press event
    function handleKeyPress(event) {
        if (event.key === 'Enter') {
            executeSearch();
        }
    }

    // Function to execute the search
    function executeSearch() {
        // Get the search query
        var searchQuery = sanitizeSearchQuery(document.getElementById('searchInput').value.trim());

        // Check if the search query meets the minimum length criteria
        if (isValidSearchQuery(searchQuery)) {
            // Store the original content if not already stored
            if (!originalContent) {
                originalContent = $('#content').html();
            }

            // Clear previous highlights
            $('#content').html(originalContent.replace(/<\/?span[^>]*>/g, ''));

            // Highlight the search query in the content
            var content = $('#content').html();
            var highlightedContent = content.replace(new RegExp('(' + escapeRegExp(searchQuery) + ')', 'ig'), '<span class="search-highlight">$1</span>');
            $('#content').html(highlightedContent);

            // Check if any matches were found
            var matches = $('#content .search-highlight');

            if (matches.length > 0) {
                // Scroll to the first occurrence
                $('html, body').animate({ scrollTop: matches.first().offset().top }, 'slow');
            }

            // Store the search query
            storedSearchQuery = searchQuery;
        } else {
            // Clear previous highlights if search query is empty or too short
           // $('#content').html(originalContent);

            // Clear stored search query
            storedSearchQuery = '';
        }

        // Set the stored search query back in the input box
        document.getElementById('searchInput').value = storedSearchQuery;
    }

    // Function to escape special characters in the search query
    function escapeRegExp(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
    }

    // Function to sanitize the search query
    function sanitizeSearchQuery(query) {
        // Remove HTML tags and other unwanted characters
        return query.replace(/<\/?[^>]+(>|$)/g, "");
    }

    // Function to check if the search query is valid based on criteria
    function isValidSearchQuery(query) {
        // Check if the query is at least 4 characters long (for words)
        // or at least 2 characters long (for numbers)
        return (/\b\d{2,}\b|\b\w{4,}\b/.test(query));
    }


