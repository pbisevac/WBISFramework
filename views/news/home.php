<div id="news-container">

</div>
<input type="button" value="Load more" id="load-more-btn" class="btn btn-outline-primary col-12">

<script>
    $(document).ready(function() {
        var page_number = 0;

        loadMore($("#load-more-btn"), $("#news-container"), $("#search").val(), page_number, "/news/getnews")

        $("#load-more-btn").click(function (){
            loadMore($("#load-more-btn"), $("#news-container"), $("#search").val(), page_number, "/news/getnews");

            page_number++;
        });

        $("#search").change(function (){
            $("#news-container").empty();

            loadMore($("#load-more-btn"), $("#news-container"), $("#search").val(), page_number, "/news/getnews");

            page_number = 0;
        });
    });

    function loadMore(jQueryLoadMoreBtn, jQueryContainer, search, pageNumber, url)
    {
        var data = {"page_number": pageNumber, "search": search};

        $.ajax({
            method: "GET",
            url: url,
            data: data,
            dataType: "json",
            success: function (result) {
                if (result == null || result.length == 0 || result.length < 10) {
                    jQueryLoadMoreBtn.html("No more data!");
                    jQueryLoadMoreBtn.val("No more data!");
                    jQueryLoadMoreBtn.prop('disabled', true);
                }

                if (result != null && result.length > 0) {
                    $.each(result, function (index, item) {
                        jQueryContainer.append(
                            '<div class="card">' +
                            '  <div class="card-body">' +
                            ' <h5 class="card-title">'+ item.title_news +'</h5>' +
                            '<p class="card-text">'+ item.content_news +'</p>' +
                            '</div>' +
                            '</div>'
                        );
                    });
                }
            },
            error: function () {
                alert("Greska prilikom ocitavanja podataka!");
            }
        });
    }
</script>