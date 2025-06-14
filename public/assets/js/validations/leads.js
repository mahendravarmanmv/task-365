$(document).ready(function () {
    const wishlistUrl = document.querySelector('meta[name="wishlist-toggle-url"]').content;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    // Wishlist Toggle
    $(document).on('click', '.fav', function () {
        let $this = $(this);
        let leadId = $this.data('lead-id');
        let icon = $this.find('i');
        let msg = $this.closest('.procut_btn').find('.wishlist-msg');

        $.ajax({
            url: wishlistUrl,
            method: "POST",
            data: {
                lead_id: leadId,
                _token: csrfToken
            },
            success: function (res) {
                if (res.status === 'added') {
                    icon.removeClass('text-white').addClass('text-danger');
                    msg.text('Wishlist added').removeClass('d-none');
                } else {
                    icon.removeClass('text-danger').addClass('text-white');
                    msg.text('Removed from wishlist').removeClass('d-none');
                }

                // Hide message after 2 seconds
                setTimeout(function () {
                    msg.addClass('d-none');
                }, 2000);

                filterLeads(); // reapply filters in case of wishlist filtering
            },
            error: function () {
                alert('Something went wrong. Please try again.');
            }
        });
    });

    // Global search + Filter
    $('#globalSearch, #inlineFormSelectPref').on('input change', function () {
        filterLeads();
    });

    function filterLeads() {
        let searchTerm = $('#globalSearch').val().toLowerCase();
        let filterOption = $('#inlineFormSelectPref').val();
        let visibleCount = 0;

        let leads = $('.procuct_card').parent('.col-md-12');

        leads.each(function () {
            let card = $(this);
            let cardText = card.text().toLowerCase();
            let show = cardText.includes(searchTerm);

            // Additional filter logic
            switch (filterOption) {
                case '1': // Sort by Date – no-op unless custom sort logic added
                    break;
                case '2': // Budget high to low – not applicable in front-end text filtering
                    break;
                case '3': // Budget low to high – same as above
                    break;
                case '4': // In stock
                    if (card.text().toLowerCase().includes("out of stock")) show = false;
                    break;
                case '5': // Out of stock
                    show = card.text().toLowerCase().includes("out of stock");
                    break;
                case '6': // Wishlist only
                    show = card.find('i.fa-heart').hasClass('text-danger');
                    break;
            }

            if (show) {
                card.show();
                visibleCount++;
            } else {
                card.hide();
            }
        });

        $('#noResultsMessage').toggleClass('d-none', visibleCount > 0);
    }
});
