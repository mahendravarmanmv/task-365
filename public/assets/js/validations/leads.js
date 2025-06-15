$(document).ready(function () {
    const wishlistUrl = document.querySelector('meta[name="wishlist-toggle-url"]').content;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
	const isAuthenticated = document.querySelector('meta[name="is-authenticated"]').content === "1";
    // Wishlist Toggle
    $(document).on('click', '.fav', function () {
        let $this = $(this);
        let leadId = $this.data('lead-id');
        let icon = $this.find('i');
        let msg = $this.closest('.procut_btn').find('.wishlist-msg');
		
		if (!isAuthenticated) {
            alert("Please log in to add to wishlist.");
            return;
        }
		
		toastr.options = {
		"progressBar": true,
		"positionClass": "toast-bottom-right",
		"timeOut": "2000"
		};


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
					toastr.success('Added to wishlist', 'Wishlist');
                    //msg.text('Wishlist added').removeClass('d-none');
                } else {
                    icon.removeClass('text-danger').addClass('text-white');
					toastr.warning('Removed from wishlist', 'Wishlist');
                    //msg.text('Removed from wishlist').removeClass('d-none');
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
        let leadsWrapper = $('.procuct_sec .row');
        let leadCards = $('.procuct_card').parent('.col-md-12');

        let filtered = [];

        leadCards.each(function () {
            let card = $(this);
            let cardText = card.text().toLowerCase();
            let show = cardText.includes(searchTerm);

            switch (filterOption) {
                case '4': // In stock
                    if (cardText.includes("out of stock")) show = false;
                    break;
                case '5': // Out of stock
                    show = cardText.includes("out of stock");
                    break;
                case '6': // Wishlist only
                    show = card.find('i.fa-heart').hasClass('text-danger');
                    break;
            }

            if (show) filtered.push(card);
        });
		
		if (filterOption === '1') {
		filtered.sort(function (a, b) {
		let dateA = parseInt(a.find('.procuct_card').data('date') || 0);
		let dateB = parseInt(b.find('.procuct_card').data('date') || 0);
		return dateB - dateA; // Newest first
		});
		}


        // Sorting by budget
        if (filterOption === '2' || filterOption === '3') {
            filtered.sort(function (a, b) {
                let budgetA = parseInt(a.find('.product_title').text().match(/Budget Range:\s*₹\s*(\d+)/)?.[1] || 0);
                let budgetB = parseInt(b.find('.product_title').text().match(/Budget Range:\s*₹\s*(\d+)/)?.[1] || 0);
                return filterOption === '2' ? budgetB - budgetA : budgetA - budgetB;
            });
        }

        // Clear all and append sorted/filtered
        leadCards.hide();
        if (filtered.length > 0) {
            $('#noResultsMessage').addClass('d-none');
            filtered.forEach(card => leadsWrapper.append(card.show()));
        } else {
            $('#noResultsMessage').removeClass('d-none');
        }

        // ✅ Update the visible leads count
        $('#leadsCount').text(`Total Leads: ${filtered.length}`);
    }

    // Run once on page load
    filterLeads();
});
